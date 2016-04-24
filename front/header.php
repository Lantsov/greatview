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
					<li class="pull-right umenu">
<?php if (Auth\User::isAuthorized()): ?>
<a onclick="umenu();" class="nav-user-button"><?php echo $_SESSION["user_name"] ?> <i class="fa fa-angle-down ml" aria-hidden="true"></i></a>
<ul class="nav-usermenu hidden">
	<li><a href="#"><i class="fa fa-user fa-fw"></i> Профиль</a></li>
	<li><a href="#"><i class="fa fa-cog fa-fw"></i> Настройки</a></li>
	<?php if ($_SESSION["role"] > '1'): ?>
		<li><a href="#"><i class="fa fa-cog fa-fw"></i> Панель управления</a></li>
	<?php endif; ?>
	<form class="ajax menuexit" method="post" action="<?php echo $base_url ?>/ajax.php">
          <input type="hidden" name="act" value="logout">
          <div class="form-actions menuexit">
              <button class="btn-exit" type="submit"><i class="fa fa-arrow-circle-o-right fa-fw" aria-hidden="true"></i> Выход</button>
          </div>
      </form>
</ul>
					</li>
				</ul>
<?php else: ?>
<a href="#up" class="btn-r" onclick="modal_show('m-login');">войти</a>
<?php endif; ?>
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
						<img src="<?php echo $base_url ?>/front/img/SVG/search.svg" class="svg-search"> <a href="#search">Я ищу...</a>
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