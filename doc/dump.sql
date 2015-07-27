-- MySQL dump 10.13  Distrib 5.6.24, for Win64 (x86_64)
--
-- Host: localhost    Database: elever
-- ------------------------------------------------------
-- Server version	5.6.12-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `eb_campanha`
--

DROP TABLE IF EXISTS `eb_campanha`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eb_campanha` (
  `id_campanha` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) COLLATE utf8_bin NOT NULL,
  `desconto` char(3) COLLATE utf8_bin DEFAULT NULL,
  `ativo` tinyint(1) DEFAULT '1',
  `dt_cadastro` datetime DEFAULT NULL,
  `dt_inicio` datetime DEFAULT CURRENT_TIMESTAMP,
  `dt_fim` datetime DEFAULT NULL,
  PRIMARY KEY (`id_campanha`),
  UNIQUE KEY `id_campanha_UNIQUE` (`id_campanha`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='	';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eb_campanha`
--

LOCK TABLES `eb_campanha` WRITE;
/*!40000 ALTER TABLE `eb_campanha` DISABLE KEYS */;
/*!40000 ALTER TABLE `eb_campanha` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eb_canal`
--

DROP TABLE IF EXISTS `eb_canal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eb_canal` (
  `id_canal` int(11) NOT NULL AUTO_INCREMENT,
  `id_campanha` int(11) NOT NULL,
  `nome` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `desconto` char(3) COLLATE utf8_bin DEFAULT NULL,
  `ativo` tinyint(1) DEFAULT '1',
  `dt_cadastro` datetime DEFAULT NULL,
  PRIMARY KEY (`id_canal`),
  UNIQUE KEY `id_canal_UNIQUE` (`id_canal`),
  KEY `FK_CANAL_CAMPANHA_idx` (`id_campanha`),
  CONSTRAINT `FK_CANAL_CAMPANHA` FOREIGN KEY (`id_campanha`) REFERENCES `eb_campanha` (`id_campanha`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eb_canal`
--

LOCK TABLES `eb_canal` WRITE;
/*!40000 ALTER TABLE `eb_canal` DISABLE KEYS */;
/*!40000 ALTER TABLE `eb_canal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eb_cliente`
--

DROP TABLE IF EXISTS `eb_cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eb_cliente` (
  `id_cliente` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) DEFAULT NULL,
  `nome` varchar(200) COLLATE utf8_bin DEFAULT NULL,
  `cnpj` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `cpf` char(15) COLLATE utf8_bin DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `email_outro` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `id_temperatura` int(11) DEFAULT '1',
  `id_momento` int(11) DEFAULT '1',
  `id_midia` int(11) DEFAULT '1',
  `id_canal` int(11) DEFAULT NULL,
  `ativo` tinyint(1) NOT NULL DEFAULT '1',
  `excluido` tinyint(1) NOT NULL DEFAULT '0',
  `dt_cadastro` datetime DEFAULT NULL,
  `dt_atualizacao` datetime DEFAULT CURRENT_TIMESTAMP,
  `id_cliente_relacionado` int(11) DEFAULT NULL,
  `id_regional` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_cliente`),
  KEY `FK_CLIENTE_USUARIO_idx` (`id_usuario`),
  KEY `FK_CLIENTE_MOMENTO_idx` (`id_momento`),
  KEY `FK_CLIENTE_TEMPERATURA_idx` (`id_temperatura`),
  KEY `FK_CLIENTE_MIDIA_idx` (`id_midia`),
  KEY `FK_CLIENTE_CANAL_idx` (`id_canal`),
  KEY `FK_CLIENTE_CLIENT_RELACIONADO_idx` (`id_cliente_relacionado`),
  CONSTRAINT `FK_CLIENTE_CANAL` FOREIGN KEY (`id_canal`) REFERENCES `eb_canal` (`id_canal`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_CLIENTE_CLIENT_RELACIONADO` FOREIGN KEY (`id_cliente_relacionado`) REFERENCES `eb_cliente` (`id_cliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_CLIENTE_MIDIA` FOREIGN KEY (`id_midia`) REFERENCES `eb_midia` (`id_midia`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_CLIENTE_MOMENTO` FOREIGN KEY (`id_momento`) REFERENCES `eb_momento` (`id_momento`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_CLIENTE_TEMPERATURA` FOREIGN KEY (`id_temperatura`) REFERENCES `eb_temperatura` (`id_temperatura`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_CLIENTE_USUARIO` FOREIGN KEY (`id_usuario`) REFERENCES `eb_usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eb_cliente`
--

LOCK TABLES `eb_cliente` WRITE;
/*!40000 ALTER TABLE `eb_cliente` DISABLE KEYS */;
/*!40000 ALTER TABLE `eb_cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eb_cliente_endereco`
--

DROP TABLE IF EXISTS `eb_cliente_endereco`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eb_cliente_endereco` (
  `id_cliente_endereco` int(11) NOT NULL AUTO_INCREMENT,
  `id_cliente` int(11) NOT NULL,
  `logradouro` text COLLATE utf8_bin,
  `cep` varchar(11) COLLATE utf8_bin DEFAULT NULL,
  `cidade` varchar(150) COLLATE utf8_bin DEFAULT NULL,
  `uf` char(3) COLLATE utf8_bin DEFAULT NULL,
  `tel` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `dddtel` char(3) COLLATE utf8_bin DEFAULT NULL,
  `cel` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `dddcel` char(3) COLLATE utf8_bin DEFAULT NULL,
  `teloutro` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `dddoutro` char(3) COLLATE utf8_bin DEFAULT NULL,
  `favorito` tinyint(1) DEFAULT NULL,
  `ativo` tinyint(1) DEFAULT '1',
  `excluido` tinyint(1) DEFAULT '0',
  `dt_cadastro` datetime DEFAULT NULL,
  PRIMARY KEY (`id_cliente_endereco`),
  KEY `FK_cliente_endereco_cliente` (`id_cliente`),
  CONSTRAINT `FK_cliente_endereco_cliente` FOREIGN KEY (`id_cliente`) REFERENCES `eb_cliente` (`id_cliente`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eb_cliente_endereco`
--

LOCK TABLES `eb_cliente_endereco` WRITE;
/*!40000 ALTER TABLE `eb_cliente_endereco` DISABLE KEYS */;
/*!40000 ALTER TABLE `eb_cliente_endereco` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eb_empresa`
--

DROP TABLE IF EXISTS `eb_empresa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eb_empresa` (
  `id_empresa` int(11) NOT NULL AUTO_INCREMENT,
  `id_regional` int(11) NOT NULL,
  `nome` varchar(150) COLLATE utf8_bin NOT NULL,
  `logradouro` tinytext COLLATE utf8_bin,
  `bairro` tinytext COLLATE utf8_bin,
  `cidade` varchar(200) COLLATE utf8_bin DEFAULT NULL,
  `uf` char(2) COLLATE utf8_bin DEFAULT NULL,
  `ativo` tinyint(1) NOT NULL DEFAULT '1',
  `excluido` tinyint(1) NOT NULL DEFAULT '0',
  `dt_cadastro` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_empresa`),
  UNIQUE KEY `id_empresa_UNIQUE` (`id_empresa`),
  KEY `FK_REGIONAL_EMPRESA_idx` (`id_regional`),
  CONSTRAINT `FK_REGIONAL_EMPRESA` FOREIGN KEY (`id_regional`) REFERENCES `eb_regional` (`id_regional`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eb_empresa`
--

LOCK TABLES `eb_empresa` WRITE;
/*!40000 ALTER TABLE `eb_empresa` DISABLE KEYS */;
/*!40000 ALTER TABLE `eb_empresa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eb_fornecedor`
--

DROP TABLE IF EXISTS `eb_fornecedor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eb_fornecedor` (
  `id_fornecedor` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(150) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id_fornecedor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eb_fornecedor`
--

LOCK TABLES `eb_fornecedor` WRITE;
/*!40000 ALTER TABLE `eb_fornecedor` DISABLE KEYS */;
/*!40000 ALTER TABLE `eb_fornecedor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eb_midia`
--

DROP TABLE IF EXISTS `eb_midia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eb_midia` (
  `id_midia` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) COLLATE utf8_bin NOT NULL,
  `ativo` tinyint(1) DEFAULT '1',
  `dt_cadastro` datetime DEFAULT NULL,
  PRIMARY KEY (`id_midia`),
  UNIQUE KEY `id_midia_UNIQUE` (`id_midia`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eb_midia`
--

LOCK TABLES `eb_midia` WRITE;
/*!40000 ALTER TABLE `eb_midia` DISABLE KEYS */;
INSERT INTO `eb_midia` VALUES (1,'Mídia interna',1,NULL);
/*!40000 ALTER TABLE `eb_midia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eb_modulo`
--

DROP TABLE IF EXISTS `eb_modulo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eb_modulo` (
  `id_modulo` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `ativo` tinyint(1) NOT NULL DEFAULT '1',
  `excluido` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_modulo`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eb_modulo`
--

LOCK TABLES `eb_modulo` WRITE;
/*!40000 ALTER TABLE `eb_modulo` DISABLE KEYS */;
INSERT INTO `eb_modulo` VALUES (1,'cliente',1,0),(2,'venda',1,0),(3,'compras',1,0),(4,'report',1,0),(5,'configuracao',1,0);
/*!40000 ALTER TABLE `eb_modulo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eb_modulo_permissao`
--

DROP TABLE IF EXISTS `eb_modulo_permissao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eb_modulo_permissao` (
  `id_modulo` int(11) NOT NULL,
  `id_perfil` int(11) NOT NULL,
  PRIMARY KEY (`id_modulo`,`id_perfil`),
  KEY `FK_MODULO_PERMISSAO_PERFIL_idx` (`id_perfil`),
  CONSTRAINT `FK_MODULO_PERMISSAO_MODULO` FOREIGN KEY (`id_modulo`) REFERENCES `eb_modulo` (`id_modulo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_MODULO_PERMISSAO_PERFIL` FOREIGN KEY (`id_perfil`) REFERENCES `eb_perfil` (`id_perfil`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eb_modulo_permissao`
--

LOCK TABLES `eb_modulo_permissao` WRITE;
/*!40000 ALTER TABLE `eb_modulo_permissao` DISABLE KEYS */;
/*!40000 ALTER TABLE `eb_modulo_permissao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eb_momento`
--

DROP TABLE IF EXISTS `eb_momento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eb_momento` (
  `id_momento` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `descricao` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `ativo` tinyint(1) NOT NULL DEFAULT '1',
  `dt_cadastro` datetime DEFAULT NULL,
  PRIMARY KEY (`id_momento`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eb_momento`
--

LOCK TABLES `eb_momento` WRITE;
/*!40000 ALTER TABLE `eb_momento` DISABLE KEYS */;
INSERT INTO `eb_momento` VALUES (1,'pesquisa','Cliente esta pesquisando preços',1,NULL),(2,'interessado','Cliente esta interassado na compra',1,NULL),(3,'não interessado','Cliente não demonstra interesse',1,NULL);
/*!40000 ALTER TABLE `eb_momento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eb_nfe`
--

DROP TABLE IF EXISTS `eb_nfe`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eb_nfe` (
  `id_nfe` int(11) NOT NULL AUTO_INCREMENT,
  `chassis` varchar(150) COLLATE utf8_bin DEFAULT NULL,
  `numero` varchar(45) COLLATE utf8_bin NOT NULL,
  `valor` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `nro_item` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `icms` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `dt_nfe` datetime DEFAULT NULL,
  `dt_cadastro` datetime DEFAULT NULL,
  `id_status_nota` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_nfe`),
  KEY `FK_NFE_STATUS_NOTA_idx` (`id_status_nota`),
  CONSTRAINT `FK_NFE_STATUS_NOTA` FOREIGN KEY (`id_status_nota`) REFERENCES `eb_status_nota` (`id_status_nota`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eb_nfe`
--

LOCK TABLES `eb_nfe` WRITE;
/*!40000 ALTER TABLE `eb_nfe` DISABLE KEYS */;
/*!40000 ALTER TABLE `eb_nfe` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eb_nota_credito`
--

DROP TABLE IF EXISTS `eb_nota_credito`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eb_nota_credito` (
  `id_nota_credito` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) COLLATE utf8_bin NOT NULL,
  `chassis` varchar(150) COLLATE utf8_bin NOT NULL,
  `valor` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `id_status_nota` int(11) NOT NULL,
  `dt_cadastro` datetime DEFAULT NULL,
  PRIMARY KEY (`id_nota_credito`),
  KEY `FK_NOTA_CREDITO_STATUS_NOTA_idx` (`id_status_nota`),
  CONSTRAINT `FK_NOTA_CREDITO_STATUS_NOTA` FOREIGN KEY (`id_status_nota`) REFERENCES `eb_status_nota` (`id_status_nota`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eb_nota_credito`
--

LOCK TABLES `eb_nota_credito` WRITE;
/*!40000 ALTER TABLE `eb_nota_credito` DISABLE KEYS */;
/*!40000 ALTER TABLE `eb_nota_credito` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eb_perfil`
--

DROP TABLE IF EXISTS `eb_perfil`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eb_perfil` (
  `id_perfil` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) COLLATE utf8_bin NOT NULL,
  `ativo` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_perfil`),
  UNIQUE KEY `id_perfil_UNIQUE` (`id_perfil`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eb_perfil`
--

LOCK TABLES `eb_perfil` WRITE;
/*!40000 ALTER TABLE `eb_perfil` DISABLE KEYS */;
INSERT INTO `eb_perfil` VALUES (1,'super',1),(2,'admin',1),(3,'diretor',1),(4,'supervisor',1),(5,'gerente',1),(6,'coordenador',1),(7,'operacional',1),(8,'vendedor_auto',1),(9,'recepção',1),(10,'portaria',1),(11,'consultor_oficina',1),(12,'vendedor_pecas',1),(13,'usuario',1),(14,'admin',1);
/*!40000 ALTER TABLE `eb_perfil` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eb_produto`
--

DROP TABLE IF EXISTS `eb_produto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eb_produto` (
  `id_produto` int(11) NOT NULL AUTO_INCREMENT,
  `id_empresa` int(11) NOT NULL,
  `chassi` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `valor` float DEFAULT '0',
  `moeda` char(3) COLLATE utf8_bin NOT NULL DEFAULT 'R$',
  `cor` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `ano_fabricacao` char(4) COLLATE utf8_bin DEFAULT NULL,
  `ano_modelo` char(4) COLLATE utf8_bin DEFAULT NULL,
  `ativo` tinyint(1) NOT NULL DEFAULT '1',
  `excluido` tinyint(1) NOT NULL DEFAULT '0',
  `id_fornecedor` int(11) DEFAULT NULL,
  `id_status_produto` int(11) DEFAULT NULL,
  `id_subsegmento` int(20) NOT NULL,
  `dt_cadastro` datetime DEFAULT NULL,
  `dt_atualizacao` datetime DEFAULT CURRENT_TIMESTAMP,
  `id_campanha` int(11) DEFAULT NULL,
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id_produto`),
  UNIQUE KEY `id_produto_UNIQUE` (`id_produto`),
  KEY `FK_PRODUTO_EMPRESA_idx` (`id_empresa`),
  KEY `FK_PRODUTO_FORNECEDOR_idx` (`id_fornecedor`),
  KEY `FK_PRODUTO_STATUS_PRODUTO_idx` (`id_status_produto`),
  KEY `FK_PRODUTO_STATUS_PRECO_idx` (`id_subsegmento`),
  KEY `FK_PRODUTO_CAMPANHA_idx` (`id_campanha`),
  KEY `FK_PRODUTO_USUARIO_idx` (`id_usuario`),
  CONSTRAINT `FK_PRODUTO_CAMPANHA` FOREIGN KEY (`id_campanha`) REFERENCES `eb_campanha` (`id_campanha`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_PRODUTO_EMPRESA` FOREIGN KEY (`id_empresa`) REFERENCES `eb_empresa` (`id_empresa`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_PRODUTO_FORNECEDOR` FOREIGN KEY (`id_fornecedor`) REFERENCES `eb_fornecedor` (`id_fornecedor`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_PRODUTO_STATUS_PRECO` FOREIGN KEY (`id_subsegmento`) REFERENCES `eb_subseguimento` (`id_subsegmento`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_PRODUTO_STATUS_PRODUTO` FOREIGN KEY (`id_status_produto`) REFERENCES `eb_status_produto` (`id_status_tarefa`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_PRODUTO_USUARIO` FOREIGN KEY (`id_usuario`) REFERENCES `eb_usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eb_produto`
--

LOCK TABLES `eb_produto` WRITE;
/*!40000 ALTER TABLE `eb_produto` DISABLE KEYS */;
/*!40000 ALTER TABLE `eb_produto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eb_produto_ notificacao`
--

DROP TABLE IF EXISTS `eb_produto_ notificacao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eb_produto_ notificacao` (
  `id_produto_notificacao` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL,
  `id_usuario_criador` int(11) DEFAULT NULL,
  `id_usuario_responsavel` int(11) DEFAULT NULL,
  `dt_notificacao` datetime NOT NULL,
  `mensagem` text COLLATE utf8_bin NOT NULL,
  `ativo` tinyint(1) DEFAULT '1',
  `dt_cadastro` datetime DEFAULT NULL,
  PRIMARY KEY (`id_produto_notificacao`),
  KEY `FK_PRODUTO_NOTIFICACAO_PRODUTO_idx` (`id_produto`),
  KEY `FK_PRODUTO_NOTIFICACAO_USUARIO_idx` (`id_usuario_criador`),
  KEY `FK_PRODUTO_NOTIFICACAO_USUARIO_RESPONSAVEL` (`id_usuario_responsavel`),
  CONSTRAINT `FK_PRODUTO_NOTIFICACAO_PRODUTO` FOREIGN KEY (`id_produto`) REFERENCES `eb_produto` (`id_produto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_PRODUTO_NOTIFICACAO_USUARIO` FOREIGN KEY (`id_usuario_criador`) REFERENCES `eb_usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_PRODUTO_NOTIFICACAO_USUARIO_RESPONSAVEL` FOREIGN KEY (`id_usuario_responsavel`) REFERENCES `eb_usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eb_produto_ notificacao`
--

LOCK TABLES `eb_produto_ notificacao` WRITE;
/*!40000 ALTER TABLE `eb_produto_ notificacao` DISABLE KEYS */;
/*!40000 ALTER TABLE `eb_produto_ notificacao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eb_produto_anexo`
--

DROP TABLE IF EXISTS `eb_produto_anexo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eb_produto_anexo` (
  `id_produto` int(11) NOT NULL AUTO_INCREMENT,
  `anexo` text COLLATE utf8_bin,
  PRIMARY KEY (`id_produto`),
  CONSTRAINT `FK_produto_anexo_produto` FOREIGN KEY (`id_produto`) REFERENCES `eb_produto` (`id_produto`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eb_produto_anexo`
--

LOCK TABLES `eb_produto_anexo` WRITE;
/*!40000 ALTER TABLE `eb_produto_anexo` DISABLE KEYS */;
/*!40000 ALTER TABLE `eb_produto_anexo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eb_produto_nfe`
--

DROP TABLE IF EXISTS `eb_produto_nfe`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eb_produto_nfe` (
  `id_produto` int(11) NOT NULL,
  `id_nfe` int(11) NOT NULL,
  PRIMARY KEY (`id_produto`,`id_nfe`),
  KEY `FK_NFE_PRODUTO_NFE_idx` (`id_nfe`),
  CONSTRAINT `FK_NFE_PRODUTO_NFE` FOREIGN KEY (`id_nfe`) REFERENCES `eb_nfe` (`id_nfe`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_NFE_PRODUTO_PRODUTO` FOREIGN KEY (`id_produto`) REFERENCES `eb_produto` (`id_produto`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eb_produto_nfe`
--

LOCK TABLES `eb_produto_nfe` WRITE;
/*!40000 ALTER TABLE `eb_produto_nfe` DISABLE KEYS */;
/*!40000 ALTER TABLE `eb_produto_nfe` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eb_produto_nota_credito`
--

DROP TABLE IF EXISTS `eb_produto_nota_credito`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eb_produto_nota_credito` (
  `id_produto` int(11) NOT NULL,
  `id_nota_credito` int(11) NOT NULL,
  PRIMARY KEY (`id_produto`,`id_nota_credito`),
  KEY `FK_PRODUTO_NOTA_NOTA_idx` (`id_nota_credito`),
  CONSTRAINT `FK_PRODUTO_NOTA_NOTA` FOREIGN KEY (`id_nota_credito`) REFERENCES `eb_nota_credito` (`id_nota_credito`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_PRODUTO_NOTA_PRODUTO` FOREIGN KEY (`id_produto`) REFERENCES `eb_produto` (`id_produto`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eb_produto_nota_credito`
--

LOCK TABLES `eb_produto_nota_credito` WRITE;
/*!40000 ALTER TABLE `eb_produto_nota_credito` DISABLE KEYS */;
/*!40000 ALTER TABLE `eb_produto_nota_credito` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eb_regional`
--

DROP TABLE IF EXISTS `eb_regional`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eb_regional` (
  `id_regional` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(150) COLLATE utf8_bin NOT NULL,
  `ativo` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_regional`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eb_regional`
--

LOCK TABLES `eb_regional` WRITE;
/*!40000 ALTER TABLE `eb_regional` DISABLE KEYS */;
/*!40000 ALTER TABLE `eb_regional` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eb_regra`
--

DROP TABLE IF EXISTS `eb_regra`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eb_regra` (
  `id_regra` int(20) NOT NULL AUTO_INCREMENT,
  `nome` varchar(150) COLLATE utf8_bin NOT NULL,
  `valor` float DEFAULT NULL,
  `id_tipo_valor` int(11) DEFAULT NULL,
  `previsao` char(3) COLLATE utf8_bin DEFAULT '10' COMMENT 'Quantidade de dias para o sistema começar a notificar o usuário sobre a vigoração da regra, efetivamente é o prazo em que o usuário deverá estar recebendo a bonificacao ou o desconto.',
  `id_regra_tipo` int(11) NOT NULL,
  `dt_inicio` datetime DEFAULT NULL,
  `dt_fim` datetime DEFAULT CURRENT_TIMESTAMP,
  `ativo` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id_regra`),
  KEY `FK_REGRA_VENDA_TIPO_idx` (`id_regra_tipo`),
  KEY `FK_REGRA_TIPO_VALOR_idx` (`id_tipo_valor`),
  CONSTRAINT `FK_REGRA_TIPO_VALOR` FOREIGN KEY (`id_tipo_valor`) REFERENCES `eb_regra_tipo_valor` (`id_tipo_valor`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_REGRA_VENDA_TIPO` FOREIGN KEY (`id_regra_tipo`) REFERENCES `eb_regra_tipo` (`id_regra_tipo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eb_regra`
--

LOCK TABLES `eb_regra` WRITE;
/*!40000 ALTER TABLE `eb_regra` DISABLE KEYS */;
/*!40000 ALTER TABLE `eb_regra` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eb_regra_empresa`
--

DROP TABLE IF EXISTS `eb_regra_empresa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eb_regra_empresa` (
  `id_regra` int(11) NOT NULL,
  `id_empresa` int(11) NOT NULL,
  PRIMARY KEY (`id_regra`,`id_empresa`),
  KEY `FK_REGRA_EMPRESA_EMPRESA_idx` (`id_empresa`),
  CONSTRAINT `FK_REGRA_EMPRESA_EMPRESA` FOREIGN KEY (`id_empresa`) REFERENCES `eb_empresa` (`id_empresa`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_REGRA_EMPRESA_REGRA` FOREIGN KEY (`id_regra`) REFERENCES `eb_regra` (`id_regra`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eb_regra_empresa`
--

LOCK TABLES `eb_regra_empresa` WRITE;
/*!40000 ALTER TABLE `eb_regra_empresa` DISABLE KEYS */;
/*!40000 ALTER TABLE `eb_regra_empresa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eb_regra_segmento`
--

DROP TABLE IF EXISTS `eb_regra_segmento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eb_regra_segmento` (
  `id_regra` int(11) NOT NULL,
  `id_segmento` int(11) NOT NULL,
  PRIMARY KEY (`id_regra`,`id_segmento`),
  KEY `FK_REGRA_SEGMENTO_SEGMENTO_idx` (`id_segmento`),
  CONSTRAINT `FK_REGRA_SEGMENTO_REGRA` FOREIGN KEY (`id_regra`) REFERENCES `eb_regra` (`id_regra`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_REGRA_SEGMENTO_SEGMENTO` FOREIGN KEY (`id_segmento`) REFERENCES `eb_segmento` (`id_segmento`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eb_regra_segmento`
--

LOCK TABLES `eb_regra_segmento` WRITE;
/*!40000 ALTER TABLE `eb_regra_segmento` DISABLE KEYS */;
/*!40000 ALTER TABLE `eb_regra_segmento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eb_regra_tipo`
--

DROP TABLE IF EXISTS `eb_regra_tipo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eb_regra_tipo` (
  `id_regra_tipo` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) COLLATE utf8_bin NOT NULL,
  `descricao` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `ativo` tinyint(1) DEFAULT '1',
  `dt_atualizacao` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_regra_tipo`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eb_regra_tipo`
--

LOCK TABLES `eb_regra_tipo` WRITE;
/*!40000 ALTER TABLE `eb_regra_tipo` DISABLE KEYS */;
INSERT INTO `eb_regra_tipo` VALUES (1,'FA','Faturamento direto',1,NULL),(2,'Aquisição','Compra para estoque ou aquisição',1,NULL);
/*!40000 ALTER TABLE `eb_regra_tipo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eb_regra_tipo_valor`
--

DROP TABLE IF EXISTS `eb_regra_tipo_valor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eb_regra_tipo_valor` (
  `id_tipo_valor` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) COLLATE utf8_bin NOT NULL,
  `ativo` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id_tipo_valor`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eb_regra_tipo_valor`
--

LOCK TABLES `eb_regra_tipo_valor` WRITE;
/*!40000 ALTER TABLE `eb_regra_tipo_valor` DISABLE KEYS */;
INSERT INTO `eb_regra_tipo_valor` VALUES (1,'moeda',1),(2,'percentual',1);
/*!40000 ALTER TABLE `eb_regra_tipo_valor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eb_segmento`
--

DROP TABLE IF EXISTS `eb_segmento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eb_segmento` (
  `id_segmento` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `ativo` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id_segmento`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eb_segmento`
--

LOCK TABLES `eb_segmento` WRITE;
/*!40000 ALTER TABLE `eb_segmento` DISABLE KEYS */;
INSERT INTO `eb_segmento` VALUES (1,'pesados',1),(2,'semi pesados',1),(3,'medios',1),(4,'semi medios',1),(5,'leves',1);
/*!40000 ALTER TABLE `eb_segmento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eb_status_nota`
--

DROP TABLE IF EXISTS `eb_status_nota`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eb_status_nota` (
  `id_status_nota` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) COLLATE utf8_bin NOT NULL,
  `dt_atualizacao` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_status_nota`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eb_status_nota`
--

LOCK TABLES `eb_status_nota` WRITE;
/*!40000 ALTER TABLE `eb_status_nota` DISABLE KEYS */;
INSERT INTO `eb_status_nota` VALUES (1,'ok',NULL),(2,'divergente',NULL),(3,'recebida',NULL);
/*!40000 ALTER TABLE `eb_status_nota` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eb_status_produto`
--

DROP TABLE IF EXISTS `eb_status_produto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eb_status_produto` (
  `id_status_tarefa` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) COLLATE utf8_bin NOT NULL,
  `descricao` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `ativo` tinyint(1) DEFAULT '1',
  `dt_atualizacao` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_status_tarefa`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eb_status_produto`
--

LOCK TABLES `eb_status_produto` WRITE;
/*!40000 ALTER TABLE `eb_status_produto` DISABLE KEYS */;
INSERT INTO `eb_status_produto` VALUES (1,'proposta de compra','Processo de compra de veiculo iniciado',1,NULL),(2,'proposta de compra negada','Processo finalizado para aquisições finalizado como negado.',1,NULL),(3,'pedido de compra','Quando a proposta de compra foi aceita',1,NULL),(4,'pedido de compra em analise','Quando o pedido de compra foi aprovado e, agora esta esperando resposta da fábrica',1,NULL),(5,'pedido de compra aguardando nota fiscal','O pedido esta entrando no período de espera para a nota fiscal',1,NULL),(6,'pedido de compra em analise da nota fiscal','O pedido recebeu a nota fiscal e esta esperando aprovação dos valores da nota fiscal.',1,NULL),(7,'pedido de compra nota fiscal rejeitada','A nota fiscal do pedido foi rejeitada',1,NULL),(8,'pedido de compra aguardando nota crédito','O pedido de compra esta aguardando a nota de credito para validação.',1,NULL),(9,'pedido de compra em analise da nota de credito','A nota de crédito do pedido esta em analise',1,NULL),(10,'pedido de compra nota de credito rejeitada','O pedido de compra rejeitou a nota e espera aprovação.',1,NULL),(11,'pedido de compra aguardando entrega','O pedido de compra esta aguardando a entrega do produto.',1,NULL),(12,'pedido de compra finalizado','O pedido de compra foi finalizado com sucesso',1,NULL),(13,'pedido de compra cancelado','O pedido de compra foi cancelado',1,NULL);
/*!40000 ALTER TABLE `eb_status_produto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eb_status_tarefa`
--

DROP TABLE IF EXISTS `eb_status_tarefa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eb_status_tarefa` (
  `id_status_tarefa` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) COLLATE utf8_bin NOT NULL,
  `ativo` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id_status_tarefa`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eb_status_tarefa`
--

LOCK TABLES `eb_status_tarefa` WRITE;
/*!40000 ALTER TABLE `eb_status_tarefa` DISABLE KEYS */;
INSERT INTO `eb_status_tarefa` VALUES (1,'Pendente',1),(2,'Realizada',1),(3,'Nao Relizada',1);
/*!40000 ALTER TABLE `eb_status_tarefa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eb_status_venda`
--

DROP TABLE IF EXISTS `eb_status_venda`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eb_status_venda` (
  `id_status_venda` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) COLLATE utf8_bin NOT NULL,
  `descricao` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `ativo` tinyint(1) DEFAULT '1',
  `dt_atualizacao` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_status_venda`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eb_status_venda`
--

LOCK TABLES `eb_status_venda` WRITE;
/*!40000 ALTER TABLE `eb_status_venda` DISABLE KEYS */;
INSERT INTO `eb_status_venda` VALUES (1,'Proposta de venda','Iniciado o processo de venda',1,NULL),(2,'Proposta de venda negada','Proposta de venda negada',1,NULL);
/*!40000 ALTER TABLE `eb_status_venda` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eb_subseguimento`
--

DROP TABLE IF EXISTS `eb_subseguimento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eb_subseguimento` (
  `id_subsegmento` int(20) NOT NULL AUTO_INCREMENT,
  `id_segmento` int(11) NOT NULL,
  `modelo` varchar(200) COLLATE utf8_bin DEFAULT NULL,
  `baumaster` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `variante` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `configuracao` text COLLATE utf8_bin,
  `preco_tabela` float NOT NULL DEFAULT '0',
  `preco_min` float DEFAULT NULL,
  `preco_max` float DEFAULT NULL,
  `moeda` char(3) COLLATE utf8_bin DEFAULT 'R$',
  `dt_cadastro` datetime DEFAULT NULL,
  `ativo` tinyint(1) DEFAULT '1',
  `dt_inicio` datetime DEFAULT NULL,
  `dt_fim` datetime DEFAULT NULL,
  PRIMARY KEY (`id_subsegmento`),
  KEY `FK_PRECO_CATEGORIA_idx` (`id_segmento`),
  CONSTRAINT `FK_PRECO_CATEGORIA` FOREIGN KEY (`id_segmento`) REFERENCES `eb_segmento` (`id_segmento`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eb_subseguimento`
--

LOCK TABLES `eb_subseguimento` WRITE;
/*!40000 ALTER TABLE `eb_subseguimento` DISABLE KEYS */;
/*!40000 ALTER TABLE `eb_subseguimento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eb_tarefa`
--

DROP TABLE IF EXISTS `eb_tarefa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eb_tarefa` (
  `id_tarefa` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` text COLLATE utf8_bin NOT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `id_usuario_criador` int(11) NOT NULL,
  `id_status_tarefa` int(11) DEFAULT NULL,
  `dt_tarefa` datetime DEFAULT NULL,
  `ativo` tinyint(1) DEFAULT '1',
  `dt_cadastro` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_tarefa`),
  KEY `FK_TAREFA_CLIENTE_idx` (`id_cliente`),
  KEY `FK_TAREFA_USUARIO_idx` (`id_usuario`),
  KEY `FK_TAREFA_USUARIO_CRIADOR_idx` (`id_usuario_criador`),
  KEY `FK_TAREFA_STATUS_TAREFA_idx` (`id_status_tarefa`),
  CONSTRAINT `FK_TAREFA_CLIENTE` FOREIGN KEY (`id_cliente`) REFERENCES `eb_cliente` (`id_cliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_TAREFA_STATUS_TAREFA` FOREIGN KEY (`id_status_tarefa`) REFERENCES `eb_status_tarefa` (`id_status_tarefa`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_TAREFA_USUARIO` FOREIGN KEY (`id_usuario`) REFERENCES `eb_usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_TAREFA_USUARIO_CRIADOR` FOREIGN KEY (`id_usuario_criador`) REFERENCES `eb_usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='	';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eb_tarefa`
--

LOCK TABLES `eb_tarefa` WRITE;
/*!40000 ALTER TABLE `eb_tarefa` DISABLE KEYS */;
/*!40000 ALTER TABLE `eb_tarefa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eb_temperatura`
--

DROP TABLE IF EXISTS `eb_temperatura`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eb_temperatura` (
  `id_temperatura` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `descricao` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `ativo` tinyint(1) NOT NULL DEFAULT '1',
  `dt_cadastro` datetime DEFAULT NULL,
  PRIMARY KEY (`id_temperatura`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eb_temperatura`
--

LOCK TABLES `eb_temperatura` WRITE;
/*!40000 ALTER TABLE `eb_temperatura` DISABLE KEYS */;
INSERT INTO `eb_temperatura` VALUES (1,'frio','Quando o cliente não mostra intersse de compra',1,NULL),(2,'morno','Quando existe a possibilidade do cliente em comprar',1,NULL),(3,'quente','Quando o cliente esta pronto para compra',1,NULL);
/*!40000 ALTER TABLE `eb_temperatura` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eb_usuario`
--

DROP TABLE IF EXISTS `eb_usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eb_usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `id_perfil` int(11) NOT NULL,
  `nome` varchar(255) COLLATE utf8_bin NOT NULL,
  `imagen` text COLLATE utf8_bin,
  `email` varchar(255) COLLATE utf8_bin NOT NULL,
  `password` tinytext COLLATE utf8_bin NOT NULL,
  `token` text COLLATE utf8_bin,
  `ativo` tinyint(1) DEFAULT '1',
  `excluido` tinyint(1) DEFAULT '0',
  `dt_cadastro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `salt` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `id_usuario_responsavel` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `id_usuario_UNIQUE` (`id_usuario`),
  KEY `FK_USUARIO_PERFIL_idx` (`id_perfil`),
  KEY `FK_USUARIO_USUARIO_idx` (`id_usuario_responsavel`),
  CONSTRAINT `FK_USUARIO_PERFIL` FOREIGN KEY (`id_perfil`) REFERENCES `eb_perfil` (`id_perfil`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_USUARIO_USUARIO` FOREIGN KEY (`id_usuario_responsavel`) REFERENCES `eb_usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eb_usuario`
--

LOCK TABLES `eb_usuario` WRITE;
/*!40000 ALTER TABLE `eb_usuario` DISABLE KEYS */;
INSERT INTO `eb_usuario` VALUES (1,1,'leads','bundles/principal/images/avatar.png','leads@leads.com','u7MPHyBBR2ubgc9oEKQCEndN+xQqpcyFABM5/uPfRlt7nF+GdfV1le6psh8a/Z/LVmK/UlIBmbyEYIUkribnjw==',NULL,1,0,'2015-07-02 20:01:17','k6uvmi6zro0cw4o8cgk084c8woc0k04',NULL),(2,7,'venda','bundles/principal/images/avatar.png','venda@leads.com','+qqUOMrn6Evc4SIpAPu3xfhBzEvK08FE/fX90i0Xeuz79UbSenJosynBQ==',NULL,1,0,'2015-07-02 20:01:17','nt3s8pycresg4gwwwssswso8k88k8cs',NULL),(3,7,'user','bundles/principal/images/avatar.png','user@teste.com','iV2UlLvTjof8hf516UHCnE9VH+i1A+qqUOMrn6Evc4SIpAPu3xfhBzEvK08FE/fX90i0Xeuz79UbSenJosynBQ==',NULL,1,0,'2015-07-02 20:52:00','nt3s8pycresg4gwwwssswso8k88k8cs',NULL),(4,1,'admin','bundles/principal/images/avatar.png','admin@teste.com','u7MPHyBBR2ubgc9oEKQCEndN+xQqpcyFABM5/uPfRlt7nF+GdfV1le6psh8a/Z/LVmK/UlIBmbyEYIUkribnjw==',NULL,1,0,'2015-07-02 20:52:00','k6uvmi6zro0cw4o8cgk084c8woc0k04',NULL);
/*!40000 ALTER TABLE `eb_usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eb_usuario_empresa`
--

DROP TABLE IF EXISTS `eb_usuario_empresa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eb_usuario_empresa` (
  `id_usuario` int(11) NOT NULL,
  `id_empresa` int(11) NOT NULL,
  PRIMARY KEY (`id_usuario`,`id_empresa`),
  KEY `FK_USUARIO_idx` (`id_usuario`),
  KEY `FK_EMPRESA_USUARIO_EMPRESA_idx` (`id_empresa`),
  CONSTRAINT `FK_EMPRESA_USUARIO_EMPRESA` FOREIGN KEY (`id_empresa`) REFERENCES `eb_empresa` (`id_empresa`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_USUARIO_USUARIO_EMPRESA` FOREIGN KEY (`id_usuario`) REFERENCES `eb_usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eb_usuario_empresa`
--

LOCK TABLES `eb_usuario_empresa` WRITE;
/*!40000 ALTER TABLE `eb_usuario_empresa` DISABLE KEYS */;
/*!40000 ALTER TABLE `eb_usuario_empresa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eb_usuario_escala`
--

DROP TABLE IF EXISTS `eb_usuario_escala`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eb_usuario_escala` (
  `id_usuario_escala` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `tipo` char(1) COLLATE utf8_bin DEFAULT NULL,
  `dia0_i` varchar(5) COLLATE utf8_bin DEFAULT NULL,
  `dia0_f` varchar(5) COLLATE utf8_bin DEFAULT NULL,
  `dia1_i` varchar(5) COLLATE utf8_bin DEFAULT NULL,
  `dia1_f` varchar(5) COLLATE utf8_bin DEFAULT NULL,
  `dia2_i` varchar(5) COLLATE utf8_bin DEFAULT NULL,
  `dia2_f` varchar(5) COLLATE utf8_bin DEFAULT NULL,
  `dia3_i` varchar(5) COLLATE utf8_bin DEFAULT NULL,
  `dia3_f` varchar(5) COLLATE utf8_bin DEFAULT NULL,
  `dia4_i` varchar(5) COLLATE utf8_bin DEFAULT NULL,
  `dia4_f` varchar(5) COLLATE utf8_bin DEFAULT NULL,
  `dia5_i` varchar(5) COLLATE utf8_bin DEFAULT NULL,
  `dia5_f` varchar(5) COLLATE utf8_bin DEFAULT NULL,
  `dia6_i` varchar(5) COLLATE utf8_bin DEFAULT NULL,
  `dia6_f` varchar(5) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id_usuario_escala`),
  KEY `fk_eb_usuario_escala_usuario` (`id_usuario`),
  CONSTRAINT `fk_eb_usuario_escala_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `eb_usuario` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eb_usuario_escala`
--

LOCK TABLES `eb_usuario_escala` WRITE;
/*!40000 ALTER TABLE `eb_usuario_escala` DISABLE KEYS */;
/*!40000 ALTER TABLE `eb_usuario_escala` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eb_venda`
--

DROP TABLE IF EXISTS `eb_venda`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eb_venda` (
  `id_venda` int(11) NOT NULL AUTO_INCREMENT,
  `id_cliente` int(11) NOT NULL,
  `id_status_venda` int(11) NOT NULL DEFAULT '1',
  `id_campanha` int(11) DEFAULT NULL,
  `valor` float DEFAULT NULL,
  `moeda` char(3) COLLATE utf8_bin DEFAULT NULL,
  `dt_cadastro` datetime DEFAULT NULL,
  `dt_atualizacao` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_venda`),
  KEY `FK_VENDA_CLIENTE_idx` (`id_cliente`),
  KEY `FK_VENDA_STATUS_VENDA_idx` (`id_status_venda`),
  KEY `FK_VENDA_CAMPANHA_idx` (`id_campanha`),
  CONSTRAINT `FK_VENDA_CAMPANHA` FOREIGN KEY (`id_campanha`) REFERENCES `eb_campanha` (`id_campanha`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_VENDA_CLIENTE` FOREIGN KEY (`id_cliente`) REFERENCES `eb_cliente` (`id_cliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_VENDA_STATUS_VENDA` FOREIGN KEY (`id_status_venda`) REFERENCES `eb_status_venda` (`id_status_venda`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eb_venda`
--

LOCK TABLES `eb_venda` WRITE;
/*!40000 ALTER TABLE `eb_venda` DISABLE KEYS */;
/*!40000 ALTER TABLE `eb_venda` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eb_venda_produto`
--

DROP TABLE IF EXISTS `eb_venda_produto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eb_venda_produto` (
  `id_produto` int(11) NOT NULL,
  `id_venda` int(11) NOT NULL,
  PRIMARY KEY (`id_produto`,`id_venda`),
  KEY `FK_VENDA_PRODUTO_VENDA_idx` (`id_venda`),
  CONSTRAINT `FK_VENDA_PRODUTO_PRODUTO` FOREIGN KEY (`id_produto`) REFERENCES `eb_produto` (`id_produto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_VENDA_PRODUTO_VENDA` FOREIGN KEY (`id_venda`) REFERENCES `eb_venda` (`id_venda`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='			';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eb_venda_produto`
--

LOCK TABLES `eb_venda_produto` WRITE;
/*!40000 ALTER TABLE `eb_venda_produto` DISABLE KEYS */;
/*!40000 ALTER TABLE `eb_venda_produto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eb_venda_regra`
--

DROP TABLE IF EXISTS `eb_venda_regra`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eb_venda_regra` (
  `id_venda` int(11) NOT NULL,
  `id_regra` int(11) NOT NULL,
  PRIMARY KEY (`id_venda`,`id_regra`),
  KEY `FK_VENDA_REGRA_REGRA_idx` (`id_regra`),
  CONSTRAINT `FK_VENDA_REGRA_REGRA` FOREIGN KEY (`id_regra`) REFERENCES `eb_regra` (`id_regra`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_VENDA_REGRA_VENDA` FOREIGN KEY (`id_venda`) REFERENCES `eb_venda` (`id_venda`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eb_venda_regra`
--

LOCK TABLES `eb_venda_regra` WRITE;
/*!40000 ALTER TABLE `eb_venda_regra` DISABLE KEYS */;
/*!40000 ALTER TABLE `eb_venda_regra` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_cep`
--

DROP TABLE IF EXISTS `tb_cep`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_cep` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `cep` varchar(8) COLLATE latin1_general_ci NOT NULL,
  `logradouro` varchar(90) CHARACTER SET latin1 NOT NULL,
  `bairro` varchar(50) CHARACTER SET latin1 NOT NULL,
  `cidade` varchar(50) CHARACTER SET latin1 NOT NULL,
  `estado` char(2) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_tb_cep_01` (`cep`),
  KEY `idx_tb_cep_02` (`estado`,`cidade`(4),`bairro`(4),`logradouro`(4))
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci COMMENT='Tabela que armazena todos os ceps e endereços do Brasil';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_cep`
--

LOCK TABLES `tb_cep` WRITE;
/*!40000 ALTER TABLE `tb_cep` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_cep` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-07-03  9:26:56
