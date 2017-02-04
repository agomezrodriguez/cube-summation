<?php
$I = new CubeSummation($scenario);
$I->wantTo('perform operations over the cube');

//TESTCASE 1

$data = json_encode([
    ['operation' => 'update', 'params' => [2, 2, 2, 4]],
    ['operation' => 'query', 'params' => [1, 1, 1, 3, 3, 3]],
    ['operation' => 'update', 'params' => [1, 1, 1, 23]],
    ['operation' => 'query', 'params' => [2, 2, 2, 4, 4, 4]],
    ['operation' => 'query', 'params' => [1, 1, 1, 3, 3, 3]]
]);

$I->haveHttpHeader('Content-Type', 'application/json');
$I->sendPOST('/cube', $data);
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK); // 200
$I->seeResponseIsJson();
$I->seeResponseContains('{"result":[4,4,27]}');

//TESTCASE 2

$data = json_encode([
    ['operation' => 'query', 'params' => [1, 1, 1, 69, 69, 69]],
    ['operation' => 'update', 'params' => [10, 30, 51, 191983903]],
    ['operation' => 'update', 'params' => [6, 20, 60, 88229553]],
    ['operation' => 'update', 'params' => [62, 26, 31, 450800985]],
    ['operation' => 'update', 'params' => [34, 25, 40, 861430285]],
    ['operation' => 'query', 'params' => [1, 1, 1, 69, 69, 69]],
    ['operation' => 'update', 'params' => [64, 1, 50, 101597558]],
    ['operation' => 'update', 'params' => [50, 43, 61, 536850651]],
    ['operation' => 'query', 'params' => [1, 1, 1, 69, 69, 69]],
    ['operation' => 'query', 'params' => [41, 11, 27, 47, 43, 44]],
    ['operation' => 'query', 'params' => [1, 1, 1, 69, 69, 69]]
]);

$I->haveHttpHeader('Content-Type', 'application/json');
$I->sendPOST('/cube', $data);
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK); // 200
$I->seeResponseIsJson();
$I->seeResponseContains('{"result":[0,1592444726,2230892935,0,2230892935]}');


//TESTCASE 3

$data = json_encode([
    ['operation' => 'update', 'params' => [4, 1, 3, 73285206]],
    ['operation' => 'update', 'params' => [1, 4, 2, 334945062]],
    ['operation' => 'update', 'params' => [3, 2, 1, 787241175]],
    ['operation' => 'query', 'params' => [1, 1, 1, 4, 4, 4]],
    ['operation' => 'update', 'params' => [4, 3, 1, 888356211]],
    ['operation' => 'update', 'params' => [3, 1, 4, 799748882]],
    ['operation' => 'update', 'params' => [2, 2, 3, 44988966]],
    ['operation' => 'query', 'params' => [1, 1, 1, 4, 4, 4]],
    ['operation' => 'update', 'params' => [1, 4, 1, 216992122]],
    ['operation' => 'query', 'params' => [1, 3, 2, 2, 4, 2]]
]);

$I->haveHttpHeader('Content-Type', 'application/json');
$I->sendPOST('/cube', $data);
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK); // 200
$I->seeResponseIsJson();
$I->seeResponseContains('{"result":[1195471443,2928565502,334945062]}');


