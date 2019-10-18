<?php


require_once('functions.php');
view($_GET['id']);	
index($_SESSION["user_sct"][0]);
echo $OUTPUT->header();
include (HEADER_TEMPLATE);


?>	
    <h2>Cliente : <?php echo $tutor['id']; ?></h2>	
<hr>	
<?php if (!empty($_SESSION['message'])) : 
?>	
    <div class="alert alert-<?php echo $_SESSION['type']; ?>">
        <?php echo $_SESSION['message']; ?></div>	<?php endif; 
        ?>	
<dl class="dl-horizontal">		
<dt>Nome Completo:</dt>		
    <dd><?php echo $tutor['nome']; ?></dd>	
        <dt>Usuário no Sistema:</dt>
                <dd><?php echo $tutor['username']; ?></dd>	
</dl>	
<div id="actions" class="row">		
    <div class="col-md-12">		  
        <a href="edit.php?id=<?php echo $tutor['id']; ?>" class="btn btn-primary">Editar</a>		  
        <a href=".\index.php" class="btn btn-default">Voltar</a>		
    </div>	
</div>	
