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

		$sql->query("DELETE FROM tb_categories WHERE idcategory = :idcategory", [
			':idcategory'=>$this->getidcategory()
		]);

		Category::updateFile();

	}


}

 ?>