<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Siswa extends REST_Controller {

    function __construct($config = 'rest') {
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Methods: POST, DELETE, EDIT, UPDATE");
        header("Access-Control-Allow-Age: 3600");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
        header("Access-Control-Allow-Methods: GET, EDIT, UPDATE, POST, OPTIONS, PUT, DELETE");
        parent::__construct($config);
        $this->load->database();
    }

    function index_get() {
        $id = $this->get('id');
        if ($id == '') {
            $siswa = $this->db->get('siswa')->result();
        } else {
            $this->db->where('id', $id);
            $siswa = $this->db->get('siswa')->result();
        }
        $this->response($siswa, 200);
    }

    function index_post() {
        $data = array(
                    'id'           => $this->post('id'),
                    'nim'          => $this->post('nim'),
                    'nama'          => $this->post('nama'),
                    'alamat'          => $this->post('alamat'),
                    'jeniskelamin'    => $this->post('jeniskelamin'));
        $insert = $this->db->insert('siswa', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    function index_put() {
        $id = $this->put('id');
        $data = array(
                    'id'       => $this->put('id'),
                    'nim'          => $this->put('nim'),
                    'nama'          => $this->put('nama'),
                    'alamat'          => $this->put('alamat'),
                    'jeniskelamin'    => $this->put('jeniskelamin'));
        $this->db->where('id', $id);
        $update = $this->db->update('siswa', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    function index_delete() {
        $id = $this->delete('id');
        $this->db->where('id', $id);
        $delete = $this->db->delete('siswa');
        if ($delete) {
            $this->response(array('status' => 'success'), 201);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

}
?>