###################
Sistema de cadastro de pacientes
###################

Sistema para cadastro de pacientes construído em PHP utilizando o Codeigniter framework + Vuejs;

Banco de dados PostgreSQL versão 10.1 ou MySQL versão 5.4;

###################
Libs utilizadas
################### 

Form Validation para realizar a validação do formulário de pacientes;

Brazanation(instalado via composer) para realizar a validação do CNS(Cartão nacional de saúde);

Upload, para realizar o upload de imagens;

Vuejs v2.6, utilizado para a construção do Frontend;

Bootstrap v4, utilizado para a estilização das páginas;

Momentjs, utilizado para realizar a validação e formatação de datas e horas no Frontend;

ViaCep, faz a verificação do CEP inserido e completa os campos referentes ao endereço;

###################
Configurações de banco de dados
###################

Podem ser utilizados tanto MySQL quanto PostgreSQL, seguem as configurações de cada um.

Para utilizar MySQL: 
Criar um banco de dados com nome 'pacientes',
Executar o arquivo 'pacientes_mysql.sql' que está na raíz do projeto,
Configurar o arquivo 'database.php' que está em 'application/config/database.php'

$db['default'] = array(
	'dsn'	=> '',
	'hostname' => 'localhost',
	'username' => 'your_database_username',
	'password' => 'your_database_password',
	'database' => 'pacientes',
	'dbdriver' => 'mysqli',
	'dbprefix' => '',
	'pconnect' => FALSE,
	'db_debug' => (ENVIRONMENT !== 'development'),
	'cache_on' => FALSE,
	'cachedir' => '',
	'char_set' => 'utf8',
	'dbcollat' => 'utf8_general_ci',
	'swap_pre' => '',
	'encrypt' => FALSE,
	'compress' => FALSE,
	'stricton' => TRUE,
	'failover' => array(),
	'save_queries' => TRUE
);

Para utilizar PostgreSQL: 
Criar um banco de dados com nome 'pacientes',
Executar o arquivo 'pacientes_postgre.sql' que está na raíz do projeto,
Configurar o arquivo 'database.php' que está em 'application/config/database.php'

$db['default'] = array(
	'dsn'	=> '',
	'hostname' => 'localhost',
	'username' => 'your_database_username',
	'password' => 'your_database_password',
	'database' => 'pacientes',
	'dbdriver' => 'postgre',
	'dbprefix' => '',
	'pconnect' => FALSE,
	'db_debug' => (ENVIRONMENT !== 'development'),
	'cache_on' => FALSE,
	'cachedir' => '',
	'char_set' => 'utf8',
	'dbcollat' => 'utf8_general_ci',
	'swap_pre' => '',
	'encrypt' => FALSE,
	'compress' => FALSE,
	'stricton' => TRUE,
	'failover' => array(),
	'save_queries' => TRUE
);

###################
Instruções para execução e utilização
###################

Após ter o banco de dados criado e configurado, executar o comando "composer install" na raíz do projeto e consequentemente possuindo o composer instalado no local de execução do projeto;

Inserir a URL base em dois arquivos: 'application/config/config.php(linha 26)', 'public/assets/js/util.js';

O Codeigniter está em modo 'development' para assim poderem ser exibidos os debugs;

O sistema possui duas páginas: Home e Pacientes, a primeira mostra a logo da empresa incluindo links para as redes sociais e site, na segunda está o cadastro de pacientes incluindo funções de listagem, inserção, deleção, atualização, busca e uma tela para somente visualização contendo os dados do paciente;

O campo de busca possui filtros para: id, primeiro nome, nome completo, CPF, CNS, bairro, cidade, estado e cep;

O formulário possui validação em todos o campos incluindo os mascaramentos de acordo com a necessidade de cada um deles;

A função de upload de imagens foi validada para aceitar imagens com no máximo 400x400px de tamanho e formatos jpg, png, jpeg, JPG, PNG, JPEG. 
Caso haja disparidade entre os parâmetros setados, a lib 'upload' retorna uma mensagem de erro.

Campos obrigatórios: Nome, Sobrenome, Nome completo da mãe, Data de Nascimento, CPF, CNS, CEP, Endereço, Número, Bairo, Cidade, UF;

Ao cadastrar um CNS, deve-se utilizar registros que iniciem com 1 ou 2, Ex:. 160780283120006, 278631959030004;

###################
Auxílio para a realização dos cadastros
###################

Gerador de CPF válido: https://www.4devs.com.br/gerador_de_cpf,

Gerador de CNS válido(utilizar apenas os que iniciam com 1 ou 2): https://geradornv.com.br/gerador-cns/,

Gerador de CEP válido: https://www.4devs.com.br/gerador_de_cep



