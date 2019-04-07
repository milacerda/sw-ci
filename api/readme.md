# Star Wars API
## CodeIgniter 3.1.10

@author: Camila Lacerda

@milacerda

## Instruções

A API foi feita utilizando o framework CodeIgniter.
- Para rodar, setar a url em application -> config -> config.php -> $config['base_url'] = "url do seu servidor"
- Atualizar as configurações do banco de dados em application -> config -> database
- No navegador, acessar a URL: *{{URL_DA_SUA_APLICAÇÃO}}*/migrate

## Funcionalidades:

- Adicionar um planeta (com nome, clima e terreno):

    **URL:** {{SEU_DOMINIO}}/planets

    **Verbo:** Post

    **Parâmetros:** nome, clima, terreno

- Listar planetas

    **URL:** {{SEU_DOMINIO}}/planets

    **Verbo:** Get

- Buscar por nome

    **URL:** {{SEU_DOMINIO}}/planets/{{NOME_DO_PLANETA}}

    **Verbo:** Get

- Buscar por ID

    **URL:** {{SEU_DOMINIO}}/planets/{{ID_DO_PLANETA}}

    **Verbo:** Get

- Remover planeta

    **URL:** {{SEU_DOMINIO}}/planets/{{ID_DO_PLANETA}}

    **Verbo:** Delete

- Atualizar planeta

    **URL:** {{SEU_DOMINIO}}/planets/{{ID_DO_PLANETA}}

    **Verbo:** PUT


*******************
Testes
*******************
Para rodar os testes você deve ter o Composer(https://getcomposer.org/download/) e o Phpunit (https://phpunit.de/manual/6.5/en/installation.html) instalados.

1. Na pasta do projeto, rodar o comando 
```
composer install
```

2. Ir até a pasta application -> tests, e rodar o comando 
```
phpunit
```

3. Na pasta tests -> build -> coverage você pode conferir os resultados.