<?php
class SubArea {
	private $id_subarea;
	private $nome_subarea;
    private $descricao_subarea;
    private $id_area;
	private $con;

	public function __construct(){
		$this->con = new Conexao();
	}
	public function addSubArea($nome_subarea, $descricao_subarea, $id_area){
		$existSubArea = $this->verificaSubArea($nome_subarea);
		if(count($existSubArea) == 0){
			try{
				$this->nome_subarea = $nome_subarea;
				$this->descricao_subarea = $descricao_subarea;
				$this->id_area = $id_area;
			$sql = $this->con->conectar()->prepare("INSERT INTO subarea(nome_subarea, descricao_subarea, id_area) VALUES (:nome_subarea, :descricao_subarea, :id_area)");
			$sql->bindValue(":nome_subarea", $this->nome_subarea);
			$sql->bindValue(":descricao_subarea", $this->descricao_subarea);
			$sql->bindValue(":id_area", $this->id_area);
			$sql->execute();
			return TRUE;
			}catch(PDOException $ex){
				return 'erro: '.$ex->getMessage();
			}
		}else{
			return FALSE;
		}
	}
	public function verificaSubArea($nome_subarea){
		$sql = $this->con->conectar()->prepare("SELECT id_subarea FROM subarea WHERE nome_subarea = :nome_subarea");
		$sql->bindValue(":nome_subarea", $nome_subarea);
		$sql->execute();
		if($sql->rowCount() > 0){
			$array = $sql->fetch();
		}else{
			$array = array();
		}
		return $array;
	}
	public function listarSubArea(){
		$sql = $this->con->conectar()->prepare("SELECT * FROM subarea
											   INNER JOIN area ON (subarea.id_area = area.id_area)");
		$sql->execute();
		return $sql->fetchAll();
	}
	public function buscarSubArea($id_subarea){
		$sql = $this->con->conectar()->prepare("SELECT *,
			  (select area.nome_area from area where area.id_area = subarea.id_area) as area FROM subarea WHERE id_subarea = :id_subarea");
		$sql->bindValue(':id_subarea', $id_subarea);
		$sql->execute();

		if($sql->rowCount() > 0){
			return $sql->fetch();
		}else{
			return array();
		}
	}
	public function buscarSubareaNome($id){
		$sql = $this->con->conectar()->prepare("SELECT nome_subarea FROM subarea WHERE id_subarea = :id_subarea");
		$sql->bindValue(':id_subarea', $id);
		$sql->execute();
		return $sql->fetch();
	}
	public function editarSubArea($id_area, $nome_subarea , $descricao_subarea, $id_subarea){
		$existSubArea = $this->verificaSubArea($nome_subarea);
		if(count($existSubArea) > 0 && $existSubArea['id_subarea'] != $id_subarea){
			return FALSE;
		}else{
			try{
			$sql = $this->con->conectar()->prepare("UPDATE subarea SET id_area = :id_area, nome_subarea = :nome_subarea, descricao_subarea = :descricao_subarea WHERE id_subarea = :id_subarea");
			$sql->bindValue(':id_area', $id_area);
			$sql->bindValue(':nome_subarea', $nome_subarea);
			$sql->bindValue(':descricao_subarea', $descricao_subarea);
			$sql->bindValue(':id_subarea', $id_subarea);
			$sql->execute();
			return TRUE;
			}catch(PDOException $ex){
				echo "ERRO: ".$ex->getMessage();
			}
		}
	}
	public function excluirSubArea($id_subarea){
		$sql = $this->con->conectar()->prepare("DELETE FROM subarea WHERE id_subarea = :id_subarea");
		$sql->bindValue(':id_subarea', $id_subarea);
		$sql->execute();
	}
	public function verificaLinkArea($id_area){
		$sql = $this->con->conectar()->prepare("SELECT id_subarea FROM subarea WHERE id_area = :id_area");
		$sql->bindValue(':id_area', $id_area);
		$sql->execute();

		if($sql->rowCount() > 0){
			return TRUE;
		}else{
			return False;
		}
	}
	public function buscarSubAreaLinkArea($id_area){
		$sql = $this->con->conectar()->prepare("SELECT * FROM subarea WHERE id_area = :id_area");
		$sql->bindValue(':id_area', $id_area);
		$sql->execute();

		return $sql;
	}


	//Interface
	
	public function getTotalSubarea(){
		try{
		$sql = $this->con->conectar()->prepare("SELECT COUNT(*) as s FROM subarea");
		$sql->execute();
		$row = $sql->fetch();
		return $row['s'];
		}catch(PDOException $ex){
			echo "ERRO: ".$ex->getMessage(); 
		}
	}
}