<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_masakan extends CI_Controller {

	
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
            $data['title'] = "List Masakan - Restoran";
            if ($this->input->post('simpan')) {
                $data = [
                    "nama_masakan" => htmlspecialchars($this->input->post('nama_masakan',true)),
                    "harga" => $this->input->post('harga',true),
                    "status_masakan" => htmlspecialchars($this->input->post('status_masakan',true)),
                ];

                $save = $this->m_crud->save('tb_masakan',$data);
                if ($save) {
                    $this->session->set_flashdata('msg','Data Berhasil DiSimpan!');
                    redirect('admin/c_masakan');
                }else{  
                    $this->session->set_flashdata('msg','Data Gagal DiSimpan!');
                    redirect('admin/c_masakan');
                }
            }
            $data['list_masakan'] = $this->m_crud->getAll('tb_masakan');
            $this->load->view('partial/header',$data);
            $this->load->view('page/admin/masakan/v_masakan',$data);
            $this->load->view('partial/footer');
        }else{
            echo "Anda tidak dapat mengakses halaman ini!";
        }
    }
    
    public function delete($id)
    {
        if ($this->session->userdata('akses') == 1) {
            $delete = $this->m_crud->delete('id_masakan',$id,'tb_masakan');
            if ($delete) {
                $this->session->set_flashdata('msg','Data Berhasil DiHapus!');
                redirect('admin/c_masakan');
            }else{  
                $this->session->set_flashdata('msg','Data Gagal DiHapus!');
                redirect('admin/c_masakan');
            }
        }else{
        echo "Anda tidak dapat mengakses halaman ini!";
        }
    }

    public function edit($id)
    {
        if ($this->session->userdata('akses') == 1) {
            
            $data['val'] = 1;
            $data['list_masakan'] = $this->m_crud->getAll('tb_masakan');
            $data['edit'] = $this->m_crud->getWhere('tb_masakan','id_masakan',$id);

            if ($this->input->post('update')) {
                $data = [
                    "nama_masakan" => htmlspecialchars($this->input->post('nama_masakan',true)),
                    "harga" => $this->input->post('harga',true),
                    "status_masakan" => htmlspecialchars($this->input->post('status_masakan',true)),
                ];
                $update = $this->m_crud->update('id_masakan',$id,'tb_masakan',$data);
                if ($update) {
                    $this->session->set_flashdata('msg','Data Berhasil DiUpdate!');
                    redirect('admin/c_masakan');
                }else{  
                    $this->session->set_flashdata('msg','Data Gagal DiUpdate!');
                    redirect('admin/c_masakan');
                }
            }
            $data['title'] = "Edit Masakan - Restoran";
            $this->load->view('partial/header',$data);
            $this->load->view('page/admin/masakan/v_masakan',$data);
            $this->load->view('partial/footer');
        }else{
        echo "Anda tidak dapat mengakses halaman ini!";
        }
    }

}
