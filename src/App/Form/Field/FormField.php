<?php

namespace App\Form\Field;

use App\Form\FormFieldType;

interface FormField
{
    public function getName(): string;

    public function getType(): FormFieldType;
}
