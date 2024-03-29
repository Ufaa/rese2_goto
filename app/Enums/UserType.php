<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class UserType extends Enum
{
    const Administrator = 'administrator';
    const Shopmanager = 'shopmanager';
    const Customer = 'custmer';
    const SuperAdministrator = 'super administrator';
}
