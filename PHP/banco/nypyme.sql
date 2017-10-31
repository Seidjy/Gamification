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


create table pessoa(
id int not null auto_increment,
nome varchar(30) not null,
sobrenome varchar(30) not null,
cpf int not null,
datanascimento
);
create table transacoes(
id int not null auto_increment,
cliente
);


drop table meta;
drop table regraParaCumprir;
drop table regraParaLimitar;
drop table regraParaRecompensar;
drop table dealsdeals;
drop table rules_to_achieves;
drop table migratransactionstions;
drop table transactions;

insert into type_restricts (name) values ("sem restricao");

update type_restricts set name = "Sem Limitação"  where id = 1;

insert into type_restricts (name) values ("Dias");

insert into type_achieves (name) values ("Valor");

update type_achieves set name = "Valor em Real" where id = 1;
insert into type_awards (name) values ("Pontos");

insert into customers (cpf, endereco, points) values (44309748880, "Rua João Dal Ponte", 0);
insert into customers (cpf, endereco, points) values (43940151890, "Queiroz 275", 0);