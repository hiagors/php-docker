# php-docker

## :rocket: Começando
``` bash
  # Clonar o projeto:
  $ git clone https://github.com/hiagors/php-docker.git

```

## :gear: Executando docker-compose
```bash
  # Entrar no diretório do repositório:
  $ cd php

  # Executar o docker compose:
  $ docker-compose up

  # Rodar o container docker:
  $ docker run php

```

## :gear: Inicializando banco MySQL
```bash
  # Copiar o arquivo db.sql para dentro do container MySQL:
  $ docker cp db.sql php_mysql_1:/db.sql

  # Entrar no prompt MySQL a partir do docker:
  $ docker exec -it php_mysql_1 /bin/sh

  # Logar no prompt MySQL:
  $ mysql -u root --password

  # Digitar a senha MySQL:
  $ docker

  # Executar as querys sql do arquivo db.sql:
  $ source db.sql

```
