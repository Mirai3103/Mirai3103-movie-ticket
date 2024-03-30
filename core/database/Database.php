<?php

namespace App\Core\Database;

use mysqli;


class Database
{
    private static mysqli $mysqli;
    public static function init_db()
    {
        static::$mysqli = Connection::make($GLOBALS['config']['database']);
    }
    public static function insert(string $table, array $parameters)
    {
        $sql = sprintf(
            'insert into %s (%s) values (%s)',
            $table,
            implode(', ', array_keys($parameters)),
            '?' . str_repeat(', ?', count($parameters) - 1)
        );
        try {
            $statement = static::$mysqli->prepare($sql);
            $statement->execute(array_values($parameters));
            $lastId = static::$mysqli->insert_id;
            return $lastId;
        } catch (\Exception $e) {
        }
        return false;
    }

    public static function execute(string $sql, array $params)
    {
        $statement = static::$mysqli->prepare($sql);
        return $statement->execute($params);
    }

    public static function query(string $sql, array $params)
    {
        $statement = static::$mysqli->prepare($sql);
        $statement->execute($params);
        return $statement->get_result()->fetch_all(MYSQLI_ASSOC);
    }
    public static function queryOne(string $sql, array $params)
    {
        $statement = static::$mysqli->prepare($sql);
        $statement->execute($params);
        return $statement->get_result()->fetch_assoc();
    }


    public static function update(string $table, array $parameters, string $condition)
    {
        $sql = sprintf(
            'update %s set %s where %s',
            $table,
            implode(', ', array_map(fn($key) => "$key = :$key", array_keys($parameters))),
            $condition
        );
        $statement = static::$mysqli->prepare($sql);
        return $statement->execute($parameters);
    }
    public static function delete(string $table, string $condition)
    {
        $sql = sprintf(
            'delete from %s where %s',
            $table,
            $condition
        );
        $statement = static::$mysqli->prepare($sql);
        return $statement->execute();
    }

    public static function count(string $query, array $params)
    {
        $statement = static::$mysqli->prepare($query);
        $statement->execute($params);
        $result = $statement->get_result()->num_rows;
        return $result;
    }
    public static function beginTransaction()
    {
        static::$mysqli->begin_transaction();
    }
    public static function commit()
    {
        static::$mysqli->commit();
    }

    public static function rollback()
    {
        static::$mysqli->rollback();
    }

    public static function close()
    {
        static::$mysqli->close();
    }

    public static function findAll(string $table, array $columns = ['*'])
    {
        $sql = "SELECT " . implode(',', $columns) . " FROM $table";
        $statement = static::$mysqli->prepare($sql);
        $statement->execute();
        return $statement->get_result()->fetch_all(MYSQLI_ASSOC);
    }
}