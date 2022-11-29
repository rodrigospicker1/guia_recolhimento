<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">

<div class="table-responsive">
		<table class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>#</th>
					<th>Guia</th>
					<th>Tipo de guia</th>
					<th>Servidor ou entidade</th>
					<th>Competência</th>
					<th>Calculo</th>
				</tr>
			</thead>
			<tbody>
                <?php foreach($guias as $guia) : ?>
                    <tr>
                        <td><?= $guia['id'] ?></td>
                        <td><?= $guia['guia'] ?></td>
                        <td><?= $guia['tipo_guia'] ?></td>
                        <td><?php 
                        if($guia['tipo_guia'] == 'entidade'){
                            $id = $guia['entidade_id'];
                            foreach($entidades as $entidade){if($entidade['id']==$id){echo $entidade['razao_social'];}};
                        }else{
                            $id2 = $guia['servidor_id'];
                            foreach($servidores as $servidor){if($servidor['id']==$id2){echo $servidor['nome'];}};
                        } ?></td>
                        <td><?= $guia['competencia'] ?></td>
                        <td><?= $guia['calcula'] ?></td>
                    </tr>
                <?php endforeach; ?>
			</tbody>
		</table>
	</div>

</main>