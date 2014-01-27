-- Database: sadmincom

-- DROP DATABASE sadmincom;

/*CREATE DATABASE sadmincom
  WITH OWNER = postgres
       ENCODING = 'UTF8'
       TABLESPACE = pg_default
       LC_COLLATE = 'English_United States.1252'
       LC_CTYPE = 'English_United States.1252'
       CONNECTION LIMIT = -1;

create table departamento(dn serial, ddepartamento char(50), primary key(dn));
create table tmedio(tmn serial, tmmedio char(50), primary key(tmn));
create table programa(pron serial, proprograma char(100), primary key(pron));
create table horario(hn serial, hhorario time, primary key(hn));
create table tusuario(tun serial, tutipo char(50), primary key(tun));
create table clasificacion(cn serial, cclasificacion char(50), primary key(cn));
create table protagonista(pn serial, pprotagonista char(50), primary key(pn));
create table espacio(en serial, eespacio char(50), primary key(en));
create table tarchvio(tan serial, tatipo char(50), taextenciones text, primary key(tan));
create table permiso(pn serial, ppermiso char(50), psubpermiso int, primary key(pn));
create table ciudad(cn serial, cciudad char(100), cdepartamento int, primary key(cn));
create table programamedio(pmn serial, pmprograma int, pmmedio int, primary key(pmn));
create table programahorario(phn serial, phprograma int, phhorario int, primary key(phn));
create table permisotusuario(ptun serial, ptupermiso int, ptutipousuario int, primary key(ptun));
create table permisousuario(pun serial, pupermiso int, puusuario int, primary key(pun));*/
create table medio(mn serial, mmedio char(100), mtipo int, mciudad int, primary key(mn));
create table usuario(un serial, unombres char(100), uapaterno char(50), uamaterno char(50), utipo int, uusuario char(50), upass char(50), uestadologing int, uestadouso int, primary key(un));
create table archivo(an serial, afecha date, atitular char(500), aprotagonista int, aresumen text, aprograma int, aciudad int, aclasificacion int, ausuarioactualizacion int, afechaactualizacion timestamp, avistas int, ausuariocargado int, afechacargado timestamp, adireccion char(100), aespacio int, atipo int, primary key(an));