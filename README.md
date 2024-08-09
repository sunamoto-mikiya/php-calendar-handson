# Web 基礎講座ハンズオン: PHP Calendar

## ハンズオンの流れ

- 1. 本プロジェクトを zip ダウンロードして利用してください
- 2. zip ファイルを解凍して任意のディレクトリに移動させる
- 3. ターミナルで php-calendar-handson ディレクトリに移動する
- 4. `docker-compose up -d`でコンテナを起動
- 5. `http://localhost:8080` にアクセスすることで画面が見えることを確認する
- 6. 課題に取り組む

## 内容物

- 1. src ディレクトリ
  - 開発用ディレクトリ
  - index.php
    - HTML を記述するファイル
  - stylesheet.css
    - CSS を記述するファイル
  - calender.js
    - Javascript を書くファイル
  - calender.php
    - php を書くファイル
  - hint.php
    - ヒント集    
- 2. docker-compose.yml
  - docker の定義。最小限の apache:php で動くものを設定
