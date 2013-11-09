<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Home_model extends CI_Model{
	function __construct(){
		parent::__construct();		
	}	
	public function list_latest_requests(){
		$limit=get_setting('latest_request_per_page');
		$this->db->select('post_a_request.*,members.firstname,members.lastname,members.organization_name');
		$this->db->from('post_a_request');	
		$this->db->join('members', 'members.USERID = post_a_request.user_id');	
		$this->db->order_by("status ASC,POST_ID DESC");
		$this->db->limit($limit,0);
		$query = $this->db->get();
		
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }		
        return false;
	}
	public function list_latest_requests_inner(){
		$limit=get_setting('latest_request_per_page');
		$this->db->select('post_a_request.*,members.firstname,members.lastname,members.organization_name');
		$this->db->from('post_a_request');	
		$this->db->join('members', 'members.USERID = post_a_request.user_id');	
		$this->db->where("post_a_request.status =",'active');
		$this->db->order_by("status ASC,POST_ID DESC");		
		$this->db->limit($limit,0);
		$query = $this->db->get();
		
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }		
        return false;
	}
	public function load_more_latest_requests(){
		if($this->input->post('lastmsg')<>''){
			$lastmsg=$this->input->post('lastmsg');
			$cnt=$this->input->post('cnt');
			$limit=get_setting('latest_request_per_page');
			$this->db->select('post_a_request.*,members.firstname,members.lastname,members.organization_name');
			$this->db->from('post_a_request');	
			$this->db->join('members', 'members.USERID = post_a_request.user_id');				
			$this->db->order_by("status ASC,POST_ID DESC");
			$this->db->limit($limit,$this->input->post('cnt'));
			$query = $this->db->get();	
			//echo $this->db->last_query();exit;	
			$data='';
			$msg_id='';
			if ($query->num_rows() > 0) {				
				foreach ($query->result() as $row) {if($cnt%2 == 0): $class="even";else:$class="odd";endif;$msg_id=$row->POST_ID;
					$date=strtotime(date($row->deadline));
					if($row->status=="expired" || $this->common->TimeToLeft($date)=="Time Over"){
						$class="disable";	
					}
					$data.='<li class="'.$class.'">
                        <div class="img"><a href="'.site_url('/requests_detail/').'?POSTID='.$row->POST_ID.'"><img src="'.base_url().'uploads/images/thumb_'.$row->photo.'" class="bor_01" width="150" height="150"/></a></div>
                        <div class="details">
                          	<h5><a href="'.site_url('/requests_detail/').'?POSTID='.$row->POST_ID.'">'.$row->post_name.'</a></h5>
                          	<ul>
                          	<li class="user">'.$row->organization_name.'</li>
                            <li class="time">';							
							$date=strtotime(date($row->deadline));	
							$data.=$this->common->TimeToLeft($date);
                            $data.='</li>
                            </ul>
                            <div class="text">'.substr($row->description,0,255).'...</div>
                            <div class="donate"><a href="';
							if($class=="disable"):
								$data.='javascript:void(0);';
							else: 
								$data.=site_url('/donate/').'?POSTID='.$row->POST_ID;
							endif;
							$data.='">Donate</a></div>';
                        	$data.='</div>
                        	<div class="clear"></div>
                        	</li>';	
						$cnt++;
				}				
			}			
            $data.='<div class="load_more" id="more'.$msg_id.'"><a class="more" href="javascript:void(0);" id="'.$msg_id.'"><span>Load More Requests</span></a><input type="hidden" id="cnt" value="'.$cnt.'" /></div>';			
		}
		return $data;			
	}
	public function list_request_ending_soon(){
		$limit=get_setting('latest_request_ending_soon');
		$this->db->select('post_a_request.*,members.firstname,members.lastname,members.organization_name');
		$this->db->from('post_a_request');			
		$this->db->join('members', 'members.USERID = post_a_request.user_id');	
		$today=date("Y-m-d H:i:s");
		$this->db->where("DATEDIFF(`post_a_request`.`deadline`,'$today') = ",'1');	
		$this->db->where("post_a_request.status =",'active');	
		$this->db->order_by("status ASC,POST_ID DESC");
		$this->db->limit($limit,0);
		$query = $this->db->get();
		//echo $this->db->last_query();exit;
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }		
        return false;
	}
	public function show_post_details(){	
		$this->db->select('post_a_request.*,members.firstname,members.lastname,members.organization_name');
		$this->db->from('post_a_request');			
		$this->db->join('members', 'members.USERID = post_a_request.user_id');		
		$this->db->where("post_a_request.POST_ID =",$this->security->xss_clean($this->input->get('POSTID')));		
		$query = $this->db->get();	
		$row = $query->result();
		if ($query->num_rows() > 0) {
			return $row;	
		}
		return false;
	}
}