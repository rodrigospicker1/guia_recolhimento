<?php

	class Parcelamento_model extends CI_model
	{
        public function index(){
			return $this->db->get("entidades")->result_array();
        }

		public function get(){
			return $this->db->get("servidor")->result_array();
        }

		public function parcelamento(){
			return $this->db->get("parcelamentos")->result_array();
		}
		
		public function store_parcela($parcela){
			$this->db->insert("parcelamentos", $parcela);

			$this->db->select('*');
			$this->db->where('valor', $parcela['valor'], 'emissao', $parcela['emissao'], 'tipo_parcelamento',$parcela['tipo_parcelamento'],'numero_de_parcelas', $parcela['numero_de_parcelas']);
			$records = $this->db->get('parcelamentos');
			$response = $records->result_array();

			$data_atual = date("Y-m-d");
			$parcelas = [];
			$parcelas['parcelamento_id'] = $response[0]['id'];
			for($i=0;$i<$parcela['numero_de_parcelas'];$i++){	
				$parcelas['valor'] = $parcela['valor']/$parcela['numero_de_parcelas'];
				$parcelas['numero_parcela'] = $i+1;
				$parcelas['emissao_parcela'] = $data_atual;
				$data_atual = date("Y-m-d", strtotime("$data_atual +1 month"));
				$parcelas['validade'] = $data_atual;
				$parcelas['status'] = 'em aberto';
				$this->db->insert("parcelas", $parcelas);
			}
		}
	}