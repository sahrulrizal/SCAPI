<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Partial extends CI_Controller {

	/**
	 * @author Sahrul Rizal
	 */

	public function main()
	{
		$this->load->view('partials/main');
	}
	public function error404()
	{
		$this->load->view('partials/error404');
	}
}
