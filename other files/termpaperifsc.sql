-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 02-Set-2019 às 15:02
-- Versão do servidor: 10.3.15-MariaDB
-- versão do PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `termpaperifsc`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `advisor`
--

CREATE TABLE `advisor` (
  `IdAdvisor` int(11) NOT NULL,
  `NameAdvisor` varchar(50) NOT NULL,
  `OccupationArea` int(11) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `advisortermpaper`
--

CREATE TABLE `advisortermpaper` (
  `AdvisorID` int(11) DEFAULT NULL,
  `TermPaperId` int(11) DEFAULT NULL,
  `AdvisorType` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `area`
--

CREATE TABLE `area` (
  `IdArea` int(11) NOT NULL,
  `NameArea` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `area`
--

INSERT INTO `area` (`IdArea`, `NameArea`) VALUES
(4, 'MineraÃ§Ã£o de Dados'),
(5, 'POO'),
(7, 'IA');

-- --------------------------------------------------------

--
-- Estrutura da tabela `course`
--

CREATE TABLE `course` (
  `IdCourse` int(11) NOT NULL,
  `NameCourse` varchar(50) NOT NULL,
  `WorkLoad` int(11) NOT NULL,
  `Class` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `keyword`
--

CREATE TABLE `keyword` (
  `IdKeyword` int(11) NOT NULL,
  `Word` varchar(50) NOT NULL,
  `TermPaperId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `student`
--

CREATE TABLE `student` (
  `IdStudent` int(11) NOT NULL,
  `NameStudent` varchar(50) NOT NULL,
  `Registration` varchar(50) NOT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `student`
--

INSERT INTO `student` (`IdStudent`, `NameStudent`, `Registration`, `Email`, `Password`) VALUES
(9, 'fabio', '161005252', 'matheus@gmail.com', 'asdasd');

-- --------------------------------------------------------

--
-- Estrutura da tabela `studenttermpaper`
--

CREATE TABLE `studenttermpaper` (
  `StudentId` int(11) DEFAULT NULL,
  `TermPaperId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `termpaper`
--

CREATE TABLE `termpaper` (
  `IdTermPaper` int(11) NOT NULL,
  `Title` varchar(50) NOT NULL,
  `StartDate` date NOT NULL,
  `EndDate` date NOT NULL,
  `AreaId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `termpaperfiles`
--

CREATE TABLE `termpaperfiles` (
  `TermPaperId` int(11) NOT NULL,
  `FilePath` varchar(50) DEFAULT NULL,
  `TYPE` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `termpaperteacher`
--

CREATE TABLE `termpaperteacher` (
  `IdTermPaperTeacher` int(11) NOT NULL,
  `NameTermPaperTeacher` varchar(50) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `termpaperteacher`
--

INSERT INTO `termpaperteacher` (`IdTermPaperTeacher`, `NameTermPaperTeacher`, `Email`, `Password`) VALUES
(1, 'Alexandre Perin', 'alexandre@ifsc.com', 'asdasd'),
(2, 'Alexandre', 'fwfw2@fa.com', 'asdasd'),
(3, 'paulo costa', 'lucaschaves2610@gmail.com', 'asdasd'),
(4, 'Alexandre Perin', 'alexandre@ifsc.com', 'asdasd');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `advisor`
--
ALTER TABLE `advisor`
  ADD PRIMARY KEY (`IdAdvisor`),
  ADD KEY `OccupationArea` (`OccupationArea`);

--
-- Índices para tabela `advisortermpaper`
--
ALTER TABLE `advisortermpaper`
  ADD KEY `AdvisorID` (`AdvisorID`),
  ADD KEY `TermPaperId` (`TermPaperId`);

--
-- Índices para tabela `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`IdArea`);

--
-- Índices para tabela `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`IdCourse`);

--
-- Índices para tabela `keyword`
--
ALTER TABLE `keyword`
  ADD PRIMARY KEY (`IdKeyword`),
  ADD KEY `TermPaperId` (`TermPaperId`);

--
-- Índices para tabela `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`IdStudent`);

--
-- Índices para tabela `studenttermpaper`
--
ALTER TABLE `studenttermpaper`
  ADD KEY `StudentId` (`StudentId`),
  ADD KEY `TermPaperId` (`TermPaperId`);

--
-- Índices para tabela `termpaper`
--
ALTER TABLE `termpaper`
  ADD PRIMARY KEY (`IdTermPaper`),
  ADD KEY `AreaId` (`AreaId`);

--
-- Índices para tabela `termpaperfiles`
--
ALTER TABLE `termpaperfiles`
  ADD KEY `TermPaperId` (`TermPaperId`);

--
-- Índices para tabela `termpaperteacher`
--
ALTER TABLE `termpaperteacher`
  ADD PRIMARY KEY (`IdTermPaperTeacher`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `area`
--
ALTER TABLE `area`
  MODIFY `IdArea` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `course`
--
ALTER TABLE `course`
  MODIFY `IdCourse` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `keyword`
--
ALTER TABLE `keyword`
  MODIFY `IdKeyword` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `student`
--
ALTER TABLE `student`
  MODIFY `IdStudent` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `termpaper`
--
ALTER TABLE `termpaper`
  MODIFY `IdTermPaper` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `termpaperteacher`
--
ALTER TABLE `termpaperteacher`
  MODIFY `IdTermPaperTeacher` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `advisor`
--
ALTER TABLE `advisor`
  ADD CONSTRAINT `advisor_ibfk_1` FOREIGN KEY (`OccupationArea`) REFERENCES `area` (`IdArea`);

--
-- Limitadores para a tabela `advisortermpaper`
--
ALTER TABLE `advisortermpaper`
  ADD CONSTRAINT `advisortermpaper_ibfk_1` FOREIGN KEY (`AdvisorID`) REFERENCES `advisor` (`IdAdvisor`),
  ADD CONSTRAINT `advisortermpaper_ibfk_2` FOREIGN KEY (`TermPaperId`) REFERENCES `termpaper` (`IdTermPaper`);

--
-- Limitadores para a tabela `keyword`
--
ALTER TABLE `keyword`
  ADD CONSTRAINT `keyword_ibfk_1` FOREIGN KEY (`TermPaperId`) REFERENCES `termpaper` (`IdTermPaper`);

--
-- Limitadores para a tabela `studenttermpaper`
--
ALTER TABLE `studenttermpaper`
  ADD CONSTRAINT `studenttermpaper_ibfk_1` FOREIGN KEY (`StudentId`) REFERENCES `student` (`IdStudent`),
  ADD CONSTRAINT `studenttermpaper_ibfk_2` FOREIGN KEY (`TermPaperId`) REFERENCES `termpaper` (`IdTermPaper`);

--
-- Limitadores para a tabela `termpaper`
--
ALTER TABLE `termpaper`
  ADD CONSTRAINT `termpaper_ibfk_1` FOREIGN KEY (`AreaId`) REFERENCES `area` (`IdArea`);

--
-- Limitadores para a tabela `termpaperfiles`
--
ALTER TABLE `termpaperfiles`
  ADD CONSTRAINT `termpaperfiles_ibfk_1` FOREIGN KEY (`TermPaperId`) REFERENCES `termpaper` (`IdTermPaper`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
