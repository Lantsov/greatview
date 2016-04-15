<div class="container-fluid">
	<div class="row">
		<nav>
			<div class="col-md-12 nav-main">
				<ul class="nav nav-top">
					<li class="nav-logo">
						<a href="<?php echo $base_url ?>">
							<img src="<?php echo $base_url ?>/front/img/logo_v.3.png" alt="" class="nav-logo-img">
						</a>
					</li>
					<li>
						<a href="<?php echo $base_url; ?>">Места</a>
					</li>
					<li>
						<a href="<?php echo $base_url; ?>/articles">Статьи</a>
					</li>
					<?php /*<li>
						<a>Промо <sup>скоро</sup></a>
					</li>
					<li>
						<a href="#">Link 4</a>
					</li> */ ?>
					<li class="pull-right">
<?php if (!$isSign) {
echo <<<END
<a href="#up" class="btn-r" onclick="modal_show('m-login');">войти</a>
END;
}else{
echo <<<END
<a href="#up" class="" >
END;
echo $userName;
echo "</a>";
}; ?>
					</li>
				</ul>
			</div>
			<div class="col-md-12 nav-sub">
				<ul class="nav nav-mid">
					<li>
						<a href="<?php echo $base_url; ?>/top">top</a>
					</li>
					<li>
						<a href="<?php echo $base_url; ?>/near">рядом</a>
					</li>
					<li <?php if ($page_id == 'index') {echo 'class="active"';}; ?>>
						<a href="<?php echo $base_url; ?>">новые</a>
					</li>
					<li>
						<a href="<?php echo $base_url; ?>/recommend">рекомендуем</a>
					</li>
					<li class="pull-right">
						<img src="front/img/SVG/search.svg" class="svg-search"> <a href="#search">Я ищу...</a>
					</li>
					<li class="fence pull-right">&nbsp;</li>
					<li class="pull-right">
						<a href="#">правила</a>
					</li>
				</ul>
			</div>
		</nav>
	</div>
</div>