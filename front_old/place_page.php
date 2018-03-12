<div class="container-fluid place-page-cont">
	<div class="row">
<script type="text/javascript">
	  ymaps.ready(init);
		var myMap,
				myPlacemark;
		function init(){     
				myMap = new ymaps.Map("map", {
						center: [55.40, 37.52],
						zoom: 14,
						controls: ['zoomControl', 'typeSelector']
				});
				myMap.setType('yandex#hybrid');
				myPlacemark = new ymaps.Placemark([55.40, 37.52], { 
						hintContent: 'Москва!'
				});
				myMap.geoObjects.add(myPlacemark);
		}
</script>
		<div class="col-md-12 plpg-map" id="map"></div>
	</div>
	<div class="row plpg-text">
		<div class="col-md-7">
			<h4>Описание</h4>
			<p>
				<?php echo $place->about; ?>
			</p>
			<? if ($place->howtogo) {
				echo "<h4>Как добраться</h4><p>".$place->howtogo."</p>";
			}; ?>
		</div>
		<div class="col-md-5">
			<?php
				if ($place->photo){
					echo '<ul class="plpg-gal" id="topic-photo-images">';
					foreach ($place->photo as $photo) {
						echo '<li><a href="';
						echo $base_url.'/'.$photo;
						echo '" data-imagelightbox="f" title="'.$place->short.'" alt=""><div class="plpg-imggal" style="background-image: url(\'';
						echo $base_url.'/'.$photo;
						echo '\');"></div></a></li>';
					};
					echo "</ul>";
				};
			?>
		</div>
	</div>
	<?php if (!Auth\User::isAuthorized()): ?>
	<div class="row plpg-text">
		<div class="col-md-12 extra-welcome">
			<div class="welcome">
				<div class="welcome-left">
					<div class="wel-fol">
						<h1>Присоединяйтесь</h1>
						Делитесь и выбирайте лучшие места
					</div>
				</div>
				<div class="welcome-right">
					<a href="#up" class="but" onclick="modal_show('m-reg');">Зарегистрироваться</a>
					<a href="#up" class="but-ghost" onclick="modal_show('m-login');">Войти</a>
				</div>
			</div>
		</div>
	</div>
	<?php else: ?>
	<div class="row plpg-text">
		<div class="col-md-12 extra-welcome">
			<div class="welcome">
				<div class="welcome-left">
					<div class="wel-fol">
						<h1>Делитесь</h1>
						Поделитесь этим местом с друзьями или сразу пригласите туда
					</div>
				</div>
				<div class="welcome-right">
					<a href="#up" class="but">Вконтакте</a>
					<a href="#up" class="but">Fasebook</a>
				</div>
			</div>
		</div>
	</div>
	<?php endif; ?>
	<div class="row plpg-text">
		<div class="col-md-7">
			<?php
				if ($place->take) {
					echo '<h4>Рекомендуют взять с собой</h4><ul class="needwith">';
					foreach ($place->take as $take) {
						echo "<li>".$take."</li>";
					};
					echo "</ul>";
				};
			?>
		</div>
		<div class="col-md-3">
			<div class="plpg-visit">
				<div class="pvisit-top">
					Посетили это место
					<span class="pull-right"><?php echo $place->visits; ?></span>
				</div>
				<div class="pvisit">
					<ul>
						<?php
							if ($place->visits > '0') {
								foreach ($visit->user->id as $key => $uid) {
									echo "<li><a href=\"".$base_url.'/users/'.$uid."\"><div title=\"".$visit->user->name[$key]."\" style=\"background-image: url('".$visit->user->avatar[$key]."');\"></div></a></li>";
								}
							} else {
								echo "Это место пока никто не посетил";
							}
						?>
					</ul>
				</div>
				<div class="pvisit-bottom">
					<form method="post" action="<?php echo $place_id; ?>">
						<input type="hidden" name="visit-place" value="<?php echo $place_id; ?>">
						<input type="hidden" name="visit-user" value="<?php echo $_SESSION["user_id"]; ?>">
						<input type="hidden" name="visit-num" value="<?php echo $place->visits; ?>">
						<input type="hidden" name="do" value="addvisit">
						<button class="but" type="submit" <?php if (!Auth\User::isAuthorized() or $iwashere['place_id']) {echo 'disabled="disabled" title="Необходимо авторизоваться!"';} ?>><?php if ($iwashere['place_id']) {echo '<i class="fa fa-check" aria-hidden="true"></i> ';} ?>Я тут был</button>
					</form>
				</div>
			</div>
		</div>
	</div>
	<div class="row plpg-text">
		<div class="col-md-12 plpg-foot-1">
			<?php 
				foreach ($place->type as $type) {
					echo '<span class="badge" style="background-color: #'.$place_type[$type]['color'].'"><a href="'.$base_url.'/category/'.$place_type[$type]['url'].'">'.$place_type[$type]['full'].'</a></span>';
				};
			 ?>
			<div class="pull-right">
				<form action="">
					<button class="but-ghost-white"><i class="fa fa-heart"></i> Нравится</button>
				</form>
			</div>
		</div>
		<div class="col-md-12 plpg-foot-2">
			1
		</div>
	</div>
</div>