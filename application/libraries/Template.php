<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Template{
	private $ci;
		
	public function __construct(){
		$this->ci =& get_instance();
	}
	
	public function viewtable($data)
	{
		$this->ci->load->view('template/dosentabel',$data);
	}

	public function loginpage()
	{
		$this->ci->load->view('template/login');
	}
	public function view($content, $user_number, $datacontent=NULL, $data=NULL){
		if(!$this->is_ajax()){
			if($user_number==1)
			{
				$nav = "template/admin/main_navigation";
				$top_nav = "template/admin/top_navigation";
			}
			else if($user_number==2)
			{
				$nav = "template/absensi/main_navigation";
				$top_nav = "template/absensi/top_navigation";
			}
			else if($user_number==3)
			{
				$nav = "template/pengelola/main_navigation";
				$top_nav = "template/pengelola/top_navigation";
			}else if($user_number==4)
			{
				$nav = "template/personal/main_navigation";
				$top_nav = "template/personal/top_navigation";
			}

			$template['navigation'] = $this->ci->load->view($nav, $datacontent, TRUE);
			$template['top_navigation'] = $this->ci->load->view($top_nav, $datacontent, TRUE);
			$template['content'] = $this->ci->load->view($content, $datacontent, TRUE);
			//$template['nav_header'] = $this->ci->load->view('template/nav_header', NULL, TRUE);
			$this->ci->load->view('template/index', $template);
		}else{
			//$this->ci->load->view($content, $data);
		}
	}
	
	private function is_ajax(){
		return (
			$this->ci->input->server('HTTP_X_REQUESTED_WITH') &&
			($this->ci->input->server('HTTP_X_REQUESTED_WITH') ==
			'XMLHttpRequest'));
	}
}

/* End of file Template.php */
/* Location: ./application/libraries/Template.php */