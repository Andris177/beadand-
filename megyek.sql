-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2024. Feb 19. 10:51
-- Kiszolgáló verziója: 10.4.28-MariaDB
-- PHP verzió: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `megyek`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `megyek`
--

CREATE TABLE `megyek` (
  `Megye` varchar(22) DEFAULT NULL,
  `Szekhely` varchar(14) DEFAULT NULL,
  `Lakossag` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- A tábla adatainak kiíratása `megyek`
--

INSERT INTO `megyek` (`Megye`, `Szekhely`, `Lakossag`) VALUES
('Budapest', 'Budapest', '1 671 004 fő'),
('Bács-Kiskun', 'Kecskemét', '495 318 fő'),
('Baranya', 'Pécs', '354 022 fő'),
('Békés', 'Békéscsaba', '315 222 fő'),
('Borsod-Abaúj-Zemplén', 'Miskolc', '623 024 fő'),
('Csongrád', 'Szeged', '406 205 fő'),
('Fejér', 'Székesfehérvár', '419 656 fő'),
('Győr-Moson-Sopron', 'Győr', '465 945 fő'),
('Hajdú-Bihar', 'Debrecen', '519 141 fő'),
('Heves', 'Eger', '285 892 fő'),
('Jász-Nagykun-Szolnok', 'Szolnok', '355 809 fő'),
('Komárom-Esztergom', 'Tatabánya', '300 631 fő'),
('Nógrád', 'Salgótarján', '182 459 fő'),
('Pest', 'Budapest', '1 333 533 fő'),
('Somogy', 'Kaposvár', '293 470 fő'),
('Szabolcs-Szatmár-Bereg', 'Nyíregyháza ', '529 381 fő'),
('Tolna', 'Szekszárd', '207 931 fő'),
('Vas', 'Szombathely', '249 513 fő'),
('Veszprém', 'Veszprém', '335 361 fő'),
('Zala', 'Zalaegerszeg', '260 800 fő');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
