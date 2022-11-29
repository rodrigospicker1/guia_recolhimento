<nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="<?= base_url() ?>home">Home</a>
	<div>
		<form action="" method="post">
			<input class="form-control form-control-dark" type="text" name="busca" id="busca" placeholder="Search" aria-label="Search" value="">
		</form>
	</div>
  <ul class="navbar-nav px-3">
    <li class="nav-item text-nowrap">
    </li>
  </ul>
</nav>

<div class="container-fluid">
  <div class="row">
    <nav class="col-md-2 d-none d-md-block bg-light sidebar">
      <div class="sidebar-sticky">
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
          <span>Menu</span>
          <a class="d-flex align-items-center text-muted" href="#" aria-label="Add a new report">
            <span data-feather="plus-circle"></span>
          </a>
        </h6>
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url() ?>indice">
              Novo índice
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url() ?>parcelamento">
              Novo parcelamento
            </a>
					</li>
					<li class="nav-item">
            <a class="nav-link" href="<?= base_url() ?>parcelamento/show">
              Parcelamentos
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url() ?>guia/emitir">
              Emitir guia 
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url() ?>Guia/show">
              Guias
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url() ?>Crud">
              Teste
            </a>
          </li>
        </ul>
      </div>
    </nav>