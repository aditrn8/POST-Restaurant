<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_login extends CI_Controller {

	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_crud');
	}
	
	public function index()
	{
		$this->load->view('v_login');
	}

	public function auth()
	{
		$username = htmlspecialchars($this->input->post('username',true));
		$password = base64_encode($this->input->post('password',true));

		$cek = $this->m_crud->auth($username,$password);
		if ($cek->num_rows() > 0) {
			$this->session->set_userdata('masuk', true);
			$data = $cek->row_array();
			if ($data['id_level'] == 1) {
				$this->session->set_userdata('akses', 1);
				$this->session->set_userdata('id_user', $data['id_user']);
				$this->session->set_userdata('nama_user', $data['nama_user']);
				redirect('admin/c_home');		
			}else if ($data['id_level'] == 2) {
				$this->session->set_userdata('akses', 2);
				$this->session->set_userdata('id_user', $data['id_user']);
				$this->session->set_userdata('nama_user', $data['nama_user']);
				redirect('kasir/c_transaksi');		
			}else if ($data['id_level'] == 3) {
				$this->session->set_userdata('akses', 3);
				$this->session->set_userdata('id_user', $data['id_user']);
				$this->session->set_userdata('nama_user', $data['nama_user']);
				redirect('waiter/c_editOrderWaiter');		
			}else{
				$this->session->set_userdata('akses', 4);
				$this->session->set_userdata('id_user', $data['id_user']);
				$this->session->set_userdata('nama_user', $data['nama_user']);
				redirect('owner/c_home');		
			}
		}else{
			$this->session->set_flashdata('msg','Username / Password Salah! Harap Periksa Kembali!');
			redirect('');	
		}
	}

	public function logout()
	{
		
			$this->session->unset_userdata('masuk');
			$this->session->unset_userdata('akses');
			$this->session->unset_userdata('id_user');
			$this->session->unset_userdata('nama_user');
			redirect('');
		
		
	}
}
