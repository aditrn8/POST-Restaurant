<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_orderdetail extends CI_Controller {

	
	public function __construct()
	{
        parent::__construct();
        if ($this->session->userdata('tiket') != true) {
            redirect('c_login_user');
        }
		$this->load->model('m_crud');
	}

    public function order($id)
    {
        if ($this->session->userdata('pelanggan') == 5) {
        $data['title'] = "Order Detail - Restoran";
            if ($this->input->post('simpan')) {
                $data = [
                    "id_order" => $id,
                    "id_masakan" => htmlspecialchars($this->input->post('id_masakan',true)),
                    "qty" =>  htmlspecialchars($this->input->post('qty',true)),
                    "keterangan" =>  htmlspecialchars($this->input->post('keterangan',true)),
                    "status_detail_order" => 0
                ];

                $save = $this->m_crud->save('detail_order',$data);
                if ($save) {
                    $this->session->set_flashdata('msg','Data Berhasil DiUpdate!');
                    redirect('pelanggan/c_orderDetail/order/'.$id);
                }else{  
                    $this->session->set_flashdata('msg','Data Gagal DiUpdate!');
                    redirect('pelanggan/c_orderDetail/order/'.$id);
                }
            }
        }else{
            echo "Anda tidak dapat mengakses halaman ini!";
        }
        $data['cek'] = $this->m_crud->getWhere('orders','id_order',$id = $this->session->userdata('order'));
        $data['list_orderDetail'] = $this->m_crud->getWhereStatus('query_detail_order','id_order',$id = $this->session->userdata('order'));
        $data['cek_masakan'] = $this->m_crud->getWhereStatus('tb_masakan','status_masakan', $id = 2);
        $this->load->view('partial/header_pelanggan',$data);
        $this->load->view('page/pelanggan/order/v_orderDetail',$data);
        $this->load->view('partial/footer');
    }

    public function editOrder($id)
    {
        $data['val'] = 1;
        if ($this->session->userdata('pelanggan') == 5) {
            $data['title'] = "Order Detail - Restoran";
                if ($this->input->post('update')) {
                    $data = [
                        "id_order" => $_GET['order'],
                        "id_masakan" => htmlspecialchars($this->input->post('id_masakan',true)),
                        "qty" =>  htmlspecialchars($this->input->post('qty',true)),
                        "keterangan" =>  htmlspecialchars($this->input->post('keterangan',true)),
                        "status_detail_order" => 0
                    ];
    
                    $update = $this->m_crud->update('id_detail_order',$id,'detail_order',$data);
                    if ($update) {
                        $this->session->set_flashdata('msg','Data Berhasil DiUpdate!');
                        redirect('pelanggan/c_orderdetail/order/'.$_GET['order']);
                    }else{  
                        $this->session->set_flashdata('msg','Data Gagal DiUpdate!');
                        redirect('pelanggan/c_orderdetail/order/'.$_GET['order']);
                    }
                }
            }else{
                echo "Anda tidak dapat mengakses halaman ini!";
            }
            $data['cek'] = $this->m_crud->getWhere('orders','id_order',$id = $this->session->userdata('order'));
            $data['edit'] = $this->m_crud->getWhere('query_detail_order','id_detail_order',$id1 = $id );
            // $data['list_orderDetail'] = $this->m_crud->getWhereStatus('query_detail_order','id_order',$_GET['order']);
            $data['cek_masakan'] = $this->m_crud->getWhereStatus('tb_masakan','status_masakan', $id = 2);
            $this->load->view('partial/header_pelanggan',$data);
            $this->load->view('page/pelanggan/order/v_orderDetail',$data);
            $this->load->view('partial/footer');
    }

}
