<!-- CADASTRAR NOVO PACIENTE -->
<section v-if="formNewPaciente == true" class="section">
	<New>
		<div class="card-header d-block">
			<div class="float-left">
				<h4>{{ titulo }}</h4>
			</div>
			<button @click="clearAll" type="button" class="btn btn-light float-right">
				X
			</button>
		</div>
		<div class="card-body">
			<div class="form-row">
				<!--Nome-->
				<div class="form-group col-md-4">
					<label>Nome</label>
					<input type="text"
						   v-model="newPaciente.paciente_nome"
						   class="form-control"
						   autocomplete="off"
					/>
					<div class="form-text text-danger" v-html="formValidate.paciente_nome"></div>
				</div>

				<div class="form-group col-md-4">
					<label>Sobrenome</label>
					<input type="text"
						   v-model="newPaciente.paciente_sobrenome"
						   class="form-control"
						   autocomplete="off"
					/>
					<div class="form-text text-danger" v-html="formValidate.paciente_sobrenome"></div>
				</div>

				<!--Nome da Mãe-->
				<div class="form-group col-md-4">
					<label>Nome Completo da Mãe</label>
					<input type="text"
						   v-model="newPaciente.paciente_nome_completo_mae"
						   class="form-control"
						   autocomplete="off"
					/>
					<div class="form-text text-danger" v-html="formValidate.paciente_nome_completo_mae"></div>
				</div>

				<div class="form-group col-md-4">
					<label>Data de Nascimento</label>
					<input type="date"
						   v-model="newPaciente.paciente_data_nascimento"
						   class="form-control"
						   autocomplete="off"
					/>
					<div class="text-danger" v-html="formValidate.paciente_data_nascimento"></div>
				</div>

				<div class="form-group col-md-4">
					<label>CPF</label>
					<input type="text"
						   v-model="newPaciente.paciente_cpf"
						   class="form-control"
						   autocomplete="off"
						   onkeyup="mascara('###.###.###-##',this,event,true)"
					/>
					<div class="text-danger" v-html="formValidate.paciente_cpf"></div>
				</div>

				<div class="form-group col-md-4">
					<label>CNS</label>
					<input type="text"
						   v-model="newPaciente.paciente_cns"
						   class="form-control"
						   autocomplete="off"
					/>
					<div class="text-danger" v-html="formValidate.paciente_cns"></div>
				</div>

				<div class="form-group col-md-4">
					<label>CEP</label>
					<input type="text"
						   v-model="newPaciente.paciente_cep"
						   @keyup="searchCep"
						   class="form-control"
						   autocomplete="off"
						   onkeyup="mascara('#####-###',this,event,true)"
					/>
					<div class="text-danger" v-html="formValidate.paciente_cep"></div>
				</div>

				<div class="form-group col-md-4">
					<label>Endereço</label>
					<input type="text"
						   v-model="newPaciente.paciente_endereco"
						   class="form-control"
						   autocomplete="off"
					/>
					<div class="text-danger" v-html="formValidate.paciente_endereco"></div>
				</div>

				<div class="form-group col-md-4">
					<label>Nº</label>
					<input type="text"
						   v-model="newPaciente.paciente_numero_endereco"
						   class="form-control"
						   autocomplete="off"
					/>
					<div class="text-danger" v-html="formValidate.paciente_numero_endereco"></div>
				</div>

				<div class="form-group col-md-4">
					<label>Complemento</label>
					<input type="text"
						   v-model="newPaciente.paciente_complemento"
						   class="form-control"
						   autocomplete="off"
					/>
					<div class="text-danger" v-html="formValidate.paciente_complemento"></div>
				</div>

				<div class="form-group col-md-4">
					<label>Bairro</label>
					<input type="text"
						   v-model="newPaciente.paciente_bairro"
						   class="form-control"
						   autocomplete="off"
					/>
					<div class="text-danger" v-html="formValidate.paciente_bairro"></div>
				</div>

				<div class="form-group col-md-4">
					<label>Cidade</label>
					<input type="text"
						   v-model="newPaciente.paciente_cidade"
						   class="form-control"
						   autocomplete="off"
					/>
					<div class="text-danger" v-html="formValidate.paciente_cidade"></div>
				</div>

				<div class="form-group col-md-4">
					<label>UF</label>
					<input type="text"
						   v-model="newPaciente.paciente_uf"
						   class="form-control"
						   autocomplete="off"
					/>
					<div class="text-danger" v-html="formValidate.paciente_uf"></div>
				</div>
			</div>
		</div>

		<div class="card-footer">
			<button @click="clearAll" type="button" class="btn btn-danger mr-2" >Cancelar</button>
			<button @click="insert" type="button" class="btn btn-primary mr-2" >Confirmar</button>
		</div>
	</New>
</section>

<!-- EDITAR PACIENTE -->
<section v-if="formEditPaciente == true" class="section">
	<Edit>
		<div class="card-header d-block">
			<div class="float-left">
				<h4>{{ titulo }}</h4>
			</div>
			<button @click="clearAll" type="button" class="btn btn-light float-right">
				X
			</button>
		</div>
		<div class="card-body">
			<div class="form-row">
				<!--Nome-->
				<div class="form-group col-md-4">
					<label>Nome</label>
					<input type="text"
						   v-model="choosePaciente.paciente_nome"
						   class="form-control"
						   autocomplete="off"
					/>

					<div class="text-danger" v-html="formValidate.paciente_nome"></div>
				</div>

				<div class="form-group col-md-4">
					<label>Sobrenome</label>
					<input type="text"
						   v-model="choosePaciente.paciente_sobrenome"
						   class="form-control"
						   autocomplete="off"
					/>

					<div class="text-danger" v-html="formValidate.paciente_sobrenome"></div>
				</div>

				<!--Nome da Mãe-->
				<div class="form-group col-md-4">
					<label>Nome Completo da Mãe</label>
					<input type="text"
						   v-model="choosePaciente.paciente_nome_completo_mae"
						   class="form-control"
						   autocomplete="off"
					/>


					<div class="text-danger" v-html="formValidate.paciente_nome_completo_mae"></div>
				</div>

				<div class="form-group col-md-4">
					<label>Data de Nascimento</label>
					<input type="date"
						   v-model="choosePaciente.paciente_data_nascimento"
						   class="form-control"
						   autocomplete="off"
					/>
					<div class="text-danger" v-html="formValidate.paciente_data_nascimento"></div>
				</div>

				<div class="form-group col-md-4">
					<label>CPF</label>
					<input type="text"
						   v-model="choosePaciente.paciente_cpf"
						   class="form-control"
						   autocomplete="off"
					/>
					<div class="text-danger" v-html="formValidate.paciente_cpf"></div>
				</div>

				<div class="form-group col-md-4">
					<label>CNS</label>
					<input type="text"
						   v-model="choosePaciente.paciente_cns"
						   class="form-control"
						   autocomplete="off"
					/>
					<div class="text-danger" v-html="formValidate.paciente_cns"></div>
				</div>

				<div class="form-group col-md-4">
					<label>CEP</label>
					<input type="text"
						   v-model="choosePaciente.paciente_cep"
						   class="form-control"
						   autocomplete="off"
					/>
					<div class="text-danger" v-html="formValidate.paciente_cep"></div>
				</div>

				<div class="form-group col-md-4">
					<label>Endereço</label>
					<input type="text"
						   v-model="choosePaciente.paciente_endereco"
						   class="form-control"
						   autocomplete="off"
					/>
					<div class="text-danger" v-html="formValidate.paciente_endereco"></div>
				</div>

				<div class="form-group col-md-4">
					<label>Nº</label>
					<input type="text"
						   v-model="choosePaciente.paciente_numero_endereco"
						   class="form-control"
						   autocomplete="off"
					/>
					<div class="text-danger" v-html="formValidate.paciente_numero_endereco"></div>
				</div>

				<div class="form-group col-md-4">
					<label>Complemento</label>
					<input type="text"
						   v-model="choosePaciente.paciente_complemento"
						   class="form-control"
						   autocomplete="off"
					/>
					<div class="text-danger" v-html="formValidate.paciente_complemento"></div>
				</div>

				<div class="form-group col-md-4">
					<label>Bairro</label>
					<input type="text"
						   v-model="choosePaciente.paciente_bairro"
						   class="form-control"
						   autocomplete="off"
					/>
					<div class="text-danger" v-html="formValidate.paciente_bairro"></div>
				</div>

				<div class="form-group col-md-4">
					<label>Cidade</label>
					<input type="text"
						   v-model="choosePaciente.paciente_cidade"
						   class="form-control"
						   autocomplete="off"
					/>
					<div class="text-danger" v-html="formValidate.paciente_cidade"></div>
				</div>

				<div class="form-group col-md-4">
					<label>UF</label>
					<input type="text"
						   v-model="choosePaciente.paciente_uf"
						   class="form-control"
						   autocomplete="off"
					/>
					<div class="text-danger" v-html="formValidate.paciente_uf"></div>
				</div>

			</div>
		</div>

		<div class="card-footer">
			<button @click="clearAll" type="button" class="btn btn-danger mr-2" >Cancelar</button>
			<button @click="update" type="button" class="btn btn-primary mr-2" >Confirmar</button>
		</div>
	</Edit>
</section>
