<h1 class="mt-4 text-center"><?= TITLE ?></h1>

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

        <div class="form-row">
            <div class="col">
                <label for="file">Arquivo XML</label>

                <form name="Carregar XML" action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" enctype="multipart/form-data">
                <div class="input-group is-invalid">
                        <div class="custom-file">
                            <input type="file" name="file" id="file" class="custom-file-input" aria-describedby="validationServerFile" required>
                            <label class="custom-file-label" for="validatedInputGroupCustomFile">Escolher arquivo...</label>
                        </div>
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-outline-dark">Carregar XML</button>
                        </div>
                    </div>

                <?php if ($validate->hasErro('xml', $validate->errors())) : ?>
                    <div id="validationServerFile" class="invalid-feedback">
                        <?= $validate->errorMessage('xml', $validate->errors()) ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <?php if (isset($xmls)) include __DIR__ . '/listagem_xml.php'; ?>
</div>