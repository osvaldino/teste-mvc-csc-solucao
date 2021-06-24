<div class="card">

    <?php include_once(PATH_VIEW.'_global/menu.php'); ?>

    <div class="card-header">
        <h5><?= $DATA['title']; ?></h5>
    </div>
    <div class="card-block">
        <form method="POST" class="formValidated" id="formulario" enctype="multipart/form-data" action="<?= Utils::generateLink('users/store'); ?>">

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Nome</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="first_name" name="first_name" autocomplete="off">
                <small class="text-danger error-text mt-0 first_name_err"></small>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Sobrenome</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="last_name" name="last_name" autocomplete="off">
                <small class="text-danger error-text mt-0 last_name_err"></small>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">E-mail</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="email" name="email" autocomplete="off">
                <small class="text-danger error-text mt-0 email_err"></small>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Telefone</label>
            <div class="col-sm-10">
                <input type="text" class="form-control phone" id="phone" name="phone" autocomplete="off">
                <small class="text-danger error-text mt-0 phone_err"></small>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Cpf</label>
            <div class="col-sm-10">
                <input type="text" class="form-control cpf" id="cpf" name="cpf" autocomplete="off">
                <small class="text-danger error-text mt-0 cpf_err"></small>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Data de nascimento</label>
            <div class="col-sm-10">
                <input type="text" class="form-control date" id="birth_date" name="birth_date" autocomplete="off">
                <small class="text-danger error-text mt-0 birth_date_err"></small>
            </div>
        </div>

        <button type="submit" class="btn btn-primary w-100">Salvar</button>

        </form>
    </div>
</div>
