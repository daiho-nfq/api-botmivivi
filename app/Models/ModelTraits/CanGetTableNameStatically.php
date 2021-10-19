<?php

namespace App\Models\ModelTraits;

trait CanGetTableNameStatically
{
    public static function tableName()
    {
        return with(new static())->getTable();
    }
}
