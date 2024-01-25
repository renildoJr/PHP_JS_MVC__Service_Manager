<h1 class="heading hd-1 txt-center"><?= $model->getId() ? 'Atualizar Cliente' : 'Cadastrar Cliente' ?></h1>
<form class="form" action="<?=LINK_CLIENTE?>/form/save" method="POST">
    <header class="form__header">
        <button class="btn btn--type-text btn-close fa-solid fa-xmark"></button>
        <h3 class="heading hd-3"><?= $model->getId() ? explode(" ", $model->getNomeCompleto())[0] : 'Novo Cliente' ?></h3>
    </header>
    <h4 class="heading hd-4 txt-center">Informações Principais</h4>
    <input type="hidden" name="id" value="<?= $model->getId()?>">
    <label for="nomeCompleto">Nome Completo</label>
    <input type="text" name="nomeCompleto" id="nomeCompleto" placeholder="Nome completo do cliente" value="<?= $model->getNomeCompleto()?>">
    <label for="telefone">Telefone</label>
    <input type="number" name="telefone" id="telefone" placeholder="81912345678" value="<?= $model->getTelefone()?>">
    <h4 class="heading hd-4 txt-center" >Endereço</h4>
    <label for="end_cep">CEP</label>
    <input type="number" name="end_cep" id="end_cep" placeholder="50761000" value="<?= $model->getEnd_cep()?>">
    <label for="end_rua">Rua</label>
    <input type="text" name="end_rua" id="end_rua" placeholder="Rua exemplo..." value="">
    <label for="end_num">Número</label>
    <input type="number" name="end_num" id="end_num" placeholder="ex: 1295" value="<?= $model->getEnd_num()?>">
    <label for="end_comp">Complemento</label>
    <input type="text" name="end_comp" id="end_comp" placeholder="A, B, C, 2º andar" value="">
    <label for="end_bairro">Bairro</label>
    <input type="text" name="end_bairro" id="end_bairro" placeholder="ex: San Martin" value="">
    <label for="end_cidade">Cidade</label>
    <input type="text" name="end_cidade" id="end_cidade" placeholder="ex: Recife" value="">
    <label for="end_estado">Estado</label>
    <input type="text" name="end_estado" id="end_estado" placeholder="ex: PE" value="">
    <div class="msg-input msg--alt msg--error">Must contain 1 uppercase letter, 1 number, min. 8 characters.</div>
    <input class="btn btn--primary" type="submit" value="<?= $model->getId() ? 'Atualizar' : 'Cadastrar'?>">
</form>