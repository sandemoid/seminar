<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penjualan_model extends CI_Model
{
    public function get_data()
    {
        $this->db->select('transaksi.*, events.*, peserta.name AS peserta_name, users.name AS user_name');
        $this->db->from('transaksi');
        $this->db->join('events', 'events.id_events = transaksi.events_id', 'left');
        $this->db->join('peserta', 'peserta.id_peserta = transaksi.peserta_id', 'left');
        $this->db->join('users', 'users.id_user = transaksi.user_id', 'left');
        $this->db->order_by('transaksi.date_transaksi', 'DESC');

        $query = $this->db->get();

        // Mengembalikan hasil query
        return $query->result_array();
    }
}
