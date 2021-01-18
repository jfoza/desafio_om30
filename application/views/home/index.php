<?php $this->load->view('layout/navbar'); ?>

<?php $this->load->view('layout/sidebar'); ?>

<div id="home">
	<!-- Main Content -->
	<div class="main-content">
		<section class="section">
			<div class="section-body">
				<div class="container">
					<div class="row">
						<div class="col-sm-3">
							<div class="row-fluid">
								<div class="text-left">
									<a :href="linkFacebook" target="_blank" title="Facebook">
										<img style="margin-bottom: 10px;" :src="logoFacebook" title="Facebook"/>
									</a>
								</div>

								<div class="text-left">
									<a :href="linkLinkedin" target="_blank" title="Linkedin">
										<img style="margin-bottom: 10px;" :src="logoLinkedin" title="Linkedin"/>
									</a>
								</div>

								<div class="text-left">
									<a :href="linkSite" target="_blank" title="Site oficial">
										<img :src="logoSite" title="Site oficial"/>
									</a>
								</div>
							</div>
						</div>
						<div class="col-sm">
							<img style="max-width: 500px; max-height: 500px; opacity: 0.3; filter: alpha(opacity=50);"
								 :src="logoGrande"/>
						</div>
					</div>
				</div>
			</div>
		</section>

		<?php $this->load->view('layout/sidebar_settings'); ?>
	</div>
</div>
