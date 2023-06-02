<?php
class partai extends Controller {

    public function __construct(){

        if($_SESSION['session_login'] != 'sudah_login') {
            
        Flasher::setMessage('Login','Tidak ditemukan.','danger');
        header('location: '. base_url . '/login');
        exit;
        
        }
    }

    public function index(){
        $data['title']='Data Partai Pemilihan Umum';
        $data['partai']=$this->model('PartaiModel')->getAllPartai();
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('partai/index', $data);
        $this->view('templates/footer');
    }




    public function tambahPartai(){
        $data['title'] = 'Tambah Data Partai';
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('partai/create', $data);
        $this->view('templates/footer');
    }
    public function simpanPartai(){
        if( $this->model('PartaiModel')->tambahPartai($_POST) > 0 ){
            Flasher::setMessage('Berhasil','ditambahkan', 'success');
            header('location: ' . base_url . '/partai');
            exit;
        }else{
            Flasher::setMessage('Gagal', 'ditambahkan', 'danger');
            header('location: ' . base_url . '/partai');
            exit;
        }
    }  



    
    public function editPartai($id){
        $data['title'] = 'Detail Data Partai';
        $data['partai'] = $this->model('PartaiModel')->getPartaiById($id);
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('partai/edit', $data);
        $this->view('templates/footer');
    }
    public function updatePartai(){
        if( $this->model('PartaiModel')->updatePartai($_POST) > 0 ){
            Flasher::setMessage('Berhasil','diupdate', 'success');
            header('location: ' . base_url . '/partai');
            exit;
        }else{
            Flasher::setMessage('Gagal', 'diupdate', 'danger');
            header('location: ' . base_url . '/partai');
            exit;
        }
    }  


    

    public function cariPartai(){
        $data['title'] = 'Data Partai Pemilihan Umum';
        $data['partai'] = $this->model('PartaiModel')->cariPartai();
        $data['key'] = $_POST['key'];
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('partai/index', $data);
        $this->view('templates/footer');
    }
    public function hapusPartai($id){
        if( $this->model('PartaiModel')->deletePartai($id) > 0 ){
            Flasher::setMessage('Berhasil','dihapus', 'success');
            header('location: ' . base_url . '/partai');
            exit;
        }else{
            Flasher::setMessage('Gagal', 'dihapus', 'danger');
            header('location: ' . base_url . '/partai');
            exit;
        }
    }  



}
