# PDO MySQL Subclass Polyfill

[![Latest Stable Version](http://poser.pugx.org/polyfills/polyfills/pdo-mysql-subclass/v)](https://packagist.org/packages/polyfills/pdo-mysql-subclass) [![License](http://poser.pugx.org/polyfills/pdo-mysql-subclass/license)](https://packagist.org/packages/polyfills/pdo-mysql-subclass) [![PHP Version Require](http://poser.pugx.org/polyfills/pdo-mysql-subclass/require/php)](https://packagist.org/packages/polyfills/pdo-mysql-subclass)

Provides user-land PHP polyfills for the MySQL subclass provided by PHP 8.4.

Supports PHP 8.1, 8.2, and 8.3

## Installation

```bash
composer require polyfills/pdo-mysql-subclass
```

## Usage

Use the provided `PdoMysql` class to replace `PDO` MySQL connections.

```php
$mysqlConnection = new PdoMysql(
    'mysql:host=localhost;dbname=phpwatch;charset=utf8mb4;port=33066',
    '<username>',
    '<password>',
);
```

```php
$mysqlConnection = PdoMysql::connect(
    'mysql:host=localhost;dbname=phpwatch;charset=utf8mb4;port=33066',
    '<username>',
    '<password>',
);
```

This polyfill adds class-constants to `PdoMysql` class to match all of the `PDO::MYSQL_` constants. For example, `PDO::MYSQL_ATTR_SSL_CERT` is identical to `PdoMysql::ATTR_SSL_CERT`.

## Contributions

Contributions are welcome either as a GitHub issue or a PR to this repo.

