<div class="card">

    <?php include_once(PATH_VIEW.'_global/menu.php'); ?>

    <div class="card-header">
        <h5><?= $DATA['title']; ?></h5>
        <div class="card-header-right">
            <a href="<?= Utils::generateLink('users/create'); ?>" class="btn btn-sm btn-primary">Novo usuário</a>
        </div>
    </div>
    <div class="card-block table-border-style">
        <div class="table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <th>Nome</th>
                    <th>Sobrenome</th>
                    <th>E-mail</th>
                    <th>Telefone</th>
                    <th>Cpf</th>
                    <th>Data nascimento</th>
                    <th>Data Cadastro</th>
                    <th>Data atualização</th>
                    <th class="text-center" width="10%">Ação</th>
                </tr>
                </thead>
                <tbody>
                <?php if (count($DATA['users']) > 0): ?>
                    <?php foreach ($DATA['users'] as $d): ?>
                        <tr>
                            <td><?= $d->first_name; ?></td>
                            <td><?= $d->last_name; ?></td>
                            <td><?= $d->email; ?></td>
                            <td><?= $d->phone; ?></td>
                            <td><?= $d->cpf; ?></td>
                            <td><?= $d->birth_date; ?></td>
                            <td><?= $d->created_at; ?></td>
                            <td><?= $d->updated_at; ?></td>
                            <td class="text-center">
                                <div class="btn-group " role="group" data-toggle="tooltip" data-placement="top" title="" data-original-title=".btn-xlg">
                                    <form action="<?= Utils::generateLink("users/delete/{$d->id}"); ?>" method="post" id="user-delete-<?= $d->id; ?>" class="formValidated">
                                        <a href="<?= Utils::generateLink("users/edit/{$d->id}"); ?>" class="btn btn-primary btn-sm waves-effect waves-light">
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
                        <td colspan="9" class="text-center">Nenhum registro encontrado.</td>
                    </tr>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
