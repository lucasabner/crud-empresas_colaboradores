<?php
class Validacao_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function verificaCNPJ($cnpj)
	{
		$query = $this->db->get_where('empresa', array('cnpj' => $cnpj));
		return $query->result();
	}

	public function verificaCPF($cpf)
	{
		$query = $this->db->get_where('colaborador', array('cpf' => $cpf));
		if ($query->num_rows() == 1)
			return true;
		else
			return false;
	}
}
