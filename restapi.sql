-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 17 Wrz 2021, 13:21
-- Wersja serwera: 10.4.20-MariaDB
-- Wersja PHP: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `restapi`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `dane_uzytkownikow`
--

CREATE TABLE `dane_uzytkownikow` (
  `id` int(11) NOT NULL,
  `login` varchar(100) COLLATE utf8mb4_polish_ci NOT NULL,
  `haslo` varchar(100) COLLATE utf8mb4_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `dane_uzytkownikow`
--

INSERT INTO `dane_uzytkownikow` (`id`, `login`, `haslo`) VALUES
(2, 'ewa', 'kowalska'),
(3, 'Anna', 'Anna123'),
(35, 'Adam', '12345');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `ustawienia_uzytkownikow`
--

CREATE TABLE `ustawienia_uzytkownikow` (
  `id_uzytkownika` int(11) NOT NULL,
  `data_rejestracji` date NOT NULL DEFAULT current_timestamp(),
  `adres_email` varchar(100) COLLATE utf8mb4_polish_ci NOT NULL,
  `miasto` varchar(100) COLLATE utf8mb4_polish_ci NOT NULL,
  `kod_pocztowy` varchar(6) COLLATE utf8mb4_polish_ci NOT NULL,
  `nr_telefonu` varchar(9) COLLATE utf8mb4_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `ustawienia_uzytkownikow`
--

INSERT INTO `ustawienia_uzytkownikow` (`id_uzytkownika`, `data_rejestracji`, `adres_email`, `miasto`, `kod_pocztowy`, `nr_telefonu`) VALUES
(2, '2021-09-16', 'ewakowalska@poczta.pl', 'Wrocław', '45-573', '987654321'),
(3, '2021-09-16', 'Anna@poczta.pl', 'Warszawa', '00-001', '999888777'),
(35, '2021-09-17', 'Adam123@poczta.pl', 'Katowice', '40-750', '111222333');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `dane_uzytkownikow`
--
ALTER TABLE `dane_uzytkownikow`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `ustawienia_uzytkownikow`
--
ALTER TABLE `ustawienia_uzytkownikow`
  ADD PRIMARY KEY (`id_uzytkownika`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `dane_uzytkownikow`
--
ALTER TABLE `dane_uzytkownikow`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT dla tabeli `ustawienia_uzytkownikow`
--
ALTER TABLE `ustawienia_uzytkownikow`
  MODIFY `id_uzytkownika` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
