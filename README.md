# BYMYSELF
子どもの自立をサポートするアプリケーションサイトです。

# アプリケーション概要

子どもの自立をサポートするアプリ

親：お手伝いや宿題を習慣化するアシストして親のストレスを軽減させる

子：つまらないはずのお手伝いや宿題をすすんでしたくなる

# アプリケーションを作成した背景

実際に子育てをしている中で、子どもが楽しくお手伝いや宿題を自主性を持っておこなえるようするにはどうしたらいいかを考えていた。

お手伝いをしたり宿題をしているのは自分だけで、自分だけが大変だと感じている幼い子どもに対して、仲間がいて、自分の実績が視える化できたらやる気につながるのではないかと考えた。

そこでやったお手伝いの履歴やもらったお小遣いを視える化できるよアプリケーションを開発することにした。

# 使用技術
- PHP 8.2
- Laravel Framework 10.38.2
- Laravel Sail ver10.x
- MySQL Ver 8.0.32
- Docker Ver4.26.1
- GitHub
- Visual Studio Code

# 開発環境
- windows10 ver22H2(OSビルド 19045.3803)
- Docker Ver4.26.1
- PHP 8.2
- Laravel Framework 10.38.2
- MySQL Ver 8.0.32

# 実装に要した時間
| 実装内容 | 時間 |
| :-----: | :----: |
| 開発環境の構築 | 10h |
| データベース設計（見直し）| 4h |
| READMEの記述 | 2h |
| ファミリーユーザーログイン機能の実装 | h |
| 子ユーザー管理機能実装 | h |
| タスク依頼機能実装 |  h |
| タスク報告機能実装 |  h |
| ランキング機能実装 |  h |


# 機能一覧
## 親ユーザー
- ファミリーユーザー登録、ログイン機能
- 子ユーザー新規登録機能
- タスク依頼機能
- タスク報告確認・承認機能
- 子ども一覧機能
- 子ども詳細機能
- タスク一覧機能
- タスク詳細機能
- タスク履歴機能

## 子ユーザー
- 子ユーザーログイン機能（ログインID、パスワード情報のみでログイン可能）
- タスク一覧機能
- タスク報告機能（画像投稿機能）
- タスク履歴機能
- タスク詳細機能
- ポイント履歴機能
- ランキング機能

# 実装中に問題となったこと・工夫したところ
## 問題点1：開発環境の構築
1. まず、Dockerを使用した開発環境の構築の時点で躓いた。今回初めてDockerを使用し開発環境の構築を試みた。サーバーの役割や、仮想環境について理解が不十分だったため再度学習する。
2. 環境構築に時間がそこまで長く時間を割けられないと判断し、Laravel Sail（Dockerを操作するための軽量コマンドラインインターフェース）を使用しDocker環境の構築方法を採用した。
3. Dockerはすでにインストール済みでwsl2、ubuntのインストールも済んでいたため、Laravel Sail自体をDockerにインストールしDocker環境を構築していった。
4. 3で構築したPHPのリポジトリをGitHub上へpushできない問題が発生した。原因はDockeerHubへのログインが出来ていなかったためリポジトリの編集権限がなかったため。ログインすることでしてpushが完了した。

## 問題点2：

# Ruby開発時からの改善点
## テーブル設計

# テスト内容


# 実装した機能についての画像やGIFおよびその説明

鋭意作成中

# 今後の実装予定の機能
- ポイント利用でのミニゲーム機能
- 成長記録機能（身長、体重）
- 資産管理機能（お小遣い帳機能）
- アバター機能
- 友達登録機能
- メッセージ機能
- 習い事登録機能
- スケジュール管理機能


# データベース設計

[![Image from Gyazo](https://i.gyazo.com/5453713697a89aedbfaac63cd4824c48.png)](https://gyazo.com/5453713697a89aedbfaac63cd4824c48)

# 画面遷移図

[![Image from Gyazo](https://i.gyazo.com/fe562f71d764b8f004d2cfdbc4625c77.png)](https://gyazo.com/fe562f71d764b8f004d2cfdbc4625c77)

# 参考資料又はサイト
## 参考サイト
- 仮想環境の構築参考
https://www.youtube.com/watch?v=FpbPYF0Zp1w
- Laravel Sail公式リファレンス
https://laravel.com/docs/10.x/sail
- DBeaverでDocker環境のMySQLに接続した際に”Public Key Retrieval is not allowed"のエラーが出た際の解消方法
https://okuyan-techdiary.com/mysql-dbeaver-error
- データベースの正規化参考
1. https://www.foresight.jp/fe/column/normalization/
2. https://dev.mysql.com/doc/employee/en/sakila-structure.html
- ログイン機能の実装
1. Breeze公式リファレンス
https://laravel.com/docs/8.x/starter-kits#laravel-breeze
2. 



