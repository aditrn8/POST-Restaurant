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
		if ($this->session->userdata('akses') == 3) {
            $data['title'] = "List User - Restoran";
            $data['list_user'] = $this->m_crud->getWhereStatus('query_user','id_level',$id = 5);
            $data['list_meja'] = $this->m_crud->getAll('meja');
            $meja = $this->input->post('password');
            if ($this->input->post('simpan')) {
                $data = [
                    "username" => htmlspecialchars($this->input->post('username',true)),
                    "password" => base64_encode($this->input->post('password',true)),
                    "nama_user" => htmlspecialchars($this->input->post('username',true)),
                    "id_level" => htmlspecialchars($this->input->post('id_level',true)),
                ];

                $save = $this->m_crud->save('user',$data);
                $update = $this->m_crud->update('id_meja',$id = $meja,'meja',$dataku = ["status_meja" => 2]);
                $savee =$this->m_crud->save('orders',$data=["no_meja" => $meja, "status_order" => 0]);
                if ($save) {
                    $this->session->set_flashdata('msg','Data Berhasil DiSimpan!');
                    redirect('waiter/c_user');
                }else{  
                    $this->session->set_flashdata('msg','Data Gagal DiSimpan!');
                    redirect('waiter/c_user');
                }
            }
            $this->load->view('partial/header',$data);
            $this->load->view('page/waiter/user/v_user',$data);
            $this->load->view('partial/footer');
        }else{
            echo "Anda tidak dapat mengakses halaman ini!";
        }
    }
    
    public function delete($id)
    {
        if ($this->session->userdata('akses') == 3) {
            $delete = $this->m_crud->delete('id_user',$id,'user');
            $update = $this->m_crud->update('id_meja',$id = $_GET['meja'],'meja',$dataku = ["status_meja" => 1]);
            $delete = $this->m_crud->deletee($id = $_GET['meja']);
            if ($delete) {
                $this->session->set_flashdata('msg','Data Berhasil DiHapus!');
                redirect('waiter/c_user');
            }else{  
                $this->session->set_flashdata('msg','Data Gagal DiHapus!');
                redirect('waiter/c_user');
            }
        }else{
        echo "Anda tidak dapat mengakses halaman ini!";
        }
    }

}
