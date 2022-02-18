<?php $this->extend('master'); ?>

<?php $this->section('main'); ?>
    <x-page-head>
        <a href="<?= $backUrl ?>" class="back">&larr; member</a>
        <h4><?= isset($data) ? '<i class="fa fa-pencil"></i>' : '<i class="fa fa-plus"></i>' ?>  member</h4>
    </x-page-head>

    <?php if (isset($data) && null !== $data->deleted_at) { ?>
        <div class="alert danger">
            This member was deleted on <?= $data->deleted_at->humanize(); ?>.
            <a href="#">Restore member?</a>
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
                    <?= form_label('wilayah_id', '', ['for' => 'wilayah_id', 'class' => 'col-form-label col-sm-2']) ?>
                    <div class="col-sm-10">
                        <?= form_input('wilayah_id', old('wilayah_id', $data->wilayah_id ?? ''), "class='form-control varchar' required") ?>
                        <?php if (has_error('wilayah_id')) { ?>
                        <p class="text-danger"><?= error('wilayah_id'); ?></p>
                        <?php } ?>
                    </div>
                </div>
                <div class="row mb-3">
                    <?= form_label('code', '', ['for' => 'code', 'class' => 'col-form-label col-sm-2']) ?>
                    <div class="col-sm-10">
                        <?= form_input('code', old('code', $data->code ?? ''), "class='form-control varchar' required") ?>
                        <?php if (has_error('code')) { ?>
                        <p class="text-danger"><?= error('code'); ?></p>
                        <?php } ?>
                    </div>
                </div>
                <div class="row mb-3">
                    <?= form_label('address', '', ['for' => 'address', 'class' => 'col-form-label col-sm-2']) ?>
                    <div class="col-sm-10">
                        <?= form_textarea('address', old('address', $data->address ?? ''), "class='form-control varchar' rows=3 required") ?>
                        <?php if (has_error('address')) { ?>
                        <p class="text-danger"><?= error('address'); ?></p>
                        <?php } ?>
                    </div>
                </div>
                <div class="row mb-3">
                    <?= form_label('path_logo', '', ['for' => 'path_logo', 'class' => 'col-form-label col-sm-2']) ?>
                    <div class="col-sm-10">
                        <?= form_input('path_logo', old('path_logo', $data->path_logo ?? ''), "class='form-control varchar' ") ?>
                        <?php if (has_error('path_logo')) { ?>
                        <p class="text-danger"><?= error('path_logo'); ?></p>
                        <?php } ?>
                    </div>
                </div>
                <div class="row mb-3">
                    <?= form_label('path_image', '', ['for' => 'path_image', 'class' => 'col-form-label col-sm-2']) ?>
                    <div class="col-sm-10">
                        <?= form_input('path_image', old('path_image', $data->path_image ?? ''), "class='form-control varchar' ") ?>
                        <?php if (has_error('path_image')) { ?>
                        <p class="text-danger"><?= error('path_image'); ?></p>
                        <?php } ?>
                    </div>
                </div>
                <div class="row mb-3">
                    <?= form_label('state', '', ['for' => 'state', 'class' => 'col-form-label col-sm-2']) ?>
                    <div class="col-sm-10">
                        <?= form_input('state', old('state', $data->state ?? ''), "class='form-control enum' ") ?>
                        <?php if (has_error('state')) { ?>
                        <p class="text-danger"><?= error('state'); ?></p>
                        <?php } ?>
                    </div>
                </div>
            </fieldset>

            <div class="text-end py-3">
                <button type="submit" class="btn btn-primary btn-lg"><i class="fas fa-save"></i> member</button>
            </div>

        </form>

    </x-admin-box>

<?php $this->endSection(); ?>
