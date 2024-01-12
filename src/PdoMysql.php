<?php
class PdoMysql extends PDO {

    public const ATTR_USE_BUFFERED_QUERY = PDO::MYSQL_ATTR_USE_BUFFERED_QUERY;

    /** @cvalue PDO_MYSQL_ATTR_LOCAL_INFILE */
    public const ATTR_LOCAL_INFILE = PDO::MYSQL_ATTR_LOCAL_INFILE;

    /** @cvalue PDO_MYSQL_ATTR_INIT_COMMAND */
    public const ATTR_INIT_COMMAND = PDO::MYSQL_ATTR_INIT_COMMAND;

#ifndef PDO_USE_MYSQLND
    /** @cvalue PDO_MYSQL_ATTR_MAX_BUFFER_SIZE */
    #public const int ATTR_MAX_BUFFER_SIZE = PDO:;

    /** @cvalue PDO_MYSQL_ATTR_READ_DEFAULT_FILE */
    #public const int ATTR_READ_DEFAULT_FILE = UNKNOWN;

    /** @cvalue PDO_MYSQL_ATTR_READ_DEFAULT_GROUP */
    #public const int ATTR_READ_DEFAULT_GROUP = UNKNOWN;
#endif

    /** @cvalue PDO_MYSQL_ATTR_COMPRESS */
    public const ATTR_COMPRESS = PDO::MYSQL_ATTR_COMPRESS;

    /** @cvalue PDO_MYSQL_ATTR_DIRECT_QUERY */
    public const ATTR_DIRECT_QUERY = PDO::MYSQL_ATTR_DIRECT_QUERY;

    /** @cvalue PDO_MYSQL_ATTR_FOUND_ROWS */
    public const ATTR_FOUND_ROWS = PDO::MYSQL_ATTR_FOUND_ROWS;

    /** @cvalue PDO_MYSQL_ATTR_IGNORE_SPACE */
    public const ATTR_IGNORE_SPACE = PDO::MYSQL_ATTR_IGNORE_SPACE;

    /** @cvalue PDO_MYSQL_ATTR_SSL_KEY */
    public const ATTR_SSL_KEY = PDO::MYSQL_ATTR_SSL_KEY;

    /** @cvalue PDO_MYSQL_ATTR_SSL_CERT */
    public const ATTR_SSL_CERT = PDO::MYSQL_ATTR_SSL_CERT;

    /** @cvalue PDO_MYSQL_ATTR_SSL_CA */
    public const ATTR_SSL_CA = PDO::MYSQL_ATTR_SSL_CA;

    /** @cvalue PDO_MYSQL_ATTR_SSL_CAPATH */
    public const ATTR_SSL_CAPATH = PDO::MYSQL_ATTR_SSL_CAPATH;

    /** @cvalue PDO_MYSQL_ATTR_SSL_CIPHER */
    public const ATTR_SSL_CIPHER = PDO::MYSQL_ATTR_SSL_CIPHER;

#if MYSQL_VERSION_ID > 50605 || defined(PDO_USE_MYSQLND)
    /** @cvalue PDO_MYSQL_ATTR_SERVER_PUBLIC_KEY */
    public const ATTR_SERVER_PUBLIC_KEY = PDO::MYSQL_ATTR_SERVER_PUBLIC_KEY;
#endif

    /** @cvalue PDO_MYSQL_ATTR_MULTI_STATEMENTS */
    public const ATTR_MULTI_STATEMENTS = PDO::MYSQL_ATTR_MULTI_STATEMENTS;

    /** @cvalue PDO_MYSQL_ATTR_SSL_VERIFY_SERVER_CERT */
    public const ATTR_SSL_VERIFY_SERVER_CERT = PDO::MYSQL_ATTR_SSL_VERIFY_SERVER_CERT;

#if MYSQL_VERSION_ID >= 80021 || defined(PDO_USE_MYSQLND)
    /** @cvalue PDO_MYSQL_ATTR_LOCAL_INFILE_DIRECTORY */
    public const ATTR_LOCAL_INFILE_DIRECTORY = PDO::MYSQL_ATTR_LOCAL_INFILE_DIRECTORY;
#endif
    public static function connect(
        string $dsn,
        ?string $username = null,
        #[\SensitiveParameter] ?string $password = null,
        ?array $options = null
    ): static {
        return new static($dsn, $username, $password, $options);
    }
}
