<?php
class M_pengadaan extends CI_Model{
    private $table="pengadaan";
    private $primary="id_pengadaan";
    
    function semua($limit=10,$offset=0,$order_column='',$order_type='asc'){
        if(empty($order_column) || empty($order_type))
            $this->db->order_by($this->primary,'asc');
        else
            $this->db->order_by($order_column,$order_type);
        return $this->db->get($this->table,$limit,$offset);
    }

    function getInventaris() {
        $row=$this->db->get('inventaris');
        return $row->result();
    }

    

    function get_id_pengadaan() {
        $tahun = date("Y");
        $kode = 'MHS';
        $query = $this->db->query("SELECT MAX(id_pengadaan) as max_id FROM pengadaan"); 
        $row = $query->row_array();
        $max_id = $row['max_id']; 
        $max_id1 =(int) substr($max_id,9,5);
        $id_pengadaan = $max_id1 +1;
        $maxid_pengadaan = $kode.'-'.$tahun.'-'.sprintf("%04s",$id_pengadaan);
        return $maxid_pengadaan;
     }
    
    function jumlah(){
        return $this->db->count_all($this->table);
    }
    
    function cek($kode){
        $this->db->where($this->primary,$kode);
        $query=$this->db->get($this->table);
        
        return $query;
    }
    
    function simpan($jenis){
        $this->db->insert($this->table,$jenis);
        return $this->db->insert_id();
    }
    
    function update($kode,$jenis){
        $this->db->where($this->primary,$kode);
        $this->db->update($this->table,$jenis);
    }
    
    function hapus($kode){
        $this->db->where($this->primary,$kode);
        $this->db->delete($this->table);
    }
    
    function cari($cari){
        $this->db->like($this->primary,$cari);
        $this->db->or_like("id_pengadaan",$cari);
        return $this->db->get($this->table);
    }

    function getalldata($table) { 
     $this->db->select('*'); 
     $this->db->from($table);    
     $query = $this->db->get();         
     return $query->result(); 
    }
     
   function getkodeunik($table) { 
        $this->db->select('RIGHT(pengadaan.id_pengadaan,6) as kode', FALSE);
        $this->db->order_by('id_pengadaan','DESC');
        $this->db->limit(1);
        $query = $this->db->get('pengadaan');
            //cek dulu apakah ada sudah ada kode di tabel.
        if($query->num_rows() <> 0){
            //jika kode ternyata sudah ada.
        $data = $query->row();$kode = intval($data->kode) + 1;
        }else{
            //jika kode belum ada
        $kode = 1;
    }
        $kodemax = str_pad(
        $kode, 6, "0", STR_PAD_LEFT);
        $kodejadi = "INV".$kodemax;
        return $kodejadi;

    }

}