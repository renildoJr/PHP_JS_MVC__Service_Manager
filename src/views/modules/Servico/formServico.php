<h1 class="heading hd-1 txt-center"><?= !empty($model->id) ? 'Atualizar Serviço' : 'Cadastrar Serviço' ?></h1>
<form class="form" action="<?=LINK_SERVICO?>/form/save" method="POST">
    <header class="form__header">
        <button class="btn btn--type-text btn-close fa-solid fa-xmark"></button>
        <h3 class="heading hd-3"><?= !empty($model->id) ? $model->nome : 'Novo Cliente' ?></h3>
    </header>

    <?php 
        function hasValue($model, string $prop) {
            return isset($model->$prop) ? $model->$prop : "";
        }
    ?>

    <h4 class="heading hd-4 txt-center">Informações do Serviço</h4>
    <input type="hidden" name="input_id" value="<?php if(isset($_GET["id"])){ echo $model->id; } ?>">
    <label for="input_nome">Nome</label>
    <input type="text" name="input_nome" id="input_nome" placeholder="Nome do serviço" value="<?= hasValue($model, "nome")?>">
    <label for="input_descricao">Descrição</label>
    <input type="text" name="input_descricao" id="input_descricao" placeholder="Descrição do serviço" value="<?= hasValue($model, "descricao")?>">
    <label for="input_categoriaId">Categoria</label>
    <input type="text" name="input_categoriaId" id="input_categoriaId" placeholder="Categoria" value="<?= hasValue($model, "categoriaId")?>">
    <label for="input_preco">Preço</label>
    <input type="number" name="input_preco" id="input_preco" placeholder="ex: 100.00" value="<?=hasValue($model, 'preco')?>">
    <label for="input_calculo">Cálculo</label>
    <select name="input_calculo" id="input_calculo">
        <option value="1" <?php if(hasValue($model, 'calculo') && $model->calculo == "1") echo "selected"; ?>>Quantidade</option>
        <option value="2" <?php if(hasValue($model, 'calculo') && $model->calculo == "2") echo "selected"; ?>>M²</option>
    </select>
    <!-- <div class="msg-input msg--alt msg--error">Must contain 1 uppercase letter, 1 number, min. 8 characters.</div> -->
    <input class="btn btn--primary" type="submit" value="<?= !empty($model->id) ? 'Atualizar' : 'Cadastrar'?>">
</form>
