
<?php if($model->getRows()) : ?>
<table class="table">
    <thead>
        <tr>
            <th>Ações</th>
            <th>Id</th>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Categoria</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($model->getRows() as $row) : ?>
        <tr>
            <td>
                <a href="<?=LINK_PRODUTO."?id=$row->id"?>" class="fas fa-trash-alt"></a>
                <a href="<?=LINK_PRODUTO."/form?id=$row->id"?>" class="fas fa-edit"></a>
            </td>
            <?php foreach($row as $key=>$val) : ?>
                <?php if($key !== "categoriaId") : ?>
                    <td><?=$val?>
                <?php else : 
                    foreach($model->getCategoriaRows() as $catg) : 
                        if($catg->id == $val) {?>
                            <td><?=$catg->nome?></td>
                        <?php }
                    ?>
                <?php 
                    endforeach;
                endif ?>
            <?php endforeach ?>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>
<?php else : ?>
<h4 class="txt-center">Nenhum Registro Encontrado</h4>
<?php endif ?>