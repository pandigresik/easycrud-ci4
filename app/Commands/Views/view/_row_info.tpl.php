{columnItems}
<td class="d-flex justify-content-end"  hx-confirm="<@php echo lang('app.deleteMessage') ?>" hx-target="closest tr" hx-select="" hx-swap="outerHTML swap:1s">
    <div class="btn-group" role="group" aria-label="Basic mixed styles example">
        <button class="btn btn-secondary" type="button"><i class="fa fa-edit"></i> <a href="<@php echo $editUrl ?>"><@php echo lang('app.edit') ?></a></button>
        <button class="btn btn-danger" hx-delete="<@php echo $deleteUrl ?>" hx-select="#htmx-alert" hx-swap="innerHTML" hx-indicator="#htmx-request-indicator">
        <i class="fa fa-trash"></i> <@php echo lang('app.delete') ?>
        </button>
    </div>    
</td>
