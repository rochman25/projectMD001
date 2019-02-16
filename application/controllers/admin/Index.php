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
class Index extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('DataModel');
        $this->load->library('form_validation');
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
            $data['profile'] = $this->DataModel->getWhere('nidn', $this->session->userdata('nidn'));
            $data['profile'] = $this->DataModel->getData('dosen')->row();
            $this->load->view('master/dashboard', $data);
        }
    }

    public function editprofile()
    {

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

    public function password()
    {
        if (!$this->checkSession()) {
            $data['login'] = "admin";
            $this->load->view('master/login', $data);
        } else {
            $data['page'] = 'admin/ubah_password';
            $this->load->view('master/dashboard', $data);
        }
    }

    public function ubah_password()
    {
        $this->form_validation->set_rules('old', 'Old Password', 'required');
        $this->form_validation->set_rules('new', 'New Password', 'required');

        $old = $this->input->post('old');
        $new = $this->input->post('new');
        $nidn = $this->session->userdata('nidn');

        if ($this->form_validation->run() == false) {
            echo "ada yang salah bung";
            echo "<br>";
            var_dump($this->form_validation);
        } else {
            $dataPass = $this->DataModel->getWhere('nidn', $nidn);
            $dataPass = $this->DataModel->getData('admin')->row();
            if (md5($old) != $dataPass->password) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissable">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                    <p>Password Lama Tidak Cocok</p></div>');
                redirect('admin/password');
            } else {
                $data = array(
                    'nidn' => $nidn,
                    'password' => md5($new),
                );
                $result = $this->DataModel->getWhere('nidn', $nidn);
                $result = $this->DataModel->update('admin', $data);
                if ($result == false) {
                    echo "Edit Password gagal";
                } else {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissable">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                    <p>Password Berhasil diubah</p></div>');
                    redirect('admin/password');
                }
            }
        }

    }

    public function login()
    {
        $this->form_validation->set_rules('uname', 'NIDN', 'required');
        $this->form_validation->set_rules('pass', 'Password', 'required');
        $uname = $this->input->post('uname');
        $pass = $this->input->post('pass');
        $bag = $this->input->post('bagian');
        if ($this->form_validation->run() == false) {
            $this->load->view('master/login');
        } else if ($bag == "0") {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissable">
                                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                        <p>Bagian Belum dipilih</p></div>');
            $data['login'] = "admin";
            $this->load->view('master/login', $data);
        } else {
            $data = array(
                "nidn" => $uname,
                "password" => md5($pass),
                "level" => $bag,
            );
            $result = $this->DataModel->Login("admin", $data)->row();
            if ($result != null) {
                $id = $result->id;
                $username = $result->nidn;
                $level = $bag;
                $profile = $this->DataModel->select('foto');
                $profile = $this->DataModel->getWhere('nidn', $username);
                $profile = $this->DataModel->getData('dosen')->row();
                $data_session = array(
                    'id' => $id,
                    'nidn' => $username,
                    'level' => $level,
                    'foto' => $profile->foto,
                    'status' => "login"
                );
                $this->session->set_userdata($data_session);
                redirect(base_url('admin/index'));
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissable">
                                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                        <p>Wrong Username or Password</p></div>');
                redirect(base_url('admin/index'));
            }
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url('admin/index'));
    }

}
