# Simples Crud em Php 

- Instruções
   - Importe o banco de dados em dump/shop.sql ou rode a url create_db mas antes altere o arquivo com seu host, username e password.
   - Especifique o host, username e password do seu servidor em class/DB.class.php.
   - Rode o comando npm install para adicionar os arquivos requeridos pelo bootstrap

# Estrutura

- Pastas
 	- Assets 
        - Images 
        - Css 
        - Js
	- Class  
        - Db.class.php 
        - Validator.class.php 
        - Product.class.php
	- Layout 
        - Footer.php 
        - Menu.php 
	- Model  
        - Product 
            - Save 
            - Delete 
            - Show  
            - Paginate
    - Controllers
        - list
        - store
        - update
    - Views
        - /Cadastrar
        - /Listar
        - /Editar
    - Layouts
        - menu.php
        - footer.php 
    - Dump
        - shop.sql                    



