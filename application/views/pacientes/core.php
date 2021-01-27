<!-- CADASTRAR NOVO PACIENTE -->
<section v-if="formNewPaciente == true" class="section">
	<Pacientes>
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
				<div class="form-group col-md-3">
					<label>Nome *</label>
					<input type="text"
						   v-model="newPaciente.paciente_nome"
						   class="form-control"
						   autocomplete="off"
					/>
					<div class="form-text text-danger" v-html="formValidate.paciente_nome"></div>
				</div>

				<div class="form-group col-md-3">
					<label>Sobrenome *</label>
					<input type="text"
						   v-model="newPaciente.paciente_sobrenome"
						   class="form-control"
						   autocomplete="off"
					/>
					<div class="form-text text-danger" v-html="formValidate.paciente_sobrenome"></div>
				</div>

				<!--Nome da Mãe-->
				<div class="form-group col-md-4">
					<label>Nome Completo da Mãe *</label>
					<input type="text"
						   v-model="newPaciente.paciente_nome_completo_mae"
						   class="form-control"
						   autocomplete="off"
					/>
					<div class="form-text text-danger" v-html="formValidate.paciente_nome_completo_mae"></div>
				</div>

				<div class="form-group col-md-2">
					<label>Data de Nascimento *</label>
					<input type="date"
						   v-model="newPaciente.paciente_data_nascimento"
						   class="form-control"
						   autocomplete="off"
					/>
					<div class="text-danger" v-html="formValidate.paciente_data_nascimento"></div>
				</div>

				<div class="form-group col-md-3">
					<label>CPF *</label>
					<input type="text"
						   v-model="newPaciente.paciente_cpf"
						   class="form-control"
						   autocomplete="off"
						   placeholder="000.000.000-00"
						   onkeyup="mascara('###.###.###-##',this,event,true)"
					/>
					<div class="text-danger" v-html="formValidate.paciente_cpf"></div>
				</div>

				<div class="form-group col-md-3">
					<label>CNS *</label>
					<input type="text"
						   v-model="newPaciente.paciente_cns"
						   class="form-control"
						   placeholder="000 0000 0000 0000"
						   autocomplete="off"
						   onkeyup="mascara('### #### #### ####',this,event,true)"
					/>
					<div class="text-danger" v-html="formValidate.paciente_cns"></div>
				</div>

				<div class="form-group col-md-2">
					<label>CEP *</label>
					<input type="text"
						   v-model="newPaciente.paciente_cep"
						   @keyup="searchCep"
						   class="form-control"
						   autocomplete="off"
						   placeholder="00000-000"
						   onkeyup="mascara('#####-###',this,event,true)"
					/>
					<div class="text-danger" v-html="formValidate.paciente_cep"></div>
				</div>

				<div class="form-group col-md-4">
					<label>Endereço *</label>
					<input type="text"
						   v-model="newPaciente.paciente_endereco"
						   class="form-control"
						   autocomplete="off"
						   disabled="disabled"
					/>
					<div class="text-danger" v-html="formValidate.paciente_endereco"></div>
				</div>

				<div class="form-group col-md-2">
					<label>Nº *</label>
					<input type="text"
						   v-model="newPaciente.paciente_numero_endereco"
						   class="form-control"
						   autocomplete="off"
					/>
					<div class="text-danger" v-html="formValidate.paciente_numero_endereco"></div>
				</div>

				<div class="form-group col-md-3">
					<label>Complemento</label>
					<input type="text"
						   v-model="newPaciente.paciente_complemento"
						   class="form-control"
						   autocomplete="off"
					/>
					<div class="text-danger" v-html="formValidate.paciente_complemento"></div>
				</div>

				<div class="form-group col-md-2">
					<label>Bairro *</label>
					<input type="text"
						   v-model="newPaciente.paciente_bairro"
						   class="form-control"
						   autocomplete="off"
						   disabled="disabled"
					/>
					<div class="text-danger" v-html="formValidate.paciente_bairro"></div>
				</div>

				<div class="form-group col-md-3">
					<label>Cidade *</label>
					<input type="text"
						   v-model="newPaciente.paciente_cidade"
						   class="form-control"
						   autocomplete="off"
						   disabled="disabled"
					/>
					<div class="text-danger" v-html="formValidate.paciente_cidade"></div>
				</div>

				<div class="form-group col-md-2">
					<label>UF *</label>
					<input type="text"
						   v-model="newPaciente.paciente_uf"
						   class="form-control to_uppercase"
						   autocomplete="off"
						   disabled="disabled"
					/>
					<div class="text-danger" v-html="formValidate.paciente_uf"></div>
				</div>

				<div class="form-group col-md-3">
					<label>Imagem(Máximo 400X400px)</label>

					<div v-if="showImage == false">
						<input type="file" @change="onFileSelected" id="arquivo" class="form-control"/>
						<label class="label-file" for="arquivo">Enviar arquivo</label>
					</div>

					<div v-if="showImage" class="imagem">
						<img :src="imageUrl +imageName" width="200" class="img-thumbnail"/>
						<div class="capa">
							<div class="alinhamento-vertical">
								<button @click="replaceImage" id="btn-troca-imagem" type="button" class="btn btn-link">
									Trocar imagem
								</button>
							</div>
						</div>
					</div>

					<div class="text-danger" v-html="imageValidate"></div>
				</div>
			</div>
		</div>

		<div class="card-footer">
			<button @click="clearAll" type="button" class="btn btn-danger mr-2" >Cancelar</button>
			<button @click="insert" type="button" class="btn btn-primary mr-2" >Confirmar</button>
		</div>
	</Pacientes>
</section>

<!-- EDITAR PACIENTE -->
<section v-if="formEditPaciente == true" class="section">
	<Pacientes>
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
				<div class="form-group col-md-3">
					<label>Nome *</label>
					<input type="text"
						   v-model="choosePaciente.paciente_nome"
						   class="form-control"
						   autocomplete="off"
					/>

					<div class="text-danger" v-html="formValidate.paciente_nome"></div>
				</div>

				<div class="form-group col-md-3">
					<label>Sobrenome *</label>
					<input type="text"
						   v-model="choosePaciente.paciente_sobrenome"
						   class="form-control"
						   autocomplete="off"
					/>

					<div class="text-danger" v-html="formValidate.paciente_sobrenome"></div>
				</div>

				<!--Nome da Mãe-->
				<div class="form-group col-md-4">
					<label>Nome Completo da Mãe *</label>
					<input type="text"
						   v-model="choosePaciente.paciente_nome_completo_mae"
						   class="form-control"
						   autocomplete="off"
					/>

					<div class="text-danger" v-html="formValidate.paciente_nome_completo_mae"></div>
				</div>

				<div class="form-group col-md-2">
					<label>Data de Nascimento *</label>
					<input type="date"
						   v-model="choosePaciente.paciente_data_nascimento"
						   class="form-control"
						   autocomplete="off"
					/>
					<div class="text-danger" v-html="formValidate.paciente_data_nascimento"></div>
				</div>

				<div class="form-group col-md-3">
					<label>CPF *</label>
					<input type="text"
						   v-model="choosePaciente.paciente_cpf"
						   class="form-control"
						   autocomplete="off"
						   placeholder="000.000.000-00"
						   onkeyup="mascara('###.###.###-##',this,event,true)"
					/>
					<div class="text-danger" v-html="formValidate.paciente_cpf"></div>
				</div>

				<div class="form-group col-md-3">
					<label>CNS *</label>
					<input type="text"
						   v-model="choosePaciente.paciente_cns"
						   class="form-control"
						   autocomplete="off"
						   placeholder="000 0000 0000 0000"
						   onkeyup="mascara('### #### #### ####',this,event,true)"
					/>
					<div class="text-danger" v-html="formValidate.paciente_cns"></div>
				</div>

				<div class="form-group col-md-2">
					<label>CEP *</label>
					<input type="text"
						   v-model="choosePaciente.paciente_cep"
						   class="form-control"
						   autocomplete="off"
						   placeholder="00000-000"
						   onkeyup="mascara('#####-###',this,event,true)"
					/>
					<div class="text-danger" v-html="formValidate.paciente_cep"></div>
				</div>

				<div class="form-group col-md-4">
					<label>Endereço *</label>
					<input type="text"
						   v-model="choosePaciente.paciente_endereco"
						   class="form-control"
						   autocomplete="off"
						   disabled="disabled"
					/>
					<div class="text-danger" v-html="formValidate.paciente_endereco"></div>
				</div>

				<div class="form-group col-md-2">
					<label>Nº *</label>
					<input type="text"
						   v-model="choosePaciente.paciente_numero_endereco"
						   class="form-control"
						   autocomplete="off"
					/>
					<div class="text-danger" v-html="formValidate.paciente_numero_endereco"></div>
				</div>

				<div class="form-group col-md-3">
					<label>Complemento</label>
					<input type="text"
						   v-model="choosePaciente.paciente_complemento"
						   class="form-control"
						   autocomplete="off"
					/>
					<div class="text-danger" v-html="formValidate.paciente_complemento"></div>
				</div>

				<div class="form-group col-md-2">
					<label>Bairro *</label>
					<input type="text"
						   v-model="choosePaciente.paciente_bairro"
						   class="form-control"
						   autocomplete="off"
						   disabled="disabled"
					/>
					<div class="text-danger" v-html="formValidate.paciente_bairro"></div>
				</div>

				<div class="form-group col-md-3">
					<label>Cidade *</label>
					<input type="text"
						   v-model="choosePaciente.paciente_cidade"
						   class="form-control"
						   autocomplete="off"
						   disabled="disabled"
					/>
					<div class="text-danger" v-html="formValidate.paciente_cidade"></div>
				</div>

				<div class="form-group col-md-2">
					<label>UF *</label>
					<input type="text"
						   v-model="choosePaciente.paciente_uf"
						   class="form-control"
						   autocomplete="off"
						   disabled="disabled"
					/>
					<div class="text-danger" v-html="formValidate.paciente_uf"></div>
				</div>

				<div class="form-group col-md-3">
					<label>Imagem(Máximo 400X400px)</label>

					<div v-if="showImage == false">
						<input type="file" @change="onFileSelected" id="arquivo" class="form-control"/>
						<label class="label-file" for="arquivo">Enviar arquivo</label>
					</div>

					<div v-if="showImage" class="imagem">
						<img :src="imageUrl + choosePaciente.paciente_imagem"
							 width="200"
							 class="img-thumbnail"/>
						<div class="capa">
							<div class="alinhamento-vertical">
								<button @click="replaceImage" id="btn-troca-imagem" type="button" class="btn btn-link">
									Trocar imagem
								</button>
							</div>
						</div>
					</div>

					<div class="text-danger" v-html="imageValidate"></div>
				</div>

			</div>
		</div>

		<div class="card-footer">
			<button @click="clearAll" type="button" class="btn btn-danger mr-2" >Cancelar</button>
			<button @click="update" type="button" class="btn btn-primary mr-2" >Confirmar</button>
		</div>
	</Pacientes>
</section>

<!-- INFO PACIENTE -->
<section v-if="infoPaciente == true" class="section">
	<Pacientes>
		<div class="card-header d-block">
			<div class="float-left">
				<h4>{{ titulo }}</h4>
			</div>
			<button @click="clearAll" type="button" class="btn btn-light float-right">
				X
			</button>
		</div>
		<div class="card-body">
			<div class="row">
				<div class="form-group col-md-3">
					<div class="imagem">
						<div v-if="showImage">
							<img :src="imageUrl + choosePaciente.paciente_imagem"
								width="200"
								class="img-thumbnail"
								style="max-height: 200px; max-width: 200px; height: auto; width: auto;" />
						</div>

						<div v-if="choosePaciente.paciente_imagem == null || choosePaciente.paciente_imagem == ''">
							<img :src="iconNoImage"
								width="200"
								class="img-thumbnail"/>
						</div>
					</div>
				</div>
				
				<div class="col-md-9">
					<div class="row">
						<div class="form-group col-md-4">
							<label>Nome</label>
							<input type="text"
								   v-model="choosePaciente.paciente_nome"
								   class="form-control"
								   autocomplete="off"
								   disabled="disabled"
							/>
						</div>

						<div class="form-group col-md-5">
							<label>Sobrenome</label>
							<input type="text"
								   v-model="choosePaciente.paciente_sobrenome"
								   class="form-control"
								   autocomplete="off"
								   disabled="disabled"
							/>
						</div>

						<div class="form-group col-md-3">
							<label>Data de Nascimento</label>
							<input type="date"
								   v-model="choosePaciente.paciente_data_nascimento"
								   class="form-control"
								   autocomplete="off"
								   disabled="disabled"
							/>
						</div>

						<div class="form-group col-md-5">
							<label>Nome Completo da Mãe</label>
							<input type="text"
								   v-model="choosePaciente.paciente_nome_completo_mae"
								   class="form-control"
								   autocomplete="off"
								   disabled="disabled"
							/>
						</div>

						<div class="form-group col-md-3">
							<label>CPF</label>
							<input type="text"
								   v-model="choosePaciente.paciente_cpf"
								   class="form-control"
								   autocomplete="off"
								   disabled="disabled"
							/>
						</div>

						<div class="form-group col-md-4">
							<label>CNS</label>
							<input type="text"
								   v-model="choosePaciente.paciente_cns"
								   class="form-control"
								   autocomplete="off"
								   onkeyup="mascara('### #### #### ####',this,event,true)"
								   disabled="disabled"
							/>
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-12">
					<div class="row">
						<div class="form-group col-md-3">
							<label>CEP</label>
							<input type="text"
								   v-model="choosePaciente.paciente_cep"
								   class="form-control"
								   autocomplete="off"
								   disabled="disabled"
							/>
						</div>

						<div class="form-group col-md-4">
							<label>Endereço</label>
							<input type="text"
								   v-model="choosePaciente.paciente_endereco"
								   class="form-control"
								   autocomplete="off"
								   disabled="disabled"
							/>
						</div>

						<div class="form-group col-md-2">
							<label>Nº</label>
							<input type="text"
								   v-model="choosePaciente.paciente_numero_endereco"
								   class="form-control"
								   autocomplete="off"
								   disabled="disabled"
							/>
						</div>

						<div class="form-group col-md-3">
							<label>Complemento</label>
							<input type="text"
								   v-model="choosePaciente.paciente_complemento"
								   class="form-control"
								   autocomplete="off"
								   disabled="disabled"
							/>
						</div>

						<div class="form-group col-md-2">
							<label>Bairro</label>
							<input type="text"
								   v-model="choosePaciente.paciente_bairro"
								   class="form-control"
								   autocomplete="off"
								   disabled="disabled"
							/>
						</div>

						<div class="form-group col-md-3">
							<label>Cidade</label>
							<input type="text"
								   v-model="choosePaciente.paciente_cidade"
								   class="form-control"
								   autocomplete="off"
								   disabled="disabled"
							/>
						</div>

						<div class="form-group col-md-2">
							<label>UF</label>
							<input type="text"
								   v-model="choosePaciente.paciente_uf"
								   class="form-control"
								   autocomplete="off"
								   disabled="disabled"
							/>
						</div>
					</div>
				</div>
			</div>
		</div>
	</Pacientes>
</section>
