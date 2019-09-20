-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 20-Set-2019 às 15:01
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

--
-- Extraindo dados da tabela `advisor`
--

INSERT INTO `advisor` (`IdAdvisor`, `NameAdvisor`, `OccupationArea`, `Email`, `Password`) VALUES
(4, 'Alexandre Perin', 7, 'alexandre@ifsc.com', 'asdasd'),
(8, 'AndrÃ©', 7, 'fwfw2@fa.com', 'asdasd'),
(9, 'Robson', 7, 'robson.costa@ifsc.edu.br', 'asdasd');

-- --------------------------------------------------------

--
-- Estrutura da tabela `advisortermpaper`
--

CREATE TABLE `advisortermpaper` (
  `AdvisorID` int(11) DEFAULT NULL,
  `TermPaperId` int(11) DEFAULT NULL,
  `AdvisorType` enum('Advisor','CoAdvisor') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `advisortermpaper`
--

INSERT INTO `advisortermpaper` (`AdvisorID`, `TermPaperId`, `AdvisorType`) VALUES
(8, 26, 'Advisor'),
(9, 26, 'CoAdvisor'),
(9, 21, 'Advisor'),
(4, 21, 'CoAdvisor');

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

--
-- Extraindo dados da tabela `course`
--

INSERT INTO `course` (`IdCourse`, `NameCourse`, `WorkLoad`, `Class`) VALUES
(2, 'CiÃªncia da ComputaÃ§Ã£o', 0, ''),
(6, 'Engenharia Mecanica', 0, ''),
(7, 'Processos QuÃ­micos', 0, ''),
(8, 'Mecatronica', 0, '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `formtermpaper`
--

CREATE TABLE `formtermpaper` (
  `IdFormTermPaper` int(11) NOT NULL,
  `Observation` text DEFAULT NULL,
  `Topic` text DEFAULT NULL,
  `TermPaperId` int(11) DEFAULT NULL,
  `MeetingDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `formtermpaper`
--

INSERT INTO `formtermpaper` (`IdFormTermPaper`, `Observation`, `Topic`, `TermPaperId`, `MeetingDate`) VALUES
(3, '                        ObsrvaÃ§Ãµes 1', 'Assuntos 1', 21, '2019-09-23'),
(6, 'ehrhrj', 'hsdhdf', 26, '2019-09-04');

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
  `Password` varchar(50) DEFAULT NULL,
  `CourseId` int(11) DEFAULT NULL,
  `TermPaperId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `student`
--

INSERT INTO `student` (`IdStudent`, `NameStudent`, `Registration`, `Email`, `Password`, `CourseId`, `TermPaperId`) VALUES
(13, 'Lucas Chaves de Souza', '161005252', 'lucaschaves2610@gmail.com', 'ASDASD', 2, 26),
(15, 'Matheus', '1610917432', 'Matheus@gmail.com', 'ASDASD', 2, 21),
(17, 'paulo costa', '1142151351', 'fwfw2@fa.com', 'asdasd', 2, NULL),
(19, 'Gustavo', '161005252', 'matheus@gmail.com', 'asdasd', 2, 21),
(20, 'Marcus Perin de souza', '161005258', 'matheus@gmail.com', 'asdasd', 2, NULL),
(21, 'Joao', '161005245', 'joao.paulo@gmail.com', 'asdasd', 2, 26),
(23, 'Aluno teste', '161005252', 'lucaschaves2610@gmail.com', 'asdasd', 2, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `termpaper`
--

CREATE TABLE `termpaper` (
  `IdTermPaper` int(11) NOT NULL,
  `StartDate` date NOT NULL,
  `EndDate` date NOT NULL,
  `AreaId` int(11) DEFAULT NULL,
  `Summary` text DEFAULT NULL,
  `Title` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `termpaper`
--

INSERT INTO `termpaper` (`IdTermPaper`, `StartDate`, `EndDate`, `AreaId`, `Summary`, `Title`) VALUES
(21, '2019-09-01', '2019-09-02', 7, 'resumo-1', 'titulo1'),
(26, '2019-09-05', '2019-09-14', 7, 'Resumo Teste', 'Agricultura');

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
  `Password` varchar(50) DEFAULT NULL,
  `CourseId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `termpaperteacher`
--

INSERT INTO `termpaperteacher` (`IdTermPaperTeacher`, `NameTermPaperTeacher`, `Email`, `Password`, `CourseId`) VALUES
(5, 'Matheus', 'matheus@gmail.com', 'asdasd', NULL),
(6, 'Matheus', 'lucaschaves2610@gmail.com', 'asdfgh', 8),
(7, 'asaad', 'lucaschaves2610@gmail.com', 'asdasd', 2);

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
-- Índices para tabela `formtermpaper`
--
ALTER TABLE `formtermpaper`
  ADD PRIMARY KEY (`IdFormTermPaper`),
  ADD KEY `TermPaperId` (`TermPaperId`);

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
  ADD PRIMARY KEY (`IdStudent`),
  ADD KEY `CourseId` (`CourseId`),
  ADD KEY `termPaperId` (`TermPaperId`);

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
  ADD PRIMARY KEY (`IdTermPaperTeacher`),
  ADD KEY `CourseId` (`CourseId`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `advisor`
--
ALTER TABLE `advisor`
  MODIFY `IdAdvisor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `area`
--
ALTER TABLE `area`
  MODIFY `IdArea` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `course`
--
ALTER TABLE `course`
  MODIFY `IdCourse` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `formtermpaper`
--
ALTER TABLE `formtermpaper`
  MODIFY `IdFormTermPaper` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `keyword`
--
ALTER TABLE `keyword`
  MODIFY `IdKeyword` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `student`
--
ALTER TABLE `student`
  MODIFY `IdStudent` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de tabela `termpaper`
--
ALTER TABLE `termpaper`
  MODIFY `IdTermPaper` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de tabela `termpaperteacher`
--
ALTER TABLE `termpaperteacher`
  MODIFY `IdTermPaperTeacher` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
-- Limitadores para a tabela `formtermpaper`
--
ALTER TABLE `formtermpaper`
  ADD CONSTRAINT `formtermpaper_ibfk_1` FOREIGN KEY (`TermPaperId`) REFERENCES `termpaper` (`IdTermPaper`);

--
-- Limitadores para a tabela `keyword`
--
ALTER TABLE `keyword`
  ADD CONSTRAINT `keyword_ibfk_1` FOREIGN KEY (`TermPaperId`) REFERENCES `termpaper` (`IdTermPaper`);

--
-- Limitadores para a tabela `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`CourseId`) REFERENCES `course` (`IdCourse`),
  ADD CONSTRAINT `termPaperId` FOREIGN KEY (`termPaperId`) REFERENCES `termpaper` (`IdTermPaper`);

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

--
-- Limitadores para a tabela `termpaperteacher`
--
ALTER TABLE `termpaperteacher`
  ADD CONSTRAINT `termpaperteacher_ibfk_1` FOREIGN KEY (`CourseId`) REFERENCES `course` (`IdCourse`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
