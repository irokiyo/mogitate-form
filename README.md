# アプリケーション名
mogitate-form


## 環境構築
Dokerビルド
1.git clone git@github.com:Estra-Coachtech/laravel-docker-template.git
2.mv laravel-docker-template mogitate-form
3.git add .
4.git commit -m "リモートリポジトリの変更"
5.git push origin main
6.docker-compose up -d --build

Laravel環境構築
1.docker-compose exec php bash
2.composer install
3.cp .env.example .env
4.環境変数を
    DB_CONNECTION=mysql
    DB_HOST=mysql
    DB_PORT=3306
    DB_DATABASE=laravel_db
    DB_USERNAME=laravel_user
    DB_PASSWORD=laravel_passに変更
5.php artisan key:generate
6.php artisan migrate
7.php artisan seed

## 使用技術(実行環境)
MySQL 8.0.26
Laravel: 8.83.3
PHP 8.1 (Docker)

## ER図
![ER図](docs/er-diagram.png)

## URL
開発環境：http://localhost/
phpMyAdmin http://localhost/8080/
