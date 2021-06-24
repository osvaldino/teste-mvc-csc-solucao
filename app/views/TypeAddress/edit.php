<div class="card">

    <?php include_once(PATH_VIEW.'_global/menu.php'); ?>

    <div class="card-header">
        <h5><?= $DATA['title']; ?></h5>
    </div>
    <div class="card-block">
        <form method="POST" class="formValidated" id="formulario" enctype="multipart/form-data" action="<?= Utils::generateLink("type-adress/update/{$DATA['type']->id}"); ?>">

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Nome</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" name="name" autocomplete="off" value="<?= Security::escape($DATA['type']->name); ?>">
                    <small class="text-danger error-text mt-0 name_err"></small>
                </div>
            </div>

            <button type="submit" class="btn btn-primary w-100">Salvar</button>

        </form>
    </div>
</div>
