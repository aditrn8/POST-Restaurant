<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_login_user extends CI_Controller {

	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_crud');
	}
	
	public function index()
	{
		$this->load->view('v_login_user');
	}

	public function auth_user()
	{
		$username = htmlspecialchars($this->input->post('Nama',true));
		$password = $this->input->post('password',true);

		$cek = $this->m_crud->auth_user($password);
        if($cek->num_rows() > 0){
            $this->session->set_userdata('tiket',true);
            $data = $cek->row_array();
            
            if ($data['status_meja']==1) {
                $save = $this->m_crud->save('user',$data=["username" => $username, "password" => base64_encode($password), "nama_user" => $username, "id_level" => 5]);
                $update = $this->m_crud->update('id_meja',$id = $password,'meja',$data=["status_meja" => 2]);
                
                if ($save && $update) {
                    $cek_user = $this->m_crud->getWhere('user','username',$id = $username);
                    
                    $save2 = $this->m_crud->save('orders',$data=["no_meja" => $password, "id_user" => $cek_user['id_user'] ,"keterangan" => $username, "status_order" => 0]);
                    if ($save2) {
                        $cek_order = $this->m_crud->getWheree('orders','no_meja',$id1 = $password,'status_order',$id2=0);
                        $this->session->set_userdata('order',$cek_order['id_order']);
                        $this->session->set_userdata('meja',$password);
                        $this->session->set_userdata('id_pelanggan',$cek_user['id_user']);
                        $this->session->set_userdata('nama_pelanggan',$cek_user['nama_user']);
                        $this->session->set_userdata('pelanggan',5);

                        redirect('pelanggan/c_home');
                    }else{
                        echo "gagal";
                    }
                    
                }else{
                    echo "Gagal";
                }
            }elseif($data['status_meja']==2){
                $this->session->set_flashdata('msg','Meja Sudah Terisi!');
			    redirect('c_login_user');
            }else{
                $this->session->set_flashdata('msg','Meja Tidak Tersedia!');
			    redirect('c_login_user');
            }

        }else if($password < 0){
            $this->session->set_flashdata('msg','No Meja Tidak Boleh 0');
			    redirect('c_login_user');
        }
	}

	public function logout()
	{
        $update = $this->m_crud->update('id_meja',$id = $this->session->userdata('meja'),'meja',$data=["status_meja" => 1]);
        $delete = $this->m_crud->delete('username',$id = $this->session->userdata('nama_pelanggan'),'user');
        if ($update && $delete) {
            $this->session->unset_userdata('tiket');
            $this->session->unset_userdata('order');
			$this->session->unset_userdata('meja');
			$this->session->unset_userdata('pelanggan');
			$this->session->unset_userdata('id_pelanggan');
			$this->session->unset_userdata('nama_pelanggan');
			redirect('c_login_user');
        }
			
		
		
	}
}
