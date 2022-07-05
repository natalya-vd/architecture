<?php

/**
 * DBConnection
 */
interface DBConnection {
  public function getConnection();
}

class MySQLDBConnection implements DBConnection
{
  public function getConnection() {}
}

class PostgreSQLDBConnection implements DBConnection
{
  public function getConnection() {}
}

class OracleDBConnection implements DBConnection
{
  public function getConnection() {}
}

/**
 * DBRecord
 */
interface DBRecord {
  public function getRecord();
}

class MySQLDBRecord implements DBRecord
{
  public function getRecord() {}
}

class PostgreSQLDBRecord implements DBRecord
{
  public function getRecord() {}
}

class OracleDBRecord implements DBRecord
{
  public function getRecord() {}
}

/**
 * DBQueryBuiler
 */
interface DBQueryBuiler {
  public function getQueryBuiler();
}

class MySQLDBQueryBuiler implements DBQueryBuiler
{
  public function getQueryBuiler() {}
}

class PostgreSQLDBQueryBuiler implements DBQueryBuiler
{
  public function getQueryBuiler() {}
}

class OracleDBQueryBuiler implements DBQueryBuiler
{
  public function getQueryBuiler() {}
}

/**
 * Абстрактная фабрика
 */
interface AbstractFactory {
  public function createDBConnection(): DBConnection;
  public function createDBRecord(): DBRecord;
  public function createDBQueryBuiler(): DBQueryBuiler;
}

/**
 * Конкретные фабрики продуктов
 */
class MySQLFactory implements AbstractFactory
{
  public function createDBConnection(): DBConnection {
    return new MySQLDBConnection();
  }

  public function createDBRecord(): DBRecord {
    return new MySQLDBRecord();
  }

  public function createDBQueryBuiler(): DBQueryBuiler {
    return new MySQLDBQueryBuiler();
  }
}

class PostgreSQLFactory implements AbstractFactory
{
  public function createDBConnection(): DBConnection {
    return new PostgreSQLDBConnection();
  }

  public function createDBRecord(): DBRecord {
    return new PostgreSQLDBRecord();
  }

  public function createDBQueryBuiler(): DBQueryBuiler {
    return new PostgreSQLDBQueryBuiler();
  }
}

class OracleFactory implements AbstractFactory
{
  public function createDBConnection(): DBConnection {
    return new OracleDBConnection();
  }

  public function createDBRecord(): DBRecord {
    return new OracleDBRecord();
  }

  public function createDBQueryBuiler(): DBQueryBuiler {
    return new OracleDBQueryBuiler();
  }
}

/**
 * Клиентский код
 */
function clientCode(AbstractFactory $factory)
{
  $DBConnection = $factory->createDBConnection();
  $DBRecord = $factory->createDBRecord();
  $DBQueryBuiler = $factory->createDBQueryBuiler();

  $DBConnection->getConnection();
  $DBRecord->getRecord();
  $DBQueryBuiler->getQueryBuiler();
}

clientCode(new PostgreSQLFactory());
