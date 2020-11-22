# Tabela Brasileirão

- [Instalação](#instalação)
  - [Clonar projeto](#clonar-projeto)
  - [Instalar dependências](#instalar-dependências)
- [Banco de Dados](#banco-de-dados)
  - [Criar estrutura de Banco de Dados](#criar-estrutura-de-banco-de-dados)
  - [Script para polular a tabela](#script-para-polular-a-tabela)
- [Iniciar servidor](#iniciar-servidor)
- [Rotas](#rotas)

## Instalação

A aplicação utiliza Laravel 7.0 e PHP 7.4.11. Portanto, para realizar a instalação é necessário ter o [PHP](https://www.php.net/downloads.php) e o [Composer](https://getcomposer.org/download/) instalados.

### Clonar projeto

Com o ambiente preparado, clone o projeto utilizando o comando:
```
git clone https://github.com/danilodvaz/Tabela-Brasileirao.git
```

### Instalar dependências

Depois de clonado, acesse o diretório raiz do projeto e instale as dependências utilizando o gerenciador de dependências Composer:
```
composer install
```

## Banco de Dados

Para criar a estrutura do banco de dados, configure no arquivo **.env** as informações do banco de dados que será utilizado.

### Criar estrutura de Banco de Dados

Com o banco de dados configurado, no diretório raiz, execute o comando abaixo para que o Laravel crie a tabela e as colunas:
```
php artisan migrate
```

### Script para polular a tabela

```sql
INSERT INTO `classificacao`
(`posicao`, `clube`, `pontos`, `jogos_disputados`, `vitorias`, `empates`, `derrotas`, `gols_pro`, `gols_contra`, `saldo_gol`) 
VALUES 
(1, 'Atlético-MG', 0, 0, 0, 0, 0, 0, 0, 0),
(2, 'Internacional', 0, 0, 0, 0, 0, 0, 0, 0),
(3, 'São Paulo', 0, 0, 0, 0, 0, 0, 0, 0),
(4, 'Flamengo', 0, 0, 0, 0, 0, 0, 0, 0),
(5, 'Palmeiras', 0, 0, 0, 0, 0, 0, 0, 0),
(6, 'Santos', 0, 0, 0, 0, 0, 0, 0, 0),
(7, 'Grêmio', 0, 0, 0, 0, 0, 0, 0, 0),
(8, 'Fluminense', 0, 0, 0, 0, 0, 0, 0, 0),
(9, 'Bahia', 0, 0, 0, 0, 0, 0, 0, 0),
(10, 'Bragantino', 0, 0, 0, 0, 0, 0, 0, 0),
(11, 'Athletico-PR', 0, 0, 0, 0, 0, 0, 0, 0),
(12, 'Sport', 0, 0, 0, 0, 0, 0, 0, 0),
(13, 'Fortaleza', 0, 0, 0, 0, 0, 0, 0, 0),
(14, 'Corinthians', 0, 0, 0, 0, 0, 0, 0, 0),
(15, 'Ceará', 0, 0, 0, 0, 0, 0, 0, 0),
(16, 'Atlético-GO', 0, 0, 0, 0, 0, 0, 0, 0),
(17, 'Vasco', 0, 0, 0, 0, 0, 0, 0, 0),
(18, 'Coritiba', 0, 0, 0, 0, 0, 0, 0, 0),
(19, 'Botafogo', 0, 0, 0, 0, 0, 0, 0, 0),
(20, 'Goiás', 0, 0, 0, 0, 0, 0, 0, 0)
```

## Iniciar servidor

Após a instalação das dependências e a criação da estrutura do banco de dados, ainda no diretório raiz, execute o seguinte comando para iniciar o servidor:
```
php artisan serve
```

## Rotas

A rota principal da aplicação é a **/classificacao**. Portanto, para acessar a aplicação, utilize a url abaixo:
```
http://127.0.0.1:8000/classificacao
```
