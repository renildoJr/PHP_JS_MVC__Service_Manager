<h1 class="heading hd-1 txt-center">Lista de Produtos de :::NOME DO FORNECEDOR:::</h1>
<?php var_dump($model->getRows()) ?>
<?php if($model->getRows()) : ?>
<table class="table">
    <thead>
        <tr>
            <th>Ações</th>
            <th>Id</th>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Produtos</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($model->getRows() as $row) : ?>
        
        <?php endforeach ?>
    </tbody>
</table>
<?php else : ?>
<h4 class="txt-center">Nenhum Registro Encontrado</h4>
<?php endif ?>