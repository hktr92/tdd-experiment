<?php

namespace App\Form;

enum FormMethod: string
{
    case Post = 'POST';
    case Get = 'GET';
}
