<?php

namespace EmanueleMinotto\TemporaryEmailValidator;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

/**
 * Validator for temporary emails.
 */
class NotTemporaryEmailValidator extends ConstraintValidator
{
    /**
     * {@inheritdoc}
     */
    public function validate($value, Constraint $constraint)
    {
        if (empty(trim($value))) {
            return;
        }

        $domains = json_decode(
            file_get_contents(__DIR__.'/../data/domains.json'),
            true
        );

        foreach ($domains as $domain) {
            if (preg_match('/@'.preg_quote($domain).'$/', $value)) {
                $this->context->addViolation($constraint->message, [
                    '%email%' => $value,
                    '%domain%' => $domain,
                ]);

                return;
            }
        }
    }
}
