<?php
class Inventaris extends CI_Controller{
    
    function __construct(){
        parent::__construct();
        $this->load->library(array('form_validation','template'));
        $this->load->model('m_inventaris');
        
        if(!$this->session->userdata('username')){
            redirect('web');
        }
    }
    
    function index(){
        $data['title']="Transaksi Inventaris";
        $data['tanggalinventaris']=date('Y-m-d');
        $data['kodeunik'] = $this->m_inventaris->getkodeunik();
        $data['lokasi']=$this->m_inventaris->getLokasi()->result();
        $data['barang']=$this->m_inventaris->getBarang()->result();
        $this->template->display('inventaris/index',$data);
    }
    
    function tampil(){
        $data['tmp']=$this->m_inventaris->tampilTmp()->result();
        $data['jumlahTmp']=$this->m_inventaris->jumlahTmp();
        $this->load->view('inventaris/tampil',$data);
    }
    
    function sukses(){
        
        $tmp=$this->m_inventaris->tampilTmp()->result();
        foreach($tmp as $row){
            $info=array(
                'kode_transaksi'=>$this->input->post('kode'),
                'tanggal_transaksi'=>$this->input->post('tanggal')
            );
            $this->m_inventaris->simpan($info);
            
            //hapus data di temp
            $this->m_inventaris->hapusTmp($row->kode_barang);
        }
    }
    
    function cariLokasi(){
        $kode=$this->input->post('kode');
        $lokasi=$this->m_inventaris->cariLokasi($kode);
        if($lokasi->num_rows()>0){
            $lokasi=$lokasi->row_array();
            echo $lokasi['nama_lokasi'];
        }
    }
    
    function cariBarang(){
        $kode=$this->input->post('kode');
        $barang=$this->m_inventaris->cariBarang($kode);
        if($barang->num_rows()>0){
            $barang=$barang->row_array();
            echo $barang['nama_barang'];
        }
    }
    
    
    function tambah(){
        $kode=$this->input->post('kode');
        $cek=$this->m_inventaris->cekTmp($kode);
        if($cek->num_rows()<1){
            $info=array(
                'kode_barang'=>$this->input->post('kode'),
                'tahun_perolehan'=>$this->input->post('tahun'),
                'baik'=>$this->input->post('baik'),
                'rusak_total'=>$this->input->post('rusak'),
                'perlu_perbaikan'=>$this->input->post('perlu'),
                'lokasi'=>$this->input->post('lokasi')

            );
            $this->m_inventaris->simpanTmp($info);
        }
    }
    
    function hapus(){
        $kode=$this->input->post('kode');
        $this->m_inventaris->hapusTmp($kode);
    }
    
    function pencarianbarang(){
        $cari=$this->input->post('caribarang');
        $data['barang']=$this->m_inventaris->pencarianbarang($cari)->result();
        $this->load->view('inventaris/pencarianbarang',$data);
    }
}