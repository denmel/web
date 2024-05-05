-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Апр 22 2024 г., 14:21
-- Версия сервера: 10.4.28-MariaDB
-- Версия PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `kindergarten_attendance`
--

-- --------------------------------------------------------

--
-- Структура таблицы `day`
--

CREATE TABLE `day` (
  `id_day` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `id_kid` int(11) DEFAULT NULL,
  `presence` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `kid`
--

CREATE TABLE `kid` (
  `id_kid` int(11) NOT NULL,
  `fio` varchar(100) DEFAULT NULL,
  `id_kidgroup` int(11) DEFAULT NULL,
  `id_parent` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `kid`
--

INSERT INTO `kid` (`id_kid`, `fio`, `id_kidgroup`, `id_parent`) VALUES
(1, 'Абдрашитов Азамат Азаматович', 1, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `kidgroup`
--

CREATE TABLE `kidgroup` (
  `id_kidgroup` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `role`
--

CREATE TABLE `role` (
  `id_role` int(11) NOT NULL,
  `name` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `teacher_kidgroup`
--

CREATE TABLE `teacher_kidgroup` (
  `id_teacher` int(11) NOT NULL,
  `id_kidgroup` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `login` varchar(50) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `fio` varchar(100) NOT NULL,
  `id_role` int(11) DEFAULT NULL,
  `id_kidgroup` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id_user`, `login`, `password`, `fio`, `id_role`, `id_kidgroup`) VALUES
(1, 'Azamat', 'Azamat', 'Абрашитов Азамат Русланович', 1, 1),
(2, 'Ivan', 'Ivan', 'Денисов Иван Александрович', 1, 1),
(3, 'Ivan', 'Ivan', 'Денисов Иван Александрович', 1, 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `day`
--
ALTER TABLE `day`
  ADD PRIMARY KEY (`id_day`);

--
-- Индексы таблицы `kid`
--
ALTER TABLE `kid`
  ADD PRIMARY KEY (`id_kid`);

--
-- Индексы таблицы `kidgroup`
--
ALTER TABLE `kidgroup`
  ADD PRIMARY KEY (`id_kidgroup`);

--
-- Индексы таблицы `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Индексы таблицы `teacher_kidgroup`
--
ALTER TABLE `teacher_kidgroup`
  ADD PRIMARY KEY (`id_teacher`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `day`
--
ALTER TABLE `day`
  MODIFY `id_day` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `kid`
--
ALTER TABLE `kid`
  MODIFY `id_kid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `kidgroup`
--
ALTER TABLE `kidgroup`
  MODIFY `id_kidgroup` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `teacher_kidgroup`
--
ALTER TABLE `teacher_kidgroup`
  MODIFY `id_teacher` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
