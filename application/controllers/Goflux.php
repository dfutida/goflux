<?php

defined("BASEPATH") OR exit("No direct script access allowed");

class Goflux extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->load->model(["Goflux_model"]);
	}

	function index() {
		$data['js']  = $this->config->item('js');
		$this->load->view("index", $data);
	}

	function table_embarcador() {

		$datatable = $this->Goflux_model->table_embarcador();

		echo (json_encode([
			"data" => $datatable
		]));
	}

	function save_embarcador() {

		$json = json_decode($this->input->post("json"));
		
		$this->Goflux_model->save_embarcador($json);

		echo json_encode([
			"json" => $json
		]);
	}

	function delete_embarcador($id = 0) {
		
		$del = $this->Goflux_model->delete_embarcador($id);

		if($del) {
			echo json_encode([
				"response" => 'Registro excluído com sucesso!'
			]);
		} else {
			echo json_encode([
				"response" => 'Erro ao excluir registro'
			]);
		}
	}

	function table_oferta() {

		$datatable = $this->Goflux_model->table_oferta();

		echo (json_encode([
			"data" => $datatable
		]));
	}

	function save_oferta() {

		$json = json_decode($this->input->post("json"));
		
		$this->Goflux_model->save_oferta($json);

		echo json_encode([
			"json" => $json
		]);
	}

	function delete_oferta($id = 0) {
		
		$del = $this->Goflux_model->delete_oferta($id);

		if($del) {
			echo json_encode([
				"response" => 'Registro excluído com sucesso!'
			]);
		} else {
			echo json_encode([
				"response" => 'Erro ao excluir registro'
			]);
		}
	}

	function table_lance() {

		$datatable = $this->Goflux_model->table_lance();

		echo (json_encode([
			"data" => $datatable
		]));
	}

	function save_lance() {

		$json = json_decode($this->input->post("json"));
		
		$this->Goflux_model->save_lance($json);

		echo json_encode([
			"json" => $json
		]);
	}

	function delete_lance($id = 0) {
		
		$del = $this->Goflux_model->delete_lance($id);

		if($del) {
			echo json_encode([
				"response" => 'Registro excluído com sucesso!'
			]);
		} else {
			echo json_encode([
				"response" => 'Erro ao excluir registro'
			]);
		}
	}
}

?>