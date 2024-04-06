<?php
namespace App\Core\Database;

use mysqli;


class QueryBuilder
{
    private mysqli $mysqli;
    private string $sql = "SELECT ";
    public function __construct()
    {
        $this->mysqli ??= Connection::make($GLOBALS['config']['database']);
    }

    public function select($columns)
    {
        if ($columns == "*") {
            $this->sql .= " * ";
            return $this;
        }
        $sql = " ";
        foreach ($columns as $key => $value) {
            if (!is_numeric($key)) {
                $sql .= "$key AS `$value`, ";
            } else {
                $sql .= "$value , ";
            }
        }
        $sql = rtrim($sql, ", ");
        $this->sql .= $sql;
        return $this;
    }
    public function from($table)
    {
        $this->sql .= " FROM `$table`";
        return $this;
    }
    public function join($table, $condition, $type = "INNER")
    {
        $this->sql .= " $type JOIN `$table` ON $condition";
        return $this;
    }

    public function where($column, $operator, $value)
    {
        if ($operator === "IN") {
            $this->sql .= " WHERE $column $operator $value";
            return $this;
        }
        $this->sql .= " WHERE $column $operator '$value'";
        return $this;
    }

    public function andWhere($column, $operator, $value)
    {
        $this->sql .= " AND ";
        return $this->where($column, $operator, $value);
    }


    public function orWhere($column, $operator, $value)
    {
        $this->sql .= " OR ";
        return $this->where($column, $operator, $value);

    }
    public function orderBy($column, $direction = "ASC")
    {
        $this->sql .= " ORDER BY $column $direction";
        return $this;
    }

    public function limit($limit, $offset = 0)
    {
        $this->sql .= " LIMIT $offset, $limit";
        return $this;
    }

    public function __toString()
    {
        return $this->sql;
    }
    public function get()
    {
        $result = $this->mysqli->query($this->sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    public function count()
    {
        $result = $this->mysqli->query($this->sql);
        return $result->num_rows;
    }


    public function first()
    {
        $result = $this->mysqli->query($this->sql);
        return $result->fetch_assoc();
    }
    public function parseOne($data, $options)
    {
        $root = $options["root"];
        $embeds = $options["embed"];

        $groups = [];
        foreach ($data as $column => $value) {
            $keyParts = explode(".", $column);
            if (count($keyParts) === 2) {
                $key = $keyParts[0];
                $subKey = $keyParts[1];
                if (!isset($groups[$key])) {
                    $groups[$key] = [];
                }
                $groups[$key][$subKey] = $value;
            }
        }

        $result = $groups[$root];

        foreach ($embeds as $embedKey) {
            $result[$embedKey] = $groups[$embedKey];
        }

        return $result;
    }
    public function parseMany($data, $options)
    {
        $results = [];
        $parsedData = [];
        foreach ($data as $row) {
            $parsedData[] = $this->parseOne($row, $options);
        }

        return $parsedData;
    }

}