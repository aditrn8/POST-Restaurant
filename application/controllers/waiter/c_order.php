<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_order extends CI_Controller {

	
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
            $data['title'] = "Order - Restoran";
            if ($this->input->post('simpan')) {
                $data = [
                    "id_user" => $this->session->userdata('id_user'),
                    "no_meja" => htmlspecialchars($this->input->post('id_meja',true)),
                    "keterangan" =>  htmlspecialchars($this->input->post('keterangan',true)),
                    "status_order" => 0
                ];

                $save = $this->m_crud->save('orders',$data);
                $update = $this->m_crud->update('id_meja',$id = $this->input->post('id_meja'),'meja',$data = ["status_meja" => 2]);
                if ($save) {
                    $this->session->set_flashdata('msg','Data Berhasil DiSimpan!');
                    redirect('waiter/c_order');
                }else{  
                    $this->session->set_flashdata('msg','Data Gagal DiSimpan!');
                    redirect('waiter/c_order');
                }
            }
            $data['cek_meja'] = $this->m_crud->getWhereStatus('meja','status_meja',$id = 1);
            $data['list_order'] = $this->m_crud->getWhereStatus('orders','status_order',$id = 0);
            $this->load->view('partial/header',$data);
            $this->load->view('page/waiter/order/v_order',$data);
            $this->load->view('partial/footer');
        }else{
            echo "Anda tidak dapat mengakses halaman ini!";
        }
    }
    
    public function delete($id)
    {
        if ($this->session->userdata('akses') == 3) {
            $delete = $this->m_crud->delete('id_order',$id,'orders');
            $update = $this->m_crud->update('id_meja',$id = $_GET['meja'],'meja',$data = ["status_meja" => 1]);
            if ($delete) {
                $this->session->set_flashdata('msg','Data Berhasil DiHapus!');
                redirect('waiter/c_order');
            }else{  
                $this->session->set_flashdata('msg','Data Gagal DiHapus!');
                redirect('waiter/c_order');
            }
        }else{
        echo "Anda tidak dapat mengakses halaman ini!";
        }
    }

    public function deleteOrder($id)
    {
        if ($this->session->userdata('akses') == 3) {
            $delete = $this->m_crud->delete('id_detail_order',$id,'detail_order');
            if ($delete) {
                $this->session->set_flashdata('msg','Data Berhasil DiHapus!');
                redirect('waiter/c_order/order/'.$_GET['order']);
            }else{  
                $this->session->set_flashdata('msg','Data Gagal DiHapus!');
                redirect('waiter/c_order/order/'.$_GET['order']);
            }
        }else{
        echo "Anda tidak dapat mengakses halaman ini!";
        }
    }

    public function edit($id)
    {
        if ($this->session->userdata('akses') == 3) {
            
            $data['val'] = 1;
            $data['edit'] = $this->m_crud->getWhere('orders','id_order',$id);
            $data['list_order'] = $this->m_crud->getWhereStatus('orders','status_order',$id = 0);
            $data['cek_meja'] = $this->m_crud->getWhereStatus('meja','status_meja',$id = 1);

            if ($this->input->post('update')) {
                if ( $_GET['meja'] == $this->input->post('id_meja') ) {
                    $data = [
                        "id_user" => $this->session->userdata('id_user'),
                        "no_meja" => $_GET['meja'],
                        "keterangan" =>  htmlspecialchars($this->input->post('keterangan',true)),
                        "status_order" => 0
                    ];

                    $update = $this->m_crud->update('id_order',$id,'orders',$data);
                    $update2 = $this->m_crud->update('id_meja',$id = $_GET['meja'],'meja',$data = ["status_meja" => 2]);
                    if ($update) {
                        $this->session->set_flashdata('msg','Data Berhasil DiUpdate!');
                        redirect('waiter/c_order');
                    }else{  
                        $this->session->set_flashdata('msg','Data Gagal DiUpdate!');
                        redirect('waiter/c_order');
                    }
                }else{
                    $data = [
                        "id_user" => $this->session->userdata('id_user'),
                        "no_meja" => htmlspecialchars($this->input->post('id_meja',true)),
                        "keterangan" =>  htmlspecialchars($this->input->post('keterangan',true)),
                        "status_order" => 0
                    ];

                    $update = $this->m_crud->update('id_order',$id,'orders',$data);
                    $update2 = $this->m_crud->update('id_meja',$id = $_GET['meja'],'meja',$data = ["status_meja" => 1]);
                    if ($update) {
                        $this->session->set_flashdata('msg','Data Berhasil DiUpdate!');
                        redirect('waiter/c_order');
                    }else{  
                        $this->session->set_flashdata('msg','Data Gagal DiUpdate!');
                        redirect('waiter/c_order');
                    }
                }
            }
            $data['title'] = "Edit Order - Restoran";
            $this->load->view('partial/header',$data);
            $this->load->view('page/waiter/order/v_order',$data);
            $this->load->view('partial/footer');
        }else{
        echo "Anda tidak dapat mengakses halaman ini!";
        }
    }

    public function order($id)
    {
        if ($this->session->userdata('akses') == 3) {
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
                    redirect('waiter/c_order/order/'.$id);
                }else{  
                    $this->session->set_flashdata('msg','Data Gagal DiUpdate!');
                    redirect('waiter/c_order/order/'.$id);
                }
            }
        }else{
            echo "Anda tidak dapat mengakses halaman ini!";
        }
        $data['list_orderDetail'] = $this->m_crud->getWhereStatus('query_detail_order','id_order',$id);
        $data['cek_masakan'] = $this->m_crud->getWhereStatus('tb_masakan','status_masakan', $id = 2);
        $this->load->view('partial/header',$data);
        $this->load->view('page/waiter/order/v_orderDetail',$data);
        $this->load->view('partial/footer');
    }

    public function editOrder($id)
    {
        $data['val'] = 1;
        if ($this->session->userdata('akses') == 3) {
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
                        redirect('waiter/c_order/order/'.$_GET['order']);
                    }else{  
                        $this->session->set_flashdata('msg','Data Gagal DiUpdate!');
                        redirect('waiter/c_order/order/'.$_GET['order']);
                    }
                }
            }else{
                echo "Anda tidak dapat mengakses halaman ini!";
            }
            $data['edit'] = $this->m_crud->getWhere('query_detail_order','id_detail_order',$id1 = $id );
            $data['list_orderDetail'] = $this->m_crud->getWhereStatus('query_detail_order','id_order',$_GET['order']);
            $data['cek_masakan'] = $this->m_crud->getWhereStatus('tb_masakan','status_masakan', $id = 2);
            $this->load->view('partial/header',$data);
            $this->load->view('page/waiter/order/v_orderDetail',$data);
            $this->load->view('partial/footer');
    }

}
