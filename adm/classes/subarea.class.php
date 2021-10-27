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
	public function editarSubArea($nome_subarea , $descricao_subarea, $id_area){
		$existArea = $this->verificaArea($nome_area);
		if(count($existArea) == 0){
			$sql = $this->con->conectar()->prepare("UPDATE subarea SET nome_subarea = :nome_subarea, descricao_subarea = :descricao_subarea, id_area = :id_area WHERE id_subarea = :id_subarea");
			$sql->bindValue(':nome_subarea', $nome_subarea);
			$sql->bindValue(':descricao_subarea', $descricao_subarea);
			$sql->bindValue(':id_area', $id_area);
			$sql->bindValue(':id_subarea', $id_subarea);
			$sql->execute();
			?>
			<div class="alert alert-success">
				Subárea alterada com sucesso!
				<a href="gestao_area.php">Ver</a>
			</div>
		<?php
		}else{
			?>
			<div class="alert alert-danger">
				Subárea não pode ser alterada. Área já cadastrada!
				<a href="gestao_area.php">Ver</a>
			</div>
			<?php
		}
	}
	public function excluirArea($id){
		$sql = $this->con->conectar()->prepare("DELETE FROM area WHERE id_area = :id");
		$sql->bindValue(':id', $id);
		$sql->execute();
	}
}