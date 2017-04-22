

## Build Simples da API 

```
    $ docker build . -t example/api
```

## Build da API no Developer Mode com o Compose v2

```
    $ docker-compose up -d 
```

## Deploy da API no Swarm Mode - Compose v3

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

