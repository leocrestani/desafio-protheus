-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           8.0.33 - MySQL Community Server - GPL
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              12.4.0.6659
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Copiando estrutura do banco de dados para brapi
CREATE DATABASE IF NOT EXISTS `brapi` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_roman_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `brapi`;

-- Copiando estrutura para tabela brapi.acao
CREATE TABLE IF NOT EXISTS `acao` (
  `idAcao` int NOT NULL AUTO_INCREMENT,
  `simbolo` text CHARACTER SET utf8mb4 COLLATE utf8mb4_roman_ci NOT NULL,
  `nome` text CHARACTER SET utf8mb4 COLLATE utf8mb4_roman_ci,
  PRIMARY KEY (`idAcao`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_roman_ci;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela brapi.cotacao
CREATE TABLE IF NOT EXISTS `cotacao` (
  `idCotacao` int NOT NULL AUTO_INCREMENT,
  `idAcao` int NOT NULL,
  `cotacao` float NOT NULL DEFAULT '0',
  `valorMercado` float DEFAULT '0',
  `volumeTransacoes` float NOT NULL DEFAULT '0',
  `moeda` text COLLATE utf8mb4_roman_ci NOT NULL,
  `data` datetime NOT NULL,
  PRIMARY KEY (`idCotacao`),
  KEY `FK1_Acao_Cotacao` (`idAcao`),
  CONSTRAINT `FK1_Acao_Cotacao` FOREIGN KEY (`idAcao`) REFERENCES `acao` (`idAcao`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_roman_ci;

-- Exportação de dados foi desmarcado.

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
