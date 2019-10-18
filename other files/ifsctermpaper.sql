-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 18-Out-2019 às 15:48
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
-- Banco de dados: `ifsctermpaper`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `advisor`
--

CREATE TABLE `advisor` (
  `IdAdvisor` int(11) NOT NULL,
  `NameAdvisor` varchar(50) NOT NULL,
  `OccupationArea` int(11) DEFAULT NULL,
  `Siapei` int(11) DEFAULT NULL,
  `UserId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `advisor`
--

INSERT INTO `advisor` (`IdAdvisor`, `NameAdvisor`, `OccupationArea`, `Siapei`, `UserId`) VALUES
(4, 'Alexandre Perin', 5, 131414141, 9),
(8, 'Robson', 7, 131414141, 10),
(9, 'Andre', 10, 54545335, 11);

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
(9, 28, 'Advisor'),
(4, 31, 'Advisor'),
(4, 32, 'Advisor'),
(8, 32, 'CoAdvisor'),
(9, 26, 'Advisor'),
(8, 26, 'CoAdvisor');

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
(7, 'InteligÃªncia Artificial'),
(10, 'MineraÃ§Ã£o de Dados');

-- --------------------------------------------------------

--
-- Estrutura da tabela `course`
--

CREATE TABLE `course` (
  `IdCourse` int(11) NOT NULL,
  `NameCourse` varchar(50) NOT NULL,
  `NameCourseCoordinator` varchar(50) DEFAULT NULL,
  `SiapeCourseCoordinator` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `course`
--

INSERT INTO `course` (`IdCourse`, `NameCourse`, `NameCourseCoordinator`, `SiapeCourseCoordinator`) VALUES
(2, 'CiÃªncia da ComputaÃ§Ã£o', 'Robson Costa 1', 13816481),
(6, 'Engenharia Mecanica', 'Teste-1', 141414515),
(8, 'Mecatronica', 'Teste-3', 141414515),
(9, 'Prcocessos QuÃ­micos', 'Ailton', 2543543);

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
(10, 'jbwui', 'DNJAan', 26, '2019-10-31'),
(11, 'eye', 'eeye', 26, '2019-10-22');

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
  `CourseId` int(11) DEFAULT NULL,
  `UserId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `student`
--

INSERT INTO `student` (`IdStudent`, `NameStudent`, `Registration`, `CourseId`, `UserId`) VALUES
(13, 'Lucas Chaves de Souza', '161005252', 2, 1),
(15, 'Matheus', '1610917432', 2, 2),
(17, 'paulo costa', '1142151351', 2, 3),
(19, 'Gustavo', '161005252', 2, 6),
(20, 'Marcus Perin de souza', '161005258', 2, 4),
(21, 'Joao', '161005245', 2, 5),
(31, 'Maria magarÃ£es', '15151361361', 9, 25),
(32, 'Joe', '15125161', 6, 26),
(33, 'Aluno para teste', '3515681961', 2, 27);

-- --------------------------------------------------------

--
-- Estrutura da tabela `studenttermpaper`
--

CREATE TABLE `studenttermpaper` (
  `TermPaperId` int(11) DEFAULT NULL,
  `StudentId` int(11) DEFAULT NULL,
  `StudentType` enum('FirstStudent','SecondStudent') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `studenttermpaper`
--

INSERT INTO `studenttermpaper` (`TermPaperId`, `StudentId`, `StudentType`) VALUES
(27, 17, 'FirstStudent'),
(28, 20, 'FirstStudent'),
(31, 31, 'FirstStudent'),
(32, 32, 'FirstStudent'),
(26, 21, 'FirstStudent'),
(26, 13, 'SecondStudent');

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
(26, '2019-09-05', '2019-09-14', 7, 'Resumo Teste-1', 'Agricultura-2'),
(28, '2019-09-01', '2019-09-26', 7, 'Teste2', 'bibib'),
(31, '2019-10-01', '2019-12-19', 7, 'Testeadaf hsj', 'Processos QuÃ­micos'),
(32, '2019-10-01', '2019-10-17', 10, 'FGQWFGQW8798 DGSIU', 'agfhjWGBJKQW');

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
  `CourseId` int(11) DEFAULT NULL,
  `Siape` int(11) DEFAULT NULL,
  `UserId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `termpaperteacher`
--

INSERT INTO `termpaperteacher` (`IdTermPaperTeacher`, `NameTermPaperTeacher`, `CourseId`, `Siape`, `UserId`) VALUES
(6, 'Perin', 2, 131414, 12),
(7, 'Vilson', 6, 121212, 13),
(8, 'Castello', 9, 141512, 14);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `IdUser` int(11) NOT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `TypeUsers` enum('TermPaperTeacher','Advisor','Student') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`IdUser`, `Email`, `Password`, `TypeUsers`) VALUES
(1, 'lucaschaves2610@gmail.com', 'ASDASD', 'Student'),
(2, 'matheus@gmail.com', 'DSADSA', 'Student'),
(3, 'paulocosta@gmail.com', 'qweqwe', 'Student'),
(4, 'marcusgmail.com', 'ASDASD', 'Student'),
(5, 'joao@ifsc.com', 'ASDASD', 'Student'),
(6, 'gustavo@gmail.com', 'ASDASD', 'Student'),
(9, 'alexandre.perin@gmail.com', 'poiuyt', 'Advisor'),
(10, 'robson.costa@gmail.com', 'robson', 'Advisor'),
(11, 'andre@gmail.com', 'kykyky', 'Advisor'),
(12, 'alexandre.perin@ifsc.com', 'pmpmpm', 'TermPaperTeacher'),
(13, 'vilson.heck@ifsc.com', 'vilson', 'TermPaperTeacher'),
(14, 'wilson.casttelo@ifsc.com', 'wilson', 'TermPaperTeacher'),
(25, 'maria.magaraes@gmail.com', 'mariam', 'Student'),
(26, 'joe@gmail.com', 'joejoe', 'Student'),
(27, 'aluno.teste@gmail.com', '$2y$04$f8aCw1kPMNeJwSEvyuFtZOds1OR1/DSAXrALLPiRU/mxKAVflA/Lu', 'Student');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `advisor`
--
ALTER TABLE `advisor`
  ADD PRIMARY KEY (`IdAdvisor`),
  ADD KEY `OccupationArea` (`OccupationArea`),
  ADD KEY `UserId` (`UserId`);

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
  ADD KEY `UserId` (`UserId`);

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
  ADD KEY `CourseId` (`CourseId`),
  ADD KEY `UserId` (`UserId`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`IdUser`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `advisor`
--
ALTER TABLE `advisor`
  MODIFY `IdAdvisor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `area`
--
ALTER TABLE `area`
  MODIFY `IdArea` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `course`
--
ALTER TABLE `course`
  MODIFY `IdCourse` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `formtermpaper`
--
ALTER TABLE `formtermpaper`
  MODIFY `IdFormTermPaper` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `keyword`
--
ALTER TABLE `keyword`
  MODIFY `IdKeyword` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `student`
--
ALTER TABLE `student`
  MODIFY `IdStudent` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de tabela `termpaper`
--
ALTER TABLE `termpaper`
  MODIFY `IdTermPaper` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de tabela `termpaperteacher`
--
ALTER TABLE `termpaperteacher`
  MODIFY `IdTermPaperTeacher` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `IdUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `advisor`
--
ALTER TABLE `advisor`
  ADD CONSTRAINT `advisor_ibfk_1` FOREIGN KEY (`OccupationArea`) REFERENCES `area` (`IdArea`),
  ADD CONSTRAINT `advisor_ibfk_2` FOREIGN KEY (`UserId`) REFERENCES `users` (`IdUser`);

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
  ADD CONSTRAINT `student_ibfk_2` FOREIGN KEY (`UserId`) REFERENCES `users` (`IdUser`);

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
  ADD CONSTRAINT `UserId` FOREIGN KEY (`UserId`) REFERENCES `users` (`IdUser`),
  ADD CONSTRAINT `termpaperteacher_ibfk_1` FOREIGN KEY (`CourseId`) REFERENCES `course` (`IdCourse`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
