#Code Education
----
- Módulo: Silex
- Projeto Fase 4: APIs Públicas
- Autor: Fábio Tavares
- Data: 17/11/2014

Observações
----
- Projeto de estudos no curso Code.education
- Execute o arquivo fixtures.php na raiz para importar o banco de dados
- Testes realizados com o servidor interno do PHP:
- Na raiz do projeto, digite digite: php -S 127.0.0.1:8080 -t public/ em um terminal
- Testes de API utilizando a extensão POSTMAN do Chrome:
- Para os testes no POSTMAN utilize as seguintes URLs:
```sh
$ localhost:8888/api/produtos com GET (para listar os produtos no formato json)
$ localhost:8888/api/produtos/1 com GET (para listar o produto de id=1)
$ localhost:8888/api/produtos com POST (para inserir um produto com os campos digitados)
$ localhost:8888/api/produtos/1 com PUT (para editar o produto de id=1 com os valores digitados)
$ localhost:8888/api/produtos/1 com DELETE (para deletar o produto de id=1)
```

