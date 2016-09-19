<?php
class M_Laporan extends CI_Model{
    #code
    
    function semuaAnggota(){
        return $this->db->get("anggota");
    }
    
    function semuaBuku(){
        return $this->db->get("buku");
    }
    
    function detailinventaris($tanggal1,$tanggal2){
        return $this->db->query("select * from header_inventaris where tgl_inventaris between '$tanggal1' and '$tanggal2' group by kode_inventaris");
    }
    
    function detail_inventaris($id){
        $this->db->select("*");
        $this->db->from("header_inventaris");
        $this->db->where("kode_inventaris",$id);
        $this->db->join("barang","barang.kode_barang=header_inventaris.kode_barang");
        return $this->db->get();
    }
    
    function detailpengembalian($tanggal1,$tanggal2){
        return $this->db->query("select * from pengembalian where tgl_pengembalian between '$tanggal1' and '$tanggal2' group by id_transaksi");
    }
}
