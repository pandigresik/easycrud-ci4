<?php $this->extend('master'); ?>

<?php $this->section('main'); ?>
    <x-page-head>
        <a href="<?= $backUrl ?>" class="back">&larr; pengurus</a>
        <h4><?= isset($data) ? '<i class="fa fa-pencil"></i>' : '<i class="fa fa-plus"></i>' ?>  pengurus</h4>
    </x-page-head>

    <?php if (isset($data) && null !== $data->deleted_at) { ?>
        <div class="alert danger">
            This pengurus was deleted on <?= $data->deleted_at->humanize(); ?>.
            <a href="#">Restore pengurus?</a>
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
                    <?= form_label('contact', '', ['for' => 'contact', 'class' => 'col-form-label col-sm-2']) ?>
                    <div class="col-sm-10">
                        <?= form_input('contact', old('contact', $data->contact ?? ''), "class='form-control varchar' required") ?>
                        <?php if (has_error('contact')) { ?>
                        <p class="text-danger"><?= error('contact'); ?></p>
                        <?php } ?>
                    </div>
                </div>
                <div class="row mb-3">
                    <?= form_label('description', '', ['for' => 'description', 'class' => 'col-form-label col-sm-2']) ?>
                    <div class="col-sm-10">
                        <?= form_textarea('description', old('description', $data->description ?? ''), "rows='4' class='form-control text' required") ?>
                        <?php if (has_error('description')) { ?>
                        <p class="text-danger"><?= error('description'); ?></p>
                        <?php } ?>
                    </div>
                </div>
                <div class="row mb-3">
                    <?= form_label('jabatan_id', '', ['for' => 'jabatan_id', 'class' => 'col-form-label col-sm-2']) ?>
                    <div class="col-sm-10">
                        <?= form_dropdown('jabatan_id', $jabatanItems, old('jabatan_id', $data->jabatan_id ?? ''), "class='form-control select2' required") ?>
                        <?php if (has_error('jabatan_id')) { ?>
                        <p class="text-danger"><?= error('jabatan_id'); ?></p>
                        <?php } ?>
                    </div>
                </div>
            </fieldset>

            <div class="text-end py-3">
                <button type="submit" class="btn btn-primary btn-lg"><i class="fas fa-save"></i> pengurus</button>
            </div>

        </form>

    </x-admin-box>

<?php $this->endSection(); ?>
