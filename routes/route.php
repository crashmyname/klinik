<?php
use App\Controller\ApiController;
session_start();
use Support\Request;
use Support\Route;
use Support\View;
use Support\CSRFToken;
use Support\AuthMiddleware; //<-- Penambahan Middleware atau session login
use Support\Crypto;
use Support\UUID;
use Support\Response;
use App\Controller\AlatController;
use App\Controller\HomeController;
use App\Controller\HwController;
use App\Controller\McuController;
use App\Controller\ObatController;
use App\Controller\PemakaianController;
use App\Controller\UserController;
use App\Controller\StockController;

$request = new Request();
$route = new Route($prefix);
handleMiddleware();
$userController = new UserController();
$obatController = new ObatController();
$pemakaianController = new PemakaianController();
$homeController = new HomeController();
$alatController = new AlatController();
$hwController = new HwController();
$mcuController = new McuController();
$stockController = new StockController();
$api = new ApiController();

handleMiddleware();

// TEST
$route->post('/test', function() use($api,$request){
    $api->DataApiNama($request);
});
$route->post('/test2', function() use($api,$request){
    $api->DataApiSect($request);
});

// Authentication
$route->get('/', function(){
    View::render('auth/login');
});
$route->get('/login', function(){
    View::render('auth/login');
});
$route->post('/login', function() use ($homeController,$request) {
    $homeController->onLogin($request);
});
$route->post('/logout', function() use ($homeController) {
    $homeController->logout();
});

// HOME
$route->get('/home', function() use ($homeController){
    AuthMiddleware::checkLogin();
    $homeController->index();
});

// OBAT
$route->get('/obat', function() use ($obatController){
    AuthMiddleware::checkLogin();
    $obatController->obat();
});
$route->post('/obat', function() use ($obatController, $request){
    AuthMiddleware::checkLogin();
    $obatController->addObat($request);
});
$route->post('/uobat', function() use ($obatController, $request){
    AuthMiddleware::checkLogin();
    $id = $request->id;
    $obatController->updateObat($request,$id);
});
$route->post('/sobat', function() use ($stockController, $request){
    AuthMiddleware::checkLogin();
    $stockController->addStock($request);
});
$route->post('/dobat', function() use ($obatController, $request){
    AuthMiddleware::checkLogin();
    $id = base64_decode($request->id);
    $obatController->deleteObat($id);
});
$route->get('/pemakaian-obat', function() use ($pemakaianController){
    AuthMiddleware::checkLogin();
    $pemakaianController->pemakaian();
});
$route->get('/data-alat', function() use ($alatController){
    AuthMiddleware::checkLogin();
    $alatController->alat();
});

// USER
$route->get('/data-user', function() use ($userController, $request){
    AuthMiddleware::checkLogin();
    $userController->index($request);
});
$route->post('/data-user', function() use($userController, $request){
    AuthMiddleware::checkLogin();
    $userController->addUser($request);
});
$route->post('/udata-user', function() use($userController, $request){
    AuthMiddleware::checkLogin();
    $id = $request->id;
    $userController->updateUser($request, $id);
});
$route->post('/ddata-user', function() use($userController, $request){
    AuthMiddleware::checkLogin();
    $id = base64_decode($request->id);
    $userController->deleteUser($id);
});

// HW
$route->get('/data-hw', function() use ($hwController){
    AuthMiddleware::checkLogin();
    $hwController->hw();
});
$route->post('/add-hw', function() use($hwController, $request){
    AuthMiddleware::checkLogin();
    $hwController->AddHw($request);
});
$route->post('/edit-hw', function() use($hwController, $request){
    AuthMiddleware::checkLogin();
    $id = $request->id;
    $hwController->UpdateHw($request,$id);
});
$route->post('/delete-hw', function() use($hwController, $request){
    AuthMiddleware::checkLogin();
    $id = $request->id;
    $hwController->deleteHw($request,$id);
});
$route->get('/data-mcu', function() use ($mcuController){
    AuthMiddleware::checkLogin();
    $mcuController->mcu();
});

// Menjalankan route
// echo "Dispatching route...<br>";
$route->dispatch();
?>