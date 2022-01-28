<?php

declare(strict_types=1);

namespace App;

class BarConstraint extends \Symfony\Component\Validator\Constraint
{
    public string $message = "The string '{{ string }}' is not bar";
}
