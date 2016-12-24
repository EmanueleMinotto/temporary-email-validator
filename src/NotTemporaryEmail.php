<?php

namespace EmanueleMinotto\TemporaryEmailValidator;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class NotTemporaryEmail extends Constraint
{
    /**
     * Validation message for invalid emails.
     *
     * @var string
     */
    public $message = 'The temporary email "%email%" is not allowed.';
}
