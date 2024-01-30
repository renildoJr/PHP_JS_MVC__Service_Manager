<h1 class="heading hd-1 txt-center"><?= ($model->getId()) ? 'Atualizar Fornecedor' : 'Cadastrar Fornecedor' ?></h1>
<form class="form" action="<?=LINK_FORNECEDOR?>/form/save" method="POST">
    <header class="form__header">
        <button class="btn btn--type-text btn-close fa-solid fa-xmark"></button>
        <h3 class="heading hd-3"><?= ($model->getId()) ? $model->getNome() : 'Novo Fornecedor' ?></h3>
    </header>
    <h4 class="heading hd-4 txt-center">Informações do Fornecedor</h4>
    <input type="hidden" name="id" value="<?=$model->getId()?>">
    <label for="nome">Nome</label>
    <input type="text" name="nome" id="nome" placeholder="Nome do Fornecedor" value="<?= $model->getNome()?>">
    <label for="descricao">Descrição</label>
    <input type="text" name="descricao" id="descricao" placeholder="Descrição do Fornecedor" value="<?=$model->getDescricao()?>">
    <input class="btn btn--primary" type="submit" value="<?= ($model->getId()) ? 'Atualizar' : 'Cadastrar'?>">
</form>