<?php
require_once("user.php");
/*
 * @author: mfsi_krishnadev
 * @class: ajax operation for searching, sorting and pagination
*/

class data_filter extends user
{
	/*
     * @access: public
     * @param: 
     * @return: array
	*/
	public function searching($name,$email)
	{
		$search_name = $name;
       	$search_email = $email;
       		
        $searched_result = [];
        $get_result = $this->search_user($search_name, $search_email);
        if (mysqli_num_rows($get_result) > 0)
        {
           while ($row = mysqli_fetch_assoc($get_result))
            {
               $searched_result[] = $row;
            }
        }
        return $searched_result; 
	}

	/*
	 * @access: public
	 * @param: field name and order of arrangement
	 * @return: array
	*/
	public function sorting($fieldname,$order)
	{
		$field_name = $fieldname;
		$orderby = $order;

		$sorted_result = [];
		$result  = $this->sort($field_name,$orderby);

		if (mysqli_num_rows($result) > 0)
    	{
      	  while ($row = mysqli_fetch_assoc($result))
          {
       	    $sorted_result[] = $row;
          }
        }
       return $sorted_result;
	}
	/*
     * @access: public 
     * @param: start row and number of row
     * @return: array
	*/
	public function paging($starting_row) 
	{
	   $start_row = $starting_row;
	   //$result = $page->pagination($start_row, $number_of_rows);
	   $result = $this->pagination($start_row);

	   $get_data = [];

	   //$no_of_rows = mysqli_num_rows($result)/3;

	  if(mysqli_num_rows($result) > 0)
	  {
	    while($row = mysqli_fetch_assoc($result))
		{	
	       $get_data[] = $row;
		}
       }
       return $get_data;
	}
}

?>