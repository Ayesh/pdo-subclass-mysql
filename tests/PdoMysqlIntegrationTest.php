<?php

use PHPUnit\Framework\TestCase;

class PdoMysqlIntegrationTest extends TestCase {
    public function testConnection(): void {
        $connection = new PdoMysql(getenv('DB_DSN'), getenv('DB_USER'), getenv('DB_PASSWORD'));
        $this->assertInstanceOf(PdoMysql::class, $connection);

        $connection = PdoMysql::connect(getenv('DB_DSN'), getenv('DB_USER'), getenv('DB_PASSWORD'));
        $this->assertInstanceOf(PdoMysql::class, $connection);

        $this->expectException(PDOException::class);
        PdoMysql::connect(getenv('DB_DSN'), getenv('DB_USER') . 'a', getenv('DB_PASSWORD'));
    }
}
