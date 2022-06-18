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
			print_r($sql);
			exit;
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
	
}
?>