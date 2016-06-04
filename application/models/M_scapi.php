<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_scapi extends CI_Model {

	/**
	 * @author Sahrul Rizal
	 */

	public function getAllUsers()
	{
		$val = $this->db->get('user');
		if ($val->num_rows() > 0) {
			$ok = $val->result();
		}else{
			$ok = $val->num_rows();
		}
		return $ok;
	}

	public function rowUser()
	{
		return $this->db->get('user')->num_rows();
	}

	public function GetPagUser($a,$b)
	{
		$val = $this->db->get('user',$a,$b);
		if ($val->num_rows() > 0) {
			$ok = $val->result();
		}else{
			$ok = $val->num_rows();
		}
		return $ok;
	}

	public function getUser($id)
	{
		$this->db->select('id_user,name,username');
		$val = $this->db->get_where('user',array('id_user' => $id));
		if ($val->num_rows() > 0) {
			$ok = $val->result();
		}else{
			$ok = array('error' => 'Sorry data is not found!');
		}
		return $ok;
	}

	public function searchUser($u)
	{
		$u = $this->db->query("SELECT * FROM `user` WHERE username LIKE '%$u%'");
		if ($u->num_rows() > 0) {
			$ok = $u->result();
		}else{
			$ok = $u->num_rows();
		}

		return $ok;
	}

	public function searchUsern($u)
	{
		$u = $this->db->query("SELECT * FROM `user` WHERE name LIKE '%$u%'");
		if ($u->num_rows() > 0) {
			$ok = $u->result();
		}else{
			$ok = $u->num_rows();
		}

		return $ok;
	}

	public function addUser()
	{
		if (isset($_POST['sub'])) {
			if ($this->input->post('password') == $this->input->post('re_password')) {
				$val = $this->db->insert('user', array(
					'name' => $this->input->post('name', TRUE),
					'username' => $this->input->post('username', TRUE),
					'password' => md5($this->input->post('password', TRUE))
					));
					if ($val == true) {
						$this->session->set_flashdata('success', 'Success add new data');
					}else{
						$this->session->set_flashdata('error', 'Sorry failed to add new data!');
					}
			}else{
				$this->session->set_flashdata('error', "Sorry, your password must be matched with new password");
			}
		}
		redirect('admin/users');
	}

	public function editUser()
	{
		if (isset($_POST['sub'])) {	
			$this->db->update('user',array('name' => $this->input->post('name', TRUE),'username' => $this->input->post('username', TRUE)),array('id_user' => $this->input->post('id')));	
			$this->session->set_flashdata('success', 'Data berhasil diubah');			
		}else{
			$this->session->set_flashdata('error', "You Can't Access this address, Please submit button add user!");
		}
		redirect('admin/users');
	}

	public function deleteUser($id)
	{
		if ($this->session->userdata('id_user') != $id) {			
			$val = $this->db->delete('user',array('id_user' => $id));
			if ($val == true) {
				$this->session->set_flashdata('success', 'Sucess delete data');
			}else{
				$this->session->set_flashdata('error', 'Sorry failed to delete data!');
			}
		}else{
			$this->session->set_flashdata('error', "Sorry this data can't be deleted");
		}
		redirect('admin/users');
	}

	// ::::::: GENRES ::::::::: //

		public function getAllGenres()
	{
		$val = $this->db->get('genres');
		if ($val->num_rows() > 0) {
			$ok = $val->result();
		}else{
			$ok = $val->num_rows();
		}
		return $ok;
	}

	public function rowGenre()
	{
		return $this->db->get('genres')->num_rows();
	}

	public function GetPagGenre($a,$b)
	{
		$val = $this->db->get('genres',$a,$b);
		if ($val->num_rows() > 0) {
			$ok = $val->result();
		}else{
			$ok = $val->num_rows();
		}
		return $ok;
	}

	public function getGenre($id)
	{
		$this->db->select('id_genre,genre');
		$val = $this->db->get_where('genres',array('id_genre' => $id));
		if ($val->num_rows() > 0) {
			$ok = $val->result();
		}else{
			$ok = array('error' => 'Sorry data is not found!');
		}
		return $ok;
	}

	public function searchGenre($u)
	{
		$u = $this->db->query("SELECT * FROM `genres` WHERE genre LIKE '%$u%'");
		if ($u->num_rows() > 0) {
			$ok = $u->result();
		}else{
			$ok = $u->num_rows();
		}
		return $ok;
	}


	public function addGenre()
	{
		if (isset($_POST['sub'])) {
				$val = $this->db->insert('genres', array(
					'genre' => $this->input->post('genre', TRUE)
					));
					if ($val == true) {
						$this->session->set_flashdata('success', 'Success add new data');
					}else{
						$this->session->set_flashdata('error', 'Sorry failed to add new data!');
					}
		}
		redirect('admin/genres');
	}

	public function editGenre()
	{
		if (isset($_POST['sub'])) {	
			$this->db->update('genres',array('genre' => $this->input->post('genre', TRUE)),array('id_genre' => $this->input->post('id')));	
			$this->session->set_flashdata('success', 'success!');			
		}else{
			$this->session->set_flashdata('error', "You Can't Access this address, Please submit button add genre!");
		}
		redirect('admin/genres');
	}

	public function deleteGenre($id)
	{
		$val = $this->db->delete('genres',array('id_genre' => $id));
		if ($val == true) {
			$this->session->set_flashdata('success', 'Data had been deleted!');
		}else{
			$this->session->set_flashdata('error', 'Sorry failed to delete the data!');
		}
		
		redirect('admin/genres');
	}

	// ::::::: ADVERTISEMENT ::::::::: //

	public function getAllAdver()
	{
		$val = $this->db->get('advertisement');
		if ($val->num_rows() > 0) {
			$ok = $val->result();
		}else{
			$ok = $val->num_rows();
		}
		return $ok;
	}

	public function rowAdver()
	{
		return $this->db->get('advertisement')->num_rows();
	}

	public function GetPagAdver($a,$b)
	{
		$val = $this->db->get('advertisement',$a,$b);
		if ($val->num_rows() > 0) {
			$ok = $val->result();
		}else{
			$ok = $val->num_rows();
		}
		return $ok;
	}

	public function getAdver($id)
	{
		$this->db->select('id_adver,title,text');
		$val = $this->db->get_where('advertisement',array('id_adver' => $id));
		if ($val->num_rows() > 0) {
			$ok = $val->result();
		}else{
			$ok = array('error' => 'Sorry data is not found!');
		}
		return $ok;
	}

	public function searchAdver($u)
	{
		$u = $this->db->query("SELECT * FROM `advertisement` WHERE title LIKE '%$u%'");
		if ($u->num_rows() > 0) {
			$ok = $u->result();
		}else{
			$ok = $u->num_rows();
		}
		return $ok;
	}


	public function addAdver()
	{
		if (isset($_POST['sub'])) {
				$val = $this->db->insert('advertisement', array(
					'title' => $this->input->post('title', TRUE),
					'text' => $this->input->post('text')
					));
					if ($val == true) {
						$this->session->set_flashdata('success', 'Success add new data');
					}else{
						$this->session->set_flashdata('error', 'Sorry failed to add new data!');
					}
		}
		redirect('admin/advertisement');
	}

	public function editAdver()
	{
		if (isset($_POST['sub'])) {	
			$this->db->update('advertisement',array('title' => $this->input->post('title', TRUE),'text' => $this->input->post('text')),array('id_adver' => $this->input->post('id')));	
			$this->session->set_flashdata('success', 'Data berhasil diubah');			
		}else{
			$this->session->set_flashdata('error', "You Can't Access this address, Please submit button add text!");
		}
		redirect('admin/advertisement');
	}

	public function deleteAdver($id)
	{
		$val = $this->db->delete('advertisement',array('id_adver' => $id));
		if ($val == true) {
			$this->session->set_flashdata('success', 'Data had been deleted!');
		}else{
			$this->session->set_flashdata('error', 'Sorry failed to delete the data!');
		}
		
		redirect('admin/advertisement');
	}
}
