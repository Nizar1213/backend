<?php
  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

  class Data_siswa extends CI_Model {
    // Fungsi untuk menampilkan semua data siswa
    public function tampil(){
      return $this->db->get('siswa')->result();
    }
    
    // Fungsi untuk menampilkan data siswa berdasarkan NIS nya
    public function tampil_by($nim){
      $this->db->where('nim', $nim);
      return $this->db->get('siswa')->row();
    }
    
    // Fungsi untuk validasi form tambah dan ubah
    public function validation($mode){
      $this->load->library('form_validation'); // Load library form_validation untuk proses validasinya
      
      // Tambahkan if apakah $mode save atau update
      // Karena ketika update, NIS tidak harus divalidasi
      // Jadi NIS di validasi hanya ketika menambah data siswa saja
      if($mode == "save")
        $this->form_validation->set_rules('input_nim', 'NIM', 'required|numeric|max_length[11]');
      
      $this->form_validation->set_rules('input_nama', 'Nama', 'required|max_length[50]');
      $this->form_validation->set_rules('input_jeniskelamin', 'Jenis Kelamin', 'required');
      $this->form_validation->set_rules('input_alamat', 'Alamat', 'required');
        
      if($this->form_validation->run()) // Jika validasi benar
        return TRUE; // Maka kembalikan hasilnya dengan TRUE
      else // Jika ada data yang tidak sesuai validasi
        return FALSE; // Maka kembalikan hasilnya dengan FALSE
    }
    
    // Fungsi untuk melakukan simpan data ke tabel siswa
    public function save(){
      $data = array(
        "nim" => $this->input->post('input_nim'),
        "nama" => $this->input->post('input_nama'),
        "jeniskelamin" => $this->input->post('input_jeniskelamin'),
        "alamat" => $this->input->post('input_alamat')
      );
      
      $this->db->insert('siswa', $data); // Untuk mengeksekusi perintah insert data
    }
    
    // Fungsi untuk melakukan ubah data siswa berdasarkan NIS siswa
    public function update($nim){
      $data = array(
      "nama" => $this->input->post('input_nama'),
      "jeniskelamin" => $this->input->post('input_jeniskelamin'),
      "alamat" => $this->input->post('input_alamat')
    );
    
    $this->db->where('nim', $nim);
    $this->db->update('siswa', $data); // Untuk mengeksekusi perintah update data
    }
    
    // Fungsi untuk melakukan menghapus data siswa berdasarkan NIS siswa
    public function delete($where, $table){
      $this->db->where($where);
      $this->db->delete('siswa'); // Untuk mengeksekusi perintah delete data
    }
    public function getSiswa($id = null){
       if($id === null){
        return $this->db->get('siswa')->result_array();
       }else{
        return $this->db->get_where('siswa', ['id' => $id])->result_array();
       }
   }
    function get(){
      return $this->db->get('siswa');
    }
    function get_nim($nim) {
      $this->db->where('nim', $nim);
      $this->db->select("*");
      $this->db->from("siswa");
      return $this->db->get();
    }
  }