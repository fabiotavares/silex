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
- Na raiz do projeto, digite digite: php -S localhost:8888 -t public/ em um terminal
- Para os testes no POSTMAN via Chrome utilize os exemplos abaixo
- Para listar todos os produtos no formato json usando o método GET:
```sh
$ localhost:8888/api/produtos
```
- Para listar o produto cujo id foi passado via GET:
```sh
$ localhost:8888/api/produtos/{id}
```
- Para inserir um produto cujos campos foram passados via POST:
```sh
$ localhost:8888/api/produtos
```
- Para editar o produto cujo id e valores foram passados via PUT:
```sh
$ localhost:8888/api/produtos/{id}
```
- Para deletar o produto cujo id foi passado via DELETE:
```sh
$ localhost:8888/api/produtos/{id}
```