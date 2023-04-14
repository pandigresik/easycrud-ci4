<section class="filters">
    <?php if (isset($filters) && count($filters)): ?>
    <form action="<?= current_url() ?>/<?= $url ?? '' ?>" method="post"
          hx-post="<?= current_url() ?>/<?= $url ?? '' ?>"
          hx-trigger="change delay:400ms from:.filter-check"
          hx-target="<?= $target ?>"
    >
        <?= csrf_field() ?>

        <?php foreach ($filters as $key => $filter): ?>
            <h2><?= $filter['title'] ?></h2>

            <ul class="list-unstyled">
            <?php foreach ($filter['options'] as $value => $name): ?>
                <?php $typeFilter = $filter['type'] ?? 'checkbox' ?>
                <?php
                switch($typeFilter) {
                    case 'checkbox':
                        echo
                        '<li class="form-check">
                            <input class="form-check-input filter-check" type="checkbox" name="filters['.$key.']['.$value.']"
                                value="'.$value.'" id="'.$key . ':' . $value.'>">
                            <label class="form-check-label" for="'. $key . ':' . $value.'">
                            '.$name.'
                            </label>
                        </li>';
                        break;
                    default:
                        echo
                        '<li class="mb-3">
                            <input class="form-control filter-check" type="text" name="filters['.$key.']['.$value.']"
                            value="" placeholder="'.$name.'" id="'.$key . ':' . $value.'>">
                        </li>';
                }
                ?>                                
                
            <?php endforeach ?>
            </ul>
        <?php endforeach ?>
    </form>
    <?php endif ?>
</section>
