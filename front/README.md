 # Star Wars - Front
 ## Angular 7
 ### Nebular Theme

*******************
Instruções
*******************

- Alterar o arquivo: src -> app -> app.config.ts. Alterar a variável 'URL_BASE_REST' com a url da API.
- Para rodar localmente:
    -   Por linha de comando, ir até a pasta do projeto e rodar o código:
            ```
            npm install
            ng serve -o
            ```

- Para gerar a versão para produção:
    - Ir até: src -> index.html, e alterar a tag:
    ```
    <base href="{url do seu servidor}">
    ```

    - Por linha de comando, ir até a pasta do projeto e rodar o código:
        ```
        ng build
        ```


*******************
Testes
*******************

1. Por linha de comando, vá até a pasta do projeto e digite o comando ng test
2. Na raíz do projeto, será gerada uma pasta "coverage". Dentro desta pasta, abra o arquivo index.html para analisar os resultados.
