create database nypyme;

use nypyme;

create table meta(
id int not null auto_increment,
nome varchar(40) not null,
idRegraParaCumprir int not null,
idRegraParaLimitar int not null,
idRegraParaRecompensar int not null,
constraint pkMeta primary key (id),
constraint fkRegraParaCumprir foreign key(idRegraParaCumprir) references regraParaCumprir(id),
constraint fkRegraParaLimitar foreign key (idRegraParaLimitar) references regraParaLimitar(id),
constraint fkRegraParaRecompensar foreign key (idRegraParaRecompensar) references regraParaRecompensar(id)
);

create table regraParaCumprir(
id int not null auto_increment,
nome int not null,
idRequisitos int not null,
quantidade int not null,
acumulatividade boolean,
constraint pkRegraCumprir primary key (id),
constraint fkRequisitos foreign key (idRequisitos) references requisitos(id));

create table requisitos(
id int not null auto_increment,
nome varchar(30) not null,
constraint pkRequisitos primary key (id)
);

create table regraParaLimitar(
id int not null auto_increment,
idTipoLimite int not null,
quantidade int null,
constraint pkRegraLimitar primary key (id),
constraint fkTipoLimite foreign key (idTipoLimite) references tipoLimite(id)
);

create table tipoLimite(
id int not null auto_increment,
descricao varchar(30) not null,
constraint pkTipoLimite primary key (id)
);

create table regraParaRecompensar(
id int not null auto_increment,
idTipoRecompensa int not null,
quantidade int not null,
constraint pkRegraRecompensar primary key (id),
constraint fkTipoRecompensa foreign key (idTipoRecompensa) references tipoRecompensa(id)
);

create table tipoRecompensa(
id int not null auto_increment,
descricao varchar(30) not null,
constraint pkTipoRecompensa primary key (id)
);

create table clientes(
idPessoa int not null unique,
pontos int not null,
constraint pkClientes primary key (idPessoa),
constraint fkPessoa foreign key (idPessoa) 
);
create table transacoes(
id int not null auto_increment,
cliente
);

create table pessoa(
id int not null auto_increment,
nome varchar(30) not null,
sobrenome varchar(30) not null,
cpf int not null,

);

drop table meta;
drop table regraParaCumprir;
drop table regraParaLimitar;
drop table regraParaRecompensar;
drop table clientes;
drop table requisitos;
drop table tiporecompensa;
drop table tipolimite;


