<@php $this->extend('master'); ?>

<@php $this->section('main'); ?>
    <@x-page-head>
        <a href="<@php echo $backUrl ?>" class="back">&larr; <@= lang('crud.{table}.tableName') ?></a>
        <h4><@php echo isset($data) ? '<i class="fa fa-pencil"></i>' : '<i class="fa fa-plus"></i>' ?>  <@= lang('crud.{table}.tableName') ?></h4>
    </x-page-head>

    <@x-admin-box>

        <form x-data x-validate @submit="$validate.submit" action="<@php echo $actionUrl; ?>" method="post" enctype="multipart/form-data">

            <@php echo csrf_field(); ?>

            <@php if (isset($data) && null !== $data) { ?>
                <input type="hidden" name="_method" value="PUT" />
                <input type="hidden" name="id" value="<@php echo $data->id; ?>">
            <@php } ?>

            <fieldset>
                {form-content}
            </fieldset>

            <div class="offset-md-2 py-3">
                <button type="submit" class="btn btn-primary btn-lg"><i class="fas fa-save"></i> <@= lang('crud.{table}.tableName') ?></button>
            </div>

        </form>

    </x-admin-box>

<@php $this->endSection(); ?>
