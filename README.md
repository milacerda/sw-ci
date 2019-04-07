/**
 * @author: Camila Lacerda
 * @author: milacerda
 */

*******************
Informações
*******************

/**
 * Star Wars API
 * CodeIgniter 3.1.10
 */


## Requisitos

- A API deve ser REST
- Para cada planeta, os seguintes dados devem ser obtidos do banco de dados da aplicação, sendo inserido manualmente:
    - Nome
    - Clima
    - Terreno
- Para cada planeta também devemos ter a quantidade de aparições em filmes, que podem ser obtidas pela API pública do Star Wars:  https://swapi.co/


## Instruções

A API foi feita utilizando o framework CodeIgniter.
- Para rodar, setar a url em application -> config -> config.php -> $config['base_url'] = "url do seu servidor"
- Atualizar as configurações do banco de dados em application -> config -> database
- No navegador, acessar a URL: {{URL_DA_SUA_APLICAÇÃO}}/migrate


## Funcionalidades:

- Adicionar um planeta (com nome, clima e terreno):
    URL: {{SEU_DOMINIO}}/planets
    Verbo: Post
    Parâmetros: nome, clima, terreno

- Listar planetas
    URL: {{SEU_DOMINIO}}/planets
    Verbo: Get

- Buscar por nome
    URL: {{SEU_DOMINIO}}/planets/{{NOME_DO_PLANETA}}
    Verbo: Get

- Buscar por ID
    URL: {{SEU_DOMINIO}}/planets/{{ID_DO_PLANETA}}
    Verbo: Get

- Remover planeta
    URL: {{SEU_DOMINIO}}/planets/{{ID_DO_PLANETA}}
    Verbo: Delete

- Atualizar planeta
    URL: {{SEU_DOMINIO}}/planets/{{ID_DO_PLANETA}}
    Verbo: PUT

*******************
Testes
*******************
Para rodar os testes você deve ter o Composer(https://getcomposer.org/download/) e o Phpunit (https://phpunit.de/manual/6.5/en/installation.html) instalados.

1. Na pasta do projeto, rodar o comando composer install.
2. Ir até a pasta application -> tests, e rodar o comando phpunit
3. Na pasta tests -> build -> coverage você pode conferir os resultados.


/**
 * Star Wars - Front
 * Angular 7
 * Nebular Theme
 */

 ## Instruções

- Alterar o arquivo: src -> app -> app.config.ts. Alterar a variável 'URL_BASE_REST' com a url da API.
- Para rodar localmente:
    -   Por linha de comando, ir até a pasta do projeto e rodar o código:
            1. npm install
            2. ng serve -o
- Para gerar a versão para produção:
    - Ir até: src -> index.html, e alterar a tag '<base href="{url do seu servidor}">'
    - Por linha de comando, ir até a pasta do projeto e rodar o código:
        1. ng build


*******************
Testes
*******************

1. Por linha de comando, vá até a pasta do projeto e digite o comando ng test
2. Na raíz do projeto, será gerada uma pasta "coverage". Dentro desta pasta, abra o arquivo index.html para analisar os resultados.
