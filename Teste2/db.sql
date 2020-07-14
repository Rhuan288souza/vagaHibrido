CREATE TABLE `dadosClientes` (
   `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `nome` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `cpf` varchar(40) NOT NULL,
  `telefone` varchar(40) NOT NULL
) CHARACTER SET utf8 COLLATE utf8_general_ci;;

INSERT INTO `dadosClientes` (  `id`,`nome`, `email`, `cpf`,`telefone`) VALUES
(1, 'João das neves', 'joao@neves.com.br', '028.874.987.89','8897985687'),
(2, 'Maria das neves', 'maria@neves.com.br', '028.874.987.89','8897985687'),
(3, 'Antonia das neves', 'antonia@neves.com.br', '028.874.987.89','8897985687'),
(4, 'Moacir das neves', 'moacir@neves.com.br', '028.874.987.89','8897985687');



