<?php

namespace App;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use Twig\TemplateWrapper;

final class Template
{
    private readonly Environment $env;

    public function __construct(
        string $basePath
    ) {
        $this->env = new Environment(
            loader: new FilesystemLoader($basePath),
            options: []
        );
    }

    public function render(string $template, array $context = []): string
    {
        return $this->env->render(
            name: $template,
            context: $context,
        );
    }
}
