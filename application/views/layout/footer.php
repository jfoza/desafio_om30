</div>

<script src="<?php echo base_url('public/assets/js/vue/vue.js') ?>"></script>
<script src="<?php echo base_url('public/assets/js/vue/axios.min.js') ?>"></script>

<!-- General JS Scripts -->
<script src="<?php echo base_url('public/assets/js/app.min.js'); ?>"></script>
<!-- JS Libraies -->
<!-- Page Specific JS File -->
<!-- Template JS File -->
<script src="<?php echo base_url('public/assets/js/scripts.js'); ?>"></script>
<script src="<?php echo base_url('public/assets/js/util.js'); ?>"></script>
<script src="<?php echo base_url('public/assets/js/images.js'); ?>"></script>

<?php if(isset($scripts)) : ?>
	<?php foreach ($scripts as $script) : ?>
		<script src="<?php echo base_url('public/assets/' .$script); ?>"></script>
	<?php endforeach; ?>
<?php endif; ?>

<!-- Custom JS File -->
<script src="<?php echo base_url('public/assets/js/custom.js'); ?>"></script>

</body>
<!-- blank.html  21 Nov 2019 03:54:41 GMT -->
</html>

