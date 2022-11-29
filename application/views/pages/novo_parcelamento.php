<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">

    <?php date_default_timezone_set('America/Sao_Paulo'); $agora = date('d/m/Y');?>

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
		<h1 class="h2">Parcelamento</h1>
	</div>

    <form action="<?= base_url() ?>Parcelamento/store_parcela"  method="post">

    <div class="col-11">
    
    <div class="row mt-4">
            <h3 class="me-4 col-2">Tipo de parcelamento:</h3>

            <select id="tipo_parcelamento" required name="tipo_parcelamento" class="btn btn-secondary dropdown-toggle col-2" type="button" data-bs-toggle="dropdown" data-bs-auto-close="true" aria-expanded="false">
                        <option></option>
                        <option value="entidade" id="a">Entidade</option>
                        <option value="servidor" id="b">Servidor</option>
            </select>
    </div>

    <div class="row mt-4">
            <h3 class="col-1">Entidade:</h3>

            <select id="entidade" required name="entidade_id" class="btn btn-secondary dropdown-toggle col-3" type="button" data-bs-toggle="dropdown" data-bs-auto-close="true" aria-expanded="false">
                <option></option>
            
                <?php foreach($entidades as $entidade) { ?>
                        <option value="<?php echo $entidade['id'] ?>" id="<?php echo $entidade['id'] ?>"><?php echo $entidade['razao_social'] ?></option>
                <?php } ?>
            </select>
    </div>

    <div class="row mt-4">
            <h3 class="col-1">Servidor:</h3>

            <select id="servidor" required name="servidor_id" class="btn btn-secondary dropdown-toggle col-3" type="button" data-bs-toggle="dropdown" data-bs-auto-close="true" aria-expanded="false">
                <option></option>
    
                <?php foreach($servidores as $servidor) { ?>
                        <option value="<?php echo $servidor['id'] ?>" id="<?php echo $servidor['id'] ?>"><?php echo $servidor['nome'] ?></option>
                <?php } ?>
            </select>
    </div>

    <div class="row mt-4">
            <h3 class="me-4 col-1">Emissão:</h3>
			<input type="text" name="emissao" id="emissao" value="<?php echo $agora; ?>" step="any" style="-webkit-appearance: none;" class="form-control col-3" placeholder="" disabled>
    </div>

    <div class="row mt-4">
            <h3 class="col-2">Número de parcelas:</h3>
			<input type="number" step="any" name="numero_de_parcelas" id="numero_de_parcela" style="-webkit-appearance: none;" class="form-control col-2" placeholder="" required>
    </div>

    <div class="row mt-4">
            <h3 class="col-2">Valor parcelamento:</h3>
			<input type="number" name="valor" id="valor" step="any" style="-webkit-appearance: none;" class="form-control col-2" placeholder="" required>
    </div>

    <div class="row mt-4">
            <h3 class="col-2">Valor de cada parcela:</h3>
			<input type="number" name="valor_parcela" id="valor_parcela" step="any" style="-webkit-appearance: none;" class="form-control col-2" placeholder="" required>
    </div>

    <?php $termino = $agora  ?>

    <button type="submit" id="btn" class="btn btn-primary btn-lg  col-4 mt-3"><i class="fas fa-check"></i> Parcelar</button>

    </div>

    </form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type='text/javascript'>
  $(document).ready(function(){
        document.getElementById('servidor').disabled = true;
        document.getElementById('entidade').disabled = true;

        $('#tipo_parcelamento').change(function(){
        if(document.getElementById('tipo_parcelamento').value == 'entidade'){
                document.getElementById('entidade').disabled = false;
                document.getElementById('servidor').disabled = true;
                document.getElementById('servidor').value = 0;
        }else if(document.getElementById('tipo_parcelamento').value == 'servidor'){
                document.getElementById('entidade').disabled = true;
                document.getElementById('servidor').disabled = false;
                document.getElementById('entidade').value = 0;
        }else if(document.getElementById('tipo_parcelamento').value == ''){
                document.getElementById('entidade').disabled = true;
                document.getElementById('servidor').disabled = true;
        }
})

  });
 </script>

</main>

