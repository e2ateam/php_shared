<?php

namespace E2ateam\Shared\Validator;

use E2ateam\Shared\Entity\Entity;

interface ValidatorInterface
{
    public function validate(Entity $entity): void;
}
