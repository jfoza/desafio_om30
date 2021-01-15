<!-- DELETE -->
<modalsimples v-if="modalDeletePaciente" @close="modalDeletePaciente = false">
	<div class="modal-body">
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-12">
					<div class="row">
						<div class="col-3 col-sm-3">
							<img :src="iconDelete"/>
						</div>

						<div style="margin-top: 20px;" class="col-8 col-sm-8">
							<h6>Deseja excluir este registro?</h6>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div slot="footer">
		<button @click="deletePaciente" type="button" class="btn btn-success">Confirmar</button>
		<button @click="clearAll" type="button" class="btn btn-danger">Cancelar</button>
	</div>
</modalsimples>
