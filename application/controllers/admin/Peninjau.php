<?php

class Peninjau extends CI_Controller
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
        $data['page'] = 'admin/peninjau';
        $data['admin'] = $this->DataModel->getJoin('dosen', 'dosen.nidn = admin.nidn', 'inner');
        $data['admin'] = $this->DataModel->getWhere('admin.level', 'PE');
        $data['admin'] = $this->DataModel->getData('admin')->result_array();
        $data['dosen'] = $this->DataModel->select('dosen.nidn');
        $data['dosen'] = $this->DataModel->getJoin('admin', 'admin.nidn = dosen.nidn', 'inner');
        $data['dosen'] = $this->DataModel->getWhere('dosen.nidn', 'IS NULL');
        $data['dosen'] = $this->DataModel->getData('dosen')->result_array();
        $data['nidnDosen'] = $this->DataModel->select('nidn,nama');
        $data['nidnDosen'] = $this->DataModel->getWhere('nidn !=', $this->session->userdata('nidn'));
        $data['nidnDosen'] = $this->DataModel->getData('dosen')->result_array();

        $this->load->view('master/dashboard', $data);
    }

    public function tambah()
    {
        $nidn = $this->input->post('nidn');
        $data = array(
            "nidn" => $nidn,
            "password" => md5("peninjau"),
            "level" => "PE",
        );
        $result = $this->DataModel->insert('admin', $data);
        if ($result) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissable">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                    <p>Data Berhasil ditambahkan</p></div>');

        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissable">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                    <p>Data Gagal ditambahkan</p></div>');
        }
        redirect('admin/peninjau');
    }

    public function hapus($id)
    {
        if (!$this->checkSession()) {
            $data['login'] = "admin";
            $this->load->view('master/login', $data);
        } else {
            $result = $this->DataModel->delete('id', $id, 'admin');
            if ($result) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissable">
                                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                        <p>Data Berhasil dihapus</p></div>');
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissable">
                                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                        <p>Data Gagal dihapus</p></div>');
            }
            redirect('admin/peninjau');
            // $data['page'] = 'admin/peninjau';
            // $data['periode'] = $this->DataModel->getData('periode')->result_array();
            // $this->load->view('master/dashboard', $data);
        }
    }

    public function usulan(){
        $per = 1;
        $data['periode'] = $this->DataModel->select('nama');
        $data['periode'] = $this->DataModel->getWhere('id', $per);
        $data['periode'] = $this->DataModel->getData('periode')->row();
        if (!$this->checkSession()) {
            $data['login'] = "admin";
            $this->load->view('master/login', $data);
        } else {
            $data['page'] = 'admin/usulanmasuk';
            $data['proposal'] = $this->DataModel->select('*');
            $data['proposal'] = $this->DataModel->getJoin('usulan', 'usulan.idProposal = proposal.id', 'inner');
            $data['proposal'] = $this->DataModel->getWhere('idPeriode', $per);
            $data['proposal'] = $this->DataModel->getWhere('stat', 'Diproses');
            $data['proposal'] = $this->DataModel->getData('proposal')->result_array();
            $this->load->view('master/dashboard', $data);
        }
    }

    public function riwayat(){
        $per = 1;
        $data['periode'] = $this->DataModel->select('nama');
        $data['periode'] = $this->DataModel->getWhere('id', $per);
        $data['periode'] = $this->DataModel->getData('periode')->row();
        if (!$this->checkSession()) {
            $data['login'] = "admin";
            $this->load->view('master/login', $data);
        } else {
            $data['page'] = 'admin/usulanmasuk';
            $data['proposal'] = $this->DataModel->select('*');
            $data['proposal'] = $this->DataModel->getJoin('usulan', 'usulan.idProposal = proposal.id', 'inner');
            $data['proposal'] = $this->DataModel->getWhere('idPeriode', $per);
            $data['proposal'] = $this->DataModel->getWhere('stat', 'Diterima');
            $data['proposal'] = $this->DataModel->getData('proposal')->result_array();
            $this->load->view('master/dashboard', $data);
        }
    }

}
