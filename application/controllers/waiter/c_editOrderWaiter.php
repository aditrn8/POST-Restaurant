<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_editOrderWaiter extends CI_Controller {

	
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
            $data['title'] = "Edit Order Waiter";
            $data['list_orderDetail'] = $this->m_crud->getWhereStatus('query_detail_order','status_detail_order',$id = 1);
        }else{
            echo "Anda tidak dapat mengakses halaman ini!";
        }

        $this->load->view('partial/header',$data);
        $this->load->view('page/waiter/order/v_editOrderWaiter',$data);
        $this->load->view('partial/footer');
    }

    public function update($id)
    {
        if ($this->session->userdata('akses') == 3) {
            $data = [
                "status_detail_order" => 2
            ];

            $update = $this->m_crud->update('id_detail_order',$id,'detail_order',$data);
            if ($update) {
                $this->session->set_flashdata('msg','Data Berhasil Di Update!');
                redirect('waiter/c_editOrderWaiter');
            }else{  
                $this->session->set_flashdata('msg','Data Gagal Di Update!');
                redirect('waiter/c_editOrderWaiter');
            }
        }else{
            echo "Anda tidak dapat mengakses halaman ini!";
        }
    }
}