<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Gerenciamento | Lista de Produtos </title>
    <link rel="stylesheet" href="<?=LINK_HOST?>/View/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <!-- header -->
    <header class="page-header">
        <div class="container">
            <?php include "View/partials/header.php"?>
        </div>
    </header>
    <!-- header end -->

    <!-- Main -->
    <main class="page-main">
        <div class="container">
            <h1 class="page-title">Produtos</h1>
            <table>
                <thead>
                    <tr>
                        <th></th>
                        <th>Id</th>
                        <th>Nome</th>
                        <th>Descrição</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($model->rows as $row) : ?>
                    <tr>
                        <td><a href="<?=LINK_VIEW_PRODUTOS."?id={$row->id}"?>"class="fa-solid fa-trash"></a></td>
                        <td><?=$row->id?></td>
                        <td><a href="<?=LINK_VIEW_PRODUTOS_FORM?>?id=<?= $row->id?>"><?=$row->nome?></a></td>
                        <td><?=$row->descricao?></td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </main>
    <!-- Main end -->

    <!-- footer -->
    <footer class="page-footer">
        <div class="container">
            <?php include "View/partials/footer.php"?>
        </div>
    </footer>
    <!-- footer end -->
</body>
</html>