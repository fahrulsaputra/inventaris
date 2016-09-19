<?php
class Pengadaan extends CI_Controller{
    private $limit=20;
    
    function __construct(){
        parent::__construct();
        $this->load->library(array('template','form_validation','pagination','upload'));
        $this->load->model('m_pengadaan');
        $this->load->helper('form','url');
        
        if(!$this->session->userdata('username')){
            redirect('web');
        }
    }
    
    function index($offset=0,$order_column='id_pengadaan',$order_type='asc'){
        if(empty($offset)) $offset=0;
        if(empty($order_column)) $order_column='id_pengadaan';
        if(empty($order_type)) $order_type='asc';
        
        //load data
        $table='pengadaan';
        $data['pengadaan']=$this->m_pengadaan->semua($this->limit,$offset,$order_column,$order_type)->result();
        $data['id_pengadaan'] = $this->m_pengadaan->get_id_pengadaan();
        $data['title']="Data Pengadaan";
        $config['base_url']=site_url('anggota/index/');
        $config['total_rows']=$this->m_pengadaan->jumlah();
        $config['per_page']=$this->limit;
        $config['uri_segment']=3;
        $this->pagination->initialize($config);
        $data['pagination']=$this->pagination->create_links();
       
        
        if($this->uri->segment(3)=="delete_success")
            $data['message']="<div class='alert alert-success'>Data berhasil dihapus</div>";
        else if($this->uri->segment(3)=="add_success")
            $data['message']="<div class='alert alert-success'>Data Berhasil disimpan</div>";
        else
            $data['message']='';

            $data['query'] = $this->m_pengadaan->getalldata($table);
            $this->template->display('pengadaan/index',$data);

    }

    
    
    function tambah(){
        $table='pengadaan';
        $data['title']="Tambah Pengadaan";
        $this->_set_rules();
        if($this->form_validation->run()==true){//jika validasi dijalankan dan benar
            $kode=$this->input->post('kode'); // mendapatkan input dari kode
            $cek=$this->m_pengadaan->cek($kode); // cek kode di database
            if($cek->num_rows()>0){ // jika kode sudah ada, maka tampilkan pesan
                $data['message']="<div class='alert alert-danger'>Kode Aset sudah ada</div>";
                $this->template->display('pengadaan/tambah',$data);
            }else{ // jika kode buku belum ada, maka simpan
                
                //setting konfiguras upload image
                $config['upload_path'] = './assets/img/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '1000';
        $config['max_width']  = '2000';
        $config['max_height']  = '1024';
                
                $this->upload->initialize($config);
                if(!$this->upload->do_upload('gambar')){
                    $gambar="";
                }else{
                    $gambar=$this->upload->file_name;
                }
                
                $info=array(
                    'id_pengadaan'=>$this->input->post('kode'),
                    'kategori'=>$this->input->post('kategori'),
                    'kondisi'=>$this->input->post('kondisi'),
                    'tanggal_masuk'=>$this->input->post('tanggal_masuk'),
                    'merk'=>$this->input->post('merk'),
                    'type'=>$this->input->post('type'),
                    'jumlah'=>$this->input->post('jumlah'),
                    'garansi'=>$this->input->post('garansi')

                );
                $this->m_pengadaan->simpan($info);
                redirect('pengadaan/index/add_success');

            }
        }else{
            $data['message']="";
            $data['kodeunik'] = $this->m_pengadaan->getkodeunik($table);
            $this->template->display('pengadaan/tambah',$data);
        }
    }
    
    function edit($id){
        $data['title']="Edit data Pengadaan";
        $this->_set_rules();
        if($this->form_validation->run()==true){
            $kode=$this->input->post('kode');
            
            //setting konfiguras upload image
            $config['upload_path'] = './assets/img/';
        $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '1000';
        $config['max_width']  = '2000';
        $config['max_height']  = '1024';
                
            $this->upload->initialize($config);
            if(!$this->upload->do_upload('gambar')){
                $gambar="";
            }else{
                $gambar=$this->upload->file_name;
            }
            
            $info=array(
                'id_pengadaan'=>$this->input->post('kode'),
            );
            $this->m_pengadaan->update($kode,$info);
            
            $data['pengadaan']=$this->m_pengadaan->cek($id)->row_array();
            $data['message']="<div class='alert alert-success'>Data berhasil diupdate</div>";
            $this->template->display('pengadaan/edit',$data);
        }else{
            $data['message']="";
            $data['pengadaan']=$this->m_pengadaan->cek($id)->row_array();
            $this->template->display('pengadaan/edit',$data);
        }
    }
    
    function hapus(){
        $kode=$this->input->post('kode');
        $detail=$this->m_pengadaan->cek($kode)->result();
    foreach($detail as $det):
        unlink("assets/img/".$det->image);
    endforeach;
        $this->m_pengadaan->hapus($kode);
    }
    
    function cari(){
        $data['title']="Pencarian";
        $cari=$this->input->post('cari');
        $cek=$this->m_pengadaan->cari($cari);
        if($cek->num_rows()>0){
            $data['message']="";
            $data['pengadaan']=$cek->result();
            $this->template->display('pengadaan/cari',$data);
        }else{
            $data['message']="<div class='alert alert-success'>Data tidak ditemukan</div>";
            $data['pengadaan']=$cek->result();
            $this->template->display('pengadaan/cari',$data);
        }
    }
    
    function _set_rules(){
        $this->form_validation->set_rules('kode','Kode Aset','required|trim');
        $this->form_validation->set_rules('kategori','Kategori','required|trim');
        $this->form_validation->set_rules('kondisi','Kondisi','required|trim');
        $this->form_validation->set_rules('tanggal_masuk','Tanggal Masuk','required|trim');
        $this->form_validation->set_rules('merk','Merk','required|trim');
        $this->form_validation->set_rules('type','Type','required|trim');
        $this->form_validation->set_rules('jumlah','Jumlah','required|trim');
        $this->form_validation->set_rules('garansi','Garansi Kadaluarsa','required|trim');
        $this->form_validation->set_error_delimiters("<div class='alert alert-danger'>","</div>");
    }
}