<?php $this->load->view('layout/navbar'); ?>

<?php $this->load->view('layout/sidebar'); ?>

<div id="app">

	<!-- Main Content -->
	<div class="main-content">
		<section class="section">

<!--			<div v-show="alertMsg" class="alert alert-warning alert-dismissible fade show" role="alert">-->
<!--				{{ successMSG }}-->
<!--				<button type="button" class="close" data-dismiss="alert" aria-label="Close">-->
<!--					<span aria-hidden="true">&times;</span>-->
<!--				</button>-->
<!--			</div>-->

			<div class="section-body">
				<div class="row">
					<div class="col-12">
						<div class="card">
							<div class="card-header d-block">
								<h4></h4>
								<button type="button" @click="addModal = true" class="btn btn-primary float-right" data-toggle="modal" data-target="#modalCore">
									<i class="fas fa-user"></i>&nbsp;&nbsp;Novo
								</button>

							</div>
							<div class="card-body">

								<div class="table-responsive">
									<table class="table table-striped data-table">
										<thead>
										<tr>
											<th class="text-center">#</th>
											<th>Nome completo</th>
											<th>Nome da mãe</th>
											<th>Data de nascimento</th>
											<th>CPF</th>
											<th>CNS</th>
											<th>Endereço</th>
											<th>Ações</th>
										</tr>
										</thead>

										<tbody>
										<tr v-for="paciente in pacientes_total">
											<td></td>
											<td>{{ paciente.paciente_nome_completo }}</td>
											<td>{{ paciente.paciente_nome_completo_mae }}</td>
											<td>{{ paciente.paciente_data_nascimento }}</td>
											<td>{{ paciente.paciente_cpf }}</td>
											<td>{{ paciente.paciente_cns }}</td>
											<td>{{ paciente.paciente_endereco }}</td>
											<td>
												<a style="float:left;" href="" title="Editar" class="btn-icon"
												   data-toggle="modal" data-target="#modalCore">
													<i class="fas fa-user-edit"></i>
												</a>
												<a style="float:left;" @click="deleteModal = true" href="" title="Excluir" class="btn-icon"
												   data-toggle="modal" data-target="#deleteModal">
													<i class="fas fa-trash-alt"></i>
												</a>

												<a style="float:left;" href="" title="Mostrar" class="btn-icon"
												   data-toggle="modal" data-target="">
													<i class="fas fa-eye"></i>
												</a>
											</td>
										</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<?php $this->load->view('layout/sidebar_settings'); ?>
	</div>

	<?php $this->load->view('pacientes/modal/modal'); ?>
</div>
