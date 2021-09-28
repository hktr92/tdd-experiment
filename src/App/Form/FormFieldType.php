<?php

namespace App\Form;

enum FormFieldType: string
{
    case Textarea = 'textarea';
    case Text = 'text';
    case Email = 'email';
    case Checkbox = 'checkbox';
}
