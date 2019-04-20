<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_meja extends CI_Controller {

	
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
            $data['title'] = "List Meja - Restoran";
            if ($this->input->post('simpan')) {
                $data = [
                    "status_meja" => 1
                ];

                $save = $this->m_crud->save('meja',$data);
                if ($save) {
                    $this->session->set_flashdata('msg','Data Berhasil DiSimpan!');
                    redirect('admin/c_meja');
                }else{  
                    $this->session->set_flashdata('msg','Data Gagal DiSimpan!');
                    redirect('admin/c_meja');
                }
            }
            $data['list_meja'] = $this->m_crud->getAll('meja');
            $this->load->view('partial/header',$data);
            $this->load->view('page/admin/meja/v_meja',$data);
            $this->load->view('partial/footer');
        }else{
            echo "Anda tidak dapat mengakses halaman ini!";
        }
    }

    public function update($id)
	{
		if ($this->session->userdata('akses') == 1) {
            $data = [
                "status_meja" => 0
            ];

            $save = $this->m_crud->update('id_meja',$id,'meja',$data);
            if ($save) {
                $this->session->set_flashdata('msg','Data Berhasil DiUpdate!');
                redirect('admin/c_meja');
            }else{  
                $this->session->set_flashdata('msg','Data Gagal DiUpdate!');
                redirect('admin/c_meja');
            }
        }else{
            echo "Anda tidak dapat mengakses halaman ini!";
        }
    }

    public function updatee($id)
	{
		if ($this->session->userdata('akses') == 1) {
            $data = [
                "status_meja" => 1
            ];

            $save = $this->m_crud->update('id_meja',$id,'meja',$data);
            if ($save) {
                $this->session->set_flashdata('msg','Data Berhasil DiUpdate!');
                redirect('admin/c_meja');
            }else{  
                $this->session->set_flashdata('msg','Data Gagal DiUpdate!');
                redirect('admin/c_meja');
            }
        }else{
            echo "Anda tidak dapat mengakses halaman ini!";
        }
    }

}
