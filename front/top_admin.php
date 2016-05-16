<div class="fixed dev-menu">
	<ul>
		<li>
			<i class="fa fa-power-off <?php if ($site_on) {
				echo 'online" aria-hidden="true"></i> Online';
			} else {
				echo 'offline" aria-hidden="true"></i> Offline';
			}; ?>
		</li>
		<li>
			<a href="<?php echo $base_url; ?>/back/control">Админ панель</a>
		</li>
		<li>
			<a href="#">Пользователи</a>
		</li>
	</ul>
</div>