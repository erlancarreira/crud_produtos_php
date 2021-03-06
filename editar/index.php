<?php require_once(__DIR__.'/../controllers/update.php'); ?>

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

	    <title>Crud PHP | Editar Produto</title>     
    </head>
    <body>

	    <?php include_once(__DIR__.'/../layout/menu.php'); ?>

	    <div class="container mt-5 mb-5"> 
		    <h4 class="mb-3">Editar Produto</h4>
	        
	        <?php if (isset($_SESSION['msg']) && !empty($_SESSION['msg']['text'])): ?>
	        
	        <div class="alert <?= $_SESSION['msg']['class']; ?> alert-dismissible fade show" role="alert">
			
			    <?= $_SESSION['msg']['text']; ?> 
			
			    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			        <span aria-hidden="true">&times;</span>
			    </button>
			
			</div>
		
	        <?php endif ?>

	        <?php if ($product):  ?> 

	        <form method="POST" enctype="multipart/form-data" >  
	        	<div class="row mb-3">
	        		<div class="col-md-4">
			        	<img src="../assets/images/<?= $product->getImage() ?? 'product.jpg'; ?>" class="card-img-top" alt="..." >
					</div>   
					<div class="col-md-7"> 
					    <div class="form-group">
					        <input type="text" class="form-control" name="name" value="<?= $product->getName(); ?>">
					    </div>
					    
					    <div class="form-group">
					        <input type="text" class="form-control" id="price" name="price" value="<?= $product->getPrice(); ?>">
					    </div>
					    
					    <div class="form-group">
					        <textarea class="form-control" name="description" rows="6"><?= $product->getDescription(); ?></textarea> 
					    </div> 

					    <div class="form-group">
						    <input type="file" class="form-control-file" name="image_file" id="image" src="<?= $product->getImage(); ?>">
						    <input type="hidden" name="image" value="<?= $product->getImage(); ?>">
					    </div>
				    </div>
			    </div>

				<button type="submit" class="btn btn-success btn-block">Atualizar</button>
			</form>	
			      
			<?php else: ?>
				<h5>Produto nao encontrado!</h5> 
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


