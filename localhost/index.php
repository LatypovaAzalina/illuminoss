    <!--Подключение-->
<?php session_start();
if (isset($_SESSION['history'])) {
    echo 'Вы пришли с '.end($_SESSION['history']);
}
$_SESSION['history'][] = $_SERVER['REQUEST_URI'];?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Illuminos</title>

    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<?php
session_start();
include "connect.php";
$sql = "SELECT * FROM `products` WHERE `count` > 0 ORDER BY `created_at` DESC LIMIT 5";
if(!$result = $connect->query($sql))
    return die ("Ошибка получения данных: ". $connect->error);include "header.php";
	
?>
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
</form> 
            <img src="assets/img/Ellipse 2.png" alt="" class="lich">
        </div>

        <div class="banner">

            <input type="checkbox" name="img">

            <div class="cart">
                <div class="photo__cart"><img src="assets/img/Rectangle7.png" alt=""></div>
            </div>

        </div>

        <div class="new__movies">

            <div class="zag__nm">Новые фильмы</div>

            <div class="cont__movie">
                <div class="cart">
                    <div class="photo__cart">
                        <img src="assets/img/Rectangle1.png" alt="">
                        <div class="text">
                            <div class="nazvanie">Джон Уик</div>
                            <div class="h__f">
                                <div class="time">2ч 12м</div>
                                <div class="rating">7.1</div>
                                <div class="filt">Ужасы</div>
                            </div>
                        </div>
                        <button class="btn">+</button>
                    </div>
                </div>

                <div class="cart">
                    <div class="photo__cart">
                        <img src="assets/img/Rectangle2.png" alt="">
                        <div class="text">
                            <div class="nazvanie">Человек-паук</div>
                            <div class="h__f">
                                <div class="time">1ч 46м</div>
                                <div class="rating">7.1</div>
                                <div class="filt">Боевик</div>
                            </div>
                        </div>
                        <button class="btn">+</button>
                    </div>
                </div>

                <div class="cart">
                    <div class="photo__cart">
                        <img src="assets/img/Rectangle3.png" alt="">

                        <div class="text">
                            <div class="nazvanie">Солнцепек</div>
                            <div class="h__f">
                                <div class="time">1ч 34м</div>
                                <div class="rating">7.1</div>
                                <div class="filt">Драма</div>
                            </div>
                        </div>
                        <button class="btn">+</button>
                    </div>
                </div>
                
                <div class="cart">
                    <div class="photo__cart">
                        <img src="assets/img/Rectangle4.png" alt="">

                        <div class="text">
                            <div class="nazvanie">Выживший </div>
                            <div class="h__f">
                                <div class="time">2ч 36м</div>
                                <div class="rating">7.1</div>
                                <div class="filt">Драма</div>
                            </div>
                        </div>
                        <button class="btn">+</button>
                    </div>
                </div>
            </div>

        </div>

        <div class="new__movies">

            <div class="zag__nm">Рекомендации</div>

            <div class="cont__movie">
                <div class="cart">
                    <div class="photo__cart">
                        <img src="assets/img/Rectangle5.png" alt="">

                        <div class="text">
                            <div class="nazvanie">Гнев человеческий</div>
                            <div class="h__f">
                                <div class="time">1ч 16м</div>
                                <div class="rating">7.1</div>
                                <div class="filt">Боевик</div>
                            </div>
                        </div>
                        <button class="btn">+</button>
                    </div>
                </div>
                <div class="cart">
                    <div class="photo__cart">
                        <img src="assets/img/Rectangle6.png" alt="">

                        <div class="text">
                            <div class="nazvanie">1+1</div>
                            <div class="h__f">
                                <div class="time">2ч 12м</div>
                                <div class="rating">7.1</div>
                                <div class="filt">Драма</div>
                            </div>
                        </div>
                        <button class="btn">+</button>
                    </div>
                </div>
                <div class="cart">
                    <div class="photo__cart">
                        <img src="assets/img/Rectangle8.png" alt="">

                        <div class="text">
                            <div class="nazvanie">Дюна</div>
                            <div class="h__f">
                                <div class="time">2ч 15м</div>
                                <div class="rating">7.1</div>
                                <div class="filt">Ужасы</div>
                            </div>
                        </div>
                        <button class="btn">+</button>
                    </div>
                </div>
                <div class="cart">
                    <div class="photo__cart">
                        <img src="assets/img/Rectangle9.png" alt="">

                        <div class="text">
                            <div class="nazvanie">Гарри Поттер</div>
                            <div class="h__f">
                                <div class="time">2ч 35м</div>
                                <div class="rating">7.1</div>
                                <div class="filt">Ужасы</div>
                            </div>
                        </div>
                        <button class="btn">+</button>
                    </div>
                </div>
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
        <!--конец футера-->
    </main>

</body>

</html>