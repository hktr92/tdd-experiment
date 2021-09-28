<?php

namespace App\Form\Field;

use App\Form\FormFieldType;

class InputField implements FormField
{
    public function __construct(
        private readonly string $name,
        private readonly FormFieldType $type = FormFieldType::Text,
    ) {
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getType(): FormFieldType
    {
        return $this->type;
    }
}
