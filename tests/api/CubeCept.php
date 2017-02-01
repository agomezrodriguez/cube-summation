<?php
$I = new CubeSummation($scenario);
$I->wantTo('perform operations over the cube');
$I->sendPOST('/cube', ['operation' => 'update', 'params' => [2, 2, 2, 4]]);
$I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK); // 200
$I->seeResponseIsJson();
$I->seeResponseContains('{"result":"ok"}');
