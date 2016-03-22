<footer>
	<div class="container-fluid">
		<div class="row footer f-line1">
			<div class="col-md-2">
				<a href="<?php echo $base_url ?>">
					<img src="front/img/logo.png" alt="" class="logo-footer">
				</a>
			</div>
			<div class="col-md-8 text-center">
				<ul class="nav-footer">
					<li>
						<a href="#">link 1</a>
					</li>
					<li>
						<a href="#">link 2</a>
					</li>
					<li>
						<a href="#">link 3</a>
					</li>
					<li>
						<a href="#">link 4</a>
					</li>
				</ul>
			</div>
			<div class="col-md-2 text-right">
				<ul class="social-footer">
					<li>
						<a href="#"><i class="fa fa-vk"></i> </a>
					</li>
					<li>
						<a href="#"><i class="fa fa-facebook"></i> </a>
					</li>
					<li>
						<a href="#"><i class="fa fa-twitter"></i> </a>
					</li>
					<li>
						<a href="#"><i class="fa fa-instagram"></i> </a>
					</li>
				</ul>
			</div>
		</div>
		<div class="row footer f-line2">
			<div class="col-md-6">
				<p class="footer-p">Copyright GreatView.ru</p>
			</div>
			<div class="col-md-6 text-right">
				<ul class="footer-rules">
					<li>
						<a href="#">политика конфидициальности</a>
					</li>
					<li>
						<a href="#">правила</a>
					</li>
					<li>
						<a href="rules/denial.php">отказ от ответственности</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
</footer>
	
		<script src="js/imagesloaded.pkgd.min.js"></script>
		<script src="js/masonry.pkgd.min.js"></script>
		<script type="text/javascript">
			var grid = document.querySelector('#grid-container');
			var msnry;
			imagesLoaded( grid, function() {
				msnry = new Masonry( grid, {
					itemSelector: '.grid-item',
					columnWidth: '.col-md-3',
					percentPosition: true
				});
			});
		</script>
	</body>
</html>