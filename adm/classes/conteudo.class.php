<?php
class Conteudo {
	private $id_conteudo;
	private $titulo;
	private $descricao;
	private $id_area;
	private $id_subarea;
	private $id_usuario;
	private $con;

	public function __construct(){
		$this->con = new Conexao();
	}
	public function addConteudo($titulo, $descricao, $id_area, $id_subarea, $id_usuario){
		$existArea = $this->verificaArea($nome_area);
		if(count($existArea) == 0){
			$this->nome_area = $nome_area;
			$this->descricao_area = $descricao_area;
			$sql = $this->con->conectar()->prepare("INSERT INTO area(nome_area, descricao_area) VALUES (:nome_area, :descricao_area)");
			$sql->bindValue(":nome_area", $nome_area);
			$sql->bindValue(":descricao_area", $descricao_area);
			$sql->execute();
			?>
			<div class="alert alert-success">
				Area adicionada com sucesso!
				<a href="gestao_area.php">Ver</a>
			</div>
		<?php
		}else{
			?>
			<div class="alert alert-danger">
				Área já cadastrada!
				<a href="gestao_area.php">Ver</a>
			</div>
			<?php
		}
	}
	/*public function verificaArea($nome){
		$sql = $this->con->conectar()->prepare("SELECT id_area FROM area WHERE nome_area = :nome");
		$sql->bindValue(":nome", $nome);
		$sql->execute();
		if($sql->rowCount() > 0){
			$array = $sql->fetch();
		}else{
			$array = array();
		}
		return $array;
	}
	public function listarArea(){
		$sql = $this->con->conectar()->prepare("SELECT id_area, nome_area, descricao_area FROM area");
		$sql->execute();
		return $sql->fetchAll();
	}
	public function buscarArea($id){
		$sql = $this->con->conectar()->prepare("SELECT * FROM area WHERE id_area = :id");
		$sql->bindValue(':id', $id);
		$sql->execute();

		if($sql->rowCount() > 0){
			return $sql->fetch();
		}else{
			return array();
		}
	}
	public function editarArea($nome_area , $descricao_area, $id_area){
		$existArea = $this->verificaArea($nome_area);
		if(count($existArea) > 0 && $existArea['id_area'] != $id_area){
			return FALSE;
			?>
			<div class="alert alert-danger">
				Área não pode ser alterada. Área já cadastrada!
				<a href="gestao_area.php">Ver</a>
			</div>
			<?php
		}else{
			$sql = $this->con->conectar()->prepare("UPDATE area SET nome_area = :nome_area, descricao_area = :descricao_area WHERE id_area = :id_area");
			$sql->bindValue(':nome_area', $nome_area);
			$sql->bindValue(':descricao_area', $descricao_area);
			$sql->bindValue(':id_area', $id_area);
			$sql->execute();
			return TRUE;
			?>
			<div class="alert alert-success">
				Area alterada com sucesso!
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

}*/