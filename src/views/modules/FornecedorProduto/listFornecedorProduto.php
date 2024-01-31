<h1 class="heading hd-1 txt-center">Lista de Produtos de :::NOME DO FORNECEDOR:::</h1>

<?php 

$model = $model->getRows();

?>

<?php if($model) : ?>
<table class="table">
    <?php for($i = 0; $i < count($model); $i++) : ?>
        <h2><?=$model[$i]->tituloFornecedor?></h2>
        <table>
            <thead>
                <tr>
                    <th><?=$model[$i]->produtos_fornecidos?></th>
                </tr>
            </thead>
        </table>
    <?php endfor ?>
<?php else : ?>
<h4 class="txt-center">Nenhum Registro Encontrado</h4>
<?php endif ?>