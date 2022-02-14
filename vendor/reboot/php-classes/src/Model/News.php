<?php 

namespace Reboot\Model;

use \Reboot\DB\Sql;
use \Reboot\Model;
use \Reboot\Mailer;

class News extends Model {

	public static function listAll()
	{

		$sql = new Sql();

		return $sql->select("SELECT * FROM tb_news ORDER BY idnews DESC");

	}

	public function save()
	{

		$sql = new Sql();

		$results = $sql->select("CALL sp_news_save(:idnews, :nameAuthor, :surname, :title, :subtitle, :textNews)", array(
			":idnews"=>$this->getidnews(),
			":nameAuthor"=>$this->getnameAuthor(),
			":surname"=>$this->getsurname(),
			":title"=>$this->gettitle(),
			":subtitle"=>$this->getsubtitle(),
			":textNews"=>$this->gettextNews()
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
	
	public static function checkList($list)
	{

		foreach ($list as &$row) {
			
			$p = new News();
			$p->setData($row);
			$row = $p->getValues();

		}

		return $list;

	}

	public function delete()
	{

		$sql = new Sql();

		$sql->query("DELETE FROM tb_news WHERE idnews = :idnews", [
			':idnews'=>$this->getidnews()
		]);

	}

	public function checkPhoto()
	{

		if (file_exists(
			$_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 
			"res" . DIRECTORY_SEPARATOR . 
			"site" . DIRECTORY_SEPARATOR . 
			"img" . DIRECTORY_SEPARATOR . 
			"news" . DIRECTORY_SEPARATOR . 
			$this->getidnews() . ".jpg"
			)) {

			$url = "/res/site/img/news/" . $this->getidnews() . ".jpg";

		} else {

			$url = "/res/site/img/news.jpg";

		}

		return $this->setdesphoto($url);

	}

	public function getValues()
	{

		$this->checkPhoto();

		$values = parent::getValues();
	
		return $values;

	}

	public function setPhoto($file)
	{

		$extension = explode('.', $file['name']);
		$extension = end($extension);
		
		switch ($extension) {

			case "jpg":
			case "jpeg":
			$image = imagecreatefromjpeg($file["tmp_name"]);
			break;

			case "gif":
			$image = imagecreatefromgif($file["tmp_name"]);
			break;

			case "png":
			$image = imagecreatefrompng($file["tmp_name"]);
			break;

		}
		
		$dist = $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 
			"res" . DIRECTORY_SEPARATOR . 
			"site" . DIRECTORY_SEPARATOR . 
			"img" . DIRECTORY_SEPARATOR . 
			"news" . DIRECTORY_SEPARATOR . 
			$this->getidnews() . ".jpg";
		
		imagejpeg($image, $dist);
	
		imagedestroy($image);

		$this->checkPhoto();

	}

}

 ?>