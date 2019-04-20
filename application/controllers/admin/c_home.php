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
		if ($this->session->userdata('akses') == 1) {
            $data['title'] = "Home - Restoran";
            $this->load->view('partial/header',$data);
            $this->load->view('page/admin/v_home',$data);
            $this->load->view('partial/footer');
        }else{
            echo "Anda tidak dapat mengakses halaman ini!";
        }
    }
    
    public function hari()
    {
        $data['hari'] = $this->m_crud->hari();
        $this->load->view('partial/header',$data);
        $this->load->view('page/admin/v_hari',$data);
        $this->load->view('partial/footer');
    }

    public function makanan()
    {
        $data['makanan'] = $this->m_crud->getAll('tb_masakan');
        $this->load->view('partial/header',$data);
        $this->load->view('page/admin/v_makanan',$data);
        $this->load->view('partial/footer');
    }

    public function meja()
    {
        $data['meja'] = $this->m_crud->getWhereStatus('meja','status_meja',$id=0);
        $this->load->view('partial/header',$data);
        $this->load->view('page/admin/v_meja',$data);
        $this->load->view('partial/footer');
    }
}
