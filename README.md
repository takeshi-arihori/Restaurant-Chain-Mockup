# レストランチェーン管理システム

このシステムは、レストランチェーンのモックデータを生成し、従業員の詳細やロケーション情報をカスタマイズすることができます。  

<img width="1483" alt="スクリーンショット 2024-06-10 21 46 53" src="https://github.com/takeshi-arihori/Restaurant-Chain-Mockup/assets/83809409/3382de14-064b-4c6f-9e8a-52030820e16c">

  
## 目次

- [インストール](#インストール)
- [レストランチェーンデータの生成](#レストランチェーンデータの生成)
- [ランダムなレストランチェーンの表示](#ランダムなレストランチェーンの表示)
- [システムについて](#システムについて)

## 前提

- Docker がインストールされていること
- Composer がインストールされていること

## インストール

1. **Docker コンテナを起動する:**

   ```sh
   docker compose up -d
   ```

   これにより、PHP、MySQL、Nginx のコンテナが起動します。

2. **リポジトリをクローンする:**

   ```sh
   git clone https://github.com/yourusername/restaurant-chain-management.git
   cd restaurant-chain-management
   ```

3. **docker 内で`faker`をインストールする:**

- [参考](https://github.com/takeshi-arihori/til/blob/main/docker/faker-php.md)

  Composer がインストールされていることを確認し、以下のコマンドを実行します:

  ```sh
  docker compose exec app bash
  cd /var/www/html
  composer require fakerphp/faker
  ```

## ランダムなレストランチェーンの表示
<img width="1449" alt="スクリーンショット 2024-06-10 21 58 01" src="https://github.com/takeshi-arihori/Restaurant-Chain-Mockup/assets/83809409/e283af3c-7a61-4f82-8c16-ce47dce86e0b">

1. ブラウザで`index.php`ファイルを開きます。
2. 「View Random Restaurant Chains」ボタンをクリックして、`displayAll.php`ページに移動します。
3. `displayAll.php`ページでは、ランダムに生成されたレストランチェーンのリストが表示されます。
4. 各レストランチェーンの「View Details」ボタンをクリックすると、詳細がモーダルウィンドウに表示されます。


## レストランチェーンデータの生成
<img width="1211" alt="スクリーンショット 2024-06-10 21 47 04" src="https://github.com/takeshi-arihori/Restaurant-Chain-Mockup/assets/83809409/a2570688-f4ec-4db5-9557-10dd37c2d47b">

1. ブラウザで`index.php`ファイルを開きます。
2. 「Generate Restaurant Chain Data」ボタンをクリックして、データ生成フォームに移動します。
3. フォームに入力します：
   - **各ロケーションの従業員数:**
        - この項目では、各レストランロケーションに何人の従業員がいるかを指定します。
        - 入力した従業員数に基づいて、指定された人数分の従業員データが各ロケーションに生成されます。
   - **従業員の給与範囲:** 従業員の給与範囲を入力します（例：30000-60000）。
        - この項目では、従業員の給与の範囲を指定します（例：30000-60000）。
        - 指定された給与範囲内で、従業員の給与がランダムに生成されます。
   - **ロケーションの数:** ロケーションの数を入力します。
        - この項目では、レストランチェーンに属するロケーションの数を指定します。
        - 指定された数のレストランロケーションが生成され、それぞれに指定された従業員数と給与範囲のデータが適用されます。
   - **郵便番号の範囲:** ロケーションの郵便番号の範囲を入力します（例：10000-99999）。
        - この項目では、各ロケーションの郵便番号の範囲を指定します（例：10000-99999）。
        - 指定された範囲内で、各ロケーションの郵便番号がランダムに生成されます。
   - **ファイル形式を選択:** 生成するデータのファイル形式を選択します（HTML、JSON、TXT、Markdown）。
        - この項目では、生成するデータのファイル形式を選択します。選択肢には以下が含まれます：
          - **HTML:** データを HTML 形式で生成し、ブラウザで読みやすい形式で表示します。
          - **JSON:** データを JSON 形式で生成し、他のアプリケーションとのデータ交換や API レスポンスとして利用できます。
          - **TXT:** データをテキスト形式で生成し、簡単に読み取れるプレーンテキストで提供します。
          - **Markdown:** データを Markdown 形式で生成し、Markdown 対応のエディタやビューアで見やすく表示できます。
4. 「Generate File」ボタンをクリックして、フォームを送信し、ファイルを生成します。


フォームに必要な情報を入力し、「Generate File」ボタンをクリックすると、指定された条件に基づいてレストランチェーンのモックデータが生成されます。その後、選択したファイル形式（HTML、JSON、TXT、Markdown）に基づいて、生成されたデータファイルが自動的にダウンロードされます。

例えば、各ロケーションに 10 人の従業員を設定し、給与範囲を 30000 から 60000、ロケーション数を 5、郵便番号範囲を 10000 から 99999 に設定し、ファイル形式として JSON を選択した場合、以下のようなデータが生成されます：

- 各ロケーションには 10 人の従業員データが含まれる。
- 各従業員の給与は 30000 から 60000 の範囲内でランダムに決定される。
- 5 つのロケーションが生成され、それぞれのロケーションに従業員データが割り当てられる。
- 各ロケーションの郵便番号は 10000 から 99999 の範囲内でランダムに決定される。
- 生成されたデータは JSON 形式でファイルに保存され、自動的にダウンロードされる。

このように、ユーザーが指定した条件に基づいてカスタマイズされたレストランチェーンのデータを生成し、希望の形式でダウンロードすることができます。

## システムについて

レストランチェーン管理システムは、レストランチェーンデータを簡単に管理およびカスタマイズできるシステムです。このシステムは、テストやデモンストレーションのためのモックデータを生成するのに役立ちます。

### 使用技術

- PHP
- Composer
- Faker（ランダムデータ生成用）
- Docker（必要に応じてコンテナ化）

### ディレクトリ構成

```
project_root/
├── vendor/
│ └── autoload.php
├── src/
│ ├── Helpers/
│ │ └── RandomGenerator.php
│ ├── Interfaces/
│ │ └── FileConvertible.php
│ ├── Models/
│ │ ├── Companies/
│ │ │ ├── Company.php
│ │ │ └── RestaurantChain.php
│ │ ├── Locations/
│ │ │ └── RestaurantLocation.php
│ │ └── User/
│ │ ├── Employee.php
│ │ └── User.php
├── index.php
├── generate.php
├── displayAll.php
├── download.php
├── composer.json
└── composer.lock
```
