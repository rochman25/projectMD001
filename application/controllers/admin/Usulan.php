<?php

class Usulan extends CI_Controller
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

    public function index($stat)
    {
        $per = 1;
        $data['periode'] = $this->DataModel->select('nama');
        $data['periode'] = $this->DataModel->getWhere('id', 1);
        $data['periode'] = $this->DataModel->getData('periode')->row();
        if ($stat == "masuk") {
            $data['page'] = 'admin/usulanmasuk';
            $data['proposal'] = $this->DataModel->select('*');
            $data['proposal'] = $this->DataModel->getJoin('usulan', 'usulan.idProposal = proposal.id', 'inner');
            $data['proposal'] = $this->DataModel->getWhere('idPeriode', $per);
            $data['proposal'] = $this->DataModel->getWhere('stat', 'Diproses');
            $data['proposal'] = $this->DataModel->getData('proposal')->result_array();
        } else if ($stat == "keluar") {
            $data['page'] = 'admin/usulankeluar';
            $data['proposal'] = $this->DataModel->select('*');
            $data['proposal'] = $this->DataModel->getJoin('usulan', 'usulan.idProposal = proposal.id', 'inner');
            $data['proposal'] = $this->DataModel->getWhere('idPeriode', $per);
            $data['proposal'] = $this->DataModel->getWhere('stat', 'Diterima');
            $data['proposal'] = $this->DataModel->getData('proposal')->result_array();
        }
        $this->load->view('master/dashboard', $data);
    }
}
