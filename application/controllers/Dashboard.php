<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //load model admin
        $this->load->model('data_siswa');
        $this->load->helper('url');
        $this->load->model('admin');
    }

    public function index()
    {
        if($this->admin->logged_id())
        {

            $this->load->database();
            $data['siswa'] = $this->data_siswa->tampil();
            $this->load->view("dashboard",$data);        

        }else{

            //jika session belum terdaftar, maka redirect ke halaman login
            redirect("login");

        }
    }

    function create()
    {
        //gunakan prosedur pengambilan data dari client menggunakan metode POST
        //simpan data yang diperoleh kedalam database
        //berikan response data tunggal yang berisi data terakhir yang tersimpan
        if($this->input->post('submit')){
            if($this->data_siswa->validation("save")){ 
            $this->data_siswa->save();
            redirect('siswa');
            }
        }
        $this->load->view('siswa/form_create');
    }
    function read()
    {
        //gunakan prosedur pemanggilan data dari database
        $res=$this->db->get('siswa');
        //buatlah data sehingga menghasilkan luaran seperti contoh berikut
        //$res=array(
            //array('nis'=>'09122','nama'=>'Nama Siswa','alamat'=>'Alamat Siswa','jenis_kelamin'=>'L'),
            //array('nis'=>'09122','nama'=>'Nama Siswa','alamat'=>'Alamat Siswa','jenis_kelamin'=>'L')
        //);
        header('Content-Type: application/json');
        echo json_encode($res, true);
    }
    function update($nim)
    {       
        //$id=$this->uri->segment(3);
        
        //$data['siswa'] = $this->data_siswa->get_nim($nim)->row_array();
        //$this->load->view('siswa/form_update', $data);
        if($this->input->post('submit')){ // Jika user mengklik tombol submit yang ada di form
        if($this->data_siswa->validation("update")){ // Jika validasi sukses atau hasil validasi adalah TRUE
        $this->data_siswa->update($nim); // Panggil fungsi edit() yang ada di SiswaModel.php
        redirect('siswa');
          }
        }
    $data['siswa'] = $this->data_siswa->tampil_by($nim);
    $this->load->view('siswa/form_update', $data);
    }
    function save_update(){
         //$data = array(
         // "nim" => $this->input->post('input_nim'),
         // "nama" => $this->input->post('input_nama'),
         // "jeniskelamin" => $this->input->post('input_jeniskelamin'),
         // "alamat" => $this->input->post('input_alamat')
       // );
        
        //$this->db->insert('siswa', $data);
        $data['nim'] = $this->input->post('nim');
        $data['nama'] = $this->input->post('nama');
        $data['alamat'] = $this->input->post('alamat');
        $data['jeniskelamin'] = $this->input->post('jeniskelamin');
        $nim = $this->input->post('nim');
        $this->data_siswa->update($nim, $data);
        $data['msg'] = 'Data berhasil diubah';
        $this->load->view('siswa/tampil', $data);
    }
    function delete($id)
    {       
        //$id=$this->uri->segment(3);
        //lakukan penghapusan data pada databse untuk id siswa diatas
        $where = array('id' => $id);
        $this->data_siswa->delete($where,'siswa');
        redirect('dashboard');

    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }

}