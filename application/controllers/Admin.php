<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Admin
 *
 * @author zaenur
 */
class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('DataModel');
        $this->load->library('form_validation');
        if (!$this->checkSession()) {
            $data['login'] = "admin";
            $this->load->view('master/login', $data);
        }
    }

    public function checkSession()
    {
        $cek = $this->session->userdata("id");
        if (empty($cek)) {
            return false;
        } else {
            return true;
        }
    }

    public function index()
    {
        if (!$this->checkSession()) {
            $data['login'] = "admin";
            $this->load->view('master/login', $data);
        } else {
            $data['page'] = 'admin/home';
            $data['profile'] = $this->DataModel->getWhere('id', $this->session->userdata('id'));
            $data['profile'] = $this->DataModel->getData('admin')->row();
            $this->load->view('master/dashboard', $data);
        }
    }

    public function editprofile()
    {

    }

    public function proposal($param)
    {
        if (!$this->checkSession()) {
            $data['login'] = "admin";
            $this->load->view('master/login', $data);
        } else {
            if ($param == "masuk") {
                $data['page'] = 'admin/proposal/masuk';
                $this->load->view('master/dashboard', $data);
            } else if ($param == "diterima") {
                $data['page'] = 'admin/proposal/diterima';
                $this->load->view('master/dashboard', $data);
            } else if ($param == "ditolak") {
                $data['page'] = 'admin/proposal/ditolak';
                $this->load->view('master/dashboard', $data);
            }
        }
    }

    public function laporan()
    {
        if (!$this->checkSession()) {
            $data['login'] = "admin";
            $this->load->view('master/login', $data);
        } else {
            $data['page'] = 'admin/laporan';
            $this->load->view('master/dashboard', $data);
        }
    }

    public function login()
    {
        $this->form_validation->set_rules('uname', 'Username', 'required');
        $this->form_validation->set_rules('pass', 'Password', 'required');
        $uname = $this->input->post('uname');
        $pass = $this->input->post('pass');
        if ($this->form_validation->run() == false) {
            $this->load->view('master/login');
        } else {
            $data = array(
                "username" => $uname,
                "password" => $pass,
            );
            $result = $this->DataModel->Login("admin", $data)->row();
            if ($result != null) {
                $id = $result->id;
                $username = $result->username;
                $level = "admin";
                $data_session = array(
                    'id' => $id,
                    'username' => $username,
                    'level' => $level,
                    'status' => "login",
                );
                $this->session->set_userdata($data_session);
                redirect(base_url('admin/index'));
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissable">
                                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                        <p>Wrong Username or Password</p></div>');
                $data['login'] = "admin";
                $this->load->view('master/login', $data);
            }
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url('admin/index'));
    }

}
