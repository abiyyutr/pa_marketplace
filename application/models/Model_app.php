<?php 

class Model_app extends CI_model{
    public function view($table){
        return $this->db->get($table);
    }

    public function insert($table,$data){
        return $this->db->insert($table, $data);
    }

    public function edit($table, $data){
        return $this->db->get_where($table, $data);
    }
 
    public function update($table, $data, $where){
        return $this->db->update($table, $data, $where); 
    }

    public function delete($table, $where){
        return $this->db->delete($table, $where);
    }

    public function view_where($table,$data){
        $this->db->where($data);
        return $this->db->get($table);
    }

    public function view_ordering_limit($table,$order,$ordering,$baris,$dari){
        $this->db->select('*');
        $this->db->order_by($order,$ordering);
        $this->db->limit($dari, $baris);
        return $this->db->get($table);
    }

    public function view_where_ordering_limit($table,$data,$order,$ordering,$baris,$dari){
        $this->db->select('*');
        $this->db->where($data);
        $this->db->order_by($order,$ordering);
        $this->db->limit($dari, $baris);
        return $this->db->get($table);
    }
    
    public function view_ordering($table,$order,$ordering){
        $this->db->select('*');
        $this->db->from($table);
        $this->db->order_by($order,$ordering);
        return $this->db->get()->result_array();
    }

    public function view_where_ordering($table,$data,$order,$ordering){
        $this->db->where($data);
        $this->db->order_by($order,$ordering);
        $query = $this->db->get($table);
        return $query->result_array();
    }

    public function view_join_one($table1,$table2,$field,$order,$ordering){
        $this->db->select('*');
        $this->db->from($table1);
        $this->db->join($table2, $table1.'.'.$field.'='.$table2.'.'.$field);
        $this->db->order_by($order,$ordering);
        return $this->db->get()->result_array();
    }

    public function view_join_where($table1,$table2,$field,$where,$order,$ordering){
        $this->db->select('*');
        $this->db->from($table1);
        $this->db->join($table2, $table1.'.'.$field.'='.$table2.'.'.$field);
        $this->db->where($where);
        $this->db->order_by($order,$ordering);
        return $this->db->get()->result_array();
    }

    function umenu_akses($link,$id){
        return $this->db->query("SELECT * FROM modul,users_modul WHERE modul.id_modul=users_modul.id_modul AND users_modul.id_session='$id' AND modul.link='$link'")->num_rows();
    }

    public function cek_login($username,$password,$table){
        return $this->db->query("SELECT * FROM $table where username='".$this->db->escape_str($username)."' AND password='".$this->db->escape_str($password)."' AND validasi='Sudah'");
    }

    function grafik_pelakuUmkm(){
        return $this->db->query("SELECT count(*) as id_reseller,tanggal_daftar FROM rb_reseller GROUP BY tanggal_daftar ORDER BY tanggal_daftar");
    }
    // function grafik_penjualkota(){
    //     return $this->db->query("SELECT count(*) as a.*, b.id_reseller, c.nama_kota FROM rb_produk a LEFT JOIN rb_reseller b ON a.id_reseller=b.id_reseller
    //     LEFT JOIN rb_kota c ON b.kota_id=c.kota_id where a.id_reseller AND a.id_kategori_produk ORDER BY a.id_produk");
    // }
    function grafik_penjualan(){
        return $this->db->query("SELECT count(*) as id_konfirmasi_pembayaran,tanggal_transfer FROM rb_konfirmasi_pembayaran_konsumen GROUP BY tanggal_transfer");
    }
    function grafik_pelanggan(){
        return $this->db->query("SELECT count(*) as id_konsumen,tanggal_daftar FROM rb_konsumen GROUP BY tanggal_daftar ORDER BY nama_lengkap");
    }
    // function kategori_populer($limit){
    //     return $this->db->query("SELECT * FROM (SELECT a.*, b.jum_dibaca FROM
    //                                 (SELECT * FROM kategori) as a left join
    //                                 (SELECT id_kategori, sum(dibaca) as jum_dibaca FROM berita GROUP BY id_kategori) as b on a.id_kategori=b.id_kategori) as c 
    //                                     where c.aktif='Y' ORDER BY c.jum_dibaca DESC LIMIT $limit");
    // }
}