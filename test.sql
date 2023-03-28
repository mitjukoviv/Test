-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Мар 28 2023 г., 03:33
-- Версия сервера: 10.10.3-MariaDB
-- Версия PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `test`
--

-- --------------------------------------------------------

--
-- Структура таблицы `discipline`
--

CREATE TABLE `discipline` (
  `id` int(11) NOT NULL,
  `program_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `knowledge` text NOT NULL,
  `ability` text NOT NULL,
  `skill` text NOT NULL,
  `deleted` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `discipline`
--

INSERT INTO `discipline` (`id`, `program_id`, `name`, `knowledge`, `ability`, `skill`, `deleted`) VALUES
(1, 1, 'Природоведение', 'Знает основные виды трав, растений, животных региона\n', 'Умеет определять виды на основе признаков\n', 'Владеет методами классификации на основе таксономических справочников', 0),
(2, 1, 'Родная литература', 'Знает писателей и поэтов серебряного века', 'Умеет вдумчиво читать и оценивать произведения, может пересказать прочитанное\n', 'Владеет связанной литературной речью', 0),
(3, 2, 'Сопротивление материалов', 'Знает основные виды деформаций в конструкциях\n', 'Умеет выполнять расчеты прочностных характеристик объектов простых форм\n', 'Владеет методами расчета полей внутреннего напряжения объектов', 0),
(4, 2, 'НЛОведение', 'Знает основные типы летальных аппаратов', 'Умеет определять аппараты по морфологическим признакам и динамическим характеристикам полета\n', 'Владеет методами классификации известных и методами описания неизвестных летальных аппаратов', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `edits`
--

CREATE TABLE `edits` (
  `id` int(11) NOT NULL,
  `discipline_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `knowledge` text NOT NULL,
  `ability` text NOT NULL,
  `skill` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `program`
--

CREATE TABLE `program` (
  `id` int(11) NOT NULL,
  `code` text NOT NULL,
  `name` text NOT NULL,
  `deleted` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `program`
--

INSERT INTO `program` (`id`, `code`, `name`, `deleted`) VALUES
(1, '01.02.03', 'Эффективное природопользование', 0),
(2, '04.01.24', 'Построение БПЛА неземного типа', 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `discipline`
--
ALTER TABLE `discipline`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `edits`
--
ALTER TABLE `edits`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `program`
--
ALTER TABLE `program`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `discipline`
--
ALTER TABLE `discipline`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `edits`
--
ALTER TABLE `edits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `program`
--
ALTER TABLE `program`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
