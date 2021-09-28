<?php

namespace App\Form;

use App\Container;
use App\Form\Field\FormField;
use App\Form\Field\InputField;
use App\Template;
use Generator;

final class Form
{
    /**
     * @psalm-var FormField[]
     */
    private array $fields = [];

    /**
     * @psalm-var array<"input"|"textarea", FormField[]>
     */
    private array $innerFields = [];

    public function __construct(
        private readonly string $action,
        private readonly FormMethod $method,
    ) {
    }

    public function render(): string
    {
        foreach ($this->iterateFields() as $field) {
            $templateType = match ($field->getType()) {
                FormFieldType::Textarea => 'textarea',
                default => 'input'
            };

            if (!isset($this->innerFields[$templateType])) {
                $this->innerFields[$templateType] = [];
            }

            $this->innerFields[$templateType][] = $field;
        }

        /** @psalm-var Template $template */
        $template = Container::get(Template::class);
        return $template->render(
            'form.html.twig',
            context: [
                'form' => $this
            ]
        );
    }

    public function addField(string $name, FormFieldType $type = FormFieldType::Text): void
    {
        $this->fields[] = new InputField($name, $type);
    }

    public function getAction(): string
    {
        return $this->action;
    }

    public function getMethod(): FormMethod
    {
        return $this->method;
    }

    /**
     * @psalm-return array<"input"|"textarea", FormField[]>
     */
    public function getFields(): array
    {
        return $this->innerFields;
    }

    /**
     * @psalm-return Generator<FormField>
     */
    private function iterateFields(): Generator
    {
        foreach ($this->fields as $field) {
            yield $field;
        }
    }
}
