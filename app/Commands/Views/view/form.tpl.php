<@php $this->extend('master'); ?>

<@php $this->section('main'); ?>
    <@x-page-head>
        <a href="<@php echo $backUrl ?>" class="back">&larr; {table}</a>
        <h4><@php echo isset($data) ? '<i class="fa fa-pencil"></i>' : '<i class="fa fa-plus"></i>' ?>  {table}</h4>
    </x-page-head>

    <@php if (isset($data) && null !== $data->deleted_at) { ?>
        <div class="alert danger">
            This {table} was deleted on <@php echo $data->deleted_at->humanize(); ?>.
            <a href="#">Restore {table}?</a>
        </div>
    <@php } ?>


    <@x-admin-box>


        <form action="<@php echo $actionUrl; ?>" method="post" enctype="multipart/form-data">

            <@php echo csrf_field(); ?>

            <@php if (isset($data) && null !== $data) { ?>
                <input type="hidden" name="_method" value="PUT" />
                <input type="hidden" name="id" value="<@php echo $data->id; ?>">
            <@php } ?>

            <fieldset>
                {form-content}
            </fieldset>

            <div class="text-end py-3">
                <button type="submit" class="btn btn-primary btn-lg"><i class="fas fa-save"></i> {table}</button>
            </div>

        </form>

    </x-admin-box>

<@php $this->endSection(); ?>
