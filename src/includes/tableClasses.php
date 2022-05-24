<?php

class LibraryTable
{
    public $tableName;
    public $attributes;

    function __construct($tableName, $attributes)
    {
        $this->tableName = $tableName;
        $this->attributes = $attributes;
    }
}


class TableAttribute
{
    public $name;
    public $type;
    public $isNotNull;
    public $increment;
    public $primaryKey;
    public $foreignKey;


    function __construct($name, $type, $isNotNull, $increment, $primaryKey, $foreignKey)
    {
        $this->name = $name;
        $this->type = $type;
        $this->isNotNull = $isNotNull;
        $this->increment = $increment;
        $this->primaryKey = $primaryKey;
        $this->foreignKey = $foreignKey;
    }
}
