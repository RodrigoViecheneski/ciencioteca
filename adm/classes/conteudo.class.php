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
	public function addConteudo($titulo, $descricao, $id_area, $id_subarea){
		$existConteudo = $this->verificaConteudo($titulo);
		if(count($existConteudo) == 0){
			$this->titulo = $titulo;
			$this->descricao = $descricao;
			$this->id_area = $id_area;
			$this->id_subarea = $id_subarea;
			//$this->id_usuario = $_SESSION['cLogin'];
			$sql = $this->con->conectar()->prepare("INSERT INTO conteudo SET titulo = :titulo, descricao = :descricao, id_area = :id_area, id_subarea = :id_subarea, id_usuario = :id_usuario");			
			$sql->bindValue(":titulo", $titulo);
			$sql->bindValue(":descricao", $descricao);
			$sql->bindValue(":id_area", $id_area);
			$sql->bindValue(":id_subarea", $id_subarea);
			$sql->bindValue(":id_usuario", $_SESSION['cLogin']);
			$sql->execute();
			//print_r($sql);
			//exit;
			?>
			<div class="alert alert-success">
				Conteúdo adicionada com sucesso!
				<a href="gestao_conteudo.php">Ver</a>
			</div>
		<?php
		}else{
			?>
			<div class="alert alert-danger">
				Conteúdo com este nome já cadastrado!
				<a href="gestao_conteudo.php">Ver</a>
			</div>
			<?php
		}
	}
	public function verificaConteudo($titulo){
		$sql = $this->con->conectar()->prepare("SELECT id_conteudo FROM conteudo WHERE titulo = :titulo");
		$sql->bindValue(":titulo", $titulo);
		$sql->execute();
		if($sql->rowCount() > 0){
			$array = $sql->fetch();
		}else{
			$array = array();
		}
		return $array;
	}

	public function listarConteudo(){
		$sql = $this->con->conectar()->prepare("SELECT * FROM conteudo");
		$sql->execute();
		return $sql->fetchAll();
	}
	public function getConteudos($id_conteudo){
		$array = array();
		$sql = $this->con->conectar()->prepare("SELECT 
		*,
		(select area.nome from area where area.id = conteudo.id_area) as areas,
		(select subarea.nome from subarea where subarea.id = conteudo.id_subarea) as subareas,
		(select usuarios.nome from usuarios where usuarios.id = conteudo.id_usuario) as usuario
 		FROM conteudo WHERE id_conteudo = :id_conteudo");
		$sql->bindValue("id_conteudo", $id_conteudo);
		$sql->execute();

		if($sql->rowCount() > 0){
			$array = $sql->fetch();
			//mostrar todos os arquivos cadastrados
			$array['arquivo'] = array();
			$sql = $this->con->conectar()->prepare("SELECT id_conteudoarquivos, url_conteudo, tipo_conteudo FROM conteudoarquivos WHERE id_conteudo = :id_conteudo");
			$sql->bindValue("id_conteudo", $id_conteudo);
			$sql->execute();

			if($sql->rowCount() > 0){
				$array['arquivo'] = $sql->fetchAll();
			}
		}
		return $array;
	}

	public function buscarConteudo($id_conteudo){
		$sql = $this->con->conectar()->prepare("SELECT * FROM conteudo WHERE id_conteudo = :id_conteudo");
		$sql->bindValue(':id_conteudo', $id_conteudo);
		$sql->execute();
		if($sql->rowCount() > 0){
			return $sql->fetch();
		}else{
			return array();
		}
	}	
	public function editarConteudo($id_conteudo, $titulo, $descricao_conteudo, $id_area, $id_subarea, $id_usuario){
		$this->id_conteudo = $id_conteudo;
		$this->titulo = $titulo;
		$this->descricao_conteudo;
		$this->id_area = $id_area;
		$this->id_subarea = $id_subarea;
		$this->id_usuario = $id_usuario;
		$sql = $this->con->conectar()->prepare("UPDATE conteudo SET titulo = :titulo,
		 descricao = :descricao_conteudo, id_area = :id_area, id_subarea = :id_subarea, 
		 id_usuario = :id_usuario WHERE id_conteudo = :id_conteudo"); 
		$sql->bindValue(":id_conteudo", $id_conteudo); 
		$sql->bindValue(":titulo", $titulo); 
		$sql->bindValue(":descricao_conteudo", $descricao_conteudo); 
		$sql->bindValue(":id_area", $id_area); 
		$sql->bindValue(":id_subarea", $id_subarea); 
		$sql->bindValue(":id_usuario", $id_usuario); 
		$sql->execute();
		?>
		<div class="alert alert-success">
			Conteúdo alterado com sucesso!
			<a href="gestao_conteudo.php">Ver</a>
		</div>
		<?php

	}
	public function excluirConteudo($id){
		$sql = $this->con->conectar()->prepare("DELETE FROM conteudo WHERE id_conteudo = :id");
		$sql->bindValue(':id', $id);
		$sql->execute();
	}
	
}
?>