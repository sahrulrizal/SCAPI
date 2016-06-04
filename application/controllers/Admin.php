<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	/**
	 * @author Sahrul Rizal
	 */

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('id_user'))
		{
			redirect('main/sc_admin');
		}
	}

	public function index()
	{
		$data['title'] = "Welcome to Dashboard";
		$this->load->view('admin',$data);
	}

	public function users()
	{
		$a = $this->input->get('search');
		$data['title'] = 'Users | SCAPI'; 
		$data['title_c'] = 'Users';

		// Untuk pagination
		$config['full_tag_open'] = "<ul class='pagination pagination-sm no-margin'>";
		$config['full_tag_close'] ="</ul>";
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
		$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
		$config['next_tag_open'] = "<li>";
		$config['next_tagl_close'] = "</li>";
		$config['prev_tag_open'] = "<li>";
		$config['prev_tagl_close'] = "</li>";
		$config['first_tag_open'] = "<li>";
		$config['first_tagl_close'] = "</li>";
		$config['last_tag_open'] = "<li>";
		$config['last_tagl_close'] = "</li>";

		// MODEL
		$config['base_url'] = base_url('admin/users/'); 
		$config['total_rows'] = $this->m_scapi->rowUser(); 
		$config['per_page'] = 10;
		
		$this->pagination->initialize($config);

		if ($a != "") {	
			if ($this->m_scapi->searchUser($a) != 0) {
				$data['circle'] = $this->m_scapi->searchUser($a);
			}else{
				$data['circle'] = $this->m_scapi->searchUsern($a);
			}	
		}else{
			$data['circle'] = $this->m_scapi->GetPagUser($config['per_page'],$this->uri->segment(3));	
			// $data['circle'] = $this->m_scapi->getAllUsers();
		}
		$this->load->view('admin',$data);
	}

	public function genres()
	{
		$a = $this->input->get('search');
		$data['title'] = 'Genre | SCAPI'; 
		$data['title_c'] = 'Genre';

		// Untuk pagination
		$config['full_tag_open'] = "<ul class='pagination pagination-sm no-margin'>";
		$config['full_tag_close'] ="</ul>";
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
		$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
		$config['next_tag_open'] = "<li>";
		$config['next_tagl_close'] = "</li>";
		$config['prev_tag_open'] = "<li>";
		$config['prev_tagl_close'] = "</li>";
		$config['first_tag_open'] = "<li>";
		$config['first_tagl_close'] = "</li>";
		$config['last_tag_open'] = "<li>";
		$config['last_tagl_close'] = "</li>";

		// MODEL
		$config['base_url'] = base_url('admin/genres/'); 
		$config['total_rows'] = $this->m_scapi->rowGenre(); 
		$config['per_page'] = 10;
		
		$this->pagination->initialize($config);

		if ($a != "") {	
			$data['circle'] = $this->m_scapi->searchGenre($a);
		}else{
			$data['circle'] = $this->m_scapi->GetPagGenre($config['per_page'],$this->uri->segment(3));	
		}

		$this->load->view('admin',$data);
	}

	public function advertisement()
	{
		$a = $this->input->get('search');
		$data['title'] = 'Advertisement | SCAPI'; 
		$data['title_c'] = 'Advertisement';

		// Untuk pagination
		$config['full_tag_open'] = "<ul class='pagination pagination-sm no-margin'>";
		$config['full_tag_close'] ="</ul>";
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
		$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
		$config['next_tag_open'] = "<li>";
		$config['next_tagl_close'] = "</li>";
		$config['prev_tag_open'] = "<li>";
		$config['prev_tagl_close'] = "</li>";
		$config['first_tag_open'] = "<li>";
		$config['first_tagl_close'] = "</li>";
		$config['last_tag_open'] = "<li>";
		$config['last_tagl_close'] = "</li>";

		// MODEL
		$config['base_url'] = base_url('admin/advertisement/'); 
		$config['total_rows'] = $this->m_scapi->rowAdver(); 
		$config['per_page'] = 10;
		
		$this->pagination->initialize($config);

		if ($a != "") {	
			$data['circle'] = $this->m_scapi->searchAdver($a);
		}else{
			$data['circle'] = $this->m_scapi->GetPagAdver($config['per_page'],$this->uri->segment(3));	
		}

		$this->load->view('admin',$data);
	}

}
