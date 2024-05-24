<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	function __construct() {
        parent::__construct();
        $this->load->model('auths');  
		$this->auths->check();
    }
	
	public function index($data = ""){
		redirect(base_url('index.php/dashboard/pages/') . $data);
	}

	public function pages($page = "home")
	{
		if($page == "client"){
			if(!$this->auths->admin()) die;
		}
		$data['page'] = $page;
		$this->load->view('pages/base', $data);
	}
    
    public function loader($page = "home") {
		$data = [];
		
		switch ($page) {
			case 'client':
				if(!$this->auths->admin()) die;
				$data['company'] = $this->db->get('company')->result();
				$data['users'] = $this->db->where('id !=', $_SESSION['id'])->get('users')->result();
				$data['role'] = $this->db->get('role')->result();
				break;
			case 'dashboard':
				$data['company'] = $this->db->get('company')->result();
				if($_SESSION['company_id'] == 2){
					$data['dashboard'] = $this->db->get('dashboard')->result();
				} else {
					$data['dashboard'] = $this->db->where('company_id', $_SESSION['company_id'])->get('dashboard')->result();
				}
				break;
			default:
				break;
		}
        $this->load->view('pages/'.$page, $data);
    }

	public function modal($data){
		$data = explode("~~", $data);
		
		switch ($data[0]) {
			case 'newDashboard':
				if(!$this->auths->admin()) die;
				$return['company'] = $this->db->get('company')->result();
				$this->load->view('modal/newDashboard', $return);
				break;
			case 'newUser':
				if(!$this->auths->admin()) die;
				$return['role'] = $this->db->get('role')->result();
				$return['company'] = $this->db->get('company')->result();
				$this->load->view('modal/newUser', $return);
				break;
			case 'newCompany':
				if(!$this->auths->admin()) die;
				$this->load->view('modal/newCompany');
				break;
			case 'editUser':
				$return['data'] = $this->db->where('id', $data[1])->get('users')->result()[0];
				$return['role'] = $this->db->get('role')->result();
				$return['company'] = $this->db->get('company')->result();
				$this->load->view('modal/editUser', $return);
				break;
			case 'editCompany':
				if(!$this->auths->admin()) die;
				$return['data'] = $this->db->where('id', $data[1])->get('company')->result()[0];
				$this->load->view('modal/editCompany', $return);
				break;
			case 'editDashboard':
				if(!$this->auths->admin()) die;
				$return['company'] = $this->db->get('company')->result();
				$return['data'] = $this->db->where('id', $data[1])->get('dashboard')->result()[0];
				$this->load->view('modal/editDashboard', $return);
			  	break;
			default:
			  	echo $data[0];
		}

	}
}
