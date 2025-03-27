--
-- Banco de dados: `avaliasaeb`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `agenda`
--

DROP TABLE IF EXISTS `agenda`;
CREATE TABLE IF NOT EXISTS `agenda` (
  `id` int NOT NULL AUTO_INCREMENT,
  `dt_cadastro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dt_alteracao` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `id_prova` int NOT NULL,
  `dt_inicio` date NOT NULL,
  `dt_fim` date NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `FK_agenda_prova` (`id_prova`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `agenda_detalhe`
--

DROP TABLE IF EXISTS `agenda_detalhe`;
CREATE TABLE IF NOT EXISTS `agenda_detalhe` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_agenda` int NOT NULL,
  `id_aluno` int NOT NULL,
  `dt_realizado` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_agenda_aluno` (`id_aluno`),
  KEY `FK_detalhe_agenda` (`id_agenda`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `idioma`
--

DROP TABLE IF EXISTS `idioma`;
CREATE TABLE IF NOT EXISTS `idioma` (
  `id` int NOT NULL AUTO_INCREMENT,
  `chave` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `portuguese-brazilian` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `english` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `spanish` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  PRIMARY KEY (`id`),
  UNIQUE KEY `chave` (`chave`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `idioma`
--

INSERT INTO `idioma` (`id`, `chave`, `portuguese-brazilian`, `english`, `spanish`) VALUES
(1, 'modal_titulo_confirma', 'Confirmação', 'Confirmation', 'Confirmación'),
(2, 'modal_titulo_update', 'Atualização Importante', 'Important Update', 'Actualización importante'),
(3, 'modal_texto_confirma', 'Pressione \"Sair\" abaixo se estiver pronto para encerrar sua sessão atual.', 'Press \"Exit\" below if you are ready to end your current session.', 'Presione \"Salir\" a continuación si está listo para terminar su sesión actual.'),
(4, 'email_recover_title', 'Recuperação de Senha/Recovery Password/Recuperación de Contraseña', 'Recuperação de Senha/Recovery Password/Recuperación de Contraseña', 'Recuperação de Senha/Recovery Password/Recuperación de Contraseña'),
(5, 'page_title_classrooms', 'Turmas', 'Classes', 'Clases'),
(6, 'page_title_classrooms_add', 'Incluir Turma', 'Add Class', 'Agregar clase'),
(7, 'page_title_classrooms_edt', 'Editar Turma', 'Edit Class', 'Editar clase'),
(8, 'page_title_teachers', 'Professores', 'Teachers', 'Maestros'),
(9, 'page_title_teachers_add', 'Incluir Professor', 'Add Teacher', 'Incluir maestro'),
(10, 'page_title_teachers_edt', 'Editar Professor', 'Edit Teacher', 'Editar maestro'),
(11, 'page_title_blocked', 'Acesso Negado', 'Access Denied', 'Acceso Denegado'),
(12, 'page_title_erro404', 'Página não encontrada', 'Page Not Found', 'Página no Encontrada'),
(13, 'page_title_login', 'Entrar', 'Log In', 'Iniciar Sesión'),
(14, 'page_title_logout', 'Sair', 'Log Out', 'Cerrar Sesión'),
(15, 'page_title_maintenance', 'Em manutenção', 'Under Maintenance', 'En Mantenimiento'),
(16, 'page_title_recover', 'Recuperar senha', 'Recover Password', 'Recuperar Contraseña'),
(17, 'page_title_main', 'Painel', 'Dashboard', 'Tablero'),
(18, 'page_title_params', 'Parâmetros', 'Parameters', 'Parámetros'),
(19, 'page_title_param', 'Parâmetro', 'Parameter', 'Parámetro'),
(20, 'page_title_param_add', 'Incluir Parâmetro', 'Add Parameter', 'Agregar Parámetro'),
(21, 'page_title_param_edt', 'Alterar Parâmetro', 'Edit Parameter', 'Editar Parámetro'),
(22, 'page_title_param_detail', 'Parâmetro: ', 'Parameter: ', 'Parámetro: '),
(23, 'page_title_param_detail_add', 'Incluir Parâmetro: ', 'Add Parameter: ', 'Agregar Parámetro: '),
(24, 'page_title_param_detail_edt', 'Alterar Parâmetro: ', 'Edit Parameter: ', 'Editar Parámetro: '),
(25, 'page_title_profile', 'Meu Perfil', 'My Profile', 'Mi Perfil'),
(26, 'page_title_roles', 'Perfis de Acesso', 'Access Profiles', 'Perfiles de Acceso'),
(27, 'page_title_role', 'Perfil de Acesso', 'Access Profile', 'Perfil de Acceso'),
(28, 'page_title_role_add', 'Incluir Perfil de Acesso', 'Add Access Profile', 'Agregar Perfil de Acceso'),
(29, 'page_title_role_edt', 'Alterar Perfil de Acesso', 'Edit Access Profile', 'Editar Perfil de Acceso'),
(30, 'page_title_users', 'Usuários', 'Users', 'Usuarios'),
(31, 'page_title_user', 'Usuário', 'User', 'Usuario'),
(32, 'page_title_user_add', 'Incluir Usuário', 'Add User', 'Agregar Usuario'),
(33, 'page_title_user_edt', 'Alterar Usuário', 'Edit User', 'Editar Usuario'),
(34, 'page_login_1', 'Acessar o Sistema', 'Access the System', 'Acceder al Sistema'),
(35, 'page_login_2', 'Esqueci minha senha', 'Forgot my password', 'Olvidé mi contraseña'),
(36, 'page_login_3', 'Criar uma conta', 'Create an account', 'Crear una cuenta'),
(37, 'page_logout_1', 'Você acaba de sair do sistema!', 'You have just logged out of the system!', '¡Acabas de cerrar sesión en el sistema!'),
(38, 'page_logout_2', 'Acessar o sistema', 'Access the system', 'Acceder al sistema'),
(39, 'page_logout_3', 'Entrar novamente', 'Log in again', 'Iniciar sesión nuevamente'),
(40, 'page_recover_1', 'Recuperar Senha', 'Recover Password', 'Recuperar Contraseña'),
(41, 'page_recover_2', '⚠ Ao informar o login para recuperar seu acesso, <b>a senha atual será substituída</b> e enviada por e-mail.', '⚠ By providing your login to recover your access, <b>the current password will be replaced</b> and sent via email.', '⚠ Al proporcionar tu usuario para recuperar tu acceso, <b>la contraseña actual será reemplazada</b> y enviada por correo electrónico.'),
(42, 'page_recover_3', 'Acessar o sistema', 'Access the system', 'Acceder al sistema'),
(43, 'page_maintenance_1', 'Em manutenção', 'Under Maintenance', 'En Mantenimiento'),
(44, 'page_blocked_1', 'O acesso à página desejada foi negado devido a possíveis credenciais inválidas ou falta de autorização.', 'Access Denied', 'Acceso Denegado'),
(45, 'page_blocked_3', 'Se você acredita que isso é um erro, entre em contato com nossa equipe. Estamos aqui para ajudar a resolver qualquer problema que você possa encontrar.', 'If you believe this is an error, please contact our team. We are here to help resolve any issues you may encounter.', 'Si crees que esto es un error, por favor contacta a nuestro equipo. Estamos aquí para ayudar a resolver cualquier problema que puedas encontrar.'),
(46, 'page_blocked_4', 'Agradecemos pela compreensão e paciência.', 'Thank you for your understanding and patience.', 'Gracias por tu comprensión y paciencia.'),
(47, 'page_blocked_5', 'Você pode tentar novamente efetuando o login', 'You can try again by logging in', 'Puedes intentarlo nuevamente iniciando sesión'),
(48, 'page_blocked_6', 'Acessar o sistema', 'Access the system', 'Acceder al sistema'),
(49, 'page_blocked_7', 'aqui', 'here', 'aquí'),
(50, 'page_erro404_1', 'Página não encontrada', 'Page Not Found', 'Página no Encontrada'),
(51, 'page_erro404_2', 'Parece que você se perdeu no caminho. A página que você está procurando não está aqui. Mas não se preocupe, estamos aqui para ajudar.', 'It looks like you got lost along the way. The page you are looking for is not here. But don\'t worry, we are here to help.', 'Parece que te perdiste en el camino. La página que buscas no está aquí. Pero no te preocupes, estamos aquí para ayudar.'),
(52, 'page_erro404_3', 'O que você pode fazer:', 'What you can do:', 'Lo que puedes hacer:'),
(53, 'page_erro404_4', 'Verifique o URL: Certifique-se de que digitou o endereço corretamente.', 'Check the URL: Make sure you entered the address correctly.', 'Verifica la URL: Asegúrate de haber ingresado la dirección correctamente.'),
(54, 'page_erro404_5', 'Tente novamente efetuando o', 'Try again by logging into the', 'Intenta nuevamente iniciando sesión en el'),
(55, 'page_erro404_6', 'Acessar o sistema', 'system', 'sistema'),
(56, 'page_erro404_7', 'login aqui', 'here', 'aquí'),
(57, 'page_profile_1', 'Informações', 'Information', 'Información'),
(58, 'page_profile_2', 'Usuário e Senha', 'Username and Password', 'Usuario y Contraseña'),
(59, 'page_profile_3', '⚠ É possível mudar o login de acesso, desde que não esteja em uso por outra pessoa.', '⚠ It is possible to change the access login, as long as it is not in use by someone else.', '⚠ Es posible cambiar el acceso de inicio de sesión, siempre que no esté siendo utilizado por otra persona.'),
(60, 'page_painel_1', ', já faz um tempo que seus dados não foram alterados e precisamos que você os mantivessem atualizados. Atualize agora seus dados para uma melhor experiência de uso do sistema.', ', it is important to keep your data updated in our system to ensure a continuous and personalized experience. We appreciate your collaboration!', ', es importante mantener tus datos actualizados en nuestro sistema para garantizar una experiencia continua y personalizada. ¡Agradecemos su colaboració20'),
(61, 'menu_1', 'Painel', 'Dashboard', 'Panel'),
(62, 'menu_2', 'Parâmetros', 'Parameters', 'Parámetros'),
(63, 'menu_3', 'Perfis', 'Profiles', 'Perfiles'),
(64, 'menu_4', 'Usuários', 'Users', 'Usuarios'),
(65, 'menu_5', 'Meu Perfil', 'My Profile', 'Mi Perfil'),
(66, 'menu_6', 'Sair', 'Logout', 'Salir'),
(67, 'menu_7', 'Turmas', 'Classes', 'Clases'),
(68, 'menu_8', 'Professores', 'Teachers', 'Maestros'),
(69, 'ajax_1', 'Login ou Senha inválidos.', 'Invalid login or password.', 'Usuario o contraseña inválidos.'),
(70, 'ajax_2', 'Usuário validado!', 'User validated!', '¡Usuario validado!'),
(71, 'ajax_3', 'Se tudo estiver correto, você receberá a nova senha por e-mail.', 'If everything is correct, you will receive the new password by email.', 'Si todo está correcto, recibirá la nueva contraseña por correo electrónico.'),
(72, 'ajax_4', 'Não foi possível salvar os dados no momento.', 'Unable to save data at the moment.', 'No se pudo guardar los datos en este momento.'),
(73, 'ajax_5', 'Dados inseridos!', 'Data inserted!', '¡Datos insertados!'),
(74, 'ajax_6', 'Dados atualizados!', 'Data updated!', '¡Datos actualizados!'),
(75, 'ajax_7', 'A senha e a confirmação de senha estão diferentes!', 'Password and password confirmation do not match!', '¡La contraseña y la confirmación de contraseña no coinciden!'),
(76, 'ajax_8', 'Este login já está em uso por outra pessoa!', 'This login is already in use by someone else!', 'Este usuario ya está siendo utilizado por otra persona.'),
(77, 'ajax_9', 'Acesso negado!', 'Access denied!', '¡Acceso denegado!'),
(78, 'form_sim', 'Sim', 'Yes', 'Sí'),
(79, 'form_nao', 'Não', 'No', 'No'),
(80, 'form_entrar', 'Entrar', 'Enter', 'Ingresar'),
(81, 'form_recuperar', 'Recuperar', 'Recover', 'Recuperar'),
(82, 'form_atualizar', 'Atualizar', 'Update', 'Actualizar'),
(83, 'form_salvar', 'Salvar', 'Save', 'Guardar'),
(84, 'form_cancelar', 'Cancelar', 'Cancel', 'Cancelar'),
(85, 'form_sair', 'Sair', 'Exit', 'Salir'),
(86, 'form_editar', 'Editar', 'Edit', 'Editar'),
(87, 'form_inativar', 'Inativar', 'Deactivate', 'Inactivar'),
(88, 'form_ativar', 'Ativar', 'Activate', 'Activar'),
(89, 'form_voltar', 'Voltar', 'Back', 'Volver'),
(90, 'form_visualizar', 'Visualizar', 'View', 'Visualizar'),
(91, 'form_listar', 'Listar', 'List', 'Listar'),
(92, 'form_status', 'Status', 'Status', 'Estado'),
(93, 'form_ativo', 'Ativo', 'Active', 'Activo'),
(94, 'form_inativo', 'Inativo', 'Inactive', 'Inactivo'),
(95, 'form_login', 'Login', 'Login', 'Usuario'),
(96, 'form_senha', 'Senha', 'Password', 'Contraseña'),
(97, 'form_acessar', 'Acessar', 'Access', 'Acceder'),
(98, 'form_apagar', 'Apagar', 'Delete', 'Borrar'),
(99, 'form_excluir', 'Excluir', 'Delete', 'Eliminar'),
(100, 'form_aprovar', 'Aprovar', 'Approve', 'Aprobar'),
(101, 'form_reprovar', 'Reprovar', 'Reject', 'Rechazar'),
(102, 'form_confirma_senha', 'Repita sua senha', 'Confirm your password', 'Confirme su contraseña'),
(103, 'form_nome_completo', 'Nome Completo', 'Full Name', 'Nombre Completo'),
(104, 'form_email', 'E-mail', 'Email', 'Correo Electrónico'),
(105, 'form_perfil_acesso', 'Perfil de Acesso', 'Access Profile', 'Perfil de Acceso'),
(106, 'form_dtcadastro', 'Data do Cadastro', 'Registration Date', 'Fecha de Registro'),
(107, 'form_dtativacao', 'Data da Ativação', 'Activation Date', 'Fecha de Activación'),
(108, 'form_dtinativacao', 'Data da Inativação', 'Deactivation Date', 'Fecha de Inactivación'),
(109, 'form_dtatualizacao', 'Última Atualzação', 'Last Update', 'Última Actualización'),
(110, 'form_dtacesso', 'Último Acesso', 'Last Access', 'Último Acceso'),
(111, 'form_parametro_nome', 'Nome do Parametro', 'Parameter Name', 'Nombre del Parámetro'),
(112, 'form_turma_nome', 'Nome da Turma', 'Class Name', 'Nombre de la clase'),
(113, 'form_nome_perfil', 'Nome do Perfil', 'Profile Name', 'Nombre del Perfil'),
(114, 'form_selecione', 'Selecione uma opção', 'Select an option', 'Seleccione una opción'),
(115, 'form_permissoes', 'Permissões', 'Permissions', 'Permisos'),
(116, 'form_idioma', 'Idioma', 'Language', 'Idioma'),
(117, 'form_idioma_pt', 'Português', 'Portuguese', 'Portugués'),
(118, 'form_idioma_es', 'Espanhol', 'Spanish', 'Español'),
(119, 'form_idioma_en', 'Inglês', 'English', 'Inglés'),
(120, 'form_empresa', 'Empresa', 'Company', 'Empresa'),
(121, 'form_razao', 'Razão Social', 'Company Name', 'Razón Social'),
(122, 'form_fantasia', 'Nome Fantasia', 'Fantasy Name', 'Nombre Fantasía'),
(123, 'form_telefone', 'Telefone', 'Phone', 'Teléfono'),
(124, 'form_pais', 'País', 'Country', 'País'),
(125, 'form_tipo_documento', 'Tipo de Documento', 'Document Type', 'Tipo de Documento'),
(126, 'form_documento', 'Numero do Documento', 'Document Number', 'Número de Documento'),
(127, 'form_cargo', 'Cargo', 'Position', 'Cargo'),
(128, 'form_categoria', 'Categoria', 'Category', 'Categoría'),
(129, 'form_responsavel', 'Responsável', 'Responsible', 'Responsable'),
(130, 'form_necessidade', 'Pesssoa com Deficiência (PcD)', 'Person with Disabilities (PwD)', 'Persona con Discapacidad (PcD)'),
(131, 'form_pessoa', 'Pessoa', 'Person', 'Persona'),
(132, 'form_descricao', 'Descrição', 'Description', 'Descripción'),
(133, 'table_parametro', 'Parâmetro', 'Parameter', 'Parámetro'),
(134, 'table_status', 'Situação', 'Status', 'Estado'),
(135, 'table_ativo', 'Ativo', 'Active', 'Activo'),
(136, 'table_inativo', 'Inativo', 'Inactive', 'Inactivo'),
(137, 'table_perfil', 'Perfil', 'Profile', 'Perfil'),
(138, 'table_nome', 'Nome', 'Name', 'Nombre'),
(139, 'table_email', 'E-mail', 'Email', 'Correo electrónico'),
(140, 'table_razao', 'Empresa', 'Company', 'Empresa'),
(141, 'table_telefone', 'Telefone', 'Phone', 'Teléfono'),
(142, 'table_categoria', 'Categoria', 'Category', 'Categoría'),
(143, 'table_usuario', 'Usuário', 'User', 'Usuario'),
(144, 'table_cargo', 'Cargo', 'Position', 'Cargo'),
(145, 'table_turma', 'Turma', 'Class', 'Clase'),
(146, 'page_title_teacher', 'Professor', 'Teacher', 'Maestro'),
(147, 'menu_9', 'Alunos', 'Students', 'Estudiantes'),
(148, 'page_title_student', 'Aluno', 'Student', 'Alumno'),
(149, 'page_title_students', 'Alunos', 'Students', 'Estudiantes'),
(150, 'page_title_student_add', 'Incluir Aluno', 'Add Student', 'Agregar Alumno'),
(151, 'page_title_student_edt', 'Alterar Aluno', 'Edit Student', 'Editar Alumno'),
(152, 'form_turma', 'Turma', 'Class', 'Clase'),
(153, 'menu_10', 'Coordenadores', 'Coordinators', 'Coordinadores'),
(154, 'page_title_coordinators', 'Coordenadores', 'Coordinators', 'Coordinadores'),
(157, 'page_title_coordinators_add', 'Incluir Coordenador', 'Add Coordinator', 'Incluir Coordinador'),
(158, 'page_title_coordinators_edt', 'Editar Coordenador', 'Edit Coordinator', 'Editar Coordinador'),
(159, 'menu_11', 'Questões', 'Questions', 'Preguntas'),
(160, 'page_title_questions', 'Questões', 'Questions', 'Preguntas'),
(161, 'page_title_questions_add', 'Incluir Questão', 'Add Question', 'Incluir Pregunta'),
(162, 'page_title_questions_edt', 'Editar Questão', 'Edit Question', 'Editar Pregunta'),
(163, 'table_descritor', 'Descritor', 'Descriptor', 'Descriptor'),
(164, 'table_titulo', 'Título', 'Title', 'Título'),
(165, 'table_enunciado', 'Enunciado', 'Statement', 'Declaración'),
(166, 'page_title_question', 'Questão', 'Question', 'Pregunta'),
(167, 'form_descritor', 'Descritor', 'Descriptor', 'Descriptor'),
(168, 'form_titulo', 'Título', 'Title', 'Título'),
(169, 'form_enunciado', 'Enunciado', 'Statement', 'Declaración'),
(170, 'form_alternativa', 'Resposta', 'Answer', 'Respuesta'),
(171, 'questao_correta', 'Insira aqui a alternativa correta para esta questão.', 'Insert the correct alternative for this question here.', 'Inserte aquí la alternativa correcta para esta pregunta.'),
(172, 'menu_12', 'Provas', 'Exams', 'Exámenes'),
(173, 'page_title_exams', 'Provas', 'Exams', 'Exámenes'),
(174, 'page_title_exams_add', 'Incluir Prova', 'Add Exam', 'Incluir Examen'),
(175, 'page_title_exams_edt', 'Editar Prova', 'Edit Exam', 'Editar Examen'),
(176, 'page_title_exam', 'Prova', 'Exam', 'Examen'),
(177, 'menu_13', 'Agendas', 'Schedules', 'Horarios'),
(178, 'page_title_schedules', 'Agendas', 'Schedules', 'Horarios'),
(179, 'page_title_schedule_add', 'Incluir Agenda', 'Add Schedule', 'Incluir Horario'),
(180, 'page_title_schedule_edt', 'Editar Agenda', 'Edit Schedule', 'Editar Horario'),
(181, 'page_title_schedule', 'Agenda', 'Schedule', 'Horario'),
(182, 'form_dtinicio', 'Data de Início', 'Start Data', 'Fecha de Inicio'),
(183, 'form_dtafim', 'Data de Término', 'End Date', 'Fecha de Finalización'),
(184, 'form_dtrealizacao', 'Data de Realização', 'Date of Realization', 'Fecha de Realización'),
(185, 'menu_14', 'Minhas Provas', 'My Exams', 'Mis Exámenes'),
(186, 'page_title_myexams', 'Minhas Provas', 'My Exams', 'Mis Exámenes'),
(187, 'form_responder', 'Responder', 'Answer', 'Respuesta'),
(188, 'form_iniciar', 'Iniciar Avaliação', 'Start Assessment', 'Iniciar Evaluación'),
(189, 'form_perdido', 'Prazo perdido!', 'Missed deadline!', '¡Se perdió el plazo!'),
(190, 'form_aguarde', 'Aguarde a data da prova', 'Wait for the test date', 'Espere la fecha del examen.'),
(191, 'page_title_myexam', 'Minha Prova', 'My Exam', 'Mi Exámene'),
(192, 'form_imagem', 'URL da Imagem', 'Image URL', 'Imagen URL'),
(194, 'menu_15', 'Relatórios', 'Reports', 'Informes'),
(195, 'page_title_reports', 'Relatórios', 'Reports', 'Informes'),
(199, 'detalhado_aluno', 'Detalhado por Aluno', 'Detailed by Student', 'Detallado por Estudiante'),
(200, 'sintetico_turma', 'Sintético por Turma', 'Summary by Class', 'Resumen por Clase'),
(201, 'sintetico_aluno', 'Sintético por Aluno', 'Summary by Student', 'Resumen por Estudiante'),
(202, 'form_todos', 'Todos', 'All', 'Todos'),
(203, 'total', 'Total', 'Total', 'Total'),
(204, 'corretas', 'Corretas', 'Correct', 'Correcto'),
(205, 'percentual', 'Percentual', 'Reports', 'Porcentaje'),
(207, 'form_idresposta', 'Alternativa', 'Alternative', 'Alternativa'),
(210, 'menu_16', 'Mídias', 'Medias', 'Medias'),
(211, 'page_title_midias', 'Mídias', 'Medias', 'Medias'),
(212, 'inserir_questao', 'Selecione para adicionar', 'Select to add', 'Seleccione para agregar');

-- --------------------------------------------------------

--
-- Estrutura para tabela `log`
--

DROP TABLE IF EXISTS `log`;
CREATE TABLE IF NOT EXISTS `log` (
  `id` int NOT NULL AUTO_INCREMENT,
  `dt_log` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user` text,
  `uri` text,
  `input` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estrutura para tabela `parametro`
--

DROP TABLE IF EXISTS `parametro`;
CREATE TABLE IF NOT EXISTS `parametro` (
  `id` int NOT NULL AUTO_INCREMENT,
  `dt_cadastro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dt_alteracao` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `parametro` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Despejando dados para a tabela `parametro`
--

INSERT INTO `parametro` (`id`, `dt_cadastro`, `dt_alteracao`, `parametro`) VALUES
(1, '2024-03-19 02:39:20', '2024-05-15 14:58:19', 'Necessidades Especiais'),
(4, '2024-08-17 02:10:37', NULL, 'Descritor/Habilidade');

-- --------------------------------------------------------

--
-- Estrutura para tabela `parametro_detalhe`
--

DROP TABLE IF EXISTS `parametro_detalhe`;
CREATE TABLE IF NOT EXISTS `parametro_detalhe` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_parametro` int NOT NULL,
  `dt_cadastro` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `dt_alteracao` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `parametro` varchar(128) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `FK_parametro_detalhe` (`id_parametro`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Despejando dados para a tabela `parametro_detalhe`
--

INSERT INTO `parametro_detalhe` (`id`, `id_parametro`, `dt_cadastro`, `dt_alteracao`, `parametro`, `status`) VALUES
(524, 1, '2024-03-19 02:39:33', NULL, 'Nenhuma', 1),
(525, 1, '2024-03-19 02:40:04', NULL, 'Cadeirante', 1),
(526, 4, '2024-08-17 02:11:14', NULL, 'D1 - Localizar informações explícitas em um texto', 1),
(527, 4, '2024-08-17 02:14:14', NULL, 'D2 - Estabelecer relações entre partes de um texto, identificando repetições ou substituições que contribuem para a continuidade', 1),
(528, 4, '2024-08-17 02:14:14', NULL, 'D3 - Inferir o sentido de uma palavra ou expressão', 1),
(529, 4, '2024-08-17 02:14:14', NULL, 'D4 – Inferir uma informação implícita em um texto', 1),
(530, 4, '2024-08-17 02:14:14', NULL, 'D5 - Interpretar texto com o auxílio de material gráfico diverso (propagandas, quadrinhos, foto etc.)', 1),
(531, 4, '2024-08-17 02:14:14', NULL, 'D6 - Identificar o tema de um texto', 1),
(532, 4, '2024-08-17 02:14:14', NULL, 'D7 - Identificar a tese de um texto', 1),
(533, 4, '2024-08-17 02:14:14', NULL, 'D8 - Estabelecer relação entre a tese e os argumentos oferecidos para sustentá-la', 1),
(534, 4, '2024-08-17 02:14:14', NULL, 'D9 - Diferenciar as partes principais das secundárias em um texto', 1),
(535, 4, '2024-08-17 02:14:14', NULL, 'D10 - Identificar o conflito gerador do enredo e os elementos que constroem a narrativa', 1),
(536, 4, '2024-08-17 02:14:14', NULL, 'D11 - Estabelecer relação causa/consequência entre partes e elementos do texto', 1),
(537, 4, '2024-08-17 02:14:14', NULL, 'D12 - Identificar a finalidade de textos de diferentes gêneros', 1),
(538, 4, '2024-08-17 02:14:14', NULL, 'D13 - Identificar as marcas linguísticas que evidenciam o locutor e o interlocutor de um texto', 1),
(539, 4, '2024-08-17 02:14:14', NULL, 'D14 - Distinguir um fato da opinião relativa a esse fato', 1),
(540, 4, '2024-08-17 02:14:14', NULL, 'D15 – Estabelecer relações lógico-discursivos presentes no texto marcadas por conjuntos, advérbios, etc', 1),
(541, 4, '2024-08-17 02:14:14', NULL, 'D16 - Identificar efeitos de ironia ou humor em textos variados', 1),
(542, 4, '2024-08-17 02:14:14', NULL, 'D17 - Reconhecer o efeito de sentido decorrente do uso da pontuação e de outras notações', 1),
(543, 4, '2024-08-17 02:14:14', NULL, 'D18 - Reconhecer o efeito de sentido decorrente da escolha de uma determinada palavra ou expressão', 1),
(544, 4, '2024-08-17 02:14:14', NULL, 'D19 - Reconhecer o efeito decorrente da exploração de recursos ortográficos e/ou morfossintáticos', 1),
(545, 4, '2024-08-17 02:14:14', NULL, 'D20 - Reconhecer diferentes formas de tratar uma informação na comparação de textos que tratam do mesmo tema em função das condi', 1),
(546, 4, '2024-08-17 02:14:14', NULL, 'D21 - Reconhecer posições distintas entre duas ou mais opiniões relativas ao mesmo fato ou ao mesmo tema', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `perfil`
--

DROP TABLE IF EXISTS `perfil`;
CREATE TABLE IF NOT EXISTS `perfil` (
  `id` int NOT NULL AUTO_INCREMENT,
  `dt_cadastro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dt_alteracao` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `perfil` varchar(128) NOT NULL,
  `permissoes` text,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `editavel` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Despejando dados para a tabela `perfil`
--

INSERT INTO `perfil` (`id`, `dt_cadastro`, `dt_alteracao`, `perfil`, `permissoes`, `status`, `editavel`) VALUES
(1, '2024-01-29 18:42:39', NULL, 'Super Administrador', '*', 0, 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `permissao`
--

DROP TABLE IF EXISTS `permissao`;
CREATE TABLE IF NOT EXISTS `permissao` (
  `id` int NOT NULL AUTO_INCREMENT,
  `descricao` varchar(128) NOT NULL,
  `permissao` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Despejando dados para a tabela `permissao`
--

INSERT INTO `permissao` (`id`, `descricao`, `permissao`, `status`) VALUES
(1, 'Painel', 'main/main/index;profile/profile/index;profile/profile/update;profile/profile/updatelogin;', 1),
(3, 'Usuários (Listar)', 'users/users/index;', 1),
(4, 'Usuários (Visualizar)', 'users/users/index; users/user/index;', 1),
(5, 'Usuários (Incluir)', 'users/users/index; users/user/insert; users/user/save;', 1),
(6, 'Usuários (Editar)', 'users/users/index; users/user/edit; users/user/enable; users/user/disable; users/user/update; users/user/updatelogin;', 1),
(7, 'Perfis (Listar)', 'roles/roles/index;', 1),
(8, 'Perfis (Visualizar)', 'roles/role/index; roles/role/index;', 1),
(9, 'Perfis (Incluir)', 'roles/role/index; roles/role/insert; roles/role/save;', 1),
(10, 'Perfis (Editar)', 'roles/role/index; roles/role/edit; roles/role/enable; roles/role/disable; roles/role/update;', 1),
(11, 'Parâmetro Mestre (Listar)', 'params/params/index;', 0),
(12, 'Parâmetro Mestre (Visualizar)', 'params/params/index; params/param/index;', 0),
(13, 'Parâmetro Mestre (Incluir)', 'params/params/index; params/param/insert; params/param/save;', 0),
(14, 'Parâmetro Mestre (Editar)', 'params/params/index; params/param/edit; params/param/update;', 0),
(15, 'Parâmetro (Listar)', 'params/params/index; params/detail/index;', 1),
(16, 'Parâmetro (Incluir)', 'params/params/index; params/detail/index; params/detail/insert; params/detail/save;', 1),
(17, 'Parâmetro (Editar)', 'params/params/index;  params/detail/index; params/detail/edit; params/detail/update; params/detail/enable; params/detail/disable;', 1),
(18, 'Turmas (Listar)', 'classrooms/classrooms/index;', 1),
(19, 'Turmas (Visualizar)', 'classrooms/classrooms/index; classrooms/classroom/index;', 1),
(20, 'Turmas (Incluir)', 'classrooms/classrooms/index; classrooms/classroom/insert; classrooms/classroom/save;', 1),
(21, 'Turmas (Editar)', 'classrooms/classrooms/index; classrooms/classroom/edit; classrooms/classroom/update; classrooms/classroom/enable; classrooms/classroom/disable;', 1),
(22, 'Professores (Listar)', 'teachers/teachers/index;', 1),
(23, 'Professores (Visualizar)', 'teachers/teachers/index; teachers/teacher/index;', 1),
(24, 'Professores (Incluir)', 'teachers/teachers/index; teachers/teacher/insert; teachers/teacher/save;', 1),
(25, 'Professores (Editar)', 'teachers/teachers/index; teachers/teacher/edit; teachers/teacher/update; teachers/teacher/enable; teachers/teacher/disable;', 1),
(26, 'Alunos (Listar)', 'students/students/index;', 1),
(27, 'Alunos (Visualizar)', 'students/students/index; students/student/index;', 1),
(28, 'Alunos (Incluir)', 'students/students/index; students/student/insert; students/student/save;', 1),
(29, 'Alunos (Editar)', 'students/students/index; students/student/edit; students/student/update; students/student/enable; students/student/disable;', 1),
(30, 'Coordenadores (Listar)', 'coordinators/coordinators/index;', 1),
(31, 'Coordenadores (Visualizar)', 'coordinators/coordinators/index; coordinators/coordinator/index;', 1),
(32, 'Coordenadores (Incluir)', 'coordinators/coordinators/index; coordinators/coordinator/insert; coordinators/coordinator/save;', 1),
(33, 'Coordenadores (Editar)', 'coordinators/coordinators/index; coordinators/coordinator/edit; coordinators/coordinator/update; coordinators/coordinator/enable; coordinators/coordinator/disable;', 1),
(34, 'Questões (Listar)', 'questions/questions/index;', 1),
(35, 'Questões (Visualizar)', 'questions/questions/index; questions/question/index;', 1),
(36, 'Questões (Incluir)', 'questions/questions/index; questions/question/insert; questions/question/save;', 1),
(37, 'Questões (Editar)', 'questions/questions/index;questions/question/edit;questions/question/update;questions/question/enable;questions/question/disable;', 1),
(38, 'Provas (Listar)', 'exams/exams/index;', 1),
(39, 'Provas (Visualizar)', 'exams/exams/index; exams/exam/index;', 1),
(40, 'Provas (Incluir)', 'exams/exams/index; exams/exam/insert; exams/exam/save;', 1),
(41, 'Provas (Editar)', 'exams/exams/index; exams/exam/edit;exams/exam/update; exams/exam/enable; exams/exam/disable;', 1),
(42, 'Minhas Provas (Listar)', 'myexams/myexams/index;', 1),
(43, 'Minhas Provas (Responder)', 'myexams/myexams/index;myexams/myexam/index;myexams/myexam/save;', 1),
(44, 'Relatório (Sintético por Turma)', 'reports/reports/index; reports/reports/syntheticclass;', 1),
(45, 'Relatório (Sintético por Aluno)', 'reports/reports/index; reports/reports/syntheticstudent;', 1),
(46, 'Relatório (Detalhado por Aluno)', 'reports/reports/index; reports/reports/datailstudent;', 1),
(47, 'Mídias (Listar)', 'midias/midias/index;midias/midias/upload;', 1),
(48, 'Agendas (Listar)', 'schedules/schedules/index;', 1),
(49, 'Agendas (Visualizar)', 'schedules/schedules/index; schedules/schedule/index;', 1),
(50, 'Agendas (Incluir)', 'schedules/schedules/index; schedules/schedule/insert; schedules/schedule/save;', 1),
(51, 'Agendas (Editar)', 'schedules/schedules/index; schedules/schedule/edit; schedules/schedule/update; schedules/schedule/enable; schedules/schedule/disable;', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `prova`
--

DROP TABLE IF EXISTS `prova`;
CREATE TABLE IF NOT EXISTS `prova` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_usuario` int DEFAULT NULL,
  `dt_cadastro` int NOT NULL,
  `dt_alteracao` int NOT NULL,
  `alteravel` tinyint(1) NOT NULL DEFAULT '1',
  `titulo` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `descricao` text COLLATE utf8mb4_general_ci,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `FK_prova_usuario` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `prova`
--

INSERT INTO `prova` (`id`, `id_usuario`, `dt_cadastro`, `dt_alteracao`, `alteravel`, `titulo`, `descricao`, `status`) VALUES
(1, 1, 0, 0, 0, 'Avaliação Diagnóstica 1', 'Composta por dez questões sobre os Descritores de D1 a D10. O seu layout terá destaques na cor cinza.', 1),
(4, 1, 0, 0, 1, 'Título da Prova', 'Descrição da Prova', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `prova_detalhe`
--

DROP TABLE IF EXISTS `prova_detalhe`;
CREATE TABLE IF NOT EXISTS `prova_detalhe` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_prova` int NOT NULL,
  `id_questao` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_detalhe_prova` (`id_prova`),
  KEY `FK_detalhe_questao` (`id_questao`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `prova_realizada`
--

DROP TABLE IF EXISTS `prova_realizada`;
CREATE TABLE IF NOT EXISTS `prova_realizada` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_agenda_detalhe` int NOT NULL,
  `id_questao` int NOT NULL,
  `id_resposta` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_resposta_agenda_detalhe` (`id_agenda_detalhe`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `questao`
--

DROP TABLE IF EXISTS `questao`;
CREATE TABLE IF NOT EXISTS `questao` (
  `id` int NOT NULL AUTO_INCREMENT,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `dt_cadastro` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dt_alteracao` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `id_descritor` int NOT NULL,
  `titulo` text COLLATE utf8mb4_general_ci NOT NULL,
  `enunciado` text COLLATE utf8mb4_general_ci NOT NULL,
  `imagem` text COLLATE utf8mb4_general_ci,
  `resposta_1` text COLLATE utf8mb4_general_ci NOT NULL,
  `resposta_2` text COLLATE utf8mb4_general_ci NOT NULL,
  `resposta_3` text COLLATE utf8mb4_general_ci NOT NULL,
  `resposta_4` text COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_questao_descritor` (`id_descritor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura stand-in para view `relatorio_detalhado_aluno`
-- (Veja abaixo para a visão atual)
--
DROP VIEW IF EXISTS `relatorio_detalhado_aluno`;
CREATE TABLE IF NOT EXISTS `relatorio_detalhado_aluno` (
`data` date
,`descricao` text
,`descritor` varchar(128)
,`dt_realizado` timestamp
,`enunciado` text
,`id_agenda` int
,`id_aluno` int
,`id_prova` int
,`id_questao` int
,`id_resposta` int
,`id_turma` int
,`nome` varchar(128)
,`questao` text
,`resposta` varchar(13)
,`titulo` varchar(255)
,`turma` varchar(128)
);

-- --------------------------------------------------------

--
-- Estrutura stand-in para view `relatorio_sintetico_aluno`
-- (Veja abaixo para a visão atual)
--
DROP VIEW IF EXISTS `relatorio_sintetico_aluno`;
CREATE TABLE IF NOT EXISTS `relatorio_sintetico_aluno` (
`corretas` decimal(23,0)
,`data` date
,`descricao` text
,`dt_realizado` timestamp
,`erradas` decimal(23,0)
,`id_agenda` int
,`id_aluno` int
,`id_prova` int
,`id_turma` int
,`nome` varchar(128)
,`nulas` decimal(23,0)
,`percentual` varchar(75)
,`titulo` varchar(255)
,`total` bigint
,`turma` varchar(128)
);

-- --------------------------------------------------------

--
-- Estrutura stand-in para view `relatorio_sintetico_turma`
-- (Veja abaixo para a visão atual)
--
DROP VIEW IF EXISTS `relatorio_sintetico_turma`;
CREATE TABLE IF NOT EXISTS `relatorio_sintetico_turma` (
`corretas` decimal(23,0)
,`data` date
,`descricao` text
,`descritor` varchar(128)
,`id_agenda` int
,`id_prova` int
,`id_turma` int
,`percentual` varchar(75)
,`titulo` varchar(255)
,`total` bigint
,`turma` varchar(128)
);

-- --------------------------------------------------------

--
-- Estrutura para tabela `turma`
--

DROP TABLE IF EXISTS `turma`;
CREATE TABLE IF NOT EXISTS `turma` (
  `id` int NOT NULL AUTO_INCREMENT,
  `dt_cadastro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dt_alteracao` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `turma` varchar(128) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_perfil` int NOT NULL,
  `id_necessidade` int DEFAULT NULL,
  `id_turma` int DEFAULT NULL,
  `dt_cadastro` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dt_alteracao` datetime DEFAULT NULL,
  `dt_login` datetime DEFAULT NULL,
  `dt_ativacao` datetime DEFAULT NULL,
  `dt_inativacao` datetime DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `login` varchar(32) NOT NULL,
  `email` varchar(128) NOT NULL,
  `senha` varchar(256) NOT NULL,
  `nome` varchar(128) NOT NULL,
  `idioma` varchar(64) NOT NULL DEFAULT 'portuguese-brazilian',
  PRIMARY KEY (`id`),
  UNIQUE KEY `login` (`login`),
  KEY `FK_usuario_perfil` (`id_perfil`),
  KEY `id_necessidade` (`id_necessidade`),
  KEY `FK_usuario_turma` (`id_turma`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Despejando dados para a tabela `usuario`
--

INSERT INTO `usuario` (`id`, `id_perfil`, `id_necessidade`, `id_turma`, `dt_cadastro`, `dt_alteracao`, `dt_login`, `dt_ativacao`, `dt_inativacao`, `status`, `login`, `email`, `senha`, `nome`, `idioma`) VALUES
(1, 1, 524, NULL, '2024-05-09 19:08:45', '2025-02-05 03:26:56', '2025-03-25 20:02:30', NULL, NULL, 1, 'admin', 'admin@admin.com.br', '1f087ba9dce79006d5f2f9c91dd02e2bdccdba29', 'Super Admin', 'portuguese-brazilian');

-- --------------------------------------------------------

--
-- Estrutura para view `relatorio_detalhado_aluno`
--
DROP TABLE IF EXISTS `relatorio_detalhado_aluno`;

DROP VIEW IF EXISTS `relatorio_detalhado_aluno`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `relatorio_detalhado_aluno`  AS SELECT DISTINCT `a`.`id` AS `id_agenda`, `p`.`id` AS `id_prova`, `t`.`id` AS `id_turma`, `l`.`id` AS `id_aluno`, `q`.`id` AS `id_questao`, `p`.`titulo` AS `titulo`, `p`.`descricao` AS `descricao`, `a`.`dt_inicio` AS `data`, `ad`.`dt_realizado` AS `dt_realizado`, `t`.`turma` AS `turma`, `l`.`nome` AS `nome`, `d`.`parametro` AS `descritor`, `q`.`titulo` AS `questao`, `q`.`enunciado` AS `enunciado`, `pr`.`id_resposta` AS `id_resposta`, (case when (`pr`.`id_resposta` is null) then 'nao respondeu' when (`pr`.`id_resposta` = 1) then 'acertou' else 'errou' end) AS `resposta` FROM ((((((((`agenda` `a` join `agenda_detalhe` `ad` on((`ad`.`id_agenda` = `a`.`id`))) join `usuario` `l` on((`ad`.`id_aluno` = `l`.`id`))) join `turma` `t` on((`l`.`id_turma` = `t`.`id`))) join `prova` `p` on((`a`.`id_prova` = `p`.`id`))) join `prova_detalhe` `pd` on((`p`.`id` = `pd`.`id_prova`))) left join `prova_realizada` `pr` on(((`ad`.`id` = `pr`.`id_agenda_detalhe`) and (`pd`.`id_questao` = `pr`.`id_questao`)))) join `questao` `q` on((`pd`.`id_questao` = `q`.`id`))) join `parametro_detalhe` `d` on((`q`.`id_descritor` = `d`.`id`))) ;

-- --------------------------------------------------------

--
-- Estrutura para view `relatorio_sintetico_aluno`
--
DROP TABLE IF EXISTS `relatorio_sintetico_aluno`;

DROP VIEW IF EXISTS `relatorio_sintetico_aluno`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `relatorio_sintetico_aluno`  AS SELECT `a`.`id` AS `id_agenda`, `p`.`id` AS `id_prova`, `t`.`id` AS `id_turma`, `l`.`id` AS `id_aluno`, `p`.`titulo` AS `titulo`, `p`.`descricao` AS `descricao`, `a`.`dt_inicio` AS `data`, `ad`.`dt_realizado` AS `dt_realizado`, `t`.`turma` AS `turma`, `l`.`nome` AS `nome`, count(`pd`.`id_questao`) AS `total`, sum((case when (`pr`.`id_resposta` is null) then 1 else 0 end)) AS `nulas`, sum((case when (`pr`.`id_resposta` = 1) then 1 else 0 end)) AS `corretas`, sum((case when ((`pr`.`id_resposta` is not null) and (`pr`.`id_resposta` <> 1)) then 1 else 0 end)) AS `erradas`, concat(format(if((count(`pd`.`id_questao`) = 0),0,((sum((case when (`pr`.`id_resposta` = 1) then 1 else 0 end)) / count(`pd`.`id_questao`)) * 100)),2),'%') AS `percentual` FROM (((((((`agenda` `a` join `agenda_detalhe` `ad` on((`ad`.`id_agenda` = `a`.`id`))) join `usuario` `l` on((`ad`.`id_aluno` = `l`.`id`))) join `turma` `t` on((`l`.`id_turma` = `t`.`id`))) join `prova` `p` on((`a`.`id_prova` = `p`.`id`))) join `prova_detalhe` `pd` on((`p`.`id` = `pd`.`id_prova`))) join `questao` `q` on((`pd`.`id_questao` = `q`.`id`))) left join `prova_realizada` `pr` on(((`ad`.`id` = `pr`.`id_agenda_detalhe`) and (`pd`.`id_questao` = `pr`.`id_questao`)))) GROUP BY `a`.`id`, `a`.`id_prova`, `p`.`titulo`, `p`.`descricao`, `a`.`dt_inicio`, `a`.`dt_fim`, `ad`.`dt_realizado`, `t`.`turma`, `l`.`nome` ORDER BY `p`.`titulo` ASC, `t`.`turma` ASC, `l`.`nome` ASC ;

-- --------------------------------------------------------

--
-- Estrutura para view `relatorio_sintetico_turma`
--
DROP TABLE IF EXISTS `relatorio_sintetico_turma`;

DROP VIEW IF EXISTS `relatorio_sintetico_turma`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `relatorio_sintetico_turma`  AS SELECT `a`.`id` AS `id_agenda`, `p`.`id` AS `id_prova`, `t`.`id` AS `id_turma`, `a`.`dt_inicio` AS `data`, `t`.`turma` AS `turma`, `p`.`titulo` AS `titulo`, `p`.`descricao` AS `descricao`, `d`.`parametro` AS `descritor`, count(`pd`.`id_questao`) AS `total`, sum((case when (`pr`.`id_resposta` = 1) then 1 else 0 end)) AS `corretas`, concat(format(if((count(`pd`.`id_questao`) = 0),0,((sum((case when (`pr`.`id_resposta` = 1) then 1 else 0 end)) / count(`pd`.`id_questao`)) * 100)),2),'%') AS `percentual` FROM ((((((((`agenda` `a` join `prova` `p` on((`a`.`id_prova` = `p`.`id`))) join `prova_detalhe` `pd` on((`p`.`id` = `pd`.`id_prova`))) join `agenda_detalhe` `ad` on((`ad`.`id_agenda` = `a`.`id`))) join `usuario` `l` on((`ad`.`id_aluno` = `l`.`id`))) join `turma` `t` on((`l`.`id_turma` = `t`.`id`))) join `questao` `q` on((`pd`.`id_questao` = `q`.`id`))) join `parametro_detalhe` `d` on((`q`.`id_descritor` = `d`.`id`))) left join `prova_realizada` `pr` on(((`ad`.`id` = `pr`.`id_agenda_detalhe`) and (`pd`.`id_questao` = `pr`.`id_questao`)))) GROUP BY `a`.`dt_inicio`, `t`.`turma`, `p`.`titulo`, `p`.`descricao`, `d`.`parametro` ORDER BY `a`.`dt_inicio` DESC, `t`.`turma` ASC, `p`.`titulo` ASC, `p`.`descricao` ASC, `d`.`parametro` ASC ;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `agenda`
--
ALTER TABLE `agenda`
  ADD CONSTRAINT `FK_agenda_prova` FOREIGN KEY (`id_prova`) REFERENCES `prova` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Restrições para tabelas `agenda_detalhe`
--
ALTER TABLE `agenda_detalhe`
  ADD CONSTRAINT `FK_agenda_aluno` FOREIGN KEY (`id_aluno`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_detalhe_agenda` FOREIGN KEY (`id_agenda`) REFERENCES `agenda` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `parametro_detalhe`
--
ALTER TABLE `parametro_detalhe`
  ADD CONSTRAINT `FK_parametro_detalhe` FOREIGN KEY (`id_parametro`) REFERENCES `parametro` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `prova`
--
ALTER TABLE `prova`
  ADD CONSTRAINT `FK_prova_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Restrições para tabelas `prova_detalhe`
--
ALTER TABLE `prova_detalhe`
  ADD CONSTRAINT `FK_detalhe_prova` FOREIGN KEY (`id_prova`) REFERENCES `prova` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_detalhe_questao` FOREIGN KEY (`id_questao`) REFERENCES `questao` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `prova_realizada`
--
ALTER TABLE `prova_realizada`
  ADD CONSTRAINT `FK_resposta_agenda_detalhe` FOREIGN KEY (`id_agenda_detalhe`) REFERENCES `agenda_detalhe` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `questao`
--
ALTER TABLE `questao`
  ADD CONSTRAINT `FK_questao_descritor` FOREIGN KEY (`id_descritor`) REFERENCES `parametro_detalhe` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `FK_usuario_necessidade` FOREIGN KEY (`id_necessidade`) REFERENCES `parametro_detalhe` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_usuario_perfil` FOREIGN KEY (`id_perfil`) REFERENCES `perfil` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_usuario_turma` FOREIGN KEY (`id_turma`) REFERENCES `turma` (`id`) ON DELETE RESTRICT ON UPDATE SET NULL;
COMMIT;