<?php

class Periode extends CI_Controller
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
            $data['page'] = 'admin/periode';
            $data['periode'] = $this->DataModel->getData('periode')->result_array();
            $this->load->view('master/dashboard', $data);
        }
    }

    public function tambah()
    {
        $this->form_validation->set_rules('periode', 'Periode', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
        $periode = $this->input->post('periode');
        $status = $this->input->post('status');
        if (!$this->checkSession()) {
            $data['login'] = "admin";
            $this->load->view('master/login', $data);
        } else {
            if ($this->form_validation->run() == false) {
                $this->load->view('master/login');
            } else if ($status == "0") {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissable">
                                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                        <p>Bagian Belum dipilih</p></div>');
                $data['login'] = "admin";
                $this->load->view('master/login', $data);
            } else {
                $data = array(
                    "periode" => $periode,
                    "status" => $status,
                );
                $result = $this->DataModel->insert('periode', $data);
                if ($result) {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissable">
                                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                        <p>Data Berhasil ditambahkan</p></div>');

                } else {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissable">
                                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                        <p>Data Gagal ditambahkan</p></div>');
                }
                $data['page'] = 'admin/periode';
                $data['periode'] = $this->DataModel->getData('periode')->result_array();
                $this->load->view('master/dashboard', $data);
            }
        }
    }

    public function edit()
    {
        $this->form_validation->set_rules('periode', 'Periode', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
        $id = $this->input->post('id');
        $periode = $this->input->post('periode');
        $status = $this->input->post('status');
        if ($this->form_validation->run() == false) {
            $this->load->view('master/login');
        } else if ($status == "0") {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissable">
                                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                        <p>Bagian Belum dipilih</p></div>');
            $data['login'] = "admin";
            $this->load->view('master/login', $data);
        } else {
            $data = array(
                "nama" => $periode,
                "status" => $status,
            );
            $result = $this->DataModel->getWhere('id', $id);
            $result = $this->DataModel->update('periode', $data);
            if ($result) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissable">
                                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                        <p>Data Berhasil diubah</p></div>');

            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissable">
                                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                        <p>Data Gagal diubah</p></div>');
            }
            $data['page'] = 'admin/periode';
            $data['periode'] = $this->DataModel->getData('periode')->result_array();
            $this->load->view('master/dashboard', $data);
        }
    }

    public function hapus($id)
    {
        if (!$this->checkSession()) {
            $data['login'] = "admin";
            $this->load->view('master/login', $data);
        } else {
            $result = $this->DataModel->delete('id',$id,'periode');
            if ($result) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissable">
                                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                        <p>Data Berhasil dihapus</p></div>');
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissable">
                                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                        <p>Data Gagal dihapus</p></div>');
            }
            $data['page'] = 'admin/periode';
            $data['periode'] = $this->DataModel->getData('periode')->result_array();
            $this->load->view('master/dashboard', $data);
        }

    }

}
