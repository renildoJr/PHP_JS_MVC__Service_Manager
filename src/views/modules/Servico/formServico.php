<?php 
// Adaptar este array para a classe ServicoController 
$calculosList = [
    "Quantidade" => 1,
    "M²" => 2
]
?>
<h1 class="heading hd-1 txt-center"><?= ($model->getId()) ? 'Atualizar Serviço' : 'Cadastrar Serviço' ?></h1>
<form class="form" action="<?=LINK_SERVICO?>/form/save" method="POST">
    <header class="form__header">
        <button class="btn btn--type-text btn-close fa-solid fa-xmark"></button>
        <h3 class="heading hd-3"><?= ($model->getId()) ? $model->getNome() : 'Novo Serviço' ?></h3>
    </header>
    <h4 class="heading hd-4 txt-center">Informações do Serviço</h4>
    <input type="hidden" name="id" value="<?=$model->getId()?>">
    <label for="nome">Nome</label>
    <input type="text" name="nome" id="nome" placeholder="Nome do serviço" value="<?= $model->getNome()?>">
    <label for="descricao">Descrição</label>
    <input type="text" name="descricao" id="descricao" placeholder="Descrição do serviço" value="<?=$model->getDescricao()?>">
    <label for="categoriaId">Categoria</label>
    <select name="categoriaId" class="select" id="categoriaId">


        <!-- Implementar esta lógica utilizando o evento OnChange() -->
        <option value="null"><a href="<?=LINK_CATEGORIA_SERVICO?>?new=true"><strong>Nova Categoria <i class="fa-solid fa-plus"></i></strong></a></option>


        <?php foreach($model->getCategoriaRows() as $catgRow) : ?>
            <option value="<?= $catgRow->id ?>" <?= $catgRow->id == $model->getCategoriaId() ? "selected" : "" ?>><?=$catgRow->nome?></option>            
        <?php endforeach ?>
    </select>
    <label for="preco">Preço</label>
    <input type="number" name="preco" id="preco" placeholder="ex: 100.00" value="<?=$model->getPreco()?>" step=".01">
    <label for="calculo">Cálculo</label>
    <select name="calculo" id="calculo">
        <?php foreach($calculosList as $calc=>$val) : ?>
        <option value="<?=$val?>" <?= $model->getCalculo() === $val ? "selected" : ""?>><?=$calc?></option>
        <?php endforeach ?>
    </select>
    <input class="btn btn--primary" type="submit" value="<?= ($model->getId()) ? 'Atualizar' : 'Cadastrar'?>">
</form>