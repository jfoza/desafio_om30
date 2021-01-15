<div class="main-sidebar sidebar-style-2">
	<aside id="sidebar-wrapper">
		<div class="sidebar-brand">
			<img src="<?php echo base_url('public/assets/img/logo.png') ?>"/>
		</div>
		<ul style="margin-top: 50px;" class="sidebar-menu">
			<li class="dropdown <?php echo ($this->router->fetch_class() == 'pacientes') && ($this->router->fetch_method() == 'index') ? 'active' : ''; ?>">
				<a href="<?php echo base_url('pacientes'); ?>"
				   class="nav-link">
                    <i class="fas fa-user"></i>
					<span>Pacientes</span>
				</a>
			</li>
		</ul>
	</aside>
</div>
