# Docker projeto1 DIO
Este projeto tem como objetivo solucionar o desafio e facilitar necessidades pessoal.

O projeto sobe dois container, um com apache e outro com um banco mysql.

No container com o apache, ele copia tudo oque esta dentro de `src` para o `/var/www/html` do container. Foi criado um dockerfile para facilitar adicionar exprensões o qual se localiza em: `docker/php/dockerfile.php`
O mesmo foi feito com o banco mysql, o qual se houver algum dump do banco no formato `.sql` em `docker/database/`, inicia a criação do banco no build inserindo as tabelas do arquivo dump. 
Lembre-se que dependendo do tamanho do dump, ele demora um certo tempo para subir, verifique os logs para ver se ja foi executado o processo. E que por padrão ele insere as tabelas em no database com o nome exprecificado em: `MYSQL_DATABASE`

## Comandos uteis

Remover a persistencia do banco (volume)
```bash
docker compose down --volumes
```

Ao adicionar alguma extensão, lembrar de:
Forçar build:
```bash
docker compose up --build
```
Ou, Remover a imagem ao derrubar os container:
```bash
docker compose down --rmi local
```