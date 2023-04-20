
# Desafio Programador Protheus Unoesc
Esse é o nosso desafio para a vaga de programador Protheus na [Unoesc](https://www.unoesc.edu.br/). Serão testadas as habilidades e qualidade de código ao transformar requisitos limitados em uma aplicação.

- [Desafio Programador Protheus Unoesc](#desafio-programador-protheus-unoesc)
- [Projeto](#projeto)
  - [Escopo do Projeto](#escopo-do-projeto)
    - [Requisitos](#requisitos)
    - [Atenção!](#atenção)
  - [Tecnologias a serem utilizadas](#tecnologias-a-serem-utilizadas)
- [Avaliação](#avaliação)

# Projeto
Você terá que desenvolver uma aplicação responsável por consumir a API [brapi](https://brapi.dev) e persistir os dados de **ações** em um banco de dados relacional.

Documentação da API disponível aqui: https://brapi.dev/docs

**Endpoints que serão utilizados:**

![EndPoints Desafio Protheus](https://user-images.githubusercontent.com/32557284/225396097-a1d2942d-ced4-4973-b8bf-631b272ff00f.png)

## Escopo do Projeto
### Requisitos
* A aplicação deve persistir em uma tabela do banco de dados todos as ações (***tickers***) disponíveis na API.
* Neste cadastro de ações (***tickers***) devem conter as informações de símbolo (*symbol*) e nome (*shortname*).
* A aplicação deve cadastrar em outra tabela no banco de dados as informações de Cotação (*regularMarketPrice*), Valor de Mercado (*marketCap*), Volume de Transações (*regularMarketVolume*), Moeda (*currency*) e Data (*regularMarketTime*) destas ações.
* A aplicação deve apresentar esses valores ao usuário em formato à escolha do desenvolvedor (terminal, arquivo de texto, csv, pdf, xlsx...) com a seguinte estrutura:
  * Símbolo;
  * Nome;
  * Cotação;
  * Valor de Mercado;
  * Volume de Transações;
  * Moeda;
  * Data.
### Atenção!
* Não há requisitos quanto a escolha da linguagem de programação, framework ou banco de dados a serem utilizados na implementação.
* Versionar o projeto realizando commits com comentários do que está sendo implementado.
* Soluções parciais serão aceitas, porém o que for submetido deve estar funcionando.

Para auxiliar o entendimento do desafio, elaboramos um diagrama de entidade relacionamento contendo a estrutura do banco de dados:

![ER Desafio Protheus](https://user-images.githubusercontent.com/32557284/225391963-edf56be7-a835-4bc4-8017-c7dff6f055ec.png)

## Tecnologias a serem utilizadas
* Linguagem de programação à escolha;
* Banco de Dados relacional à escolha;
* Git.
# Avaliação
**O código será avaliado de acordo com os critérios:**
* Build e execução da aplicação;
* Completude das funcionalidades;
* Qualidade de código (design pattern, manutenibilidade, clareza);
* Histórico do GIT;
* Sentido e coerência nas respostas aos questionamentos na entrevista de apresentação do desafio realizada pelo candidato.

**Não esqueça de documentar o processo necessário para rodar a aplicação.**

# Para executar a aplicação
* É necessário um servidor que execute PHP e banco de dados MySQL ou MariaDB;
* Para rápida configuração é recomendada a instalação do [XAMPP](https://www.apachefriends.org/);
* Após a instalação dos módulos Apache e php do XAMPP é só mover ou clonar o repositório para dentro da pasta htdocs localizada dentro do local de instalação do XAMPP e iniciar o XAMPP Control Panel;
* O banco de dados deve ser criado dentro da aplicação de banco de dados escolhida, você pode utilizar o modulo MySQL que vem juntamente com o XAMPP ou instalar o MySQL Comunity Server, por exemplo. O arquivo de export se encontra nos arquivos deste repositório com o nome brapi.sql;
* As configurações de acesso ao banco de dados se encontram em desafio-protheus/application/config/database.php, deve ser informado o hostname (localhost se utilizar o XAMPP) e credênciais para acesso ao banco;
* A url padrão está definida como localhost, caso a url de execução seja diferente por conta do servidor, é necessário alterar a url base em desafio-protheus/application/config/config.php, alterar a variável $config['base_url'];
* Após tudo configurado é só acessar a url através do navegador (a execução pode demorar alguns minutos dependendo das configurações do servidor, não dê refresh nem feche a aba até que a execução esteja completa);
* Se tudo configurado como padrão utilizando o XAMPP a url deverá ser: http://localhost/desafio-protheus/
