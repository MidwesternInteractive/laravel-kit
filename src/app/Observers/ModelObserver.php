<?php

namespace App\Observers;

use App\Model;
use Spatie\Permission\Models\Role;

/**
 * Model Observer
 */
class ModelObserver
{
    /**
     * Model Created
     */
    public function created(Model $model)
    {
        //
    }
}
