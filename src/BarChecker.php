<?php

declare(strict_types=1);


namespace App;


class BarChecker
{

    public function verify(string $bar): bool
    {
        return $bar === 'bar';
    }
}
