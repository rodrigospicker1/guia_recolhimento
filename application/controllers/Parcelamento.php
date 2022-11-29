<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Parcelamento extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
		$this->load->model("parcelamento_model");
	}


    public function index(){
		$tipo['entidades'] = $this->parcelamento_model->index();
		$tipo['servidores'] = $this->parcelamento_model->get();

        $this->load->view('templates/header');
		$this->load->view('templates/nav-top');
		$this->load->view('pages/novo_parcelamento', $tipo);
		$this->load->view('templates/footer');
		$this->load->view('templates/js');
    }

	public function store_parcela(){
		$parcela = $_POST;
		$duracao = $parcela["numero_de_parcelas"];
		$data_atual = date("Y-m-d");
		$hora_atual = date("His");
		$parcela['emissao'] = $data_atual.$hora_atual;

		for($i = $duracao;$i>0;$i--){
			$data_atual = date("Y-m-d", strtotime("$data_atual +1 month"));
		}

		$parcela['data_termino'] = $data_atual;
		$this->parcelamento_model->store_parcela($parcela);
		redirect('parcelamento');
	}

	public function show(){
		$parcelamento['parcelamentos'] =  $this->parcelamento_model->parcelamento();
		$parcelamento['entidades'] =  $this->parcelamento_model->index();
		$parcelamento['servidores'] =  $this->parcelamento_model->get();

		$this->load->view('templates/header');
		$this->load->view('templates/nav-top');
		$this->load->view('pages/parcelamentos', $parcelamento);
		$this->load->view('templates/footer');
		$this->load->view('templates/js');
	}

}