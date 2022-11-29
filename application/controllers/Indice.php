<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Indice extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
		$this->load->model("indice_model");
	}


    public function index(){
		$indice["indices"] = $this->indice_model->index();
		$indice["valores"] = $this->indice_model->get();

        $this->load->view('templates/header');
		$this->load->view('templates/nav-top');
		$this->load->view('pages/novo_indice', $indice);
		$this->load->view('templates/footer');
		$this->load->view('templates/js');
    }

	public function store()
	{
		$indice = $_POST;
		$this->indice_model->store($indice);
	}

	public function store_value(){
		$indice["valores"] = $this->indice_model->get();
		$value = $_POST;
		$value['data'] = $value['data'].'/'.$value['ano'];
		$verificacao = false;
		foreach($indice["valores"] as $valor){
			if($valor["data"] == $value["data"] && $valor["indice_id"] == $value["indice_id"]){
				$this->indice_model->update($value,$valor);
				redirect("indice");
				$verificacao = true;
			}
		}
		if(!$verificacao){
				$this->indice_model->store_value($value);
				redirect("indice");
				$this->load->view('pages/teste');
			}
		
	}

}