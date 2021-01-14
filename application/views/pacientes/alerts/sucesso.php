<div v-if="alert == true" class="alert alert-success fade show" role="alert">
	<i class="fas fa-check-circle"></i> &nbsp; {{ msgSucesso }}
	<button @click="alert = false" type="button" class="close">
		<span>X</span>
	</button>
</div>
