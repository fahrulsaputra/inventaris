<?php
class M_Inventaris extends CI_Model{
    private $table="inventaris";
    
   function getkodeunik() { 
        $this->db->select('RIGHT(inventaris.kode_inventaris,6) as kode', FALSE);
        $this->db->order_by('kode_inventaris','DESC');
        $this->db->limit(1);
        $query = $this->db->get('inventaris');
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
    
    function getLokasi(){
        return $this->db->get("lokasi");
    }
    
    function cariLokasi($kode){
        $this->db->where("kode_lokasi",$kode);
        return $this->db->get("lokasi");
    }

    function getBarang(){
        return $this->db->get("barang");
    }
    
    function cariBarang($kode){
        $this->db->where("kode_barang",$kode);
        return $this->db->get("barang");
    }
    
    function simpanTmp($info){
        $this->db->insert("tmp",$info);
    }
    
    function tampilTmp(){
        return $this->db->get("tmp");
    }
    
    function cekTmp($kode){
        $this->db->where("kode_barang",$kode);
        return $this->db->get("tmp");
    }
    
    function jumlahTmp(){
        return $this->db->count_all("tmp");
    }
    
    function hapusTmp($kode){
        $this->db->where("kode_barang",$kode);
        $this->db->delete("tmp");
    }
    
    function simpan($info){
        $this->db->insert("transaksi_inventaris",$info);
    }
    
    function pencarianbarang($cari){
        $this->db->like("nama_barang",$cari);
        return $this->db->get("barang");
    }
    
}