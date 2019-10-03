<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Publication_model extends CI_Model
{


		public function getUserName($id)
		{
			$publication_id = $id;
			$this->db->select('username');
			$this->db->from('users u');
			$this->db->join('publication p','u.id = p.author_id');
			$this->db->where('p.id ='. $publication_id);
			$query = $this->db->get();
			return $query->row();
		}

		public function getPublication()
		{
			$query = $this->db->get('publication');
			return $query->result();
		}

		public function getPublicationId($id)
		{
			$this->db->where('id', $id);
			$query = $this->db->get('publication');

			return $query->row();

		}
	public function submit()
	{
		$field = array(
			'author_id' => $this->ion_auth->get_user_id(),
			'description'=> $this->input->post('description'),
			'text' => $this->input->post('text'),
			'created_at'=> date('Y-m-d H:i:s')
		);
		$this->db->insert('publication', $field);
		return $this->db->last_query();
	}
		public function update()
		{
			$id = $this->input->post('txt_hidden');
			$field = array(
				'description'=>$this->input->post('description'),
				'text'=>$this->input->post('text'),
				'updated_at'=>date('Y-m-d H:i:s')
			);
			$this->db->where('id', $id);
			$this->db->update('publication', $field);
			return $this->db->last_query();
		}
		public function delete($id)
		{
			$this->db->where('id', $id);
			$this->db->delete('publication');
			return $this->db->last_query();
		}

}
