/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     16-10-2014 17:37:22                          */
/*==============================================================*/

create database conocetusede character set utf8 collate utf8_general_ci;
use conocetusede;

drop table if exists acceso;

drop table if exists actividad;

drop table if exists afiche;

drop table if exists asignatura;

drop table if exists foto_sala;

drop table if exists horario;

drop table if exists notificacion;

drop table if exists password;

drop table if exists perfil;

drop table if exists sabana_horaria;

drop table if exists sala;

drop table if exists seccion;

drop table if exists tipo;

drop table if exists usuario;

/*==============================================================*/
/* Table: acceso                                                */
/*==============================================================*/
create table acceso
(
   id_acceso            int not null,
   id_perfil            int,
   descripcion_acce     varchar(80) not null,
   primary key (id_acceso)
);

/*==============================================================*/
/* Table: actividad                                             */
/*==============================================================*/
create table actividad
(
   id_actividad         int not null,
   id_tipo              int not null,
   id_usuario           int not null,
   nombre_act           varchar(40) not null,
   descripcion_act      varchar(300) not null,
   hora_act             time not null,
   fecha_act            date not null,
   ubicacion_act        varchar(25) not null,
   primary key (id_actividad)
);

/*==============================================================*/
/* Table: afiche                                                */
/*==============================================================*/
create table afiche
(
   id_afiche            int not null,
   id_actividad         int not null,
   afiche               varchar(60) not null,
   fecha_publicacion    date not null,
   primary key (id_afiche)
);

/*==============================================================*/
/* Table: asignatura                                            */
/*==============================================================*/
create table asignatura
(
   id_asignatura        int not null,
   nombre_asig          varchar(30) not null,
   sigla_asig           varchar(10) not null,
   primary key (id_asignatura)
);

/*==============================================================*/
/* Table: foto_sala                                             */
/*==============================================================*/
create table foto_sala
(
   id_foto              int not null,
   id_sala              int not null,
   foto_sala            varchar(60) not null,
   fecha_foto           date not null,
   primary key (id_foto)
);

/*==============================================================*/
/* Table: horario                                               */
/*==============================================================*/
create table horario
(
   id_horario           int not null,
   id_seccion           int not null,
   id_sala              int not null,
   dia_clases           varchar(15) not null,
   hora_inicio          time not null,
   hora_termino         time not null,
   primary key (id_horario)
);

/*==============================================================*/
/* Table: notificacion                                          */
/*==============================================================*/
create table notificacion
(
   id_notificacion      int not null,
   id_actividad         int not null,
   fecha_notificacion   date not null,
   descrip_notifi       varchar(200),
   primary key (id_notificacion)
);

/*==============================================================*/
/* Table: password                                              */
/*==============================================================*/
create table password
(
   id_usuario           int not null,
   hash_pass            varchar(15) not null,
   fecha_caducidad      date not null,
   estado_password      varchar(15) not null,
   primary key (id_usuario)
);

/*==============================================================*/
/* Table: perfil                                                */
/*==============================================================*/
create table perfil
(
   id_perfil            int not null,
   nombre               varchar(20) not null,
   descrip_sabana       varchar(200) not null,
   primary key (id_perfil)
);

/*==============================================================*/
/* Table: sabana_horaria                                        */
/*==============================================================*/
create table sabana_horaria
(
   id_sabana            int not null,
   id_sala              int not null,
   semestre             int not null,
   fec_inicio           date not null,
   fec_termino          date not null,
   fec_creacion         date not null,
   descrip_sabana       varchar(200) not null,
   primary key (id_sabana)
);

/*==============================================================*/
/* Table: sala                                                  */
/*==============================================================*/
create table sala
(
   id_sala              int not null,
   nombre_sala          varchar(10) not null,
   ubicacion_sala       varchar(25) not null,
   capacidad            numeric(3,0) not null,
   primary key (id_sala)
);

/*==============================================================*/
/* Table: seccion                                               */
/*==============================================================*/
create table seccion
(
   id_seccion           int not null,
   id_asignatura        int not null,
   numero_secc          numeric(3,0) not null,
   jornada              char(1) not null,
   profesor             varchar(30) not null,
   primary key (id_seccion)
);

/*==============================================================*/
/* Table: tipo                                                  */
/*==============================================================*/
create table tipo
(
   id_tipo              int not null,
   tipo_actividad       varchar(30) not null,
   nombre_tipo          varchar(15) not null,
   primary key (id_tipo)
);

/*==============================================================*/
/* Table: usuario                                               */
/*==============================================================*/
create table usuario
(
   id_usuario           int not null,
   id_perfil            int,
   nombres              varchar(30) not null,
   ape_materno          varchar(15) not null,
   ape_paterno          varchar(15) not null,
   rut                  varchar(10) not null,
   correo_electronico   varchar(50) not null,
   primary key (id_usuario)
);

alter table acceso add constraint fk_perfil_acceso foreign key (id_perfil)
      references perfil (id_perfil) on delete restrict on update restrict;

alter table actividad add constraint fk_tipo_actividad foreign key (id_tipo)
      references tipo (id_tipo) on delete restrict on update restrict;

alter table actividad add constraint fk_usuario_actividades foreign key (id_usuario)
      references usuario (id_usuario) on delete restrict on update restrict;

alter table afiche add constraint fk_actividad_afiche foreign key (id_actividad)
      references actividad (id_actividad) on delete restrict on update restrict;

alter table foto_sala add constraint fk_sala_fotosala foreign key (id_sala)
      references sala (id_sala) on delete restrict on update restrict;

alter table horario add constraint fk_seccion_horario foreign key (id_seccion)
      references seccion (id_seccion) on delete restrict on update restrict;

alter table horario add constraint fk_sala_horario foreign key (id_sala)
      references sala (id_sala) on delete restrict on update restrict;

alter table notificacion add constraint fk_actividad_notificacion foreign key (id_actividad)
      references actividad (id_actividad) on delete restrict on update restrict;

alter table password add constraint fk_usuario_password foreign key (id_usuario)
      references usuario (id_usuario) on delete restrict on update restrict;

alter table sabana_horaria add constraint fk_sala_sabanahoraria foreign key (id_sala)
      references sala (id_sala) on delete restrict on update restrict;

alter table seccion add constraint fk_asignatura_seccion foreign key (id_asignatura)
      references asignatura (id_asignatura) on delete restrict on update restrict;

alter table usuario add constraint fk_perfil_usuario foreign key (id_perfil)
      references perfil (id_perfil) on delete restrict on update restrict;



create index index_acceso on acceso (id_perfil);

create index index_actividad on actividad (id_tipo);

create index  index_actividad_1 on actividad (id_usuario);

create index index_afiche on afiche (id_actividad);

create index index_foto_sala on foto_sala (id_sala);

create index index_horario on horario (id_seccion);

create index index_horario1 on horario (id_sala);

create index index_notificacion on notificacion (id_actividad);

create index index_password on password (id_usuario); 

create index index_sabana_horaria on sabana_horaria (id_sala);

create index index_seccion on seccion (id_asignatura);


create index index_usuario on usuario (id_perfil);


