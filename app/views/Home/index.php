<div class="card">

    <?php include_once(PATH_VIEW.'_global/menu.php'); ?>

    <div class="card-block">
        <div class="row">
            <div class="col-md-4">
                <div class="card bg-c-green total-card mb-0">
                    <div class="card-block">
                        <div class="text-left">
                            <h4><?= Security::escape($DATA['total_address']); ?></h4>
                            <p class="m-0">Total de endereços</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card bg-c-green total-card mb-0">
                    <div class="card-block">
                        <div class="text-left">
                            <h4><?= Security::escape($DATA['address_type']); ?></h4>
                            <p class="m-0">Tipo de endereço</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card bg-c-green total-card mb-0">
                    <div class="card-block">
                        <div class="text-left">
                            <h4><?= Security::escape($DATA['total_users']); ?></h4>
                            <p class="m-0">Total Usuários</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>