<?php
class Empresa_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('Colaborador_model');
	}

	public function get($empresa_id)
	{
		$query = $this->db->get_where('empresa', array('empresa_id' => $empresa_id));
		return $query->row_array();
	}

	public function getAll()
	{
		$query = $this->db->get('empresa');
		return $query->result();
	}

	public function insert($empresa)
	{
		return $this->db->insert('empresa', $empresa);
	}

	public function update($empresa, $empresa_id)
	{
		$this->db->where('empresa.empresa_id', $empresa_id);
		return $this->db->update('empresa', $empresa);
	}

	public function delete($empresa_id)
	{
		$query1 = $this->Colaborador_model->deleteByEmpresa($empresa_id);
		$this->db->where('empresa.empresa_id', $empresa_id);
		$query2 = $this->db->delete('empresa');
		return $query1 && $query2;
	}
}
