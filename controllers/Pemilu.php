<?php
class pemilu extends Controller {

    public function __construct(){

        if($_SESSION['session_login'] != 'sudah_login') {
            
        Flasher::setMessage('Login','Tidak ditemukan.','danger');
        header('location: '. base_url . '/login');
        exit;
        
        }
    }

    public function index(){
        $data['title']='Data Pemilihan Umum';
        $data['pemilu']=$this->model('PemiluModel')->getAllPemilu();
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('pemilu/index', $data);
        $this->view('templates/footer');
    }




    public function tambahPemilu(){
        $data['title'] = 'Tambah Data Pemilihan Umum';
        $data['partai']=$this->model('PartaiModel')->getAllPartai();
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('pemilu/create', $data);
        $this->view('templates/footer');
    }
    public function simpanPemilu(){
        if( $this->model('PemiluModel')->tambahPemilu($_POST) > 0 ){
            Flasher::setMessage('Berhasil','ditambahkan', 'success');
            header('location: ' . base_url . '/pemilu');
            exit;
        }else{
            Flasher::setMessage('Gagal', 'ditambahkan', 'danger');
            header('location: ' . base_url . '/pemilu');
            exit;
        }
    }  



    
    public function editPemilu($id){
        $data['title'] = 'Detail Data Pemilihan Umum';
        $data['partai']=$this->model('PartaiModel')->getAllPartai();
        $data['pemilu'] = $this->model('PemiluModel')->getPemiluById($id);
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('pemilu/edit', $data);
        $this->view('templates/footer');
    }
    public function updatePemilu(){
        if( $this->model('PemiluModel')->updatePemilu($_POST) > 0 ){
            Flasher::setMessage('Berhasil','diupdate', 'success');
            header('location: ' . base_url . '/pemilu');
            exit;
        }else{
            Flasher::setMessage('Gagal', 'diupdate', 'danger');
            header('location: ' . base_url . '/pemilu');
            exit;
        }
    }  


    

    public function cariPemilu(){
        $data['title'] = 'Data Pemilihan Umum  ';
        $data['pemilu'] = $this->model('PemiluModel')->cariPemilu();
        $data['key'] = $_POST['key'];
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('pemilu/index', $data);
        $this->view('templates/footer');
    }
    public function hapusPemilu($id){
        if( $this->model('PemiluModel')->deletePemilu($id) > 0 ){
            Flasher::setMessage('Berhasil','dihapus', 'success');
            header('location: ' . base_url . '/pemilu');
            exit;
        }else{
            Flasher::setMessage('Gagal', 'dihapus', 'danger');
            header('location: ' . base_url . '/pemilu');
            exit;
        }
    }  



}
