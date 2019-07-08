<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <a class="navbar-brand" href="/">Crud PHP</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">        
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Produto
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="<?= URL; ?>/cadastrar">Cadastrar</a>
            <a class="dropdown-item" href="<?= URL; ?>/listar">Listar</a>
          </div>
        </li>
      </ul>
      <form class="form-inline my-2 my-lg-0" >
        <input class="form-control mr-sm-2" type="search" placeholder="Pesquisar" name="search" action="<?= URL; ?>/listar/index.php" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0"  type="submit">Pesquisar</button>
      </form>
    </div>
  </div>
</nav>