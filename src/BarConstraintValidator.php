<?php

declare(strict_types=1);

namespace App;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;
use Symfony\Component\Validator\Exception\UnexpectedValueException;

class BarConstraintValidator extends ConstraintValidator
{

    public function validate(mixed $value, Constraint $constraint): void
    {
        if ( ! $constraint instanceof BarConstraint) {
            throw new UnexpectedTypeException($constraint, BarConstraint::class);
        }

        if (null === $value || '' === $value) {
            return;
        }

        if ( ! is_string($value)) {
            throw new UnexpectedValueException($value, 'string');
        }

        if ($value === 'bar') {
            return;
        }

        $this->context->buildViolation($constraint->message)
                      ->setParameter('{{ nif }}', $value)
                      ->addViolation();
    }
}
