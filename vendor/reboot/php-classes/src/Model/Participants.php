<?php 

namespace Reboot\Model;

use \Reboot\DB\Sql;
use \Reboot\Model;
use \Reboot\Mailer;

class Participants extends Model {

	public static function listAll()
	{

		$sql = new Sql();

		return $sql->select("SELECT * FROM tb_participants ORDER BY idparticipants");

	}

	public function save()
	{

		$sql = new Sql();

		$results = $sql->select("CALL sp_participants_save(:idparticipants, :name, :surname)", array(
			":idparticipants"=>$this->getidparticipants(),
			":name"=>$this->getname(),
			":surname"=>$this->getsurname()
		));

		$this->setData($results[0]);

	}

	public function get($idparticipants)
	{

		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_participants WHERE idparticipants = :idparticipants", [
			':idparticipants'=>$idparticipants
		]);

		$this->setData($results[0]);

	}

	public function delete()
	{

		$sql = new Sql();

		$sql->query("DELETE FROM tb_participants WHERE idparticipants = :idparticipants", [
			':idparticipants'=>$this->getidparticipants()
		]);

	}

}
 ?>