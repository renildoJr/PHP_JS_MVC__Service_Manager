<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Gerenciamento | Cadastro de Produto </title>
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
            <h1 class="page-title"><?= isset($_GET["id"]) ? "Alterar Produto" : "Cadastro de Produto"?></h1>
            <form action="<?= LINK_VIEW_PRODUTOS_FORM?>/save" method="POST">
                <label for="prod_nome">Nome</label>
                <input type="text" name="prod_nome" id="prod_nome" value="<?=$model->nome ?>" placeholder="ex: Caixa de Ferramentas">
                <!-- <p class="msg msg-input msg-input--error">Preencha este campo corretamente.</p> -->
                <label for="prod_desc">Descrição</label>
                <input type="text" name="prod_desc" id="prod_desc" value="<?=$model->descricao ?>" placeholder="ex: este produto serve para....">
                <input type="submit" class="btn btn--primary" value="<?= isset($_GET["id"]) ? "Salvar" : "Cadastrar"?>">
            </form>
            <?php if(isset($_GET["id"])) : ?>
                <a href="<?=LINK_VIEW_PRODUTOS?>">Voltar</a>
            <?php endif ?>
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