<?php class Laporan extends CI_Controller{
    
    function __construct(){
        parent::__construct();
        $this->load->library(array('template'));
        $this->load->model('m_laporan');
        
        if(!$this->session->userdata('username')){
            redirect('web');
        }
    }
    
    function anggota(){
        $data['title']="Data Anggota";
        $data['anggota']=$this->m_laporan->semuaAnggota()->result();
        $this->template->display('laporan/anggota',$data);
    }
    
    function buku(){
        $data['title']="Data Buku";
        $data['buku']=$this->m_laporan->semuaBuku()->result();
        $this->template->display('laporan/buku',$data);
    }
    
    function inventaris(){
        $data['title']="Laporan Inventaris";
        $this->template->display('laporan/inventaris',$data);
    }
    
    function cari_inventaris(){
        $data['title']="Detail Inventaris";
        $tanggal1=$this->input->post('tanggal1');
        $tanggal2=$this->input->post('tanggal2');
        $data['lap']=$this->m_laporan->detailinventaris($tanggal1,$tanggal2)->result();
        $this->load->view('laporan/cari_inventaris',$data);
    }
    
    function detail_inventaris($id){
        $data['title']=$id;
        $data['inventaris']=$this->m_laporan->detail_inventaris($id)->row_array();
        $data['detail']=$this->m_laporan->detail_inventaris($id)->result();
        $this->template->display('laporan/detail_inventaris',$data);
    }
    
    function pengembalian(){
        $data['title']="Data Pengembalian";
        $this->template->display('laporan/pengembalian',$data);
    }
    
    function cari_pengembalian(){
        $data['title']="Detail Pengembalian";
        $tanggal1=$this->input->post('tanggal1');
        $tanggal2=$this->input->post('tanggal2');
        $data['lap']=$this->m_laporan->detailpengembalian($tanggal1,$tanggal2)->result();
        $this->load->view('laporan/cari_pengembalian',$data);
    }
}