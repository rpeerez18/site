<?php 

namespace Reboot\Model;

use \Reboot\DB\Sql;
use \Reboot\Model;
use \Reboot\Mailer;

class Projects extends Model {

	public static function listAll()
	{

		$sql = new Sql();

		return $sql->select("SELECT * FROM tb_projects ORDER BY idprojects");

	}

	public function save()
	{

		$sql = new Sql();
		
		$results = $sql->select("CALL sp_projects_save(:idprojects, :title, :description, :participants, :end, :begin)", array(
			":idprojects"=>$this->getidprojects(),
			":title"=>$this->gettitle(),
			":description"=>$this->getdescription(),
			":participants"=>$this->getparticipants(),
			":end"=>$this->getend(),
			":begin"=>$this->getbegin()
			
		));
		
		$this->setData($results[0]);

	}

	
	public function get($idprojects)
	{

		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_projects WHERE idprojects = :idprojects", [
			':idprojects'=>$idprojects
		]);

		$this->setData($results[0]);

	}
	
	public static function checkList($list)
	{

		foreach ($list as &$row) {
			
			$p = new Projects();
			$p->setData($row);
			$row = $p->getValues();

		}

		return $list;

	}

	public function delete()
	{

		$sql = new Sql();

		$sql->query("DELETE FROM tb_projects WHERE idprojects = :idprojects", [
			':idprojects'=>$this->getidprojects()
		]);

	}

	public function checkPhoto()
	{

		if (file_exists(
			$_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 
			"res" . DIRECTORY_SEPARATOR . 
			"site" . DIRECTORY_SEPARATOR . 
			"img" . DIRECTORY_SEPARATOR . 
			"projects" . DIRECTORY_SEPARATOR . 
			$this->getidprojects() . ".jpg"
			)) {

			$url = "/res/site/img/projects/" . $this->getidprojects() . ".jpg";

		} else {

			$url = "/res/site/img/projects.jpg";

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
			"projects" . DIRECTORY_SEPARATOR . 
			$this->getidprojects() . ".jpg";
		
		imagejpeg($image, $dist);
	
		imagedestroy($image);

		$this->checkPhoto();

	}

	public function setPdf($file)
	{

		$extension = explode('.', $file['name']);
		$extension = end($extension);
		if ($extension = 'pdf' ) {

			$image = $file["tmp_name"];

		}
		else{

			return;

		}
		
		$dist = $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 
			"res" . DIRECTORY_SEPARATOR . 
			"site" . DIRECTORY_SEPARATOR . 
			"pdf" . DIRECTORY_SEPARATOR . 
			"projects" . DIRECTORY_SEPARATOR . 
			$this->getidprojects() . ".pdf";
		
		move_uploaded_file($image, $dist);

		$this->checkPdf();

	}

	public function checkPdf()
	{

		if (file_exists(
			$_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 
			"res" . DIRECTORY_SEPARATOR . 
			"site" . DIRECTORY_SEPARATOR . 
			"pdf" . DIRECTORY_SEPARATOR . 
			"projects" . DIRECTORY_SEPARATOR . 
			$this->getidprojects() . ".pdf"
			)) {

			$url = "/res/site/pdf/projects/" . $this->getidprojects() . ".pdf";

		} else {

			$url = "";

		}

		return $this->setdespdf($url);

	}

	public function getPdfPath()
	{
		if (file_exists(
			$_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 
			"res" . DIRECTORY_SEPARATOR . 
			"site" . DIRECTORY_SEPARATOR . 
			"pdf" . DIRECTORY_SEPARATOR . 
			"projects" . DIRECTORY_SEPARATOR . 
			$this->getidprojects() . ".pdf"
			)) {

			return "/res/site/pdf/projects/" . $this->getidprojects() . ".pdf";

		} else {

			return "";

		}

	}
	

}



 ?>