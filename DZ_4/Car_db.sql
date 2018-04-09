-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 09 2018 г., 21:06
-- Версия сервера: 5.6.37
-- Версия PHP: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `Car_db`
--

-- --------------------------------------------------------

--
-- Структура таблицы `ActPP`
--

CREATE TABLE `ActPP` (
  `id` int(10) UNSIGNED NOT NULL,
  `idRcontract` int(11) UNSIGNED NOT NULL,
  `dateAct` date NOT NULL,
  `idFineTime` int(10) UNSIGNED NOT NULL,
  `sumFinesGibdd` int(11) NOT NULL,
  `sumFines` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `ActPP`
--

INSERT INTO `ActPP` (`id`, `idRcontract`, `dateAct`, `idFineTime`, `sumFinesGibdd`, `sumFines`) VALUES
(3, 1, '2018-04-03', 1, 122, 4122);

-- --------------------------------------------------------

--
-- Структура таблицы `AdditionalOption`
--

CREATE TABLE `AdditionalOption` (
  `id` int(10) UNSIGNED NOT NULL,
  `idModel` int(10) UNSIGNED NOT NULL,
  `nameOptions` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `AdditionalOption`
--

INSERT INTO `AdditionalOption` (`id`, `idModel`, `nameOptions`, `price`, `image`, `description`) VALUES
(1, 1, 'Детское кресло', 200, NULL, 'Детское кресло - отличное решение для тех, у кого есть дети'),
(2, 1, 'Дополнительный водитель', 500, NULL, 'Дополнительный водитель - отличное решение для тех, кому лень водить самому');

-- --------------------------------------------------------

--
-- Структура таблицы `auto`
--

CREATE TABLE `auto` (
  `id` int(10) UNSIGNED NOT NULL,
  `idModel` int(11) UNSIGNED NOT NULL,
  `stateNumber` varchar(20) NOT NULL,
  `status` set('арендована','свободна') NOT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `auto`
--

INSERT INTO `auto` (`id`, `idModel`, `stateNumber`, `status`, `description`) VALUES
(1, 1, '1', 'свободна', '1');

-- --------------------------------------------------------

--
-- Структура таблицы `BodyAuto`
--

CREATE TABLE `BodyAuto` (
  `id` int(10) UNSIGNED NOT NULL,
  `typeBodyAuto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `BodyAuto`
--

INSERT INTO `BodyAuto` (`id`, `typeBodyAuto`) VALUES
(1, 'седан'),
(2, 'xэтчбек'),
(3, 'универсал'),
(4, 'лифтбэк');

-- --------------------------------------------------------

--
-- Структура таблицы `BrandAuto`
--

CREATE TABLE `BrandAuto` (
  `id` int(10) UNSIGNED NOT NULL,
  `nameBrend` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `BrandAuto`
--

INSERT INTO `BrandAuto` (`id`, `nameBrend`) VALUES
(1, 'mmm');

-- --------------------------------------------------------

--
-- Структура таблицы `client`
--

CREATE TABLE `client` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `patronymic` varchar(255) NOT NULL,
  `numberDriverLicense` int(11) NOT NULL,
  `dateDriverLicense` date NOT NULL,
  `phoneNumber` int(11) NOT NULL,
  `passportID` int(11) NOT NULL,
  `passportSeries` int(11) NOT NULL,
  `passportIssuedBy` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `regAddress` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `client`
--

INSERT INTO `client` (`id`, `name`, `surname`, `patronymic`, `numberDriverLicense`, `dateDriverLicense`, `phoneNumber`, `passportID`, `passportSeries`, `passportIssuedBy`, `dob`, `regAddress`) VALUES
(1, 'Иван', 'Иванов', 'Иванович', 12345, '2018-04-01', 890098765, 3435, 353543, '343453', '2018-04-01', '35345');

-- --------------------------------------------------------

--
-- Структура таблицы `deposit`
--

CREATE TABLE `deposit` (
  `id` int(10) UNSIGNED NOT NULL,
  `priceDeposit` int(11) NOT NULL,
  `idModel` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `deposit`
--

INSERT INTO `deposit` (`id`, `priceDeposit`, `idModel`) VALUES
(1, 5000, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `discount`
--

CREATE TABLE `discount` (
  `id` int(10) UNSIGNED NOT NULL,
  `idModel` int(10) UNSIGNED NOT NULL,
  `percent` int(11) NOT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `discount`
--

INSERT INTO `discount` (`id`, `idModel`, `percent`, `description`) VALUES
(1, 1, 5, 'lj');

-- --------------------------------------------------------

--
-- Структура таблицы `ImageAuto`
--

CREATE TABLE `ImageAuto` (
  `id` int(10) UNSIGNED NOT NULL,
  `idAuto` int(10) UNSIGNED NOT NULL,
  `imgAuto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Структура таблицы `InsuranceAuto`
--

CREATE TABLE `InsuranceAuto` (
  `id` int(10) UNSIGNED NOT NULL,
  `numberInsPolicy` int(11) NOT NULL,
  `dateInsEnd` date NOT NULL,
  `dateToEnd` date NOT NULL,
  `idAuto` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `InsuranceAuto`
--

INSERT INTO `InsuranceAuto` (`id`, `numberInsPolicy`, `dateInsEnd`, `dateToEnd`, `idAuto`) VALUES
(1, 2445, '2018-04-15', '2018-04-15', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `ModelAuto`
--

CREATE TABLE `ModelAuto` (
  `id` int(10) UNSIGNED NOT NULL,
  `idBodyAuto` int(11) UNSIGNED NOT NULL,
  `idBrend` int(11) UNSIGNED NOT NULL,
  `idTransmission` int(11) UNSIGNED NOT NULL,
  `nameModel` varchar(255) NOT NULL,
  `price` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `ModelAuto`
--

INSERT INTO `ModelAuto` (`id`, `idBodyAuto`, `idBrend`, `idTransmission`, `nameModel`, `price`) VALUES
(1, 1, 1, 1, 'mmmmmk', 2000),
(2, 1, 1, 1, 'khjguy', 7000),
(3, 2, 1, 1, 'hgfgfghf', 6000),
(4, 2, 1, 1, 'оролрпп', 7000),
(5, 3, 1, 1, 'праапа', 7600);

-- --------------------------------------------------------

--
-- Структура таблицы `pages`
--

CREATE TABLE `pages` (
  `id` int(10) UNSIGNED NOT NULL,
  `pageTitle` varchar(255) NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `pages`
--

INSERT INTO `pages` (`id`, `pageTitle`, `text`) VALUES
(1, 'Проба 9', 'Проба 2'),
(2, 'Проба 2', 'Проба 2'),
(3, 'Проба 2', 'Проба 2'),
(4, 'Проба 2', 'Проба 2'),
(5, 'Проба 2', 'Проба 2'),
(6, 'Проба 2', 'Проба 2'),
(7, 'Проба 2', 'Проба 2'),
(8, 'Проба 2', 'Проба 2'),
(9, 'Проба 2', 'Проба 2'),
(10, 'Array', 'Array'),
(11, 'Проба 2', 'Проба 2'),
(12, 'Проба 3', 'Проба 3'),
(13, 'Проба 3', 'Проба 3'),
(14, 'Проба 3', 'Проба 3');

-- --------------------------------------------------------

--
-- Структура таблицы `RentalContract`
--

CREATE TABLE `RentalContract` (
  `id` int(10) UNSIGNED NOT NULL,
  `idClient` int(10) UNSIGNED NOT NULL,
  `idAuto` int(10) UNSIGNED NOT NULL,
  `conclusionDate` date NOT NULL,
  `receiptAutoDate` date NOT NULL,
  `receiptAutoTime` time NOT NULL,
  `placeReceipt` varchar(255) NOT NULL,
  `returnDate` date NOT NULL,
  `returnTime` time NOT NULL,
  `placeReturn` varchar(255) NOT NULL,
  `summ` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `RentalContract`
--

INSERT INTO `RentalContract` (`id`, `idClient`, `idAuto`, `conclusionDate`, `receiptAutoDate`, `receiptAutoTime`, `placeReceipt`, `returnDate`, `returnTime`, `placeReturn`, `summ`) VALUES
(1, 1, 1, '2018-04-01', '2018-04-01', '02:00:00', 'Ул Твардовского', '2018-04-05', '08:00:00', 'Ул Твардовского', 13265),
(3, 1, 1, '2018-04-09', '2018-04-10', '13:00:00', 'jhjh', '2018-11-08', '08:00:00', 'hvhjg', 407800);

-- --------------------------------------------------------

--
-- Структура таблицы `reviews`
--

CREATE TABLE `reviews` (
  `id` int(10) UNSIGNED NOT NULL,
  `userName` varchar(255) NOT NULL,
  `titleReviews` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `reviews`
--

INSERT INTO `reviews` (`id`, `userName`, `titleReviews`, `text`, `date`, `time`, `email`) VALUES
(1, 'Проба 80', '2', '8', '0000-00-00', '00:00:02', '2'),
(2, 'Проба 6', 'Проба 3', 'Проба 3', '1999-11-11', '00:00:03', 'fdgkjj@jdkjfh.com'),
(3, 'Проба 6', 'Проба 3', 'Проба 3', '1999-11-11', '00:00:03', 'fdgkjj@jdkjfh.com'),
(4, 'Проба 610', 'Проба 310', 'Проба 3', '1999-11-11', '00:00:03', 'fdgkjj@jdkjfh.com'),
(5, 'Проба 610', 'Проба 310', 'Проба 3', '1999-11-11', '00:00:03', 'fdgkjj@jdkjfh.com'),
(6, 'Проба 610', 'Проба 310', 'Проба 3', '1999-11-11', '00:00:03', 'fdgkjj@jdkjfh.com'),
(7, 'Проба 610', 'Проба 310', 'Проба 3', '1999-11-11', '00:00:03', 'fdgkjj@jdkjfh.com'),
(8, 'Проба 610', 'Проба 310', 'Проба 3', '1999-11-11', '00:00:03', 'fdgkjj@jdkjfh.com');

-- --------------------------------------------------------

--
-- Структура таблицы `SelectedOption`
--

CREATE TABLE `SelectedOption` (
  `id` int(11) NOT NULL,
  `idRcontract` int(11) UNSIGNED NOT NULL,
  `idOption` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `SelectedOption`
--

INSERT INTO `SelectedOption` (`id`, `idRcontract`, `idOption`) VALUES
(1, 1, 1),
(2, 1, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `transmission`
--

CREATE TABLE `transmission` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `transmission`
--

INSERT INTO `transmission` (`id`, `type`) VALUES
(1, 'ooo');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `ActPP`
--
ALTER TABLE `ActPP`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_rcontract` (`idRcontract`),
  ADD KEY `id_fine_time` (`idFineTime`);

--
-- Индексы таблицы `AdditionalOption`
--
ALTER TABLE `AdditionalOption`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_model` (`idModel`);

--
-- Индексы таблицы `auto`
--
ALTER TABLE `auto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_model` (`idModel`);

--
-- Индексы таблицы `BodyAuto`
--
ALTER TABLE `BodyAuto`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `BrandAuto`
--
ALTER TABLE `BrandAuto`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `deposit`
--
ALTER TABLE `deposit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idModel` (`idModel`);

--
-- Индексы таблицы `discount`
--
ALTER TABLE `discount`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_model` (`idModel`);

--
-- Индексы таблицы `ImageAuto`
--
ALTER TABLE `ImageAuto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_auto` (`idAuto`);

--
-- Индексы таблицы `InsuranceAuto`
--
ALTER TABLE `InsuranceAuto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_auto` (`idAuto`);

--
-- Индексы таблицы `ModelAuto`
--
ALTER TABLE `ModelAuto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idBodyAuto` (`idBodyAuto`,`idBrend`,`idTransmission`,`price`),
  ADD KEY `idTransmission` (`idTransmission`),
  ADD KEY `idBrend` (`idBrend`);

--
-- Индексы таблицы `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `RentalContract`
--
ALTER TABLE `RentalContract`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_ client` (`idClient`,`idAuto`),
  ADD KEY `idAuto` (`idAuto`);

--
-- Индексы таблицы `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `SelectedOption`
--
ALTER TABLE `SelectedOption`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_rcontract` (`idRcontract`),
  ADD KEY `id_option` (`idOption`);

--
-- Индексы таблицы `transmission`
--
ALTER TABLE `transmission`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `ActPP`
--
ALTER TABLE `ActPP`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `AdditionalOption`
--
ALTER TABLE `AdditionalOption`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `auto`
--
ALTER TABLE `auto`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `BodyAuto`
--
ALTER TABLE `BodyAuto`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `BrandAuto`
--
ALTER TABLE `BrandAuto`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `client`
--
ALTER TABLE `client`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `deposit`
--
ALTER TABLE `deposit`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `discount`
--
ALTER TABLE `discount`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `ImageAuto`
--
ALTER TABLE `ImageAuto`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `InsuranceAuto`
--
ALTER TABLE `InsuranceAuto`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `ModelAuto`
--
ALTER TABLE `ModelAuto`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблицы `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT для таблицы `RentalContract`
--
ALTER TABLE `RentalContract`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT для таблицы `SelectedOption`
--
ALTER TABLE `SelectedOption`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `transmission`
--
ALTER TABLE `transmission`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `ActPP`
--
ALTER TABLE `ActPP`
  ADD CONSTRAINT `actpp_ibfk_1` FOREIGN KEY (`idFineTime`) REFERENCES `FineTime` (`id`),
  ADD CONSTRAINT `actpp_ibfk_2` FOREIGN KEY (`idRcontract`) REFERENCES `RentalContract` (`id`);

--
-- Ограничения внешнего ключа таблицы `AdditionalOption`
--
ALTER TABLE `AdditionalOption`
  ADD CONSTRAINT `additionaloption_ibfk_1` FOREIGN KEY (`idModel`) REFERENCES `ModelAuto` (`id`);

--
-- Ограничения внешнего ключа таблицы `auto`
--
ALTER TABLE `auto`
  ADD CONSTRAINT `auto_ibfk_1` FOREIGN KEY (`id`) REFERENCES `RentalContract` (`idAuto`),
  ADD CONSTRAINT `auto_ibfk_2` FOREIGN KEY (`idModel`) REFERENCES `ModelAuto` (`id`);

--
-- Ограничения внешнего ключа таблицы `deposit`
--
ALTER TABLE `deposit`
  ADD CONSTRAINT `deposit_ibfk_1` FOREIGN KEY (`idModel`) REFERENCES `ModelAuto` (`id`);

--
-- Ограничения внешнего ключа таблицы `discount`
--
ALTER TABLE `discount`
  ADD CONSTRAINT `discount_ibfk_1` FOREIGN KEY (`idModel`) REFERENCES `ModelAuto` (`id`);

--
-- Ограничения внешнего ключа таблицы `ImageAuto`
--
ALTER TABLE `ImageAuto`
  ADD CONSTRAINT `imageauto_ibfk_1` FOREIGN KEY (`idAuto`) REFERENCES `auto` (`id`);

--
-- Ограничения внешнего ключа таблицы `InsuranceAuto`
--
ALTER TABLE `InsuranceAuto`
  ADD CONSTRAINT `insuranceauto_ibfk_1` FOREIGN KEY (`idAuto`) REFERENCES `auto` (`id`);

--
-- Ограничения внешнего ключа таблицы `ModelAuto`
--
ALTER TABLE `ModelAuto`
  ADD CONSTRAINT `modelauto_ibfk_1` FOREIGN KEY (`idBodyAuto`) REFERENCES `BodyAuto` (`id`),
  ADD CONSTRAINT `modelauto_ibfk_3` FOREIGN KEY (`idTransmission`) REFERENCES `transmission` (`id`),
  ADD CONSTRAINT `modelauto_ibfk_4` FOREIGN KEY (`idBrend`) REFERENCES `BrandAuto` (`id`);

--
-- Ограничения внешнего ключа таблицы `RentalContract`
--
ALTER TABLE `RentalContract`
  ADD CONSTRAINT `rentalcontract_ibfk_1` FOREIGN KEY (`idClient`) REFERENCES `client` (`id`),
  ADD CONSTRAINT `rentalcontract_ibfk_2` FOREIGN KEY (`idAuto`) REFERENCES `auto` (`id`);

--
-- Ограничения внешнего ключа таблицы `SelectedOption`
--
ALTER TABLE `SelectedOption`
  ADD CONSTRAINT `selectedoption_ibfk_1` FOREIGN KEY (`idRcontract`) REFERENCES `RentalContract` (`id`),
  ADD CONSTRAINT `selectedoption_ibfk_2` FOREIGN KEY (`idOption`) REFERENCES `AdditionalOption` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
