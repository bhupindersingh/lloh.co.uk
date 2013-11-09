<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Media extends CI_Model
{
    public function __construct() {
        parent::__construct();
    }
 
    public function record_count_images() {
        return $this->db->count_all_results("media", array('media_type' =>'image'));
    }
	
	public function record_count_videos() {
        return $this->db->count_all_results("media", array('media_type' =>'video'));
    }
 
    public function fetch_images($limit, $start) {	
		$fromid = intval($this->input->post('fromid'));
		$toid = intval($this->input->post('toid'));	
		$title = $this->input->post('title');
		
		$addtosql='';
		if($fromid == "1" || ($fromid !="" || $toid>0 || $title!=''))
		{
			if($fromid > 0){							
				$this->db->where('MEDIA_ID >=', $fromid); 				
			}
			else{				
				$this->db->where('MEDIA_ID >', $fromid); 
			}
			if($toid > 0){				
				$this->db->where('MEDIA_ID <=', $toid); 
				
			}			
			if($title != ""){				
				$this->db->like('media_title', $title); 
				
			}											
		}
		$this->db->where('media_type =', 'image'); 
        $this->db->limit($limit, $start);		
		$this->db->order_by("MEDIA_ID", "desc"); 
        $query = $this->db->get("media");
 		//echo $this->db->last_query();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }		
        return false;
   	}   
   	public function fetch_videos($limit, $start){
		$fromid = intval($this->input->post('fromid'));
		$toid = intval($this->input->post('toid'));	
		$title = $this->input->post('title');
		
		$addtosql='';
		if($fromid == "1" || ($fromid !="" || $toid>0 || $title!=''))
		{
			if($fromid > 0){							
				$this->db->where('MEDIA_ID >=', $fromid); 				
			}
			else{				
				$this->db->where('MEDIA_ID >', $fromid); 
			}
			if($toid > 0){				
				$this->db->where('MEDIA_ID <=', $toid); 
				
			}			
			if($title != ""){				
				$this->db->like('media_title', $title); 
				
			}											
		}
		$this->db->where('media_type =', 'video'); 
        $this->db->limit($limit, $start);	
		$this->db->order_by("MEDIA_ID", "desc"); 	
        $query = $this->db->get("media");
 		//echo $this->db->last_query();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }		
        return false;	
	}
	public function get_media($MEDIAID){
		$query = $this->db->get_where('media', array('MEDIA_ID' => $MEDIAID));	
		if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
	}
	//Upload Image
	public function upload_image($image){
		$data = array(	
		   'media_type'=>'image',	   
		   'media_title' => $this->security->xss_clean($this->input->post('title')),		   
		   'media_status'=>'published',
		   'media_date'=>date("Y-m-d h:i:s")		   	      
		);			
		if(is_array($image['success']))
			$data['media_path']=$image['success']['file_name'];
		$this->db->insert('media', $data); 		
		return true;	
	}
	//Update Image
	public function update_image($image){		
		// grab user input
		$MEDIAID=$this->input->get('MEDIAID');
		$data = array(		   
		   'media_title' => $this->security->xss_clean($this->input->post('title'))		   	      
		);	
		if(is_array($image['success']))
			$data['media_path']=$image['success']['file_name'];
		$this->db->where('MEDIA_ID', $MEDIAID);
		$this->db->update('media', $data); 		
		return true;	
	}
	//Delete Image
	public function delete_image($MEDIAID){
		$query = $this->db->get_where('media', array('MEDIA_ID' => $MEDIAID));	
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				unlink(FCPATH.'../uploads/media/'.$row->media_path);	
				unlink(FCPATH.'../uploads/media/thumb_'.$row->media_path);
			}
		}
		$this->db->delete('media', array('MEDIA_ID' => $MEDIAID)); 	
		return true;  
	}	
	//Add Video
	public function upload_video(){
		$data = array(	
		   'media_type'=>'video',	   
		   'media_title' => $this->security->xss_clean($this->input->post('title')),	
		   'media_path'=>$this->security->xss_clean($this->input->post('media_url')),   
		   'media_status'=>'published',
		   'media_date'=>date("Y-m-d h:i:s")		   	      
		);			
		
		$this->db->insert('media', $data); 		
		return true;	
	}
	//Update Member
	public function update_video(){		
		// grab user input
		$MEDIAID=$this->input->get('MEDIAID');
		$data = array(		   
		   'media_title' => $this->security->xss_clean($this->input->post('title')),
		   'media_path'=>$this->security->xss_clean($this->input->post('media_url'))   	      
		);
		
		$this->db->where('MEDIA_ID', $MEDIAID);
		$this->db->update('media', $data); 		
		return true;	
	}
	//Delete Video
	public function delete_video($MEDIAID){		
		$this->db->delete('media', array('MEDIA_ID' => $MEDIAID)); 	
		return true;  
	}	
}