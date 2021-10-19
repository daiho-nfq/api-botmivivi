<?php

namespace App\Http\Controllers\API\Manufacturer;

use App\Http\Controllers\API\Controller;
use App\Http\Resources\Manufacturer\ManufacturerListCollection;
use App\Models\Manufacturer;

class GetManufacturerListController extends Controller
{
    public function __invoke()
    {
        $manufacturerList = Manufacturer::paginate(10);

        return (new ManufacturerListCollection($manufacturerList));
    }
}
