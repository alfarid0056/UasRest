<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    
    
    public function __construct(){
        parent::__construct();
        $this->load->model('GlobalCrud','crud');
        $this->load->model('UserModel','user'); 
    }

	public function index()
	{
		$this->load->view('layouts/header');
        $this->load->view('login');
        $this->load->view('layouts/footer');
	}
    
    public function signin()
	{
		  $query = array(
            'username' => $this->input->post('username'),
            'password' => md5($this->input->post('password'))
          );
            
        
        $result = $this->crud->get('user',$query);
        
        if($result->num_rows() == 1){
            $this->user->session($result);
            
        } else  {
            $this->session->set_flashdata('notify','<font color="red">Username atau Password Salah</font>');
            redirect('login');
        }
            
        
	}
    
    function signout(){
        $this->session->unset_userdata('id_user');
        $this->session->unset_userdata('nama');
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('password');
        $this->session->unset_userdata('role');

        redirect('login');

    }
}
