<?php require_once('store.php'); ?>

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

	    <title>Crud PHP | Cadastrar Produto</title>     
    </head>
    <body>

	    <?php include_once(__DIR__.'/../layout/menu.php'); ?>  
	    
	    <div class="container mt-5 mb-5"> 
		    <h4 class="mb-3">Cadastrar Produto</h4>
	        
	        <?php if (isset($_SESSION['msg']) && !empty($_SESSION['msg']['text'])): ?>
	        
	        <div class="alert <?= $_SESSION['msg']['class']; ?> alert-dismissible fade show" role="alert">
			  
			    <?= $_SESSION['msg']['text']; ?> 
			  
			    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			        <span aria-hidden="true">&times;</span>
			    </button>
			</div>
	        
	        <?php endif ?>

			<form method="POST" enctype="multipart/form-data">  
			    <div class="row mb-3">
	        		<div class="col-md-4">
			        	<img src="../assets/images/product.jpg" class="card-img-top" alt="..." id="imgPrev">
					</div>   
					<div class="col-md-7"> 
					    <div class="form-group">
			                <input type="text" class="form-control" name="name" placeholder="Nome">
					    </div>
					    
					    <div class="form-group">
					        <input type="number" class="form-control" id="price" name="price" placeholder="0.01" step="0.01">
					    </div>
					    
					    <div class="form-group">
					        <textarea class="form-control" name="description" rows="6"></textarea> 
					    </div> 

					    <div class="form-group">
						    <input type="file" class="form-control-file" id="image" name="image">
					    </div>				    
				    </div>
			    </div>

			    <button type="submit" class="btn btn-success btn-block">Cadastrar</button>

			</form>
		</div>

	    <?php include_once('../layout/footer.php'); ?>
	    <!-- Optional JavaScript -->
	    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
	    <script src="../node_modules/jquery/dist/jquery.slim.min.js" ></script>
	    <script src="../node_modules/popper.js/dist/umd/popper.min.js" ></script>
	    <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
	    
	    <script>
	    	$(document).ready( function() {
	            
	            function readURL(input, id) {
	            	var inputFiles = input.files

		            if (inputFiles && inputFiles[0]) {
		                
		                inputExt = inputFiles[0].type.split('/')
		                var reader = new FileReader()
	                    var ext = ['jpg', 'jpeg', 'png']
	                    
	                    if (!ext.includes(inputExt[1])) 
	                        return
	                           
		                reader.onload = function (e) {
		                    $(id).attr('src', e.target.result)
		                   
		                }

		                reader.readAsDataURL(input.files[0])
		            }
		        }

	            $(document).on('change', '#image', function (event) {
	                
	                readURL(event.target, '#imgPrev')

	            }) 
	    	})

	    </script>
    </body>
</html>


