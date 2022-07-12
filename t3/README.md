# Instruções

Instruções para validação do backend

1. Compilar e rodar versão JS com `haxe build-js.hxml && node bin/server.js` ou PHP7 com `haxe build-php.hxml && php7 -S localhost:8080 -t bin`
1. Rodar caddy com `sudo caddy run`
1. Rodar com algum dos seguintes cURLs de exemplo:

* `curl --data '{"operands":[1,3,4]}' --header 'Content-Type: application/json' 'https://localhost/calculate/sum'`
* `curl --data '{"operands":[1,3,4]}' --header 'Content-Type: application/json' 'https://localhost/calculate/multiplication'`

