<table class="table table-hover">
    <?= $this->include('_table_head') ?>
    <tbody>
    <?php if (isset($data) && count($data)) : ?>
        <?php foreach ($data as $item) : ?>
            <tr>
                <td>
                    <input type="checkbox" name="selects[]" class="form-check">
                </td>
                <?= view($viewPrefix . '\profile\_row_info', ['item' => $item, 'editUrl' => url_to($controller, $item->id), 'deleteUrl' => url_to($controller, $item->id)]) ?>
            </tr>
        <?php endforeach ?>
    <?php endif ?>
    </tbody>
</table>
