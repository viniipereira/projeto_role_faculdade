

CREATE DATABASE cadastro_role;

USE cadastro_role;

CREATE TABLE `cidade` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `uf` char(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `descricao` varchar(500) NOT NULL,
  `foto` longtext DEFAULT NULL,
  `nota` int(11) DEFAULT NULL,
  `horario` varchar(100) DEFAULT NULL,
  `id_cidade` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` char(60) NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `foto` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


ALTER TABLE `cidade`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `role`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cidade` (`id_cidade`),
  ADD KEY `fk_usuario` (`id_usuario`);


ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `cidade`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;


ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;


ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `role`
  ADD CONSTRAINT `fk_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `role_ibfk_1` FOREIGN KEY (`id_cidade`) REFERENCES `cidade` (`id`);

  insert into usuarios(nome,senha,email) values('Teste','$2y$10$FUhnbdLOldP7Ynxk36W5kOApelH109OSU6NAh3UYLLG5xMtyTBJmi','teste@teste.com');

  insert into cidade(nome,uf) values('Guarapuava','PR');
  insert into cidade(nome,uf) values('Curitiba','PR');
  insert into cidade(nome,uf) values('Ponta-Grossa','PR');

  insert into role(nome,descricao,nota,horario,id_cidade,id_usuario) values ('evento 1','desc evento 1',5,'DIA',1,1);
  insert into role(nome,descricao,nota,horario,id_cidade,id_usuario) values ('evento 2','desc evento 2',5,'DIA',2,1);
  insert into role(nome,descricao,nota,horario,id_cidade,id_usuario) values ('evento 3','desc evento 3',3,'DIA',3,1);
  insert into role(nome,descricao,nota,horario,id_cidade,id_usuario) values ('evento 4','desc evento 4',3,'DIA',2,1);
  insert into role(nome,descricao,nota,horario,id_cidade,id_usuario) values ('evento 5','desc evento 5',3,'DIA',1,1);
  insert into role(nome,descricao,nota,horario,id_cidade,id_usuario) values ('evento 6','desc evento 6',4,'DIA',2,1);


