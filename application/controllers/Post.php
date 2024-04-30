<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Post extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('crud');
	}
	public function index()
	{
		$data['postData'] = $this->crud->get_records('posts');
		$this->load->view('post/list', $data);
	}
	public function create()
	{
		$this->load->view('post/create');
	}

	public function store()
	{
		$data['title'] = $this->input->post('title');
		$data['description'] = $this->input->post('description');
		$post_id = $this->crud->getLastInsertID('posts', $data);
		$data2['post_id'] = $post_id;
		$data2['email'] = $this->input->post('email');
		$this->crud->insert('comments', $data2);
		$this->session->set_flashdata('message', '<div class="alert alert-success">Record has been saved successfully.</div>');
		redirect(base_url('post'));
	}
	public function edit($id)
	{
		$this->db->select('*');
		$this->db->from('posts');
		$this->db->join('comments', 'posts.id = comments.post_id');
		$this->db->where('id', $id);
		$data['editData'] = $this->db->get()->result();
		$this->load->view('post/edit', $data);
	}
	public function update($post_id)
	{
		$post_data['title'] = $this->input->post('title');
		$post_data['description'] = $this->input->post('description');
		$this->crud->update('posts', $post_id, $post_data);
		$comment_data['email'] = $this->input->post('email');
		$this->crud->update_comments($post_id, $comment_data);
		$this->session->set_flashdata('message', '<div class="alert alert-success">Record has been updated successfully.</div>');
		redirect(base_url('post'));
	}
	public function delete($id)
	{
		$this->db->where('post_id', $id);
		$this->db->delete('comments');
		$this->db->where('id', $id);
		$this->db->delete('posts');
		$this->session->set_flashdata('message', '<div class="alert alert-success">Record has been deleted successfully.</div>');
		redirect(base_url('post'));
	}
}
