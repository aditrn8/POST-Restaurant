<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_user extends CI_Controller {

	
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
            $data['title'] = "List User - Restoran";
            $data['list_user'] = $this->m_crud->getAll('query_user');
            if ($this->input->post('simpan')) {
                $data = [
                    "username" => htmlspecialchars($this->input->post('username',true)),
                    "password" => base64_encode($this->input->post('password',true)),
                    "nama_user" => htmlspecialchars($this->input->post('nama_user',true)),
                    "id_level" => htmlspecialchars($this->input->post('id_level',true)),
                ];

                $save = $this->m_crud->save('user',$data);
                if ($save) {
                    $this->session->set_flashdata('msg','Data Berhasil DiSimpan!');
                    redirect('admin/c_user');
                }else{  
                    $this->session->set_flashdata('msg','Data Gagal DiSimpan!');
                    redirect('admin/c_user');
                }
            }
            $this->load->view('partial/header',$data);
            $this->load->view('page/admin/user/v_user',$data);
            $this->load->view('partial/footer');
        }else{
            echo "Anda tidak dapat mengakses halaman ini!";
        }
    }
    
    public function delete($id)
    {
        if ($this->session->userdata('akses') == 1) {
            $delete = $this->m_crud->delete('id_user',$id,'user');
            if ($delete) {
                $this->session->set_flashdata('msg','Data Berhasil DiHapus!');
                redirect('admin/c_user');
            }else{  
                $this->session->set_flashdata('msg','Data Gagal DiHapus!');
                redirect('admin/c_user');
            }
        }else{
        echo "Anda tidak dapat mengakses halaman ini!";
        }
    }

    public function edit($id)
    {
        if ($this->session->userdata('akses') == 1) {
            $data['title'] = "Edit User - Restoran";
            $data['val'] = 1;
            $data['list_user'] = $this->m_crud->getAll('query_user');
            $data['edit'] = $this->m_crud->getWhere('user','id_user',$id);

            if ($this->input->post('update')) {
                $data = [
                    "username" => htmlspecialchars($this->input->post('username',true)),
                    "password" => base64_encode($this->input->post('password',true)),
                    "nama_user" => htmlspecialchars($this->input->post('nama_user',true)),
                    "id_level" => htmlspecialchars($this->input->post('id_level',true)),
                ];
                $update = $this->m_crud->update('id_user',$id,'user',$data);
                if ($update) {
                    $this->session->set_flashdata('msg','Data Berhasil DiUpdate!');
                    redirect('admin/c_user');
                }else{  
                    $this->session->set_flashdata('msg','Data Gagal DiUpdate!');
                    redirect('admin/c_user');
                }
            }
            
            $this->load->view('partial/header',$data);
            $this->load->view('page/admin/user/v_user',$data);
            $this->load->view('partial/footer');
        }else{
        echo "Anda tidak dapat mengakses halaman ini!";
        }
    }

}
