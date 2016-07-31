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
 public function sorting($fieldname,$order,$start_row)
 {
	$field_name = $fieldname;
	$orderby = $order;
	$starting_row = $start_row;

	$sorted_result = [];

	$sort_query = "SELECT CONCAT(prefix, ' ',first_name, ' ',middle_name , ' ', last_name)as name, gender, email_id, dob,  marital_status, id,
			(SELECT GROUP_CONCAT(street, ',',city, ',',state, '-',zip) AS residence 
			FROM address addr 
			WHERE type = 'residence' 
			AND addr.employee_id = e.id)as residence,
			(SELECT GROUP_CONCAT(street, ',',city, ',',state, '-',zip) AS office 
			FROM address addr 
			WHERE type = 'office' 
			AND addr.employee_id = e.id)as office,
			(SELECT type FROM communication commu  WHERE commu.employee_id = e.id )as communication
			FROM employee e
			ORDER BY $field_name $orderby
			LIMIT $start_row , 3";

	$result  = mysqli_query($this->connect, $sort_query);

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
 public function paging($fieldname='first_name',$order='asc',$starting_row=0) 
 {

   $start_row = $starting_row;
   $field_name = $fieldname;
   $orderby = $order;

    $data = "SELECT id, CONCAT(prefix,' ',first_name,' ',middle_name,' ',last_name)as name, email_id,
	        gender, dob, marital_status, github_username,
	        (SELECT GROUP_CONCAT(street,',',city,',',state,'-',zip)AS residence
	        FROM address addr
	        WHERE type = 'residence'
	        AND addr.employee_id = e.id)as residence,
	        (SELECT GROUP_CONCAT(street,',',city,',',state,'-',zip)AS office
	        FROM address addr
	        WHERE type = 'office'
	        AND addr.employee_id = e.id)as office,
	        (SELECT type FROM communication comm WHERE comm.employee_id = e.id)as communication
	        FROM employee e 
	        ORDER BY $field_name $orderby
	        LIMIT $start_row , 3";//ORDER BY $field_name $orderby

   $result = mysqli_query($this->connect, $data);

   $get_data = [];
   
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