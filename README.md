# リポジトリ（プロダクト）の名前：Name
Rese

## 概要：Overview
飲食店予約サービス  
  
主な機能  
・会員登録  
・ログイン  
・ログアウト  
・ユーザー情報取得  
・ユーザー飲食店お気に入り一覧取得  
・ユーザー飲食店予約情報取得  
・飲食店一覧取得  
・飲食店詳細取得  
・飲食店お気に入り追加  
・飲食店お気に入り削除  
・飲食店予約情報追加  
・飲食店予約情報削除  
・飲食店検索（エリア/ジャンル/店名）  
  
・飲食店評価機能  
・予約情報変更機能実装  
・管理者権限（新規飲食店代表者登録）  
・店舗代表者権限（新規飲食店登録、自店舗予約確認）  
  
（実装中）  
メール認証  
管理画面からのメール送信  
シンボリックリンクを使用した画像保存  
タスクスケジューラを使用したリマインド機能  
QRコードの作成  
Stripeの決済機能  
Dockerの環境構築  
AWS(EC2,S3,RDS)の環境構築  
開発環境と本番環境の切り分け  

## デモ：Demo
（作成中）

## 使い方：Usage
ユーザー：以下の通り  
・登録画面からユーザー登録（http://127.0.0.1:8000/register）    
・ログインページからログイン（http://127.0.0.1:8000/login）  
・ハンバーガーメニューからログアウト  
・飲食店一覧ページで飲食店の検索、飲食店のお気に入り登録/解除、飲食店の詳細情報ページへ遷移 （http://127.0.0.1:8000/）  
・飲食店詳細ページから来店予約（http://127.0.0.1:8000/detail/{shop_id?}）  
・マイページで予約の確認・変更、お気に入り飲食店の表示とお気に入り解除（'Mypage' http://127.0.0.1:8000/mypage）  
・評価ページで予約した飲食店の評価（http://127.0.0.1:8000/review/{shop_id?}）  
・登録画面からユーザー登録（http://127.0.0.1:8000/register）  
・登録画面からユーザー登録（http://127.0.0.1:8000/register）  
  
店舗代表者：ユーザーの使い方に加え以下の通り  
・新規店舗登録ページから店舗情報を登録（http://127.0.0.1:8000/shopcreate）  
・店舗管理ページで店舗情報の変更、自店舗の予約情報の確認（http://127.0.0.1:8000/shopmanage/shop）
  
管理者：ユーザー、店舗代表者の使い方に加え以下の通り  
・店舗代表者登録ページから店舗代表者の登録、店舗代表者一覧の確認（http://127.0.0.1:8000/shopmanagers）  

## 環境：Requirement
OS：MacOS  
開発言語：PHP  
フレームワーク：Laravel  
データベース：MySQL  
バージョン管理ツール：Git  

## インストール方法：Install
（作成中）

## 注意事項：Note
（作成中）

## 文責：Author
Ufaa

## ライセンス：License
