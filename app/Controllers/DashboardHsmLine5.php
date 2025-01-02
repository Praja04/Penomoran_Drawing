<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\model_line5\ModelHsm1;
use App\Models\model_line5\ModelHsm2;

class DashboardHsmLine5 extends BaseController
{
    protected $hsm1;
    protected $hsm2;
    public function __construct()
    {
        $this->hsm1 = new ModelHsm1();
        $this->hsm2 = new ModelHsm2();
    }
    public function dashboard_hsm1()
    {
        //
        return view('Line6/HSM/dashboard_hsm1');
    }

    public function dashboard_hsm2()
    {
        //
        return view('Line6/HSM/dashboard_hsm2');
    }


    //HSM1
    public function getData_HSM1_tempLeft()
    {
        $data = $this->hsm1->getDataTempLeft_HSM1();
        return $this->response->setJSON(['data' => $data]);
    }

    public function getData_HSM1_tempRight()
    {
        $data = $this->hsm1->getDataTempRight_HSM1();
        return $this->response->setJSON(['data' => $data]);
    }
    public function getDistinct_HSM1_tempLeft()
    {
        $data = $this->hsm1->getDistinctTempLeft();
        return $this->response->setJSON(['data' => $data]);
    }
    public function getDistinct_HSM1_tempRight()
    {
        $data = $this->hsm1->getDistinctTempRight();
        return $this->response->setJSON(['data' => $data]);
    }
    public function getDistinct_HSM1_tempLeftbyDate($date)
    {
        $data = $this->hsm1->getDistinctTempLeftbyDate($date);
        return $this->response->setJSON(['data' => $data]);
    }
    public function getDistinct_HSM1_tempRightbyDate($date)
    {
        $data = $this->hsm1->getDistinctTempRightbyDate($date);
        return $this->response->setJSON(['data' => $data]);
    }

    //data melting
    public function getData_HSM1_LidHolderMelting()
    {
        $data = $this->hsm1->getDataLidHolderMelting_HSM1();
        return $this->response->setJSON(['data' => $data]);
    }
    public function getData_HSM1_BoxLifterMelting()
    {
        $data = $this->hsm1->getDataBoxLifterMelting_HSM1();
        return $this->response->setJSON(['data' => $data]);
    }
    public function getData_HSM1_MirrorPos()
    {
        $data = $this->hsm1->getDataMirrorPos_HSM1();
        return $this->response->setJSON(['data' => $data]);
    }
    //data melting by filter date
    public function getData_HSM1_LidHolderMeltingByDate($date)
    {
        $data = $this->hsm1->getDataLidHolderMeltingByDate($date);
        return $this->response->setJSON(['data' => $data]);
    }
    public function getData_HSM1_BoxLifterMeltingByDate($date)
    {
        $data = $this->hsm1->getDataBoxLifterMeltingByDate($date);
        return $this->response->setJSON(['data' => $data]);
    }
    public function getData_HSM1_MirrorPosByDate($date)
    {
        $data = $this->hsm1->getDataMirrorPosByDate($date);
        return $this->response->setJSON(['data' => $data]);
    }




    //HSM2
    public function getData_HSM2_tempLeft()
    {
        $data = $this->hsm2->getDataTempLeft_HSM2();
        return $this->response->setJSON(['data' => $data]);
    }

    public function getData_HSM2_tempRight()
    {
        $data = $this->hsm2->getDataTempRight_HSM2();
        return $this->response->setJSON(['data' => $data]);
    }

    public function getDistinct_HSM2_tempLeft()
    {
        $data = $this->hsm2->getDistinctTempLeft();
        return $this->response->setJSON(['data' => $data]);
    }
    public function getDistinct_HSM2_tempRight()
    {
        $data = $this->hsm2->getDistinctTempRight();
        return $this->response->setJSON(['data' => $data]);
    }
    public function getDistinct_HSM2_tempLeftbyDate($date)
    {
        $data = $this->hsm2->getDistinctTempLeftbyDate($date);
        return $this->response->setJSON(['data' => $data]);
    }
    public function getDistinct_HSM2_tempRightbyDate($date)
    {
        $data = $this->hsm2->getDistinctTempRightbyDate($date);
        return $this->response->setJSON(['data' => $data]);
    }

    //data melting
    public function getData_HSM2_LidHolderMelting()
    {
        $data = $this->hsm2->getDataLidHolderMelting_HSM2();
        return $this->response->setJSON(['data' => $data]);
    }
    public function getData_HSM2_BoxLifterMelting()
    {
        $data = $this->hsm2->getDataBoxLifterMelting_HSM2();
        return $this->response->setJSON(['data' => $data]);
    }
    public function getData_HSM2_MirrorPos()
    {
        $data = $this->hsm2->getDataMirrorPos_HSM2();
        return $this->response->setJSON(['data' => $data]);
    }
    //data melting by filter date
    public function getData_HSM2_LidHolderMeltingByDate($date)
    {
        $data = $this->hsm2->getDataLidHolderMeltingByDate($date);
        return $this->response->setJSON(['data' => $data]);
    }
    public function getData_HSM2_BoxLifterMeltingByDate($date)
    {
        $data = $this->hsm2->getDataBoxLifterMeltingByDate($date);
        return $this->response->setJSON(['data' => $data]);
    }
    public function getData_HSM2_MirrorPosByDate($date)
    {
        $data = $this->hsm2->getDataMirrorPosByDate($date);
        return $this->response->setJSON(['data' => $data]);
    }


    //filtered data
    //hsm1 getDataTempLeftByDate
    public function getDataByDate_HSM1_tempLeft($date)
    {
        $data = $this->hsm1->getDataTempLeftByDate($date);
        return $this->response->setJSON(['data' => $data]);
    }
    public function getDataByDate_HSM1_tempRight($date)
    {
        $data = $this->hsm1->getDataTempRightByDate($date);
        return $this->response->setJSON(['data' => $data]);
    }
    //hsm2
    public function getDataByDate_HSM2_tempLeft($date)
    {
        $data = $this->hsm2->getDataTempLeftByDate($date);
        return $this->response->setJSON(['data' => $data]);
    }
    public function getDataByDate_HSM2_tempRight($date)
    {
        $data = $this->hsm2->getDataTempRightByDate($date);
        return $this->response->setJSON(['data' => $data]);
    }

    //fitur get type battery untuk fitur dandori time

    //hsm1
    public function getDataTypeBattery()
    {

        // Ambil data untuk tipe baterai A dan B
        $batteryAData = $this->hsm1->getBatteryTypeByDate('1');
        $batteryBData = $this->hsm1->getBatteryTypeByDate('B');

        return $this->response->setJSON(['data' => $batteryAData]);
    }
    public function getDataTypeBatteryFirstHSM1()
    {

        // Ambil data untuk tipe baterai A dan B
        $batteryAData = $this->hsm1->getBatteryTypeByDateFirst('1');
        $batteryBData = $this->hsm1->getBatteryTypeByDateFirst('2');

        return $this->response->setJSON(['type1' => $batteryAData, 'type2' => $batteryBData]);
    }

    public function getlastDandoriTypeHSM1()
    {
        $data = $this->hsm1->getLastBatteryTypeTime();
        return $this->response->setJSON(['data' => $data]);
    }
    //hsm2
    public function getDataTypeBatteryFirstHSM2()
    {

        // Ambil data untuk tipe baterai A dan B
        $batteryAData = $this->hsm2->getBatteryTypeByDateFirst('1');
        $batteryBData = $this->hsm2->getBatteryTypeByDateFirst('2');

        return $this->response->setJSON(['type1' => $batteryAData, 'type2' => $batteryBData]);
    }

    public function getlastDandoriTypeHSM2()
    {
        $data = $this->hsm2->getLastBatteryTypeTime();
        return $this->response->setJSON(['data' => $data]);
    }



    //total data hsm1
    public function getTotalDataHSM1()
    {
        $data = $this->hsm1->getDataToday();
        return $this->response->setJSON(['data' => $data]);
    }
    //total data hsm2
    public function getTotalDataHSM2()
    {
        $data = $this->hsm2->getDataToday();
        return $this->response->setJSON(['data' => $data]);
    }

    //data today ok
    public function getTotalDataOKHSM1()
    {
        $data = $this->hsm1->getDataGreen();
        return $this->response->setJSON(['data' => $data]);
    }

    public function getTotalDataOKHSM2()
    {
        $data = $this->hsm2->getDataGreen();
        return $this->response->setJSON(['data' => $data]);
    }

    //get data for parameter
    public function getParameterData1()
    {
        $data = $this->hsm1->getDataParameter();
        return $this->response->setJSON(['data' => $data]);
    }
    public function getParameterData2()
    {
        $data = $this->hsm2->getDataParameter();
        return $this->response->setJSON(['data' => $data]);
    }


    //get data by week for temp right, left, mirror,box lifter,lidholder hsm1
    public function getDataByWeek_HSM1_tempLeft()
    {
        // Ambil data dari form
        $date1 = $this->request->getPost('date1');
        $date2 = $this->request->getPost('date2');

        $data = $this->hsm1->getDataTempLeftByWeek($date1, $date2);
        return $this->response->setJSON(['data' => $data]);
    }
    public function getDataByWeek_HSM1_tempRight()
    {
        // Ambil data dari form
        $date1 = $this->request->getPost('date1');
        $date2 = $this->request->getPost('date2');

        $data = $this->hsm1->getDataTempRightByWeek($date1, $date2);
        return $this->response->setJSON(['data' => $data]);
    }

    public function getData_HSM1_LidHolderMeltingByWeek()
    {
        $date1 = $this->request->getPost('date1');
        $date2 = $this->request->getPost('date2');
        $data = $this->hsm1->getDataLidHolderMeltingByWeek($date1, $date2);
        return $this->response->setJSON(['data' => $data]);
    }
    public function getData_HSM1_BoxLifterMeltingByWeek()
    {
        $date1 = $this->request->getPost('date1');
        $date2 = $this->request->getPost('date2');
        $data = $this->hsm1->getDataBoxLifterMeltingByWeek($date1, $date2);
        return $this->response->setJSON(['data' => $data]);
    }
    public function getData_HSM1_MirrorPosByWeek()
    {
        $date1 = $this->request->getPost('date1');
        $date2 = $this->request->getPost('date2');
        $data = $this->hsm1->getDataMirrorPosByWeek($date1, $date2);
        return $this->response->setJSON(['data' => $data]);
    }



    //get data by week for temp right, left, mirror,box lifter,lidholder hsm2
    public function getDataByWeek_HSM2_tempLeft()
    {
        // Ambil data dari form
        $date1 = $this->request->getPost('date1');
        $date2 = $this->request->getPost('date2');

        $data = $this->hsm2->getDataTempLeftByWeek($date1, $date2);
        return $this->response->setJSON(['data' => $data]);
    }
    public function getDataByWeek_HSM2_tempRight()
    {
        // Ambil data dari form
        $date1 = $this->request->getPost('date1');
        $date2 = $this->request->getPost('date2');

        $data = $this->hsm2->getDataTempRightByWeek($date1, $date2);
        return $this->response->setJSON(['data' => $data]);
    }

    public function getData_HSM2_LidHolderMeltingByWeek()
    {
        $date1 = $this->request->getPost('date1');
        $date2 = $this->request->getPost('date2');
        $data = $this->hsm2->getDataLidHolderMeltingByWeek($date1, $date2);
        return $this->response->setJSON(['data' => $data]);
    }
    public function getData_HSM2_BoxLifterMeltingByWeek()
    {
        $date1 = $this->request->getPost('date1');
        $date2 = $this->request->getPost('date2');
        $data = $this->hsm2->getDataBoxLifterMeltingByWeek($date1, $date2);
        return $this->response->setJSON(['data' => $data]);
    }
    public function getData_HSM2_MirrorPosByWeek()
    {
        $date1 = $this->request->getPost('date1');
        $date2 = $this->request->getPost('date2');
        $data = $this->hsm2->getDataMirrorPosByWeek($date1, $date2);
        return $this->response->setJSON(['data' => $data]);
    }

}
