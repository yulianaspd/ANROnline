<?php defined('BASEPATH') OR exit('No direct script access allowed');
class ANROC_Auth extends CI_Controller{
    function __construct(){
        parent::__construct();
       
    }
    function index(){
        if($this->session->username != null){
            redirect("Beranda");
        }
        else{
            $this->load->view("Auth/ANROV_Login");
        }
    }
    function register(){
        if($this->session->username != null){
            redirect("Beranda");
        }else{
            $data['title']="ANROnline | Regitrasi";
            $this->load->view("ANROV_Header",$data);
            $this->load->view("Auth/ANROV_Register");
            $this->load->view("ANROV_Footer");
        }
        
    }
    function daftar(){
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $nama = $this->input->post('nama');
        $email = $this->input->post('email');
        $data = array(
            'username' => $username,
            'password' => md5($password),
            'nama' => $nama,
            'email' => $email,
            'aktif' => 0
        );
        $id = $this->ANRO_Model->create("anr_auth",$data);
        $encrypted_id = md5($id);

        $this->load->library('email');
        $config = array();
        $config['charset'] = 'utf-8';
        $config['useragent'] = 'Codeigniter';
        $config['protocol']= "smtp";
        $config['mailtype']= "html";
        $config['smtp_host']= "ssl://smtp.gmail.com";//pengaturan smtp
        $config['smtp_port']= "465";
        $config['smtp_timeout']= "400";
        $config['smtp_user']= "arifnurdiansyah92@gmail.com"; // isi dengan email kamu
        $config['smtp_pass']= "naonweh123"; // isi dengan password kamu
        $config['crlf']="\r\n"; 
        $config['newline']="\r\n"; 
        $config['wordwrap'] = TRUE;
        //memanggil library email dan set konfigurasi untuk pengiriman email

        $this->email->initialize($config);
        //konfigurasi pengiriman
        $this->email->from($config['smtp_user']);
        $this->email->to($email);
        $this->email->subject("Verifikasi Akun");
        $this->email->message(
         "terimakasih telah melakuan registrasi, untuk memverifikasi silahkan klik tautan dibawah ini<br><br>".
          site_url("ANROC_Auth/verification/$encrypted_id")
        );

        if($this->email->send())
        {
           echo "Berhasil melakukan registrasi, silahkan cek email kamu";
        }else
        {
           echo "Berhasil melakukan registrasi, namu gagal mengirim verifikasi email";
        }

        echo "<br><br><a href='".site_url("login")."'>Kembali ke Menu Login</a>";
    }
    public function verification($key)
    {
        $this->ANRO_Model->update(array("md5(id_auth)"=>$key),array('aktif'=>1),"anr_auth");
        echo "Selamat kamu telah memverifikasi akun kamu";
        echo "<br><br><a href='".site_url("login")."'>Kembali ke Menu Login</a>";
    }
    function auth(){
        $username = $this->input->post('username');
        $pass = $this->input->post('password');
        $word = md5($pass);
        $where="username = '$username' OR email = '$username' AND password = '$word'";
        $cek = $this->ANRO_Model->read("anr_auth",$where);
        if($cek->num_rows() > 0){
            foreach($cek->result() as $res){
                $nama= $res->nama;
                $email= $res->e-mail;
                $data_session = array(
                'username' => $username,
                'nama' =>  $nama,
                'email' => $email
            );
            $this->session->set_userdata($data_session); 
            redirect("Beranda");
            }
        }else{  
            echo "Username/Password Salah!";
       }
    }
    function logout(){
        $this->session->sess_destroy();
        redirect("ANROC_Auth/");
    }
}