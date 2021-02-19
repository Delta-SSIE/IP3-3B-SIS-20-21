<?php


class MustacheRunner
{
    private $engine;

    public function __construct() {
        $this->engine = new Mustache_Engine([
            "entity_flags" => ENT_QUOTES,
            "loader" => new Mustache_Loader_FilesystemLoader(__DIR__ . "/../" . Config::TEMPLATESDIR)
        ]);
    }

    public function render($templateName, $context = []) {
//        return $this->engine->render($this->loadTemplate($templateName), $context);
        return $this->engine->loadTemplate($templateName)->render($context);
    }

//    private function loadTemplate($templateName) {
//        return file_get_contents(__DIR__ . "/../" . Config::TEMPLATESDIR . "/{$templateName}.mustache");
//    }
}