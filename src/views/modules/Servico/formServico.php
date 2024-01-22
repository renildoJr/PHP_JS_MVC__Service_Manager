<h1 class="heading hd-1 txt-center"><?= ($model->getId()) ? 'Atualizar Serviço' : 'Cadastrar Serviço' ?></h1>
<form class="form" action="<?=LINK_SERVICO?>/form/save" method="POST">
    <header class="form__header">
        <button class="btn btn--type-text btn-close fa-solid fa-xmark"></button>
        <h3 class="heading hd-3"><?= ($model->getId()) ? $model->getNome() : 'Novo Cliente' ?></h3>
    </header>
    <h4 class="heading hd-4 txt-center">Informações do Serviço</h4>
    <input type="hidden" name="id" value="<?=$model->getId()?>">
    <label for="nome">Nome</label>
    <input type="text" name="nome" id="nome" placeholder="Nome do serviço" value="<?= $model->getNome()?>">
    <label for="descricao">Descrição</label>
    <input type="text" name="descricao" id="descricao" placeholder="Descrição do serviço" value="<?=$model->getDescricao()?>">
    <label for="categoriaId">Categoria</label>
    <input type="text" name="categoriaId" id="categoriaId" placeholder="Categoria" value="<?=$model->getCategoriaId()?>">
    <label for="preco">Preço</label>
    <input type="number" name="preco" id="preco" placeholder="ex: 100.00" value="<?=$model->getPreco()?>" step=".01">
    <label for="calculo">Cálculo</label>
    <select name="calculo" id="calculo">
        <option value="1" <?= $model->getPreco() && $model->getCalculo() == "1" ? "selected" : "" ?>>Quantidade</option>
        <option value="2" <?= $model->getPreco() && $model->getCalculo() == "2" ? "selected" : "" ?>>M²</option>
    </select>
    <input class="btn btn--primary" type="submit" value="<?= ($model->getId()) ? 'Atualizar' : 'Cadastrar'?>">
</form>
