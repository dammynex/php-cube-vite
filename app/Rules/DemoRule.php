<?php

namespace App\Rules;

use Cube\Helpers\InputValidator\InputValidatorItem;
use Cube\Interfaces\InputValidatorRuleInterface;

class DemoRule implements InputValidatorRuleInterface
{

    private static $defaultMessage = '';

    public static function rule(InputValidatorItem $item, ?string $message = null)
    {
        //handle rule
        $value = $item->getInput()->getValue();
    }
}