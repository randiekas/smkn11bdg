<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if ( ! function_exists('test_method'))
{
  /**
   * function for check leveling when access url applications
   *
   * @param  level_id  $level_id
   * @param  url  url
   * @return Response TRUE FALSE
   */
    function getDataField($table,$value,$label,$field_where=null,$field_value=null)
    {
      $CI =& get_instance();
      $CI->db->select($value);
      $CI->db->select($label);
      if($field_where!=null)
      {
        $CI->db->where($field_where,$field_value);
      }
      $rasults = array();
      foreach($CI->db->get($table)->result_array() as $row)
      {
        $result =array();
        $result["value"] = $row[$value];
        $result["label"] = $row[$label];
        $results[] = $result;
      }
      return json_encode($results);
    }
}
