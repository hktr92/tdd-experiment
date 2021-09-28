<?php

use App\Form\Form;
use App\Form\FormMethod;

require_once dirname(__DIR__) . '/vendor/autoload.php';

$services = require_once dirname(__DIR__) . '/app/services.php';
$services();

$form = new Form(
    action: '/doStuff',
    method: FormMethod::Post
);

$form->addField('nume');
$form->addField('prenume');
$form->addField('adresa', \App\Form\FormFieldType::Textarea);
$form->addField('termeni_si_conditii', \App\Form\FormFieldType::Checkbox);

echo $form->render();
