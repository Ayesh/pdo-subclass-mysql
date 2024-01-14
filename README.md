# PDO MySQL Subclass Polyfill

[![Latest Stable Version](https://poser.pugx.org/polyfills/pdo-mysql-subclass/v)](https://packagist.org/packages/polyfills/pdo-mysql-subclass) [![License](https://poser.pugx.org/polyfills/pdo-mysql-subclass/license)](https://packagist.org/packages/polyfills/pdo-mysql-subclass) [![PHP Version Require](https://poser.pugx.org/polyfills/pdo-mysql-subclass/require/php)](https://packagist.org/packages/polyfills/pdo-mysql-subclass) ![CI](https://github.com/PHP-Polyfills/PDO-MySQL-Subclass/actions/workflows/ci.yml/badge.svg)

Provides user-land PHP polyfills for the MySQL subclass provided by PHP 8.4.

Supports PHP 8.1, 8.2, and 8.3. On PHP 8.4 and later, this polyfill is not necessary. Requires `pdo_mysql` extension compiled with `mysqlnd` (which is the default and common approach).

It is possible and safe to require this polyfill on PHP 8.4 and later. This polyfill class is autoloadable; on PHP 8.4 and later, PHP will _not_ autoload this polyfill because it's declared natively.

For more information, see [`PdoMysql`](https://php.watch/versions/8.4/pdo-driver-subclasses#PdoMysql) on [`PHP 8.4: PDO Driver-specific sub-classes: MySQL`](https://php.watch/versions/8.4/pdo-driver-subclasses)

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

### Features not implemented

 - `PDO::connect`: This method cannot be polyfilled because it's an existing PHP class that user-land PHP classes cannot modify.
 - `PdoMysql::getWarningCount`: This method is not implemented in the polfyill.

## Contributions

Contributions are welcome either as a GitHub issue or a PR to this repo.

