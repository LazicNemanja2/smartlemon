<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {

	public function index()
	{
		$this->load->view('home');
	}

    public function registration() 
    {
        $this->load->view('registration');
    }

    public function register_user() 
    {
        $data = $this->input->post();
        if ($data['name'] == '' || $data['email'] == '' || $data['password'] == '' || $data['repeat_password'] == '') {
            $_SESSION['notification'] = 'All filds are required';
            $this->session->mark_as_flash(['notification']);
            redirect('registration');

        } else if ($data['password'] != $data['repeat_password']) {
            $_SESSION['notification'] = 'repeated password does not match with password';
            $this->session->mark_as_flash(['notification']);
            redirect('registration');
        } else {
            if ($this->Users_model->email_used($data['email'])) {
                $_SESSION['notification'] = 'This email is used.';
                $this->session->mark_as_flash(['notification']);
                redirect('registration');
            } else {
                unset($data['repeat_password']);
                $data['id'] = $this->Users_model->add_user($data);
            }
        }

        $this->set_user_session($data);
        redirect();
    }

    private function set_user_session($data) {
        $_SESSION['user'] = $data;
    }

    public function login() 
    {
        $this->load->view('login');
    }
}