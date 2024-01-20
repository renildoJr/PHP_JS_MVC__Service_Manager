<h1 class="heading hd-1 txt-center">Lista de Serviços</h1>

<?php if($model->rows) : ?>
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
        <?php foreach($model->rows as $row) : ?>
        <tr>
            <td>
                <a href="<?=LINK_SERVICO."?id=$row->id"?>" class="fas fa-trash-alt"></a>
                <a href="<?=LINK_SERVICO."/form?id=$row->id"?>" class="fas fa-edit"></a>
            </td>
            <?php foreach($row as $val) : ?>
                <td><?=$val?>
            <?php endforeach ?>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>
<?php else : ?>
<h4 class="txt-center">Nenhum Registro Encontrado</h4>

<?php endif ?>