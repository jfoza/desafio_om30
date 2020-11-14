var vm1 = new Vue({
	el: '#app',
	data: {
		novoPaciente: {
			paciente_nome_completo: '',
			paciente_nome_completo_mae: '',
			paciente_data_nascimento: '',
			paciente_cpf: '',
			paciente_cns: '',
			paciente_cep: '',
			paciente_endereco: '',
			paciente_numero_endereco: '',
			paciente_complemento: '',
			paciente_bairro: '',
			paciente_cidade: '',
			paciente_uf: '',
		},

		addModal: false,
		editModal:false,
		deleteModal:false,
		pacientes_total: [],
		chooseUser:{},
		dados_cep: {},

		tituloModal: 'Título da Modal',
		formValidate: [],
		successMSG: '',
		alertMsg: false,
	},

	created() {
		this.list();
	},

	methods: {
		list() {
			axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

			axios.get(BASE_URL + 'pacientes/list').then(function(response){
				vm1.pacientes_total = response.data.pacientes;
			}).catch(err => {
				console.log(err);
			})
		},

		insert() {
			axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

			var formData = vm1.formData(vm1.novoPaciente);
			axios.post(BASE_URL + 'pacientes/insert', formData).then(function(response){
				if(response.data.erro) {
					vm1.formValidate = response.data.mensagem;
					return false;
				} else {
					vm1.clear();
					vm1.alertMsg = true;
					vm1.successMSG = 'Usuário adicionado com sucesso';
				}
			});
		},

		updateUser(){
			var formData = vm1.formData(vm1.chooseUser);

			axios.post(BASE_URL + 'pacientes/update', formData).then(function(response){
				if(response.data.error){
					vm1.formValidate = response.data.mensagem;
				}else{
					vm1.clear();
					location.reload();
					vm1.alertMsg = true;
					vm1.successMSG = 'Usuário adicionado com sucesso';
				}
			})
		},
		deleteUser(){
			var formData = v.formData(v.chooseUser);
			axios.post(this.url+"user/deleteUser", formData).then(function(response){
				if(!response.data.error){
					v.successMSG = response.data.success;
					v.clearAll();
					v.clearMSG();
				}
			})
		},

		searchCep() {
			if((vm1.novoPaciente.paciente_cep.length === 8) || (vm1.novoPaciente.paciente_cep.length === 9)) {
				let cep = vm1.novoPaciente.paciente_cep.replace('-', '');

				axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

				axios.get(`https://viacep.com.br/ws/${cep}/json`).then(function(response){
					vm1.dados_cep = response.data;

					if(vm1.novoPaciente.paciente_cep != '') {
						vm1.novoPaciente.paciente_endereco = vm1.dados_cep.logradouro;
						vm1.novoPaciente.paciente_bairro = vm1.dados_cep.bairro;
						vm1.novoPaciente.paciente_cidade = vm1.dados_cep.localidade;
						vm1.novoPaciente.paciente_uf = vm1.dados_cep.uf;
					}
				});
			}
		},

		clear() {
			vm1.novoPaciente = {
				paciente_nome_completo: '',
				paciente_nome_completo_mae: '',
				paciente_data_nascimento: '',
				paciente_cpf: '',
				paciente_cns: '',
				paciente_cep: '',
				paciente_endereco: '',
				paciente_numero_endereco: '',
				paciente_complemento: '',
				paciente_bairro: '',
				paciente_cidade: '',
				paciente_uf: '',
			};
			vm1.formValidate = [];
			vm1.addModal= false;
			vm1.editModal=false;
			vm1.deleteModal=false;
			vm1.list();
		},

		closeModal() {
			vm1.addModal= false;
		},

		formData(obj){
			var formData = new FormData();
			for ( var key in obj ) {
				formData.append(key, obj[key]);
			}
			return formData;
		},

	}
});
