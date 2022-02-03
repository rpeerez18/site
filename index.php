<?php 
session_start();
require __DIR__ .'/vendor/autoload.php';

use Reboot\Model\User;
use \Slim\Factory\AppFactory;
use \Reboot\Page;
use \Reboot\PageAdmin;
use \Reboot\Model\Category;
use \Reboot\Model\News;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

$app = AppFactory::create();

$app->addRoutingMiddleware();

$middleware = $app->addErrorMiddleware(true,true,true);

$app->get('/', function(Request $_request, Response $response, $args) {
   
   $page = new Page();

   $news = News::listAll();

   $page->setTpl("index",[
      'news'=>$news
  ]);

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

$app->get('/admin/users/{iduser}/delete', function(Request $_request, Response $response, $args) {

	User::verifyLogin();	

	$user = new User();

	$iduser = $args['iduser'];

   $user->get((int) $iduser);

	$user->delete();

   return $response->withHeader('Location', '/admin/users')->withStatus(200);
	exit;
   
});

$app->get("/admin/users/{iduser}", function(Request $_request, Response $response, $args) {

   User::verifyLogin();
   
   $user = new User();
   
   $iduser = $args['iduser'];

   $user->get((int) $iduser);

   $page = new PageAdmin();
   
   $page->setTpl("users-update", array(
     "user"=>$user->getValues()
   ));

   return $response->withHeader('Location', '/admin/users')->withStatus(200);
   exit;
  
});

$app->post("/admin/users/create", function(Request $_request, Response $response, $args) {

	User::verifyLogin();

   $user = new User();

   $_POST["inadmin"] = (isset($_POST["inadmin"]))?1:0;

   $user->setData($_POST);

   $user->save();

   return $response->withHeader('Location', '/admin/users')->withStatus(200);
   exit;
   
});


$app->post("/admin/users/{iduser}", function(Request $_request, Response $response, $args) {

   User::verifyLogin(); 

   $iduser = $args['iduser'];
	
   $user = new User();

   $_POST["inadmin"] = (isset($_POST["inadmin"]))?1:0;

   $user->get((int)$iduser);

   $user->setData($_POST);

   $user->update();

   return $response->withHeader('Location', '/admin/users')->withStatus(200);

});

$app->get("/admin/categories", function(Request $_request, Response $response, $args) {

   User::verifyLogin();
   
   $categories = Category::listAll();

	$page = new PageAdmin();

	$page->setTpl("categories",[
      'categories'=>$categories
   ]);

   return $response;

});

$app->get("/admin/categories/create", function(Request $_request, Response $response, $args) {

	User::verifyLogin();
   
   $page = new PageAdmin();

	$page->setTpl("categories-create");

   return $response;

});

$app->post("/admin/categories/create", function(Request $_request, Response $response, $args) {

	$category = new Category();

   $category->setData($_POST);

   $category->save();

   return $response->withHeader('Location', '/admin/categories')->withStatus(200);
   exit;

});

$app->get("/admin/categories/{idcategory}", function(Request $_request, Response $response, $args) {

   User::verifyLogin();
   
   $category = new Category();
   
   $idcategory = $args['idcategory'];

   $category->get((int) $idcategory);

   $page = new PageAdmin();
   
   $page->setTpl("categories-update", array(
     "category"=>$category->getValues()
   ));

   return $response;
  
});

$app->post("/admin/categories/{idcategory}", function(Request $_request, Response $response, $args) {

   User::verifyLogin();
   
   $category = new Category();
   
   $idcategory = $args['idcategory'];
	
   $category->get((int)$idcategory);

   $category->setData($_POST);

   $category->save();

   return $response->withHeader('Location', '/admin/users')->withStatus(200);

});

$app->get("/admin/news", function(Request $_request, Response $response, $args) {

   User::verifyLogin();
   
   $news = News::listAll();

	$page = new PageAdmin();

	$page->setTpl("news",[
      'news'=>$news
   ]);

   return $response;

});

$app->get("/admin/news/create", function(Request $_request, Response $response, $args){

	User::verifyLogin();

	$page = new PageAdmin();

	$page->setTpl("news-create");
   
   return $response;
   
});

$app->post("/admin/news/create", function(Request $_request, Response $response, $args){

	User::verifyLogin();

	$news = new News();

	$news->setData($_POST);

	$news->save();

   return $response->withHeader('Location', '/admin/news')->withStatus(200);

});

$app->run();

 ?>