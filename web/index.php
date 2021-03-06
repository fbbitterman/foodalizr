<?php

$config = include '../src/config.php';

require_once implode(DIRECTORY_SEPARATOR, array(
    dirname(__FILE__), '..', 'src', 'autoload.php'
));

$db = new \mysqli($config['db']['host'], $config['db']['user'],
    $config['db']['password'], $config['db']['name']);
$db->query('SET NAMES utf8;');
$mapperFactory = new \Foodalizr\Model\MapperFactory($db);

$request = new \Knid\Http\Request(array(
    'cookie' => $_COOKIE,
    'env' => $_ENV,
    'files' => $_FILES,
    'get' => $_GET,
    'post' => $_POST,
    'server' => $_SERVER,
));
$response = new \Knid\Http\Response();
$response->addHeader(new \Knid\Http\Header('Content-Type', 'text/html; charset=utf-8'));
$response->setContent('<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
    <title>Foodalizr</title>
</head>
<body>

<p>
    <button class="add meal-add">Essen</button>
    <button class="add person-add">Person</button>
</p>

</body>
</html>');
$response->send();
