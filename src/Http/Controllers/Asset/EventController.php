<?php

namespace Stevebauman\Maintenance\Http\Controllers\Asset;

use Illuminate\Support\Facades\App;
use Stevebauman\Maintenance\Repositories\Asset\Repository as AssetRepository;
use Stevebauman\Maintenance\Http\Controllers\Event\EventableController;

class EventController extends EventableController
{
    /**
     * @var array
     */
    protected $routes = [
        'index' => 'maintenance.assets.events.index',
        'create' => 'maintenance.assets.events.create',
        'store' => 'maintenance.assets.events.store',
        'show' => 'maintenance.assets.events.show',
        'edit' => 'maintenance.assets.events.edit',
        'update' => 'maintenance.assets.events.update',
        'destroy' => 'maintenance.assets.events.destroy',
        'grid' => 'maintenance.api.v1.assets.events.grid',
    ];

    /**
     * @return AssetRepository
     */
    protected function getEventableRepository()
    {
        return App::make(AssetRepository::class);
    }
}
