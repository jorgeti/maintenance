<?php namespace Stevebauman\Maintenance\Services;

use Stevebauman\Maintenance\Services\AbstractModelService;
use Stevebauman\Maintenance\Models\Location;

class LocationService extends AbstractModelService {
	
	public function __construct(Location $location){
		$this->model = $location;
	}
	
}