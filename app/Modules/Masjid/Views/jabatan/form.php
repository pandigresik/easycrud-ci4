<?php $this->extend('master'); ?>

<?php $this->section('main'); ?>
    <x-page-head>
        <a href="<?= $backUrl ?>" class="back">&larr; jabatan</a>
        <h4><?= isset($data) ? '<i class="fa fa-pencil"></i>' : '<i class="fa fa-plus"></i>' ?>  jabatan</h4>
    </x-page-head>

    <?php if (isset($data) && null !== $data->deleted_at) { ?>
        <div class="alert danger">
            This jabatan was deleted on <?= $data->deleted_at->humanize(); ?>.
            <a href="#">Restore jabatan?</a>
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
                    <?= form_label('name', '', ['for' => 'name', 'class' => 'col-form-label col-sm-2']) ?>
                    <div class="col-sm-10">
                        <?= form_input('name', old('name', $data->name ?? ''), "class='form-control varchar' required") ?>
                        <?php if (has_error('name')) { ?>
                        <p class="text-danger"><?= error('name'); ?></p>
                        <?php } ?>
                    </div>
                </div>
                <div class="row mb-3">
                    <?= form_label('description', '', ['for' => 'description', 'class' => 'col-form-label col-sm-2']) ?>
                    <div class="col-sm-10">
                        <?= form_input('description', old('description', $data->description ?? ''), "class='form-control varchar' required") ?>
                        <?php if (has_error('description')) { ?>
                        <p class="text-danger"><?= error('description'); ?></p>
                        <?php } ?>
                    </div>
                </div>
            </fieldset>

            <div class="text-end py-3">
                <button type="submit" class="btn btn-primary btn-lg"><i class="fas fa-save"></i> jabatan</button>
            </div>

        </form>

    </x-admin-box>

<?php $this->endSection(); ?>
