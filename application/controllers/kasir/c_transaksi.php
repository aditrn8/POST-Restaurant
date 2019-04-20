<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_transaksi extends CI_Controller {

	
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
		if ($this->session->userdata('akses') == 2) {
            $data['title'] = "List Transaksi - Restoran";
            $data['list_orderDetail'] = $this->m_crud->getWhereStatus('orders','status_order',$id = 0);
            $this->load->view('partial/header',$data);
            $this->load->view('page/kasir/transaksi/v_listTransaksi',$data);
            $this->load->view('partial/footer');
        }else{
            echo "Anda tidak dapat mengakses halaman ini!";
        }
    }
    
    public function proses($id)
	{
		if ($this->session->userdata('akses') == 2) {
            $data['title'] = "Transaksi - Restoran";
            $ku = $id;
            if ($this->input->post('simpan')) {
                $meja = $this->m_crud->getWhere('orders','id_order',$id);
                $data = [
                    "id_user" => $this->session->userdata('id_user'),
                    "id_order" => $id,
                    "total_harga" => $this->input->post('total_harga'),
                    "total_bayar" => $this->input->post('total_bayar'),
                    "kembalian" => $this->input->post('kembalian'),
                ];

                $data2 = [
                    "status_meja" => 1
                ];

                $data3 = [
                    "status_order" => 1
                ];

                $save = $this->m_crud->save('transaksi',$data);
                $updatee = $this->m_crud->update('id_order',$id,'orders',$data3);
                $update = $this->m_crud->update('id_meja',$id = $meja['no_meja'],'meja',$data2);
                if ($save) {
                    $this->session->set_flashdata('msg','Transaksi Berhasil');
                    redirect('kasir/c_transaksi/struk/'.$ku);
                }else{
                    $this->session->set_flashdata('msg','Transaksi gagal');
                    redirect('kasir/c_transaksi/proses/'.$ku);
                }
            }
            $data['cek'] = $this->m_crud->getWhere('orders','id_order',$id);        
            $data['list_orderDetail'] = $this->m_crud->getWhereStatus('query_detail_order','id_order',$id);
            $this->load->view('partial/header',$data);
            $this->load->view('page/kasir/transaksi/v_transaksi',$data);
            $this->load->view('partial/footer');
        }else{
            echo "Anda tidak dapat mengakses halaman ini!";
        }
    }

    public function struk($id)
    {
        if ($this->session->userdata('akses') == 2) {
            $data['list_orderDetail'] = $this->m_crud->getWhereStatus('query_detail_order','id_order',$id);
            $data['trans'] = $this->m_crud->getWhereStatus('transaksi','id_order',$id);
        $this->load->view('page/kasir/transaksi/v_struk',$data);
        }else{
            echo "Anda tidak dapat mengakses halaman ini!";
        }
    }

}
