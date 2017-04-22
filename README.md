

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

### Verificando a distribuição dos containers

```
$ docker stack ps app
```
```
ID                  NAME                IMAGE                          NODE                DESIRED STATE       CURRENT STATE            ERROR               PORTS
lgvwqegtwm8g        app_api.1           msfidelis/example-api:latest   master              Running             Running 39 minutes ago
ulwheogj2wdt        app_api.2           msfidelis/example-api:latest   minion01            Running             Running 38 minutes ago
99sqb1y97ozy        app_api.3           msfidelis/example-api:latest   minion01            Running             Running 38 minutes ago
xom0nytf3v81        app_api.4           msfidelis/example-api:latest   minion02            Running             Running 38 minutes ago
```

```
$ docker-machine ip master
```

Acesse várias vezes: 
```
http://ip-do-cluster/hostname 
```

### Escalando a API 

Verificando os services disponíveis

```
$ docker stack services app
```
```
ID                  NAME                MODE                REPLICAS            IMAGE
4nzk39qsqb6s        app_api             replicated          4/4                 msfidelis/example-api:latest
docker@master:~$ docker stack services app
```

```
$ docker service scale app_api=10
app_api scaled to 10
```

Podemos olhar novamente agora e...

```
$ docker stack services app
```

```
ID                  NAME                IMAGE                          NODE                DESIRED STATE       CURRENT STATE                ERROR               PORTS
lgvwqegtwm8g        app_api.1           msfidelis/example-api:latest   master              Running             Running 44 minutes ago
ulwheogj2wdt        app_api.2           msfidelis/example-api:latest   minion01            Running             Running 44 minutes ago
99sqb1y97ozy        app_api.3           msfidelis/example-api:latest   minion01            Running             Running 44 minutes ago
xom0nytf3v81        app_api.4           msfidelis/example-api:latest   minion02            Running             Running 44 minutes ago
7p8prtbnwf1r        app_api.5           msfidelis/example-api:latest   master              Running             Running 2 minutes ago
gpk1kl35aq20        app_api.6           msfidelis/example-api:latest   minion02            Running             Running about a minute ago
rzzasl40k5z7        app_api.7           msfidelis/example-api:latest   master              Running             Running 2 minutes ago
cffulgwncuz7        app_api.8           msfidelis/example-api:latest   master              Running             Running 2 minutes ago
t2nvx0i86mz5        app_api.9           msfidelis/example-api:latest   minion01            Running             Running 2 minutes ago
40n0sxtzeba2        app_api.10          msfidelis/example-api:latest   minion02            Running             Running about a minute ago
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

