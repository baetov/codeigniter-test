<?php
defined('BASEPATH') OR exit('No direct script access allowed');



class Publication extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Publication_model','p_model');
		$this->load->model('Comment_model','c_model');
		$this-> load-> library ('ion_auth');
	}

	function index()
	{
		if (!$this->ion_auth->logged_in() )
		{
			redirect('auth/login');
		}else {
			$data['publications'] = $this->p_model->getPublication();
			$this->load->view('layout/header');
			$this->load->view('publication/index', $data);
			$this->load->view('layout/footer');
		}

	}
	public function show($id)
	{
		if (!$this->ion_auth->logged_in() )
		{
			redirect('auth/login');
		}
		else{
			$data['publication'] = $this->p_model->getPublicationId($id);
			$data['author'] = $this->p_model->getUserName($id);
			$data['comments'] = $this->c_model->getComment($id);
//			$data['comm_author'] = $this->c_model->getCommentAuthor($id);
//			var_dump($data);
			$this->load->view('layout/header');
			$this->load->view('publication/show', $data);
			$this->load->view('layout/footer');
		}
	}
	public function create()
	{
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->in_group('members'))
		{
			redirect('auth/login');
		}else {
			$this->load->view('layout/header');
			$this->load->view('publication/create');
			$this->load->view('layout/footer');
		}
	}

	public function edit($id)
	{
		if (!$this->ion_auth->is_admin() || !$this->ion_auth->in_group('member'))
		{
			$this->session->set_flashdata('error_msg', 'у вас не достаточно прав');
		}else {
			$data['publication'] = $this->p_model->getPublicationId($id);
			$this->load->view('layout/header');
			$this->load->view('publication/edit', $data);
			$this->load->view('layout/footer');
		}
	}
	public function submit()
	{
		if (!$this->ion_auth->is_admin() || !$this->ion_auth->in_group('member'))
		{
			$this->session->set_flashdata('error_msg', 'у вас не достаточно прав');
		}else {
				$result = $this->p_model->submit();
				if ($result) {
					$this->session->set_flashdata('success_msg', 'Публкаця добавлена успешно');
				} else {
					$this->session->set_flashdata('error_msg', 'Ошибка добавления публикации');
				}
				redirect(base_url('publication/index'));
			}
	}

	public function update(){
		if (!$this->ion_auth->is_admin() || !$this->ion_auth->in_group('member'))
		{
			$this->session->set_flashdata('error_msg', 'у вас не достаточно прав');
		}else {
				$result = $this->p_model->update();
				if ($result) {
					$this->session->set_flashdata('success_msg', 'Публикация успешно изменена');
				} else {
				$this->session->set_flashdata('error_msg', 'Ошиба изменения');
				}
				redirect(base_url('publication/index'));
				}
	}

	public function delete($id){
		if (!$this->ion_auth->is_admin() || !$this->ion_auth->in_group('member'))
		{
			$this->session->set_flashdata('error_msg', 'у вас не достаточно прав');
		}else {
				$result = $this->p_model->delete($id);
				if ($result) {
					$this->session->set_flashdata('success_msg', 'Публикация успешно удалена');
				} else {
					$this->session->set_flashdata('error_msg', 'Ошибка удаления');
				}
				redirect(base_url('publication/index'));
		}
	}
	public function addComment($id)
	{
		$result = $this->c_model->create($id);
		if ($result) {
			$this->session->set_flashdata('success_msg', 'коментарий добавлен');
		}
		redirect($_SERVER['HTTP_REFERER']);
	}
	public function deleteComment($id)
	{
		$result = $this->c_model->delete($id);
		if ($result) {
			$this->session->set_flashdata('success_msg', 'коментарий удален');
		}

		redirect($_SERVER['HTTP_REFERER']);
	}


}
