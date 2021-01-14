<?php

defined('BASEPATH') OR exit('Ação não permitida');

class Pacientes extends CI_Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index() {
		$data = array(
			'scripts' => array(
				'js/pacientes/pacientes.js',
				'js/pacientes/components.js',
				'js/pagination.js',
				'js/mask/mask.min.js',
			),
		);

		$this->load->view('layout/header', $data);
		$this->load->view('pacientes/index');
		$this->load->view('layout/footer');
	}

	public function list() {
		if( ! $this->input->is_ajax_request()) {
			exit('Ação não permitida');
		}

		$data['pacientes'] = $this->core_model->get_all('pacientes_cadastro');

		if( ! $data['pacientes']) {
			$data['erro'] = true;
			$data['mensagem'] = 'Não foi possível exibir os dados';
		} else {
			$data['erro'] = false;
		}

		echo json_encode($data);
	}

	public function insert() {
		$this->form_validation->set_rules('paciente_nome_completo', 'Nome', 'trim|required|min_length[2]|max_length[200]');
		$this->form_validation->set_rules('paciente_nome_completo_mae', 'Sobrenome', 'trim|required|min_length[2]|max_length[200]');
		$this->form_validation->set_rules('paciente_data_nascimento', 'Data de nascimento', 'trim|required');
		$this->form_validation->set_rules('paciente_cpf', 'CPF', 'trim|required|exact_length[14]|callback_valida_cpf');
		$this->form_validation->set_rules('paciente_cns', 'CNS', 'trim|required|exact_length[8]');
		$this->form_validation->set_rules('paciente_cep', 'CEP', 'trim|required|exact_length[9]');
		$this->form_validation->set_rules('paciente_endereco', 'Endereço', 'trim|required|min_length[4]|max_length[200]');
		$this->form_validation->set_rules('paciente_numero_endereco', 'Nº', 'trim|required|max_length[15]');
		$this->form_validation->set_rules('paciente_complemento', 'Complemento', 'trim|max_length[130]');
		$this->form_validation->set_rules('paciente_bairro', 'Bairro', 'trim|required|min_length[2]|max_length[50]');
		$this->form_validation->set_rules('paciente_cidade', 'Cidade', 'trim|required|min_length[2]|max_length[100]');
		$this->form_validation->set_rules('paciente_uf', 'UF', 'trim|required|exact_length[2]');

		$retorno = array();

		if($this->form_validation->run()) {
			//Sucesso
			$data = elements(
				array(
					'paciente_nome_completo',
					'paciente_nome_completo_mae',
					'paciente_data_nascimento',
					'paciente_cpf',
					'paciente_cns',
					'paciente_cep',
					'paciente_endereco',
					'paciente_numero_endereco',
					'paciente_complemento',
					'paciente_bairro',
					'paciente_cidade',
					'paciente_uf',
				), $this->input->post()
			);

			$data = html_escape($data);

			if ($this->core_model->insert('pacientes_cadastro', $data, true)) {
				$retorno['erro'] = false;
			}

		} else {
			//Erro de validação
			$retorno['erro'] = true;
			$retorno['mensagem'] = array(
				'paciente_nome_completo' => form_error('paciente_nome_completo'),
				'paciente_nome_completo_mae' => form_error('paciente_nome_completo_mae'),
				'paciente_data_nascimento' => form_error('paciente_data_nascimento'),
				'paciente_cpf' => form_error('paciente_cpf'),
				'paciente_cns' => form_error('paciente_cns'),
				'paciente_cep' => form_error('paciente_cep'),
				'paciente_endereco' => form_error('paciente_endereco'),
				'paciente_numero_endereco' => form_error('paciente_numero_endereco'),
				'paciente_complemento' => form_error('paciente_complemento'),
				'paciente_bairro' => form_error('paciente_bairro'),
				'paciente_cidade' => form_error('paciente_cidade'),
				'paciente_uf' => form_error('paciente_uf'),
			);
		}

		echo json_encode($retorno);
	}

	public function update() {
		die(var_dump($this->input->post()));
		$this->form_validation->set_rules('paciente_nome_completo', 'Nome', 'trim|required|min_length[2]|max_length[200]');
		$this->form_validation->set_rules('paciente_nome_completo_mae', 'Sobrenome', 'trim|required|min_length[2]|max_length[200]');
		$this->form_validation->set_rules('paciente_data_nascimento', 'Data de nascimento', 'trim|required');
		$this->form_validation->set_rules('paciente_cpf', 'CPF', 'trim|required|exact_length[14]|callback_valida_cpf');
		$this->form_validation->set_rules('paciente_cns', 'CNS', 'trim|required|exact_length[8]');
		$this->form_validation->set_rules('paciente_cep', 'CEP', 'trim|required|exact_length[9]');
		$this->form_validation->set_rules('paciente_endereco', 'Endereço', 'trim|required|min_length[4]|max_length[200]');
		$this->form_validation->set_rules('paciente_numero_endereco', 'Nº', 'trim|required|max_length[15]');
		$this->form_validation->set_rules('paciente_complemento', 'Complemento', 'trim|max_length[130]');
		$this->form_validation->set_rules('paciente_bairro', 'Bairro', 'trim|required|min_length[2]|max_length[50]');
		$this->form_validation->set_rules('paciente_cidade', 'Cidade', 'trim|required|min_length[2]|max_length[100]');
		$this->form_validation->set_rules('paciente_uf', 'UF', 'trim|required|exact_length[2]');

		$retorno = array();

		if($this->form_validation->run()) {
			//Sucesso
			$id = $this->input->post('', true);
			$data = elements(
				array(
					'paciente_nome_completo',
					'paciente_nome_completo_mae',
					'paciente_data_nascimento',
					'paciente_cpf',
					'paciente_cns',
					'paciente_cep',
					'paciente_endereco',
					'paciente_numero_endereco',
					'paciente_complemento',
					'paciente_bairro',
					'paciente_cidade',
					'paciente_uf',
				), $this->input->post()
			);

			$data = html_escape($data);

			if ($this->core_model->insert('pacientes', $data, true)) {
				$retorno['erro'] = false;
				$retorno['mensagem'] = 'Usuário adicionado com sucesso';
			}

		} else {
			//Erro de validação
			$retorno['erro'] = true;
			$retorno['mensagem'] = array(
				'paciente_nome_completo' => form_error('paciente_nome_completo'),
				'paciente_nome_completo_mae' => form_error('paciente_nome_completo_mae'),
				'paciente_data_nascimento' => form_error('paciente_data_nascimento'),
				'paciente_cpf' => form_error('paciente_cpf'),
				'paciente_cns' => form_error('paciente_cns'),
				'paciente_cep' => form_error('paciente_cep'),
				'paciente_endereco' => form_error('paciente_endereco'),
				'paciente_numero_endereco' => form_error('paciente_numero_endereco'),
				'paciente_complemento' => form_error('paciente_complemento'),
				'paciente_bairro' => form_error('paciente_bairro'),
				'paciente_cidade' => form_error('paciente_cidade'),
				'paciente_uf' => form_error('paciente_uf'),
			);
		}

		echo json_encode($retorno);
	}

	public function valida_cpf($cpf) {

		if ($this->input->post('paciente_id')) {
			//EDITAR

			$paciente_id = $this->input->post('paciente_id');

			if ($this->core_model->get_by_id('pacientes', array('paciente_id !=' => $paciente_id, 'paciente_cpf' => $cpf))) {
				$this->form_validation->set_message('valida_cpf', 'O campo {field} já existe, ele deve ser único');
				return FALSE;
			}
		} else {
			//CADASTRAR

			if ($this->core_model->get_by_id('pacientes', array('paciente_cpf' => $cpf))) {
				$this->form_validation->set_message('valida_cpf', 'O campo {field} já existe, ele deve ser único');
				return FALSE;
			}
		}

		$cpf = str_pad(preg_replace('/[^0-9]/', '', $cpf), 11, '0', STR_PAD_LEFT);
		// Verifica se nenhuma das sequências abaixo foi digitada, caso seja, retorna falso
		if (strlen($cpf) != 11 || $cpf == '00000000000' || $cpf == '11111111111' || $cpf == '22222222222' || $cpf == '33333333333' || $cpf == '44444444444' || $cpf == '55555555555' || $cpf == '66666666666' || $cpf == '77777777777' || $cpf == '88888888888' || $cpf == '99999999999') {

			$this->form_validation->set_message('valida_cpf', 'Por favor digite um CPF válido');
			return FALSE;
		} else {
			// Calcula os números para verificar se o CPF é verdadeiro
			for ($t = 9; $t < 11; $t++) {
				for ($d = 0, $c = 0; $c < $t; $c++) {
					$d += $cpf[$c] * (($t + 1) - $c); //Se PHP version < 7.4, $cpf{$c}
				}
				$d = ((10 * $d) % 11) % 10;
				if ($cpf[$c] != $d) { //Se PHP version < 7.4, $cpf{$c}
					$this->form_validation->set_message('valida_cpf', 'Por favor digite um CPF válido');
					return FALSE;
				}
			}
			return TRUE;
		}
	}

	public function valida_cns() {}

	public function delete() {}
}
