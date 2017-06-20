<?php
class jqxgrid extends CI_Model{
  function __construct()
  {
    parent::__construct();
  }
  public function filterable()
  {
    $tmpdatafield = "";
	$tmpfilteroperator = "";
    if (($this->input->get('filterscount')))
    {
      $filterscount = $this->input->get('filterscount');

      if ($filterscount > 0)
      {
        for ($i=0; $i < $filterscount; $i++)
          {
          // get the filter's value.
          $filtervalue = $this->input->get("filtervalue" . $i);
          // get the filter's condition.
          $filtercondition = $this->input->get("filtercondition" . $i);
          // get the filter's column.
          $filterdatafield = $this->input->get("filterdatafield" . $i);
          // get the filter's operator.
          $filteroperator = $this->input->get("filteroperator" . $i);


          // build the "WHERE" clause depending on the filter's condition, value and datafield.
          if ($tmpdatafield == "")
      		{
      		$tmpdatafield = $filterdatafield;
      		}
      	  else if ($tmpdatafield <> $filterdatafield)
      		{
      		$where.= ") AND (";
      		}
      	  else if ($tmpdatafield == $filterdatafield)
      		{
      		if ($tmpfilteroperator == 0)
      			{
					$where.= " AND ";
      			}
      		  else $where.= " OR ";
      		}
          $where = "";
          switch($filtercondition)
          {
            case "NOT_EMPTY":
            case "NOT_NULL":
              $this->db->not_like($filterdatafield,'" . "" ."');
              //$where .= " " . $filterdatafield . " NOT LIKE '" . "" ."'";
              break;
            case "EMPTY":
            case "NULL":
              $this->db->like($filterdatafield,'" . "" ."');
              $where .= " " . $filterdatafield . " LIKE '" . "" ."'";
              break;
            case "CONTAINS_CASE_SENSITIVE":
              $this->db->like($filterdatafield,$filtervalue);
              $where .= " BINARY  " . $filterdatafield . " LIKE '%" . $filtervalue ."%'";
              break;
            case "CONTAINS":
              $this->db->like($filterdatafield,$filtervalue);
              $where .= " " . $filterdatafield . " LIKE '%" . $filtervalue ."%'";
              break;
            case "DOES_NOT_CONTAIN_CASE_SENSITIVE":
              $this->db->not_like($filterdatafield,$filtervalue);
              $where .= " BINARY " . $filterdatafield . " NOT LIKE '%" . $filtervalue ."%'";
              break;
            case "DOES_NOT_CONTAIN":
              $this->db->not_like($filterdatafield,$filtervalue);
              $where .= " " . $filterdatafield . " NOT LIKE '%" . $filtervalue ."%'";
              break;
            case "EQUAL_CASE_SENSITIVE":
              $this->db->where($filterdatafield,$filtervalue);
              $where .= " BINARY " . $filterdatafield . " = '" . $filtervalue ."'";
              break;
            case "EQUAL":
              $this->db->where($filterdatafield,$filtervalue);
              $where .= " " . $filterdatafield . " = '" . $filtervalue ."'";
              break;
            case "NOT_EQUAL_CASE_SENSITIVE":
              $this->db->where($filterdatafield." <>",$filtervalue);
              $where .= " BINARY " . $filterdatafield . " <> '" . $filtervalue ."'";
              break;
            case "NOT_EQUAL":
              $this->db->where($filterdatafield." <>",$filtervalue);
              $where .= " " . $filterdatafield . " <> '" . $filtervalue ."'";
              break;
            case "GREATER_THAN":
              $this->db->where($filterdatafield." >",$filtervalue);
              $where .= " " . $filterdatafield . " > '" . $filtervalue ."'";
              break;
            case "LESS_THAN":
              $this->db->where($filterdatafield." <",$filtervalue);
              $where .= " " . $filterdatafield . " < '" . $filtervalue ."'";
              break;
            case "GREATER_THAN_OR_EQUAL":
              $this->db->where($filterdatafield." >=",$filtervalue);
              $where .= " " . $filterdatafield . " >= '" . $filtervalue ."'";
              break;
            case "LESS_THAN_OR_EQUAL":
              $this->db->where($filterdatafield." <=",$filtervalue);
              $where .= " " . $filterdatafield . " <= '" . $filtervalue ."'";
              break;
            case "STARTS_WITH_CASE_SENSITIVE":
              $this->db->like($filterdatafield,$filtervalue,"after");
              $where .= " BINARY " . $filterdatafield . " LIKE '" . $filtervalue ."%'";
              break;
            case "STARTS_WITH":
              $this->db->like($filterdatafield,$filtervalue,"after");
              $where .= " " . $filterdatafield . " LIKE '" . $filtervalue ."%'";
              break;
            case "ENDS_WITH_CASE_SENSITIVE":
            $this->db->like($filterdatafield,$filtervalue,"before");
              $where .= " BINARY " . $filterdatafield . " LIKE '%" . $filtervalue ."'";
              break;
            case "ENDS_WITH":
              $this->db->like($filterdatafield,$filtervalue,"before");
              $where .= " " . $filterdatafield . " LIKE '%" . $filtervalue ."'";
              break;
          }
			
			$tmpfilteroperator = $filteroperator;
			$tmpdatafield = $filterdatafield;


        }
        // build the query.

      }
    }
  }
  public function sortable()
  {
    if (($this->input->get('sortdatafield')))
    {
      $sortfield = $this->input->get('sortdatafield');
      $sortorder = $this->input->get('sortorder');

      if ($sortfield != NULL)
      {
        if ($sortorder == "desc")
        {
          $this->db->order_by($sortfield,"DESC");
        }
        else if ($sortorder == "asc")
        {
          $this->db->order_by($sortfield,"ASC");
        }
      }
    }
  }
}
?>
