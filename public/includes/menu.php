<header>
    <!-- Fixed navbar -->
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <a class="navbar-brand" href="/">All Blacks</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item  <?php if($_SERVER['REQUEST_URI'] == '/') echo 'active' ?>">
            <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item <?php if(strpos($_SERVER['REQUEST_URI'], 'cadastrar')) echo 'active' ?>">
            <a class="nav-link" href="cadastrar.php">Cadastrar</span></a>
          </li>
        </ul>
      </div>
    </nav>
</header>