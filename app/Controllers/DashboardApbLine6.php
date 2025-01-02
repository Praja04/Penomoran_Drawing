<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\model_line6\ModelApb1;
use App\Models\model_line6\ModelApb2;

class DashboardApbLine6 extends BaseController
{
    protected $apb1;
    protected $apb2;
    public function __construct()
    {
        $this->apb1 = new ModelApb1();
        $this->apb2 = new ModelApb2();
    }
    public function dashboard_apb1()
    {
        //
        return view('Line6/APB/dashboard_apb1');
    }

    public function dashboard_apb2()
    {
        //
        return view('Line6/APB/dashboard_apb2');
    }

    //APB1
    public function getData_APB1_tempLeftActual()
    {
        $data = $this->apb1->getDataTempLeftActual_APB1();
        return $this->response->setJSON(['data' => $data]);
    }

    public function getData_APB1_tempRightActual()
    {
        $data = $this->apb1->getDataTempRightActual_APB1();
        return $this->response->setJSON(['data' => $data]);
    }
    public function getDistinct_APB1_tempLeftActual()
    {
        $data = $this->apb1->getDistinctTempLeftActual();
        return $this->response->setJSON(['data' => $data]);
    }
    public function getDistinct_APB1_tempRightActual()
    {
        $data = $this->apb1->getDistinctTempRightActual();
        return $this->response->setJSON(['data' => $data]);
    }
    //APB2
    public function getData_APB2_tempLeftActual()
    {
        $data = $this->apb2->getDataTempLeftActual_APB2();
        return $this->response->setJSON(['data' => $data]);
    }

    public function getData_APB2_tempRightActual()
    {
        $data = $this->apb2->getDataTempRightActual_APB2();
        return $this->response->setJSON(['data' => $data]);
    }

    public function getDistinct_APB2_tempLeftActual()
    {
        $data = $this->apb2->getDistinctTempLeftActual();
        return $this->response->setJSON(['data' => $data]);
    }
    public function getDistinct_APB2_tempRightActual()
    {
        $data = $this->apb2->getDistinctTempRightActual();
        return $this->response->setJSON(['data' => $data]);
    }

    // get filterd
    //apb1
    public function getDataByDate_APB1_tempLeft($date)
    {
        $data = $this->apb1->getDataTempLeftByDate($date);
        return $this->response->setJSON(['data' => $data]);
    }
    public function getDataByDate_APB1_tempRight($date)
    {
        $data = $this->apb1->getDataTempRightByDate($date);
        return $this->response->setJSON(['data' => $data]);
    }
    //apb2
    public function getDataByDate_APB2_tempLeft($date)
    {
        $data = $this->apb2->getDataTempLeftByDate($date);
        return $this->response->setJSON(['data' => $data]);
    }
    public function getDataByDate_APB2_tempRight($date)
    {
        $data = $this->apb2->getDataTempRightByDate($date);
        return $this->response->setJSON(['data' => $data]);
    }


    //getdatamode
    public function getDataParameterAPB1()
    {
        $data = $this->apb1->getDataParameter();
        return $this->response->setJSON(['data' => $data]);
    }
    public function getDataParameterAPB2()
    {
        $data = $this->apb2->getDataParameter();
        return $this->response->setJSON(['data' => $data]);
    }

    public function getDataTodayAPB1()
    {
        $data = $this->apb1->getDataToday();
        return $this->response->setJSON(['data' => $data]);
    }
    public function getDataTodayAPB2()
    {
        $data = $this->apb2->getDataToday();
        return $this->response->setJSON(['data' => $data]);
    }

    //bydate
    //apb1
    public function getDistinct_APB1_tempLeftActualbyDate($date)
    {
        $data = $this->apb1->getDistinctTempLeftActualbyDate($date);
        return $this->response->setJSON(['data' => $data]);
    }
    public function getDistinct_APB1_tempRightActualbyDate($date)
    {
        $data = $this->apb1->getDistinctTempRightActualbyDate($date);
        return $this->response->setJSON(['data' => $data]);
    }

    //apb2
    public function getDistinct_APB2_tempLeftActualbyDate($date)
    {
        $data = $this->apb2->getDistinctTempLeftActualbyDate($date);
        return $this->response->setJSON(['data' => $data]);
    }
    public function getDistinct_APB2_tempRightActualbyDate($date)
    {
        $data = $this->apb2->getDistinctTempRightActualbyDate($date);
        return $this->response->setJSON(['data' => $data]);
    }

    //by week
    //apb1
    public function getDataByWeek_APB1_tempLeft()
    {
        $date1 = $this->request->getPost('date1');
        $date2 = $this->request->getPost('date2');
        $data = $this->apb1->getDataTempLeftByWeek($date1,$date2);
        return $this->response->setJSON(['data' => $data]);
    }
    public function getDataByWeek_APB1_tempRight()
    {
        $date1 = $this->request->getPost('date1');
        $date2 = $this->request->getPost('date2');
        $data = $this->apb1->getDataTempRightByWeek($date1,$date2);
        return $this->response->setJSON(['data' => $data]);
    }

    //apb2
    public function getDataByWeek_APB2_tempLeft()
    {
        $date1 = $this->request->getPost('date1');
        $date2 = $this->request->getPost('date2');
        $data = $this->apb2->getDataTempLeftByWeek($date1, $date2);
        return $this->response->setJSON(['data' => $data]);
    }
    public function getDataByWeek_APB2_tempRight()
    {
        $date1 = $this->request->getPost('date1');
        $date2 = $this->request->getPost('date2');
        $data = $this->apb2->getDataTempRightByWeek($date1, $date2);
        return $this->response->setJSON(['data' => $data]);
    }
}
