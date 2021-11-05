<?php
class Colaborador_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function get($colaborador_id)
	{
		$query = $this->db->get_where('colaborador', array('colaborador_id' => $colaborador_id));
		return $query->row_array();
	}

	public function getAll($empresa_id)
	{
		$query = $this->db->get_where('colaborador', array('empresa_id' => $empresa_id));
		return $query->result();
	}

	public function insert($colaborador)
	{
		return $this->db->insert('colaborador', $colaborador);
	}

	public function update($colaborador, $colaborador_id)
	{
		$this->db->where('colaborador.colaborador_id', $colaborador_id);
		return $this->db->update('colaborador', $colaborador);
	}

	public function delete($colaborador_id)
	{
		$this->db->where('colaborador.colaborador_id', $colaborador_id);
		return $this->db->delete('colaborador');
	}

	public function deleteByEmpresa($empresa_id)
	{
		$this->db->where("colaborador.empresa_id", $empresa_id);
		return $this->db->delete("colaborador");
	}
}
