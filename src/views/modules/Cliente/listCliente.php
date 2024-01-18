<h1 class="heading hd-1 txt-center">Lista de Clientes</h1>

<table class="table">
    <thead>
        <tr>
            <th>Ações</th>
            <th>Id</th>
            <th>Nome Completo</th>
            <th>Telefone</th>
            <th>CEP</th>
            <th>Rua</th>
            <th>Número</th>
            <th>Complemento</th>
            <th>Bairro</th>
            <th>Cidade</th>
            <th>Estado</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($model->rows as $row) : ?>
        <tr>
            <td>
                <a href="<?=LINK_CLIENTE."?id=$row->id"?>" class="fas fa-trash-alt"></a>
                <a href="<?=LINK_CLIENTE_FORM."?id=$row->id"?>" class="fas fa-edit"></a>
            </td>
            <?php foreach($row as $val) : ?>
                <td><?=$val?>
            <?php endforeach ?>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>
