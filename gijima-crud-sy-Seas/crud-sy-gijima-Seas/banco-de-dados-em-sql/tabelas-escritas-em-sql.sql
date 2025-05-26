create database seas;
use seas;
 
create table clinica( 
	id_clinica int primary key auto_increment,
    nome_clinica varchar(255) not null
 );
 
  create table adm(
	id_adm int primary key auto_increment,
    nome_adm varchar(255) not null,
    chave_de_acesso varchar(255) not null,
    numero_telefone varchar(255) not null,
    email_adm varchar(255) not null
 );
 
 
 create table psicologo(
	id_psicologo int primary key auto_increment,
    nome_psicologo  varchar(255) not null,
    data_nacimento date not null,
    email_psicologo varchar(255),
    especialidades varchar(800) not null,
	CONSTRAINT Fk_clinica_do_psicologo FOREIGN KEY (id_clinica) REFERENCES clinica(id_clinica)
 );
 
 
 create table paciente(
	id_paciente int primary key auto_increment,
    nome_paciente  varchar(255) not null,
    data_nacimento date not null,
    numero_telefone int,
    email_paciente varchar(255),
    CONSTRAINT FK_Psicologo_do_paciente FOREIGN KEY (id_psicologo) REFERENCES psicologo(id_psicologo),
	CONSTRAINT Fk_clinica_do_paciente FOREIGN KEY (id_clinica) REFERENCES clinica(id_clinica)
 );
 

 create table loja_de_medicamentos(
	id_remedios int primary key auto_increment,
    nome_remedios varchar(255) not null,
    especialidades varchar(255) not null,
    efeitos_colaterais varchar(255) not null,
    data_validade date, 
    data_fabricacao date,
    quantidade_em_estoque int not null
);

create table agendamento(
	id_agendamento int primary key auto_increment,
    status_agendamento boolean not null unique,
    CONSTRAINT Fk_clinica_do_atendimento FOREIGN KEY (id_clinica) REFERENCES clinica(id_clinica),
	CONSTRAINT Fk_psicologo_do_atendimento FOREIGN KEY (id_psicologo) REFERENCES psicologo(id_psicologo),
    CONSTRAINT Fk_psicologo_para_o_atendimento_do_paciente FOREIGN KEY (FK_Psicologo_do_paciente) REFERENCES paciente(FK_Psicologo_do_paciente),
    data_do_atendimento date    
);

create table rotina_de_remedios(
	id_rotina int primary key auto_increment,
    dosagem decimal unique not null,
    data_dos_remedios date,
    horario_de_tomar_os_remedio time,
    
	CONSTRAINT FK_Psicologo_do_paciente FOREIGN KEY (id_psicologo) REFERENCES psicologo(id_psicologo),
	CONSTRAINT Fk_clinica_do_paciente FOREIGN KEY (id_clinica) REFERENCES clinica(id_clinica),
    CONSTRAINT FK_rotina_do_paciente FOREIGN KEY (id_paciente) REFERENCES paciente(id_paciente)
);

create table compra_de_remedio(
	CONSTRAINT FK_Psicologo_do_paciente FOREIGN KEY (id_psicologo) REFERENCES psicologo(id_psicologo),
    
	CONSTRAINT Fk_loja_remedio FOREIGN KEY (id_remedios) REFERENCES loja_medicamentos(id_remedios),
	 laudo_de_liberacao_medica varchar(255),
     local_de_entrega varchar(255),
     status_da_compra boolean unique not null
);




 
 
 