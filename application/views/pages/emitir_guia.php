<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">

    <?php date_default_timezone_set('America/Sao_Paulo');?>

    <form action="<?= base_url() ?>Guia/store"  method="post">


        <div class="row mt-4">
                <h3 class="me-4 col-2">Guia:</h3>

                <select id="guia" name="guia" class="btn btn-secondary dropdown-toggle col-2" type="button" data-bs-toggle="dropdown" data-bs-auto-close="true" aria-expanded="false">
                            
                            <option value="individual" id="individual">Individual</option>
                            <option value="parcelamento" id="parcelamento">Parcelamento</option>
                </select>
        </div>

        <div class="row mt-4">
                <h3 class="me-4 col-2">Tipo de guia:</h3>

                <select id="tipo_guia" name="tipo_guia" class="btn btn-secondary dropdown-toggle col-2" type="button" data-bs-toggle="dropdown" data-bs-auto-close="true" aria-expanded="false">
                            
                            <option value="entidade" id="a">Entidade</option>
                            <option value="servidor" id="b">Servidor</option>
                </select>
        </div>

        <div id="entidade_div" class="row mt-4">
                <h3 class="col-2">Entidade:</h3>

                <select id="entidade_escolha" name="entidade_id" class="btn btn-secondary dropdown-toggle col-2" type="button" data-bs-toggle="dropdown" data-bs-auto-close="true" aria-expanded="false">
                    
                
                    <?php foreach($entidades as $entidade) { ?>
                            <option value="<?php echo $entidade['id'] ?>" id="<?php echo $entidade['id'] ?>"><?php echo $entidade['razao_social'] ?></option>
                    <?php } ?>
                </select>
        </div>

        <div id="servidor_div" name="servidor_div" class="row mt-4">
                <h3 class="col-2">Servidor:</h3>

                <select id="servidor_escolha" name="servidor_id" class="btn btn-secondary dropdown-toggle col-2" type="button" data-bs-toggle="dropdown" data-bs-auto-close="true" aria-expanded="false">
                    
        
                    <?php foreach($servidores as $servidor) { ?>
                            <option value="<?php echo $servidor['id'] ?>" id="<?php echo $servidor['id'] ?>"><?php echo $servidor['nome'] ?></option>
                    <?php } ?>
                </select>
        </div>
        
        <div id="parcelamento_entidade_div" name="parcelamento_div" class="row mt-4">
                <h3 class="col-2">Parcelamento</h3>

                <select id="parcelamento_entidade" name="parcelamento_entidade" class="btn btn-secondary dropdown-toggle col-2" type="button" data-bs-toggle="dropdown" data-bs-auto-close="true" aria-expanded="false">
                    
        
                    <?php foreach($parcelamentos as $parcelamento) {
                        if($parcelamento['tipo_parcelamento'] == 'entidade' && $parcelamento['status'] != 1){  $_SESSION['numero'] = $parcelamento['numero_de_parcelas'];?>
                            <?php foreach($entidades as $entidade){ if($parcelamento['entidade_id'] == $entidade['id']){ ?>
                                <option value="<?php echo $parcelamento['id'] ?>" data-id="<?php echo $parcelamento['id'] ?>" name="entidade_parcelamento" id="<?php echo $parcelamento['id'] ?>"><?php echo $entidade['razao_social'].' | Emissão: '.$parcelamento['emissao'].' | Valor: '.$parcelamento['valor']; ?></option>
                            <?php }} ?> 
                    <?php }} ?> 
                </select>
        </div>

        <div id="parcelamento_servidor_div" name="parcelamento_div" class="row mt-4">
                <h3 class="col-2">Parcelamento</h3>

                <select id="parcelamento_servidor" name="parcelamento_servidor" class="btn btn-secondary dropdown-toggle col-2" type="button" data-bs-toggle="dropdown" data-bs-auto-close="true" aria-expanded="false">
                    
        
                    <?php foreach($parcelamentos as $parcelamento) { 
                        if($parcelamento['tipo_parcelamento'] == 'servidor' && $parcelamento['status'] != 1){?>
                            <?php foreach($servidores as $servidor){ if($parcelamento['servidor_id'] == $servidor['id']){ ?>
                                <option value="<?php echo $parcelamento['id'] ?>" data-id="<?php echo $parcelamento['id'] ?>"  name="servidor_parcelamento"  id="<?php echo $parcelamento['id'] ?>"><?php echo $servidor['nome'].' | Emissão: '.$parcelamento['emissao'].' | Valor: '.$parcelamento['valor']; ?></option>
                            <?php }} ?>
                    <?php }} ?>                  
                </select>
                

        </div>

        <div id="numero_parcela_div" name="numero_parcela_div"  class="row mt-4">
                <h3 class="col-2">Numero parcela:</h3>

                <select id="numero_da_parcela" name="numero_da_parcela" class="btn btn-secondary dropdown-toggle col-2" type="button" data-bs-toggle="dropdown" data-bs-auto-close="true" aria-expanded="false">
                
                </select>
        </div>

        <div class="row mt-4">
                <h3 class="col-2">Competência:</h3>

                <select id="competencia" name="competencia" class="btn btn-secondary dropdown-toggle col-2" type="button" data-bs-toggle="dropdown" data-bs-auto-close="true" aria-expanded="false">
                    
        
                    <?php for($a=date('Y');$a>1944;$a--){ ?>
                        <?php for($b=11;$b>=0;$b--){ $meses = ['Janeiro', 'Fevereiro','Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro']?>
                            <option value="<?php echo $b.'/'.$a+1  ?>" id="<?php  ?>"><?php echo $meses[$b].'/'.$a+1 ?></option>
                        <?php } ?>
                    <?php } ?>
                </select>
        </div>

        <div class="row mt-4">
                <h3 class="me-4 col-2">Emissão:</h3>
                <input type="text" name="emissao" id="emissao" value="<?php echo date("d/m/Y"); ?>" step="any" style="-webkit-appearance: none;" class="form-control col-2" placeholder="" disabled>
        </div>

        <div class="row mt-4">
                <h3 class="col-2">Calcula:</h3>

                <select id="calcula" name="calcula" class="btn btn-secondary dropdown-toggle col-2" type="button" data-bs-toggle="dropdown" data-bs-auto-close="true" aria-expanded="false">
                    
                    <option value="patronal">Patronal</option>
                    <option value="funcional">Funcional</option>
                    <option value="funcional_patronal">Patronal e funcional</option>
                    <option value="avulsa_parcelamento">Avulsa/Parcelamento</option>
                </select>
        </div>

        <div class="row mt-4">
                <h3 class="col-2">Vencimento:</h3>
                <input class="col-2" name="vencimento" id="vencimento" data-date-format="dd/mm/yyyy" data-provide="datepicker">
        </div>

        <div class="row mt-4">
                <h3 class="col-2">Valor Base único:</h3>
                <input class="col-2" name="valor_base" id="valor_base">
        </div>

        <div class="row mt-4">
                <h3 class="col-2">Base Patronal:</h3>
                <input class="col-2" name="base_patronal" id="base_patronal">
        </div>

        <div class="row mt-4">
                <h3 class="col-2">Base Funcional:</h3>
                <input class="col-2" name="base_funcional" id="base_funcional">
        </div>

        <div class="row mt-4">
                <h3 class="col-2">Folha bruta:</h3>
                <input class="col-2" name="folha_bruta" id="folha_bruta">
        </div>

        <div class="row mt-4">
                <h3 class="col-2">Valor Patronal:</h3>
                <input class="col-2" name="valor_patronal" id="valor_patronal">
        </div>

        <div class="row mt-4">
                <h3 class="col-2">Valor Funcional:</h3>
                <input class="col-2" name="valor_funcional" id="valor_funcional">
        </div>

        <div class="aliquota">

            <div class="row mt-4">
                <?php foreach($aliquotas as $aliquota){ if($aliquota['ano_final']>=date('Y')){?>
                <h3 class="col-1" style="font-size:25px;">Taxa Patronal:</h3>
                    <input class="col-1" name="parte_patronal" value="<?= $aliquota['patronal']; ?>%" id="parte_patronal" disabled>

                    
                <h3 class="col-1" style="font-size:25px;">Multa:</h3>
                <input class="col-1" name="multa" value="<?= $aliquota['multa']; ?>%" id="multa" disabled>
            </div>
            <div class="row mt-4">

                <h3 class="col-1"  style="font-size:23px;">Taxa Funcional:</h3>
                <input class="col-1" name="parte_funcional" value="<?= $aliquota['funcional']; ?>%"  id="parte_funcional" disabled>

                <h3 class="col-1" style="font-size:25px;">Juro/Mês:</h3>
                <input class="col-1 " name="juro_mes" value="<?= $aliquota['juros']; ?>%"  id="juro_mes" disabled>
                <?php }} ?>
            </div>

        </div>

        <div class="row mt-4">
                <h3 class="me-4 col-2">Observações:</h3>
                <textarea name="observacoes" id="observacoes"  class="col-2"></textarea>
        </div>

        <div class="row mt-4">
                <h3 class="col-2">Salário Família:</h3>
                <input class="col-2" name="salario_familia" id="salario_familia">
        </div>

        <div class="row mt-4">
                <h3 class="col-2">Auxílio Reclusão:</h3>
                <input class="col-2" name="auxilio_reclusao" id="auxilio_reclusao">
        </div>

        <div class="row mt-4">
                <h3 class="col-2">Salário Maternidade:</h3>
                <input class="col-2" name="salario_maternidade" id="salario_maternidade">
        </div>

        <div class="row mt-4">
                <h3 class="col-2">Auxílio doença:</h3>
                <input class="col-2" name="auxilio_doenca" id="auxilio_doenca">
        </div>

        <div class="row mt-4">
                <h3 class="col-2">Outras Deduções:</h3>
                <input class="col-2" name="outras_deducoes" id="outras_deducoes">
        </div>

        <div class="row mt-4">
                <h3 class="me-4 col-2">Pagamento:</h3>

                <select id="pagamento" name="banco_id" class="btn btn-secondary dropdown-toggle col-2" type="button" data-bs-toggle="dropdown" data-bs-auto-close="true" aria-expanded="false">
                            
                    <?php foreach($bancos as $banco){ ?>
                        <option value="<?= $banco['id'] ?>" id="<?= $banco['id'] ?>"><?= $banco['nome'] ?></option>
                        
                    <?php } ?>

                </select>
        </div>

            <button type="submit" id="btn" class="btn btn-primary btn-lg  col-4 mt-3"><i class="fas fa-check"></i> Emitir guia</button>
        

        <div class="collum">
            <button type="reset" id="reset" name="reset" class="btn btn-danger btn-lg  col-4 mt-3"><i class="fas fa-ban"></i> Limpar</button>
        </div>

    </form>

</main>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type='text/javascript'>
    $(document).ready(function(){

        $parcela_servidor = document.getElementById('parcelamento_servidor');
        $parcela_entidade = document.getElementById('parcelamento_entidade');
        $numero_parcela = document.getElementById('numero_da_parcela');
        $calcula = document.getElementById('calcula');
        $vencimento = document.getElementById('vencimento');
        $valor_base = document.getElementById('valor_base');
        $base_patronal = document.getElementById('base_patronal');
        $base_funcional = document.getElementById('base_funcional');
        $folha_bruta = document.getElementById('folha_bruta');
        $valor_patronal = document.getElementById('valor_patronal');
        $valor_funcional = document.getElementById('valor_funcional');
        $observacao = document.getElementById('observacoes');
        $salario_familia = document.getElementById('salario_familia');
        $auxilio_reclusao = document.getElementById('auxilio_reclusao');
        $salario_maternidade = document.getElementById('salario_maternidade');
        $auxilio_doenca = document.getElementById('auxilio_doenca');
        $outras_deducoes = document.getElementById('outras_deducoes');
        $tipo_guia =  document.getElementById('tipo_guia');
        $competencia = document.getElementById('competencia');
        $pagamento = document.getElementById('pagamento');
        $guia = document.getElementById('guia');
        $par_ent_div = document.getElementById('parcelamento_entidade_div');
        $par_ser_div = document.getElementById('parcelamento_servidor_div');
        $numero_parcela_div = document.getElementById('numero_parcela_div');
        $servidor_div = document.getElementById('servidor_div');
        $entidade_div = document.getElementById('entidade_div');
        $servidor_esc = document.getElementById('servidor_escolha');
        $entidade_esc = document.getElementById('entidade_escolha');
        const btn = document.getElementById('btn');

        function zerar(){
            $vencimento.value = "";
            $valor_base.value = "";
            $base_patronal.value = "";      
            $base_funcional.value = "";    
            $folha_bruta.value = "";      
            $valor_funcional.value = "";
            $valor_patronal.value = "";
            $observacao.value = "";
            $salario_familia.value = "";
            $auxilio_reclusao.value = "";
            $salario_maternidade.value = "";
            $auxilio_doenca.value = "";
            $outras_deducoes.value = "";
        }

        function disabilitar(){
            $vencimento.disabled = true;
            $valor_base.disabled = true;    
            $base_patronal.disabled = true;       
            $base_funcional.disabled = true;        
            $folha_bruta.disabled = true;     
            $valor_patronal.disabled = true;        
            $valor_funcional.disabled = true;
            $observacao.disabled = true;
            $salario_familia.disabled = true;
            $auxilio_reclusao.disabled = true;
            $salario_maternidade.disabled = true;
            $auxilio_doenca.disabled = true;
            $outras_deducoes.disabled = true;
            $pagamento.disabled = true;
        }

        function disabilitar_calculo(){
            $vencimento.disabled = true;
            $valor_base.disabled = true;    
            $base_patronal.disabled = true;       
            $base_funcional.disabled = true;        
            $folha_bruta.disabled = true;     
            $valor_patronal.disabled = true;        
            $valor_funcional.disabled = true;
            $observacao.disabled = true;
            $salario_familia.disabled = true;
            $auxilio_reclusao.disabled = true;
            $salario_maternidade.disabled = true;
            $auxilio_doenca.disabled = true;
            $outras_deducoes.disabled = true;
            $pagamento.disabled = true;
        }

        function habilitar(){
            $observacao.disabled = false;
            $salario_familia.disabled = false;
            $auxilio_reclusao.disabled = false;
            $salario_maternidade.disabled = false;
            $auxilio_doenca.disabled = false;
            $outras_deducoes.disabled = false;
        }

        habilitar();
        disabilitar();

        $vencimento.disabled = false;
        $pagamento.disabled = false;
        $base_patronal.disabled = false;
        $folha_bruta.disabled = false;
        habilitar();

        
        $(document).ready(function(){   
                    $("#valor_base").blur(function(){  
                        if ($("#valor_base").val() !=''){
                            $('#base_patronal').attr("disabled", true);
                            $('#base_funcional').attr("disabled", true);
                        }else{
                            $('#base_patronal').attr("disabled", false);
                            $('#base_funcional').attr("disabled", false);
                        }
                    });
                    $("#base_patronal").blur(function(){  
                        if ($("#base_patronal").val() !=''){
                            $('#valor_base').attr("disabled", true);
                        }else if($("#base_patronal").val() =='' && $("#base_funcional").val() ==''){
                            $('#valor_base').attr("disabled", false);
                        }
                    });
                    $("#base_funcional").blur(function(){  
                        if ($("#base_funcional").val() !=''){
                            $('#valor_base').attr("disabled", true);
                        }else if($("#base_patronal").val() =='' && $("#base_funcional").val() ==''){
                            $('#valor_base').attr("disabled", false);
                        }
                    });
                });

        $('#parcelamento_entidade').change(function(){
            var id_js = $(this).val();
            console.log(id_js);
            $.ajax({
                        url:'<?=base_url()?>Guia/parcelamento_detalhes',
                        method: 'post',
                        data: {id_js: id_js},
                        dataType: 'json',
                        success: function(response){
                            var len = response.length;
                            $('#valor_patronal').text('');
                            if(len > 0){
                                var ultimo = response[len-1].numero_parcela;
                                var valor = response[len-1].valor;
                                var valor_ci = valor*ultimo;
                                
                                $numero_parcela.innerHTML = "";
                                response.forEach(function(response){
                                    if(response.guia_id == 0){
                                        $numero_parcela.innerHTML += "<option>"+response.numero_parcela+"</option>"
                                    }
                                })
                                
                                $valor_patronal.disabled = false;
                                $valor_patronal.readOnly = true;
                                $valor_patronal.value = valor_ci;
                                $observacao.disabled = false;
                            }
                        }
                    });
        });

        $('#parcelamento_servidor').change(function(){
            var id_js = $(this).val();
            console.log(id_js);
            $.ajax({
                        url:'<?=base_url()?>Guia/parcelamento_detalhes',
                        method: 'post',
                        data: {id_js: id_js},
                        dataType: 'json',
                        success: function(response){
                            var len = response.length;
                            $('#valor_patronal').text('');
                            if(len > 0){
                                var ultimo = response[len-1].numero_parcela;
                                var valor = response[len-1].valor;
                                var valor_ci = valor*ultimo;
                                var count = 0;
                                
                                $numero_parcela.innerHTML = "";
                                response.forEach(function(response){
                                    if(response.guia_id == 0){
                                        count++;
                                        $numero_parcela.innerHTML += "<option>"+response.numero_parcela+"</option>"
                                    }
                                })
                                
                                $valor_patronal.disabled = false;
                                $valor_patronal.readOnly = true;
                                $valor_patronal.value = valor_ci;
                                $observacao.disabled = false;
                            }
                        }
                    });
        });

        $servidor_div.style.display = 'none';  
        $par_ent_div.style.display = 'none';  
        $par_ser_div.style.display = 'none'; 
        $numero_parcela_div.style.display = 'none'; 

        $('#guia').change(function(){
            if($guia.value == 'individual'){
                $par_ent_div.style.display = 'none';
                $par_ser_div.style.display = 'none';
                $numero_parcela_div.style.display = 'none';
                if($tipo_guia.value == 'entidade'){
                    $entidade_div.style.display = 'flex';
                    $servidor_div.style.display = 'none';
                }else if($tipo_guia.value == 'servidor'){
                    $entidade_div.style.display = 'none';
                    $servidor_div.style.display = 'flex';
                }
                disabilitar_calculo();
                zerar();
                habilitar();
                $pagamento.disabled = false;
                $vencimento.disabled = false;
                $base_patronal.disabled = false;
                $folha_bruta.disabled = false;
                $calcula.disabled = false;
                $calcula.value = 'patronal';
            }else if($guia.value == 'parcelamento'){
                if($tipo_guia.value == 'entidade'){
                    $par_ser_div.style.display = 'none';
                    $par_ent_div.style.display = 'flex';
                    $numero_parcela.innerHTML = '';
                   for($i=1;$i<=$parcela_entidade.value;$i++){
                        $numero_parcela.innerHTML += "<option>"+$i+"</option>"
                    }

                    var id_js = $('#parcelamento_entidade').val();
                    console.log(id_js);
                    $.ajax({
                        url:'<?=base_url()?>Guia/parcelamento_detalhes',
                        method: 'post',
                        data: {id_js: id_js},
                        dataType: 'json',
                        success: function(response){
                            var len = response.length;
                            $('#valor_patronal').text('');
                            if(len > 0){
                                var ultimo = response[len-1].numero_parcela;
                                var valor = response[len-1].valor;
                                var valor_ci = valor*ultimo;
                                
                                $numero_parcela.innerHTML = "";
                                response.forEach(function(response){
                                    if(response.guia_id == 0){
                                        $numero_parcela.innerHTML += "<option>"+response.numero_parcela+"</option>"
                                    }
                                })
                                
                                $valor_patronal.disabled = false;
                                $valor_patronal.readOnly = true;
                                $valor_patronal.value = valor_ci;
                                $observacao.disabled = false;
                            }
                        }
                    });

                }else if($tipo_guia.value == 'servidor'){
                    $par_ser_div.style.display = 'flex';
                    $par_ent_div.style.display = 'none';
                    $numero_parcela.innerHTML = '';
                        for($i=1;$i<=$parcela_servidor.value;$i++){
                            $numero_parcela.innerHTML += "<option>"+$i+"</option>"
                        }

                        var id_js = $('#parcelamento_servidor').val();
                    console.log(id_js);
                    $.ajax({
                        url:'<?=base_url()?>Guia/parcelamento_detalhes',
                        method: 'post',
                        data: {id_js: id_js},
                        dataType: 'json',
                        success: function(response){
                            var len = response.length;
                            $('#valor_patronal').text('');
                            if(len > 0){
                                console.log('opa')
                                var ultimo = response[len-1].numero_parcela;
                                var valor = response[len-1].valor;
                                var valor_ci = valor*ultimo;
                                
                                $numero_parcela.innerHTML = "";
                                response.forEach(function(response){
                                    if(response.guia_id == 0){
                                        $numero_parcela.innerHTML += "<option>"+response.numero_parcela+"</option>"
                                    }
                                })
                                
                                $valor_patronal.disabled = false;
                                $valor_patronal.readOnly = true;
                                $valor_patronal.value = valor_ci;
                                $observacao.disabled = false;
                            }
                        }
                    });
                    
                }
                disabilitar_calculo();
                zerar();
                $entidade_div.style.display = 'none';
                $servidor_div.style.display = 'none';
                $numero_parcela_div.style.display = 'flex';
                $calcula.disabled  = true;
                $calcula.value = 'avulsa_parcelamento';
                $valor_patronal.disabled = false;
                $valor_patronal.disabled = true;
                $vencimento.disabled = false;
                $observacao.disabled = false;
                $pagamento.disabled = false;
            }
        })

        $('#tipo_guia').change(function(){
            if($guia.value == 'individual'){
                if($tipo_guia.value == 'entidade'){
                    $servidor_div.style.display = 'none';
                    $entidade_div.style.display = 'flex';
                }else if($tipo_guia.value == 'servidor'){
                    $entidade_div.style.display = 'none';
                    $servidor_div.style.display = 'flex';
                }
                disabilitar_calculo();
                zerar();
                habilitar();
                $pagamento.disabled = false;
                $vencimento.disabled = false;
                $base_patronal.disabled = false;
                $folha_bruta.disabled = false;
            }else if($guia.value == 'parcelamento'){
                if($tipo_guia.value == 'entidade'){
                    $par_ser_div.style.display = 'none';
                    $par_ent_div.style.display = 'flex';
                    $numero_parcela_div.style.display = 'flex';
                    $numero_parcela.innerHTML = '';
                    for($i=1;$i<=$parcela_entidade.value;$i++){
                        $numero_parcela.innerHTML += "<option>"+$i+"</option>"
                    }

                    var id_js = $('#parcelamento_entidade').val();
                    console.log(id_js);
                    $.ajax({
                        url:'<?=base_url()?>Guia/parcelamento_detalhes',
                        method: 'post',
                        data: {id_js: id_js},
                        dataType: 'json',
                        success: function(response){
                            var len = response.length;
                            $('#valor_patronal').text('');
                            if(len > 0){
                                var ultimo = response[len-1].numero_parcela;
                                var valor = response[len-1].valor;
                                var valor_ci = valor*ultimo;
                                
                                $numero_parcela.innerHTML = "";
                                response.forEach(function(response){
                                    if(response.guia_id == 0){
                                        $numero_parcela.innerHTML += "<option>"+response.numero_parcela+"</option>"
                                    }
                                })
                                
                                $valor_patronal.disabled = false;
                                $valor_patronal.readOnly = true;
                                $valor_patronal.value = valor_ci;
                                $observacao.disabled = false;
                            }
                        }
                    });

                }else if($tipo_guia.value == 'servidor'){
                    $par_ser_div.style.display = 'flex';
                    $par_ent_div.style.display = 'none';
                    $numero_parcela_div.style.display = 'flex';
                    $numero_parcela.innerHTML = '';
                    for($i=1;$i<=$parcela_servidor.value;$i++){
                            $numero_parcela.innerHTML += "<option>"+$i+"</option>"
                    }

                    var id_js = $('#parcelamento_servidor').val();
                    console.log(id_js);
                    $.ajax({
                        url:'<?=base_url()?>Guia/parcelamento_detalhes',
                        method: 'post',
                        data: {id_js: id_js},
                        dataType: 'json',
                        success: function(response){
                            var len = response.length;
                            $('#valor_patronal').text('');
                            if(len > 0){
                                var ultimo = response[len-1].numero_parcela;
                                var valor = response[len-1].valor;
                                var valor_ci = valor*ultimo;
                                
                                $numero_parcela.innerHTML = "";
                                response.forEach(function(response){
                                    if(response.guia_id == 0){
                                        $numero_parcela.innerHTML += "<option>"+response.numero_parcela+"</option>"
                                    }
                                })
                                
                                $valor_patronal.disabled = false;
                                $valor_patronal.readOnly = true;
                                $valor_patronal.value = valor_ci;
                                $observacao.disabled = false;
                            }
                        }
                    });

                }
            }
        })

        $('#calcula').change(function(){
            if($calcula.value == ''){           
                zerar();  
                disabilitar_calculo();
            }else if($calcula.value == 'patronal'){
                disabilitar_calculo();
                zerar();
                habilitar();
                $pagamento.disabled = false;
                $vencimento.disabled = false;
                $base_patronal.disabled = false;
                $folha_bruta.disabled = false;
            }else if($calcula.value == 'funcional'){
                disabilitar_calculo();
                zerar();
                habilitar();
                $pagamento.disabled = false;
                $vencimento.disabled = false;
                $base_funcional.disabled = false;
                $folha_bruta.disabled = false;
            }else if($calcula.value == 'funcional_patronal'){
                disabilitar_calculo();
                zerar();
                habilitar();
                $pagamento.disabled = false;
                $vencimento.disabled = false;
                $valor_base.disabled = false;
                $base_patronal.disabled = false;
                $base_funcional.disabled = false;
                $folha_bruta.disabled = false;


            }else if($calcula.value == 'avulsa_parcelamento'){
                disabilitar_calculo();
                zerar();
                $pagamento.disabled = false;
                $observacao.disabled = false;
                $vencimento.disabled = false;
                $valor_patronal.disabled = false;
                $valor_funcional.disabled = false;
            }
        })


    });

    function limpar(){
        if($guia.value == 'individual'){
            $parcela_entidade.value = '';
            $parcela_servidor.value = '';
            $numero_parcela.value = '';
            if($tipo_guia.value == 'entidade'){
                $servidor_esc.value = '';
            }else if($tipo_guia.value == 'servidor'){
                $entidade_esc.value = ''; 
            }
        }else if($guia.value == 'parcelamento'){
            $entidade_esc.value = '';
            $servidor_esc.value = '';
            if($tipo_guia.value == 'entidade'){
                $parcela_servidor.value = '';
            }else if($tipo_guia.value == 'servidor'){
                $parcela_entidade.value = '';
                            
            }
        }
    }

    btn.addEventListener("click", limpar);
</script>