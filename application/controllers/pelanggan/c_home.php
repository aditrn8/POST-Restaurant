<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_home extends CI_Controller {

	
	public function __construct()
	{
        parent::__construct();
        if ($this->session->userdata('tiket') != true) {
            redirect('');
        }
		$this->load->model('m_crud');
	}
	
	public function index()
	{
		if ($this->session->userdata('pelanggan') == 5) {
            $data['title'] = "Home Pelanggan - Restoran";
            $data['cek'] = $this->m_crud->getWhere('orders','id_order',$id = $this->session->userdata('order'));
            $this->load->view('partial/header_pelanggan',$data);
            $this->load->view('page/pelanggan/v_home',$data);
            $this->load->view('partial/footer');
        }else{
            echo "Anda tidak dapat mengakses halaman ini!";
        }
	}


}
