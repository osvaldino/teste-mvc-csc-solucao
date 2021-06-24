<div class="card">

    <?php include_once(PATH_VIEW.'_global/menu.php'); ?>

    <div class="card-header">
        <h5><?= $DATA['title']; ?></h5>
        <div class="card-header-right">
            <a href="<?= Utils::generateLink("{$DATA['user_id']}/address/create"); ?>" class="btn btn-sm btn-primary">Novo Endereço</a>
        </div>
    </div>
    <div class="card-block table-border-style">
        <div class="table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <th>CEP</th>
                    <th>Rua</th>
                    <th>Bairro</th>
                    <th>Cidade</th>
                    <th>Estado</th>
                    <th>Número</th>
                    <th>Tipo</th>
                    <th class="text-center" width="10%">Ação</th>
                </tr>
                </thead>
                <tbody>
                <?php if (count($DATA['address']) > 0): ?>
                    <?php foreach ($DATA['address'] as $d): ?>
                        <tr>
                            <td><?= $d->zipcode; ?></td>
                            <td><?= $d->street; ?></td>
                            <td><?= $d->district; ?></td>
                            <td><?= $d->city; ?></td>
                            <td><?= $d->state; ?></td>
                            <td><?= $d->number; ?></td>
                            <td><?= $d->type->name; ?></td>
                            <td class="text-center">
                                <div class="btn-group " role="group" data-toggle="tooltip" data-placement="top" title="" data-original-title=".btn-xlg">
                                    <form action="<?= Utils::generateLink("{$DATA['user_id']}/address/delete/{$d->id}"); ?>" method="post" id="user-delete-<?= $d->id; ?>" class="formValidated">
                                        <a href="<?= Utils::generateLink("{$DATA['user_id']}/address/edit/{$d->id}"); ?>" class="btn btn-primary btn-sm waves-effect waves-light">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <button type="submit" class="btn btn-danger btn-sm waves-effect waves-light">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="8" class="text-center">Nenhum registro encontrado.</td>
                    </tr>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
