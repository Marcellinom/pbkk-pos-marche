# App POS "Marché"
<p align="center"><a target="_blank"><img src="https://cdn.discordapp.com/attachments/677050949432377345/958899990682550292/unknown.png" width="200"></a></p>

## development steps
dengan asumsi sudah menconfigure nginx proxy, mengcreate networknya di docker, dan install sertifikatnya di browser

1. Clone Repo (disarankan menggunakan ssh)
```wsl 
$ git clone git@gitlab.com:Marcellinom/pbkk-pos.git
```

2. Copy file env pada root project (bukan src)
```wsl
$ cp .env.example .env
```

3. Compose configurasi docker
```wsl
$ docker compose up -d
```

## Instalasi aplikasi laravel
1. masuk kedalam var/www/html
```wsl
$ docker exec -it --user=root pbkk-pos-app /bin/sh
```

2. Install dependencies
```wsl
$ composer install
```

3. Copy file env
```wsl
$ cp .env.example .env
```

4. Generate app key
```wsl
$ php artisan key:generate
```