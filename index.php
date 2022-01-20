<?php 
session_start();
require __DIR__ .'/vendor/autoload.php';

use Reboot\Model\User;
use \Slim\Factory\AppFactory;
use \Reboot\Page;
use \Reboot\PageAdmin;
use \Reboot\Model\Category;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

$app = AppFactory::create();

$app->addRoutingMiddleware();

$middleware = $app->addErrorMiddleware(true,true,true);

$app->get('/', function(Request $_request, Response $response, $args) {
   
   $page = new Page();

   $page->setTpl("index");

   return $response;

});

$app->get('/admin', function(Request $_request, Response $response, $args) {
   
    User::verifyLogin();
    
    $page = new PageAdmin();
 
    $page->setTpl("index");
 
    return $response;
 
 });

 $app->get('/admin/login', function(Request $_request, Response $response, $args) {
   
    $page = new PageAdmin([
        "header"=>false,
        "footer"=>false
    ]);
 
    $page->setTpl("login");
 
    return $response;
 
 });

 $app->post('/admin/login', function() {
   
    User::login($_POST["login"], $_POST["password"]);

    header("Location: /admin");
    exit;
 
 });

 $app->get('/admin/logout', function() {

	User::logout();

	header("Location: /admin/login");
	exit;

});

$app->get("/admin/users", function(Request $_request, Response $response, $args) {

	User::verifyLogin();

   $users = User::listAll();

   $page = new PageAdmin();

	$page->setTpl("users", array(
      "users"=>$users
   ));

   return $response;

});

$app->get("/admin/users/create", function(Request $_request, Response $response, $args) {

	User::verifyLogin();

	$page = new PageAdmin();

	$page->setTpl("users-create");

	return $response;

});

$app->delete('/admin/users/{$iduser}', function(Request $_request, Response $response, $args) {

	User::verifyLogin();	

	$user = new User();

	$user->get((int)['{$iduser']);

	$user->delete();

	header("Location: /admin/users");
   return $response;
	exit;
   

});

$app->get("/admin/users/[{:iduser}]", function($iduser) {

	User::verifyLogin();

   $user = new User();

   $user->get((int)$iduser);

	$page = new PageAdmin();

	$page->setTpl("users-update", array(
      "user"=>$user->getValues()
   ));


});

$app->post("/admin/users/create", function(Request $_request, Response $response, $args) {

	User::verifyLogin();

   $user = new User();

   $_POST["inadmin"] = (isset($_POST["inadmin"]))?1:0;

   $user->setData($_POST);

   $user->save();

   header("Location: /admin/users");
   exit;

   return $response;

   
});

$app->post("/admin/users/:iduser", function($iduser) {

	User::verifyLogin();

   $user = new User();

   $_POST["inadmin"] = (isset($_POST["inadmin"]))?1:0;

   $user->get((int)$iduser);

   $user->setData($_POST);

   $user->update();

   header("Location: /admin/users");

});

$app->get("/admin/categories", function(Request $_request, Response $response, $args) {

   $categories = Category::listAll();

	$page = new PageAdmin();

	$page->setTpl("categories",[
      'categories'=>$categories
   ]);

   return $response;

});

$app->get("/admin/categories/create", function(Request $_request, Response $response, $args) {

	$page = new PageAdmin();

	$page->setTpl("categories-create");

   return $response;

});

$app->post("/admin/categories/create", function() {

	$category = new Category();

   $category->setData($_POST);

   $category->save();

   header('Location: /admin/categories');
   exit;

});

$app->run();

 ?>