<?php

//    prams function (
//     nome da coluna,
//     tipo e numero de bits,
//     preenchimento obrigatorio,
//     AUTO_INCREMENT,
//     PRIMARY KEY
//     

namespace App\DataBase\Migrations;


class ModelPrint
{
    public function string(
        string $name,
        int|float|null $bits = null,
        bool $notNull = true,
        bool $autoIncrement = false,
        bool $primaryKey = false,
    ) {
        $ary = [
            'name' => $name,
            'varchar' => $bits,
            'not null' => $notNull,
            'auto_increment' => $autoIncrement,
            'primay key' => $primaryKey
        ];
        $props = $this->makeProps($ary);
        return $this->makeQueryColumn($ary['name'], $props);
    }

    public function int(
        string $name,
        int|float $bits = null,
        bool $notNull = true,
        bool $autoIncrement = false,
        bool $primaryKey = false,
    ) {
        $ary = [
            'name' => $name,
            'int' => $bits,
            'not null' => $notNull,
            'primary key' => $primaryKey,
            'auto_increment' => $autoIncrement,
        ];
        $props = $this->makeProps($ary);
        return $this->makeQueryColumn($ary['name'], $props);
    }

    private function makeProps($props)
    {
        $query = '';

        foreach ($props as $key => $value) {
            if ($value && is_bool($value)) {
                    $query .= ' '.$key;
            } else if ($this->validateType($key) === $key) {
                if ($value === null) {
                    $query .= $key;
                } else {
                    $query .= $key . '(' . $value . ')';
                }
            }
        }

        return $query;
    }

    private function validateType($type)
    {
        switch ($type) {
            case 'varchar':
                return $type;
                break;
            case 'int':
                return $type;
                break;
        }
    }

    private function makeQueryColumn($name, $props)
    {
        return $name . ' ' . $props;
    }
}
