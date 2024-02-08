<h1 class="heading hd-1 txt-center">Lista de Produtos de :::NOME DO FORNECEDOR:::</h1>

<?php 

$model = $model->getRows();

?>

<?php if($model) : ?>
    <?php for($i = 0; $i < count($model); $i++) : ?>
        <h2 style="text-align: center;"><?=$model[$i]->tituloFornecedor?></h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Produtos</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if($model[$i]->produtos_fornecidos) {
                    $prods = explode(",", $model[$i]->produtos_fornecidos);
                    foreach($prods as $prod) {
                        $prodId = substr($prod, 0, 1);
                        $prodName = substr($prod, 1, strlen($prod));
                        echo "<tr>";
                            echo "<td>".$prodId."</td>";
                            echo "<td>".$prodName."</td>";
                            echo "<td><a href=".LINK_PRODUTO."/form?id=$prodId>Editar </a><a href='#remover'>Remover desta lista</a></td>";
                        echo "</tr>";
                    }
                }else {
                    echo "<tr>";
                        echo "<td colspan='3'>Não há produtos desse fornecedor</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    <?php endfor ?>
<?php else : ?>
<h4 class="txt-center">Nenhum Registro Encontrado</h4>
<?php endif ?>