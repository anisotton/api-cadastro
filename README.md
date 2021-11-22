# Teste tecnico Tray

API para cadastro de vendedore e calculo de comissão de venda


## Tecnologias utilizada
- [Laravel 8.x](https://github.com/laravel/laravel)
- [Livewire 2.x](https://github.com/livewire/livewire)
- [MySql 5.7](https://dev.mysql.com/doc/refman/5.7/en/)
- [Redis 6.2](https://redis.io/)
- [Docker 20.10](https://www.docker.com/)

## Instalação
### Clonar Projeto
```sh
git clone https://github.com/anisotton/tray
```

### Acessar o projeto
```sh
cd tray
```

### Criar o Arquivo .env
```sh
cp .env.example .env
```

### Atualizar as variáveis de ambiente do arquivo .env
```dosini
APP_NAME=Tray
APP_URL=http://localhost:8000

DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=tray
DB_USERNAME=root
DB_PASSWORD=root

CACHE_DRIVER=redis
QUEUE_CONNECTION=redis
SESSION_DRIVER=redis

REDIS_HOST=redis
REDIS_PASSWORD=null
REDIS_PORT=6379
```

### Subir os containers do projeto
```sh
docker-compose up -d
```

### Acessar o container
```sh
docker-compose exec app bash
```


### Instalar as dependências do projeto
```sh
composer install
```
```sh
npm install
```

### Gerar a key do projeto Laravel
```sh
php artisan key:generate
```


### URL de acesso
[http://localhost:8000](http://localhost:8000)
