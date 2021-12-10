<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;

final class test1 extends TestCase
{
    public function testFailure(): void
    {
        $this->assertDirectoryExists('php');
        $this->assertDirectoryExists('forms');
    }
}