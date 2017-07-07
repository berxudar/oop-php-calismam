<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace System\database;

/**
 * Description of crud
 *
 * @author zeus
 */
class crud {

    public static $lastinserid;
    private $delete, $table, $where, $con, $getQuery, $arrayExecute = [], $findquery, $findqueryAll, $limit, $order, $dataArray, $resultadd;
    private $update;

    public function __construct() {

        $this->table = static::$table;

        $config = new config;

        $this->con = new \PDO("mysql:host=" . $config::data["dbhost"] . ";dbname=" . $config::data["dbname"] . ";charset=" . $config::data["dbcharset"], $config::data["dbuser"], $config::data["dbpass"]);
    }

    public function find($id) {


        $this->findquery = $this->con->prepare("select * from $this->table where id=:id");

        $this->findquery->bindParam("id", $id);

        $this->findquery->execute();

        return $this->findquery->fetch(\PDO::FETCH_ASSOC);
    }

    public function findAll($id) {


        $this->findqueryAll = $this->con->prepare("select * from $this->table where id=:id");

        $this->findqueryAll->bindParam("id", $id);

        $this->findqueryAll->execute();

        return $this->findqueryAll->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function get() {


        $this->getQuery = $this->con->prepare("select * from $this->table $this->where $this->order  $this->limit");

        $this->getQuery->execute($this->arrayExecute);


        return $this->getQuery->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function where($columnName, $columnValue) {


        if (!$this->where) {

            $this->where .= " where $columnName=? ";
        } else {

            $this->where .= " and $columnName=? ";
        }


        $this->arrayExecute[] = $columnValue;

        return $this;
    }

    public function limit($from, $end) {


        $this->limit = " limit $from,$end ";

        return $this;
    }

    public function asc($ascColumn = "id") {

        $this->order = " order by $ascColumn asc ";
        return $this;
    }

    public function desc($descColumn = "id") {

        $this->order = " order by $descColumn desc ";
        return $this;
    }

    public function delete() {


        $this->delete = $this->con->prepare("delete from $this->table $this->where $this->order $this->limit");

        return $this->delete->execute($this->arrayExecute);
    }

    public function rowCount() {


        $this->getQuery = $this->con->prepare("select * from $this->table $this->where $this->order  $this->limit");

        $this->getQuery->execute($this->arrayExecute);

        return $this->getQuery->rowCount();
    }

    public function add(array $data) {

        $this->dataKey = array_keys($data);
        $this->dataInsertKeys = implode(",", $this->dataKey);
        $this->dataInsertmark = implode(",", array_fill(0, count($data), "?"));

        $this->insert = $this->con->prepare("insert into $this->table ($this->dataInsertKeys) values ($this->dataInsertmark)");

        $this->resultadd = $this->insert->execute(array_values($data));

        self::$lastinserid = $this->con->lastInsertId();

        return $this->resultadd;
    }

    public function update(array $data) {


        foreach ($data as $key => $row) {

            $this->dataArray[] = "$key=?";
        }




        $this->update = $this->con->prepare("update $this->table set " . implode(",", $this->dataArray) . " $this->where ");




        $this->arrayExecute = array_merge(array_values($data), $this->arrayExecute);

        return ($this->update->execute($this->arrayExecute) == $this->update->rowCount());
    }

    public function rollBack() {


        return $this->con->rollBack();
    }

    public function commit() {


        return $this->con->commit();
    }

}
