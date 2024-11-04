# お問い合わせフォーム

## 環境構築
- Dockerビルド
  1. git clone git@github.com:Mika-F620/contact-form-test.git
  2. docker-compose up -d --build
  
- Laravel
  1. docker-compose exec php bash
  2. composer install
  3. .env.sampleファイルから.envを作成し、環境変数を変更
  4. php artisan key:generate
  5. php artisan migrate
  6. php artisan db:seed
  
## 使用技術(実行環境)
- PHP 8.3.13
- Laravel Framework 8.83.27
- MySQL Ver 15.1

## URL
- ポート番号は8084になり、データベースは8080になります。
  - phpmyadmin（データベース）<br>
    http://localhost:8080/
  - お問い合わせフォーム<br>
    http://localhost:8084/
  - お問い合わせ確認画面<br>
    http://localhost:8084/confirm
  - お問い合わせ完了画面<br>
    http://localhost:8084/thanks
  - ログイン画面<br>
    http://localhost:8084/login
  - 新規登録画面<br>
    http://localhost:8084/register
