<div class="mt-3">
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
                <th>Nome</th>
                <th>Documento</th>
                <th>Cep</th>
                <th>Endereco</th>
                <th>Bairro</th>
                <th>Cidade</th>
                <th>Uf</th>
                <th>Telefone</th>
                <th>Email</th>
                <th>Ativo</th>
            </tr>
        </thead>
        <tbody id="tbody_cliente">
            <?php if (count($xmls) == 0) : ?>
                <tr>
                    <td colspan="8">Nenhum registro encontrado</td>
                </tr>
            <?php else : ?>
                <?php foreach ($xmls as $xml) : ?>
                    <tr>
                        <td class="text-nowrap"><?= $xml['nome'] ?></td>
                        <td class="text-nowrap"><?= $xml['documento'] ?></td>
                        <td><?= $xml['cep'] ?></td>
                        <td><?= $xml['endereco'] ?></td>
                        <td><?= $xml['bairro'] ?></td>
                        <td><?= $xml['cidade'] ?></td>
                        <td><?= $xml['uf'] ?></td>
                        <td class="text-nowrap"><?= $xml['telefone'] ?></td>
                        <td><?= $xml['email'] ?></td>
                        <td><?= $xml['ativo'] ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</div>