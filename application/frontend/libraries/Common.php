<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Common {
	function __construct() {
            log_message('debug', "Common Class Initialized.");
            $this->_ci =& get_instance();
	}
	public function list_group_types(){
		$query = $this->_ci->db->get('group_type');	
		foreach ($query->result() as $row)
		{
			$data['group_id'] = $row->GROUPID;
			$data['group_name'] = $row->group_name;
			$items[]=$data;			
		}
		return $items;
	}
	public function get_slider_images(){	
		$this->_ci->db->select('config.value');
		$this->_ci->db->from('config');		
		$images = array('image1_url', 'image2_url', 'image3_url','image4_url','image5_url','image6_url','image7_url','image8_url','image9_url','image10_url');
		$this->_ci->db->where_in('setting', $images);
		$query = $this->_ci->db->get();	
		
		foreach ($query->result() as $row)
		{			
			if($row->value <> '')
				$value[] = $row->value;			
		}		
		return $value;		
	}
	public function get_youtube_id($url){
		if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $match)) {
    		$video_id = $match[1];
		}	
		return $video_id;
	}	
	
	
	// $original should be the future date and time in unix format
	public function TimeToLeft($future) 
	{
		// Common time periods as an array of arrays
		$periods = array(
		array(60 * 60 * 24 * 365 , 'year'),
		array(60 * 60 * 24 * 30 , 'month'),
		array(60 * 60 * 24 * 7, 'week'),
		array(60 * 60 * 24 , 'day'),
		array(60 * 60 , 'hour'),
		array(60 , 'minute'),
		);
		$today = time();
		$since = $future - $today;
		if($since > 0){
			// Find the difference of time between now and the future
			// Loop around the periods, starting with the biggest
			for ($i = 0, $j = count($periods); $i < $j; $i++)
			{
				$seconds = $periods[$i][0];
				$name = $periods[$i][1];
				// Find the biggest whole period
				if (($count = floor($since / $seconds)) != 0)
				{
					break;
				}
			}
			$print = ($count == 1) ? '1 '.$name : "$count {$name}s";
			if ($i + 1 < $j)
			{
				// Retrieving the second relevant period
				$seconds2 = $periods[$i + 1][0];
				$name2 = $periods[$i + 1][1];
				// Only show it if it's greater than 0
				if (($count2 = floor(($since - ($seconds * $count)) / $seconds2)) != 0)
				{
					$print .= ($count2 == 1) ? ', 1 '.$name2 : ", $count2 {$name2}s";
				}
			}
			return $print;
		}
		else{
			return "Time Over";	
		}
	}

	//Date Format used to show time on right sidebar
	public function TimeToLeft_sidebar($future) 
	{
		// Common time periods as an array of arrays
		$periods = array(
		array(60 * 60 * 24 * 365 , 'year'),
		array(60 * 60 * 24 * 30 , 'month'),
		array(60 * 60 * 24 * 7, 'week'),
		array(60 * 60 * 24 , 'day'),
		array(60 * 60 , 'hour'),
		array(60 , 'minute'),
		);
		$today = time();
		$since = $future - $today;
		if($since > 0){
			// Find the difference of time between now and the future
			// Loop around the periods, starting with the biggest
			for ($i = 0, $j = count($periods); $i < $j; $i++)
			{
				$seconds = $periods[$i][0];
				$name = $periods[$i][1];
				// Find the biggest whole period
				if (($count = floor($since / $seconds)) != 0)
				{
					break;
				}
			}
			$print = ($count == 1) ? '1 '.$name : "$count";
			if ($i + 1 < $j)
			{
				// Retrieving the second relevant period
				$seconds2 = $periods[$i + 1][0];
				$name2 = $periods[$i + 1][1];
				// Only show it if it's greater than 0
				if (($count2 = floor(($since - ($seconds * $count)) / $seconds2)) != 0)
				{
					$print .= ($count2 == 1) ? ', 1 '.$name2 : ":$count2";
				}
			}
			return $print;
		}
		else{
			return "Time Over";	
		}
	}
}