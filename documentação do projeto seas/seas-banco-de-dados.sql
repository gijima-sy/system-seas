CREATE DATABASE seas;
USE seas;

CREATE TABLE clinica (
    id_clinica INT PRIMARY KEY AUTO_INCREMENT,
    nome_clinica VARCHAR(255) NOT NULL
);

CREATE TABLE adm (
    id_adm INT PRIMARY KEY AUTO_INCREMENT,
    nome_adm VARCHAR(255) NOT NULL,
    chave_de_acesso VARCHAR(255) NOT NULL,
    numero_telefone VARCHAR(255) NOT NULL,
    email_adm VARCHAR(255) NOT NULL
);

CREATE TABLE psicologos (
    id_psicologo INT PRIMARY KEY AUTO_INCREMENT,
    nome_psicologo VARCHAR(255) NOT NULL,
    data_nacimento DATE NOT NULL,
    email_psicologo VARCHAR(255),
    especialidades VARCHAR(800) NOT NULL,
    id_clinica INT,
    CONSTRAINT fk_clinica_do_psicologo FOREIGN KEY (id_clinica) REFERENCES clinica(id_clinica)
);

CREATE TABLE pacientes (
    id_paciente INT PRIMARY KEY AUTO_INCREMENT,
    nome_paciente VARCHAR(255) NOT NULL,
    data_nacimento DATE NOT NULL,
    numero_telefone INT,
    email_paciente VARCHAR(255),
    senha_paciente VARCHAR(16),
    id_psicologo INT,
    id_clinica INT,
    CONSTRAINT fk_psicologo_do_paciente FOREIGN KEY (id_psicologo) REFERENCES psicologo(id_psicologo),
    CONSTRAINT fk_clinica_do_paciente FOREIGN KEY (id_clinica) REFERENCES clinica(id_clinica)
);

CREATE TABLE loja_de_medicamentos (
    id_remedios INT PRIMARY KEY AUTO_INCREMENT,
    nome_remedios VARCHAR(255) NOT NULL,
    especialidades VARCHAR(255) NOT NULL,
    efeitos_colaterais VARCHAR(255) NOT NULL,
    data_validade DATE,
    data_fabricacao DATE,
    quantidade_em_estoque INT NOT NULL
);

CREATE TABLE agendamento (
    id_agendamento INT PRIMARY KEY AUTO_INCREMENT,
    status_agendamento BOOLEAN NOT NULL,
    data_do_atendimento DATE,
    id_clinica INT,
    id_psicologo INT,
    id_paciente INT,
    CONSTRAINT fk_clinica_do_atendimento FOREIGN KEY (id_clinica) REFERENCES clinica(id_clinica),
    CONSTRAINT fk_psicologo_do_atendimento FOREIGN KEY (id_psicologo) REFERENCES psicologo(id_psicologo),
    CONSTRAINT fk_paciente_do_atendimento FOREIGN KEY (id_paciente) REFERENCES paciente(id_paciente)
);

CREATE TABLE rotina_de_remedios (
    id_rotina INT PRIMARY KEY AUTO_INCREMENT,
    dosagem DECIMAL(10,2) NOT NULL,
    data_dos_remedios DATE,
    horario_de_tomar_os_remedio TIME,
    id_psicologo INT,
    id_clinica INT,
    id_paciente INT,
    CONSTRAINT fk_psicologo_na_rotina FOREIGN KEY (id_psicologo) REFERENCES psicologo(id_psicologo),
    CONSTRAINT fk_clinica_na_rotina FOREIGN KEY (id_clinica) REFERENCES clinica(id_clinica),
    CONSTRAINT fk_paciente_na_rotina FOREIGN KEY (id_paciente) REFERENCES paciente(id_paciente)
);

CREATE TABLE compra_de_remedio (
    id_compra INT PRIMARY KEY AUTO_INCREMENT,
    id_psicologo INT,
    id_remedios INT,
    laudo_de_liberacao_medica VARCHAR(255),
    local_de_entrega VARCHAR(255),
    status_da_compra BOOLEAN NOT NULL,
    CONSTRAINT fk_psicologo_na_compra FOREIGN KEY (id_psicologo) REFERENCES psicologo(id_psicologo),
    CONSTRAINT fk_loja_remedio FOREIGN KEY (id_remedios) REFERENCES loja_de_medicamentos(id_remedios)
);



 
 
 