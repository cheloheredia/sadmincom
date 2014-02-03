--
-- PostgreSQL database dump
--

-- Dumped from database version 9.3.2
-- Dumped by pg_dump version 9.3.2
-- Started on 2014-02-03 14:42:27

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

--
-- TOC entry 204 (class 3079 OID 11750)
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- TOC entry 2120 (class 0 OID 0)
-- Dependencies: 204
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- TOC entry 203 (class 1259 OID 16556)
-- Name: archivo; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE archivo (
    an integer NOT NULL,
    afecha date,
    atitular character varying(500),
    aprotagonista integer,
    aresumen text,
    aprograma integer,
    aciudad integer,
    aclasificacion integer,
    ausuarioactualizacion integer,
    afechaactualizacion timestamp without time zone,
    avistas integer,
    ausuariocargado integer,
    afechacargado timestamp without time zone,
    adireccion character varying(100),
    aespacio integer,
    atipo integer
);


ALTER TABLE public.archivo OWNER TO postgres;

--
-- TOC entry 202 (class 1259 OID 16554)
-- Name: archivo_an_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE archivo_an_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.archivo_an_seq OWNER TO postgres;

--
-- TOC entry 2122 (class 0 OID 0)
-- Dependencies: 202
-- Name: archivo_an_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE archivo_an_seq OWNED BY archivo.an;


--
-- TOC entry 193 (class 1259 OID 16490)
-- Name: ciudad; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE ciudad (
    cn integer NOT NULL,
    cciudad character varying(100),
    cdepartamento integer
);


ALTER TABLE public.ciudad OWNER TO postgres;

--
-- TOC entry 192 (class 1259 OID 16488)
-- Name: ciudad_cn_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE ciudad_cn_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.ciudad_cn_seq OWNER TO postgres;

--
-- TOC entry 2124 (class 0 OID 0)
-- Dependencies: 192
-- Name: ciudad_cn_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE ciudad_cn_seq OWNED BY ciudad.cn;


--
-- TOC entry 181 (class 1259 OID 16436)
-- Name: clasificacion; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE clasificacion (
    cn integer NOT NULL,
    cclasificacion character varying(50)
);


ALTER TABLE public.clasificacion OWNER TO postgres;

--
-- TOC entry 180 (class 1259 OID 16434)
-- Name: clasificacion_cn_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE clasificacion_cn_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.clasificacion_cn_seq OWNER TO postgres;

--
-- TOC entry 2126 (class 0 OID 0)
-- Dependencies: 180
-- Name: clasificacion_cn_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE clasificacion_cn_seq OWNED BY clasificacion.cn;


--
-- TOC entry 171 (class 1259 OID 16396)
-- Name: departamento; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE departamento (
    dn integer NOT NULL,
    ddepartamento character varying(50)
);


ALTER TABLE public.departamento OWNER TO postgres;

--
-- TOC entry 170 (class 1259 OID 16394)
-- Name: departamento_dn_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE departamento_dn_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.departamento_dn_seq OWNER TO postgres;

--
-- TOC entry 2128 (class 0 OID 0)
-- Dependencies: 170
-- Name: departamento_dn_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE departamento_dn_seq OWNED BY departamento.dn;


--
-- TOC entry 185 (class 1259 OID 16452)
-- Name: espacio; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE espacio (
    en integer NOT NULL,
    eespacio character varying(50)
);


ALTER TABLE public.espacio OWNER TO postgres;

--
-- TOC entry 184 (class 1259 OID 16450)
-- Name: espacio_en_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE espacio_en_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.espacio_en_seq OWNER TO postgres;

--
-- TOC entry 2130 (class 0 OID 0)
-- Dependencies: 184
-- Name: espacio_en_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE espacio_en_seq OWNED BY espacio.en;


--
-- TOC entry 177 (class 1259 OID 16420)
-- Name: horario; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE horario (
    hn integer NOT NULL,
    hhorario time without time zone
);


ALTER TABLE public.horario OWNER TO postgres;

--
-- TOC entry 176 (class 1259 OID 16418)
-- Name: horario_hn_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE horario_hn_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.horario_hn_seq OWNER TO postgres;

--
-- TOC entry 2132 (class 0 OID 0)
-- Dependencies: 176
-- Name: horario_hn_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE horario_hn_seq OWNED BY horario.hn;


--
-- TOC entry 199 (class 1259 OID 16540)
-- Name: medio; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE medio (
    mn integer NOT NULL,
    mmedio character varying(100),
    mtipo integer,
    mciudad integer
);


ALTER TABLE public.medio OWNER TO postgres;

--
-- TOC entry 198 (class 1259 OID 16538)
-- Name: medio_mn_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE medio_mn_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.medio_mn_seq OWNER TO postgres;

--
-- TOC entry 2134 (class 0 OID 0)
-- Dependencies: 198
-- Name: medio_mn_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE medio_mn_seq OWNED BY medio.mn;


--
-- TOC entry 189 (class 1259 OID 16471)
-- Name: permiso; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE permiso (
    pn integer NOT NULL,
    ppermiso character(50),
    psubpermiso integer
);


ALTER TABLE public.permiso OWNER TO postgres;

--
-- TOC entry 188 (class 1259 OID 16469)
-- Name: permiso_pn_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE permiso_pn_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.permiso_pn_seq OWNER TO postgres;

--
-- TOC entry 2136 (class 0 OID 0)
-- Dependencies: 188
-- Name: permiso_pn_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE permiso_pn_seq OWNED BY permiso.pn;


--
-- TOC entry 197 (class 1259 OID 16514)
-- Name: permisotusuario; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE permisotusuario (
    ptun integer NOT NULL,
    ptupermiso integer,
    ptutipousuario integer
);


ALTER TABLE public.permisotusuario OWNER TO postgres;

--
-- TOC entry 196 (class 1259 OID 16512)
-- Name: permisotusuario_ptun_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE permisotusuario_ptun_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.permisotusuario_ptun_seq OWNER TO postgres;

--
-- TOC entry 2138 (class 0 OID 0)
-- Dependencies: 196
-- Name: permisotusuario_ptun_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE permisotusuario_ptun_seq OWNED BY permisotusuario.ptun;


--
-- TOC entry 191 (class 1259 OID 16481)
-- Name: permisousuario; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE permisousuario (
    pun integer NOT NULL,
    pupermiso integer,
    puusuario integer
);


ALTER TABLE public.permisousuario OWNER TO postgres;

--
-- TOC entry 190 (class 1259 OID 16479)
-- Name: permisousuario_pun_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE permisousuario_pun_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.permisousuario_pun_seq OWNER TO postgres;

--
-- TOC entry 2140 (class 0 OID 0)
-- Dependencies: 190
-- Name: permisousuario_pun_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE permisousuario_pun_seq OWNED BY permisousuario.pun;


--
-- TOC entry 175 (class 1259 OID 16412)
-- Name: programa; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE programa (
    pron integer NOT NULL,
    proprograma character varying(100)
);


ALTER TABLE public.programa OWNER TO postgres;

--
-- TOC entry 174 (class 1259 OID 16410)
-- Name: programa_pron_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE programa_pron_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.programa_pron_seq OWNER TO postgres;

--
-- TOC entry 2142 (class 0 OID 0)
-- Dependencies: 174
-- Name: programa_pron_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE programa_pron_seq OWNED BY programa.pron;


--
-- TOC entry 195 (class 1259 OID 16498)
-- Name: programamediohorario; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE programamediohorario (
    pmhn integer NOT NULL,
    pmhprograma integer,
    pmhmedio integer,
    pmhhorario integer
);


ALTER TABLE public.programamediohorario OWNER TO postgres;

--
-- TOC entry 194 (class 1259 OID 16496)
-- Name: programamedio_pmn_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE programamedio_pmn_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.programamedio_pmn_seq OWNER TO postgres;

--
-- TOC entry 2144 (class 0 OID 0)
-- Dependencies: 194
-- Name: programamedio_pmn_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE programamedio_pmn_seq OWNED BY programamediohorario.pmhn;


--
-- TOC entry 183 (class 1259 OID 16444)
-- Name: protagonista; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE protagonista (
    pn integer NOT NULL,
    pprotagonista character varying(50)
);


ALTER TABLE public.protagonista OWNER TO postgres;

--
-- TOC entry 182 (class 1259 OID 16442)
-- Name: protagonista_pn_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE protagonista_pn_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.protagonista_pn_seq OWNER TO postgres;

--
-- TOC entry 2146 (class 0 OID 0)
-- Dependencies: 182
-- Name: protagonista_pn_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE protagonista_pn_seq OWNED BY protagonista.pn;


--
-- TOC entry 187 (class 1259 OID 16460)
-- Name: tarchivo; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE tarchivo (
    tan integer NOT NULL,
    tatipo character varying(50),
    taextenciones text
);


ALTER TABLE public.tarchivo OWNER TO postgres;

--
-- TOC entry 186 (class 1259 OID 16458)
-- Name: tarchvio_tan_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE tarchvio_tan_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tarchvio_tan_seq OWNER TO postgres;

--
-- TOC entry 2148 (class 0 OID 0)
-- Dependencies: 186
-- Name: tarchvio_tan_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE tarchvio_tan_seq OWNED BY tarchivo.tan;


--
-- TOC entry 173 (class 1259 OID 16404)
-- Name: tmedio; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE tmedio (
    tmn integer NOT NULL,
    tmtipo character varying(50)
);


ALTER TABLE public.tmedio OWNER TO postgres;

--
-- TOC entry 172 (class 1259 OID 16402)
-- Name: tmedio_tmn_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE tmedio_tmn_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tmedio_tmn_seq OWNER TO postgres;

--
-- TOC entry 2150 (class 0 OID 0)
-- Dependencies: 172
-- Name: tmedio_tmn_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE tmedio_tmn_seq OWNED BY tmedio.tmn;


--
-- TOC entry 179 (class 1259 OID 16428)
-- Name: tusuario; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE tusuario (
    tun integer NOT NULL,
    tutipo character(50)
);


ALTER TABLE public.tusuario OWNER TO postgres;

--
-- TOC entry 178 (class 1259 OID 16426)
-- Name: tusuario_tun_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE tusuario_tun_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.tusuario_tun_seq OWNER TO postgres;

--
-- TOC entry 2152 (class 0 OID 0)
-- Dependencies: 178
-- Name: tusuario_tun_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE tusuario_tun_seq OWNED BY tusuario.tun;


--
-- TOC entry 201 (class 1259 OID 16548)
-- Name: usuario; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE usuario (
    un integer NOT NULL,
    unombres character varying(100),
    uapaterno character varying(50),
    uamaterno character varying(50),
    utipo integer,
    uusuario character varying(50),
    upass character varying(50),
    uestadologing integer,
    uestadouso integer
);


ALTER TABLE public.usuario OWNER TO postgres;

--
-- TOC entry 200 (class 1259 OID 16546)
-- Name: usuario_un_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE usuario_un_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.usuario_un_seq OWNER TO postgres;

--
-- TOC entry 2154 (class 0 OID 0)
-- Dependencies: 200
-- Name: usuario_un_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE usuario_un_seq OWNED BY usuario.un;


--
-- TOC entry 1937 (class 2604 OID 16559)
-- Name: an; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY archivo ALTER COLUMN an SET DEFAULT nextval('archivo_an_seq'::regclass);


--
-- TOC entry 1932 (class 2604 OID 16493)
-- Name: cn; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY ciudad ALTER COLUMN cn SET DEFAULT nextval('ciudad_cn_seq'::regclass);


--
-- TOC entry 1926 (class 2604 OID 16439)
-- Name: cn; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY clasificacion ALTER COLUMN cn SET DEFAULT nextval('clasificacion_cn_seq'::regclass);


--
-- TOC entry 1921 (class 2604 OID 16399)
-- Name: dn; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY departamento ALTER COLUMN dn SET DEFAULT nextval('departamento_dn_seq'::regclass);


--
-- TOC entry 1928 (class 2604 OID 16455)
-- Name: en; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY espacio ALTER COLUMN en SET DEFAULT nextval('espacio_en_seq'::regclass);


--
-- TOC entry 1924 (class 2604 OID 16423)
-- Name: hn; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY horario ALTER COLUMN hn SET DEFAULT nextval('horario_hn_seq'::regclass);


--
-- TOC entry 1935 (class 2604 OID 16543)
-- Name: mn; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY medio ALTER COLUMN mn SET DEFAULT nextval('medio_mn_seq'::regclass);


--
-- TOC entry 1930 (class 2604 OID 16474)
-- Name: pn; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY permiso ALTER COLUMN pn SET DEFAULT nextval('permiso_pn_seq'::regclass);


--
-- TOC entry 1934 (class 2604 OID 16517)
-- Name: ptun; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY permisotusuario ALTER COLUMN ptun SET DEFAULT nextval('permisotusuario_ptun_seq'::regclass);


--
-- TOC entry 1931 (class 2604 OID 16484)
-- Name: pun; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY permisousuario ALTER COLUMN pun SET DEFAULT nextval('permisousuario_pun_seq'::regclass);


--
-- TOC entry 1923 (class 2604 OID 16415)
-- Name: pron; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY programa ALTER COLUMN pron SET DEFAULT nextval('programa_pron_seq'::regclass);


--
-- TOC entry 1933 (class 2604 OID 16501)
-- Name: pmhn; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY programamediohorario ALTER COLUMN pmhn SET DEFAULT nextval('programamedio_pmn_seq'::regclass);


--
-- TOC entry 1927 (class 2604 OID 16447)
-- Name: pn; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY protagonista ALTER COLUMN pn SET DEFAULT nextval('protagonista_pn_seq'::regclass);


--
-- TOC entry 1929 (class 2604 OID 16463)
-- Name: tan; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY tarchivo ALTER COLUMN tan SET DEFAULT nextval('tarchvio_tan_seq'::regclass);


--
-- TOC entry 1922 (class 2604 OID 16407)
-- Name: tmn; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY tmedio ALTER COLUMN tmn SET DEFAULT nextval('tmedio_tmn_seq'::regclass);


--
-- TOC entry 1925 (class 2604 OID 16431)
-- Name: tun; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY tusuario ALTER COLUMN tun SET DEFAULT nextval('tusuario_tun_seq'::regclass);


--
-- TOC entry 1936 (class 2604 OID 16551)
-- Name: un; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY usuario ALTER COLUMN un SET DEFAULT nextval('usuario_un_seq'::regclass);


--
-- TOC entry 2112 (class 0 OID 16556)
-- Dependencies: 203
-- Data for Name: archivo; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY archivo (an, afecha, atitular, aprotagonista, aresumen, aprograma, aciudad, aclasificacion, ausuarioactualizacion, afechaactualizacion, avistas, ausuariocargado, afechacargado, adireccion, aespacio, atipo) FROM stdin;
1	2014-01-31	prueba	1	asdfasdfasd resumen	1	1	1	1	2014-01-31 00:00:00	0	1	2014-01-31 00:00:00	dir	1	1
\.


--
-- TOC entry 2155 (class 0 OID 0)
-- Dependencies: 202
-- Name: archivo_an_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('archivo_an_seq', 1, true);


--
-- TOC entry 2102 (class 0 OID 16490)
-- Dependencies: 193
-- Data for Name: ciudad; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY ciudad (cn, cciudad, cdepartamento) FROM stdin;
1	LA PAZ	1
2	COROICO	1
3	ORURO	2
4	CARACOLLO	2
\.


--
-- TOC entry 2156 (class 0 OID 0)
-- Dependencies: 192
-- Name: ciudad_cn_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('ciudad_cn_seq', 1, false);


--
-- TOC entry 2090 (class 0 OID 16436)
-- Dependencies: 181
-- Data for Name: clasificacion; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY clasificacion (cn, cclasificacion) FROM stdin;
1	SOCIAL
2	POLITICA
\.


--
-- TOC entry 2157 (class 0 OID 0)
-- Dependencies: 180
-- Name: clasificacion_cn_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('clasificacion_cn_seq', 1, false);


--
-- TOC entry 2080 (class 0 OID 16396)
-- Dependencies: 171
-- Data for Name: departamento; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY departamento (dn, ddepartamento) FROM stdin;
1	LA PAZ
2	ORURO
3	POTOSI
4	COCHABAMBA
5	CHUQUISACA
6	TARIJA
7	PANDO
8	BENI
9	SANTA CRUZ
\.


--
-- TOC entry 2158 (class 0 OID 0)
-- Dependencies: 170
-- Name: departamento_dn_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('departamento_dn_seq', 1, false);


--
-- TOC entry 2094 (class 0 OID 16452)
-- Dependencies: 185
-- Data for Name: espacio; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY espacio (en, eespacio) FROM stdin;
1	ENTREVISTA
2	NOTA
3	CONTACTO
\.


--
-- TOC entry 2159 (class 0 OID 0)
-- Dependencies: 184
-- Name: espacio_en_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('espacio_en_seq', 1, false);


--
-- TOC entry 2086 (class 0 OID 16420)
-- Dependencies: 177
-- Data for Name: horario; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY horario (hn, hhorario) FROM stdin;
1	06:00:00
2	12:00:00
3	17:00:00
4	18:30:00
\.


--
-- TOC entry 2160 (class 0 OID 0)
-- Dependencies: 176
-- Name: horario_hn_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('horario_hn_seq', 1, false);


--
-- TOC entry 2108 (class 0 OID 16540)
-- Dependencies: 199
-- Data for Name: medio; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY medio (mn, mmedio, mtipo, mciudad) FROM stdin;
1	ATB LA PAZ	1	1
2	ATB SANTA CRUZ	1	2
3	PANAMERICANA LA PAZ	2	1
\.


--
-- TOC entry 2161 (class 0 OID 0)
-- Dependencies: 198
-- Name: medio_mn_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('medio_mn_seq', 2, true);


--
-- TOC entry 2098 (class 0 OID 16471)
-- Dependencies: 189
-- Data for Name: permiso; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY permiso (pn, ppermiso, psubpermiso) FROM stdin;
\.


--
-- TOC entry 2162 (class 0 OID 0)
-- Dependencies: 188
-- Name: permiso_pn_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('permiso_pn_seq', 1, false);


--
-- TOC entry 2106 (class 0 OID 16514)
-- Dependencies: 197
-- Data for Name: permisotusuario; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY permisotusuario (ptun, ptupermiso, ptutipousuario) FROM stdin;
\.


--
-- TOC entry 2163 (class 0 OID 0)
-- Dependencies: 196
-- Name: permisotusuario_ptun_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('permisotusuario_ptun_seq', 1, false);


--
-- TOC entry 2100 (class 0 OID 16481)
-- Dependencies: 191
-- Data for Name: permisousuario; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY permisousuario (pun, pupermiso, puusuario) FROM stdin;
\.


--
-- TOC entry 2164 (class 0 OID 0)
-- Dependencies: 190
-- Name: permisousuario_pun_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('permisousuario_pun_seq', 1, false);


--
-- TOC entry 2084 (class 0 OID 16412)
-- Dependencies: 175
-- Data for Name: programa; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY programa (pron, proprograma) FROM stdin;
1	ATB NOTICIAS
2	CONFIDENCIAS
\.


--
-- TOC entry 2165 (class 0 OID 0)
-- Dependencies: 174
-- Name: programa_pron_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('programa_pron_seq', 1, false);


--
-- TOC entry 2166 (class 0 OID 0)
-- Dependencies: 194
-- Name: programamedio_pmn_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('programamedio_pmn_seq', 1, false);


--
-- TOC entry 2104 (class 0 OID 16498)
-- Dependencies: 195
-- Data for Name: programamediohorario; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY programamediohorario (pmhn, pmhprograma, pmhmedio, pmhhorario) FROM stdin;
1	1	1	1
2	1	1	2
3	1	1	3
4	2	3	4
\.


--
-- TOC entry 2092 (class 0 OID 16444)
-- Dependencies: 183
-- Data for Name: protagonista; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY protagonista (pn, pprotagonista) FROM stdin;
1	TUTO QUIROGA
\.


--
-- TOC entry 2167 (class 0 OID 0)
-- Dependencies: 182
-- Name: protagonista_pn_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('protagonista_pn_seq', 1, true);


--
-- TOC entry 2096 (class 0 OID 16460)
-- Dependencies: 187
-- Data for Name: tarchivo; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY tarchivo (tan, tatipo, taextenciones) FROM stdin;
1	VIDEO	mp4,flv,wma
\.


--
-- TOC entry 2168 (class 0 OID 0)
-- Dependencies: 186
-- Name: tarchvio_tan_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('tarchvio_tan_seq', 1, false);


--
-- TOC entry 2082 (class 0 OID 16404)
-- Dependencies: 173
-- Data for Name: tmedio; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY tmedio (tmn, tmtipo) FROM stdin;
2	RADIO
3	PERIODICO
4	INTERNET
1	TELEVISION
\.


--
-- TOC entry 2169 (class 0 OID 0)
-- Dependencies: 172
-- Name: tmedio_tmn_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('tmedio_tmn_seq', 4, true);


--
-- TOC entry 2088 (class 0 OID 16428)
-- Dependencies: 179
-- Data for Name: tusuario; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY tusuario (tun, tutipo) FROM stdin;
\.


--
-- TOC entry 2170 (class 0 OID 0)
-- Dependencies: 178
-- Name: tusuario_tun_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('tusuario_tun_seq', 1, false);


--
-- TOC entry 2110 (class 0 OID 16548)
-- Dependencies: 201
-- Data for Name: usuario; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY usuario (un, unombres, uapaterno, uamaterno, utipo, uusuario, upass, uestadologing, uestadouso) FROM stdin;
1	PAOLO MARCELO	HEREDIA	AGUILAR	1	chelo	herbalife	0	1
\.


--
-- TOC entry 2171 (class 0 OID 0)
-- Dependencies: 200
-- Name: usuario_un_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('usuario_un_seq', 1, false);


--
-- TOC entry 1971 (class 2606 OID 16564)
-- Name: archivo_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY archivo
    ADD CONSTRAINT archivo_pkey PRIMARY KEY (an);


--
-- TOC entry 1961 (class 2606 OID 16495)
-- Name: ciudad_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY ciudad
    ADD CONSTRAINT ciudad_pkey PRIMARY KEY (cn);


--
-- TOC entry 1949 (class 2606 OID 16441)
-- Name: clasificacion_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY clasificacion
    ADD CONSTRAINT clasificacion_pkey PRIMARY KEY (cn);


--
-- TOC entry 1939 (class 2606 OID 16401)
-- Name: departamento_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY departamento
    ADD CONSTRAINT departamento_pkey PRIMARY KEY (dn);


--
-- TOC entry 1953 (class 2606 OID 16457)
-- Name: espacio_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY espacio
    ADD CONSTRAINT espacio_pkey PRIMARY KEY (en);


--
-- TOC entry 1945 (class 2606 OID 16425)
-- Name: horario_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY horario
    ADD CONSTRAINT horario_pkey PRIMARY KEY (hn);


--
-- TOC entry 1967 (class 2606 OID 16545)
-- Name: medio_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY medio
    ADD CONSTRAINT medio_pkey PRIMARY KEY (mn);


--
-- TOC entry 1957 (class 2606 OID 16476)
-- Name: permiso_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY permiso
    ADD CONSTRAINT permiso_pkey PRIMARY KEY (pn);


--
-- TOC entry 1965 (class 2606 OID 16519)
-- Name: permisotusuario_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY permisotusuario
    ADD CONSTRAINT permisotusuario_pkey PRIMARY KEY (ptun);


--
-- TOC entry 1959 (class 2606 OID 16486)
-- Name: permisousuario_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY permisousuario
    ADD CONSTRAINT permisousuario_pkey PRIMARY KEY (pun);


--
-- TOC entry 1943 (class 2606 OID 16417)
-- Name: programa_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY programa
    ADD CONSTRAINT programa_pkey PRIMARY KEY (pron);


--
-- TOC entry 1963 (class 2606 OID 16503)
-- Name: programamedio_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY programamediohorario
    ADD CONSTRAINT programamedio_pkey PRIMARY KEY (pmhn);


--
-- TOC entry 1951 (class 2606 OID 16449)
-- Name: protagonista_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY protagonista
    ADD CONSTRAINT protagonista_pkey PRIMARY KEY (pn);


--
-- TOC entry 1955 (class 2606 OID 16468)
-- Name: tarchvio_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY tarchivo
    ADD CONSTRAINT tarchvio_pkey PRIMARY KEY (tan);


--
-- TOC entry 1941 (class 2606 OID 16409)
-- Name: tmedio_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY tmedio
    ADD CONSTRAINT tmedio_pkey PRIMARY KEY (tmn);


--
-- TOC entry 1947 (class 2606 OID 16433)
-- Name: tusuario_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY tusuario
    ADD CONSTRAINT tusuario_pkey PRIMARY KEY (tun);


--
-- TOC entry 1969 (class 2606 OID 16553)
-- Name: usuario_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY usuario
    ADD CONSTRAINT usuario_pkey PRIMARY KEY (un);


--
-- TOC entry 2119 (class 0 OID 0)
-- Dependencies: 5
-- Name: public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;


--
-- TOC entry 2121 (class 0 OID 0)
-- Dependencies: 203
-- Name: archivo; Type: ACL; Schema: public; Owner: postgres
--

REVOKE ALL ON TABLE archivo FROM PUBLIC;
REVOKE ALL ON TABLE archivo FROM postgres;
GRANT ALL ON TABLE archivo TO postgres;
GRANT ALL ON TABLE archivo TO sadmincom;


--
-- TOC entry 2123 (class 0 OID 0)
-- Dependencies: 193
-- Name: ciudad; Type: ACL; Schema: public; Owner: postgres
--

REVOKE ALL ON TABLE ciudad FROM PUBLIC;
REVOKE ALL ON TABLE ciudad FROM postgres;
GRANT ALL ON TABLE ciudad TO postgres;
GRANT ALL ON TABLE ciudad TO sadmincom;


--
-- TOC entry 2125 (class 0 OID 0)
-- Dependencies: 181
-- Name: clasificacion; Type: ACL; Schema: public; Owner: postgres
--

REVOKE ALL ON TABLE clasificacion FROM PUBLIC;
REVOKE ALL ON TABLE clasificacion FROM postgres;
GRANT ALL ON TABLE clasificacion TO postgres;
GRANT ALL ON TABLE clasificacion TO sadmincom;


--
-- TOC entry 2127 (class 0 OID 0)
-- Dependencies: 171
-- Name: departamento; Type: ACL; Schema: public; Owner: postgres
--

REVOKE ALL ON TABLE departamento FROM PUBLIC;
REVOKE ALL ON TABLE departamento FROM postgres;
GRANT ALL ON TABLE departamento TO postgres;
GRANT ALL ON TABLE departamento TO sadmincom;


--
-- TOC entry 2129 (class 0 OID 0)
-- Dependencies: 185
-- Name: espacio; Type: ACL; Schema: public; Owner: postgres
--

REVOKE ALL ON TABLE espacio FROM PUBLIC;
REVOKE ALL ON TABLE espacio FROM postgres;
GRANT ALL ON TABLE espacio TO postgres;
GRANT ALL ON TABLE espacio TO sadmincom;


--
-- TOC entry 2131 (class 0 OID 0)
-- Dependencies: 177
-- Name: horario; Type: ACL; Schema: public; Owner: postgres
--

REVOKE ALL ON TABLE horario FROM PUBLIC;
REVOKE ALL ON TABLE horario FROM postgres;
GRANT ALL ON TABLE horario TO postgres;
GRANT ALL ON TABLE horario TO sadmincom;


--
-- TOC entry 2133 (class 0 OID 0)
-- Dependencies: 199
-- Name: medio; Type: ACL; Schema: public; Owner: postgres
--

REVOKE ALL ON TABLE medio FROM PUBLIC;
REVOKE ALL ON TABLE medio FROM postgres;
GRANT ALL ON TABLE medio TO postgres;
GRANT ALL ON TABLE medio TO sadmincom;


--
-- TOC entry 2135 (class 0 OID 0)
-- Dependencies: 189
-- Name: permiso; Type: ACL; Schema: public; Owner: postgres
--

REVOKE ALL ON TABLE permiso FROM PUBLIC;
REVOKE ALL ON TABLE permiso FROM postgres;
GRANT ALL ON TABLE permiso TO postgres;
GRANT ALL ON TABLE permiso TO sadmincom;


--
-- TOC entry 2137 (class 0 OID 0)
-- Dependencies: 197
-- Name: permisotusuario; Type: ACL; Schema: public; Owner: postgres
--

REVOKE ALL ON TABLE permisotusuario FROM PUBLIC;
REVOKE ALL ON TABLE permisotusuario FROM postgres;
GRANT ALL ON TABLE permisotusuario TO postgres;
GRANT ALL ON TABLE permisotusuario TO sadmincom;


--
-- TOC entry 2139 (class 0 OID 0)
-- Dependencies: 191
-- Name: permisousuario; Type: ACL; Schema: public; Owner: postgres
--

REVOKE ALL ON TABLE permisousuario FROM PUBLIC;
REVOKE ALL ON TABLE permisousuario FROM postgres;
GRANT ALL ON TABLE permisousuario TO postgres;
GRANT ALL ON TABLE permisousuario TO sadmincom;


--
-- TOC entry 2141 (class 0 OID 0)
-- Dependencies: 175
-- Name: programa; Type: ACL; Schema: public; Owner: postgres
--

REVOKE ALL ON TABLE programa FROM PUBLIC;
REVOKE ALL ON TABLE programa FROM postgres;
GRANT ALL ON TABLE programa TO postgres;
GRANT ALL ON TABLE programa TO sadmincom;


--
-- TOC entry 2143 (class 0 OID 0)
-- Dependencies: 195
-- Name: programamediohorario; Type: ACL; Schema: public; Owner: postgres
--

REVOKE ALL ON TABLE programamediohorario FROM PUBLIC;
REVOKE ALL ON TABLE programamediohorario FROM postgres;
GRANT ALL ON TABLE programamediohorario TO postgres;
GRANT ALL ON TABLE programamediohorario TO sadmincom;


--
-- TOC entry 2145 (class 0 OID 0)
-- Dependencies: 183
-- Name: protagonista; Type: ACL; Schema: public; Owner: postgres
--

REVOKE ALL ON TABLE protagonista FROM PUBLIC;
REVOKE ALL ON TABLE protagonista FROM postgres;
GRANT ALL ON TABLE protagonista TO postgres;
GRANT ALL ON TABLE protagonista TO sadmincom;


--
-- TOC entry 2147 (class 0 OID 0)
-- Dependencies: 187
-- Name: tarchivo; Type: ACL; Schema: public; Owner: postgres
--

REVOKE ALL ON TABLE tarchivo FROM PUBLIC;
REVOKE ALL ON TABLE tarchivo FROM postgres;
GRANT ALL ON TABLE tarchivo TO postgres;
GRANT ALL ON TABLE tarchivo TO sadmincom;


--
-- TOC entry 2149 (class 0 OID 0)
-- Dependencies: 173
-- Name: tmedio; Type: ACL; Schema: public; Owner: postgres
--

REVOKE ALL ON TABLE tmedio FROM PUBLIC;
REVOKE ALL ON TABLE tmedio FROM postgres;
GRANT ALL ON TABLE tmedio TO postgres;
GRANT ALL ON TABLE tmedio TO sadmincom;


--
-- TOC entry 2151 (class 0 OID 0)
-- Dependencies: 179
-- Name: tusuario; Type: ACL; Schema: public; Owner: postgres
--

REVOKE ALL ON TABLE tusuario FROM PUBLIC;
REVOKE ALL ON TABLE tusuario FROM postgres;
GRANT ALL ON TABLE tusuario TO postgres;
GRANT ALL ON TABLE tusuario TO sadmincom;


--
-- TOC entry 2153 (class 0 OID 0)
-- Dependencies: 201
-- Name: usuario; Type: ACL; Schema: public; Owner: postgres
--

REVOKE ALL ON TABLE usuario FROM PUBLIC;
REVOKE ALL ON TABLE usuario FROM postgres;
GRANT ALL ON TABLE usuario TO postgres;
GRANT ALL ON TABLE usuario TO sadmincom;


-- Completed on 2014-02-03 14:42:27

--
-- PostgreSQL database dump complete
--

