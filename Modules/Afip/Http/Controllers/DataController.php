<?php

namespace Modules\Afip\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class DataController extends Controller
{
    public function superadmin_package()
    {
        return [
            [
                'name' => 'afip_module',
                'label' => 'Módulo Afip',
                'default' => false,
            ]
        ];
    }
}
