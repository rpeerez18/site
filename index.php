<?php 
session_start();
require __DIR__ .'/vendor/autoload.php';

use Reboot\Model\User;
use \Slim\Factory\AppFactory;
use \Reboot\Page;
use \Reboot\PageAdmin;
use \Reboot\Model\Participants;
use \Reboot\Model\Videos;
use \Reboot\Model\News;
use \Reboot\Model\Projects;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

$app = AppFactory::create();

$app->addRoutingMiddleware();

$middleware = $app->addErrorMiddleware(true,true,true);

$app->get('/', function(Request $_request, Response $response, $args) {
   
   $page = new Page();

   $news = News::listAll();

   $projects = Projects::listAll();

   $page->setTpl("index",[
      'news'=>News::checkList($news),
      'projects'=>Projects::checkList($projects)

  ]);

   return $response;

});

$app->get('/projetos', function(Request $_request, Response $response, $args) {
   
   $page = new Page();

   $projects = Projects::listAll();
   
	$page->setTpl("projetos",[
      'projects'=>Projects::checkList($projects)
   
   ]);

   return $response;

});

$app->get('/noticias', function(Request $_request, Response $response, $args) {
   
   $page = new Page();

   $news = News::listAll();

   $page->setTpl("noticias",[
      'news'=>News::checkList($news)

  ]);

   return $response;

});

$app->get('/tutorial', function(Request $_request, Response $response, $args) {
   
   $page = new Page();

   $videos = Videos::listAll();

   $page->setTpl("tutorial", [
      'videos'=>Videos::checkList($videos)
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

 $app->post('/admin/login', function(Request $_request, Response $response, $args) {
   
    User::login($_POST["login"], $_POST["password"]);

   return $response->withHeader('Location', '/admin')->withStatus(200);
   exit;
   
 });

 $app->get('/admin/logout', function(Request $_request, Response $response, $args) {

	User::logout();

   return $response->withHeader('Location', '/admin/login')->withStatus(200);
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

$app->post("/admin/users/create", function(Request $_request, Response $response, $args) {

	User::verifyLogin();

   $user = new User();

   $_POST["inadmin"] = (isset($_POST["inadmin"]))?1:0;

   $user->setData($_POST);

   $user->save();

   return $response->withHeader('Location', '/admin/users')->withStatus(200);
   exit;
   
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

$app->get("/admin/participants", function(Request $_request, Response $response, $args) {

   User::verifyLogin();
   
   $participants = Participants::listAll();

	$page = new PageAdmin();

	$page->setTpl("participants", [
      'participants'=>$participants
   ]);

   return $response;

});

$app->get("/admin/participants/create", function(Request $_request, Response $response, $args) {

	User::verifyLogin();
   
   $page = new PageAdmin();

   $projects = Projects::listAll();

	$page->setTpl("participants-create",[
      'projects'=>$projects
   ]);

   return $response;

});

$app->post("/admin/participants/create", function(Request $_request, Response $response, $args) {

	$participants = new Participants();

   $participants->setData($_POST);

   $participants->save();

   return $response->withHeader('Location', '/admin/participants')->withStatus(200);
   exit;

});

$app->get('/admin/participants/{idparticipants}/delete', function(Request $_request, Response $response, $args) {

	$participants = new Participants();

	$idparticipants = $args['idparticipants'];

   $participants->get((int) $idparticipants);

	$participants->delete();

   return $response->withHeader('Location', '/admin/participants')->withStatus(200);
	exit;
   
});

$app->post("/admin/participants/{idparticipants}", function(Request $_request, Response $response, $args) {

   User::verifyLogin();
   
   $participants = new Participants();
   
   $idparticipants = $args['idparticipants'];
	
   $participants->get((int)$idparticipants);

   $participants->setData($_POST);

   $participants->save();

   return $response->withHeader('Location', '/admin/participants')->withStatus(200);

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

   if(isset($_FILES["file"]["name"]) && !empty($_FILES["file"]["name"])){

      $news->setPhoto($_FILES["file"]);

   }
  
   return $response->withHeader('Location', '/admin/news')->withStatus(200);

});

$app->get('/admin/news/{idnews}/delete', function(Request $_request, Response $response, $args) {

	$news = new News();

	$idnews = $args['idnews'];

   $news->get((int) $idnews);

	$news->delete();

   return $response->withHeader('Location', '/admin/news')->withStatus(200);
	exit;
   
});

$app->get("/admin/news/{idnews}", function(Request $_request, Response $response, $args) {

   User::verifyLogin();
   
   $news = new News();
   
   $idnews = $args['idnews'];

   $news->get((int) $idnews);

   $page = new PageAdmin();
   
   $page->setTpl("news-update", array(
     "news"=>$news->getValues()
   ));

   return $response;
  
});

$app->post("/admin/news/{idnews}", function(Request $_request, Response $response, $args) {

   User::verifyLogin();
   
   $news = new News();
   
   $idnews = $args['idnews'];
	
   $news->get((int)$idnews);

   $news->setData($_POST);

   $news->save();
 
   if(isset($_FILES["file"]["name"]) && !empty($_FILES["file"]["name"])){

      $news->setPhoto($_FILES["file"]);

   } 

   return $response->withHeader('Location', '/admin/news')->withStatus(200);

});

$app->get("/admin/videos", function(Request $_request, Response $response, $args) {

   User::verifyLogin();
   
   $videos = Videos::listAll();

	$page = new PageAdmin();

	$page->setTpl("videos",[
      'videos'=>Videos::checkList($videos)
      
   ]);

   return $response;

});

$app->get("/admin/videos/create", function(Request $_request, Response $response, $args){

	User::verifyLogin();

	$page = new PageAdmin();

	$page->setTpl("videos-create");
   
   return $response;
   
});

$app->post("/admin/videos/create", function(Request $_request, Response $response, $args){

	User::verifyLogin();

	$videos = new Videos();

	$videos->setData($_POST);

	$videos->save();

   $videos->setPdf($_FILES['despdf']);

   return $response->withHeader('Location', '/admin/videos')->withStatus(200);

});

$app->get('/admin/videos/{idvideo}/delete', function(Request $_request, Response $response, $args) {

	$videos = new Videos();

	$idvideo = $args['idvideo'];

   $videos->get((int) $idvideo);

	$videos->delete();

   return $response->withHeader('Location', '/admin/videos')->withStatus(200);
	exit;
   
});

$app->get("/admin/projects", function(Request $_request, Response $response, $args) {

   User::verifyLogin();
   
   $projects = Projects::listAll();

	$page = new PageAdmin();

	$page->setTpl("projects",[
      'projects'=>$projects
   ]);

   return $response;

});

$app->get("/admin/projects/create", function(Request $_request, Response $response, $args){

	User::verifyLogin();

	$page = new PageAdmin();

	$page->setTpl("projects-create");
   
   return $response;
   
});

$app->post("/admin/projects/create", function(Request $_request, Response $response, $args){

	User::verifyLogin();

	$projects = new Projects();

	$projects->setData($_POST);

	$projects->save();

   $projects->setPdf($_FILES['despdf']);


   if(isset($_FILES["file"]["name"]) && !empty($_FILES["file"]["name"])){

      $projects->setPhoto($_FILES["file"]);

   }
   

   return $response->withHeader('Location', '/admin/projects')->withStatus(200);

});

$app->get('/admin/projects/{idprojects}/delete', function(Request $_request, Response $response, $args) {

	$projects = new Projects();

	$idprojects = $args['idprojects'];

   $projects->get((int) $idprojects);

	$projects->delete();

   return $response->withHeader('Location', '/admin/projects')->withStatus(200);
	exit;
   
});

$app->get("/admin/projects/{idprojects}", function(Request $_request, Response $response, $args) {

   User::verifyLogin();
   
   $projects = new Projects();
   
   $idprojects = $args['idprojects'];

   $projects->get((int) $idprojects);

   $page = new PageAdmin();
   
   $page->setTpl("projects-update", array(
     "projects"=>$projects->getValues(),
     "pdf"=>$projects->getPdfPath()
   ));

   return $response;
  
});

$app->post("/admin/projects/{idprojects}", function(Request $_request, Response $response, $args) {

   User::verifyLogin();
   
   $projects = new Projects();
   
   $idprojects = $args['idprojects'];
	
   $projects->get((int)$idprojects);

   $projects->setData($_POST);

   $projects->save();
   
   if(isset($_FILES["file"]["name"]) && !empty($_FILES["file"]["name"])){

      $projects->setPhoto($_FILES["file"]);

   } 

   $projects->setPdf($_FILES['despdf']);

   return $response->withHeader('Location', '/admin/projects')->withStatus(200);

});




$app->run();

 ?>