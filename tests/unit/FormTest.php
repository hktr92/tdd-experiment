<?php

namespace AppUnitTest;

use App\Form\Form;
use App\Form\FormMethod;

final class FormTest extends AppTestCase
{
    public function testFormCanBeInstantiatedAndProducesBasicHtmlForm(): void
    {
        $form = new Form('/doStuff', FormMethod::Post);
        $this->assertHtmlContainsSelector($form->render(), 'form[action="/doStuff"][method="POST"]');
    }

    public function testFormHasTextInput(): void
    {
        $form = new Form('/doStuff', FormMethod::Post);
        $form->addField(name: 'first_name');
        $this->assertHtmlContainsSelector($form->render(), 'input[type="text"][name="first_name"]');
    }
}
