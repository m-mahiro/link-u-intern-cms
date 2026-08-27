<?php
namespace Sakana\Controller;

require_once __DIR__ . '/../../vendor/autoload.php';

use Sakana\Model\TestRepository;
use Sakana\View\TestRenderer;

$test_repo = new TestRepository();
$test_render = new TestRenderer();

$data = $test_repo->select();
echo $test_render->getPage($data);