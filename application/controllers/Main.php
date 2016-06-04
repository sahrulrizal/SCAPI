<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	/**
	 * @author Sahrul Rizal
	 */

	public function index()
	{
		$data['title'] = "Dynamic Soundcloud API";
		$this->load->view('main',$data);
	}

	public function sc_admin()
	{
		$data['title'] = "Login | Simple Dynamic Soundcloud API";
		$this->load->view('login',$data);
	}
}
