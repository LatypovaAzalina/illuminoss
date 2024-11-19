-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3307
-- Время создания: Сен 16 2024 г., 16:19
-- Версия сервера: 5.7.39
-- Версия PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `il`
--

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`category_id`, `category`) VALUES
(1, 'Ужасы'),
(2, 'Драма'),
(3, 'Боевик');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `number` int(11) DEFAULT NULL,
  `count` int(11) DEFAULT NULL,
  `status` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reason` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `name` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `country` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `count` int(11) NOT NULL,
  `path` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `video` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`product_id`, `name`, `price`, `country`, `year`, `category`, `count`, `path`, `created_at`, `video`) VALUES
(3, 'Джон Уик', 40, 'Джон Уик — бывший наёмный убийца — ведёт размеренную жизнь, когда преступник крадёт его любимый Mustang 1969 года и попутно убивает собаку Дейзи, единственное живое напоминание об умершей жене. ', 'Киану Ривз, Джон Уик,\r\nИэн Макшейн,	Уинстон\r\nБилл Скарсгард\r\n', 'Ужасы', 23, 'assets/img/Rectangle1.png', '2022-02-16 06:58:58', 'assets\\img\\Джон Уик 4 — Официальный русский трейлер (4К, Дубляж, 2023).mp4'),
(5, 'Человек-паук', 5325, 'Человек-паук — герой американских комиксов Marvel Comics, обладающий сверхспособностями: силой, ловкостью, лёгкостью передвижения во всех направлениях при помощи «паутины».', 'Тоби Магуайр,\r\nУиллем Дефо,\r\nКирстен Данст,\r\nДжеймс Франко,\r\nДж. К. Симмонс', 'Боевик', 53, 'assets/img/Rectangle2.png', '2022-02-16 06:58:58', 'assets\\img\\Джон Уик 4 — Официальный русский трейлер (4К, Дубляж, 2023).mp4'),
(6, 'Солнцепек', 4043, 'Уставший от войны ветеран должен снова взяться за оружие. Драма о военном конфликте в Луганске от автора «Шугалей 2»', 'Александр Бухаров, Марина Денисова, Глеб Борисов', 'Драма', 11, 'assets/img/Rectangle3.png', '2022-02-16 06:58:58', 'assets\\img\\Джон Уик 4 — Официальный русский трейлер (4К, Дубляж, 2023).mp4'),
(7, 'Выживший', 1210, 'Отряд американцев, занятых сбором пушнины и обходом границ индейских владений, подвергается дерзкому нападению краснокожих — аборигены разыскивают украденную дочь вождя и ни с кем не намерены вести светских бесед. ', 'Леонардо ДиКаприо, Том Харди, Донал Глисон', 'Драма', 647, 'assets/img/Rectangle4.png', '2022-02-16 06:58:58', 'assets\\img\\Джон Уик 4 — Официальный русский трейлер (4К, Дубляж, 2023).mp4'),
(8, 'Гнев человеческий ', 9110, 'Нелюдимый парень с таинственным прошлым устраивается на работу инкассатором, чтобы совершить священный акт мести', 'Джейсон Стэйтем, Холт МакКэллани, Джеффри Донован', 'Боевик', 55, 'assets/img/Rectangle5.png', '2022-02-16 06:58:58', 'assets\\img\\Джон Уик 4 — Официальный русский трейлер (4К, Дубляж, 2023).mp4'),
(9, '1+1', 5320, 'Сюжет рассказывает об успешном аристократе Филиппе, который в результате несчастного случая оказывается в инвалидном кресле и берёт себе в качестве помощника чернокожего бывшего мелкого правонарушителя — Дрисса.', 'Франсуа Клюзе, Омар Си, Анн Ле Ни', 'Драма', 4, 'assets/img/Rectangle6.png', '2022-02-16 06:58:58', 'assets\\img\\Джон Уик 4 — Официальный русский трейлер (4К, Дубляж, 2023).mp4'),
(10, 'Дюна', 4564, 'Действие разворачивается в далёком будущем: юный Пол Атрейдес и его семья, благородный Дом Атрейдесов, оказываются втянутыми в войну за опасную пустынную планету Арракис между коренным народом фрименов и бывшими правителями Арракиса, Домом Харконненов.', 'Тимоти Шаламе, Ребекка Фергюсон, Оскар Айзек', 'Ужасы', 32, 'assets/img/Rectangle7.png', '2022-02-16 06:58:58', 'assets\\img\\Джон Уик 4 — Официальный русский трейлер (4К, Дубляж, 2023).mp4'),
(12, 'Гарри Поттер', 8624, 'Сирота Поттер переезжает из чулана в Хогвартс. Начало саги о волшебных приключениях мальчика-который-выжил', 'Дэниэл Рэдклифф, Руперт Гринт, Эмма Уотсон', 'Ужасы', 87, 'assets/img/Rectangle8.png', '2022-02-16 06:58:58', 'assets\\img\\Джон Уик 4 — Официальный русский трейлер (4К, Дубляж, 2023).mp4');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `patronymic` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `login` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`user_id`, `name`, `surname`, `patronymic`, `login`, `email`, `password`, `role`) VALUES
(1, 'ya', 'ya', 'ya', 'admin', '1@1', 'admin11', 'admin'),
(6, 'Азалина', 'Латыпова', 'Азатовна', 'azaza', 'azalina@mail.ru', '123456', 'client');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
