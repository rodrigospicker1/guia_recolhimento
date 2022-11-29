<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">

<div class="table-responsive">
		<table class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>#</th>
					<th>Tipo de parcelamento</th>
					<th>Servidor ou entidade</th>
					<th>Emissão</th>
					<th>Numero de parcelas</th>
                    <th>Valor</th>
					<th>Valor de cada parcela</th>
				</tr>
			</thead>
			<tbody>
                <?php foreach($parcelamentos as $parcelamento) : ?>
                    <tr>
                        <td><?= $parcelamento['id'] ?></td>
                        <td><?= $parcelamento['tipo_parcelamento'] ?></td>
                        <td><?php 
                        if($parcelamento['tipo_parcelamento'] == 'entidade'){
                            $id = $parcelamento['entidade_id'];
                            foreach($entidades as $entidade){if($entidade['id']==$id){echo $entidade['razao_social'];}};
                        }else{
                            $id2 = $parcelamento['servidor_id'];
                            foreach($servidores as $servidor){if($servidor['id']==$id2){echo $servidor['nome'];}};
                        } ?></td>
                        <td><?= $parcelamento['emissao'] ?></td>
                        <td><?= $parcelamento['numero_de_parcelas'] ?></td>
                        <td><?= $parcelamento['valor'] ?></td>
                        <td><?= $parcelamento['valor_parcela'] ?></td>
                    </tr>
                <?php endforeach; ?>
			</tbody>
		</table>
	</div>

</main>