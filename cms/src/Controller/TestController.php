<?php
namespace Sakana\Controller;

require_once __DIR__ . '/../../vendor/autoload.php';

use Sakana\Model\TestRepository;
use Sakana\View\TestRenderer;

$test_repo = new TestRepository();
$test_render = new TestRenderer();

$request_uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

switch ($request_uri) {
    case '/':
    case '/table': {
        $data = $test_repo->select();
        echo $test_render->getPage($data, 'TestList');
        break;
    }
    case '/postForm': {
        $data = null;
        if (isset($_GET['id'])) {
            $data = $test_repo->fetch($_GET['id']);
        }
        echo $test_render->getPage($data, 'TestForm');
        break;
    }
    default: {
        http_response_code(404);
        echo "404 Not Found";
        break;
    }
}

