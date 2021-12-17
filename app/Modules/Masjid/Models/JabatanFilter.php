<?php

namespace App\Modules\Masjid\Models;

use App\Models\JabatanModel;
use App\Traits\Filterable;

class JabatanFilter extends JabatanModel
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
    public function filter(array $params = null)
    {
        return [];
    }
}
