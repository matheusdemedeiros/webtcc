-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 05-Nov-2019 às 15:09
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
(12, 'Alexandre Perin de Souza', 16, 216187647, 33),
(13, 'Andre', 13, 11251112, 34),
(14, 'Robson Costa', 5, 1647152478, 35),
(15, 'Wilson Castello', 7, 1267182681, 36),
(16, 'Thaiana Anjos', 14, 291639162, 37);

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
(12, 33, 'Advisor'),
(13, 34, 'Advisor'),
(13, 35, 'Advisor'),
(14, 35, 'CoAdvisor'),
(12, 36, 'Advisor');

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
(5, 'ProgramaÃ§Ã£o Orientado a Objeto'),
(7, 'InteligÃªncia Artificial'),
(10, 'MineraÃ§Ã£o de Dados'),
(13, 'Desenvolvimento Orientado a Objeto'),
(14, 'Engenharia de Software'),
(15, 'ProgramaÃ§Ã£o Mobile'),
(16, 'Banco de Dados');

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
(31, 'Maria magarÃ£es', '15151361361', 9, 25),
(32, 'Joe', '15125161', 6, 26),
(33, 'Giovani Girardi', '3515681961', 2, 27),
(34, 'Lucas Chaves de Souza', '1326753181', 2, 38),
(35, 'Matheus Medeiros', '1841254128', 2, 39),
(36, 'Matheus GuimarÃ£es', '52159812581', 2, 40),
(37, 'Victor Klann', '251591258', 2, 41),
(38, 'Arthur Neto', '2584159', 6, 42),
(39, 'Johnson Sadao', '9558556', 9, 43);

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
(33, 34, 'FirstStudent'),
(33, 35, 'SecondStudent'),
(34, 33, 'FirstStudent'),
(34, 36, 'SecondStudent'),
(35, 37, 'FirstStudent'),
(36, 37, 'FirstStudent');

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
(33, '2019-02-28', '2019-12-12', 5, 'Remu do TCC', 'Web TCC'),
(34, '2019-10-07', '2019-10-24', 16, 'Resumo do TCC', 'Sistema de ensino de Banco de Dados'),
(35, '2019-10-07', '2019-10-25', 15, 'resumo do tcc ', 'Agricultura'),
(36, '2019-10-03', '2019-10-09', 16, 'ft', 'titulo');

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
(11, 'Alexandre Perin ', 2, 758915919, 29),
(12, 'Vilson Heck', 6, 2147483647, 30),
(13, 'Delcio Vieira', 9, 1647614261, 31);

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
(25, 'maria.magaraes@gmail.com', 'mariam', 'Student'),
(26, 'joe@gmail.com', 'joejoe', 'Student'),
(27, 'giovani.girardi@gmail.com', '$2y$04$yWaUiOgt5W71HnS75cSSUOPhRgoAfQyFRjqOJ4RRy0DbBgp05RZam', 'Student'),
(29, 'alexandre.perin@ifsc.edu.br', '$2y$04$ntzrWD2SdV6QTYTAalTjre0w/Mbu0Bzi2GgtnzWTrrBrFPRbYob/.', 'TermPaperTeacher'),
(30, 'vilson.heck@ifsc.edu.br', '$2y$04$LonidtL4buEvD1iVe5QWmOByepNDhdA1oMwCby.3CoIkg0fPtVnE.', 'TermPaperTeacher'),
(31, 'delcio.vieira@ifsc.edu.br', '$2y$04$CK/Xlv/kCZ7vfMgrr7jsP.cZYtXvBOYSKpOrU4NGzpPR9oflfTryW', 'TermPaperTeacher'),
(33, 'alexandre.perin@gmail.com', '$2y$04$adbO8urJeW9cBR4kP/N8y.t1Rr3xm7UVuoXC58ACB.yXFX7Hqj7MG', 'Advisor'),
(34, 'andre@gmail.com', '$2y$04$zV9re2MdBvYBdkLR9dbeMeX1EIiH.1jsGgWT7NSTAGhM65Lnd47x6', 'Advisor'),
(35, 'robson.costa@gmail.com', '$2y$04$CsaZI58fQ51nUcpwb/FjWe6Efck6Gz99QJWDjxCfgAUqH.akNkrP2', 'Advisor'),
(36, 'wilson.castello@gmail.com', '$2y$04$SAyNgPhFcpxZPLlwPH2HPuwN621JDeJfhjbeiKv3NuJNg8mWqNrlO', 'Advisor'),
(37, 'thaiana.anjos@gmail.com', '$2y$04$vdEBwHJ8OKfpXf2XnsaeqeJXZBtgwe/JRNBOzcKJuc67BUq7kQfCe', 'Advisor'),
(38, 'lucaschaves2610@gmail.com', '$2y$04$xuPnAn0mSGH3Jx6oQP1NQuVLYxplfN0VoSMQ4wpcLLkOH.j6tTG7y', 'Student'),
(39, 'matheus.medeiros@gmail.com', '$2y$04$Ytu/A4tKyYXimuN/75yThOFtCzKdJH5pyIOeJpZKrYzZ/ccrM3eHu', 'Student'),
(40, 'matheus.guimaraes@gmail.com', '$2y$04$1B4mq3mDpdX4vUV8vUAfAOwVlKdb8WfZYS.N3lLq1500KvP782YjW', 'Student'),
(41, 'victor.klann@gmail.com', '$2y$04$KS/wqi/00bjGjVHNNpPqPet4ONaouWUyHgBqzEmPRCZ./EQ/19v8K', 'Student'),
(42, 'arthur.neto@gmail.com', '$2y$04$mg.33HogvhGZQuEcxKGCX.aV9cVs7oh7F6/zn1n6CxhsxteXpzSxq', 'Student'),
(43, 'johnson.sadao@gmail.com', '$2y$04$ghhFHxEmr4LYVVC4koCurOGvBkgaSsSrPMWsusiI/qKI/LJz6IYHC', 'Student');

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
  MODIFY `IdAdvisor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de tabela `area`
--
ALTER TABLE `area`
  MODIFY `IdArea` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de tabela `course`
--
ALTER TABLE `course`
  MODIFY `IdCourse` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `formtermpaper`
--
ALTER TABLE `formtermpaper`
  MODIFY `IdFormTermPaper` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `student`
--
ALTER TABLE `student`
  MODIFY `IdStudent` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT de tabela `termpaper`
--
ALTER TABLE `termpaper`
  MODIFY `IdTermPaper` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de tabela `termpaperteacher`
--
ALTER TABLE `termpaperteacher`
  MODIFY `IdTermPaperTeacher` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `IdUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

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
-- Limitadores para a tabela `termpaperteacher`
--
ALTER TABLE `termpaperteacher`
  ADD CONSTRAINT `UserId` FOREIGN KEY (`UserId`) REFERENCES `users` (`IdUser`),
  ADD CONSTRAINT `termpaperteacher_ibfk_1` FOREIGN KEY (`CourseId`) REFERENCES `course` (`IdCourse`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
