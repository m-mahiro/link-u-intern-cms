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

    public function getPage($data): string {
        return $this->twig->render('Test.twig', ['data' => $data]);
    }
}