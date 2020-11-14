<?php $this->load->view('layout/navbar'); ?>

<?php $this->load->view('layout/sidebar'); ?>

<!-- Main Content -->
<div class="main-content">
	<section class="section">
		<div class="section-body">
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-header">
							<h4>Título</h4>
						</div>

						<form>
							<div class="card-body">
								<div class="form-row">
									<!--Nome-->
									<div class="form-group col-md-4">
										<label>Nome Completo</label>
										<input type="text"
											   v-model="novoPaciente.paciente_nome_completo"
											   class="form-control"
											   autocomplete="off"
										/>
									</div>

									<!--Nome da Mãe-->
									<div class="form-group col-md-4">
										<label>Nome Completo da Mãe</label>
										<input type="text"
											   v-model="novoPaciente.paciente_nome_completo_mae"
											   class="form-control"
											   autocomplete="off"
										/>
										<div class="text-danger" v-html=""></div>
									</div>

									<div class="form-group col-md-4">
										<label>Data de Nascimento</label>
										<input type="date"
											   v-model="novoPaciente.paciente_data_nascimento"
											   class="form-control"
											   autocomplete="off"
										/>
										<div class="text-danger" v-html=""></div>
									</div>

									<div class="form-group col-md-4">
										<label>CPF</label>
										<input type="text"
											   v-model="novoPaciente.paciente_cpf"
											   class="form-control"
											   autocomplete="off"
										/>
										<div class="text-danger" v-html=""></div>
									</div>

									<div class="form-group col-md-4">
										<label>CNS</label>
										<input type="text"
											   v-model="novoPaciente.paciente_cns"
											   class="form-control"
											   autocomplete="off"
										/>
										<div class="text-danger" v-html=""></div>
									</div>

									<div class="form-group col-md-4">
										<label>CEP</label>
										<input type="text"
											   v-model="novoPaciente.paciente_cep"
											   class="form-control"
											   autocomplete="off"
										/>
										<div class="text-danger" v-html=""></div>
									</div>

									<div class="form-group col-md-4">
										<label>Endereço</label>
										<input type="text"
											   v-model="novoPaciente.paciente_endereco"
											   class="form-control"
											   autocomplete="off"
										/>
										<div class="text-danger" v-html=""></div>
									</div>

									<div class="form-group col-md-4">
										<label>Nº</label>
										<input type="text"
											   v-model="novoPaciente.paciente_numero_endereco"
											   class="form-control"
											   autocomplete="off"
										/>
										<div class="text-danger" v-html=""></div>
									</div>

									<div class="form-group col-md-4">
										<label>Complemento</label>
										<input type="text"
											   v-model="novoPaciente.paciente_complemento"
											   class="form-control"
											   autocomplete="off"
										/>
										<div class="text-danger" v-html=""></div>
									</div>

									<div class="form-group col-md-4">
										<label>Bairro</label>
										<input type="text"
											   v-model="novoPaciente.paciente_bairro"
											   class="form-control"
											   autocomplete="off"
										/>
										<div class="text-danger" v-html=""></div>
									</div>

									<div class="form-group col-md-4">
										<label>Cidade</label>
										<input type="text"
											   v-model="novoPaciente.paciente_cidade"
											   class="form-control"
											   autocomplete="off"
										/>
										<div class="text-danger" v-html=""></div>
									</div>

									<div class="form-group col-md-4">
										<label>UF</label>
										<input type="text"
											   v-model="novoPaciente.paciente_uf"
											   class="form-control"
											   autocomplete="off"
										/>
										<div class="text-danger" v-html=""></div>
									</div>

								</div>
							</div>
						</form>

						<div class="card-footer">
							<button type="button" @click="insert" class="btn btn-primary mr-2" >Salvar</button>
							<a class="btn btn-dark" href="<?php echo base_url('pacientes'); ?>">Voltar</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<?php $this->load->view('layout/sidebar_settings'); ?>
</div>
