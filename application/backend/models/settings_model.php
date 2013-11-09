<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Settings_Model extends CI_Model
{
    public function __construct() {
        parent::__construct();
    }	
	//Update Member
	public function update_settings(){
		// grab user input
		$data=array();
		foreach($this->input->post() as $key=>$val){
			if($key!="submitform"){
				$data['setting']=$key;
				$data['value']=$val;
				if($this->check_settings($key)):
					$this->db->where('setting',$key);
					$this->db->update('config', $data); 
				else:
					$this->db->insert('config', $data); 
				endif;
			}
		}			
		return true;	
	}
	public function check_settings($setting){
		$this->db->where('setting',$setting);
		$query = $this->db->get("config");
		if ($query->num_rows() > 0) {
			return true;
		}	
		else{
			return false;	
		}
	}
	public function update_static_pages(){		
		if($this->input->post('submitform1') == "1"){
			$arr = array("title", "value");
			foreach ($arr as $value){
				$slug="";
				if($value=='title'){
					$slug=$this->slugify($this->input->post($value),1);	
					$slug=",post_name=".$this->db->escape($slug);
				}
				$sql = "UPDATE posts SET $value=".$this->db->escape($this->input->post($value))."$slug, post_date=".$this->db->escape(date("Y-m-d h:i:s"))." WHERE ID='1'";
				$this->db->simple_query($sql);
			}			
		}
		
		if($this->input->post('submitform2') == "1"){
			$arr = array("title", "value");
			foreach ($arr as $value){
				$slug="";
				if($value=='title'){
					$slug=$this->slugify($this->input->post($value),2);	
					$slug=",post_name=".$this->db->escape($slug);
				}
				$sql = "UPDATE posts SET $value=".$this->db->escape($this->input->post($value))."$slug, post_date=".$this->db->escape(date("Y-m-d h:i:s"))." WHERE ID='2'";
				$this->db->simple_query($sql);
			}					
		}
		
		if($this->input->post('submitform3') == "1"){
			$arr = array("title", "value");
			foreach ($arr as $value){
				$slug="";
				if($value=='title'){
					$slug=$this->slugify($this->input->post($value),3);	
					$slug=",post_name=".$this->db->escape($slug);
				}
				$sql = "UPDATE posts SET $value=".$this->db->escape($this->input->post($value))."$slug, post_date=".$this->db->escape(date("Y-m-d h:i:s"))." WHERE ID='3'";
				$this->db->simple_query($sql);
			}
		}
		
		if($this->input->post('submitform4') == "1"){
			$arr = array("title", "value");
			foreach ($arr as $value){
				$slug="";
				if($value=='title'){
					$slug=$this->slugify($this->input->post($value),4);	
					$slug=",post_name=".$this->db->escape($slug);
				}
				$sql = "UPDATE posts SET $value=".$this->db->escape($this->input->post($value))."$slug, post_date=".$this->db->escape(date("Y-m-d h:i:s"))." WHERE ID='4'";
				$this->db->simple_query($sql);
			}			
		}
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
		$this->db->where('post_name',$text);
		$this->db->where('ID <> ',$id);
		$query = $this->db->get("posts");
		if ($query->num_rows() > 0) {
			return $text.'-1';		
		}
		else{
			return $text;	
		}		
	}
}