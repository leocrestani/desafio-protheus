<?php

class CotacaoModel extends CI_Model
{

	public function insert($data)
	{
		$this->db->insert('cotacao', $data);
		return $this->db->affected_rows();
	}

	public function deleteAll()
	{
		$this->db->empty_table('cotacao');
	}

	public function getAll()
	{
		$this->db->select('*');
		$this->db->from('cotacao');
		$this->db->join('acao', 'acao.idAcao = cotacao.idAcao', 'left');
		$query = $this->db->get();
		return $query->result_array();
	}
}