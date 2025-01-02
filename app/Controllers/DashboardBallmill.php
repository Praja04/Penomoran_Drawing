<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class DashboardBallmill extends BaseController
{
    public function dashboard_Ballmill4()
    {
        //
        return view('mode_full_realtime/Ballmill/Ballmill4');
    }
    public function dashboard_Ballmill3()
    {
        //
        return view('mode_full_realtime/Ballmill/Ballmill3');
    }
}
