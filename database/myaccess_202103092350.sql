--
-- Скрипт сгенерирован Devart dbForge Studio 2020 for MySQL, Версия 9.0.470.0
-- Домашняя страница продукта: http://www.devart.com/ru/dbforge/mysql/studio
-- Дата скрипта: 09.03.2021 23:50:36
-- Версия сервера: 10.4.17
-- Версия клиента: 4.1
--

-- 
-- Отключение внешних ключей
-- 
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;

-- 
-- Установить режим SQL (SQL mode)
-- 
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- 
-- Установка кодировки, с использованием которой клиент будет посылать запросы на сервер
--
SET NAMES 'utf8';

--
-- Установка базы данных по умолчанию
--
USE myaccess;

--
-- Удалить таблицу `users_access`
--
DROP TABLE IF EXISTS users_access;

--
-- Удалить таблицу `access`
--
DROP TABLE IF EXISTS access;

--
-- Удалить таблицу `users`
--
DROP TABLE IF EXISTS users;

--
-- Установка базы данных по умолчанию
--
USE myaccess;

--
-- Создать таблицу `users`
--
CREATE TABLE users (
  id int(11) NOT NULL AUTO_INCREMENT,
  first_name varchar(255) DEFAULT NULL,
  last_name varchar(255) DEFAULT NULL,
  email varchar(50) DEFAULT NULL,
  password varchar(255) DEFAULT NULL,
  PRIMARY KEY (id)
)
ENGINE = INNODB,
AUTO_INCREMENT = 16,
AVG_ROW_LENGTH = 1092,
CHARACTER SET utf8mb4,
COLLATE utf8mb4_general_ci;

--
-- Создать таблицу `access`
--
CREATE TABLE access (
  id int(11) NOT NULL AUTO_INCREMENT,
  title varchar(255) DEFAULT NULL,
  title_project varchar(255) DEFAULT NULL,
  title_description varchar(255) DEFAULT NULL,
  PRIMARY KEY (id)
)
ENGINE = INNODB,
AUTO_INCREMENT = 39,
AVG_ROW_LENGTH = 606,
CHARACTER SET utf8mb4,
COLLATE utf8mb4_general_ci;

--
-- Создать таблицу `users_access`
--
CREATE TABLE users_access (
  id_users int(11) NOT NULL,
  id_access int(11) NOT NULL,
  PRIMARY KEY (id_access, id_users)
)
ENGINE = INNODB,
AVG_ROW_LENGTH = 1092,
CHARACTER SET utf8mb4,
COLLATE utf8mb4_general_ci;

--
-- Создать внешний ключ
--
ALTER TABLE users_access
ADD CONSTRAINT users_access_ibfk_1 FOREIGN KEY (id_access)
REFERENCES access (id) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Создать внешний ключ
--
ALTER TABLE users_access
ADD CONSTRAINT users_access_ibfk_2 FOREIGN KEY (id_users)
REFERENCES users (id) ON DELETE CASCADE ON UPDATE CASCADE;

-- 
-- Вывод данных для таблицы users
--
INSERT INTO users VALUES
(1, 'Кристина', 'Маковская', 'kristina.mackovskaya@yandex.by', '$2y$10$xaSh/eVkIXrrFjMQhSmz0el3kD/8GHla7xAzlZq1srKHPyNMDEdRS'),
(2, 'Кристина', 'Маковская', 'makovskaia98@mail.ru', '$2y$10$ZAYWBZtB8hnli/97B9LSVOWdsXzgLk8YoX7y3UHzl1sbKR.YnrHLm'),
(3, 'Кристина', 'Маковская', 'makov98@mail.ru', '$2y$10$Nz/cEIReQTxmhBawKQSz8upC8diliNkn1BzRa1khwDDrtxwxpWwzK'),
(4, 'Кристина2323', 'Маковская23', 'mak98@mail.ru', '$2y$10$wMkffdZRkctPZTBUb2whSuHEUIRWDaQOBn//b6qtveUQZcqHPyJRK'),
(5, 'Кристина', 'Маковская', 'djffdf@mail.ru', '$2y$10$HOZhTHzSnR7yInP3kDmnZu6iqq8s5/DIG7VPmgmwiS2j7OJPkef4K'),
(6, 'Кристина', 'Маковская', 'djff23df@mail.ru', '$2y$10$I0SFFDCou6zRjb/pBwg4OOmRpwOG.GfUaYaaN/ovh8Zt3xXGNBvCq'),
(7, 'Кристина', 'Маковская', 'maov98@mail.ru', '$2y$10$qwEWSckC.EDPPii2.NKEmub4JumpJ7jQDuBLurSh19O98RIj8IrQ2'),
(8, 'Кристина', 'Маковская', 'makffdfgra98@mail.ru', '$2y$10$d1Qko7CRPWWw4PGLM3W0vujPWk7O6ON/UVAE.RHbIbxcKH115wmrm'),
(9, 'Кристина', 'Маковская', 'makovgfgfgf98@mail.ru', '$2y$10$TK750.TiuZzS1Y/qD4x7Y.yvsLI1HLfouGrnyarxdWtbhqTmHxKDK'),
(10, 'Кристина', 'Маковская', 'mkovskaia98@mail.ru', '$2y$10$mxs4Bm79y4t28pjrQLCTceyM4W4T7bN7fnEU0SlnCzHZ4VBnJtw7O'),
(11, 'Кристина', 'Маковская', 'makov9824@mail.ru', '$2y$10$62aCt0oS/.aaeXnNgOVj8usXljLg57qzuO/8H83Olr2TX/htxGVMe'),
(12, 'Кристина', 'Маковская', 'kris@mail.ru', '$2y$10$4vHFBriB452hkLD/gfIog.1aNkCrcECxD47ZsuzeCgmZHkPDmRbba'),
(13, 'Кристина', 'Маковская', 'm@mail.ru', '$2y$10$cHlvLkmSsjPfOW3YZGoe9uKmV9F3qRqoxTYFVa2r6O8wZn51WEuly'),
(14, 'Кристина', 'Маковская', 'makov982324@mail.ru', '$2y$10$gbCxZT4r57XMudpQhHB65emz0qPTMgQf4fBeDm/ZhS578JCFTKBFm'),
(15, 'Кристина', 'Маковская', 'mak982525@mail.ru', '$2y$10$RP74iQHT8z8R/992k0tosuvwzUjJwzldig9AjOmbEqDZojuUPjiIS');

-- 
-- Вывод данных для таблицы access
--
INSERT INTO access VALUES
(1, 'Title3', 'Title3', 'ghgh'),
(2, 'Title4', 'Title3', 'ghgh'),
(3, 'Title5', 'Title3', 'ghgh'),
(4, 'Title3', 'Title3', 'ghgh'),
(5, 'Title3', 'Title3', 'ghgh'),
(6, 'Title3', 'Title3', 'ghgh'),
(7, 'Title3', 'Title3', 'gffgfg'),
(8, 'Title3', 'Title1', 'grgrgrg'),
(9, 'efefef', 'fefef', 'fefef'),
(10, 'efefef', 'fefef', 'fefef'),
(11, 'Title3', 'Title3', 'gfgfg'),
(12, 'Title3', 'Title3', 'gfgfg'),
(15, 'Title3', 'Project', 'Project about you best day in the life'),
(19, 'Title5', 'Project', 'href/....\r\npassword ....\r\nfkdlfdf'),
(20, 'Title5', 'Project', 'href/....\r\npassword ....\r\nfkdlfdf'),
(22, 'Title3', 'Title3', 'dgdg'),
(23, 'Title3', 'Title3', 'dgdg'),
(25, 'Title3', 'Title3', 'Title3Title3Title3Title3Title3'),
(27, 'Title3', 'Title3', 'Title3Title3Title3'),
(28, 'Title3', 'Title3', 'fdfdf'),
(30, 'Title3', 'Title3', 'jdsjkdjs fdjfjdkfd fmfjdkfdkfd dmfn kmm vcmxvjfjvkn cj nfnn jbfkglb vjfjkb,  nbjfk  fkbjfb'),
(31, 'Title3', 'Title3', 'fegrhh'),
(32, 'Title3', 'Title3', 'bbgb'),
(33, 'Title3', 'efef', 'efefef'),
(34, 'Title3', 'Title3', 'Title3Title3Title3Title3'),
(35, 'Title3', 'Title3', 'rgfdgfg'),
(36, 'Title3', 'Title3', 'rgfdgfg');

-- 
-- Вывод данных для таблицы users_access
--
INSERT INTO users_access VALUES
(1, 7),
(1, 8),
(2, 9),
(2, 10),
(2, 11),
(2, 12),
(1, 15),
(3, 19),
(3, 20),
(2, 25),
(1, 27),
(1, 28),
(3, 30),
(1, 32),
(1, 33);

-- 
-- Восстановить предыдущий режим SQL (SQL mode)
--
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;

-- 
-- Включение внешних ключей
-- 
/*!40014 SET FOREIGN_KEY_CHECKS = @OLD_FOREIGN_KEY_CHECKS */;