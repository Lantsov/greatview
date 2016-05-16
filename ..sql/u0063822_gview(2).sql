-- phpMyAdmin SQL Dump
-- version 4.2.7
-- http://www.phpmyadmin.net
--
-- Хост: localhost:3306
-- Время создания: Май 04 2016 г., 12:52
-- Версия сервера: 5.5.41-log
-- Версия PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `u0063822_gview`
--

-- --------------------------------------------------------

--
-- Структура таблицы `place`
--

CREATE TABLE IF NOT EXISTS `place` (
`id` mediumint(9) NOT NULL,
  `location` char(14) NOT NULL COMMENT 'координаты',
  `type` tinyint(4) NOT NULL COMMENT 'тип места',
  `user_id` int(11) NOT NULL,
  `short_text` text NOT NULL COMMENT 'короткое описание',
  `about` text NOT NULL COMMENT 'полное описание',
  `preview` tinytext COMMENT 'путь к каринке предпосмотра',
  `style` tinyint(4) NOT NULL DEFAULT '1' COMMENT 'стиль отображения на главной',
  `poll` int(11) NOT NULL DEFAULT '0' COMMENT 'кол-во лайков',
  `visits` int(11) NOT NULL DEFAULT '0' COMMENT 'кол-во посещений',
  `comments` int(11) NOT NULL DEFAULT '0',
  `active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `place`
--

INSERT INTO `place` (`id`, `location`, `type`, `user_id`, `short_text`, `about`, `preview`, `style`, `poll`, `visits`, `comments`, `active`) VALUES
(1, '37.52,55.40', 1, 1, 'Живописное тихое место для небольшой компании в пригороде Подольска', 'Живописное тихое место для небольшой компании в пригороде Подольска', 'content/img/u00001/-2ylrnZbVYQ.jpg', 1, 0, 0, 0, 1),
(2, '39.52,54.40', 1, 1, 'Второе место', 'Второе место', NULL, 1, 0, 0, 0, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `place_poll`
--

CREATE TABLE IF NOT EXISTS `place_poll` (
`id` mediumint(9) NOT NULL,
  `user_id` mediumint(9) NOT NULL,
  `place_id` mediumint(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `place_type`
--

CREATE TABLE IF NOT EXISTS `place_type` (
`id` mediumint(9) NOT NULL,
  `url` tinytext NOT NULL,
  `full` text NOT NULL,
  `about` int(11) DEFAULT NULL,
  `color` char(6) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `place_type`
--

INSERT INTO `place_type` (`id`, `url`, `full`, `about`, `color`) VALUES
(1, 'picnic', 'пикник', NULL, '43d29e');

-- --------------------------------------------------------

--
-- Структура таблицы `place_visit`
--

CREATE TABLE IF NOT EXISTS `place_visit` (
`id` mediumint(9) NOT NULL,
  `user_id` mediumint(9) NOT NULL,
  `place_id` mediumint(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `sity`
--

CREATE TABLE IF NOT EXISTS `sity` (
`id` mediumint(9) NOT NULL,
  `url` tinytext NOT NULL COMMENT 'название на латинице',
  `name` text NOT NULL COMMENT 'название',
  `location` tinytext NOT NULL COMMENT 'координаты'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `sity`
--

INSERT INTO `sity` (`id`, `url`, `name`, `location`) VALUES
(1, 'podolsk', 'Подольск', '37.54,55.43');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` mediumint(9) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(100) NOT NULL,
  `name` text,
  `role` varchar(1) NOT NULL DEFAULT '1',
  `sex` varchar(1) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `salt`, `name`, `role`, `sex`) VALUES
(1, 'admin@greatview.ru', 'e1391195179f37eff8541fb4f8fb0097', '571a123e63db7', 'Главный администратор', '4', NULL),
(2, 'text@greatview.ru', 'dd3d5f7640ea4cac5d8f07e5eb1cea85', '571b3d5e08132', 'Test User', '1', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `place`
--
ALTER TABLE `place`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `place_poll`
--
ALTER TABLE `place_poll`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `place_type`
--
ALTER TABLE `place_type`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `place_visit`
--
ALTER TABLE `place_visit`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sity`
--
ALTER TABLE `sity`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `place`
--
ALTER TABLE `place`
MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `place_poll`
--
ALTER TABLE `place_poll`
MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `place_type`
--
ALTER TABLE `place_type`
MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `place_visit`
--
ALTER TABLE `place_visit`
MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sity`
--
ALTER TABLE `sity`
MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
