# API-Laravel

### Descrição do projeto e motivação

Uma simples API de CRUD de carros, minha motivação para o desenvolvimento dessa simples API, é relembrar conceitos que tive contato já há algum tempo, tem como maior finalidade me ajudar a relembrar de um modo prático, alguns conceitos sobre API(s) e o Laravel.

### Requisitos 

__Para conseguir testar o sistema são necessarios os seguintes requisitos__
- PHP 8 ou superior
- Composer 
- Mysql
- Git

### Configurando 1º uso

1. Realizar o clone do repositório.
2. Com o composer devidamente instalado, __executar os comandos__:
> composer install

> composer update
3. Localizar o arquivo *.env.exemplo*, copiar o mesmo retirando o ".exemplo", ficando apenas ".env". nesse arquivo deverá ser configurado de acordo com os dados do seu sistema, OBS: você deverá criar os bancos de dados e informalos no .env, as migrações irão criar apenas as tabelas.
4. Rodar as migrations, factorys e seeders, __com o comando__:
> php artisan migrate --seed
5. Subir o servidor (pode ser o de sua preferencia), no caso estou usando o serve integrado para teste do php 8.
> php artisan serve
6. (opcional) Caso deseje realizar os testes, crie um arquivo .env.testing, e passe as configurações (como porta, nome do banco...), IMPORTANTE: os testes então configurados para limpar os dados após cada sequencia de teste, assim se não cria um novo banco com o novo .env, todos os dados serão perdidos..
7. (opcional) Executar os comando
> php artisan --env=testing migrate

Caso tenha algum erro, tente executar os comandos abaixo e repetir o comando acima:

> php artisan cache:clear

> php artisan config:cache 

8. (opcional) em uma nova aba/terminal execultar os testes com o comando:
> php artisan test
![image](https://user-images.githubusercontent.com/58447450/211375312-58e302b2-38dc-4a8b-8c36-abdc413de9e6.png)


### EndPoints

Método | EndPoint         | Descrição                        | Parametros      | Body
------ | -----------      | -------------------------------- | :-------------: | :--------------:
GET    | /api/carros      | Retorna todos os veiculos        | Page=[número]   | N/A
GET    | /api/carros/{ID} | Retorna o veículo especificado   | N/A             | N/A
POST   | /api/carros      | Cadastra um novo veículo         | N/A             | Json{modelo, ano, placa, cor, montadora}
DELETE | /api/carros/{ID} | Remove o veículo especificado    | N/A             | N/A
PUT    | /api/carros/{ID} | Atualiaza o veículo especificado | N/A             | Json{modelo, ano, placa, cor, montadora}

### Conceitos aplicados

- Rotas
- MVC
- Factory
- Seedeer
- Resource
- Testes


