Vue.component('Pacientes', {
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

Vue.component('modalsimples', {
	props: ['iconDelete'],
	template: `
          <div class="modal" id="modalsimples" role="dialog" style="display: block; overflow: scroll; background-color: rgba(53,46,47, .5);">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">                            
                <!-- Modal body -->
                <div class="modal-body">                 
                  <slot></slot>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer" >
                  <slot name="footer"></slot>
                </div>        
              </div>
            </div>
          </div>
            `,
});

var vm1 = new Vue({
	el: '#app',
	data: {
		newPaciente: {
			paciente_nome: '',
			paciente_sobrenome: '',
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
			paciente_url_imagem: '',
			nome_imagem: '',
		},

		listPacientes: false,
		formNewPaciente: false,
		formEditPaciente: false,
		infoPaciente: false,
		modalDeletePaciente: false,
		showImage: false,
		pacientes: [],
		responsePacientes: [],
		choosePaciente: {},
		chooseImage: [],
		dados_cep: {},

		titulo: '',
		alert: false,
		msgSucesso: '',
		pesquisaPacientes: '',
		imageName: '',
		iconDelete: BASE_URL +'public/assets/img/icon-delete.png',
		iconNoImage: BASE_URL +'public/assets/img/sem-imagem.png',
		imageUrl: BASE_URL + 'uploads/imagens/',
		formValidate: [],
		imageValidate: '',

		//pagination
		pagination: true,
		currentPage: 0,
		rowCountPage: 8,
		totalData: 0,
		pageRange: 4,
	},

	created() {
		this.list();

		return {
			selectedFile: null
		}
	},

	methods: {
		list() {
			axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

			this.listPacientes = true;
			this.titulo = 'Todos os pacientes'

			axios.get(BASE_URL + 'pacientes/list_pacientes')
				.then(function(response){
					if(response.data.erro === false) {
						let res = response.data.pacientes;

						//PERCORRE O ARRAY FORMATANDO AS DATAS DE NASCIMENTO
						res.forEach(function(el, i){
							el.paciente_data_nascimento = moment(el.paciente_data_nascimento).format("DD/MM/YYYY");
						});

						vm1.responsePacientes = res;
						vm1.getData(res);
					}
			}).catch(err => {
				console.log(err);
			})
		},

		insert() {
			axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

			const nome = vm1.newPaciente.paciente_nome;
			const sobrenome = vm1.newPaciente.paciente_sobrenome;

			vm1.newPaciente.paciente_nome_completo = nome +' ' +sobrenome;

			var formData = vm1.formData(vm1.newPaciente);
			axios.post(BASE_URL + 'pacientes/insert', formData).then(function(response){
				if(response.data.erro === false) {
					vm1.clearAll();
					vm1.msgSucesso = 'Dados salvos com sucesso.';
					vm1.alert = true;
				}
				if(response.data.erro === true) {
					vm1.formValidate = response.data.mensagem;
				}
			});
		},

		update(){
			axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

			const nome = vm1.choosePaciente.paciente_nome;
			const sobrenome = vm1.choosePaciente.paciente_sobrenome;

			vm1.choosePaciente.paciente_nome_completo = nome +' ' +sobrenome;

			var formData = vm1.formData(vm1.choosePaciente);

			axios.post(BASE_URL + 'pacientes/update', formData).then(function(response){
				if(response.data.erro === false) {
					vm1.clearAll();
					vm1.msgSucesso = 'Dados salvos com sucesso.';
					vm1.alert = true;
				}
				if(response.data.erro === true) {
					vm1.formValidate = response.data.mensagem;
				}
			})
		},

		deletePaciente() {
			axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

			const formData = vm1.formData(vm1.choosePaciente);

			axios.post(BASE_URL + 'pacientes/delete', formData).then(function(response){
				if(response.data.erro === false) {
					vm1.clearAll();
					vm1.msgSucesso = 'Registro excluído com sucesso.';
					vm1.alert = true;
				}
			})
		},

		onFileSelected(event) {
			this.selectedFile = event.target.files[0];

			const fd = new FormData();

			fd.append('image', this.selectedFile, this.selectedFile.name,  {

			});

			axios.post(BASE_URL +'pacientes/upload', fd)
				.then(response => {
					if(response.data.error === false) {
						if(vm1.formEditPaciente === true) {
							vm1.choosePaciente.paciente_imagem = response.data.nome;
							this.showImage = true;
						}

						if(vm1.formNewPaciente === true) {
							this.imageName = response.data.nome;
							this.imageValidate = '';
							this.newPaciente.paciente_imagem = this.imageName;
							this.showImage = true;
						}
					}

					if(response.data.error === true) {
						this.imageValidate = response.data.mensagem;
					}
				})
		},

		replaceImage() {
			if(vm1.formNewPaciente === true) {
				vm1.chooseImage.foto_paciente = vm1.imageName;
			}

			if(vm1.formEditPaciente === true) {
				vm1.chooseImage.foto_paciente = vm1.choosePaciente.paciente_imagem;
				vm1.chooseImage.paciente_id = vm1.choosePaciente.paciente_id;
			}

			const formData = vm1.formData(vm1.chooseImage);

			axios.post(BASE_URL +'pacientes/replace_image', formData)
				.then(response => {
					if(response.data.erro === false) {
						this.showImage = false;

						if(vm1.formEditPaciente === true) {
							vm1.choosePaciente.paciente_imagem = "";
							this.showImage = false;
						}
					}
					if(response.erro === true) {

					}
				})
		},

		openModalNew() {
			this.listPacientes = false;
			this.formEditPaciente = false;
			this.infoPaciente = false;
			this.formNewPaciente = true;
			this.titulo = 'Novo paciente'
		},

		openModalEdit() {
			this.listPacientes = false;
			this.formNewPaciente = false;
			this.infoPaciente = false;
			this.formEditPaciente = true;
			this.titulo = 'Editar paciente'
		},

		openModalInfo() {
			this.listPacientes = false;
			this.formNewPaciente = false;
			this.formEditPaciente = false;
			this.infoPaciente = true;
			this.titulo = 'Informações do paciente'
		},

		openModalDelete(paciente_id) {
			this.listPacientes = true;
			this.formNewPaciente = false;
			this.formEditPaciente = false;
			this.infoPaciente = false;

			vm1.choosePaciente.paciente_id = paciente_id;

			this.modalDeletePaciente = true;
		},

		getPacienteId(paciente_id, infoOrEdit) {
			axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

			axios.get(BASE_URL + 'pacientes/get_paciente_id', {
				params: {
					'paciente_id': paciente_id,
				}
			}).then(function(response){
				if(response.data.erro == false) {
					const res = response.data.dados_paciente;

					(res.paciente_imagem == "" || res.paciente_imagem == null || res.paciente_imagem == "null")
						? vm1.showImage = false
						: vm1.showImage = true;

					vm1.choosePaciente = res;
				}
			});

			if(infoOrEdit === false) {
				this.openModalInfo();
			}
			if(infoOrEdit === true) {
				this.openModalEdit();
			}
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
			this.list();
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

			if(vm1.newPaciente.paciente_cep.length === 0) {
				vm1.newPaciente.paciente_endereco = '';
				vm1.newPaciente.paciente_bairro = '';
				vm1.newPaciente.paciente_cidade = '';
				vm1.newPaciente.paciente_uf = '';
			}
		},

		clearAll() {
			vm1.newPaciente = {
				paciente_nome: '',
				paciente_sobrenome: '',
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
				paciente_url_imagem: '',
			};

			this.selectedFile = null;
			vm1.formValidate = [];
			vm1.choosePaciente = [];

			this.formNewPaciente = false;
			this.modalDeletePaciente = false;
			this.formEditPaciente = false;
			this.infoPaciente = false;
			this.showImage = false;
			this.listPacientes = true;
			this.titulo = 'Todos os pacientes'

			this.list();
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

				//FAZ A BUSCA DO PACIENTE POR DIVERSOS FILTROS
				return this.pacientes.filter(paciente =>
					paciente.paciente_id === this.pesquisaPacientes ||
					paciente.paciente_nome === this.pesquisaPacientes ||
					paciente.paciente_nome_completo === this.pesquisaPacientes ||
					paciente.paciente_nome.toLowerCase() === this.pesquisaPacientes ||
					paciente.paciente_nome_completo.toLowerCase() === this.pesquisaPacientes ||
					paciente.paciente_cpf === this.pesquisaPacientes ||
					paciente.paciente_cpf.replace(/[^0-9]+/g,'') === this.pesquisaPacientes ||
					paciente.paciente_cns === this.pesquisaPacientes ||
					paciente.paciente_cns.replace(/\s/g,'') === this.pesquisaPacientes ||
					paciente.paciente_uf === this.pesquisaPacientes ||
					paciente.paciente_cidade === this.pesquisaPacientes ||
					paciente.paciente_bairro === this.pesquisaPacientes ||
					paciente.paciente_cep === this.pesquisaPacientes ||
					paciente.paciente_uf.toLowerCase() === this.pesquisaPacientes ||
					paciente.paciente_cidade.toLowerCase() === this.pesquisaPacientes  ||
					paciente.paciente_bairro.toLowerCase() === this.pesquisaPacientes ||
					paciente.paciente_cep.replace(/[^0-9]+/g,'') === this.pesquisaPacientes
				);
			}
		}
	}
});
