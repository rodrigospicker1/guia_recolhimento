<?php
class Guia extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("Guia_model");
	}
	public function emitir(){
        $tipo['entidades'] = $this->Guia_model->index();
		$tipo['servidores'] = $this->Guia_model->get();
        $tipo['bancos'] = $this->Guia_model->banco();
		$tipo['aliquotas'] = $this->Guia_model->aliquota();
		$tipo['parcelamentos'] = $this->Guia_model->parcelamento();


		$this->load->view('templates/header');
		$this->load->view('templates/nav-top');
		$this->load->view('pages/emitir_guia',$tipo);
		$this->load->view('templates/footer');
	}

	public function store(){
		$guia = $_POST;
		$n = date('YmdHis');
		$guia['numero_documento'] = $n;
		$guia['emissao'] = date('d/m/Y');
		if($guia['guia'] == 'parcelamento'){
			$guia['calcula'] = 'Avulsa/Parcelamento';
		}
		$this->Guia_model->store($guia);
		redirect('guia/emitir');
	}

	public function parcelamento_detalhes(){
		$postData = $this->input->post();
        $data = $this->Guia_model->getUserDetails($postData);
        echo json_encode($data);
	}

	public function show(){
		$guia['guias'] =  $this->Guia_model->guia();
		$guia['entidades'] =  $this->Guia_model->entidades();
		$guia['servidores'] =  $this->Guia_model->servidores();

		$this->load->view('templates/header');
		$this->load->view('templates/nav-top');
		$this->load->view('pages/guias', $guia);
		$this->load->view('templates/footer');
		$this->load->view('templates/js');
	}
}