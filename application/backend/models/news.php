<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class News extends CI_Model
{
    public function __construct() {
        parent::__construct();
    } 
  
 	public function record_count_news() {
        return $this->db->count_all_results("posts", array('post_type' =>'news'));
    }
	
	//Get news data
	public function fetch_news($limit, $start) {	
		$fromid = intval($this->input->post('fromid'));
		$toid = intval($this->input->post('toid'));	
		$post_name = $this->input->post('post_name');
		
		$addtosql='';
		if($fromid == "1" || ($fromid !="" || $toid>0 || $post_name!=''))
		{
			if($fromid > 0){							
				$this->db->where('ID >=', $fromid); 				
			}
			else{				
				$this->db->where('ID >', $fromid); 
			}
			if($toid > 0){				
				$this->db->where('ID <=', $toid); 
				
			}			
			if($post_name != ""){				
				$this->db->like('title', $post_name); 
				
			}											
		}
		$this->db->where('post_type =', 'news'); 
        $this->db->limit($limit, $start);		
        $query = $this->db->get("posts");
 		//echo $this->db->last_query();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }		
        return false;
   	}
	//Add News
	public function add_news($image){
		$data = array(		   
		   'title' => $this->security->xss_clean($this->input->post('title')),
		   'value' => $this->security->xss_clean($this->input->post('txtDescription')),	
		   'post_name' => $this->slugify($this->input->post('title'),''),
		   'post_type' => 'news',
		   'meta_keyword' => $this->security->xss_clean($this->input->post('txtMetaKeyword')),
		   'meta_description' => $this->security->xss_clean($this->input->post('txtMetaDescription')),	
		   'post_date' => date('Y-m-d H:i:s'),
		   'post_status' =>  $this->security->xss_clean($this->input->post('status'))	      
		);			
		if(is_array($image['success']))
			$data['image']=$image['success']['file_name'];
		$this->db->insert('posts', $data);			
		return true;		
	} 
	
	//Delete news
	public function delete_news($POSTID){
		$this->db->delete('posts', array('ID' => $POSTID)); 
		
		return true;  
	}
	public function get_news($POSTID){
		$query = $this->db->get_where('posts', array('ID' => $POSTID));	
		if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
	}
	
	public function update_news($image){
		$data = array(		   
		   'title' => $this->security->xss_clean($this->input->post('title')),
		   'value' => $this->security->xss_clean($this->input->post('txtDescription')),	
		   'post_name' => $this->slugify($this->input->post('title'),$this->input->get('POSTID')),
		   'post_type' => 'news',
		   'meta_keyword' => $this->security->xss_clean($this->input->post('txtMetaKeyword')),
		   'meta_description' => $this->security->xss_clean($this->input->post('txtMetaDescription')),	
		   'post_date' => date('Y-m-d H:i:s'),
		   'post_status' =>  $this->security->xss_clean($this->input->post('status'))	      
		);	
		if(is_array($image['success']))
			$data['image']=$image['success']['file_name'];		
		$this->db->where('ID', $this->input->get('POSTID'));
		$this->db->update('posts', $data);			
		return true;	
	}
	public function slugify($text,$id)
	{ 
		// replace non letter or digits by -
		$text = preg_replace('~[^\\pL\d]+~u', '-', $text);
		// trim
		$text = trim($text, '-');
		// transliterate
		$text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
		// lowercase
		$text = strtolower($text);
		// remove unwanted characters
		$text = preg_replace('~[^-\w]+~', '', $text);
		if (empty($text)){
			return 'n-a';
		}		
		if($id<>'')
			$this->db->where('ID <> ',$id);
		$this->db->like('post_name',$text);
		$this->db->order_by("ID", "desc");
		$this->db->limit(1); 
		$query = $this->db->get("posts");
		if ($query->num_rows() > 0) {
			$row=$query->result();
			$post=explode('-',$row[0]->post_name);
			$num=end($post);
			if($num>0){
				$num=$num+1;
			}
			else{
				$num='1';	
			}
			return $text.'-'.$num;		
		}
		else{
			return $text;	
		}		
	} 
}