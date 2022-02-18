<?php 

namespace Reboot\Model;

use \Reboot\DB\Sql;
use \Reboot\Model;
use \Reboot\Mailer;

class Videos extends Model {

	public static function listAll()
	{

		$sql = new Sql();

		return $sql->select("SELECT * FROM tb_video ORDER BY idvideo");

	}

	public function save()
	{

		$sql = new Sql();

		$results = $sql->select("CALL sp_video_save(:idvideo, :title, :urlvideo)", array(
			":idvideo"=>$this->getidvideo(),
			":title"=>$this->gettitle(),
            ":urlvideo"=>$this->geturlvideo()
		));

		$this->setData($results[0]);

	}

	public function get($idvideo)
	{

		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_video WHERE idvideo = :idvideo", [
			':idvideo'=>$idvideo
		]);

		$this->setData($results[0]);

	}

	public function delete()
	{

		$sql = new Sql();

		$sql->query("DELETE FROM tb_video WHERE idvideo = :idvideo", [
			':idvideo'=>$this->getidvideo()
		]);

	
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
			"videos" . DIRECTORY_SEPARATOR . 
			$this->getidvideo() . ".pdf";
		
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
			"videos" . DIRECTORY_SEPARATOR . 
			$this->getidvideo() . ".pdf"
			)) {

			$url = "/res/site/pdf/videos/" . $this->getidvideo() . ".pdf";

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
			"videos" . DIRECTORY_SEPARATOR . 
			$this->getidvideo() . ".pdf"
			)) {

			return "/res/site/pdf/videos/" . $this->getidvideo() . ".pdf";

		} else {

			return "";

		}

	}

	public static function checkList($list)
	{

		foreach ($list as &$row) {
			
			$p = new Videos();
			$p->setData($row);
			$row = $p->getValues();

		}

		return $list;

	}

	public function getValues()
	{

		$this->checkPdf();

		$values = parent::getValues();
	
		return $values;

	}


}

 ?>