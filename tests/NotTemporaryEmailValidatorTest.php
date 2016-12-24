<?php

namespace EmanueleMinotto\TemporaryEmailValidator;

use PHPUnit\Framework\TestCase;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

class NotTemporaryEmailValidatorTest extends TestCase
{
    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->executionContext = $this->createMock(ExecutionContextInterface::class);

        $this->validator = new NotTemporaryEmailValidator();
        $this->validator->initialize($this->executionContext);
    }

    /**
     * @param string $domain
     * @param string $value
     * @param bool   $expected
     *
     * @dataProvider valuesDataProvider
     */
    public function testValidate($domain, $value, $expected)
    {
        $constraint = new NotTemporaryEmail();

        $this->executionContext
            ->expects($this->exactly($expected ? 1 : 0))
            ->method('addViolation')
            ->with(
                $constraint->message,
                [
                    '%email%' => $value,
                    '%domain%' => $domain,
                ]
            );

        $this->validator->validate($value, $constraint);
    }

    public static function valuesDataProvider()
    {
        yield [null, null, false];
        yield [null, '', false];
        yield ['example.net', 'user@example.net', false];
        yield ['email.com', 'test@gmail.com', false];

        $values = json_decode(
            file_get_contents(__DIR__.'/../data/domains.json'),
            true
        );

        foreach ($values as $value) {
            yield [$value, 'example@'.$value, true];
        }
    }
}
