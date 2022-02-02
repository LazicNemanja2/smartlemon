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

    public function login() 
    {
        $this->load->view('login');
    }
}