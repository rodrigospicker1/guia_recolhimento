<?php

	class Indice_model extends CI_model
	{
        public function index(){
            return $this->db->get("indice")->result_array();
        }

		public function get(){
			return $this->db->get("indice_valores")->result_array();
		}

		public function update($value,$valor){
			$this->db->where("id", $valor["id"]);
			return $this->db->update("indice_valores", $value);
		}
		
		public function store($indice)
		{
			$this->db->insert("indice", $indice);
		}

        public function store_value($value)
		{
			$this->db->insert("indice_valores", $value);
		}

	function getUsernames(){

		$this->db->select('username');
		$records = $this->db->get('users');
		$users = $records->result_array();
		return $users;
	  }
	  function getUserDetails($postData=array()){
	 
		$response = array();
	 
		if(isset($postData['username']) ){
	 
		  // Select record
		  $this->db->select('*');
		  $this->db->where('username', $postData['username']);
		  $records = $this->db->get('users');
		  $response = $records->result_array();
	 
		}
	 
		return $response;
	  }

	  function saverecords($username,$name,$emai)
	{
		$query="INSERT INTO `users`( `username`, `name`, `email`) 
		VALUES ('$username','$name','$email')";
		$this->db->query($query);
	}
	
	}