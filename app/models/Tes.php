<?php

class Tes{
	private $db;

	public function __construct(){
		$this->db=new Database();
	}

	public function getPosts(){
		$this->db->query("select * from post");

		return $this->db->resultSet();
	}
}


?>