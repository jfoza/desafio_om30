<?php

defined('BASEPATH') OR exit('Ação não permitida');

require FCPATH . '/vendor/autoload.php';
use Brazanation\Documents\Cns;
class Pacientes extends CI_Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index() {
		$data = array(
			'scripts' => array(
				'js/pacientes/pacientes.js',
				'js/pagination.js',
				'js/mask/mask.min.js',
			),
		);

		$this->load->view('layout/header', $data);
		$this->load->view('pacientes/index');
		$this->load->view('layout/footer');
	}

	public function list_pacientes() {
		if( ! $this->input->is_ajax_request()) {
			exit('Ação não permitida');
		}

		$data['pacientes'] = $this->core_model->get_all('pacientes_cadastro', null, 'paciente_id DESC');

		if( ! $data['pacientes']) {
			$data['erro'] = true;
			$data['mensagem'] = 'Não foi possível exibir os dados';
		} else {
			$data['erro'] = false;
		}

		echo json_encode($data);
	}

	public function insert() {
		if( ! $this->input->is_ajax_request()) {
			exit('Ação não permitida');
		}

		$this->form_validation->set_rules('paciente_nome', 'Nome', 'trim|required|min_length[2]|max_length[100]');
		$this->form_validation->set_rules('paciente_sobrenome', 'Sobrenome', 'trim|required|min_length[2]|max_length[100]');
		$this->form_validation->set_rules('paciente_nome_completo_mae', 'Sobrenome', 'trim|required|min_length[2]|max_length[200]');
		$this->form_validation->set_rules('paciente_data_nascimento', 'Data de nascimento', 'trim|required');
		$this->form_validation->set_rules('paciente_cpf', 'CPF', 'trim|required|exact_length[14]|callback_valida_cpf');
		$this->form_validation->set_rules('paciente_cns', 'CNS', 'trim|required|exact_length[15]|callback_valida_cns');
		$this->form_validation->set_rules('paciente_cep', 'CEP', 'trim|required|exact_length[9]');
		$this->form_validation->set_rules('paciente_endereco', 'Endereço', 'trim|required|min_length[4]|max_length[200]');
		$this->form_validation->set_rules('paciente_numero_endereco', 'Nº', 'trim|required|max_length[15]');
		$this->form_validation->set_rules('paciente_complemento', 'Complemento', 'trim|max_length[130]');
		$this->form_validation->set_rules('paciente_bairro', 'Bairro', 'trim|required|min_length[2]|max_length[50]');
		$this->form_validation->set_rules('paciente_cidade', 'Cidade', 'trim|required|min_length[2]|max_length[100]');
		$this->form_validation->set_rules('paciente_uf', 'UF', 'trim|required|exact_length[2]');
		$this->form_validation->set_rules('paciente_imagem', 'Imagem', 'trim');

		$retorno = array();

		if($this->form_validation->run()) {
			//Sucesso
			$data = elements(
				array(
					'paciente_nome',
					'paciente_sobrenome',
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
					'paciente_imagem',
				), $this->input->post()
			);

			$data = html_escape($data);

			$this->core_model->insert('pacientes_cadastro', $data, true);

			$retorno['erro'] = false;

			echo json_encode($retorno);

		} else {
			//Erro de validação
			$retorno['erro'] = true;
			$retorno['mensagem'] = array(
				'paciente_nome' => form_error('paciente_nome'),
				'paciente_sobrenome' => form_error('paciente_sobrenome'),
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
				'paciente_imagem' => form_error('paciente_url_imagem'),
			);

			echo json_encode($retorno);
		}
	}

	public function update() {
		if( ! $this->input->is_ajax_request()) {
			exit('Ação não permitida');
		}

		$this->form_validation->set_rules('paciente_nome', 'Nome', 'trim|required|min_length[2]|max_length[100]');
		$this->form_validation->set_rules('paciente_sobrenome', 'Sobrenome', 'trim|required|min_length[2]|max_length[100]');
		$this->form_validation->set_rules('paciente_nome_completo_mae', 'Sobrenome', 'trim|required|min_length[2]|max_length[200]');
		$this->form_validation->set_rules('paciente_data_nascimento', 'Data de nascimento', 'trim|required');
		$this->form_validation->set_rules('paciente_cpf', 'CPF', 'trim|required|exact_length[14]|callback_valida_cpf');
		$this->form_validation->set_rules('paciente_cns', 'CNS', 'trim|required|exact_length[15]|callback_valida_cns');
		$this->form_validation->set_rules('paciente_cep', 'CEP', 'trim|required|exact_length[9]');
		$this->form_validation->set_rules('paciente_endereco', 'Endereço', 'trim|required|min_length[4]|max_length[200]');
		$this->form_validation->set_rules('paciente_numero_endereco', 'Nº', 'trim|required|max_length[15]');
		$this->form_validation->set_rules('paciente_complemento', 'Complemento', 'trim|max_length[130]');
		$this->form_validation->set_rules('paciente_bairro', 'Bairro', 'trim|required|min_length[2]|max_length[50]');
		$this->form_validation->set_rules('paciente_cidade', 'Cidade', 'trim|required|min_length[2]|max_length[100]');
		$this->form_validation->set_rules('paciente_uf', 'UF', 'trim|required|exact_length[2]');
		$this->form_validation->set_rules('paciente_imagem', 'Imagem', 'trim');

		$retorno = array();

		if($this->form_validation->run()) {
			//Sucesso
			$data = elements(
				array(
					'paciente_nome',
					'paciente_sobrenome',
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
					'paciente_imagem',
				), $this->input->post()
			);

			$data = html_escape($data);

			$paciente_id = (int) $this->input->post('paciente_id', true);

			if( ! $paciente_id) {
				$retorno['erro'] = true;
				$retorno['mensagem_erro'] = 'Registro não localizado.';

				echo json_encode($retorno);
			}

			$this->core_model->update('pacientes_cadastro', $data,  array('paciente_id' => $paciente_id));

			$retorno['erro'] = false;

			echo json_encode($retorno);

		} else {
			//Erro de validação
			$retorno['erro'] = true;
			$retorno['mensagem'] = array(
				'paciente_nome' => form_error('paciente_nome'),
				'paciente_sobrenome' => form_error('paciente_sobrenome'),
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
				'paciente_imagem' => form_error('paciente_imagem'),
			);

			echo json_encode($retorno);
		}
	}

	public function delete() {
		if( ! $this->input->is_ajax_request()) {
			exit('Ação não permitida');
		}

		$paciente_id = $this->input->post('paciente_id', true);
		$paciente_id = (int) $paciente_id;

		if( ! $paciente_id) {
			$retorno['erro'] = true;
			$retorno['mensagem_erro'] = 'Registro não localizado.';

			echo json_encode($retorno);
		}

		if( ! $this->core_model->get_by_id('pacientes_cadastro', array('paciente_id' => $paciente_id))) {
			$retorno['erro'] = true;
			$retorno['mensagem_erro'] = 'Registro não localizado.';

			echo json_encode($retorno);
		}

		$data = $this->core_model->get_by_id('pacientes_cadastro', array('pacientes_cadastro.paciente_id' => $paciente_id));

		$this->core_model->delete('pacientes_cadastro', array('paciente_id' => $paciente_id));

		if($imagem = $data->paciente_imagem) {
			if($this->delete_image($imagem)) {
				$retorno['erro'] = false;
			} else {
				$retorno['erro'] = true;
				$retorno['mensagem'] = 'Não foi possível excluir a imagem.';
			}

			echo json_encode($retorno);
		} else {
			$retorno['erro'] = false;
			echo json_encode($retorno);
		}
	}

	public function upload() {
		$config['upload_path']         = './uploads/imagens/';
		$config['allowed_types']       = 'jpg|png|jpeg|JPG|PNG|JPEG';
		$config['max_size']            = 2048;
		$config['max_width']           = 300;
		$config['max_height']          = 300;
		$config['encrypt-name']        = true;
		$config['max_filename']        = 200;
		$config['file_ext_tolower']    = true;

		$this->load->library('upload', $config);

		if ($this->upload->do_upload('image')) {
			$uploaded_data = $this->upload->data();
			$uploaded_data_file_name = $this->upload->data('file_name');

			$data = array(
				'uploaded_data' => $uploaded_data,
				'nome'          => $uploaded_data_file_name,
				'error'         => false,
			);

		} else {
			$data = array(
				'mensagem' => $this->upload->display_errors(),
				'error' => true,
			);
		}

		echo json_encode($data);
	}

	public function replace_image() {
		$paciente_id = $this->input->post('paciente_id', true);
		$paciente_id = (int) $paciente_id;

		$foto_paciente = $this->input->post('foto_paciente', true);

		$retorno = [];

		if($foto_paciente) {
			$foto = FCPATH .'uploads/imagens/'.$foto_paciente;

			if(file_exists($foto)) {
				$retorno['erro'] = false;
				unlink($foto);

				/*
					QUANDO O USUÁRIO ESTIVER EDITANDO O REGISTRO E CHAMAR A FUNÇÃO replace_image(),
				 	DELETA O REGISTRO DE IMAGEM ATUAL PARA SUBSTITUÍ-LO OU NÃO CADASTRAR.
				*/
				if($paciente_id) {
					$data = array(
						'paciente_imagem' => "",
					);

					$this->core_model->update('pacientes_cadastro', $data,  array('paciente_id' => $paciente_id));
				}

			} else {
				$retorno['erro'] = true;
				$retorno['mensagem'] = 'Arquivo inexistente';
			}

			echo json_encode($retorno);
		} else {
			$retorno['erro'] = true;
			$retorno['mensagem'] = 'Nenhuma imagem selecionada';

			echo json_encode($retorno);
		}
	}

	public function delete_image($imagem = null) {
		$foto_paciente = $imagem;

		$retorno = [];

		if($foto_paciente) {
			$foto = FCPATH .'uploads/imagens/'.$foto_paciente;

			if(file_exists($foto)) {
				unlink($foto);

				return true;

			} else {
				return false;
			}
		} else {
			return false;
		}
	}

	public function get_paciente_id() {
		if( ! $this->input->is_ajax_request()) {
			exit('Ação não permitida');
		}

		$paciente_id = (int) $this->input->get('paciente_id', true);
		$retorno = [];

		if( ! $paciente_id) {
			$retorno['erro'] = true;
			$retorno['mensagem'] = 'Não foi possível localizar o paciente';

			echo json_encode($retorno);
		} else {
			$retorno['dados_paciente'] = $this->core_model->get_by_id('pacientes_cadastro', array('paciente_id' => $paciente_id));

			if( ! $retorno['dados_paciente']) {
				$retorno['dados_paciente'] = '';
				$retorno['erro'] = true;
				$retorno['mensagem'] = 'Não foi possível exibir os dados';
			} else {
				$retorno['erro'] = false;
			}

			echo json_encode($retorno);
		}
	}

	public function valida_cpf($cpf) {
		if ($this->input->post('paciente_id')) {
			//EDITAR

			$paciente_id = $this->input->post('paciente_id', true);

			if ($this->core_model->get_by_id('pacientes_cadastro', array('paciente_id !=' => $paciente_id, 'paciente_cpf' => $cpf))) {
				$this->form_validation->set_message('valida_cpf', 'O campo {field} já existe, ele deve ser único');
				return FALSE;
			}
		} else {
			//CADASTRAR

			if ($this->core_model->get_by_id('pacientes_cadastro', array('paciente_cpf' => $cpf))) {
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
					$d += $cpf[$c] * (($t + 1) - $c);
				}
				$d = ((10 * $d) % 11) % 10;
				if ($cpf[$c] != $d) {
					$this->form_validation->set_message('valida_cpf', 'Por favor digite um CPF válido');
					return FALSE;
				}
			}
			return TRUE;
		}
	}

	public function valida_cns($cns) {
		if ($this->input->post('paciente_id')) {
			//EDITAR

			$paciente_id = $this->input->post('paciente_id', true);

			if ($this->core_model->get_by_id('pacientes_cadastro', array('paciente_id !=' => $paciente_id, 'paciente_cns' => $cns))) {
				$this->form_validation->set_message('valida_cns', 'O campo {field} já existe, ele deve ser único');
				return FALSE;
			}
		} else {
			//CADASTRAR

			if ($this->core_model->get_by_id('pacientes_cadastro', array('paciente_cns' => $cns))) {
				$this->form_validation->set_message('valida_cns', 'O campo {field} já existe, ele deve ser único');
				return FALSE;
			}
		}

		$document = Cns::createFromString($cns);

		if ($document === false) {
			$this->form_validation->set_message('valida_cns', 'Digite um CNS válido.');

			return FALSE;
		} else {
			return TRUE;
		}
	}
}
