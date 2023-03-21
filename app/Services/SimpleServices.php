<?php

namespace App\Services;

class SimpleServices
{
    public function log($string): void
    {
        logger($string);
    }
}
