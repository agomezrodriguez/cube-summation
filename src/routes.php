<?php
// Routes

$app->post('/cube', function (\Slim\Http\Request $request, \Slim\Http\Response $response) {

    $this->logger->info("Cube '/' route");

    $input = $request->getParsedBody();

    $cubeOperation = new \Cube\Services\CubeOperation($input);

    if ($cubeOperation->isValid()) {
        $result = $cubeOperation->execute();
        return $response->write(json_encode(["result" => $result]));
    }
});
