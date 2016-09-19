<?php
class Supplier extends CI_Controller{
    
    function __construct(){
        parent::__construct();
        $this->load->model('m_supplier');
        $this->load->library(array('form_validation','template'));
        
        if(!$this->session->userdata('username')){
            redirect('web');
        }
    }
    
    function index(){
        $data['title']="Data Supplier";
        $data['supplier']=$this->m_supplier->semua()->result();
        if($this->uri->segment(3)=="delete_success")
            $data['message']="<div class='alert alert-success'>Data berhasil dihapus</div>";
        else if($this->uri->segment(3)=="add_success")
            $data['message']="<div class='alert alert-success'>Data Berhasil disimpan</div>";
        else
            $data['message']='';
        $this->template->display('supplier/index',$data);
    }
    
    function tambah(){
        $data['title']="Tambah Supplier";
        $this->_set_rules();
        if($this->form_validation->run()==true){
            $supplier=$this->input->post('supplier');
            $cek=$this->m_supplier->cekKode($supplier);
            if($cek->num_rows()>0){
                $data['message']="<div class='alert alert-danger'>Supplier sudah ada</div>";
                $this->template->display('supplier/tambah',$data);
            }else{
                $info=array(
                    'supplier'=>$this->input->post('supplier')
                );
                $this->m_supplier->simpan($info);
                redirect('supplier/index/add_success');
            }
        }else{
            $data['message']="";
            $this->template->display('supplier/tambah',$data);
        }
    }
    
    function edit($id){
        $data['title']="Update data Supplier";
        $this->_set_rules();
        if($this->form_validation->run()==true){
            $id=$this->input->post('id');
            $info=array(
                'supplier'=>$this->input->post('supplier')
            );
            $this->m_supplier->update($id,$info);
            $data['supplier']=$this->m_supplier->cekId($id)->row_array();
            $data['message']="<div class='alert alert-success'>Data Berhasil diupdate</div>";
            $this->template->display('supplier/edit',$data);
        }else{
            $data['message']="";
            $data['supplier']=$this->m_supplier->cekId($id)->row_array();
            $this->template->display('supplier/edit',$data);
        }
    }
    
    function hapus(){
        $kode=$this->input->post('kode');
        $this->m_suppler->hapus($kode);
    }
    
    function _set_rules(){
        $this->form_validation->set_rules('supplier','Supplier','required|trim');
        $this->form_validation->set_rules('alamat','Alamat','required|trim');
        $this->form_validation->set_rules('no_telp','No. Telepon','required|trim');
        $this->form_validation->set_error_delimiters("<div class='alert alert-danger'>","</div>");
    }
    
}