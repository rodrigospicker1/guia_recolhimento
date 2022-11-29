<?php

	class Guia_model extends CI_model
	{
        public function index(){
			return $this->db->get("entidades")->result_array();
        }

		public function get(){
			return $this->db->get("servidor")->result_array();
        }

        public function banco(){
			return $this->db->get("banco")->result_array();
        }

		public function aliquota(){
			return $this->db->get("aliquotas")->result_array();
		}

		public function parcelamento(){
			return $this->db->get("parcelamentos")->result_array();
		}

		public function parcelas(){
			$this->db->select('guia_id');
		    $rec = $this->db->get('parcelas');
		    $res = $records->result_array();
			return $res;
		}

		public function store($guia){
			$this->db->insert("guias", $guia);
			$n_par = $guia['numero_da_parcela'];
			$tipo_guia = $guia['tipo_guia'];
			$ser_id = $guia['parcelamento_servidor'];
			$ent_id = $guia['parcelamento_entidade'];

			$this->db->select('*');
			if($tipo_guia == 'entidade'){
				$this->db->where('id', $guia['parcelamento_entidade']);
			}else if($tipo_guia == 'servidor'){
				$this->db->where('id', $guia['parcelamento_servidor']);
			}
			$records = $this->db->get('parcelamentos');
			$response = $records->result_array();

			$this->db->select('*');
			$this->db->where('numero_documento', $guia['numero_documento']);
			$records2 = $this->db->get('guias');
			$response2 = $records2->result_array();

			$teste1 = $response[0]['id'];
			$teste2 = $response2[0]['id'];

			$query = "UPDATE `parcelas` SET `guia_id`='$teste2' WHERE `parcelamento_id` = '$teste1' and `numero_parcela` = '$n_par'";
			if($tipo_guia == 'entidade'){
				$query2 = "UPDATE `parcelamentos` SET `status`='1' WHERE `id` = '$ent_id'";
			}else if($tipo_guia == 'servidor'){
				$query2 = "UPDATE `parcelamentos` SET `status`='1' WHERE `id` = '$ser_id";
			}
			$this->db->query($query);
			$this->db->query($query2);
		}

		public function getUserDetails($postData=array()){
	 
			$response = array();
		 
			if(isset($postData['id_js']) ){
		 
			  // Select record
			  $this->db->select('*');
			  $this->db->where('parcelamento_id', $postData['id_js']);
			  $records = $this->db->get('parcelas');
			  $response = $records->result_array();
		 
			}
			return $response;
		}

		  public function guia(){
            return $this->db->get("guias")->result_array();
        }

		public function servidores(){
			return $this->db->get("servidor")->result_array();
        }

		public function entidades(){
			return $this->db->get("entidades")->result_array();
        }
	}