<?php

class AcaoModel extends CI_Model{

	public function insert($data){
		$this->db->insert('acao', $data);
        return $this->db->affected_rows();
	}

	public function updateBySimbolo($simbolo, $data){
		$this->db->where('simbolo', $simbolo);
		$this->db->update('acao', $data);
		return $this->db->affected_rows();
	}

	public function deleteAll(){
		$this->db->empty_table('acao');
	}

	public function getAll() {
        $this->db->select('*');
        $this->db->from('acao');
        $query = $this->db->get();
        return $query->result_array();
    }

}
