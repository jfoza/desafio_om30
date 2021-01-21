<?php $this->load->view('layout/navbar'); ?>

<?php $this->load->view('layout/sidebar'); ?>

<div id="app" class="main-content">
	<?php $this->load->view('pacientes/alerts/sucesso'); ?>

	<section v-if="listPacientes == true" class="section">
		<!-- LISTA TODOS OS PACIENTES -->
		<Pacientes>
			<div class="card-header d-block">
				<div class="float-left">
					<h4>{{ titulo }}</h4>
				</div>
			</div>
			<div class="card-body">
				<div class="row" style="margin-bottom: 15px;">
					<div class="col-sm-12 col-md-3">
						<label>Pesquisar pacientes</label>
						<input v-model="pesquisaPacientes" type="text" class="form-control"/>
					</div>

					<div class="col-sm-12 col-md-3"></div>

					<div class="col-sm-12 col-md-3"></div>

					<div class="col-sm-12 col-md-3">
						<button @click="openModalNew" type="button" class="btn btn-primary form-control" style="margin-top: 28px">
							<i class="fas fa-user"></i>&nbsp;Novo paciente
						</button>
					</div>
				</div>
				<div class="table-responsive">
					<table class="table table-striped data-table">
						<thead>
							<tr>
								<th class="text-left">Id</th>
								<th class="text-right">Nome completo</th>
								<th class="text-center">Data de nascimento</th>
								<th class="text-center">CPF</th>
								<th class="text-center">CNS</th>
								<th class="text-center">Ações</th>
							</tr>
						</thead>

						<tbody>
							<tr v-for="paciente in resultBusca">
								<td class="text-left">{{ paciente.paciente_id }}</td>
								<td class="text-right">{{ paciente.paciente_nome_completo }}</td>
								<td class="text-center">{{ paciente.paciente_data_nascimento }}</td>
								<td class="text-center">{{ paciente.paciente_cpf }}</td>
								<td class="text-center">{{ paciente.paciente_cns }}</td>
								<td class="text-center">
									<button @click="getPacienteId(paciente.paciente_id, false)" type="button" class="btn btn-info" title="Informações">
										<i class="fas fa-eye"></i>
									</button>
									<button @click="getPacienteId(paciente.paciente_id, true)" type="button" class="btn btn-primary" title="Editar">
										<i class="fas fa-user-edit"></i>
									</button>
									<button @click="openModalDelete(paciente.paciente_id)" type="button" class="btn btn-danger" title="Excluir">
										<i class="fas fa-trash-alt"></i>
									</button>
								</td>
							</tr>
						</tbody>
					</table>

					<div class="text-center" v-if="pacientes.length == 0">
						<span>Nenhum registro encontrado</span>
					</div>
				</div>
			</div>
		</Pacientes>

		<div v-if="pagination == true">
			<Pagination
					:current_page="currentPage"
					:row_count_page="rowCountPage"
					@page-update="pageUpdate"
					:total_data="totalData"
					:page_range="pageRange"
			>
			</Pagination>
		</div>
	</section>

	<?php $this->load->view('pacientes/core'); ?>
	<?php $this->load->view('pacientes/modal/modal'); ?>
</div>
