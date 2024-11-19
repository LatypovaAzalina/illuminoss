   <!--Подключение-->
<?php
	session_start();
	include "connect.php";
	
	$role = (isset($_SESSION["role"])) ? $_SESSION["role"] : "guest";
	
	$id = (isset($_GET["id"])) ? $_GET["id"] : 0;

	$sql = "SELECT * FROM `products` WHERE `count` > 0 AND `product_id`=". $id;
	if(!$result = $connect->query($sql))
		return die ("Ошибка получения данных: ". $connect->error);

	if(!$product = $result->fetch_assoc())
		return header("Location:index.php?message=Товар отсутствует");
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Illuminos</title>
	<script src="scripts/filter.js"></script>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/pr.css">
</head>
<body>
<?php
$m = '';
	if(isset($_SESSION["role"])) {
		$m = '<li><a href="sub.php" class="underline-one"><img src="assets/img/Union.png" alt="">Корзина</a></li>
        <li><a href="" class="underline-one"><img src="assets/img/mdi_movie-open-plus.png" alt="">Избранное</a></li>';
		$m .= ($_SESSION["role"] == "admin") ? '<li><a href="admin.php" class="underline-one"><img src="assets/img/admin.png" alt="">Админ</a></li>' : '';
	} else
		$m = '
		
        <li><a href="logreg.php" class="underline-one"><img src="assets/img/mdi_account.png" alt="">Личный кабинет</a></li>
        <li><a href="cart.php" class="underline-one"><img src="assets/img/mdi_movie-open-plus.png" alt="">Избранное</a></li>
		';
		

	$m = sprintf($m);
	
?>
    <!--Начало меню-->
	<header>
    <div class="category-wrap">
        <div class="logo"><img src="assets/img/logo.png" alt=""></div>
        <ul>
            <li><a href="index.php" class="underline-one"><img src="assets/img/Vector.png" alt="">Главная</a></li>
            <li><a href="catalog.php" class="underline-one"><img src="assets/img/material-symbols_filter-list.png" alt="">Категории</a></li>
            <li><a href="sub.php" class="underline-one"><img src="assets/img/dashicons_awards.png" alt="">Тарифы</a></li>
            <li><a href="h.php" class="underline-one"><img src="assets/img/solar_graph-down-new-broken.png" alt="">История</a></li>
        </ul>
        <div class="lineproz"></div>
        <h3>Пользователю</h3>
        <ul>
            <?= $m ?>  </ul>
        <div class="lineproz"></div>
        <h3>Общие</h3>
        <ul>
            <li><a href="" class="underline-one"><img src="assets/img/streamline_interface-setting-cog-work-loading-cog-gear-settings-machine.png" alt="">Настройки</a></li>
            <li><a href="controllers/logout.php" class="underline-one"><img src="assets/img/iconoir_log-out.png" alt="">Выйти</a></li>
        </ul>
    </div>
</header>

    <!--Конец меню-->
	
	<main> <!--Основная часть-->
	<div class="kategor">
            <div class="container__kat">
			<a href="mov.php" class="m">Фильмы</a>
				<a href="sir.php" class="b">Сериалы</a>
			 </div>
			<form class="op" method="post" action="search.php">
<input class="ser" type="text" name="search" placeholder="           Поиск...">
<input class="lup" type="submit" name="submit">
</form><img src="assets/img/Ellipse 2.png" alt="" class="lich">
        </div>
		<div class="content">
			
			<div class="head"><?= $product["name"] ?></div>
			
			<div class="product wrap">
				<div class="image">
					<img src="<?= $product["path"] ?>" alt=""><div class="r">
					<video id="video" class="vi" src="<?= $product["video"] ?>" controls>
				
					</video>
			</div>
				</div>
				
				<div class="text2">
					<h3>Описание:</h3><div class="lineproz2"></div>
					<p><b><?= $product["country"] ?></b></p>
					<h2>Актеры:</h2><div class="lineproz2"></div>
					<p><b><?= $product["year"] ?></b></p>
					
					</div>
					<?php
						if($role == "admin")
							echo '
								<div class="cart__mini">
									<p><a href="update.php?id='.$product["product_id"].'" class="text-small">Редактировать</a></p>
									<p><a onclick="return confirm(\'Вы действительно хотите удалить этот товар?\')" href="controllers/delete_product.php?id='.$product["product_id"].'" class="text-small">Удалить</a></p>
								</div>
							';

						if($role != "guest")
							echo '<p class="text-right"><a href="controllers/add_cart.php?id='. $product["product_id"] .'" class="text-small"><img src="assets/img/mdi_movie-open-plus.png" alt="">В избранное</a></p>';
					?>
				</div>
		</div>

            
		<script src="scripts/v.js"></script>

        <!--Начало футера-->
		<footer>
            <div class="container__footer">
                <div class="logo"><img src="assets/img/logo-1.png" alt=""></div>
                <div class="punkt">
                    <div class="p">
                        <a href="" class="m">Фильмы</a>
                        <a href="" class="b">Сериалы</a>
                        <a href="" class="b">Анимации</a>
                    </div>
                    <div class="p">
                        <a href="" class="h">Главная</a>
                        <a href="" class="b">Избранное</a>
                        <a href="" class="b">Личный кабинет</a>
                    </div>
                </div>
                <div class="icons">
                    <img src="assets/img/telegram.png" alt="">
                    <img src="assets/img/discord.png" alt="">
                    <img src="assets/img/vk.png" alt=""></div>
            </div>
        </footer>
        <!--конец футера-->
    </main>
</body>
</html>