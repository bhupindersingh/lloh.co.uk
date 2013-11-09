<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* Form Value
*
* Grabs a value from the POST array for the specified field so you can
* re-populate an input field or textarea.  If Form Validation
* is active it retrieves the info from the validation class
*
* @access   public
* @param   string
* @return   mixed
*/
if ( ! function_exists('set_value'))
{
  function set_value($field = '', $default = '')
  {
      $OBJ =& _get_validation_object();

      if ($OBJ === TRUE && isset($OBJ->_field_data[$field]))
      {
        return form_prep($OBJ->set_value($field, $default));
      }
      else
      {
        if ( ! isset($_POST[$field]))
        {
          return $default;
        }

        return form_prep($_POST[$field]);
      }
  }
}

if(!function_exists('get_setting')){
	function get_setting($item){
		$ci=& get_instance();
    	$ci->load->database();
		$ci->db->select('config.value');
		$ci->db->from('config');
		$ci->db->where('setting',$item);
		$query = $ci->db->get();
		$value='';
		foreach ($query->result() as $row)
		{			
			$value = $row->value;			
		}		
		return $value;
	}	
}

if(!function_exists('page_hperlink')){
	function page_hperlink($id){
		$ci=& get_instance();
    	$ci->load->database();
		$ci->db->select('post_name');
		$ci->db->from('posts');
		$ci->db->where('ID',$id);
		$query = $ci->db->get();
		$value='';
		foreach ($query->result() as $row)
		{			
			$value = $row->post_name;			
		}		
		return $value;
	}	
}

/* End of file MY_form_helper.php */
/* Location: ./application/helpers/MY_form_helper.php */ 