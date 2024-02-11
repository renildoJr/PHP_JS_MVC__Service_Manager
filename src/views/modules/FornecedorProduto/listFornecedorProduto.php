<h1 class="heading hd-1 txt-center">Lista de Fornecedores e Seus Produtos</h1>


<?php if($model) : ?>
    <?php foreach($model as $row) : ?>

        <h2 style="text-align: center;"><?=$row["fornecedor"]["nome"]?></h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Produtos</th>
                    <th colspan="2">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($row["produtos"] as $prod) : ?>
                    <tr>
                        <td><?=$prod["id"]?></td>
                        <td><?=$prod["nome"]?></td>
                        <td title="Editar este produto"><a href="<?=LINK_PRODUTO."/form?id=".$prod["id"]?>">Editar </a></td>
                        <!-- Alterar o código abaixo posteriormente -->
                        <td title="Remover deste fornecedor"><a href="<?=LINK_FORNECEDOR_PRODUTO."/form?id=".$prod["id"]?>">Remover desta lista</a></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    <?php endforeach ?>
<?php else : ?>
<h4 class="txt-center">Nenhum Registro Encontrado</h4>
<?php endif ?>