<?php require_once(__DIR__.'/../controllers/list.php'); ?>

<!doctype html>
<html lang="pt-br">
    <head>
	    <!-- Required meta tags -->
	    <meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	    <!-- Bootstrap CSS -->
		<link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
		
		<!-- Style CSS -->
		<link rel="stylesheet" type="text/css" href="../assets/css/style.css">

	    <title>Crud PHP | Produtos listar</title>     
    </head>
    <body>

    <?php include_once(__DIR__.'/../layout/menu.php'); ?>  
   
	    <div class="container mt-5 mb-5"> 
		    
	        <h4 class="mb-3">Listar Produtos</h4>
	        
	        <?php if (isset($_SESSION['msg']) && !empty($_SESSION['msg']['text'])): ?>
	        
	        <div class="alert <?= $_SESSION['msg']['class']; ?> alert-dismissible fade show" role="alert">
			
			    <?= $_SESSION['msg']['text']; ?> 
			
			    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			        <span aria-hidden="true">&times;</span>
			    </button>
			
			</div>		
	        <?php endif ?>
	        
	        <?php if (count($products['rows'])  > 0):  ?> 
            

	        <form method="POST">	
				<div class="row mb-5">

				<?php foreach ($products['rows'] as $prod): ?>
					
					<div class="col-md-4 mb-3">
						<div class="card">
						    <img src="../assets/images/<?= $prod['image']; ?>" class="card-img-top" alt="Meu produto">
						    <div class="card-body">
						        <h5 class="card-title"><?= $prod['name']; ?></h5>
						        <p class="card-text"><?= $prod['description']; ?></p>
						        <p class="card-text"><small class="text-muted">R$ <?= number_format($prod['price'],2, ',', '.'); ?></small></p>
			                    <a href="<?= URL; ?>/editar/index.php?id=<?= $prod['id']; ?>" class="client btn-sm btn btn-primary">Editar</a>
			                    <button name="id" value="<?= $prod['id']; ?>" class="client btn-sm btn btn-danger">Deletar</button>
						    </div>
						</div>
				    </div>
				
				<?php endforeach ?>
				
				</div> 
			</form>
			
			
			<?php if ($products['total'] > 3): ?>
	        
			<nav aria-label="Page navigation example">
			    <ul class="pagination justify-content-center">
			    
			    	<?php for ($i=1; $i <= $products['paginate']; $i++): ?>
				    
				    <li class="page-item <?= ($i == $products['currentPage']) ? 'active' : ''?>">
				    	<a class="page-link" href="<?= URL; ?>/listar/index.php?page=<?= $i; ?>"><?= $i; ?></a>
				    </li>

				    <?php endfor ?>

			    </ul>
			</nav>
			
			<?php endif ?>   

			<?php else: ?>

				<h5>Nenhum produto encontrado!</h5> 
			
			<?php endif ?>	

		</div>

	    <?php include_once(__DIR__.'/../layout/footer.php'); ?>
	    
	    <!-- Optional JavaScript -->
	    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
	    <script src="../node_modules/jquery/dist/jquery.slim.min.js" ></script>
	    <script src="../node_modules/popper.js/dist/umd/popper.min.js" ></script>
	    <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
	    
    </body>
</html>


