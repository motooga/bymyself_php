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
- laravel/breeze (v1.27.0)
- Breeze
- vuex 4.0.2
- axios 1.6.1
- Vue Datepicker

# 開発環境
- windows10 ver22H2(OSビルド 19045.3803)
- Docker Ver4.26.1
- PHP 8.2
- Laravel Framework 10.38.2
- MySQL Ver 8.0.32
- Vue 3.2.41

# 実装に要した時間
| 実装内容 | 時間 |
| :-----: | :----: |
| 開発環境の構築 | 10h |
| データベース設計（見直し）| 4h |
| READMEの記述 | 2h |
| ファミリーユーザーログイン機能の実装 | 10h25m |
| 子ユーザー管理機能実装 | 37h |
| タスク依頼機能実装 |  16h |
| タスク報告機能実装 |  15h |
| ランキング機能実装 |  -h |


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


## 子ユーザー
- 子ユーザーログイン機能（ログインID、パスワード情報のみでログイン可能）
- タスク一覧機能
- タスク報告機能（画像投稿機能）
- タスク詳細機能


# 実装中に問題となったこと・工夫したところ
## 問題点1：開発環境の構築
1. まず、Dockerを使用した開発環境の構築の時点で躓いた。今回初めてDockerを使用し開発環境の構築を試みた。サーバーの役割や、仮想環境について理解が不十分だったため再度学習する。
2. 環境構築に時間がそこまで長く時間を割けられないと判断し、Laravel Sail（Dockerを操作するための軽量コマンドラインインターフェース）を使用しDocker環境の構築方法を採用した。
3. Dockerはすでにインストール済みでwsl2、ubuntのインストールも済んでいたため、Laravel Sail自体をDockerにインストールしDocker環境を構築していった。
4. 3で構築したPHPのリポジトリをGitHub上へpushできない問題が発生した。原因はDockeerHubへのログインが出来ていなかったためリポジトリの編集権限がなかったため。ログインすることでpushが完了した。

## 問題点2：親ユーザーと子ユーザーとの紐づけ
1. 親ユーザーのfamily_idを子ユーザーを新規登録する際にどのように取得するのがベストでどのようにすれば安全に紐づけデータを作成できるかわからなかった。
2. まず調べるために、chatGPTを利用し、どのような方法が考えらるか候補を出してもらった。
3. 候補として、Vuexの機能を利用して、storeでブラウザ上でデータを管理する方法と、クエリパラメーターを使用する方法を提案された。
4. クエリパラメーターに含める場合は安全性の問題があるため、Vuexでの管理をまずは試みた。
5. Vuexの機能を調べると想定しているユーザー同士の紐づけには適さないようなので、ほかの方法を再度検索することにした。
6. Laravelのリファレンス内でログインユーザーの情報の取得について再度確認するとrailsとは違いコントローラーに紐づかないview内でも、authファザードで認証済みユーザーへアクセスができるとのことだったので、userresister画面でも有効と考えた。コントローラー内でauthファザードにて認証済みユーザーのidを取得して、userのcreateアクション時にページに依存しないでユーザー情報をカラムに含めることができた。

## 重大なコンフリクトの発生
1. 使用しているWindowsPCがもとはProスペックではなくhomeスペックをアップグレードしたためか、hyper-vの設定がおかしくなり、一度シャットダウンすると仮想環境リポジトリの存在が消えてしまいアクセスできない問題が発生した。
2. 解決方法が分からなかったがやみくもにUbuntuの再ダウンロードなどをしてフォルダがなくなったら困ると考えて、明確な解決方法がわかるまで慎重に作業をした。
3. 1ではhyper-vの設定がおかしくなったと書いているが、初期はどこに原因があるのか全く分からないため、何を試せばいいのか全く分からない状態だった。
4. 仮想環境にアクセスできない問題なので、以前techcampで受講時に発生したフォルダーアクセスできない問題の解決方法を思い出したので試すことにした。

## タスク依頼機能実装時の問題
1. createメソッド後のredirectのかえり先に選択したuserのshowページにリダイレクトさせたかったので、userの情報をredirectの情報に含める方法に苦労した。```return to_route('user.show',['user'=> $request -> user_id ])```とすることで、ルートに必要なパラメーターを含めることが分かった。

## 工夫した部分
1. 承認作業を簡単にするため、ボタンクリックで承認とポイント付与が同時完了するようにした。
2. 定型の仕事を何度も依頼することを考えてtaskテーブルとorderテーブルを分けることで、依頼をスムーズにできるようにした。スケジュール機能を今後実装目標にしているので、繰り返し機能などをつけていきたい。


# Ruby開発時からの改善点
## テーブル設計
1. テーブル設計はRubyでの開発時は、1テーブルに多くのカラムを設定して情報のやり取りが簡単ではあったが、処理に負担がかかっていたため、正規化を意識してテーブル設計を行った。
2. 正規化を意識しすぎたせいでリレーションが複雑になり少し処理の作成に苦戦した。1クリックで複数テーブルに変更を加える処理を実行するのはVueを使用したおかげでスムーズに実装できたと思う。

# テスト内容
- 単体テスト：
ローカルでの自分での確認とユーザー認証機能の単体テストのみを実行した。



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

[![Image from Gyazo](https://i.gyazo.com/b7330176ebc1c26bd11ce38acb63e736.jpg)](https://gyazo.com/b7330176ebc1c26bd11ce38acb63e736)

# 画面遷移図

[![Image from Gyazo](https://i.gyazo.com/eff1d8fecdd8511c38f7473c3ab68586.jpg)](https://gyazo.com/eff1d8fecdd8511c38f7473c3ab68586)

# 参考資料又はサイト
# 参考サイト
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
2. https://newsite-make.com/relation-admin-management/ 
3. https://inertiajs.com/shared-data

- 画像投稿参考
1. https://reffect.co.jp/vue/vue-js-laravel-file-upload

- Vueの参考
1. https://logsuke.com/web/programming/laravel/laravel-breeze-top
2. https://www.udemy.com/course/laravel-vue3-crm/learn/lecture/33334940#overview

- datepicker導入参考
 1. https://vue3datepicker.com/props/look-and-feel/
 2. https://zenn.dev/unkler/articles/506189d3375297






