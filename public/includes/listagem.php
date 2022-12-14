<h1 class="mt-4 text-center">Listagem de Clientes</h1>

<div class="card shadow-sm mb-2 rounded">
    <div class="card-body">
        <form name="Buscar" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="GET">
            <div class="form-row">
                <div class="col-md-6">
                    <label for="busca">Nome ou Documento</label>
                    <input type="search" name="busca" id="busca" class="form-control" value="<?php if (!empty($busca)) echo $busca; ?>" aria-describedby="validationServerNome" placeholder="Nome ou Documento">
                </div>

                <div class="col-md-4">
                    <label for="ativo">Status</label>
                    <select name="ativo" id="ativo" class="custom-select" aria-describedby="validationServerAtivo">
                        <option value="">Selecione...</option>
                        <option value="SIM" <?php if (!empty($ativo) && $ativo == 'SIM') echo 'selected' ?>>SIM</option>
                        <option value="NÃO" <?php if (!empty($ativo) && $ativo == 'NÃO') echo 'selected' ?>>NÃO</option>
                    </select>
                </div>

                <div class="col-md-2 d-flex align-items-end mt-3">
                    <button type="submit" class="btn btn-dark">
                        <span class="load spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                        Buscar
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="card shadow-lg p-3 rounded">
    <div class="card-body">
        <?php if ($session->has('message')) : ?>
            <div class="alert alert-<?php if ($session->has('type')) echo $session->get('type') ?> alert-dismissible fade show" role="alert">
                <?= $session->get('message') ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?>
        <table class="table table-responsive">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>Documento</th>
                    <th>Telefone</th>
                    <th>E-mail</th>
                    <th>Ativo</th>
                    <th class="text-nowrap">Cadastradro</th>
                    <th class="text-nowrap">Atualizado</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody id="tbody_cliente">
                <?php if (count($clientes) == 0) : ?>
                    <tr>
                        <td colspan="8">Nenhum registro encontrado</td>
                    </tr>
                <?php else : ?>
                    <?php foreach ($clientes as $cliente) : ?>
                        <tr>
                            <th><?= $cliente->id ?></th>
                            <td class="text-nowrap"><?= $cliente->nome ?></td>
                            <td><?= $cliente->documento ?></td>
                            <td><?= $cliente->telefone ?></td>
                            <td><?= $cliente->email ?></td>
                            <td class="text-center"><?= $cliente->ativo ?></td>
                            <td class="text-nowrap"><?= (!empty($cliente->criado_em)) ? date('d/m/Y H:i:s', strtotime($cliente->criado_em)) : '' ?></td>
                            <td class="text-nowrap"><?= (!empty($cliente->atualizado_em)) ? date('d/m/Y H:i:s', strtotime($cliente->atualizado_em)) : '' ?></td>
                            <td>
                                <nobr>
                                    <button type="button" class="btn btn-default shadow" title="Detalhes do cliente" data-toggle="modal" data-target="#modal-details-<?= $cliente->id ?>">
                                        <i class="fa fa-lg fa-fw fa-eye"></i>
                                    </button>

                                    <button type="button" class="btn btn-default text-primary shadow" title="Editar Cliente" onclick="location.href='/editar.php?id=<?= $cliente->id ?>'">
                                        <i class="fa fa-lg fa-fw fa-pen"></i>
                                    </button>

                                    <button type="button" class="btn btn-default text-danger shadow" title="Deletar Cliente" data-toggle="modal" data-target="#modal-delete-<?= $cliente->id ?>">
                                        <i class="fa fa-lg fa-fw fa-trash"></i>
                                    </button>

                                    <div class="modal fade" id="modal-delete-<?= $cliente->id ?>" data-backdrop="static" data-keyboard="false">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">
                                                        Exclusão de Registro </h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row justify-content-center">
                                                        O registro <span class="font-weight-bold"> <?php echo $cliente->nome ?></span> será deletado da base de dados. <br> Deseja realmente executar esta ação?
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <div class="justify-content-end">
                                                        <form action="/excluir.php" method="POST">
                                                            <input type="hidden" name="id" value="<?= $cliente->id ?>">
                                                            <input type="hidden" name="excluir" value="true">
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">
                                                                Cancelar </button>
                                                            <button type="submit" class="btn btn-outline-success ml-2">
                                                                Deletar </button>
                                                        </form>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal fade" id="modal-details-<?= $cliente->id ?>" data-keyboard="true">
                                        <div class="modal-dialog modal-dialog-scrollable">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">
                                                        Detalhes de Cliente - <?= $cliente->id ?> </h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>

                                                <div class="modal-body">
                                                    <table class="table table-sm table-hover">
                                                        <tbody>
                                                            <tr>
                                                                <th>Nome do cliente</th>
                                                                <td><?= $cliente->nome ?></td>
                                                            </tr>
                                                            <tr>
                                                                <th>Documento</th>
                                                                <td><?= $cliente->documento ?></td>
                                                            </tr>
                                                            <tr>
                                                                <th>Telefone</th>
                                                                <td><?= $cliente->telefone ?></td>
                                                            </tr>
                                                            <tr>
                                                                <th>E-mail</th>
                                                                <td><?= $cliente->email ?></td>
                                                            </tr>
                                                            <tr>
                                                                <th class="text-wrap">Endereço</th>
                                                                <td>
                                                                    <?= $cliente->endereco ?>,
                                                                    <?= $cliente->bairro ?> <br>
                                                                    <?= $cliente->cidade ?> -
                                                                    <?= $cliente->uf ?> -
                                                                    <?= $cliente->cep ?>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th>Ativo</th>
                                                                <td><?= $cliente->ativo ?></td>
                                                            </tr>
                                                            <tr>
                                                                <th>Data cadastrado</th>
                                                                <td><?= (!empty($cliente->criado_em)) ? date('d/m/Y H:i:s', strtotime($cliente->criado_em)) : '' ?></td>
                                                            </tr>
                                                            <tr>
                                                                <th>Data atualizado</th>
                                                                <td><?= (!empty($cliente->atualizado_em)) ? date('d/m/Y H:i:s', strtotime($cliente->atualizado_em)) : '' ?></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>


                                                <div class="modal-footer">
                                                    <div class="justify-content-end">
                                                        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">
                                                            Fechar </button>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                </nobr>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <?php
            unset($_GET['pagina']);
            $gets = http_build_query($_GET);

            $paginas = $obPaginacao->getPages();
            foreach ($paginas as $pagina) :
                $paginaAtual = $pagina['current'] == true ? 'active' : '';
            ?>
                <li class="page-item <?= $paginaAtual ?>"><a class="page-link" href="?pagina=<?= $pagina['page'] . '&' . $gets ?>"><?= $pagina['page'] ?></a></li>
            <?php endforeach; ?>
        </ul>
    </nav>
</div>