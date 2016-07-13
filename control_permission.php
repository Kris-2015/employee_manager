<?php
include ("connection.php");

/*
* @author: mfsi_krishnadev
* @purpose: access control
*/
class role extends db_connection

{
  /*
  * @access: public
  * @param: role_id
  * @return: roles and privilege
  */
  public

  function getrole($role_id)
  {
    $getrole_id = $role_id;

    // fetching the role and privileges of user by employee_id

    $get_auth = "SELECT res.resource, p.name AS privilege, r.role 
      FROM role_resource_privilege rrp
      LEFT JOIN role r ON rrp.role_id = r.role_id
      LEFT JOIN privilege p ON rrp.privilege_id = p.privilege_id
      LEFT JOIN resource res ON rrp.resource_id = res.resource_id
      WHERE rrp.role_id =$getrole_id";
    $query = mysqli_query($this->connect, $get_auth);
    while ($row = $query->fetch_assoc())
    {
      $data[$row['resource']] = $row['privilege'];
    }

    $_SESSION['user_permission'] = $data;
  }

  /*
  *function is checking the role, priviledges and resources
  * @access: public
  * @return:
  */
  public

  function isResourceAllowed($resource)
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
}

?>