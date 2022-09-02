<h1 class="mt-4 text-center">Cadastro de Clientes</h1>

<div class="card shadow-lg p-3 rounded">
    <div class="card-body">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <label for="nome">Nome</label>
                    <input type="text" name="nome" id="nome" class="form-control <?php if ($validate->hasErro('nome', $validate->errors())) : ?> is-invalid <?php endif; ?>" value="" aria-describedby="validationServerNome" placeholder="Nome">
                    <?php if ($validate->hasErro('nome', $validate->errors())) : ?>
                        <div id="validationServerNome" class="invalid-feedback">
                            <?= $validate->errorMessage('nome', $validate->errors()) ?>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="documento">Documento</label>
                    <input type="number" name="documento" id="documento" class="form-control <?php if ($validate->hasErro('documento', $validate->errors())) : ?> is-invalid <?php endif; ?>" aria-describedby="validationServerDocumento" placeholder="Documento" step="1">
                    <?php if ($validate->hasErro('documento', $validate->errors())) : ?>
                        <div id="validationServerDocumento" class="invalid-feedback">
                            <?= $validate->errorMessage('documento', $validate->errors()) ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <label for="telefone">Telefone</label>
                    <input type="text" name="telefone" id="telefone" class="form-control <?php if ($validate->hasErro('telefone', $validate->errors())) : ?> is-invalid <?php endif; ?>" value="" aria-describedby="validationServerTelefone" placeholder="Telefone">
                    <?php if ($validate->hasErro('telefone', $validate->errors())) : ?>
                        <div id="validationServerTelefone" class="invalid-feedback">
                            <?= $validate->errorMessage('telefone', $validate->errors()) ?>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="email">E-mail</label>
                    <input type="email" name="email" id="email" class="form-control <?php if ($validate->hasErro('email', $validate->errors())) : ?> is-invalid <?php endif; ?>" aria-describedby="validationServerEmail" placeholder="E-mail" step="1">
                    <?php if ($validate->hasErro('email', $validate->errors())) : ?>
                        <div id="validationServerEmail" class="invalid-feedback">
                            <?= $validate->errorMessage('email', $validate->errors()) ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <div class="form-row">
                <div class="col-md-3 mb-3">
                    <label for="cep">CEP</label>
                    <input type="number" name="cep" id="cep" class="form-control <?php if ($validate->hasErro('cep', $validate->errors())) : ?> is-invalid <?php endif; ?>" aria-describedby="validationServerCep" placeholder="CEP" step="1">
                    <?php if ($validate->hasErro('cep', $validate->errors())) : ?>
                        <div id="validationServerCep" class="invalid-feedback">
                            <?= $validate->errorMessage('cep', $validate->errors()) ?>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="col-md-3 mb-3">
                    <label for="uf">UF</label>
                    <select name="uf" id="uf" class="custom-select <?php if ($validate->hasErro('uf', $validate->errors())) : ?> is-invalid <?php endif; ?>" aria-describedby="validationServerUf">
                        <option selected value="">Selecione...</option>
                        <option value="AC">Acre</option>
                        <option value="AL">Alagoas</option>
                        <option value="AP">Amapá</option>
                        <option value="AM">Amazonas</option>
                        <option value="BA">Bahia</option>
                        <option value="CE">Ceará</option>
                        <option value="DF">Distrito Federal</option>
                        <option value="ES">Espírito Santo</option>
                        <option value="GO">Goiás</option>
                        <option value="MA">Maranhão</option>
                        <option value="MT">Mato Grosso</option>
                        <option value="MS">Mato Grosso do Sul</option>
                        <option value="MG">Minas Gerais</option>
                        <option value="PA">Pará</option>
                        <option value="PB">Paraíba</option>
                        <option value="PR">Paraná</option>
                        <option value="PE">Pernambuco</option>
                        <option value="PI">Piauí</option>
                        <option value="RJ">Rio de Janeiro</option>
                        <option value="RN">Rio Grande do Norte</option>
                        <option value="RS">Rio Grande do Sul</option>
                        <option value="RO">Rondônia</option>
                        <option value="RR">Roraima</option>
                        <option value="SC">Santa Catarina</option>
                        <option value="SP">São Paulo</option>
                        <option value="SE">Sergipe</option>
                        <option value="TO">Tocantins</option>
                        <option value="EX">Estrangeiro</option>
                    </select>
                    <?php if ($validate->hasErro('uf', $validate->errors())) : ?>
                        <div id="validationServerUf" class="invalid-feedback">
                            <?= $validate->errorMessage('uf', $validate->errors()) ?>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="cidade">Cidade</label>
                    <input type="text" name="cidade" id="cidade" class="form-control <?php if ($validate->hasErro('cidade', $validate->errors())) : ?> is-invalid <?php endif; ?>" aria-describedby="validationServerCidade" placeholder="Cidade">
                    <?php if ($validate->hasErro('cidade', $validate->errors())) : ?>
                        <div id="validationServerCidade" class="invalid-feedback">
                            <?= $validate->errorMessage('cidade', $validate->errors()) ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <label for="bairro">Bairro</label>
                    <input type="text" name="bairro" id="bairro" class="form-control <?php if ($validate->hasErro('bairro', $validate->errors())) : ?> is-invalid <?php endif; ?>" aria-describedby="validationServerBairro" placeholder="Bairro">
                    <?php if ($validate->hasErro('bairro', $validate->errors())) : ?>
                        <div id="validationServerBairro" class="invalid-feedback">
                            <?= $validate->errorMessage('bairro', $validate->errors()) ?>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="endereco">Endereço</label>
                    <input type="text" name="endereco" id="endereco" class="form-control <?php if ($validate->hasErro('endereco', $validate->errors())) : ?> is-invalid <?php endif; ?>" aria-describedby="validationServerEndereco" placeholder="Endereço">
                    <?php if ($validate->hasErro('endereco', $validate->errors())) : ?>
                        <div id="validationServerEndereco" class="invalid-feedback">
                            <?= $validate->errorMessage('endereco', $validate->errors()) ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <div class="form-row">
                <div class="col-md-3 mb-3">
                    <label for="ativo">Ativo</label>
                    <select name="ativo" id="ativo" class="custom-select <?php if ($validate->hasErro('ativo', $validate->errors())) : ?> is-invalid <?php endif; ?>" aria-describedby="validationServerAtivo">
                        <option value="">Selecione...</option>
                        <option value="SIM" selected>Sim</option>
                        <option value="NÃO">Não</option>
                    </select>
                    <?php if ($validate->hasErro('ativo', $validate->errors())) : ?>
                        <div id="validationServerAtivo" class="invalid-feedback">
                            <?= $validate->errorMessage('ativo', $validate->errors()) ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <div class="d-flex align-items-center">
                <button type="submit" id="btn_cadastrar_editar" class="btn btn-dark">
                    <span class="load spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                </button>
            </div>
        </form>
    </div>
</div>