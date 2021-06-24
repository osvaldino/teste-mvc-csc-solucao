<div class="card">

    <?php include_once(PATH_VIEW.'_global/menu.php'); ?>

    <div class="card-header">
        <h5><?= $DATA['title']; ?></h5>
        <div class="card-header-right">
            <a href="<?= Utils::generateLink("{$DATA['user_id']}/address"); ?>" class="btn btn-sm btn-primary">Listar endereços</a>
        </div>
    </div>
    <div class="card-block">
        <form method="POST" class="formValidated" id="formulario" enctype="multipart/form-data" action="<?= Utils::generateLink("{$DATA['user_id']}/address/update/{$DATA['address']->id}"); ?>">

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">CEP</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="zipcode" name="zipcode" autocomplete="off" value="<?= Security::escape($DATA['address']->zipcode); ?>">
                    <small class="text-danger error-text mt-0 zipcode_err"></small>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Rua</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="street" name="street" autocomplete="off" value="<?= Security::escape($DATA['address']->street); ?>">
                    <small class="text-danger error-text mt-0 street_err"></small>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Bairro</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="district" name="district" autocomplete="off" value="<?= Security::escape($DATA['address']->district); ?>">
                    <small class="text-danger error-text mt-0 district_err"></small>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Cidade</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="city" name="city" autocomplete="off" value="<?= Security::escape($DATA['address']->city); ?>">
                    <small class="text-danger error-text mt-0 city_err"></small>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Estado</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="state" name="state" autocomplete="off" value="<?= Security::escape($DATA['address']->state); ?>">
                    <small class="text-danger error-text mt-0 state_err"></small>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Número</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="number" name="number" autocomplete="off" value="<?= Security::escape($DATA['address']->number); ?>">
                    <small class="text-danger error-text mt-0 number_err"></small>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Complemento</label>
                <div class="col-sm-10">
                    <textarea
                        rows="4"
                        class="form-control"
                        id="complement"
                        name="complement"
                        autocomplete="off"><?= Security::escape($DATA['address']->complement); ?></textarea>
                    <small class="text-danger error-text mt-0 complement_err"></small>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Tipo de endereço</label>
                <div class="col-sm-10">
                    <select id="address_type_id" name="address_type_id" class="form-control">
                        <option value="">Selecionem um tipo</option>
                        <?php foreach($DATA['types'] AS $f): ?>
                            <option value="<?= $f->id ?>"<?= ($f->id == $DATA['address']->address_type_id) ? 'selected' : ''; ?>><?= $f->name; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <input type="hidden"
                   id="user_id"
                   name="user_id"
                   value="<?= $DATA['user_id']; ?>">

            <button type="submit" class="btn btn-primary w-100">Salvar</button>

        </form>
    </div>
</div>
