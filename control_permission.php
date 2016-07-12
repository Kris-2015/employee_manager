<?php
include("connection.php");

/*
 * @author: mfsi_krishnadev
 * @purpose: access control
*/
class ACL extends db_connection
{
	/*
     * @access: public 
     * @param: role_id
     * @return: roles and privilege
	*/
   public function getrole($role_id)
   {
   	 $getrole_id = $role_id;
     //fetching the role and privileges of user by employee_id
   	 $get_auth =  "SELECT r.name, p.name
   	     FROM employee_roles er
   	     LEFT JOIN role r ON er.role_id = r.id
   	     LEFT JOIN privilege p ON er.privilege_id = p.id
   	     WHERE er.employee_id = $getrole_id";
     
      return mysqli_query($this->connect,$get_auth);
   }
   /*
    
   */
}
?>