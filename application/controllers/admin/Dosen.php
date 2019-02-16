<?php


class Dosen extends CI_Controller{
    
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

    public function index(){
        if (!$this->checkSession()) {
            $data['login'] = "admin";
            $this->load->view('master/login', $data);
        } else {
            $data['page'] = 'admin/dosen';
            $data['dosen'] = $this->DataModel->getData('dosen')->result_array();
            $this->load->view('master/dashboard',$data);
        }
    }

    public function tambah(){
        $this->form_validation->set_rules('nidn','NIDN','required');
        $this->form_validation->set_rules('nama', 'Periode', 'required');
        $this->form_validation->set_rules('ja', 'Jabatan Akademik', 'required');
        $this->form_validation->set_rules('jp','Jenjang Pendidikan','required');

        $nidn = $this->input->post('nidn');
        $nama = $this->input->post('nama');
        $prodi = $this->input->post('prodi');
        $jk = $this->input->post('jk');
        $ja = $this->input->post('ja');
        $jp = $this->input->post('jp');



        if ($this->form_validation->run() == false) {
            $this->load->view('master/login');
        } else if($prodi == "0"){
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissable">
                                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                        <p>Bagian Belum dipilih</p></div>');
            $data['page'] = "admin/dosen";
            $this->load->view('master/dashboard', $data);
        }else{
            //echo $prodi;
            $data = array(
                "nidn" => $nidn,
                "nama" => $nama,
                "prodi" => $prodi,
                "jk" => $jk,
                "jp" => $jp,
                "ja" => $ja
            );
            $dataUser = array(
                "nidn" => $nidn,
                "password" => md5("user")
            );
            $result = $this->DataModel->insert('dosen',$data);
            $result = $this->DataModel->insert('user',$dataUser);
            if($result){
                $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissable">
                                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                        <p>Data Berhasil ditambahkan</p></div>');
                
            }else{
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissable">
                                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                        <p>Data Gagal ditambahkan</p></div>');
            }
            redirect('admin/dosen');
            // $data['page'] = 'admin/dosen';
            // $data['dosen'] = $this->DataModel->getData('dosen')->result_array();
            // $this->load->view('master/dashboard',$data);
        }

    }

    public function edit(){
        $this->form_validation->set_rules('nidn','NIDN','required');
        $this->form_validation->set_rules('nama', 'Periode', 'required');
        $nidn = $this->input->post('nidn');
        $nama = $this->input->post('nama');
        $jk = $this->input->post('jk');
        $prodi = $this->input->post('prodi');
        $email = $this->input->post('email');
        $nohp = $this->input->post('nohp');
        $alamat = $this->input->post('alamat');


        if ($this->form_validation->run() == false) {
            $this->load->view('master/login');
        } else if($prodi == "0"){
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissable">
                                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                        <p>Bagian Belum dipilih</p></div>');
            $data['page'] = "admin/dosen";
            $this->load->view('master/dashboard', $data);
        }else {
            $data = array(
                "nama" => $nama,
                "jk" => $jk,
                "email" => $email,
                "alamat" => $alamat,
                "nohp" => $nohp,
                "programstudi" => $prodi,
            );
            $result = $this->DataModel->getWhere('nidn',$nidn);
            $result = $this->DataModel->update('dosen',$data);
            if($result){
                $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissable">
                                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                        <p>Data Berhasil diedit</p></div>');
                
            }else{
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissable">
                                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                        <p>Data Gagal diedit</p></div>');
            }
            $data['page'] = 'user/home';
            $data['profile'] = $this->DataModel->getWhere('nidn',$this->session->userdata('nidn'));
            $data['profile'] = $this->DataModel->getData('dosen')->row();
            $this->load->view('master/dashboard',$data);
        }

    }    

    public function hapus($id){
        if (!$this->checkSession()) {
            $data['login'] = "admin";
            $this->load->view('master/login', $data);
        } else {
            $dataAdmin = $this->DataModel->getWhere('nidn',$id);
            $dataAdmin = $this->DataModel->getData('admin')->row();
            if($dataAdmin != null){
                $result = $this->DataModel->delete('nidn',$id,'admin');    
            }

            $result = $this->DataModel->delete('nidn',$id,'user');
            
            if($result){
                $result = $this->DataModel->delete('nidn',$id,'dosen');
                if($result){
                    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissable">
                                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                        <p>Data Berhasil dihapus</p></div>'); 
                }                                           
            }else{
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissable">
                                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                        <p>Data Gagal dihapus</p></div>');
            }
            $data['page'] = 'admin/dosen';
            $data['dosen'] = $this->DataModel->getData('dosen')->result_array();
            $this->load->view('master/dashboard',$data);
        }
        
    }
}