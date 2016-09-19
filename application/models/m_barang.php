<?php
class M_barang extends CI_Model{
    private $table="barang";
    private $primary="kode_barang";
    
    function semua($limit=10,$offset=0,$order_column='',$order_type='asc'){
        if(empty($order_column) || empty($order_type))
            $this->db->order_by($this->primary,'asc');
        else
            $this->db->order_by($order_column,$order_type);
        return $this->db->get($this->table,$limit,$offset);
    }
    
    function jumlah(){
        return $this->db->count_all($this->table);
    }
    
    function cek($kode){
        $this->db->where($this->primary,$kode);
        $query=$this->db->get($this->table);
        
        return $query;
    }

    function cekNama($nama){
        $this->db->where("nama_barang",$nama);
        return $this->db->get("barang");
    }
    
    function simpan($info){
        $this->db->insert($this->table,$info);
        return $this->db->insert_id();
    }
    
    function update($kode,$info){
        $this->db->where($this->primary,$kode);
        $this->db->update($this->table,$info);
    }
    
    function hapus($kode){
        $this->db->where($this->primary,$kode);
        $this->db->delete($this->table);
    }
    
    function cari($cari){
        $this->db->like($this->primary,$cari);
        $this->db->or_like("nama_barang",$cari);
        return $this->db->get($this->table);
    }

       function getkodeunik($table) { 
        $this->db->select('RIGHT(barang.kode_barang,6) as kode', FALSE);
        $this->db->order_by('kode_barang','DESC');
        $this->db->limit(1);
        $query = $this->db->get('barang');
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
        $kodejadi = "BRG".$kodemax;
        return $kodejadi;

    }

}