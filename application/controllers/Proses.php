<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proses extends CI_Controller {

	/**
	 * @author Sahrul Rizal
	 */

	public function down($id="")
	{
		if ($id == null) {
			echo "ERROR";
		}else{
		// data 1
			$data1 = file_get_contents("http://api.soundcloud.com/tracks/".$id."/streams?client_id=f6fa8262c59cce0df544151a73d64c0e");
			$a = json_decode($data1);
		// data 2
			$data2 = file_get_contents("http://api.soundcloud.com/tracks/".$id.".json?client_id=f6fa8262c59cce0df544151a73d64c0e");
			$b = json_decode($data2);

			function getfilesize($url) {$data=get_headers($url, true);
				if (isset($data['Content-Length']))
					return (int)$data['Content-Length'];
			}

			header("Content-Type:audio/mpeg");
			header('Content-Disposition: attachment; filename='.$b->title.'.mp3');
			header('Content-length: '.getfilesize($a->http_mp3_128_url));
			readfile($a->http_mp3_128_url);
			header("Content -Transfer-Encoding:binary");

		}
	}

	public function pro_login()
	{
	$user = $this->input->post('username');
	$password = md5($this->input->post('password'));
	$query = $this->db->query("SELECT * FROM user WHERE username='$user' AND password = '$password' ");
		if ($query->num_rows() > 0 ) {
			foreach ($query->result() as $row) {
				$dataSession = array(
					'id_user' => $row->id_user
					);
				$this->session->set_userdata($dataSession);
			}

			redirect('admin');

		}else{
			$this->session->set_flashdata('error', 'Maaf username dan password yang anda masukan tidak valid, Mohon cek kembali !');
			redirect('main/sc_admin');
		}
	}

	public function logout()
	{
		if(!$this->session->userdata('id_user'))
		{
			redirect('main/sc_admin');
		}

		$array_items = array('status', 'level','status');
		$this->session->unset_userdata($array_items);
		$this->session->sess_destroy();
		redirect(site_url());
	}

	// USER

	public function getUser($id)
	{
		$a = $this->m_scapi->getUser($id);
		$this->output
		->set_status_header(200)
		->set_content_type('application/json', 'utf-8')
		->set_output(json_encode($a, JSON_PRETTY_PRINT))
		->_display();
		exit;
	}

	public function addUser()
	{
		if(!$this->session->userdata('id_user'))
		{
			redirect('main/sc_admin');
		}
		$this->m_scapi->addUser();
	}

		public function editUser()
	{
		if(!$this->session->userdata('id_user'))
		{
			redirect('main/sc_admin');
		}
		$this->m_scapi->editUser();
	}

		public function deleteUser($id='')
	{
		if(!$this->session->userdata('id_user'))
		{
			redirect('main/sc_admin');
		}
		$this->m_scapi->deleteUser($id);
	}

	// GENRES

	public function getGenre($id)
	{
		$a = $this->m_scapi->getGenre($id);
		$this->output
		->set_status_header(200)
		->set_content_type('application/json', 'utf-8')
		->set_output(json_encode($a, JSON_PRETTY_PRINT))
		->_display();
		exit;
	}

	public function getAllGenres()
	{
		$a = $this->m_scapi->getAllGenres();
		$this->output
		->set_status_header(200)
		->set_content_type('application/json', 'utf-8')
		->set_output(json_encode($a, JSON_PRETTY_PRINT))
		->_display();
		exit;
	}

		public function addGenre()
	{
		if(!$this->session->userdata('id_user'))
		{
			redirect('main/sc_admin');
		}
		$this->m_scapi->addGenre();
	}

		public function editGenre()
	{
		if(!$this->session->userdata('id_user'))
		{
			redirect('main/sc_admin');
		}
		$this->m_scapi->editGenre();
	}

		public function deleteGenre($id='')
	{
		if(!$this->session->userdata('id_user'))
		{
			redirect('main/sc_admin');
		}
		$this->m_scapi->deleteGenre($id);
	}

	// ADVERTISEMENT

	public function getAdver($id)
	{
		$a = $this->m_scapi->getAdver($id);
		$this->output
		->set_status_header(200)
		->set_content_type('application/json', 'utf-8')
		->set_output(json_encode($a, JSON_PRETTY_PRINT))
		->_display();
		exit;
	}

		public function addAdver()
	{
		if(!$this->session->userdata('id_user'))
		{
			redirect('main/sc_admin');
		}
		$this->m_scapi->addAdver();
	}

		public function editAdver()
	{
		if(!$this->session->userdata('id_user'))
		{
			redirect('main/sc_admin');
		}
		$this->m_scapi->editAdver();
	}

		public function deleteAdver($id='')
	{
		if(!$this->session->userdata('id_user'))
		{
			redirect('main/sc_admin');
		}
		$this->m_scapi->deleteAdver($id);
	}
}
