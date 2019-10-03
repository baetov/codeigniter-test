<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comment_model extends CI_Model
{
	public function getComment($id)
	{
		$publication_id = $id;
		$this->db->select('*');
		$this->db->from('comment');
		$this->db->where('publication_id =' . $publication_id);
		$query = $this->db->get();
		return $query->result();

	}
// public function getCommentAuthor($id)
// {
//	 $publication_id = $id;
//	 $this->db->select('*');
//	 $this->db->from('comment c');
//	 $this->db->join('publication p','c.publication_id = p.id');
//	 $this->db->join('users u', 'c.author_id = u.id');
//	 $this->db->where('p.id ='. $publication_id);
//	 $this->db->where('c.author_id = u.id');
//	 $query = $this->db->get();
//	 $result =  $query->row();
//	 return $result->username;
//
// }
	public function getCommentCount($id)
	{
		$publication_id = $id;
		$this->db->select('count(*)');
		$this->db->from('comment');
		$this->db->where('publication_id =' . $publication_id);
		$query = $this->db->get();
		return $query->row_array();

	}

	public function create($id)
	{
		$publication_id = $id;
		$field = array(
			'author_id' => $this->ion_auth->get_user_id(),
			'publication_id' => $publication_id,
			'text' => $this->input->post('text'),
			'created_at' => date('Y-m-d H:i:s')
		);
		$this->db->insert('comment', $field);
		return $this->db->last_query();
	}

	public function delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('comment');
		return $this->db->last_query();
	}

//	public function getAuthorId()
//	{
//		$this->db->select('author_id');
//		$this->db->from('comment');
//		return $query = $this->db->get()->result_array();
//	}
}
