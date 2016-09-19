<?php
class Pimpinan extends CI_Controller{
    private $limit=20;
    
    function __construct(){
        parent::__construct();
        $this->load->library(array('template','form_validation','pagination','upload'));
        $this->load->model('m_pimpinan');
        
        if(!$this->session->userdata('username')){
            redirect('web');
        }
    }
    
    function index($offset=0,$order_column='kode_pimpinan',$order_type='asc'){
        if(empty($offset)) $offset=0;
        if(empty($order_column)) $order_column='kode_pimpinan';
        if(empty($order_type)) $order_type='asc';
        
        //load data
        $data['pimpinan']=$this->m_pimpinan->semua($this->limit,$offset,$order_column,$order_type)->result();
        $data['title']="Data Pimpinan";
        
        $config['base_url']=site_url('pimpinan/index/');
        $config['total_rows']=$this->m_pimpinan->jumlah();
        $config['per_page']=$this->limit;
        $config['uri_segment']=3;
        $this->pagination->initialize($config);
        $data['pagination']=$this->pagination->create_links();
        
        
        if($this->uri->segment(3)=="delete_success")
            $data['message']="<div class='alert alert-success'>Data berhasil dihapus</div>";
        else if($this->uri->segment(3)=="add_success")
            $data['message']="<div class='alert alert-success'>Data Berhasil disimpan</div>";
         else if($this->uri->segment(3)=="update_success")
            $data['message']="<div class='alert alert-success'>Data Berhasil diupdate</div>";
        else
            $data['message']='';
            $this->template->display('pimpinan/index',$data);
    }
    
    
    function tambah(){
        $table='pimpinan';
        $data['title']="Tambah Pimpinan";
        $data['kodeunik'] = $this->m_pimpinan->getkodeunik($table);
        $this->_set_rules();
        if($this->form_validation->run()==true){//jika validasi dijalankan dan benar
            $jabatan=$this->input->post('jabatan'); // mendapatkan input dari kode
            $cek=$this->m_pimpinan->cekJabatan($jabatan); // cek kode di database
            if($cek->num_rows()>0){ // jika kode sudah ada, maka tampilkan pesan
                $data['message']="<div class='alert alert-danger'>Jabatan sudah ada</div>";
                $this->template->display('pimpinan/tambah',$data);
            }else{ // jika kode buku belum ada, maka simpan
                
                //setting konfiguras upload image
                $config['upload_path'] = './assets/img/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '1000';
		$config['max_width']  = '2000';
		$config['max_height']  = '1024';
                
                $this->upload->initialize($config);
                if(!$this->upload->do_upload('gambar')){
                    $gambar="";
                }else{
                    $gambar=$this->upload->file_name;
                }
                
                $info=array(
                    'kode_pimpinan'=>$this->input->post('kode'),
                    'jabatan'=>$this->input->post('jabatan'),
                    'nama_pimpinan'=>$this->input->post('nama')
                );
                $this->m_pimpinan->simpan($info);
                redirect('pimpinan/index/add_success');

            }
        }else{
            $data['message']="";
            $this->template->display('pimpinan/tambah',$data);
        }
    }
    
    function edit($id){
        $data['title']="Edit data Pimpinan";
        $this->_set_rules();
        if($this->form_validation->run()==true){
            $kode=$this->input->post('kode');
            
            //setting konfiguras upload image
            $config['upload_path'] = './assets/img/';
	    $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']	= '1000';
	    $config['max_width']  = '2000';
	    $config['max_height']  = '1024';
                
            $this->upload->initialize($config);
            if(!$this->upload->do_upload('gambar')){
                $gambar="";
            }else{
                $gambar=$this->upload->file_name;
            }
            
            $info=array(
                'kode_pimpinan'=>$this->input->post('kode'),
                'jabatan'=>$this->input->post('jabatan'),
                'nama_pimpinan'=>$this->input->post('nama'),
            );
            $this->m_pimpinan->update($kode,$info);
            redirect('pimpinan/index/update_success');
            
            $data['pimpinan']=$this->m_pimpinan->cek($id)->row_array();
            $data['message']="<div class='alert alert-success'>Data berhasil diupdate</div>";
            $this->template->display('pimpinan/edit',$data);
        }else{
            $data['message']="";
            $data['pimpinan']=$this->m_pimpinan->cek($id)->row_array();
            $this->template->display('pimpinan/edit',$data);
        }
    }
    
    function hapus(){
        $kode=$this->input->post('kode');
        $detail=$this->m_pimpinan->cek($kode)->result();
	foreach($detail as $det):
	    unlink("assets/img/".$det->image);
	endforeach;
        $this->m_pimpinan->hapus($kode);
    }
    
    function cari(){
        $data['title']="Pencarian";
        $cari=$this->input->post('cari');
        $cek=$this->m_pimpinan->cari($cari);
        if($cek->num_rows()>0){
            $data['message']="";
            $data['pimpinan']=$cek->result();
            $this->template->display('pimpinan/cari',$data);
        }else{
            $data['message']="<div class='alert alert-success'>Data tidak ditemukan</div>";
            $data['pimpinan']=$cek->result();
            $this->template->display('pimpinan/cari',$data);
        }
    }
    
    function _set_rules(){
        $this->form_validation->set_rules('kode','Kode Pimpinan','required|max_length[15]');
        $this->form_validation->set_rules('jabatan','Jabatan','required|max_length[50]');
        $this->form_validation->set_rules('nama','Nama Pimpinan','required|max_length[50]');
        $this->form_validation->set_error_delimiters("<div class='alert alert-danger'>","</div>");
    }
}