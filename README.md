# レストランチェーン管理システム

このプロジェクトは、レストランチェーン、そのロケーション、および従業員のモックデータを生成するための管理システムです。PHP と Faker を使用してランダムなデータを作成し、ウェブインターフェースで情報を表示します。

<img width="1576" alt="スクリーンショット 2024-06-09 19 24 13" src="https://github.com/takeshi-arihori/Restaurant-Chain-Mockup/assets/83809409/0fad5c01-da3e-49b9-b3b2-cce37b003604">
<img width="1601" alt="スクリーンショット 2024-06-09 19 24 21" src="https://github.com/takeshi-arihori/Restaurant-Chain-Mockup/assets/83809409/91a4ff2f-002c-41cd-a678-31523a0754e4">

## 目次

- [インストール](#インストール)
- [使用方法](#使用方法)
- [ディレクトリ構成](#ディレクトリ構成)
- [データの生成方法を変更する](#データの生成方法を変更する)

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

## 使用方法

アプリケーションを読み込むと、レストランチェーンのリストと基本情報が表示されます。各レストランチェーンのカードには「詳細を見る」ボタンがあり、クリックするとモーダルで詳細情報が表示されます。

表示される詳細情報には以下が含まれます:

- 文字列表現
- HTML 表現
- Markdown 表現
- 配列表現（簡略版）

## ディレクトリ構成

プロジェクトのディレクトリ構成は以下の通りです:

```
.
├── docker/
│ ├── mysql/
│ │ └── my.cnf
│ ├── nginx/
│ │ └── default.conf
│ └── php/
│ ├── Dockerfile
│ └── php.ini
├── src/
│ ├── Helpers/
│ │ └── RandomGenerator.php
│ ├── Interfaces/
│ │ └── FileConvertible.php
│ ├── Models/
│ │ ├── Companies/
│ │ │ ├── Company.php
│ │ │ └── RestaurantChain.php
│ │ ├── Location/
│ │ │ └── RestaurantLocation.php
│ │ ├── User/
│ │ ├── Employee.php
│ │ └── User.php
│ └── index.php
├── compose.yml
└── .env
```

## データの生成方法を変更する

`src/Helpers/RandomGenerator.php` ファイルのメソッドを編集して、生成するデータの数を増減させることができます。例えば、従業員の数やレストランのロケーション数を変更するには以下の部分を修正します:

```php
public static function restaurantLocation(): RestaurantLocation {
    $faker = Factory::create();

    return new RestaurantLocation(
        $faker->company,
        $faker->address,
        $faker->city,
        $faker->state,
        $faker->postcode,
        self::employees(2, 5), // 従業員の数を制限
        $faker->boolean,
        $faker->boolean
    );
}

public static function restaurantChain(): RestaurantChain {
    $faker = Factory::create();

    return new RestaurantChain(
        $faker->randomNumber(),
        self::restaurantLocations(1, 3), // 場所の数を制限
        $faker->randomElement(['Italian', 'Chinese', 'American', 'Japanese']),
        $faker->numberBetween(1, 3),
        $faker->company,
        $faker->company,
        $faker->year,
        $faker->text,
        $faker->url,
        $faker->phoneNumber,
        $faker->companySuffix,
        $faker->name,
        $faker->boolean,
        $faker->country,
        $faker->name,
        $faker->numberBetween(10, 1000)
    );
}
```

`self::employees(2, 5)` の部分で、従業員の最小数と最大数を設定しています。
`self::restaurantLocations(1, 3)` の部分で、ロケーションの最小数と最大数を設定しています。
必要に応じてこれらの数値を変更することで、生成するデータの量を調整できます。
