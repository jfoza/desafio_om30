Vue.component('List', {
	template:
		`
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">        
                            <slot></slot>
                        </div>
                    </div>
                </div>
            </div>
        `
});

Vue.component('New', {
	template:
		`
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">        
                            <slot></slot>
                        </div>
                    </div>
                </div>
            </div>
        `
});

Vue.component('Edit', {
	template:
		`
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">        
                            <slot></slot>
                        </div>
                    </div>
                </div>
            </div>
        `
});

var vm1 = new Vue({
	el: '#app',
	data: {
		newPaciente: {
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

		listPacientes: false,
		formNewPaciente: false,
		formEditPaciente: false,
		deletePaciente: false,
		pacientes: [],
		responsePacientes: [],
		choosePaciente:{},
		dados_cep: {},

		titulo: '',
		alert: false,
		msgSucesso: 'Dados salvos com sucesso',
		pesquisaPacientes: '',
		formValidate: [],

		//pagination
		pagination: true,
		currentPage: 0,
		rowCountPage:10,
		totalData:0,
		pageRange:4,
	},

	created() {
		this.getAllPacientes();
	},

	methods: {
		getAllPacientes() {
			axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

			this.listPacientes = true;
			this.titulo = 'Todos os pacientes'

			axios.get(BASE_URL + 'pacientes/list').then(function(response){
				vm1.responsePacientes = response.data.pacientes;
				vm1.getData(response.data.pacientes);
			}).catch(err => {
				console.log(err);
			})
		},

		openModalNew() {
			this.listPacientes = false;
			this.formEditPaciente = false;
			this.formNewPaciente = true;
			this.titulo = 'Novo paciente'
		},

		openModalEdit() {
			this.listPacientes = false;
			this.formNewPaciente = false;
			this.formEditPaciente = true;
			this.titulo = 'Editar paciente'
		},

		insert() {
			axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

			var formData = vm1.formData(vm1.newPaciente);
			axios.post(BASE_URL + 'pacientes/insert', formData).then(function(response){
				if(response.data.erro == false) {
					this.clearAll();
					this.alert = true;
				} else {
					vm1.formValidate = response.data.mensagem;
					return false;
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

		},

		getData(response) {
			vm1.totalData = response.length;

			vm1.pacientes = response.slice(
				vm1.currentPage * vm1.rowCountPage, (vm1.currentPage * vm1.rowCountPage) + vm1.rowCountPage
			);

			if (vm1.pacientes.length == 0 && vm1.currentPage > 0) {
				this.pageUpdate(vm1.currentPage - 1);
			}
		},

		pageUpdate(pageNumber){
			vm1.currentPage = pageNumber;
			this.getAllPacientes();
		},

		searchCep() {
			if((vm1.newPaciente.paciente_cep.length === 8) || (vm1.newPaciente.paciente_cep.length === 9)) {
				const cep = vm1.newPaciente.paciente_cep;

				axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

				axios.get(`https://viacep.com.br/ws/${cep}/json`).then(function(response){
					vm1.dados_cep = response.data;

					if(vm1.newPaciente.paciente_cep != '') {
						vm1.newPaciente.paciente_endereco = vm1.dados_cep.logradouro;
						vm1.newPaciente.paciente_bairro = vm1.dados_cep.bairro;
						vm1.newPaciente.paciente_cidade = vm1.dados_cep.localidade;
						vm1.newPaciente.paciente_uf = vm1.dados_cep.uf;
					}
				});
			}
		},

		clearAll() {
			vm1.newPaciente = {
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

			this.formNewPaciente = false;
			this.deletePaciente = false;
			this.formEditPaciente = false;
			this.listPacientes = true;
			this.titulo = 'Todos os pacientes'

			this.getAllPacientes();
		},

		formData(obj){
			var formData = new FormData();
			for ( var key in obj ) {
				formData.append(key, obj[key]);
			}
			return formData;
		},

	},

	computed: {
		resultBusca() {
			if(this.pesquisaPacientes == '' || this.pesquisaPacientes == ' ') {
				this.pagination = true;

				return this.pacientes;
			} else {
				this.pagination = false;

				return this.pacientes.filter(paciente =>
					paciente.paciente_nome_completo.toLowerCase() === this.pesquisaPacientes ||
					paciente.paciente_id === this.pesquisaPacientes
				);
			}
		}
	}
});
