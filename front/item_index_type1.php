		<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 grid-item">
			<div class="card card-type1">
				<div class="card-img-top">
					<?php
					if ($row['preview']) {
						echo '<img src="';
						echo $base_url.'/'.$row['preview'];
						echo '" class="card-img-top-img">';
					} else {
						echo '<img src="';
						echo 'https://static-maps.yandex.ru/1.x/?ll='.$row['location'].'&z=14&l=sat&pt='.$row['location'].',round';
						echo '" class="card-img-top-img">';
					}
					?>
					<span class="card-t1-cat">
						<i class="fa fa-circle img-cat" title="<?php echo $place_type[$row['type']]['about']; ?>" style="color: #<?php echo $place_type[$row['type']]['color']; ?>"></i><a href="<?php echo $base_url.'/type/'.$place_type[$row['type']]['url']; ?>"> <?php echo $place_type[$row['type']]['full']; ?></a>
					</span>
				</div>
				<div class="card-body">
					<h2 class="card-t1-h2">
						<a href="<?php echo $base_url.'/place/'.$row['id']; ?>"><?php echo $row['short_text'] ?></a>
					</h2>
				</div>
				<div class="card-t1-footer">
					<a href="#">
						<i class="fa fa-heart"></i> <?php echo $row['poll'] ?>
					</a>
					<i class="tab"> </i>
					<a href="#">
						<i class="fa fa-commenting"></i> <?php echo $row['comments'] ?>
					</a>
					<i class="tab"> </i>
					<a href="#">
						<i class="fa fa-street-view"></i> <?php echo $row['visits'] ?> 
					</a>
					<i class="tab"> </i>
					<a href="#" class="pull-right">
						<i class="fa fa-hashtag"></i>gv<?php echo str_pad($row['id'], 5, '0', STR_PAD_LEFT); ?>
					</a>
				</div>
			</div>
		</div>