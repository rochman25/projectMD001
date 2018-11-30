<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of User
 *
 * @author zaenur
 */
class User extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('DataModel');
        $this->load->library('form_validation');
    }

    function checkSession() {
        $cek = $this->session->userdata("nidn");
        if (empty($cek)) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    function index() {
        if (!$this->checkSession()) {
            $data['login'] = "user";
            $this->load->view('master/login', $data);
        } else {
            $data['page'] = 'user/home';
            $data['profile'] = $this->DataModel->getWhere('nidn',$this->session->userdata('nidn'));
            $data['profile'] = $this->DataModel->getData('dosen')->row();
            $this->load->view('master/dashboard',$data);
        }
    }

    function editprofile(){
        $nidn = $this->session->userdata('nidn');
        $this->form_validation->set_rules('nidn','Nidn','required');
        $this->form_validation->set_rules('nama','Nama lengkap','required');
        $this->form_validation->set_rules('uname','Username','required');
        $this->form_validation->set_rules('email','Email','required');
        $this->form_validation->set_rules('alamat','Alamat','required');
        $this->form_validation->set_rules('prodi','Program Studi','required');
        $nama = $this->input->post('nama');
        $email = $this->input->post('email');
        $alamat = $this->input->post('alamat');
        $prodi = $this->input->post('prodi');
        $uname = $this->input->post('uname');

        if($this->form_validation->run() == FALSE){
            echo "form belum valid";
        }else{
            $data = array(
                'nama' => $nama,
                'prodi' => $prodi,
                'username' => $uname,
                'alamat' => $alamat,
                'email' => $email
            );
            $update = $this->DataModel->getWhere('nidn',$nidn);
            $update = $this->DataModel->update('dosen',$data);
            if(!$update){
                echo "Edit Data Gagal";
            }else{
                redirect('user/index');
            }
        }

    }

    function usulan(){
        if (!$this->checkSession()) {
            $data['login'] = "user";
            $this->load->view('master/login', $data);
        } else {
            $data['page'] = 'user/usulan';
            $data['profile'] = $this->DataModel->getWhere('nidn',$this->session->userdata('nidn'));
            $data['profile'] = $this->DataModel->getData('dosen')->row();
            $this->load->view('master/dashboard',$data);
        }
    }

    function evaluasi(){
        if (!$this->checkSession()) {
            $data['login'] = "user";
            $this->load->view('master/login', $data);
        } else {
            $data['page'] = 'user/evaluasi';
            //$data['proposal'] = $this->DataModel->getWhere('nidn',$this->session->userdata('nidn'));
            //$data['proposal'] = $this->DataModel->getData('dosen')->row();
            $this->load->view('master/dashboard',$data);
        }
    }

    function login() {
        $this->form_validation->set_rules('uname', 'Username', 'required');
        $this->form_validation->set_rules('pass', 'Password', 'required');
        $uname = $this->input->post('uname');
        $pass = $this->input->post('pass');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('master/login');
        } else {
            $data = array(
                "username" => $uname,
                "password" => $pass
            );
            $result = $this->DataModel->Login("dosen", $data)->row();
            if ($result != null) {
                $id = $result->nidn;
                $username = $result->username;
                $level = "user";
                $data_session = array(
                    'nidn' => $id,
                    'username' => $username,
                    'level' => $level,
                    'status' => "login"
                );
                $this->session->set_userdata($data_session);
                redirect(base_url('user/index'));
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissable">
                                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                        <p>Wrong Username or Password</p></div>');
                $data['login'] = "user";
                $this->load->view('master/login', $data);
            }
        }
    }

    function logout() {
        $this->session->sess_destroy();
        redirect(base_url('user/index'));
    }

}
