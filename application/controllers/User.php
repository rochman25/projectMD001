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
class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('upload');
        $this->load->model('DataModel');
        $this->load->library('form_validation');
    }

    public function checkSession()
    {
        $cek = $this->session->userdata("nidn");
        if (empty($cek)) {
            return false;
        } else {
            return true;
        }
    }

    public function index()
    {
        if (!$this->checkSession()) {
            $data['login'] = "user";
            $this->load->view('master/login', $data);
        } else {
            $data['page'] = 'user/home';
            $data['profile'] = $this->DataModel->getWhere('nidn', $this->session->userdata('nidn'));
            $data['profile'] = $this->DataModel->getData('dosen')->row();
            $this->load->view('master/dashboard', $data);
        }
    }

    public function edit()
    {
        $this->form_validation->set_rules('tempat', 'Tempat Lahir', 'required');
        $this->form_validation->set_rules('tgl', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('nohp', 'No. Handphone', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');

        $nidn = $this->session->userdata('nidn');
        $tempat = $this->input->post('tempat');
        $tanggal = $this->input->post('tgl');
        $email = $this->input->post('email');
        $nohp = $this->input->post('nohp');
        $alamat = $this->input->post('alamat');
        $fotoname = $nidn . "_" . "photo";
        $data = null;
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissable">
                                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                        <p>Form ada yang kosong mohon dilengkapi</p></div>');
            $data['page'] = "admin/dosen";
            $this->load->view('master/dashboard', $data);
        } else {
            if (!empty($_FILES['foto']['name'])) {
                $photo = $this->DataModel->select('foto');
                $photo = $this->DataModel->getWhere('nidn', $nidn);
                $photo = $this->DataModel->getData('dosen')->row();
                if ($photo != null) {
                    unlink("assets/foto/dosen/" . $photo->foto);
                    //var_dump($photo);
                }
                $eks = substr(strrchr($_FILES['foto']['name'], '.'), 1);
                $foto = $this->uploadFile($fotoname, 'assets/foto/dosen', 'jpg|jpeg|png');
                if (!$foto->do_upload('foto')) {
                    echo "Error upload foto : ";
                    echo $foto->display_errors('<p>', '</p>');
                    //var_dump($foto);
                } else {
                    $data = array(
                        "tempat" => $tempat,
                        "tanggal_lahir" => $tanggal,
                        "email" => $email,
                        "alamat" => $alamat,
                        "nohp" => $nohp,
                        "foto" => $fotoname . "." . $eks,
                    );
                }

            } else {
                $data = array(
                    "tempat" => $tempat,
                    "tanggal_lahir" => $tanggal,
                    "email" => $email,
                    "alamat" => $alamat,
                    "nohp" => $nohp,
                );
            }
            $result = $this->DataModel->getWhere('nidn', $nidn);
            $result = $this->DataModel->update('dosen', $data);
            if ($result) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissable">
                                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                        <p>Data Berhasil diedit</p></div>');

            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissable">
                                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                        <p>Data Gagal diedit</p></div>');
            }
            redirect(base_url('user/index'));
        }

    }

    public function usulan()
    {
        $per = 1;
        $periode = $this->DataModel->select('idPeriode');
        $periode = $this->DataModel->getWhere('nidn', $this->session->userdata('nidn'));
        $periode = $this->DataModel->getWhere('idPeriode', $per);
        $periode = $this->DataModel->getData('usulan')->row();
        if (!$this->checkSession()) {
            $data['login'] = "user";
            $this->load->view('master/login', $data);
        } else {
            if ($periode != null) {
                $data['page'] = 'user/usulan_done';
            } else {
                $data['page'] = 'user/usulan';
            }
            $this->load->view('master/dashboard', $data);
        }
    }

    public function detail_usulan($type)
    {
        if (!$this->checkSession()) {
            $data['login'] = "user";
            $this->load->view('master/login', $data);
        } else {
            $data['profile'] = $this->DataModel->getWhere('nidn', $this->session->userdata('nidn'));
            $data['profile'] = $this->DataModel->getData('dosen')->row();
            $data['dosen'] = $this->DataModel->select('nidn,nama');
            $data['dosen'] = $this->DataModel->getWhere('nidn !=', $this->session->userdata('nidn'));
            $data['dosen'] = $this->DataModel->getData('dosen')->result_array();
            if ($type == "amm") {
                $data['page'] = 'user/detail_usulan_pbd';
            } else {
                $data['page'] = 'user/detail_usulan';
            }
            $this->load->view('master/dashboard', $data);
        }
    }

    public function getDosen()
    {
        $nidn = $this->input->post('nidn');
        $data = $this->DataModel->select('nama');
        $data = $this->DataModel->getWhere('nidn', $nidn);
        $data = $this->DataModel->getData('dosen')->row();
        echo json_encode($data);
    }

    public function getAnggota()
    {

        //$data = $this->DataModel->getWhere('idUsulan','');
        $data = $this->DataModel->getData('anggota')->result();
        echo json_encode($data);
    }

    public function tambahAnggota()
    {
        $per = 1;
        $nidnP = $this->session->userdata('nidn');
        $ju = $this->input->post('ju');
        $nidn = $this->input->post('nidn');
        //$nim = $this->input->post('nim');
        $nama = $this->input->post('nama');
        $id = "IN" . "-" . $ju . "-" . $nidnP . $per;
        $idU = date("d-m-y") . $id;

        $data = array(
            'idAnggota' => $nidn,
            'nama' => $nama,
            'idUsulan' => $idU,
            'status' => 'Anggota',
        );

        // $dataP = array(
        //     'id' => $id
        // );

        // $dataU = array(
        //     'id' => $idU,
        //     'idProposal' => $id,
        //     'nidn' => $nidnP,
        //     'idPeriode' => $per
        // );

        // $this->DataModel->insert('proposal', $dataP);
        // $this->DataModel->insert('usulan', $dataU);
        $result = $this->DataModel->insert('anggota', $data);

        if ($result) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <p>Data Berhasil ditambahkan</p></div>');

        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <p>Data Gagal ditambahkan</p></div>');
        }

        echo json_encode($result);

    }

    public function hapusAnggota()
    {
        $id = $this->input->post('id');
        $result = $this->DataModel->delete('id', $id, 'anggota');
        echo json_encode($result);
    }

    public function tambahUsulan()
    {
        $per = 1;

        $this->form_validation->set_rules('abstrak', 'Abstrak Proposal', 'required');
        $this->form_validation->set_rules('judul', 'Judul Proposal', 'required');
        $this->form_validation->set_rules('keywords', 'Keywords Proposal', 'required');
        $this->form_validation->set_rules('latbel', 'Latar Belakang Proposal', 'required');
        $this->form_validation->set_rules('tujuan', 'Tujuan Proposal', 'required');
        $this->form_validation->set_rules('manfaat', 'Manfaat Proposal', 'required');
        $this->form_validation->set_rules('tinjauan', 'Tinjauan Pustaka', 'required');
        $this->form_validation->set_rules('biaya', 'Biaya Proposal', 'required');
        $this->form_validation->set_rules('luaran', 'Luaran Proposal', 'required');

        $ju = $this->input->post('ju');
        $nidn = $this->session->userdata('nidn');
        $sumDan = $this->input->post('sp');
        $jenDan = $this->input->post('jp');
        $judul = $this->input->post('judul');
        $tema = $this->input->post('tema');
        $abstrak = $this->input->post('abstrak');
        $key = $this->input->post('keywords');
        $latbel = $this->input->post('latbel');
        $tujuan = $this->input->post('tujuan');
        $manfaat = $this->input->post('manfaat');
        $tinjauan = $this->input->post('tinjauan');
        $nidnAng1 = $this->input->post('nidnAng1');
        $namaAng1 = $this->input->post('namaAng1');
        $nimMhs1 = $this->input->post('nim1');
        $biaya = $this->input->post('biaya');
        $luaran = $this->input->post('luaran');
//        $namaMhs1 = $this->input->post('namaAng1');
        // $nidnAng2 = $this->input->post('nidnAng2');
        // $namaAng2 = $this->input->post('namaAng2');
        // $nimMhs2 = $this->input->post('nim2');
        // $namaMhs2 = $this->input->post('namaMhs2');

        $id = "IN" . "-" . $ju . "-" . $nidn . $per;
        $idU = date("d-m-y") . $id;
        $proposal = $id . "_Usulan_" . "amikom";
        $berkas = "";
        $rab = $id . "_RAB_" . "amikom";
        $metopel = $id . "_METOPEL_" . "amikom";
        $jadwal = $id . "_JADWAL_" . "amikom";

        if (!$this->checkSession()) {
            $data['login'] = "user";
            $this->load->view('master/login', $data);
        } else {
            if ($this->form_validation->run() == false) {
                echo "ada yang salah bung";
                echo "<br>";
                var_dump($this->form_validation);
            } else {
                if (!empty($_FILES['usulan']['name'])) {
                    $eksU = substr(strrchr($_FILES['usulan']['name'], '.'), 1);
                    $Usulan = $this->uploadFile($proposal, 'assets/proposal', 'pdf');
                    if (!$Usulan->do_upload('usulan')) {
                        echo "Usulan error " . "<br>";
                        var_dump($Usulan->allowed_types);
                        var_dump($_FILES['usulan']);
                        echo $Usulan->display_errors('<p>', '</p>');
                    } else {
                        if (!empty($_FILES['rab']['name'])) {
                            $eksR = substr(strrchr($_FILES['rab']['name'], '.'), 1);
                            $Rab = $this->uploadFile($rab, 'assets/rab', 'xls|xlsx');
                            //var_dump($Rab);
                            if (!$Rab->do_upload('rab')) {
                                echo "Rab error ";
                                echo $Rab->display_errors('<p>', '</p>');
                            } else {
                                if (!empty($_FILES['metopel']['name'])) {
                                    $eksM = substr(strrchr($_FILES['metopel']['name'], '.'), 1);
                                    $Metopel = $this->uploadFile($metopel, 'assets/metopel', 'png');
                                    if (!$Metopel->do_upload('metopel')) {
                                        echo "Metopel error ";
                                        echo $Metopel->display_errors('<p>', '</p>');
                                    } else {
                                        if (!empty($_FILES['jadwal']['name'])) {
                                            $eksJ = substr(strrchr($_FILES['jadwal']['name'], '.'), 1);
                                            $Jadwal = $this->uploadFile($jadwal, 'assets/jadwal', 'png');
                                            if (!$Jadwal->do_upload('jadwal')) {
                                                echo "Jadwal error ";
                                                echo $Jadwal->display_errors('<p>', '</p>');
                                            } else {
                                                $eksB = "";
                                                if (!empty($_FILES['berkas']['name'])) {
                                                    $berkas = $id . "_Pendukung_" . "amikom";
                                                    $eksB = substr(strrchr($_FILES['berkas']['name'], '.'), 1);
                                                    $Berkas = $this->uploadFile($berkas, 'assets/pendukung', 'zip');
                                                    //var_dump($Rab);
                                                    if (!$Berkas->do_upload('berkas')) {
                                                        echo "Berkas error ";
                                                        echo $Berkas->display_errors('<p>', '</p>');
                                                    }
                                                }
                                                //$berkas = $berkas . '.' . $eksB;
                                                $data = array(
                                                    'id' => $id,
                                                    'judul' => $judul,
                                                    'tema' => $tema,
                                                    'abstrak' => $abstrak,
                                                    'keyword' => $key,
                                                    'latbel' => $latbel,
                                                    'tujuan' => $tujuan,
                                                    'manfaat' => $manfaat,
                                                    'tinjauan_pustaka' => $tinjauan,
                                                    'biaya' => $biaya,
                                                    'luaran' => $luaran,
                                                    'rab' => $rab . "." . $eksR,
                                                    'metopel' => $metopel . "." . $eksM,
                                                    'jadwal' => $jadwal . "." . $eksJ,
                                                    'pendukung' => $berkas . "." . $eksB,
                                                    'usulan' => $proposal . "." . $eksU,
                                                    'uploaded' => date("Y-m-d H:i:s"),
                                                );
                                                $dataU = array(
                                                    'id' => $idU,
                                                    'idProposal' => $id,
                                                    'nidn' => $nidn,
                                                    'idPeriode' => $per,
                                                    'jenis' => $ju,
                                                    'sumberdana' => "Internal",
                                                    'stat' => "pending",
                                                );

                                                //var_dump($data);
                                                //echo "<br>";
                                                //var_dump($dataU);
                                                $result = $this->DataModel->insert('proposal', $data);
                                                $result = $this->DataModel->insert('usulan', $dataU);
                                                // $anggota = null;
                                                // if ($nidnAng2 != "" || $nimMhs2 != "") {
                                                //     $anggota = $this->DataModel->insert('anggota', $dataA2);
                                                // }
                                                if ($result) {
                                                    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissable">
                                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                        <p>Data Berhasil ditambahkan</p></div>');

                                                } else {
                                                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissable">
                                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                        <p>Data Gagal ditambahkan</p></div>');
                                                }

                                                redirect('user/evaluasi');

                                                // $data['page'] = 'user/usulan';
                                                // $data['profile'] = $this->DataModel->getWhere('nidn', $this->session->userdata('nidn'));
                                                // $data['profile'] = $this->DataModel->getData('dosen')->row();
                                                // $this->load->view('master/dashboard', $data);
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }

    public function tambahUsulanPbd()
    {
        $per = 1;

        $this->form_validation->set_rules('judul', 'Judul Proposal', 'required');
        $this->form_validation->set_rules('analisa', 'Analisa Proposal', 'required');
        $this->form_validation->set_rules('luaran', 'Luaran Proposal', 'required');
        $this->form_validation->set_rules('solusi', 'Solusi Proposal', 'required');
        $this->form_validation->set_rules('permasalahan', 'Permasalahan Proposal', 'required');

        $ju = $this->input->post('ju');
        $nidn = $this->session->userdata('nidn');
        $judul = $this->input->post('judul');
        $analisa = $this->input->post('analisa');
        $luaran = $this->input->post('luaran');
        $solusi = $this->input->post('solusi');
        $permasalahan = $this->input->post('permasalahan');

        $id = "IN" . "-" . $ju . "-" . $nidn . $per;
        $idU = date("d-m-y") . $id;
        $proposal = $id . "_Usulan_" . "amikom";
        $berkas = "";
        $rab = $id . "_RAB_" . "amikom";
        $jadwal = $id . "_JADWAL_" . "amikom";

        if (!$this->checkSession()) {
            $data['login'] = "user";
            $this->load->view('master/login', $data);
        } else {
            if ($this->form_validation->run() == false) {
                echo "ada yang salah bung";
                echo "<br>";
                //var_dump($this->form_validation);
            } else {
                if (!empty($_FILES['usulan']['name'])) {
                    $eksU = substr(strrchr($_FILES['usulan']['name'], '.'), 1);
                    $Usulan = $this->uploadFile($proposal, 'assets/proposal', 'pdf');
                    if (!$Usulan->do_upload('usulan')) {
                        echo "Usulan error " . "<br>";
                        var_dump($Usulan->allowed_types);
                        var_dump($_FILES['usulan']);
                        echo $Usulan->display_errors('<p>', '</p>');
                    } else {
                        if (!empty($_FILES['rab']['name'])) {
                            $eksR = substr(strrchr($_FILES['rab']['name'], '.'), 1);
                            $Rab = $this->uploadFile($rab, 'assets/rab', 'xls|xlsx');
                            //var_dump($Rab);
                            if (!$Rab->do_upload('rab')) {
                                echo "Rab error ";
                                echo $Rab->display_errors('<p>', '</p>');
                            } else {
                                if (!empty($_FILES['jadwal']['name'])) {
                                    $eksJ = substr(strrchr($_FILES['jadwal']['name'], '.'), 1);
                                    $Jadwal = $this->uploadFile($jadwal, 'assets/jadwal', 'png');
                                    if (!$Jadwal->do_upload('jadwal')) {
                                        echo "Jadwal error ";
                                        echo $Jadwal->display_errors('<p>', '</p>');
                                    } else {
                                        $eksB = "";
                                        if (!empty($_FILES['berkas']['name'])) {
                                            $berkas = $id . "_Pendukung_" . "amikom";
                                            $eksB = substr(strrchr($_FILES['berkas']['name'], '.'), 1);
                                            $Berkas = $this->uploadFile($berkas, 'assets/pendukung', 'zip');
                                            //var_dump($Rab);
                                            if (!$Berkas->do_upload('berkas')) {
                                                echo "Berkas error ";
                                                echo $Berkas->display_errors('<p>', '</p>');
                                            }
                                            $data = array(
                                                'id' => $id,
                                                'judul' => $judul,
                                                'luaran' => $luaran,
                                                'analisa' => $analisa,
                                                'permasalahan' => $permasalahan,
                                                'solusi' => $solusi,
                                                'rab' => $rab . "." . $eksR,
                                                'jadwal' => $jadwal . "." . $eksJ,
                                                'pendukung' => $berkas . "." . $eksB,
                                                'usulan' => $proposal . "." . $eksU,
                                                'uploaded' => date("Y-m-d H:i:s"),
                                            );
                                            $dataU = array(
                                                'id' => $idU,
                                                'idProposal' => $id,
                                                'nidn' => $nidn,
                                                'idPeriode' => $per,
                                                'jenis' => $ju,
                                                'sumberdana' => "Internal",
                                                'stat' => "Menunggu",
                                            );

                                            $result = $this->DataModel->insert('proposal', $data);
                                            $result = $this->DataModel->insert('usulan', $dataU);

                                            if ($result) {
                                                $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissable">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                    <p>Data Berhasil ditambahkan</p></div>');

                                            } else {
                                                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissable">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                    <p>Data Gagal ditambahkan</p></div>');
                                            }

                                            redirect('user/evaluasi');
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }

    public function ubah_usulan($id)
    {
        if (!$this->checkSession()) {
            $data['login'] = "user";
            $this->load->view('master/login', $data);
        } else {
            $data['usulan'] = $this->DataModel->select('*');
            $data['usulan'] = $this->DataModel->getWhere('id', $id);
            $data['usulan'] = $this->DataModel->getData('proposal')->row();
            if (strpos($id, 'amm') == true) {
                $data['page'] = 'user/detail_usulan_pbd_edit';
            } else {
                $data['page'] = 'user/detail_usulan_edit';
            }
            $this->load->view('master/dashboard', $data);
        }
    }

    public function edit_usulan()
    {
        $per = 1;
        $this->form_validation->set_rules('abstrak', 'Abstrak Proposal', 'required');
        $this->form_validation->set_rules('judul', 'Judul Proposal', 'required');
        $this->form_validation->set_rules('keywords', 'Keywords Proposal', 'required');
        $this->form_validation->set_rules('latbel', 'Latar Belakang Proposal', 'required');
        $this->form_validation->set_rules('tujuan', 'Tujuan Proposal', 'required');
        $this->form_validation->set_rules('manfaat', 'Manfaat Proposal', 'required');
        $this->form_validation->set_rules('tinjauan', 'Tinjauan Pustaka', 'required');
        $this->form_validation->set_rules('biaya', 'Biaya Proposal', 'required');
        $this->form_validation->set_rules('luaran', 'Luaran Proposal', 'required');

        $id = $this->input->post('idProposal');
        $ju = $this->input->post('ju');
        $nidn = $this->session->userdata('nidn');
        $sumDan = $this->input->post('sp');
        $jenDan = $this->input->post('jp');
        $judul = $this->input->post('judul');
        $tema = $this->input->post('tema');
        $abstrak = $this->input->post('abstrak');
        $key = $this->input->post('keywords');
        $latbel = $this->input->post('latbel');
        $tujuan = $this->input->post('tujuan');
        $manfaat = $this->input->post('manfaat');
        $tinjauan = $this->input->post('tinjauan');
        $nidnAng1 = $this->input->post('nidnAng1');
        $namaAng1 = $this->input->post('namaAng1');
        $nimMhs1 = $this->input->post('nim1');
        $biaya = $this->input->post('biaya');
        $luaran = $this->input->post('luaran');

        $dataP = $this->DataModel->select('rab,metopel,jadwal,pendukung,usulan');
        $dataP = $this->DataModel->getWhere('id', $id);
        $dataP = $this->DataModel->getData('proposal')->row();

        $proposal = $dataP->usulan;
        $berkas = $dataP->pendukung;
        $rab = $dataP->rab;
        $metopel = $dataP->metopel;
        $jadwal = $dataP->jadwal;

        if (!$this->checkSession()) {
            $data['login'] = "user";
            $this->load->view('master/login', $data);
        } else {
            if ($this->form_validation->run() == false) {
                echo "ada yang salah bung";
                echo "<br>";
                var_dump($this->form_validation);
            } else {

                if (!empty($_FILES['usulan']['name'])) {
                    // if(file_exists('assets/proposal/' . $dataP->usulan)){
                    unlink("assets/proposal/" . $dataP->usulan);
                    // }
                    $eksU = substr(strrchr($_FILES['usulan']['name'], '.'), 1);
                    $Usulan = $this->uploadFile($proposal, 'assets/proposal', 'pdf');
                    if (!$Usulan->do_upload('usulan')) {
                        echo "Usulan error " . "<br>";
                        //var_dump($Usulan->allowed_types);
                        //var_dump($_FILES['usulan']);
                        echo $Usulan->display_errors('<p>', '</p>');
                    }
                    $usulan = $id . "_Usulan_" . "amikom" . $eksU;
                }

                if (!empty($_FILES['rab']['name'])) {
                    unlink("assets/rab/" . $dataP->rab);
                    $eksR = substr(strrchr($_FILES['rab']['name'], '.'), 1);
                    $Rab = $this->uploadFile($rab, 'assets/rab', 'xls|xlsx');
                    //var_dump($Rab);
                    if (!$Rab->do_upload('rab')) {
                        echo "Rab error ";
                        echo $Rab->display_errors('<p>', '</p>');
                    }
                    $rab = $id . "_RAB_" . "amikom" . $eksR;
                }

                if (!empty($_FILES['metopel']['name'])) {
                    unlink("assets/metopel/" . $dataP->metopel);
                    $eksM = substr(strrchr($_FILES['metopel']['name'], '.'), 1);
                    $Metopel = $this->uploadFile($metopel, 'assets/metopel', 'png');
                    if (!$Metopel->do_upload('metopel')) {
                        echo "Metopel error ";
                        echo $Metopel->display_errors('<p>', '</p>');
                    }
                    $metopel = $id . "_METOPEL_" . "amikom" . $eksM;
                }

                if (!empty($_FILES['jadwal']['name'])) {
                    unlink("assets/jadwal/" . $dataP->jadwal);
                    $eksJ = substr(strrchr($_FILES['jadwal']['name'], '.'), 1);
                    $Jadwal = $this->uploadFile($jadwal, 'assets/jadwal', 'png');
                    if (!$Jadwal->do_upload('jadwal')) {
                        echo "Jadwal error ";
                        echo $Jadwal->display_errors('<p>', '</p>');
                    }
                    $jadwal = $id . "_Jadwal_" . "amikom" . $eksJ;
                }

                if (!empty($_FILES['berkas']['name'])) {
                    unlink("assets/pendukung/" . $dataP->pendukung);
                    $eksP = substr(strrchr($_FILES['berkas']['name'], '.'), 1);
                    $berkas = $id . "_Pendukung_" . "amikom";
                    $Berkas = $this->uploadFile($berkas, 'assets/pendukung', 'zip');
                    //var_dump($Rab);
                    if (!$Berkas->do_upload('berkas')) {
                        echo "Berkas error ";
                        echo $Berkas->display_errors('<p>', '</p>');
                    }
                    $berkas = $id . "_Pendukung_" . "amikom" . $eksP;
                }

                $data = array(
                    'id' => $id,
                    'judul' => $judul,
                    'tema' => $tema,
                    'abstrak' => $abstrak,
                    'keyword' => $key,
                    'latbel' => $latbel,
                    'tujuan' => $tujuan,
                    'manfaat' => $manfaat,
                    'tinjauan_pustaka' => $tinjauan,
                    'biaya' => $biaya,
                    'luaran' => $luaran,
                    'rab' => $rab,
                    'metopel' => $metopel,
                    'jadwal' => $jadwal,
                    'pendukung' => $berkas,
                    'usulan' => $proposal,
                    'edited' => date("Y-m-d H:i:s"),
                );

                //var_dump($data);

                $result = $this->DataModel->getWhere('id', $id);
                $result = $this->DataModel->update('proposal', $data);

                if ($result) {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissable">
                                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                            <p>Data Berhasil diedit</p></div>');

                } else {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissable">
                                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                            <p>Data Gagal diedit</p></div>');
                }
                redirect(base_url('user/evaluasi'));

            }
        }
    }

    public function edit_usulan_pbd()
    {
        $per = 1;

        $this->form_validation->set_rules('judul', 'Judul Proposal', 'required');
        $this->form_validation->set_rules('analisa', 'Analisa Proposal', 'required');
        $this->form_validation->set_rules('luaran', 'Luaran Proposal', 'required');
        $this->form_validation->set_rules('solusi', 'Solusi Proposal', 'required');
        $this->form_validation->set_rules('permasalahan', 'Permasalahan Proposal', 'required');

        $id = $this->input->post('idProposal');
        $ju = $this->input->post('ju');
        $nidn = $this->session->userdata('nidn');
        $judul = $this->input->post('judul');
        $analisa = $this->input->post('analisa');
        $luaran = $this->input->post('luaran');
        $solusi = $this->input->post('solusi');
        $permasalahan = $this->input->post('permasalahan');

        $dataP = $this->DataModel->select('rab,jadwal,pendukung,usulan');
        $dataP = $this->DataModel->getWhere('id', $id);
        $dataP = $this->DataModel->getData('proposal')->row();

        $proposal = $dataP->usulan;
        $berkas = $dataP->pendukung;
        $rab = $dataP->rab;
        $jadwal = $dataP->jadwal;

        if (!$this->checkSession()) {
            $data['login'] = "user";
            $this->load->view('master/login', $data);
        } else {
            if ($this->form_validation->run() == false) {
                echo "ada yang salah bung";
                echo "<br>";
                var_dump($this->form_validation);
            } else {

                if (!empty($_FILES['usulan']['name'])) {
                    // if(file_exists('assets/proposal/' . $dataP->usulan)){
                    unlink("assets/proposal/" . $dataP->usulan);
                    // }
                    $eksU = substr(strrchr($_FILES['usulan']['name'], '.'), 1);
                    $Usulan = $this->uploadFile($proposal, 'assets/proposal', 'pdf');
                    if (!$Usulan->do_upload('usulan')) {
                        echo "Usulan error " . "<br>";
                        //var_dump($Usulan->allowed_types);
                        //var_dump($_FILES['usulan']);
                        echo $Usulan->display_errors('<p>', '</p>');
                    }
                    $usulan = $id . "_Usulan_" . "amikom" . $eksU;
                }

                if (!empty($_FILES['rab']['name'])) {
                    unlink("assets/rab/" . $dataP->rab);
                    $eksR = substr(strrchr($_FILES['rab']['name'], '.'), 1);
                    $Rab = $this->uploadFile($rab, 'assets/rab', 'xls|xlsx');
                    //var_dump($Rab);
                    if (!$Rab->do_upload('rab')) {
                        echo "Rab error ";
                        echo $Rab->display_errors('<p>', '</p>');
                    }
                    $rab = $id . "_RAB_" . "amikom" . $eksR;
                }

                if (!empty($_FILES['jadwal']['name'])) {
                    unlink("assets/jadwal/" . $dataP->jadwal);
                    $eksJ = substr(strrchr($_FILES['jadwal']['name'], '.'), 1);
                    $Jadwal = $this->uploadFile($jadwal, 'assets/jadwal', 'png');
                    if (!$Jadwal->do_upload('jadwal')) {
                        echo "Jadwal error ";
                        echo $Jadwal->display_errors('<p>', '</p>');
                    }
                    $jadwal = $id . "_Jadwal_" . "amikom" . $eksJ;
                }

                if (!empty($_FILES['berkas']['name'])) {
                    unlink("assets/pendukung/" . $dataP->pendukung);
                    $eksP = substr(strrchr($_FILES['berkas']['name'], '.'), 1);
                    $berkas = $id . "_Pendukung_" . "amikom";
                    $Berkas = $this->uploadFile($berkas, 'assets/pendukung', 'zip');
                    //var_dump($Rab);
                    if (!$Berkas->do_upload('berkas')) {
                        echo "Berkas error ";
                        echo $Berkas->display_errors('<p>', '</p>');
                    }
                    $berkas = $id . "_Pendukung_" . "amikom" . $eksP;
                }

                $data = array(
                    'id' => $id,
                    'judul' => $judul,
                    'luaran' => $luaran,
                    'analisa' => $analisa,
                    'permasalahan' => $permasalahan,
                    'solusi' => $solusi,
                    'rab' => $rab . "." . $eksR,
                    'jadwal' => $jadwal . "." . $eksJ,
                    'pendukung' => $berkas . "." . $eksB,
                    'usulan' => $proposal . "." . $eksU,
                    'edited' => date("Y-m-d H:i:s"),
                );

                $result = $this->DataModel->getWhere('id', $id);
                $result = $this->DataModel->update('proposal', $data);

                if ($result) {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissable">
                                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                            <p>Data Berhasil diedit</p></div>');

                } else {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissable">
                                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                            <p>Data Gagal diedit</p></div>');
                }
                redirect(base_url('user/evaluasi'));


            }
        }

    }

    public function hapus_usulan($id)
    {
        if (!$this->checkSession()) {
            $data['login'] = "user";
            $this->load->view('master/login', $data);
        } else {
            $per = 1;
            $data = $this->DataModel->select('rab,jadwal,metopel,pendukung,usulan');
            $data = $this->DataModel->getJoin('usulan', 'usulan.idProposal = proposal.id', 'inner');
            $data = $this->DataModel->getWhere('nidn', $this->session->userdata('nidn'));
            $data = $this->DataModel->getWhere('idPeriode', $per);
            $data = $this->DataModel->getData('proposal')->row();

            $dataU = $this->DataModel->select('id');
            $dataU = $this->DataModel->getWhere('idProposal', $id);
            $dataU = $this->DataModel->getData('usulan')->row();
            // var_dump($dataU);
            $result = $this->DataModel->delete('idUsulan', $dataU->id, 'anggota');
            $result = $this->DataModel->delete('idProposal', $id, 'usulan');
            $result = $this->DataModel->delete('id', $id, 'proposal');
            if ($result) {
                if ($data != null) {
                    if ($data->rab != ".") {
                        unlink("assets/rab/" . $data->rab);
                        //echo "Rab ada";
                        //echo "<br>";
                    }

                    if ($data->jadwal != ".") {
                        unlink("assets/jadwal/" . $data->jadwal);
                        //echo "Jadwal ada";
                        //echo "<br>";
                    }

                    if ($data->metopel != ".") {
                        unlink("assets/metopel/" . $data->metopel);
                        //echo "Metopel ada";
                        //echo "<br>";
                    }

                    if ($data->pendukung != ".") {
                        unlink("assets/pendukung/" . $data->pendukung);
                        //echo "Pendukung ada";
                        //echo "<br>";
                    }

                    if ($data->usulan != ".") {
                        unlink("assets/proposal/" . $data->usulan);
                        //echo "Usulan ada";
                    }
                }

                $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissable">
                                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                        <p>Data Berhasil ditambahkan</p></div>');

            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissable">
                                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                        <p>Data Gagal ditambahkan</p></div>');
            }

            redirect('user/evaluasi');
        }
    }

    public function evaluasi()
    {
        if (!$this->checkSession()) {
            $data['login'] = "user";
            $this->load->view('master/login', $data);
        } else {
            $per = 1;
            $data['page'] = 'user/evaluasi';
            $data['proposal'] = $this->DataModel->select('*');
            $data['proposal'] = $this->DataModel->getJoin('usulan', 'usulan.idProposal = proposal.id', 'inner');
            $data['proposal'] = $this->DataModel->getWhere('nidn', $this->session->userdata('nidn'));
            $data['proposal'] = $this->DataModel->getWhere('idPeriode', $per);
            $data['proposal'] = $this->DataModel->getData('proposal')->row();

            $data['periode'] = $this->DataModel->select('nama');
            $data['periode'] = $this->DataModel->getWhere('id', $per);
            $data['periode'] = $this->DataModel->getData('periode')->row();
            //var_dump($data['proposal']->pendukung);
            $this->load->view('master/dashboard', $data);
        }
    }

    public function riwayat()
    {
        if (!$this->checkSession()) {
            $data['login'] = "user";
            $this->load->view('master/login', $data);
        } else {

            $data['page'] = 'user/riwayat';
            $data['proposal'] = $this->DataModel->select('*');
            $data['proposal'] = $this->DataModel->getJoin('usulan', 'usulan.idProposal = proposal.id', 'inner');
            $data['proposal'] = $this->DataModel->getJoin('periode', 'periode.id = usulan.idPeriode', 'inner');
            $data['proposal'] = $this->DataModel->getWhere('nidn', $this->session->userdata('nidn'));
            $data['proposal'] = $this->DataModel->getData('proposal')->result_array();
            //var_dump($data['proposal']);
            $this->load->view('master/dashboard', $data);
        }
    }

    public function password()
    {
        if (!$this->checkSession()) {
            $data['login'] = "user";
            $this->load->view('master/login', $data);
        } else {
            $data['page'] = 'user/ubah_password';
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
            $dataPass = $this->DataModel->getData('user')->row();
            if (md5($old) != $dataPass->password) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissable">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                    <p>Password Lama Tidak Cocok</p></div>');
                redirect('user/password');
            } else {
                $data = array(
                    'nidn' => $nidn,
                    'password' => md5($new),
                );
                $result = $this->DataModel->getWhere('nidn', $nidn);
                $result = $this->DataModel->update('user', $data);
                if ($result == false) {
                    echo "Edit Password gagal";
                } else {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissable">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                    <p>Password Berhasil diubah</p></div>');
                    redirect('user/password');
                }
            }
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
                "nidn" => $uname,
                "password" => md5($pass),
            );
            $result = $this->DataModel->Login("user", $data)->row();

            if ($result != null) {
                $id = $result->nidn;
                //$username = $result->username;
                $level = "user";
                $profile = $this->DataModel->select('foto');
                $profile = $this->DataModel->getWhere('nidn', $id);
                $profile = $this->DataModel->getData('dosen')->row();
                $data_session = array(
                    'nidn' => $id,
                    'level' => $level,
                    'status' => "login",
                    'foto' => $profile->foto,
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

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url('user/index'));
    }

    public function uploadFile($name, $path, $type)
    {
        $config['upload_path'] = $path;
        $config['allowed_types'] = $type;
        $config['file_name'] = $name;
        return $this->upload->initialize($config);
    }

}
