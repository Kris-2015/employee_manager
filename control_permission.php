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
     $data[] = [];
     //fetching the role and privileges of user by employee_id
   	 $get_auth =  "SELECT e.id, e.role_id, 
         (SELECT r.role FROM role r WHERE r.role_id = e.role_id)as role,
         (SELECT p.name FROM privilege p WHERE p.privilege_id = rrp.privilege_id)as privilege,
         (SELECT res.resource FROM resource res WHERE res.resource_id = rrp.resource_id )as resource
         FROM employee e
         LEFT JOIN role_resource_privilege rrp ON e.role_id = rrp.role_id
         LEFT JOIN privilege p ON rrp.privilege_id = p.privilege_id
         LEFT JOIN resource res ON rrp.resource_id  = res.resource_id
         WHERE e.id = 122";

      //return mysqli_query($this->connect,$get_auth);
      $query = mysqli_query($this->connect,$get_auth);
      if(mysqli_num_rows($query) > 0)
      {
        while($row = mysqli_fetch_assoc($query))
        {
          $data[] = $row;
        }
      }
      $auth_data = $query;
      echo "<pre>";
      print_r($data);
      exit;
   }
   /*
    *function is checking the role, priviledges and resources 
    * @access: public 
    * @return:
   */
   public function getRolePrivilegeResource($role_id)
   {

   }
   /**/
   public function isResourceAllowed($resource)
   {

   }
   /**/
}
?>