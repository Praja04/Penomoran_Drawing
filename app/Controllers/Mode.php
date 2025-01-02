<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\model_line6\ModelHsm1;
use App\Models\model_line6\ModelHsm2;
class Mode extends BaseController
{
    protected $hsm1;
    protected $hsm2;
    public function __construct()
    {
        $this->hsm1 = new ModelHsm1();
        $this->hsm2 = new ModelHsm2();
    }
    public function menu_utama(){
        return view('mode_full_realtime/menu');
    }
    public function hsm1_line6()
    {
        //
        return view('mode_full_realtime/Line6/hsm1');
    }
    public function hsm2_line6()
    {
        //
        return view('mode_full_realtime/Line6/hsm2');
    }
    public function hsm1_line5()
    {
        //
        return view('mode_full_realtime/Line5/hsm1');
    }
    public function hsm2_line5()
    {
        //
        return view('mode_full_realtime/Line5/hsm2');
    }
    
    public function menu_produksi2(){
        return view('mode_full_realtime/produksi2');
    }
    public function menu_produksi1(){
        return view('mode_full_realtime/produksi1');
    }
    public function menu_charging(){
        return view('mode_full_realtime/charging');
    }
    public function alt1_line6()
    {
        //
        return view('mode_full_realtime/Line6/alt1');
    }
    public function alt2_line6()
    {
        //
        return view('mode_full_realtime/Line6/alt2');
    }
    public function alt1_line5()
    {
        //
        return view('mode_full_realtime/Line5/alt1');
    }
    public function alt2_line5()
    {
        //
        return view('mode_full_realtime/Line5/alt2');
    }

    public function apb1_line6()
    {
        //
        return view('mode_full_realtime/Line6/apb1');
    }
    public function apb2_line6()
    {
        //
        return view('mode_full_realtime/Line6/apb2');
    }
    public function apb1_line5()
    {
        //
        return view('mode_full_realtime/Line5/apb1');
    }

    public function apb2_line5()
    {
        //
        return view('mode_full_realtime/Line5/apb2');
    }
}
