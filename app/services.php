<?php

return static function(): void {
    \App\Container::register(
        \App\Template::class,
        new \App\Template(basePath: dirname(__DIR__) . '/app/templates')
    );
};
