<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$app->get('/', 'IndexController@showIndex');//主页
$app->get('/evaluation', 'EvaluationController@showIndex');//职业测评
$app->get('/introduce', 'IntroduceController@showIndex');//职业介绍
$app->get('/study', 'StudyController@showIndex');//学习提升
