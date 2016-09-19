<?php
class M_pimpinan extends CI_Model{
    private $table="pimpinan";
    private $primary="kode_pimpinan";
    
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
        $this->db->or_like("jabatan",$cari);
        return $this->db->get($this->table);
    }

    function getkodeunik($table) { 
        $this->db->select('RIGHT(pimpinan.kode_pimpinan,6) as kode', FALSE);
        $this->db->order_by('kode_pimpinan','DESC');
        $this->db->limit(1);
        $query = $this->db->get('pimpinan');
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
        $kodejadi = "PMP".$kodemax;
        return $kodejadi;

    }

    function cekJabatan($jabatan){
        $this->db->where("jabatan",$jabatan);
        return $this->db->get("pimpinan");
    }

}