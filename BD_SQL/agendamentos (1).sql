SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `administrador` (
  `id_adm` int(11) NOT NULL,
  `nome_adm` varchar(45) NOT NULL,
  `login_adm` varchar(45) NOT NULL,
  `senha_adm` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


CREATE TABLE `agendamento` (
  `id_agnd` int(11) NOT NULL,
  `data_agnd` datetime NOT NULL,
  `imagem_atendimento` varchar(255) NOT NULL,
  `status_agnd` enum('espera','confirmado','desmarcado') DEFAULT 'espera',
  `descricao_tatto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


CREATE TABLE `cliente` (
  `id_clt` int(11) NOT NULL,
  `nome_clt` varchar(45) NOT NULL,
  `login_clt` varchar(45) NOT NULL,
  `senha_clt` varchar(45) NOT NULL,
  `data_nascimento` date NOT NULL,
  `id_agnd` int(11) DEFAULT NULL,
  `id_adm` int(11) DEFAULT NULL,
  `numero_cliente` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `administrador`
  ADD PRIMARY KEY (`id_adm`),
  ADD UNIQUE KEY `login_adm` (`login_adm`);

--
-- Índices para tabela `agendamento`
--
ALTER TABLE `agendamento`
  ADD PRIMARY KEY (`id_agnd`),
  ADD UNIQUE KEY `data_agnd` (`data_agnd`);

--
-- Índices para tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_clt`),
  ADD UNIQUE KEY `login_clt` (`login_clt`),
  ADD KEY `fk_agnd` (`id_agnd`),
  ADD KEY `fk_adm` (`id_adm`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `administrador`
--
ALTER TABLE `administrador`
  MODIFY `id_adm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de tabela `agendamento`
--
ALTER TABLE `agendamento`
  MODIFY `id_agnd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_clt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `fk_adm` FOREIGN KEY (`id_adm`) REFERENCES `administrador` (`id_adm`),
  ADD CONSTRAINT `fk_agnd` FOREIGN KEY (`id_agnd`) REFERENCES `agendamento` (`id_agnd`);
COMMIT;