<?php

namespace App\Modules\Masjid\Models;

use App\Modules\Api\Models\PengurusModel;
use Bonfire\Traits\Filterable;

class PengurusFilter extends PengurusModel
{
    use Filterable;

    /**
     * The filters that can be applied to
     * lists of Users.
     *
     * @var array
     */
    protected $filters = [];

    /**
     * Provides filtering functionality.
     *
     * @param array $params
     *
     * @return UserFilter
     */
    public function filter(?array $params = null)
    {
        return [];
    }
}
