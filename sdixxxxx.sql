-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Φιλοξενητής: 127.0.0.1
-- Χρόνος δημιουργίας: 14 Ιαν 2018 στις 22:49:07
-- Έκδοση διακομιστή: 10.1.21-MariaDB
-- Έκδοση PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Βάση δεδομένων: `sdi1300072`
--

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `administrator`
--

CREATE TABLE `administrator` (
  `id` int(11) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Άδειασμα δεδομένων του πίνακα `administrator`
--

INSERT INTO `administrator` (`id`, `email`, `password`) VALUES
(1, 'admin@admin.gr', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `surname` varchar(45) NOT NULL,
  `amka` varchar(45) NOT NULL,
  `birthdate` date NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `employer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Άδειασμα δεδομένων του πίνακα `employee`
--

INSERT INTO `employee` (`id`, `name`, `surname`, `amka`, `birthdate`, `email`, `password`, `employer_id`) VALUES
(1, 'Lucious', 'Fox', '20037011111', '1970-03-20', 'fox@di.uoa.gr', 'e10adc3949ba59abbe56e057f20f883e', 1);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `employer`
--

CREATE TABLE `employer` (
  `id` int(11) NOT NULL,
  `AME` varchar(45) NOT NULL,
  `name` varchar(45) NOT NULL,
  `surname` varchar(45) NOT NULL,
  `birthdate` date NOT NULL,
  `branch_store` varchar(45) NOT NULL,
  `address` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Άδειασμα δεδομένων του πίνακα `employer`
--

INSERT INTO `employer` (`id`, `AME`, `name`, `surname`, `birthdate`, `branch_store`, `address`, `email`, `password`) VALUES
(1, '1223334444', 'Bruce', 'Wayne', '1980-02-19', 'Wayne Enterprises', 'Old Gotham City', 'bruce@di.uoa.gr', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `employer_applications`
--

CREATE TABLE `employer_applications` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `AME` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `AMKA` varchar(45) NOT NULL,
  `apasxolhsh` varchar(40) NOT NULL,
  `dateFrom` date NOT NULL,
  `dateTo` date NOT NULL,
  `standBy` tinyint(1) NOT NULL,
  `approval` tinyint(1) NOT NULL,
  `employer_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Άδειασμα δεδομένων του πίνακα `employer_applications`
--

INSERT INTO `employer_applications` (`id`, `name`, `AME`, `email`, `AMKA`, `apasxolhsh`, `dateFrom`, `dateTo`, `standBy`, `approval`, `employer_id`) VALUES
(1, 'Giannhs', '1234123455', 'giannhs@gmail.com', '21129088888', 'olikh apasxolhsh', '2018-01-15', '2018-01-31', 0, 0, 1),
(2, 'Bruce', '1223334444', 'bruce@di.uoa.gr', '21129800000', 'merikh apasxolhsh', '2018-01-16', '2018-01-23', 0, 0, 1);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `retired`
--

CREATE TABLE `retired` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `surname` varchar(45) NOT NULL,
  `birthdate` date NOT NULL,
  `AM_DIAS` varchar(45) NOT NULL,
  `residence` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Άδειασμα δεδομένων του πίνακα `retired`
--

INSERT INTO `retired` (`id`, `name`, `surname`, `birthdate`, `AM_DIAS`, `residence`, `email`, `password`) VALUES
(1, 'Erik', 'Lehnsherr', '1991-06-10', '111113333355555', 'Greece', 'erik@di.uoa.gr', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `secured`
--

CREATE TABLE `secured` (
  `id` int(11) NOT NULL,
  `AMKA` varchar(45) NOT NULL,
  `name` varchar(45) NOT NULL,
  `surname` varchar(45) NOT NULL,
  `birthdate` date NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Άδειασμα δεδομένων του πίνακα `secured`
--

INSERT INTO `secured` (`id`, `AMKA`, `name`, `surname`, `birthdate`, `email`, `password`) VALUES
(1, '04079011111', 'Steve', 'Rogers', '1990-07-04', 'steve@di.uoa.gr', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `secured_applications`
--

CREATE TABLE `secured_applications` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `AMKA` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `astheneia` varchar(45) NOT NULL,
  `dateFrom` date NOT NULL,
  `dateTo` date NOT NULL,
  `standBy` tinyint(1) NOT NULL,
  `approval` tinyint(1) NOT NULL,
  `secured_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Άδειασμα δεδομένων του πίνακα `secured_applications`
--

INSERT INTO `secured_applications` (`id`, `name`, `AMKA`, `email`, `astheneia`, `dateFrom`, `dateTo`, `standBy`, `approval`, `secured_id`) VALUES
(1, 'Nikos', '17089500000', 'nick@yahoo.com', 'makras diarkeias', '2018-01-15', '2018-02-10', 0, 0, 1);

--
-- Ευρετήρια για άχρηστους πίνακες
--

--
-- Ευρετήρια για πίνακα `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`id`);

--
-- Ευρετήρια για πίνακα `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_employee_employer` (`employer_id`);

--
-- Ευρετήρια για πίνακα `employer`
--
ALTER TABLE `employer`
  ADD PRIMARY KEY (`id`);

--
-- Ευρετήρια για πίνακα `employer_applications`
--
ALTER TABLE `employer_applications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_employer_applications_employer_idx` (`employer_id`);

--
-- Ευρετήρια για πίνακα `retired`
--
ALTER TABLE `retired`
  ADD PRIMARY KEY (`id`);

--
-- Ευρετήρια για πίνακα `secured`
--
ALTER TABLE `secured`
  ADD PRIMARY KEY (`id`);

--
-- Ευρετήρια για πίνακα `secured_applications`
--
ALTER TABLE `secured_applications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_secured_applications_secured_idx` (`secured_id`);

--
-- AUTO_INCREMENT για άχρηστους πίνακες
--

--
-- AUTO_INCREMENT για πίνακα `administrator`
--
ALTER TABLE `administrator`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT για πίνακα `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT για πίνακα `employer`
--
ALTER TABLE `employer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT για πίνακα `employer_applications`
--
ALTER TABLE `employer_applications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT για πίνακα `retired`
--
ALTER TABLE `retired`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT για πίνακα `secured`
--
ALTER TABLE `secured`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT για πίνακα `secured_applications`
--
ALTER TABLE `secured_applications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Περιορισμοί για άχρηστους πίνακες
--

--
-- Περιορισμοί για πίνακα `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `fk_employee_employer` FOREIGN KEY (`employer_id`) REFERENCES `employer` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Περιορισμοί για πίνακα `employer_applications`
--
ALTER TABLE `employer_applications`
  ADD CONSTRAINT `fk_employer_applications_employer` FOREIGN KEY (`employer_id`) REFERENCES `employer` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Περιορισμοί για πίνακα `secured_applications`
--
ALTER TABLE `secured_applications`
  ADD CONSTRAINT `fk_secured_applications_secured` FOREIGN KEY (`secured_id`) REFERENCES `secured` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
