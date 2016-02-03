-- MySQL Script generated by MySQL Workbench
-- 02/03/16 04:52:01
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema Lattes
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `Lattes` ;

-- -----------------------------------------------------
-- Schema Lattes
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `Lattes` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `Lattes` ;

-- -----------------------------------------------------
-- Table `dim_pessoa`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `dim_pessoa` ;

CREATE TABLE IF NOT EXISTS `dim_pessoa` (
  `id_user` BIGINT NOT NULL COMMENT '',
  `nm_user` VARCHAR(150) NOT NULL COMMENT '',
  `citacao` VARCHAR(150) NOT NULL COMMENT '',
  PRIMARY KEY (`id_user`)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dim_tempo`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `dim_tempo` ;

CREATE TABLE IF NOT EXISTS `dim_tempo` (
  `id_tempo` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `ano_inicial` INT NOT NULL COMMENT '',
  `mes_inicial` INT NULL COMMENT '',
  `ano_final` INT NULL COMMENT '',
  `mes_final` INT NULL COMMENT '',
  PRIMARY KEY (`id_tempo`)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `fat_projeto`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `fat_projeto` ;

CREATE TABLE IF NOT EXISTS `fat_projeto` (
  `id_user` BIGINT NOT NULL COMMENT '',
  `id_tempo` INT NOT NULL COMMENT '',
  `tipo` LONGTEXT NOT NULL COMMENT '',
  `titulo` VARCHAR(45) NOT NULL COMMENT '',
  `descricao` LONGTEXT NULL COMMENT '',
  `situacao` VARCHAR(100) NULL COMMENT '',
  `natureza` VARCHAR(100) NULL COMMENT '',
  `alunos` VARCHAR(255) NULL COMMENT '',
  `integrantes` LONGTEXT NULL COMMENT '',
  `financiador` VARCHAR(255) NULL COMMENT '',
  `producoes` INT NULL COMMENT '',
  INDEX `fk_Projetos_Tempo1_idx` (`id_tempo` ASC)  COMMENT '',
  PRIMARY KEY (`id_user`, `id_tempo`)  COMMENT '',
  INDEX `fk_Projetos_dim_Pessoa1_idx` (`id_user` ASC)  COMMENT '',
  CONSTRAINT `fk_Projetos_Tempo1`
    FOREIGN KEY (`id_tempo`)
    REFERENCES `dim_tempo` (`id_tempo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Projetos_dim_Pessoa1`
    FOREIGN KEY (`id_user`)
    REFERENCES `dim_pessoa` (`id_user`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `fat_formacao`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `fat_formacao` ;

CREATE TABLE IF NOT EXISTS `fat_formacao` (
  `id_user` BIGINT NOT NULL COMMENT '',
  `id_tempo` INT NOT NULL COMMENT '',
  `nivel` LONGTEXT NOT NULL COMMENT '',
  `curso` LONGTEXT NOT NULL COMMENT '',
  `local` VARCHAR(255) NOT NULL COMMENT '',
  `titulo` VARCHAR(255) NULL COMMENT '',
  `orientador` VARCHAR(255) NULL COMMENT '',
  `bolsa` VARCHAR(45) NULL COMMENT '',
  `keywords` LONGTEXT NULL COMMENT '',
  `setor` VARCHAR(255) NULL COMMENT '',
  PRIMARY KEY (`id_user`, `id_tempo`)  COMMENT '',
  INDEX `fk_Formacao_Geral_idx` (`id_user` ASC)  COMMENT '',
  INDEX `fk_Formacao_Tempo1_idx` (`id_tempo` ASC)  COMMENT '',
  CONSTRAINT `fk_Formacao_Geral`
    FOREIGN KEY (`id_user`)
    REFERENCES `dim_pessoa` (`id_user`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Formacao_Tempo1`
    FOREIGN KEY (`id_tempo`)
    REFERENCES `dim_tempo` (`id_tempo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `fat_atuacao`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `fat_atuacao` ;

CREATE TABLE IF NOT EXISTS `fat_atuacao` (
  `id_user` BIGINT NOT NULL COMMENT '',
  `id_tempo` INT NOT NULL COMMENT '',
  `instituicao` VARCHAR(150) NOT NULL COMMENT '',
  `tipo_vinculo` VARCHAR(45) NULL COMMENT '',
  `enq_funcional` VARCHAR(45) NULL COMMENT '',
  `carga_horaria` INT NULL COMMENT '',
  INDEX `fk_Atuacao_Geral1_idx` (`id_user` ASC)  COMMENT '',
  INDEX `fk_Atuacao_Tempo1_idx` (`id_tempo` ASC)  COMMENT '',
  PRIMARY KEY (`id_user`, `id_tempo`)  COMMENT '',
  CONSTRAINT `fk_Atuacao_Geral1`
    FOREIGN KEY (`id_user`)
    REFERENCES `dim_pessoa` (`id_user`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Atuacao_Tempo1`
    FOREIGN KEY (`id_tempo`)
    REFERENCES `dim_tempo` (`id_tempo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dim_cadastro`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `dim_cadastro` ;

CREATE TABLE IF NOT EXISTS `dim_cadastro` (
  `id_dataCadastro` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `data_cadastro` DATE NOT NULL COMMENT '',
  PRIMARY KEY (`id_dataCadastro`)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `fat_idioma`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `fat_idioma` ;

CREATE TABLE IF NOT EXISTS `fat_idioma` (
  `id_user` BIGINT NOT NULL COMMENT '',
  `data_cadastro` INT NOT NULL COMMENT '',
  `idioma` VARCHAR(45) NOT NULL COMMENT '',
  `le` VARCHAR(45) NOT NULL COMMENT '',
  `fala` VARCHAR(45) NOT NULL COMMENT '',
  `escreve` VARCHAR(45) NOT NULL COMMENT '',
  `compreende` VARCHAR(45) NOT NULL COMMENT '',
  PRIMARY KEY (`id_user`, `data_cadastro`)  COMMENT '',
  INDEX `fk_idioma_Geral1_idx` (`id_user` ASC)  COMMENT '',
  INDEX `fk_fat_idioma_dim_cadastro1_idx` (`data_cadastro` ASC)  COMMENT '',
  CONSTRAINT `fk_idioma_Geral1`
    FOREIGN KEY (`id_user`)
    REFERENCES `dim_pessoa` (`id_user`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_fat_idioma_dim_cadastro1`
    FOREIGN KEY (`data_cadastro`)
    REFERENCES `dim_cadastro` (`id_dataCadastro`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `fat_pesquisa`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `fat_pesquisa` ;

CREATE TABLE IF NOT EXISTS `fat_pesquisa` (
  `id_user` BIGINT NOT NULL COMMENT '',
  `data_cadastro` INT NOT NULL COMMENT '',
  `descricao` VARCHAR(100) NOT NULL COMMENT '',
  PRIMARY KEY (`id_user`, `data_cadastro`)  COMMENT '',
  INDEX `fk_Pesquisa_Geral1_idx` (`id_user` ASC)  COMMENT '',
  INDEX `fk_fat_pesquisa_dim_cadastro1_idx` (`data_cadastro` ASC)  COMMENT '',
  CONSTRAINT `fk_Pesquisa_Geral1`
    FOREIGN KEY (`id_user`)
    REFERENCES `dim_pessoa` (`id_user`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_fat_pesquisa_dim_cadastro1`
    FOREIGN KEY (`data_cadastro`)
    REFERENCES `dim_cadastro` (`id_dataCadastro`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ref_endereco`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ref_endereco` ;

CREATE TABLE IF NOT EXISTS `ref_endereco` (
  `id_endereco` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `id_user` BIGINT NOT NULL COMMENT '',
  `local` VARCHAR(45) NOT NULL COMMENT '',
  `cep` VARCHAR(12) NOT NULL COMMENT '',
  `estado` VARCHAR(45) NULL COMMENT '',
  `cidade` VARCHAR(150) NULL COMMENT '',
  `bairro` VARCHAR(150) NULL COMMENT '',
  `logradouro` LONGTEXT NULL COMMENT '',
  `latitude` FLOAT NULL COMMENT '',
  `longitude` FLOAT NULL COMMENT '',
  PRIMARY KEY (`id_endereco`)  COMMENT '',
  INDEX `fk_ref_Endereco_dim_pessoa1_idx` (`id_user` ASC)  COMMENT '',
  CONSTRAINT `fk_ref_Endereco_dim_pessoa1`
    FOREIGN KEY (`id_user`)
    REFERENCES `dim_pessoa` (`id_user`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `fat_premio`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `fat_premio` ;

CREATE TABLE IF NOT EXISTS `fat_premio` (
  `id_user` BIGINT NOT NULL COMMENT '',
  `id_tempo` INT NOT NULL COMMENT '',
  `nome` VARCHAR(45) NOT NULL COMMENT '',
  `entidade` VARCHAR(45) NOT NULL COMMENT '',
  INDEX `fk_Premios_Tempo1_idx` (`id_tempo` ASC)  COMMENT '',
  INDEX `fk_Premios_Geral1_idx` (`id_user` ASC)  COMMENT '',
  PRIMARY KEY (`id_user`, `id_tempo`)  COMMENT '',
  CONSTRAINT `fk_Premios_Tempo1`
    FOREIGN KEY (`id_tempo`)
    REFERENCES `dim_tempo` (`id_tempo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Premios_Geral1`
    FOREIGN KEY (`id_user`)
    REFERENCES `dim_pessoa` (`id_user`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `curriculum`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `curriculum` ;

CREATE TABLE IF NOT EXISTS `curriculum` (
  `data_cadastro` INT NOT NULL COMMENT '',
  `id_curriculo` BIGINT NOT NULL COMMENT '',
  `nome` VARCHAR(255) NOT NULL COMMENT '',
  `url` VARCHAR(200) NOT NULL COMMENT '',
  `content` MEDIUMBLOB NOT NULL COMMENT '',
  PRIMARY KEY (`id_curriculo`, `data_cadastro`)  COMMENT '',
  INDEX `fk_curriculum_dim_cadastro1_idx` (`data_cadastro` ASC)  COMMENT '',
  CONSTRAINT `fk_curriculum_dim_cadastro1`
    FOREIGN KEY (`data_cadastro`)
    REFERENCES `dim_cadastro` (`id_dataCadastro`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `fat_corpoEditorial`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `fat_corpoEditorial` ;

CREATE TABLE IF NOT EXISTS `fat_corpoEditorial` (
  `id_user` BIGINT NOT NULL COMMENT '',
  `id_tempo` INT NOT NULL COMMENT '',
  `editorial` LONGTEXT NOT NULL COMMENT '',
  INDEX `fk_CorpoEditorial_Tempo1_idx` (`id_tempo` ASC)  COMMENT '',
  PRIMARY KEY (`id_user`, `id_tempo`)  COMMENT '',
  INDEX `fk_CorpoEditorial_Geral1_idx` (`id_user` ASC)  COMMENT '',
  CONSTRAINT `fk_CorpoEditorial_Tempo1`
    FOREIGN KEY (`id_tempo`)
    REFERENCES `dim_tempo` (`id_tempo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_CorpoEditorial_Geral1`
    FOREIGN KEY (`id_user`)
    REFERENCES `dim_pessoa` (`id_user`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `fat_revisor`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `fat_revisor` ;

CREATE TABLE IF NOT EXISTS `fat_revisor` (
  `id_user` BIGINT NOT NULL COMMENT '',
  `id_tempo` INT NOT NULL COMMENT '',
  `periodico` BLOB NULL COMMENT '',
  `tipo_revisao` VARCHAR(45) NULL COMMENT '',
  `instituicao` VARCHAR(45) NULL COMMENT '',
  PRIMARY KEY (`id_user`, `id_tempo`)  COMMENT '',
  INDEX `fk_RevisorPeriodico_Tempo1_idx` (`id_tempo` ASC)  COMMENT '',
  INDEX `fk_RevisorPeriodico_Geral1_idx` (`id_user` ASC)  COMMENT '',
  CONSTRAINT `fk_RevisorPeriodico_Tempo1`
    FOREIGN KEY (`id_tempo`)
    REFERENCES `dim_tempo` (`id_tempo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_RevisorPeriodico_Geral1`
    FOREIGN KEY (`id_user`)
    REFERENCES `dim_pessoa` (`id_user`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `fat_producao`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `fat_producao` ;

CREATE TABLE IF NOT EXISTS `fat_producao` (
  `id_user` BIGINT NOT NULL COMMENT '',
  `id_tempo` INT NOT NULL COMMENT '',
  `titulo` BLOB NOT NULL COMMENT '',
  `natureza` VARCHAR(50) NULL COMMENT '',
  `tipo` VARCHAR(45) NULL COMMENT '',
  `categoria` VARCHAR(45) NULL COMMENT '',
  `keywords` LONGTEXT NULL COMMENT '',
  `areas` LONGTEXT NULL COMMENT '',
  `setor` LONGTEXT NULL COMMENT '',
  `inf_adicionais` LONGTEXT NULL COMMENT '',
  INDEX `fk_Producoes_Tempo1_idx` (`id_tempo` ASC)  COMMENT '',
  INDEX `fk_Producoes_Geral1_idx` (`id_user` ASC)  COMMENT '',
  PRIMARY KEY (`id_user`, `id_tempo`)  COMMENT '',
  CONSTRAINT `fk_Producoes_Tempo1`
    FOREIGN KEY (`id_tempo`)
    REFERENCES `dim_tempo` (`id_tempo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Producoes_Geral1`
    FOREIGN KEY (`id_user`)
    REFERENCES `dim_pessoa` (`id_user`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `fat_banca`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `fat_banca` ;

CREATE TABLE IF NOT EXISTS `fat_banca` (
  `id_user` BIGINT NOT NULL COMMENT '',
  `id_tempo` INT NOT NULL COMMENT '',
  `tipo` LONGTEXT NOT NULL COMMENT '',
  `banca` VARCHAR(255) NULL COMMENT '',
  `titulo` VARCHAR(255) NULL COMMENT '',
  `ano` VARCHAR(255) NULL COMMENT '',
  `sobre` LONGTEXT NULL COMMENT '',
  PRIMARY KEY (`id_user`, `id_tempo`)  COMMENT '',
  INDEX `fk_Bancas_Tempo1_idx` (`id_tempo` ASC)  COMMENT '',
  INDEX `fk_Bancas_Geral1_idx` (`id_user` ASC)  COMMENT '',
  CONSTRAINT `fk_Bancas_Tempo1`
    FOREIGN KEY (`id_tempo`)
    REFERENCES `dim_tempo` (`id_tempo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Bancas_Geral1`
    FOREIGN KEY (`id_user`)
    REFERENCES `dim_pessoa` (`id_user`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `fat_evento`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `fat_evento` ;

CREATE TABLE IF NOT EXISTS `fat_evento` (
  `id_user` BIGINT NOT NULL COMMENT '',
  `id_tempo` INT NOT NULL COMMENT '',
  `nome` VARCHAR(45) NOT NULL COMMENT '',
  `descricao` LONGTEXT NULL COMMENT '',
  `tipo` VARCHAR(45) NULL COMMENT '',
  PRIMARY KEY (`id_user`, `id_tempo`)  COMMENT '',
  INDEX `fk_Eventos_Tempo1_idx` (`id_tempo` ASC)  COMMENT '',
  INDEX `fk_Eventos_dim_Pessoa1_idx` (`id_user` ASC)  COMMENT '',
  CONSTRAINT `fk_Eventos_Tempo1`
    FOREIGN KEY (`id_tempo`)
    REFERENCES `dim_tempo` (`id_tempo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Eventos_dim_Pessoa1`
    FOREIGN KEY (`id_user`)
    REFERENCES `dim_pessoa` (`id_user`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `fat_orientacao`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `fat_orientacao` ;

CREATE TABLE IF NOT EXISTS `fat_orientacao` (
  `id_user` BIGINT NOT NULL COMMENT '',
  `id_tempo` INT NOT NULL COMMENT '',
  `orientado` VARCHAR(150) NULL COMMENT '',
  `descricao` LONGTEXT NULL COMMENT '',
  `tipo` VARCHAR(45) NULL COMMENT '',
  `local` VARCHAR(255) NULL COMMENT '',
  `keywords` LONGTEXT NULL COMMENT '',
  `adicionais` LONGTEXT NULL COMMENT '',
  PRIMARY KEY (`id_user`, `id_tempo`)  COMMENT '',
  INDEX `fk_Orientacoes_Tempo2_idx` (`id_tempo` ASC)  COMMENT '',
  INDEX `fk_Orientacoes_Geral2_idx` (`id_user` ASC)  COMMENT '',
  CONSTRAINT `fk_Orientacoes_Tempo2`
    FOREIGN KEY (`id_tempo`)
    REFERENCES `dim_tempo` (`id_tempo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Orientacoes_Geral2`
    FOREIGN KEY (`id_user`)
    REFERENCES `dim_pessoa` (`id_user`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `link`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `link` ;

CREATE TABLE IF NOT EXISTS `link` (
  `id_link` BIGINT NOT NULL COMMENT '',
  `url` VARCHAR(250) NOT NULL COMMENT '',
  `data_cur` DATE NULL COMMENT '',
  PRIMARY KEY (`id_link`)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `fila_process`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `fila_process` ;

CREATE TABLE IF NOT EXISTS `fila_process` (
  `url` VARCHAR(255) NOT NULL COMMENT '',
  `log` BLOB NULL COMMENT '',
  PRIMARY KEY (`url`)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `fat_patente`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `fat_patente` ;

CREATE TABLE IF NOT EXISTS `fat_patente` (
  `id_user` BIGINT NOT NULL COMMENT '',
  `id_tempo` INT NOT NULL COMMENT '',
  `titulo` LONGTEXT NOT NULL COMMENT '',
  `patente` VARCHAR(255) NULL COMMENT '',
  `numero` VARCHAR(255) NULL COMMENT '',
  `data_deposito` DATE NULL COMMENT '',
  `instituicao` LONGTEXT NULL COMMENT '',
  INDEX `fk_Patentes_dim_tempo1_idx` (`id_tempo` ASC)  COMMENT '',
  INDEX `fk_Patentes_dim_pessoa1_idx` (`id_user` ASC)  COMMENT '',
  PRIMARY KEY (`id_user`, `id_tempo`)  COMMENT '',
  CONSTRAINT `fk_Patentes_dim_tempo1`
    FOREIGN KEY (`id_tempo`)
    REFERENCES `dim_tempo` (`id_tempo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Patentes_dim_pessoa1`
    FOREIGN KEY (`id_user`)
    REFERENCES `dim_pessoa` (`id_user`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `fat_area`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `fat_area` ;

CREATE TABLE IF NOT EXISTS `fat_area` (
  `id_user` BIGINT NOT NULL COMMENT '',
  `id_tempo` INT NOT NULL COMMENT '',
  `grande_area` VARCHAR(255) NOT NULL COMMENT '',
  `area` VARCHAR(255) NULL COMMENT '',
  `sub_area` VARCHAR(255) NULL COMMENT '',
  `espec` VARCHAR(255) NULL COMMENT '',
  PRIMARY KEY (`id_user`, `id_tempo`)  COMMENT '',
  INDEX `fk_fat_area_dim_tempo1_idx` (`id_tempo` ASC)  COMMENT '',
  INDEX `fk_fat_area_dim_pessoa1_idx` (`id_user` ASC)  COMMENT '',
  CONSTRAINT `fk_fat_area_dim_tempo1`
    FOREIGN KEY (`id_tempo`)
    REFERENCES `dim_tempo` (`id_tempo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_fat_area_dim_pessoa1`
    FOREIGN KEY (`id_user`)
    REFERENCES `dim_pessoa` (`id_user`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `fat_educacaoPopularizacao`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `fat_educacaoPopularizacao` ;

CREATE TABLE IF NOT EXISTS `fat_educacaoPopularizacao` (
  `id_user` BIGINT NOT NULL COMMENT '',
  `id_tempo` INT NOT NULL COMMENT '',
  `participantes` VARCHAR(255) NOT NULL COMMENT '',
  `descricao` LONGTEXT NOT NULL COMMENT '',
  `tipo` VARCHAR(255) NOT NULL COMMENT '',
  INDEX `fk_fat_educacaoPopularizacao_dim_pessoa1_idx` (`id_user` ASC)  COMMENT '',
  INDEX `fk_fat_educacaoPopularizacao_dim_tempo1_idx` (`id_tempo` ASC)  COMMENT '',
  PRIMARY KEY (`id_tempo`, `id_user`)  COMMENT '',
  CONSTRAINT `fk_fat_educacaoPopularizacao_dim_pessoa1`
    FOREIGN KEY (`id_user`)
    REFERENCES `dim_pessoa` (`id_user`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_fat_educacaoPopularizacao_dim_tempo1`
    FOREIGN KEY (`id_tempo`)
    REFERENCES `dim_tempo` (`id_tempo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ref_informacoesAdicionais`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ref_informacoesAdicionais` ;

CREATE TABLE IF NOT EXISTS `ref_informacoesAdicionais` (
  `id_user` BIGINT NOT NULL COMMENT '',
  `id_informacao` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `informacao` LONGTEXT NOT NULL COMMENT '',
  INDEX `fk_informacoes_adicionais_dim_pessoa1_idx` (`id_user` ASC)  COMMENT '',
  PRIMARY KEY (`id_informacao`, `id_user`)  COMMENT '',
  CONSTRAINT `fk_informacoes_adicionais_dim_pessoa1`
    FOREIGN KEY (`id_user`)
    REFERENCES `dim_pessoa` (`id_user`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `xml`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `xml` ;

CREATE TABLE IF NOT EXISTS `xml` (
  `id_xml` INT NOT NULL COMMENT '',
  `file` MEDIUMBLOB NOT NULL COMMENT '',
  `data_add` DATE NOT NULL COMMENT '',
  PRIMARY KEY (`id_xml`)  COMMENT '')
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
