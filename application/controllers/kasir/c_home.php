<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_home extends CI_Controller {

	
	public function __construct()
	{
        parent::__construct();
        if ($this->session->userdata('masuk') != true) {
            redirect('');
        }
		$this->load->model('m_crud');
	}
	
	public function index()
	{
		if ($this->session->userdata('akses') == 2) {
            $data['title'] = "Home - Restoran";
            $this->load->view('partial/header',$data);
            $this->load->view('page/kasir/v_home',$data);
            $this->load->view('partial/footer');
        }else{
            echo "Anda tidak dapat mengakses halaman ini!";
        }
	}


}
