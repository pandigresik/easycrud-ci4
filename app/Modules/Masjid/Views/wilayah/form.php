<?php $this->extend('master'); ?>

<?php $this->section('main'); ?>
    <x-page-head>
        <a href="<?= $backUrl ?>" class="back">&larr; wilayah</a>
        <h4><?= isset($data) ? '<i class="fa fa-pencil"></i>' : '<i class="fa fa-plus"></i>' ?>  wilayah</h4>
    </x-page-head>

    <?php if (isset($data) && null !== $data->deleted_at) { ?>
        <div class="alert danger">
            This wilayah was deleted on <?= $data->deleted_at->humanize(); ?>.
            <a href="#">Restore wilayah?</a>
        </div>
    <?php } ?>


    <x-admin-box>


        <form action="<?= $actionUrl; ?>" method="post" enctype="multipart/form-data">

            <?= csrf_field(); ?>

            <?php if (isset($data) && null !== $data) { ?>
                <input type="hidden" name="_method" value="PUT" />
                <input type="hidden" name="id" value="<?= $data->id; ?>">
            <?php } ?>

            <fieldset>
                                <div class="row mb-3">
                    <?= form_label('kode', '', ['for' => 'kode', 'class' => 'col-form-label col-sm-2']) ?>
                    <div class="col-sm-10">
                        <?= form_input('kode', old('kode', $data->kode ?? ''), "class='form-control varchar' required") ?>
                        <?php if (has_error('kode')) { ?>
                        <p class="text-danger"><?= error('kode'); ?></p>
                        <?php } ?>
                    </div>
                </div>
                <div class="row mb-3">
                    <?= form_label('nama', '', ['for' => 'nama', 'class' => 'col-form-label col-sm-2']) ?>
                    <div class="col-sm-10">
                        <?= form_input('nama', old('nama', $data->nama ?? ''), "class='form-control varchar' required") ?>
                        <?php if (has_error('nama')) { ?>
                        <p class="text-danger"><?= error('nama'); ?></p>
                        <?php } ?>
                    </div>
                </div>
                <div class="row mb-3">
                    <?= form_label('level', '', ['for' => 'level', 'class' => 'col-form-label col-sm-2']) ?>
                    <div class="col-sm-10">
                        <?= form_input('level', old('level', $data->level ?? ''), "class='form-control enum' required") ?>
                        <?php if (has_error('level')) { ?>
                        <p class="text-danger"><?= error('level'); ?></p>
                        <?php } ?>
                    </div>
                </div>
            </fieldset>

            <div class="text-end py-3">
                <button type="submit" class="btn btn-primary btn-lg"><i class="fas fa-save"></i> wilayah</button>
            </div>

        </form>

    </x-admin-box>

<?php $this->endSection(); ?>
