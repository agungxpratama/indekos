<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_All extends CI_Model{
    public function get($table)
    {
        return $this->db->get($table);
    }

    public function select($select, $from, $with, $order)
    {
        $this->db->select($select);
        $this->db->from($from);
        $this->db->order_by($with, $order);
        $this->db->limit(1);
        return $this->db->get();
    }

    public function view_where($table,$where)
	{
		return $this->db->get_where($table,$where);
	}

	public function insert($table,$data)
	{
		$this->db->insert($table,$data);
	}

	public function update($table,$where,$data)
	{
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	public function delete($where,$table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}

    function count_where($table, $where)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($where);
        return $this->db->count_all_results();// code...
    }

    public function empty($table)
    {
        $this->db->empty_table($table);
    }

    function cek_login($table,$where){
        return $this->db->get_where($table,$where);
    }

    function join_cart($from, $at)
    {
        $this->db->select('*');
        $this->db->from($from);
        $this->db->join($at, 'cart.id_barang = barang.id_barang');
        return $this->db->get();
    }

    function join_cart_admin($from, $at, $where)
    {
        $this->db->select('*');
        $this->db->from($from);
        $this->db->join($at, 'db_cart.id_barang = barang.id_barang');
        $this->db->where($where);
        return $this->db->get();
    }

    function join_wishlist($from, $at)
    {
        $this->db->select('*');
        $this->db->from($from);
        $this->db->join($at, 'wishlist.id_barang = barang.id_barang');
        return $this->db->get();
    }

    function join_pesanan($from, $at)
    {
        $this->db->select('*');
        $this->db->from($from);
        $this->db->join($at, 'checkout.id_pesanan = pesanan.id_pesanan');
        $this->db->join('users', 'users.id = pesanan.id_user');
        $this->db->join('konsumen', 'konsumen.id_user = users.id');
        return $this->db->get();
    }

    function count($where)
    {
        return $this->db->count_all_results($where);
    }

    function sum($kind, $table)
    {
        $this->db->select_sum($kind);
        $query = $this->db->get($table);

        return $query;
    }

    public function store_cart()
    {
        $this->db->select('*');// code...
    }
}
