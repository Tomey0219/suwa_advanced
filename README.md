#飲食店予約サービス

#目的
　飲食店の予約

#アプリケーションURL
　・飲食店一覧ページ：http://localhost/
　・飲食店詳細ページ：http://detail/{shopID}
　・ログインページ：http://localhost/login
　・会員登録ページ：http://localhost/register
　・マイページ：http://localhost/mypage

#機能一覧
　・会員登録（バリデーション有）
　・ログイン（メール認証）
　・ログアウト
　・ユーザ情報取得
　・ユーザ飲食店お気に入り一覧取得
　・ユーザ飲食店予約情報取得
　・飲食店一覧取得
　・飲食店詳細取得
　・飲食店お気に入り追加/削除
　・飲食店予約追加/削除（バリデーション有）
　・飲食店予約変更（バリデーション有）
　・飲食店評価
　・エリア検索
　・ジャンル検索
　・店名検索

#使用技術

　・php:7.4.9
　・Laravel:8.83.27
　・mysql:8.0.26
  ・nginx:1.21.1
  ・mailhog:v1.0.1

#テーブル設計

#ER図

#環境構築

　1. docker-compose up -d --build
　2. docker-compose exec php bash
　3. composer install
　4. .env.exampleファイルから.envを作成し、環境変数を変更
　5. 時間設定を変更・・・app.phpの'timezone'を変更し、"$ php artisan tinker"
　6. php artisan key:generate
　7. php artisan migrate
　8. php artisan db:seed
