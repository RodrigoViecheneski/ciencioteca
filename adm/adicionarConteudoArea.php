<?php require 'pages/header.pages.php';
//session_start();
if(empty($_SESSION['cLogin'])){
    ?>
    <script type="text/javascript">window.location.href="login.php";</script>
    <?php
    exit;
    }
?>

<div class="container">
<h1>Escolha a area referente ao seu conteudo</h1>

<form method="POST" action="adicionarConteudo.php">

        <div class="form-group">
			<label for="area">Área:</label>
			<select name="id_area" id="id_area" class="form-control">
				<?php
					require 'classes/area.class.php';
					$a = new Area();
					$area = $a->listarArea();
					foreach ($area as $are):
				?>
				<option value="<?php echo $are['id_area']; ?>"><?php echo $are['nome_area']; ?>
				</option>
				<?php
					endforeach;
				?>
			</select>
		</div>
        <input type="submit" value="Confirmar" class="btn btn-default" />

        </form>
</div>

<?php require 'pages/footer.pages.php'?>