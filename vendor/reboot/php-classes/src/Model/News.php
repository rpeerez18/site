<?php 

namespace Reboot\Model;

use \Reboot\DB\Sql;
use \Reboot\Model;
use \Reboot\Mailer;

class News extends Model {

	public static function listAll()
	{

		$sql = new Sql();

		return $sql->select("SELECT * FROM tb_news ORDER BY idnews");

	}

	public function save()
	{

		$sql = new Sql();

		$results = $sql->select("CALL sp_news_save(:idnews, :nameAuthor, :surname, :title, :subtitle, :textNews, :desurl)", array(
			":idnews"=>$this->getidnews(),
			":nameAuthor"=>$this->getnameAuthor(),
			":surname"=>$this->getsurname(),
			":title"=>$this->gettitle(),
			":subtitle"=>$this->getsubtitle(),
			":textNews"=>$this->gettextNews(),
			":desurl"=>$this->getdesurl()
		));
		
		$this->setData($results[0]);

	}

	
	public function get($idnews)
	{

		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_news WHERE idnews = :idnews", [
			':idnews'=>$idnews
		]);

		$this->setData($results[0]);

	}

	public function delete()
	{

		$sql = new Sql();

		$sql->query("DELETE FROM tb_news WHERE idnews = :idnews", [
			':idnews'=>$this->getidnews()
		]);

	}

}

 ?>