<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
		<h1 class="h2">Novo índice</h1>
	</div>
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Índice</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button>
                            </div>
                            <div class="modal-body">
                            <div class="alert alert-success alert-dismissible" id="success" style="display:none;">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                            </div>
                            <form action="<?= base_url() ?>indice/store"  method="post">
                            <div class="form-group">
                                <label for="sigla">Sigla:</label>
                                <input type="text" class="form-control" id="sigla" placeholder="Enter sigla" name="sigla">
                            </div>
                            <div class="form-group">
                                <label for="desc">Desc:</label>
                                <input type="text" class="form-control" id="descricao" placeholder="Enter desc" name="descricao">
                            </div>
                            <button type="submit" id="butsave" class="btn btn-primary btn-lg d-grid gap-2 col-6 mx-auto"><i class="fas fa-check"></i> Cadastrar</button>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>

    <form action="<?= base_url() ?>indice/store_value"  method="post">

        <div class="row mt-4">
            <div class="col-1" ><h3>Sigla</h3></div>
            

            <button type="button"style="margin-right:5px" class="btn btn-secondary col-1" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Cadastrar 
            </button>     
            
                <select id="indice_id" name="indice_id"  class="btn btn-secondary dropdown-toggle col-2" type="button" data-bs-toggle="dropdown" data-bs-auto-close="true" aria-expanded="false">
                
                    <?php foreach($indices as $indice) { ?>
                        <option value="<?php echo $indice['id'] ?>" id="<?php echo $indice['sigla'] ?>"><?php echo $indice['sigla'] ?></option>
                    <?php } ?>

                </select>
        </div>
    
        <div class="row mt-4">
            <div class="col-1"><h3>Ano</h3></div>
                <select id="ano" name="ano" class="btn btn-secondary dropdown-toggle col-3" type="button" data-bs-toggle="dropdown" data-bs-auto-close="true" aria-expanded="false">
                    
                    <?php                 
                    $curYear = date('Y'); 
                    echo $curYear;
                    for($i = 2000; $i<=$curYear;$i++){
                    ?>
                    <option value="<?php echo $i ?>" id="<?php echo $i ?>"><?php echo $i ?></option>
                    <?php                 
                    }
                    ?>

                </select>
        </div>

        <div class="row mt-4">
            <label class="col-1"><h3>Mês</h3></label>
                <select id="data" name="data" class="btn btn-secondary dropdown-toggle col-3" type="button" data-bs-toggle="dropdown" data-bs-auto-close="true" aria-expanded="false">
                    <option value="01" id="jan">Janeiro</option>
                    <option value="02" id="fev">Fevereiro</option>
                    <option value="03" id="mar">Março</option>
                    <option value="04" id="abr">Abril</option>
                    <option value="05" id="mai">Maio</option>
                    <option value="06" id="jun">Junho</option>
                    <option value="07" id="jul">Julho</option>
                    <option value="08" id="ago">Agosto</option>
                    <option value="09" id="set">Setembro</option>
                    <option value="10" id="out">Outubro</option>
                    <option value="11" id="nov">Novembro</option>
                    <option value="12" id="dez">Dezembro</option>
                </select>
        </div>

        <div class="row mt-4">
            <label class="col-1"><h3>Valor</h3></label>
            <input type="number" step="any" style="-webkit-appearance: none;" class="form-control col-3" name="valor" id="valor" placeholder="Ex.: 1.15" required>
        </div>

        <button type="submit" class="btn btn-primary btn-lg d-grid gap-2 col-4 mx-auto"><i class="fas fa-check"></i> Cadastrar</button>

    </form>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type='text/javascript'>
  $(document).ready(function(){

$('#butsave').on('click', function() {
	var sigla = $('#sigla').val();
	var desc = $('#desc').val();
	if(sigla!="" && desc!=""){
		$("#butsave").attr("disabled", "disabled");
		$.ajax({
			url: "<?php echo base_url("Crud/savedata");?>",
			type: "POST",
			data: {
				type: 1,
				sigla: sigla,
				desc: desc
			},
			cache: false,
			success: function(dataResult){
				var dataResult = JSON.parse(dataResult);
				if(dataResult.statusCode==200){
					$("#butsave").removeAttr("disabled");
					$('#fupForm').find('input:text').val('');
					$("#success").show();
					$('#success').html('Data added successfully !'); 
					
				}
				else if(dataResult.statusCode==201){
				   alert("Error occured !");
				}
				
			}
		});
	}
	else{
		alert('Please fill all the field !');
	}
});

</html>

