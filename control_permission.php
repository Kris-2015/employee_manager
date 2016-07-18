<?php
include_once ("connection.php");

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

    // fetching the role and privileges of user by employee_id
    $get_auth = "SELECT res.resource_name, p.name AS privilege, r.role_name 
      FROM role_resource_privilege rrp
      LEFT JOIN role r ON rrp.role_id = r.role_id
      LEFT JOIN privilege p ON rrp.privilege_id = p.privilege_id
      LEFT JOIN resource res ON rrp.resource_id = res.resource_id
      WHERE rrp.role_id =$getrole_id";

    $query = mysqli_query($this->connect, $get_auth);
    
    while ($row = $query->fetch_assoc())
    {
      $data[$row['resource_name']] = $row['privilege'];
    }
    $_SESSION['user_permission'] = $data;
    
  }
  /*
  *function is checking the role, priviledges and resources
  * @access: public
  * @return:
  */
  public function isResourceAllowed($resource)
  {
    $get_resource = trim("$resource", '/');
    foreach($_SESSION['user_permission'] as $find_resource => $value)
    {
      if ($find_resource === $get_resource)
      {
        $get_privilege = $value;
        return $get_privilege;
        exit;
      }
    }
    return 0;
  }
  /*
  * function to check if user has the permission to access this resource
  * @param: integer
  * @return: none
  */
  public function HadPermission($role)
  {
    $check_permission = "SELECT rrp.privilege_id,r.resource_name FROM role_resource_privilege rrp
          INNER JOIN resource r ON rrp.resource_id = r.resource_id
          WHERE rrp.role_id = $role";
    $see_permission = mysqli_query($this->connect, $check_permission);
    while ($row = $see_permission->fetch_assoc())
    {
      $data[] = $row['resource_name'];
    }
    $_SESSION['has_permission'] = $data;
    
  }
  /*
  * This function is used for dropdown
  * @param:
  * @return:
  */
  public function dropdown()
  {
    foreach($_SESSION['user_permission'] as $page => $val)
    {
      if (basename(__FILE__) == $page)
      {
        continue;
      }
      echo '<li><a href="' . $page . '">' . preg_replace('/\.[^.\s]{3,4}$/', '', $page) . '</a></li>' . "\n";
    }
  }
  /*
  * function for fetching the role, resource and privilege
  * @param:none
  * @return:array
  */
  public function getrrp()
  {
    
      $role = "SELECT role_id, role_name FROM role";
      $resource = "SELECT resource_id,  resource_name FROM resource";
      $privilege = "SELECT privilege_id, name FROM privilege ";

      $get_role = mysqli_query($this->connect, $role);
      $get_resource = mysqli_query($this->connect, $resource);
      $get_privilege = mysqli_query($this->connect, $privilege);
      $data = [];

      while($row = $get_role->fetch_assoc())
      {
        $data['role'][] = $row;
      }
      while($row = $get_resource->fetch_assoc())
      {
        $data['resource'][] = $row;
      }
      while($row = $get_privilege->fetch_assoc())
      {
        $data['privilege'][] = $row;
      }
      return $data;
   }
 }
?>