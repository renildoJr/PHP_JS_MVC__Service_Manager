<h1 class="heading hd-1 txt-center">Lista de Clientes</h1>
<?php if($model->getRows()) : ?>
<table class="table">
    <thead>
        <tr>
            <th>Ações</th>
            <th>Id</th>
            <th>Nome Completo</th>
            <th>Telefone</th>
            <th>CEP</th>
            <th>Número</th>
            <th>Complemento</th>
            <th>Rua</th>
            <th>Bairro</th>
            <th>Cidade</th>
            <th>Estado</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($model->getRows() as $row) : ?>
        <tr>
            <td>
                <a href="<?=LINK_CLIENTE."?id=$row->id"?>" class="fas fa-trash-alt"></a>
                <a href="<?=LINK_CLIENTE."/form?id=$row->id"?>" class="fas fa-edit"></a>
            </td>
            <?php foreach($row as $val) : ?>
                <td><?=$val?>
            <?php endforeach ?>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>
<?php else : ?>
<h4 class="txt-center">Nenhum Registro Encontrado</h4>
<?php endif ?>