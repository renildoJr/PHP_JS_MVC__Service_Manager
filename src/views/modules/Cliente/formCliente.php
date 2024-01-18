<h1 class="heading hd-1 txt-center">Cadastrar Cliente</h1>
<form class="form" action="<?=LINK_CLIENTE_FORM?>/save" method="POST">
    <header class="form__header">
        <button class="btn btn--type-text btn-close fa-solid fa-xmark"></button>
        <h3 class="heading hd-3">Novo Cliente</h3>
    </header>
    <h4 class="txt-center" >Informações Principais</h4>
    <label for="input_nomeCompleto">Nome Completo</label>
    <input type="hidden" name="input_id">
    <input type="text" name="input_nomeCompleto" id="input_nomeCompleto" placeholder="Nome completo do cliente" value="">
    <label for="input_telefone">Telefone</label>
    <input type="number" name="input_telefone" id="input_telefone" placeholder="81912345678" value="">
    <h4 class="txt-center" >Endereço</h4>
    <label for="input_end_cep">CEP</label>
    <input type="number" name="input_end_cep" id="input_end_cep" placeholder="50761000" value="">
    <label for="input_end_rua">Rua</label>
    <input type="text" name="input_end_rua" id="input_end_rua" placeholder="Rua exemplo..." value="">
    <label for="input_end_num">Número</label>
    <input type="number" name="input_end_num" id="input_end_num" placeholder="ex: 1295" value="">
    <label for="input_end_comp">Complemento</label>
    <input type="text" name="input_end_comp" id="input_end_comp" placeholder="A, B, C, 2º andar" value="">
    <label for="input_end_bairro">Bairro</label>
    <input type="text" name="input_end_bairro" id="input_end_bairro" placeholder="ex: San Martin" value="">
    <label for="input_end_cidade">Cidade</label>
    <input type="text" name="input_end_cidade" id="input_end_cidade" placeholder="ex: San Martin" value="">
    <label for="input_end_estado">Estado</label>
    <input type="text" name="input_end_estado" id="input_end_estado" placeholder="ex: San Martin" value="">
    <div class="msg-input msg--alt msg--error">Must contain 1 uppercase letter, 1 number, min. 8 characters.</div>
    <input class="btn btn--primary" type="submit" value="Cadastrar">
</form>
