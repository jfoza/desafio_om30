<!-- Modal Insert -->
<div v-if="addModal" @close="addModal = false" class="modal fade">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header text-center">
				<h4 class="modal-title w-100 font-weight-bold">{{ tituloModal }}</h4>
				<button type="button" @click="closeModal" class="close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body mx-3">
				<div class="form-row">
					<!--Nome-->
					<div class="form-group col-md-6">
						<label>Nome Completo</label>
						<input type="text"
							   v-model="novoPaciente.paciente_nome_completo"
							   class="form-control"
							   autocomplete="off"
						/>
						<div class="text-danger" v-html="formValidate.paciente_nome_completo"></div>
					</div>

					<!--Nome da Mãe-->
					<div class="form-group col-md-6">
						<label>Nome Completo da Mãe</label>
						<input type="text"
							   v-model="novoPaciente.paciente_nome_completo_mae"
							   class="form-control"
							   autocomplete="off"
						/>
						<div class="text-danger" v-html="formValidate.paciente_nome_completo_mae"></div>
					</div>
				</div>

				<div class="form-row">
					<div class="form-group col-md-4">
						<label>Data de Nascimento</label>
						<input type="date"
							   v-model="novoPaciente.paciente_data_nascimento"
							   class="form-control"
							   autocomplete="off"
						/>
						<div class="text-danger" v-html="formValidate.paciente_data_nascimento"></div>
					</div>

					<div class="form-group col-md-4">
						<label>CPF</label>
						<input type="text"
							   v-model="novoPaciente.paciente_cpf"
							   class="form-control cpf"
							   autocomplete="off"
						/>
						<div class="text-danger" v-html="formValidate.paciente_cpf"></div>
					</div>

					<div class="form-group col-md-4">
						<label>CNS</label>
						<input type="text"
							   v-model="novoPaciente.paciente_cns"
							   class="form-control"
							   autocomplete="off"
						/>
						<div class="text-danger" v-html="formValidate.paciente_cns"></div>
					</div>
				</div>

				<div class="form-row">
					<div class="form-group col-md-4">
						<label>CEP</label>
						<input type="text"
							   v-model="novoPaciente.paciente_cep"
							   @keyup="searchCep"
							   class="form-control cep"
							   autocomplete="off"
						/>
						<div class="text-danger" v-html="formValidate.paciente_cep"></div>
					</div>

					<div class="form-group col-md-5">
						<label>Endereço</label>
						<input type="text"
							   v-model="novoPaciente.paciente_endereco"
							   class="form-control"
							   autocomplete="off"
						/>
						<div class="text-danger" v-html="formValidate.paciente_endereco"></div>
					</div>

					<div class="form-group col-md-3">
						<label>Nº</label>
						<input type="text"
							   v-model="novoPaciente.paciente_numero_endereco"
							   class="form-control"
							   autocomplete="off"
						/>
						<div class="text-danger" v-html="formValidate.paciente_numero_endereco"></div>
					</div>
				</div>

				<div class="form-row">
					<div class="form-group col-md-3">
						<label>Complemento</label>
						<input type="text"
							   v-model="novoPaciente.paciente_complemento"
							   class="form-control"
							   autocomplete="off"
						/>
						<div class="text-danger" v-html="formValidate.paciente_complemento"></div>
					</div>

					<div class="form-group col-md-3">
						<label>Bairro</label>
						<input type="text"
							   v-model="novoPaciente.paciente_bairro"
							   class="form-control"
							   autocomplete="off"
						/>
						<div class="text-danger" v-html="formValidate.paciente_bairro"></div>
					</div>

					<div class="form-group col-md-4">
						<label>Cidade</label>
						<input type="text"
							   v-model="novoPaciente.paciente_cidade"
							   class="form-control"
							   autocomplete="off"
						/>
						<div class="text-danger" v-html="formValidate.paciente_cidade"></div>
					</div>

					<div class="form-group col-md-2">
						<label>UF</label>
						<input type="text"
							   v-model="novoPaciente.paciente_uf"
							   class="form-control uf"
							   autocomplete="off"
							   style="text-transform:uppercase;"
						/>
						<div class="text-danger" v-html="formValidate.paciente_uf"></div>
					</div>
				</div>

			</div>
			<div class="modal-footer d-flex justify-content-center">
				<button type="button" @click="insert" class="btn btn-primary mr-2" >Salvar</button>
				<button type="button" @click="clear" class="btn btn-dark mr-2" >Limpar</button>
			</div>
		</div>
	</div>
</div>

<!-- Modal Update -->
<div v-if="addModal" class="modal fade" id="modalCore" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
	 aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header text-center">
				<h4 class="modal-title w-100 font-weight-bold">{{ tituloModal }}</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body mx-3">
				<div class="form-row">
					<!--Nome-->
					<div class="form-group col-md-6">
						<label>Nome Completo</label>
						<input type="text"
							   v-model="novoPaciente.paciente_nome_completo"
							   class="form-control"
							   autocomplete="off"
						/>
						<div class="text-danger" v-html="formValidate.paciente_nome_completo"></div>
					</div>

					<!--Nome da Mãe-->
					<div class="form-group col-md-6">
						<label>Nome Completo da Mãe</label>
						<input type="text"
							   v-model="novoPaciente.paciente_nome_completo_mae"
							   class="form-control"
							   autocomplete="off"
						/>
						<div class="text-danger" v-html="formValidate.paciente_nome_completo_mae"></div>
					</div>
				</div>

				<div class="form-row">
					<div class="form-group col-md-4">
						<label>Data de Nascimento</label>
						<input type="date"
							   v-model="novoPaciente.paciente_data_nascimento"
							   class="form-control"
							   autocomplete="off"
						/>
						<div class="text-danger" v-html="formValidate.paciente_data_nascimento"></div>
					</div>

					<div class="form-group col-md-4">
						<label>CPF</label>
						<input type="text"
							   v-model="novoPaciente.paciente_cpf"
							   class="form-control cpf"
							   autocomplete="off"
						/>
						<div class="text-danger" v-html="formValidate.paciente_cpf"></div>
					</div>

					<div class="form-group col-md-4">
						<label>CNS</label>
						<input type="text"
							   v-model="novoPaciente.paciente_cns"
							   class="form-control"
							   autocomplete="off"
						/>
						<div class="text-danger" v-html="formValidate.paciente_cns"></div>
					</div>
				</div>

				<div class="form-row">
					<div class="form-group col-md-4">
						<label>CEP</label>
						<input type="text"
							   v-model="novoPaciente.paciente_cep"
							   @keyup="searchCep"
							   class="form-control cep"
							   autocomplete="off"
						/>
						<div class="text-danger" v-html="formValidate.paciente_cep"></div>
					</div>

					<div class="form-group col-md-5">
						<label>Endereço</label>
						<input type="text"
							   v-model="novoPaciente.paciente_endereco"
							   class="form-control"
							   autocomplete="off"
						/>
						<div class="text-danger" v-html="formValidate.paciente_endereco"></div>
					</div>

					<div class="form-group col-md-3">
						<label>Nº</label>
						<input type="text"
							   v-model="novoPaciente.paciente_numero_endereco"
							   class="form-control"
							   autocomplete="off"
						/>
						<div class="text-danger" v-html="formValidate.paciente_numero_endereco"></div>
					</div>
				</div>

				<div class="form-row">
					<div class="form-group col-md-3">
						<label>Complemento</label>
						<input type="text"
							   v-model="novoPaciente.paciente_complemento"
							   class="form-control"
							   autocomplete="off"
						/>
						<div class="text-danger" v-html="formValidate.paciente_complemento"></div>
					</div>

					<div class="form-group col-md-3">
						<label>Bairro</label>
						<input type="text"
							   v-model="novoPaciente.paciente_bairro"
							   class="form-control"
							   autocomplete="off"
						/>
						<div class="text-danger" v-html="formValidate.paciente_bairro"></div>
					</div>

					<div class="form-group col-md-4">
						<label>Cidade</label>
						<input type="text"
							   v-model="novoPaciente.paciente_cidade"
							   class="form-control"
							   autocomplete="off"
						/>
						<div class="text-danger" v-html="formValidate.paciente_cidade"></div>
					</div>

					<div class="form-group col-md-2">
						<label>UF</label>
						<input type="text"
							   v-model="novoPaciente.paciente_uf"
							   class="form-control uf"
							   autocomplete="off"
							   style="text-transform:uppercase;"
						/>
						<div class="text-danger" v-html="formValidate.paciente_uf"></div>
					</div>
				</div>

			</div>
			<div class="modal-footer d-flex justify-content-center">
				<button type="button" @click="insert" class="btn btn-primary mr-2" >Salvar</button>
				<button type="button" @click="clear" class="btn btn-dark mr-2" >Limpar</button>
			</div>
		</div>
	</div>
</div>

<!-- Modal Delete -->
<div v-if="deleteModal" class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalCenterTitle">Deseja excluir este paciente?</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				...
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Não</button>
				<button type="button" class="btn btn-primary" data-dismiss="modal">Sim</button>
			</div>
		</div>
	</div>
</div>
