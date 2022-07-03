# Middleware Orientado a Mensagens: Calculadora

## Dependências:
* Docker
* Docker Compose
* Go

## Execução:

Este projeto utiliza a ferramente Kafka como agente de mensagens para implementar uma calculadora no estilo Produtor/Consumidor. O produtor é responsável por receber o `input` do usuário e enviar a mensagem ao consumidor, que por sua vez realiza as operações desejadas e devolve o resultado.

* O diretorio do projeto contém um arquivo `docker-compose.yml` que configura um container Docker com uma imagem do Kafka. Para executa-lo, utilize o comando `docker-compose up -d`
* Iniciar o programa Consumidor executando o arquivo `main.go` no diretório `consumer`. Ex:

    ```
    $ cd consumer/
    $ go run main.go
    ```
* Iniciar o programa Produtor executando o arquivo `main.go` no diretório `producer`. Ex:
    ```
    $ cd producer/
    $ go run main.go
    ```
* O repositório já possui os binários compilados para Linux de ambos os consumidores e produtores para testes.
* O programa Produtor informará as instruções de operação e estará pronto para receber inputs. O programa Consumidor deverá imprimir na tela o resultado das operações.

_Autores: Artur Barichello e Lucas Zacchi_

_INE5418: Computação Distribuída_
