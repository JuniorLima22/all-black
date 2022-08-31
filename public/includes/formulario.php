<h1 class="mt-4 text-center">Cadastro de Clientes</h1>

<div class="card shadow-lg p-3 rounded">
    <div class="card-body">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <label for="nome">Nome</label>
                    <input type="text" name="nome" id="nome" class="form-control is-invalid" value="" aria-describedby="validationServerNome" placeholder="Nome">
                </div>

                <div class="col-md-6 mb-3">
                    <label for="documento">Documento</label>
                    <input type="number" name="documento" id="documento" class="form-control is-invalid" aria-describedby="validationServerDocumento" placeholder="Documento" step="1">
                </div>
            </div>

            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <label for="telefone">Telefone</label>
                    <input type="text" name="telefone" id="telefone" class="form-control is-invalid" value="" aria-describedby="validationServerTelefone" placeholder="Telefone">
                </div>

                <div class="col-md-6 mb-3">
                    <label for="email">E-mail</label>
                    <input type="email" name="email" id="email" class="form-control is-invalid" aria-describedby="validationServerEmail" placeholder="E-mail" step="1">
                </div>
            </div>

            <div class="form-row">
                <div class="col-md-3 mb-3">
                    <label for="cep">CEP</label>
                    <input type="number" name="cep" id="cep" class="form-control is-invalid" aria-describedby="validationServerCep" placeholder="CEP" step="1">
                </div>

                <div class="col-md-3 mb-3">
                    <label for="uf">UF</label>
                    <select name="uf" id="uf" class="custom-select is-invalid" aria-describedby="validationServerUf">
                        <option selected disabled value="">Selecione...</option>
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
                </div>

                <div class="col-md-6 mb-3">
                    <label for="cidade">Cidade</label>
                    <input type="text" name="cidade" id="cidade" class="form-control is-invalid" aria-describedby="validationServerCidade" placeholder="Cidade">
                </div>
            </div>

            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <label for="bairro">Bairro</label>
                    <input type="number" name="bairro" id="bairro" class="form-control is-invalid" aria-describedby="validationServerBairro" placeholder="Bairro">
                </div>

                <div class="col-md-6 mb-3">
                    <label for="endereco">Endereço</label>
                    <input type="text" name="endereco" id="endereco" class="form-control is-invalid" aria-describedby="validationServerEndereço" placeholder="Endereço">
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