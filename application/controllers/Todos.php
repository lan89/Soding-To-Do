<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Todos extends CI_Controller {

	public function index()
	{
		$this->load->database();
		if(!empty($this->input->get("search"))){
			$this->db->or_like('description', $this->input->get("search")); 
		}
		$this->db->order_by('todo_id', 'DESC');
		$query = $this->db->get("todo");
		$data['data'] = $query->result();
		$data['total'] = $this->db->count_all("todo");

		echo json_encode($data);
	}
	
	public function create()
	{
		$this->load->database();
		$insert = $this->input->post();
		$this->db->insert('todo', $insert);
		$id = $this->db->insert_id();
		$q = $this->db->get_where('todo', array('todo_id' => $id));

		echo json_encode($q->row());
	}
	
	public function edit($id)
	{
		$this->load->database();
		$q = $this->db->get_where('todo', array('todo_id' => $id));
		echo json_encode($q->row());
	}
	
	public function update($id)
	{
		$this->load->database();

		$insert = $this->input->post();
		$this->db->where('todo_id', $id);
		$this->db->update('todo', $insert);
		$q = $this->db->get_where('todo', array('todo_id' => $id));

		echo json_encode($insert);
	}

	public function delete($id)
	{
		$this->load->database();

		$this->db->where('todo_id', $id);
		$this->db->delete('todo');

		echo json_encode(['success'=>true]);
	}
}
