<?php

namespace App\Models\ModelTraits;

trait Unguarded
{
    public function initializeUnguarded()
    {
        self::$unguarded = true;
        $this->guarded = [];
    }
}
