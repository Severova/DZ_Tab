-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 26 2018 г., 00:35
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
-- Структура таблицы `AboutCompany`
--

CREATE TABLE `AboutCompany` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `street` varchar(255) NOT NULL,
  `home` int(11) NOT NULL,
  `housing` int(11) DEFAULT NULL,
  `descriptionAddress` varchar(255) DEFAULT NULL,
  `e-mail` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `AboutCompany`
--

INSERT INTO `AboutCompany` (`id`, `name`, `telephone`, `street`, `home`, `housing`, `descriptionAddress`, `e-mail`) VALUES
(1, 'DeliveryCar', '+7 (495) 528 40 55', 'Новый Арбат', 21, 0, '', 'mail@DeliveryCar.ru');

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

-- --------------------------------------------------------

--
-- Структура таблицы `AdditionalOption`
--

CREATE TABLE `AdditionalOption` (
  `id` int(10) UNSIGNED NOT NULL,
  `nameOptions` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `AdditionalOption`
--

INSERT INTO `AdditionalOption` (`id`, `nameOptions`, `price`, `image`, `description`) VALUES
(1, 'Второй водитель', 200, NULL, NULL),
(2, 'Детское кресло', 140, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `auto`
--

CREATE TABLE `auto` (
  `id` int(10) UNSIGNED NOT NULL,
  `idModel` int(11) UNSIGNED NOT NULL,
  `stateNumber` varchar(20) NOT NULL,
  `status` set('арендована','свободна') NOT NULL,
  `description` text,
  `diviz` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `auto`
--

INSERT INTO `auto` (`id`, `idModel`, `stateNumber`, `status`, `description`, `diviz`) VALUES
(1, 1, 'Е222ХН98', 'свободна', NULL, NULL),
(2, 2, 'Е222ХН98', 'свободна', NULL, NULL),
(3, 3, '787654', 'свободна', NULL, NULL),
(4, 4, '6746736', 'свободна', '- это современный автомобиль в кузове седан. Авто идеально подходит для больших городов, таких как Москва. Среди всех автомобилей бизнес-сегмента А6 считается одним из эталонов. Прокат такого авто позволит наслаждаться каждой поездкой. Салон А6 имеет стильный дизайн и выполнен с учетом максимального комфорта для пассажира. А внешний вид автомобиля заслуживает отдельного внимания. После рестайлинга автомобиль посвежел и приобрел более привлекательный вид. Одним из главных усовершенствований стали светодиодные фары.', 'Успешному человеку нужен соответствующий автомобиль, поэтому прокат Audi A6– это самый лучший выбор из всех возможных.');

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
(4, 'лифтбэк'),
(5, 'купе'),
(6, 'кабриолет'),
(7, 'родстер'),
(8, 'тарга'),
(9, 'лимузин'),
(10, 'стретч'),
(11, 'внедорожник'),
(12, 'кроссовер');

-- --------------------------------------------------------

--
-- Структура таблицы `BrandAuto`
--

CREATE TABLE `BrandAuto` (
  `id` int(10) UNSIGNED NOT NULL,
  `nameBrand` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `BrandAuto`
--

INSERT INTO `BrandAuto` (`id`, `nameBrand`) VALUES
(1, 'BMW'),
(2, 'AUDI'),
(3, 'Ferrari'),
(4, 'Jaguar'),
(5, 'Mercedes'),
(6, 'Porshe');

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
(1, 2500, 1);

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
(1, 1, 30, NULL),
(2, 4, 50, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `ImageAuto`
--

CREATE TABLE `ImageAuto` (
  `id` int(10) UNSIGNED NOT NULL,
  `idAuto` int(10) UNSIGNED NOT NULL,
  `imgAuto` varchar(255) NOT NULL,
  `otherImgAuto` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `ImageAuto`
--

INSERT INTO `ImageAuto` (`id`, `idAuto`, `imgAuto`, `otherImgAuto`) VALUES
(1, 1, 'slider_img.png', ''),
(3, 3, 'BMW_218i.jpg', ''),
(4, 4, 'slider.png', '20.jpg'),
(5, 4, '', '21.jpg'),
(6, 4, '', '22.jpg'),
(7, 4, '', '23.jpg'),
(8, 4, '', '24.jpg'),
(10, 3, '', '10.jpg'),
(11, 3, '', '6.jpg'),
(12, 3, '', '7.jpg'),
(13, 3, '', '8.jpg'),
(14, 3, '', '9.jpg'),
(15, 2, 'slider.png', '1.jpg'),
(16, 2, '', '2.jpg'),
(17, 2, '', '3.jpg'),
(18, 2, '', '4.jpg'),
(19, 2, '', '5.jpg'),
(20, 1, '', '14.jpg'),
(21, 1, '', '15.jpg'),
(22, 1, '', '13.jpg'),
(23, 1, '', '12.jpg'),
(24, 1, '', '11.jpg');

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
  `idBrand` int(11) UNSIGNED NOT NULL,
  `idTransmission` int(11) UNSIGNED NOT NULL,
  `nameModel` varchar(255) NOT NULL,
  `drivingExperience` int(5) NOT NULL,
  `price` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `ModelAuto`
--

INSERT INTO `ModelAuto` (`id`, `idBodyAuto`, `idBrand`, `idTransmission`, `nameModel`, `drivingExperience`, `price`) VALUES
(1, 5, 1, 4, 'M4 COMPETITION', 5, 6500),
(2, 2, 1, 3, '400 i', 5, 7000),
(3, 3, 1, 2, '218 i Coupe', 5, 9000),
(4, 2, 2, 2, 'A6', 4, 8000);

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
(8, 'Проба 610', 'Проба 310', 'Проба 3', '1999-11-11', '00:00:03', 'fdgkjj@jdkjfh.com'),
(9, 'Проба 610', 'Проба 310', 'Проба 3', '1999-11-11', '00:00:03', 'fdgkjj@jdkjfh.com'),
(10, 'Проба 610', 'Проба 310', 'Проба 3', '1999-11-11', '00:00:03', 'fdgkjj@jdkjfh.com'),
(11, 'Проба 610', 'Проба 310', 'Проба 3', '1999-11-11', '00:00:03', 'fdgkjj@jdkjfh.com'),
(12, 'Проба 610', 'Проба 310', 'Проба 3', '1999-11-11', '00:00:03', 'fdgkjj@jdkjfh.com'),
(13, 'Проба 610', 'Проба 310', 'Проба 3', '1999-11-11', '00:00:03', 'fdgkjj@jdkjfh.com'),
(14, 'Проба 610', 'Проба 310', 'Проба 3', '1999-11-11', '00:00:03', 'fdgkjj@jdkjfh.com'),
(15, 'Проба 610', 'Проба 310', 'Проба 3', '1999-11-11', '00:00:03', 'fdgkjj@jdkjfh.com'),
(16, 'Проба 610', 'Проба 310', 'Проба 3', '1999-11-11', '00:00:03', 'fdgkjj@jdkjfh.com');

-- --------------------------------------------------------

--
-- Структура таблицы `SelectedOption`
--

CREATE TABLE `SelectedOption` (
  `id` int(11) NOT NULL,
  `idRcontract` int(11) UNSIGNED NOT NULL,
  `idOption` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(2, 'МКПП'),
(3, 'АКПП'),
(4, 'РКПП'),
(5, 'Вариатор');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `AboutCompany`
--
ALTER TABLE `AboutCompany`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `ActPP`
--
ALTER TABLE `ActPP`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `AdditionalOption`
--
ALTER TABLE `AdditionalOption`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `auto`
--
ALTER TABLE `auto`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `discount`
--
ALTER TABLE `discount`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `ImageAuto`
--
ALTER TABLE `ImageAuto`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `InsuranceAuto`
--
ALTER TABLE `InsuranceAuto`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `ModelAuto`
--
ALTER TABLE `ModelAuto`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `RentalContract`
--
ALTER TABLE `RentalContract`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `SelectedOption`
--
ALTER TABLE `SelectedOption`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `transmission`
--
ALTER TABLE `transmission`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `AboutCompany`
--
ALTER TABLE `AboutCompany`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `ActPP`
--
ALTER TABLE `ActPP`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT для таблицы `BrandAuto`
--
ALTER TABLE `BrandAuto`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `ImageAuto`
--
ALTER TABLE `ImageAuto`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT для таблицы `InsuranceAuto`
--
ALTER TABLE `InsuranceAuto`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `ModelAuto`
--
ALTER TABLE `ModelAuto`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT для таблицы `SelectedOption`
--
ALTER TABLE `SelectedOption`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `transmission`
--
ALTER TABLE `transmission`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
