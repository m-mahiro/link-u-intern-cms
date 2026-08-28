<?php
namespace Sakana\Controller;

require __DIR__ . '/../../vendor/autoload.php';

use Sakana\Model\TestRepository;

$request_body = json_decode(file_get_contents('php://input'), true);
if (isset($request_body['name']) && isset($request_body['comment'])) {
    $repo = new TestRepository();
    if (isset($request_body['id'])) {
        $repo->update($request_body);
    } else {
        $repo->insert($request_body);
    }    
}
echo 'post ok!';