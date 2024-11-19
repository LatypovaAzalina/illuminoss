<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Illuminos</title>
	<link rel="stylesheet" href="assets/css/stylecat.css">
    <link rel="stylesheet" href="assets/css/style.css">
	<script src="scripts/filter.js"></script>
</head>
<body>
   <!--Подключение-->
<?php
$m = '';
	if(isset($_SESSION["role"])) {
		$m = '<li><a href="sub.php" class="underline-one"><img src="assets/img/Union.png" alt="">Корзина</a></li>
        <li><a href="" class="underline-one"><img src="assets/img/mdi_movie-open-plus.png" alt="">Избранное</a></li>';
		$m .= ($_SESSION["role"] == "admin") ? '<li><a href="admin.php" class="underline-one">Покупки</a></li>' : '';
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
        <h3>Menu</h3>
        <ul>
            <li><a href="index.php" class="underline-one"><img src="assets/img/Vector.png" alt="">Главная</a></li>
            <li><a href="catalog.php" class="underline-one"><img src="assets/img/material-symbols_filter-list.png" alt="">Категории</a></li>
            <li><a href="sub.php" class="underline-one"><img src="assets/img/dashicons_awards.png" alt="">Тарифы</a></li>
            <li><a href="" class="underline-one"><img src="assets/img/solar_graph-down-new-broken.png" alt="">История</a></li>
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
						<a href="mult.php" class="b">Анимации</a>  </div>
			<form class="op" method="post" action="search.php">
<input class="ser" type="text" name="search" placeholder="           Поиск...">
<input class="lup" type="submit" name="submit">
</form>
            <img src="assets/img/Ellipse 2.png" alt="" class="lich">
        </div>
		
	<?php
	session_start();
	include "connect.php";
	include "header.php";
	$role = (isset($_SESSION["role"])) ? $_SESSION["role"] : "guest";

	$sql = "SELECT * FROM `categories`";
	$result = $connect->query($sql);
	$categories = "";
	while($row = $result->fetch_assoc())
		$categories .= sprintf('<option value="%s">%s</option>', $row["category"], $row["category"]);

	$sql = "SELECT * FROM `products` WHERE `count` > 0 ORDER BY `created_at` DESC";
	if(!$result = $connect->query($sql))
		return die ("Ошибка получения данных: ". $connect->error);

	$data = "";
	while($row = $result->fetch_assoc())
		$data .= sprintf('
	<div class="col">
							<div class="cart">
			<div class="photo__cart">
<img src="%s" alt="">

			<div class="text">
					<div class="nazvanie"><h3><a href="product.php?id=%s" style="color: white; text-decoration: none;">%s</a></h3></div>
					<div class="h__f">
						<div class="time">2ч 12м</div>
						<div class="rating">7.2</div>
						<div class="filt">Ужасы</div>
					</div>
				    </div>
				<button class="btn">+</button>
			</div>
				
		    </div>
				<div class="cart__mini">
					<p>%s$</p>
					<input type="hidden" value="%s" name="product_id">
					<input type="hidden" value="%s" name="year">
					<input type="hidden" value="%s" name="category">
		        </div>
				%s
				%s
	</div>	
	
		', $row["path"], $row["product_id"], $row["name"], $row["price"],  $row["product_id"],$row["year"],$row["category"],  
		($role == "admin") ? '
			<div class="cart__mini">
				<p><a href="update.php?id='.$row["product_id"].'" class="text-small">Редактировать</a></p>
				<p><a onclick="return confirm(\'Вы действительно хотите удалить этот товар?\')" href="controllers/delete_product.php?id='.$row["product_id"].'" class="text-small">Удалить</a></p>
			</div>' : '',
		($role != "guest") ? '<p class="text-right"><a href="controllers/add_cart.php?id='. $row["product_id"] .'" class="text-small">В избранное</a></p>' : '');

	if($data == "")
		$data = '<h3 class="text-center">Товары отсутствуют</h3>';
?>
<div class="content">
		
			<p>
				<span id="year" onclick="filter.filter('all')">Все</span>
			</p>
			<select id="category" onchange="filter.filter('category', 'filter')">
					<option value disabled selected>Фильтрация по категориям</option>
					<?= $categories ?>
				</select>
		</div>

		<div class="cont__movie2" id="products">
			<?= $data ?>
		</div>
</div>
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
		<!--конец футера--><script>filter.products()</script>
	</main>
	


</body>

</html>