<@php

namespace {namespace};

use App\Modules\Api\Models\{model}Model;
use Bonfire\Core\Traits\Filterable;

class {class} extends {model}Model
{
    use Filterable;

    /**
     * The filters that can be applied to
     * lists of Users.
     *
     * @var array
     */
    protected $filters = [
        {filterStr}
    ];

    /**
     * Provides filtering functionality.
     *
     * @param array $params
     *
     * @return UserFilter
     */
    public function filter(?array $params = null)
    {
        {filterFunctionStr}
    }
}
