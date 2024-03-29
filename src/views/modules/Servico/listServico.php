<?php 
// Adaptar este array para a classe ServicoController 
$calculosList = [
    "1" => "Quantidade",
    "2" => "M²"
]
?>
<h1 class="heading hd-1 txt-center">Lista de Serviços</h1>
<?php if($model->getRows()) : ?>
<table class="table">
    <thead>
        <tr>
            <th>Ações</th>
            <th>Id</th>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Categoria</th>
            <th>Preço</th>
            <th>Cálculo</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($model->getRows() as $row) : ?>
        <tr>
            <td>
                <a href="<?=LINK_SERVICO."?id=$row->id"?>" class="fas fa-trash-alt"></a>
                <a href="<?=LINK_SERVICO."/form?id=$row->id"?>" class="fas fa-edit"></a>
            </td>
            <?php foreach($row as $key=>$val) : ?>
                <?php if($key !== "categoriaId" && $key !== "calculo") :?>
                    <td><?=$val?>
                <?php else : 
                    foreach($model->getCategoriaRows() as $catg) : 
                        if($catg->id == $val && $key !== "calculo") {?>
                            <td><?=$catg->nome?></td>
                        <?php }
                    ?>
                <?php 
                    endforeach;
                endif ?>
            <?php endforeach ?>
            <td><?=$calculosList[$row->calculo]?></td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>
<?php else : ?>
<h4 class="txt-center">Nenhum Registro Encontrado</h4>
<?php endif ?>