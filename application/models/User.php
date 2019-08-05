<?php
class User extends CI_Model
{
  function login($username, $password)
  {


    $this->db->select('s.nama as nama_staff,u.id_user,u.id_role,u.nip,u.password,s.id_staff,u.photo,u.DeptID,p.supdeptid,p.DeptName as DeptName');
    $this->db->from('user u');
    $this->db->join('staff s', 'u.id_user = s.id_user');
    $this->db->join('departments p', 'u.DeptID = p.DeptID');
    // $this->db->join ('departments m', 'u.DeptID = m.supdeptid');
    $this->db->join('iclock i', 'u.DeptID = i.DeptID');
    // $this->db->join ('iclock l', 'm.DeptID = l.DeptID');
    $this->db->where('u.id_user', $username);
    $this->db->where('u.password', $password);

    $query = $this->db->get();

    if ($query->num_rows() == 1) {
      return $query->result();
    } else {
      return false;
    }
  }

  function update_password($data)
  {
    $sql = "UPDATE user SET password='" . md5($data['password']) . "' WHERE id_user='" . $data['id_user'] . "'";
    $res = $this->db->query($sql);

    return $res;
  }

  function get($data)
  {
    $sql = "SELECT * from user where id_user = '" . $data['id_user'] . "'";
    $res = $this->db->query($sql);
    return $res->result_array();
  }

  function get_nip($data)
  {
    $sql = "SELECT nip from user where id_user = '" . $data['id_user'] . "'";
    $res = $this->db->query($sql);
    return $res->result_array();
  }

  function insert($data)
  {
    $sql = "INSERT INTO user (id_user,id_role,DeptID,nip,password) values('" . $data['id_user'] . "','" . $data['role'] . "','" . $data['DeptID'] . "','" . $data['nip'] . "',md5('" . $data['password'] . "'))";
    $res = $this->db->query($sql);
    $res = $this->db->insert_id();
    return $res;
  }

  function update_role_by_id($data)
  {
    $sql = "UPDATE user set id_role = '" . $data['id_role'] . "', DeptID = '" . $data['DeptID'] . "' , nip = '" . $data['nip'] . "' 
    WHERE id_user = '" . $data['id_user'] . "'";
    $res = $this->db->query($sql);
    return $res;
  }

  function delete_user_by_id($data)
  {
    $sql = "DELETE from user where id_user = '" . $data['id_user'] . "'";
    $res = $this->db->query($sql);
    return $res;
  }
}
