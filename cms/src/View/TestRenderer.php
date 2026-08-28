<?php

namespace Sakana\View;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class TestRenderer {
    private $loader;
    private $twig;

    public function __construct() {
        $this->loader = new FilesystemLoader(dirname(__FILE__) . '/.');
        $this->twig = new Environment($this->loader);
    }

    public function getPage($component_data, $component_name): string {
        return $this->twig->render('Base.twig', [
            'component_data' => $component_data,
            'component_name' => $component_name,
        ]);
    }
}