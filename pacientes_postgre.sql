--
-- PostgreSQL database dump
--

-- Dumped from database version 10.15
-- Dumped by pg_dump version 10.15

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner:
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner:
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: migrations; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.migrations (
    version bigint NOT NULL
);


ALTER TABLE public.migrations OWNER TO postgres;

--
-- Name: pacientes_cadastro; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.pacientes_cadastro (
    paciente_id integer NOT NULL,
    paciente_data_cadastro timestamp with time zone DEFAULT CURRENT_TIMESTAMP,
    paciente_data_alteracao timestamp with time zone DEFAULT CURRENT_TIMESTAMP,
    paciente_nome character varying(250) NOT NULL,
    paciente_sobrenome character varying(250) NOT NULL,
    paciente_nome_completo character varying(250) NOT NULL,
    paciente_data_nascimento date NOT NULL,
    paciente_cpf character varying(20) NOT NULL,
    paciente_cns character varying(20) NOT NULL,
    paciente_cep character varying(10) NOT NULL,
    paciente_endereco character varying(250) NOT NULL,
    paciente_numero_endereco character varying(20) NOT NULL,
    paciente_bairro character varying(50) NOT NULL,
    paciente_cidade character varying(50) NOT NULL,
    paciente_uf character varying(2) NOT NULL,
    paciente_complemento character varying(150) DEFAULT NULL::character varying,
    paciente_nome_completo_mae character varying(250) NOT NULL,
    paciente_imagem character varying(250) DEFAULT NULL::character varying
);


ALTER TABLE public.pacientes_cadastro OWNER TO postgres;

--
-- Name: pacientes_cadastro_paciente_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.pacientes_cadastro_paciente_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.pacientes_cadastro_paciente_id_seq OWNER TO postgres;

--
-- Name: pacientes_cadastro_paciente_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.pacientes_cadastro_paciente_id_seq OWNED BY public.pacientes_cadastro.paciente_id;


--
-- Name: pacientes_cadastro paciente_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.pacientes_cadastro ALTER COLUMN paciente_id SET DEFAULT nextval('public.pacientes_cadastro_paciente_id_seq'::regclass);


--
-- Data for Name: migrations; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.migrations (version) FROM stdin;
\.


--
-- Data for Name: pacientes_cadastro; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.pacientes_cadastro (paciente_id, paciente_data_cadastro, paciente_data_alteracao, paciente_nome, paciente_sobrenome, paciente_nome_completo, paciente_data_nascimento, paciente_cpf, paciente_cns, paciente_cep, paciente_endereco, paciente_numero_endereco, paciente_bairro, paciente_cidade, paciente_uf, paciente_complemento, paciente_nome_completo_mae, paciente_imagem) FROM stdin;
7	2021-01-27 14:15:40.554607-03	2021-01-27 14:15:40.554607-03	Giuseppe	Foza	Giuseppe Foza	1995-04-19	031.681.590-00	262677787940007	93052-170	Rua Otto Daudt	1665	Feitoria	São Leopoldo	RS		Neuza Maria Cezimbra Foza	589962351.jpg
\.


--
-- Name: pacientes_cadastro_paciente_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.pacientes_cadastro_paciente_id_seq', 7, true);


--
-- PostgreSQL database dump complete
--

