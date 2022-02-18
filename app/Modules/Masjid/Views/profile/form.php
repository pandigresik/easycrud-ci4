<?php $this->extend('master'); ?>

<?php $this->section('main'); ?>
    <x-page-head>
        <a href="<?= $backUrl ?>" class="back">&larr; profile</a>
        <h2><?= isset($data) ? 'Edit profile' : 'New profile'; ?></h2>
    </x-page-head>

    <?php if (isset($data) && null !== $data->deleted_at) { ?>
        <div class="alert danger">
            This profile was deleted on <?= $data->deleted_at->humanize(); ?>.
            <a href="#">Restore profile?</a>
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
                    <div class="col">
                        <div class="row">
                            <!-- First Name -->
                            <div class="form-group col-12 col-sm-12">
                                <label for="name" class="form-label">Nama</label>
                                <input type="text" name="name" class="form-control" autocomplete="name"
                                       value="<?= old('name', $data->name ?? ''); ?>">
                                <?php if (has_error('name')) { ?>
                                    <p class="text-danger"><?= error('name'); ?></p>
                                <?php } ?>
                            </div>
                        </div>

                        <div class="row">
                            <!-- description Address -->
                            <div class="form-group col-12 col-sm-12">
                                <label for="description" class="form-label">Deskripsi</label>
                                <textarea name="description" class="form-control" autocomplete="description" rows="4"><?= old('description', $data->description ?? ''); ?></textarea>
                                <?php if (has_error('description')) { ?>
                                    <p class="text-danger"><?= error('description'); ?></p>
                                <?php } ?>
                            </div>
                        </div>

                    </div>
                </div>
            </fieldset>

            <div class="text-end py-3">
                <input type="submit" value="Save profile" class="btn btn-primary btn-lg">
            </div>

        </form>

    </x-admin-box>

<?php $this->endSection(); ?>
