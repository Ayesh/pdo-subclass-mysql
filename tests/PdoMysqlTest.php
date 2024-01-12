<?php


use PHPUnit\Framework\TestCase;

class PdoMysqlTest extends TestCase {
    public function testBasics(): void {
        $this->assertTrue(class_exists(PdoMysql::class));
        $this->assertContains(PDO::class, class_parents(PdoMysql::class));
    }

    public function testContainsPdoKeys() {
        $reflector = new ReflectionClass(PDO::class);
        $constants = $reflector->getConstants(ReflectionClassConstant::IS_PUBLIC);

        foreach ($constants as $constant => $value) {
            if (str_starts_with($constant, 'MYSQL_')) {
                $classConst = preg_replace('/^MYSQL_/', '', $constant);
                $this->assertTrue(defined(PdoMysql::class . '::' . $constant));
                $this->assertSame(constant('PDO::' . $constant), constant(PdoMysql::class . '::' . $constant));
            }
        }
    }
}
