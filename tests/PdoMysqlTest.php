<?php

use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class PdoMysqlTest extends TestCase {
    public function testBasics(): void {
        $this->assertTrue(class_exists(PdoMysql::class));
        $this->assertContains(PDO::class, class_parents(PdoMysql::class));
    }

    public static function pdoClassConstantKeysDataProvider(): Generator {
        $reflector = new ReflectionClass(PDO::class);
        $constants = $reflector->getConstants(ReflectionClassConstant::IS_PUBLIC);

        foreach ($constants as $constant => $value) {
            if (str_starts_with($constant, 'MYSQL_')) {
                $mysqlConstant = preg_replace('/^MYSQL_/', '', $constant);
                yield $mysqlConstant => [$constant, $mysqlConstant];
            }
        }
    }

    #[DataProvider('pdoClassConstantKeysDataProvider')]
    public function testPdoConstantsSameAsPdoMysql(string $constant, string $mysqlConstant): void {
        $this->assertTrue(defined(PdoMysql::class . '::' . $mysqlConstant), 'Check if PdoMysql::' . $mysqlConstant . ' exists');
        $this->assertSame(constant('PDO::' . $constant), constant(PdoMysql::class . '::' . $mysqlConstant), 'Check if value and type PDO::' . $constant . ' === ' . PdoMysql::class . '::' . $mysqlConstant);
    }

    public function testThrowsOnDifferentDsns(): void {
        $this->expectException(PDOException::class);
        $this->expectExceptionMessage('could not find driver');
        PdoMysql::connect('foobar:test');
    }

    public function testThrowsOnUnknownDsns(): void {
        if (!in_array('sqlite', PDO::getAvailableDrivers(), true)) {
            $this->markTestSkipped('Sqlite driver not available');
        }

        $this->expectException(PDOException::class);
        $this->expectExceptionMessage('PdoMysql::connect() cannot be called when connecting to the "sqlite" driver, either PdoSqlite::connect() or PDO::connect() must be called instead');
        PdoMysql::connect('sqlite:test');
    }
}
