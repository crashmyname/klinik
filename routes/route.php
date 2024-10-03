<?php
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

handleMiddleware();

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

$route->get('/testi', function() use ($pemakaianController){
    $pemakaianController->test();
});

// HOME
$route->get('/home', function() use ($homeController){
    AuthMiddleware::checkLogin();
    $homeController->index();
});

// OBAT
$route->get('/obat', function() use ($obatController){
    $obatController->obat();
});
$route->post('/obat', function() use ($obatController, $request){
    $obatController->addObat($request);
});
$route->post('/uobat', function() use ($obatController, $request){
    $id = $request->id;
    $obatController->updateObat($request,$id);
});
$route->post('/sobat', function() use ($stockController, $request){
    $stockController->addStock($request);
});
$route->post('/dobat', function() use ($obatController, $request){
    $id = base64_decode($request->id);
    $obatController->deleteObat($id);
});
$route->get('/pemakaian-obat', function() use ($pemakaianController){
    $pemakaianController->pemakaian();
});
$route->get('/data-alat', function() use ($alatController){
    $alatController->alat();
});
$route->get('/data-user', function() use ($userController, $request){
    $userController->index($request);
});
$route->get('/data-hw', function() use ($hwController){
    $hwController->hw();
});
$route->get('/data-mcu', function() use ($mcuController){
    $mcuController->mcu();
});
$route->get('/getobat', function() use ($obatController){
    $obatController->getObat();
});

// User
$route->get('/user', function() use ($userController) {
    AuthMiddleware::checkLogin(); //<-- Cara pemanggilannya
    $userController->index();
});

// Menjalankan route
// echo "Dispatching route...<br>";
$route->dispatch();
?>