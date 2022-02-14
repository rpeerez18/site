<?php 



use Reboot\Model\User;
use \Slim\Factory\AppFactory;
use \Reboot\Page;
use \Reboot\PageAdmin;
use \Reboot\Model\Category;
use \Reboot\Model\Videos;
use \Reboot\Model\News;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;


$app = AppFactory::create();


$app->get('/', function(Request $_request, Response $response, $args) {
   
   $page = new Page();

   $news = News::listAll();

   $page->setTpl("index",[
      'news'=>News::checkList($news)

  ]);

   return $response;

});

$app->get('/projetos', function(Request $_request, Response $response, $args) {
   
   $page = new Page();

	$page->setTpl("projetos");

   return $response;

});

$app->get('/tutorial', function(Request $_request, Response $response, $args) {
   
   $page = new Page();

   $videos = Videos::listAll();

   $page->setTpl("tutorial", [
      'videos'=>$videos
   ]);

   return $response;

});

?>