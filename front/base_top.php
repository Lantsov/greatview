<!DOCTYPE html>
<html lang="ru">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>GreatView</title>
		<base href="<?php echo $base_url ?>">
		<link href='https://fonts.googleapis.com/css?family=PT+Sans:400,700|Merriweather:400,400italic&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/style.css" rel="stylesheet">
		<link href="css/font.css" rel="stylesheet">
		<link rel="stylesheet" href="css/font-awesome.min.css">
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body class="" id="id-body">
	<div id="up"> </div>
	<div class="overlay hidden" id="overlayer" onclick="modal_hide();"> 
	</div>
		<div class="modal-login hidden" id="m-login">
			<div class="modal-login-top">
				<h1>Войти</h1>
				<form action="<?php echo $base_url ?>/back/login.php" method="POST">
					<label for="e-mail">Электронная почта</label>
					<div class="inp-place">
						<input type="email" class="input-text" placeholder="" name="email">
						<i class="fa fa-at inp-ico"></i>
					</div>
					<div class="brbr"> </div>
					<label for="password">Пароль</label>          
					<div class="login-pass-sub">
						<div class="l-pass inp-place">
							<input type="password" class="input-text" placeholder="" id="pass-login" name="pass">
							<i class="fa fa-unlock inp-icon psh" id="psh-control" onclick="psh('pass-login');"></i>
						</div>
						<div class="l-submit">
							<button type="submit" class="but-login">Войти</button>
						</div>
					</div>
				</form>
				<a href="#" class="m-forgot">Забыли пароль?</a>
				<hr class="or">
				<div class="m-social">
					<div class="soc1-3">
						<a href="#" class="soc-vk"><i class="fa fa-vk fa-fw fa-lg"></i> Вконтакте</a>
					</div>
					<div class="soc1-3">
						<a href="#" class="soc-tw"><i class="fa fa-twitter fa-fw fa-lg"></i> Twitter</a>
					</div>
					<div class="soc1-3">
						<a href="#" class="soc-fb"><i class="fa fa-facebook fa-fw fa-lg"></i> Facebook</a>
					</div>
				</div>
			</div>
			<div class="modal-login-bottom">
				До сих пор нет аккаунта?
				<a href="#up" class="but-to-reg" onclick="modal_hide();modal_show('m-reg');">Зарегистрироваться. Это бесплатно!</a>
			</div>
		</div>

		<div class="modal-reg hidden" id="m-reg">
			<div class="modal-reg-full">
				<h1>Создать аккаунт</h1>
				<form action="<?php echo $base_url ?>/back/form/reg.php">
					<div class="m-reg-mail">
						<label for="email">Электронная почта</label>
						<div class="inp-place">
							<input type="email" class="input-text" name="email">
							<i class="fa fa-at inp-ico"></i>
						</div>
						<div class="brbr"> </div>
						<div class="m-reg-nick-pass">
							<div class="m-reg-nick">
								<label for="login">Имя для отображения</label>
								<div class="inp-place">
									<input type="text" class="input-text" name="login">
									<i class="fa fa-user inp-ico"></i>
								</div>
							</div>
							<div class="m-reg-pass">
								<label for="password">Пароль</label>
								<div class="inp-place">
									<input type="text" class="input-text" name="password">
									<i class="fa fa-unlock inp-ico"></i>
								</div>
							</div>
						</div>
					</div>
					<div class="m-reg-info">
						Нажимая кнопку ниже вы подтверждаете свое согласие<br>
						c <a href="<?php echo $base_url; ?>rules/rule.php">правилами сайта</a> и <a href="<?php echo $base_url; ?>rules/privacy.php">политикой приватности</a>
					</div>
					<div class="m-reg-submit">
						<button class="but-reg" type="submit">регистрация</button>
					</div>
				</form>
				<br>
				<hr class="or">
				<div class="m-social">
					<div class="soc1-3">
						<a href="#" class="soc-vk"><i class="fa fa-vk fa-fw fa-lg"></i> Вконтакте</a>
					</div>
					<div class="soc1-3">
						<a href="#" class="soc-tw"><i class="fa fa-twitter fa-fw fa-lg"></i> Twitter</a>
					</div>
					<div class="soc1-3">
						<a href="#" class="soc-fb"><i class="fa fa-facebook fa-fw fa-lg"></i> Facebook</a>
					</div>
				</div>
			</div>
		</div>