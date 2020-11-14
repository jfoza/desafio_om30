<div class="main-sidebar sidebar-style-2">
	<aside id="sidebar-wrapper">
		<div class="sidebar-brand">
			<a href="<?php echo base_url(''); ?>">
				<span class="logo-name">Título</span>
			</a>
		</div>
		<ul class="sidebar-menu">

			<li class="dropdown <?php echo ($this->router->fetch_class() == 'home') && ($this->router->fetch_method() == 'index') ? 'active' : ''; ?>">
				<a href="<?php echo base_url('home'); ?>"
				   class="nav-link">
					<i class="fas fa-home"></i>
					<span>Home</span>
				</a>
			</li>

			<li class="dropdown <?php echo ($this->router->fetch_class() == 'pacientes') && ($this->router->fetch_method() == 'index') ? 'active' : ''; ?>">
				<a href="<?php echo base_url('pacientes'); ?>"
				   class="nav-link">
                    <i class="fas fa-user"></i>
					<span>Usuários</span>
				</a>
			</li>

		</ul>
	</aside>
</div>
