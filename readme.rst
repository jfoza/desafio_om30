###################
Sistema de cadastro de pacientes
###################

Sistema para cadastro de pacientes construído em PHP utilizando o Codeigniter framework + Vuejs;

Banco de dados PostgreSQL versão 10.1;

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
Instruções para execução e utilização
###################

A estrutura de banco de dados está em um arquivo chamado pacientes.sql na raíz do projeto;

Após criar o banco de dados e sua estrutura, é necessário executar o comando "composer install" na raíz do projeto e consequentemente possuir o composer instalado no local de execução do projeto;

Inserir as credenciais do banco de dados em application/config/database.php;

Inserir a URL base em dois arquivos: application/config/config.php, public/assets/js/util.js;

O Codeigniter está em modo 'development' para assim poderem ser exibidos os debugs;

O sistema possui duas páginas: Home e Pacientes, a primeira mostra a logo da empresa incluindo links para as redes sociais e site, na segunda está o cadastro de pacientes incluindo funções de listagem, inserção, deleção, atualização, busca e uma tela para somente visualização contendo os dados do paciente;

O campo de busca possui filtros para: id, primeiro nome, nome completo, CPF, CNS, bairro, cidade, estado e cep;

O formulário possui validação em todos o campos incluindo os mascaramentos de acordo com a necessidade de cada um deles;

A função de upload de imagens foi validada para aceitar imagens com no máximo 400x400px de tamanho e formatos jpg, png, jpeg, JPG, PNG, JPEG. 
Caso haja disparidade entre os parâmetros setados, a lib 'upload' retorna uma mensagem de erro.

Campos obrigatórios: Nome, Sobrenome, Nome completo da mãe, Data de Nascimento, CPF, CNS, CEP, Endereço, Número, Bairo, Cidade, UF;

Ao cadastrar um CNS, deve-se utilizar registros que iniciem com 1 ou 2, Ex:. 160780283120006, 278631959030004;



