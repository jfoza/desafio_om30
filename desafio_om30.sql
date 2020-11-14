PGDMP     4                 
    x            desafio_om30    10.11    10.11     �
           0    0    ENCODING    ENCODING         SET client_encoding = 'LATIN1';
                       false            �
           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                       false            �
           0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                       false            �
           1262    41019    desafio_om30    DATABASE     �   CREATE DATABASE desafio_om30 WITH TEMPLATE = template0 ENCODING = 'UTF8' LC_COLLATE = 'Portuguese_Brazil.1252' LC_CTYPE = 'Portuguese_Brazil.1252';
    DROP DATABASE desafio_om30;
             postgres    false                        2615    2200    public    SCHEMA        CREATE SCHEMA public;
    DROP SCHEMA public;
             postgres    false            �
           0    0    SCHEMA public    COMMENT     6   COMMENT ON SCHEMA public IS 'standard public schema';
                  postgres    false    3                        3079    12924    plpgsql 	   EXTENSION     ?   CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;
    DROP EXTENSION plpgsql;
                  false            �
           0    0    EXTENSION plpgsql    COMMENT     @   COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';
                       false    1            �            1259    41096 	   pacientes    TABLE     z  CREATE TABLE public.pacientes (
    paciente_id integer NOT NULL,
    paciente_data_cadastro timestamp with time zone DEFAULT CURRENT_TIMESTAMP,
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
    paciente_data_alteracao timestamp with time zone DEFAULT CURRENT_TIMESTAMP,
    paciente_nome_completo_mae character varying(250) NOT NULL
);
    DROP TABLE public.pacientes;
       public         postgres    false    3            �            1259    41094    pacientes_paciente_id_seq    SEQUENCE     �   CREATE SEQUENCE public.pacientes_paciente_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 0   DROP SEQUENCE public.pacientes_paciente_id_seq;
       public       postgres    false    197    3            �
           0    0    pacientes_paciente_id_seq    SEQUENCE OWNED BY     W   ALTER SEQUENCE public.pacientes_paciente_id_seq OWNED BY public.pacientes.paciente_id;
            public       postgres    false    196            o
           2604    41099    pacientes paciente_id    DEFAULT     ~   ALTER TABLE ONLY public.pacientes ALTER COLUMN paciente_id SET DEFAULT nextval('public.pacientes_paciente_id_seq'::regclass);
 D   ALTER TABLE public.pacientes ALTER COLUMN paciente_id DROP DEFAULT;
       public       postgres    false    197    196    197            �
          0    41096 	   pacientes 
   TABLE DATA               K  COPY public.pacientes (paciente_id, paciente_data_cadastro, paciente_nome_completo, paciente_data_nascimento, paciente_cpf, paciente_cns, paciente_cep, paciente_endereco, paciente_numero_endereco, paciente_bairro, paciente_cidade, paciente_uf, paciente_complemento, paciente_data_alteracao, paciente_nome_completo_mae) FROM stdin;
    public       postgres    false    197   �       �
           0    0    pacientes_paciente_id_seq    SEQUENCE SET     H   SELECT pg_catalog.setval('public.pacientes_paciente_id_seq', 18, true);
            public       postgres    false    196            t
           2606    41107    pacientes pacientes_pkey 
   CONSTRAINT     _   ALTER TABLE ONLY public.pacientes
    ADD CONSTRAINT pacientes_pkey PRIMARY KEY (paciente_id);
 B   ALTER TABLE ONLY public.pacientes DROP CONSTRAINT pacientes_pkey;
       public         postgres    false    197            �
   R  x����n�6���S�D���9N4��`\��nXc�Ո�~ď�7	��m^�����F+�Xs(~<:<$+e���W�n���B
^S^��௯}uoݢ��[Pʀ���Xa9�4-6���8�j��X�R�8�a�}p���X��x�m,6���L���n�<s�IM#L#��
�I�JԔ�����H��fN.��f���p�'��/�}�p���su��1tC)2���4�Ze������]u��#�)Z��0��(18\�j!����3���}_�
�軋8�#����3��q�w�Kp�����8o�0��=O)s=o�%ZZk���M=~�8T�ӬV#?Gua�b����R|"���q}���~�P������@�܇a�~���0��d��ֻ��E��R=a�*�b��q]uv)86�_�)�b#B �9��%�� ���Ǭ hv�<��_ݥocq�.��}����,���޸R�Z�HK(H���m��m.'��7zN=T��F�6���Ö�o<��]��!"*0U|�c������)�Q0:�4����a@���?U�.�>�#����0N��W�n�v-;���b�Abl6��݂%B��!�ɷ|�|��cl�U�5}�V��S�M܅v���56RF�J�_�E��P��?޹�M�Z�J���r?n�U����������D��sX�kL�<Nüc�t�n58�&]\��<��F�p�8�5('���cu{7�Tk���-�|n{tw����j�3�����j���f�ŽF��u��x��2��F!��H��|�zuα����"���*"�� �N1�sի��>�#-=���W��n�d��^Qb}<r�%���3N	2"hX��i67���o�P��^Ц}��eox�  � Ow�����2�8�2�a��(A�r�oD�f������/ǫ�L�O�l�Ƞ�PXX�w0��|M�H�;��~�ǈ���t6@B��LT վ���o�o������K��~����|��]���g��q���=M	&�f1�,;����=��1��\/P(k��Y8^����a�2����w�����e�/	9"K     