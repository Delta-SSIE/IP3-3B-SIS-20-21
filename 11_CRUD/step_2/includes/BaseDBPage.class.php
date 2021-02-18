<?php


abstract class BaseDBPage extends BasePage
{
    protected ?PDO $pdo;

    protected function setUp(): void
    {
        parent::setUp();
        $this->pdo = DB::getConnection();
    }
}