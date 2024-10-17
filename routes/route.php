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
use App\Controller\ApiController;

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

// API
$route->post('/emp', function() use($api,$request){
    $api->DataApiNama($request);
});
$route->post('/sect', function() use($api,$request){
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

$route->post('/encrypt-id', function() use($homeController, $request){
    $homeController->encrypt($request);
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

// PEMAKAIAN OBAT
$route->get('/pemakaian-obat', function() use ($pemakaianController){
    AuthMiddleware::checkLogin();
    $pemakaianController->pemakaian();
});
$route->post('/pemakaian-obat', function() use($pemakaianController, $request){
    AuthMiddleware::checkLogin();
    $pemakaianController->addPemakaian($request);
});
$route->post('/upemakaian-obat', function() use($pemakaianController, $request){
    AuthMiddleware::checkLogin();
    $id = $request->id;
    $pemakaianController->updatePemakaian($request, $id);
});
$route->post('/dpemakaian-obat', function() use($pemakaianController, $request){
    AuthMiddleware::checkLogin();
    // $id = base64_decode($request->id);
    $id = Crypto::decrypt($request->id);
    $pemakaianController->deletePemakaian($request, $id);
});

// Over Pemakaian
$route->get('/pemakaian-lebih', function() use($pemakaianController, $request){
    AuthMiddleware::checkLogin();
    $pemakaianController->over($request);
});
$route->post('/dover-obat', function() use($pemakaianController, $request){
    AuthMiddleware::checkLogin();
    $id = Crypto::decrypt($request->id);
    $pemakaianController->deleteOver($request,$id);
});

// ALAT
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