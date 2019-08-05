<?php
class VerifyLogin extends CI_Controller
{

  /*function __construct()
 {
   parent::__construct();
   $this->load->library('template');
   $this->load->library('session');
   $this->load->model('User','',TRUE);
 }*/

  function index()
  {
    //This method will have the credentials validation

    $this->load->library('form_validation');

    $this->form_validation->set_rules('username', 'username', 'trim|required');
    $this->form_validation->set_rules('password', 'password', 'trim|required|callback_check_database');

    if ($this->form_validation->run() == FALSE) {


      $this->template->loginpage();
    } else {

      redirect('Process', 'refresh');
    }
  }

  function check_database($password)
  {
    //Field validation succeeded.  Validate against database
    $username = $this->input->post('username');

    //query the database
    $result = $this->User->login($username, md5($password));
    $sess_name = array(1 => "sess_admin", 2 => "sess_absensi", 3 => "sess_pengelola", 4 => "sess_pengelola", 5 => "sess_personal", 6 => "sess_pengelola");
    if ($result) {

      $sess_array = array();
      foreach ($result as $row) {

        $sess_array = array(
          'id_user' => $row->id_user,
          'id_role' => $row->id_role,
          'id_user' => $row->id_user,
          'photo' => $row->photo,
          'supdeptid' => $row->supdeptid,
          'DeptID' => $row->DeptID,
          'DeptName' => $row->DeptName,
          'id_staff' => $row->id_staff,
          'nama_staff' => $row->nama_staff,
          'nip' => $row->nip,
        );

        $this->session->set_userdata($sess_name[$row->id_role], $sess_array);


        $data_log['id_user'] = $row->id_user;
        $data_log['id_staff'] = $row->id_staff;
        $data_log['aktivitas'] = "Login ke sistem";
        $res_log = $this->LogModel->insert($data_log);
      }
      return TRUE;
    } else {
      $this->form_validation->set_message('check_database', 'Invalid username or password');
      return false;
    }
  }
}
