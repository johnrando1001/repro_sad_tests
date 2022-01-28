<?php

declare(strict_types=1);

namespace Test;

use App\BarConstraint;
use App\BarConstraintValidator;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

/**
 * @coversNothing
 */
class ValidationTest extends \PHPUnit\Framework\TestCase
{

    public function testInvalidStringBuildsViolation(): void
    {
        $validator            = new BarConstraintValidator();
        $executionContextMock = $this->createMock(ExecutionContextInterface::class);
        $executionContextMock
            ->expects($this->once())->method('buildViolation');

        $validator->initialize($executionContextMock);

        $validator->validate('foo', $this->createMock(BarConstraint::class));
    }

    public function testValidNifDoesNotBuildViolation(): void
    {
        $validator            = new BarConstraintValidator();
        $executionContextMock = $this->createMock(ExecutionContextInterface::class);
        $executionContextMock
            ->expects($this->never())->method('buildViolation');

        $validator->initialize($executionContextMock);

        $validator->validate('bar', $this->createMock(BarConstraint::class));
    }

}
