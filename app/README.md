

## Build the API 

```
    $ docker build . -t example/api
```

## Build the API in Developer Mode with Docker-Compose 

```
    $ docker-compose up -d 
```

## Deploy da API - Compose v3

```
    $ docker stack deploy -c docker-compose-prodswarm.yml app
```

```
    # docker-machine ip master
```

Acesse várias vezes: 
```
http://ip-do-cluster/hostname 
```

## Atenção

Esse projeto foi criado para demonstrar exemplos de deploy e scaling utilizando Docker. 
Podemos demonstrar o funcionamento de Load Balances e Auto Scaling fazendo a API responder seu hostname, mostrando que nossas requisições estão sendo atendidas por containers diferentes. 

Alguns métodos disponíveis para exemplos: 

```javascript
GET: /
```

```javascript
GET: /hostname
```

```javascript
GET: /ip
```

