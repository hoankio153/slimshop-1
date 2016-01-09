<?php
// Routes

$app->get('/', 'App\Controller\HomeController:dispatch');


$app->get('/product', 'App\Controller\ShopController:productAction');

$app->get('/product/{slug}', 'App\Controller\ShopController:productDetailAction');

$app->get('/product/category/{category}','App\Controller\ShopController:productCategoryAction');






