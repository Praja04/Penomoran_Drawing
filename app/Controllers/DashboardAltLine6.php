<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\model_line6\ModelAlt1;
use App\Models\model_line6\ModelAlt2;

class DashboardAltLine6 extends BaseController
{
    protected $alt1;
    protected $alt2;
    public function __construct()
    {
        $this->alt1 = new ModelAlt1();
        $this->alt2 = new ModelAlt2();
    }
    public function dashboard_alt1()
    {

        return view('Line6/ALT/dashboard_alt1');
    }
    public function dashboard_alt2()
    {
        //
        return view('Line6/ALT/dashboard_alt2');
    }
    //ALT1
    public function getData_ALT1_cell1()
    {
        $data = $this->alt1->getDataActual_Cell1();
        return $this->response->setJSON(['data' => $data]);
    }

    public function getData_ALT1_cell3()
    {
        $data = $this->alt1->getDataActual_Cell3();
        return $this->response->setJSON(['data' => $data]);
    }

    public function getData_ALT1_cell5()
    {
        $data = $this->alt1->getDataActual_Cell5();
        return $this->response->setJSON(['data' => $data]);
    }

    public function getDistinct_ALT1_cell1()
    {
        $data = $this->alt1->getDistinctResult_Cell1();
        return $this->response->setJSON(['data' => $data]);
    }
    public function getDistinct_ALT1_cell3()
    {
        $data = $this->alt1->getDistinctResult_Cell3();
        return $this->response->setJSON(['data' => $data]);
    }
    public function getDistinct_ALT1_cell5()
    {
        $data = $this->alt1->getDistinctResult_Cell5();
        return $this->response->setJSON(['data' => $data]);
    }

    //Alt 2
    public function getData_ALT2_cell2()
    {
        $data = $this->alt2->getDataActual_Cell2();
        return $this->response->setJSON(['data' => $data]);
    }

    public function getData_ALT2_cell4()
    {
        $data = $this->alt2->getDataActual_Cell4();
        return $this->response->setJSON(['data' => $data]);
    }
    public function getData_ALT2_cell6()
    {
        $data = $this->alt2->getDataActual_Cell6();
        return $this->response->setJSON(['data' => $data]);
    }

    //distinction

    public function getDistinct_ALT2_cell2()
    {
        $data = $this->alt2->getDistinctResult_Cell2();
        return $this->response->setJSON(['data' => $data]);
    }

    public function getDistinct_ALT2_cell4()
    {
        $data = $this->alt2->getDistinctResult_Cell4();
        return $this->response->setJSON(['data' => $data]);
    }
    public function getDistinct_ALT2_cell6()
    {
        $data = $this->alt2->getDistinctResult_Cell6();
        return $this->response->setJSON(['data' => $data]);
    }


    //get data filter alt1
    public function getDataActualCell1ByDate($date)
    {
        $data = $this->alt1->getDataActualcell1ByDate($date);
        return $this->response->setJSON(['data' => $data]);
    }
    public function getDataActualCell3ByDate($date)
    {
        $data = $this->alt1->getDataActualcell3ByDate($date);
        return $this->response->setJSON(['data' => $data]);
    }
    public function getDataActualCell5ByDate($date)
    {
        $data = $this->alt1->getDataActualcell5ByDate($date);
        return $this->response->setJSON(['data' => $data]);
    }

    //get data filter alt2
    public function getDataActualCell2ByDate($date)
    {
        $data = $this->alt2->getDataActualcell2ByDate($date);
        return $this->response->setJSON(['data' => $data]);
    }
    public function getDataActualCell4ByDate($date)
    {
        $data = $this->alt2->getDataActualcell4ByDate($date);
        return $this->response->setJSON(['data' => $data]);
    }
    public function getDataActualCell6ByDate($date)
    {
        $data = $this->alt2->getDataActualcell6ByDate($date);
        return $this->response->setJSON(['data' => $data]);
    }
    public function getDataParameterALT1()
    {
        $data = $this->alt1->getDataParameter();
        return $this->response->setJSON(['data' => $data]);
    }
    public function getDataParameterALT2()
    {
        $data = $this->alt2->getDataParameter();
        return $this->response->setJSON(['data' => $data]);
    }

    public function getDataTodayALT1()
    {
        $data = $this->alt1->getDataToday();
        return $this->response->setJSON(['data' => $data]);
    }
    public function getDataTodayALT2()
    {
        $data = $this->alt2->getDataToday();
        return $this->response->setJSON(['data' => $data]);
    }
    public function getDataOKTodayALT1()
    {
        $data = $this->alt1->getDataOKToday();
        return $this->response->setJSON(['data' => $data]);
    }
    public function getDataNGTodayALT1()
    {
        $data = $this->alt1->getDataNGToday();
        return $this->response->setJSON(['data' => $data]);
    }
    public function getDataOKTodayALT2()
    {
        $data = $this->alt2->getDataOKToday();
        return $this->response->setJSON(['data' => $data]);
    }
    public function getDataNGTodayALT2()
    {
        $data = $this->alt2->getDataNGToday();
        return $this->response->setJSON(['data' => $data]);
    }

    //AlT 1 distinct date
    public function getDistinct_ALT1_cell1byDate($date)
    {
        $data = $this->alt1->getDistinctResult_Cell1byDate($date);
        return $this->response->setJSON(['data' => $data]);
    }
    public function getDistinct_ALT1_cell3byDate($date)
    {
        $data = $this->alt1->getDistinctResult_Cell3byDate($date);
        return $this->response->setJSON(['data' => $data]);
    }
    public function getDistinct_ALT1_cell5byDate($date)
    {
        $data = $this->alt1->getDistinctResult_Cell5byDate($date);
        return $this->response->setJSON(['data' => $data]);
    }
    //ALT 2 distinct with date
    public function getDistinct_ALT2_cell2byDate($date)
    {
        $data = $this->alt2->getDistinctResult_Cell2byDate($date);
        return $this->response->setJSON(['data' => $data]);
    }

    public function getDistinct_ALT2_cell4byDate($date)
    {
        $data = $this->alt2->getDistinctResult_Cell4byDate($date);
        return $this->response->setJSON(['data' => $data]);
    }
    public function getDistinct_ALT2_cell6byDate($date)
    {
        $data = $this->alt2->getDistinctResult_Cell6byDate($date);
        return $this->response->setJSON(['data' => $data]);
    }

    //alt1
    public function getdataNGdetailToday_ALT1()
    {
        $data = $this->alt1->getdataNGdetailToday();
        return $this->response->setJSON(['data' => $data]);
    }
    public function getdataNGdetailTodaybyDate_ALT1($date)
    {
        $data = $this->alt1->getdataNGdetailTodaybyDate($date);
        return $this->response->setJSON(['data' => $data]);
    }
    //alt2
    public function getdataNGdetailToday_ALT2()
    {
        $data = $this->alt2->getdataNGdetailToday();
        return $this->response->setJSON(['data' => $data]);
    }
    public function getdataNGdetailTodaybyDate_ALT2($date)
    {
        $data = $this->alt2->getdataNGdetailTodaybyDate($date);
        return $this->response->setJSON(['data' => $data]);
    }


    //get dat by week
    //alt1
    public function getDataActualCell1ByWeek()
    {
        $date1 = $this->request->getPost('date1');
        $date2 = $this->request->getPost('date2');
        $data = $this->alt1->getDataActualcell1ByWeek($date1, $date2);
        return $this->response->setJSON(['data' => $data]);
    }
    public function getDataActualCell3ByWeek()
    {
        $date1 = $this->request->getPost('date1');
        $date2 = $this->request->getPost('date2');
        $data = $this->alt1->getDataActualcell3ByWeek($date1, $date2);
        return $this->response->setJSON(['data' => $data]);
    }
    public function getDataActualCell5ByWeek()
    {
        $date1 = $this->request->getPost('date1');
        $date2 = $this->request->getPost('date2');
        $data = $this->alt1->getDataActualcell5ByWeek($date1, $date2);
        return $this->response->setJSON(['data' => $data]);
    }

    //alt2
    public function getDataActualCell2ByWeek()
    {
        $date1 = $this->request->getPost('date1');
        $date2 = $this->request->getPost('date2');
        $data = $this->alt2->getDataActualcell2ByWeek($date1,$date2);
        return $this->response->setJSON(['data' => $data]);
    }
    public function getDataActualCell4ByWeek()
    {
        $date1 = $this->request->getPost('date1');
        $date2 = $this->request->getPost('date2');
        $data = $this->alt2->getDataActualcell4ByWeek($date1,$date2);
        return $this->response->setJSON(['data' => $data]);
    }
    public function getDataActualCell6ByWeek()
    {
        $date1 = $this->request->getPost('date1');
        $date2 = $this->request->getPost('date2');
        $data = $this->alt2->getDataActualcell6ByWeek($date1,$date2);
        return $this->response->setJSON(['data' => $data]);
    }



    //result cell
    public function getDataResult_ALT1_cell1()
    {
        $data = $this->alt1->getDataResult_Cell1();
        return $this->response->setJSON(['data' => $data]);
    }

    public function getDataResult_ALT1_cell3()
    {
        $data = $this->alt1->getDataResult_Cell3();
        return $this->response->setJSON(['data' => $data]);
    }

    public function getDataResult_ALT1_cell5()
    {
        $data = $this->alt1->getDataResult_Cell5();
        return $this->response->setJSON(['data' => $data]);
    }
    //Alt 2
    public function getDataResult_ALT2_cell2()
    {
        $data = $this->alt2->getDataResult_Cell2();
        return $this->response->setJSON(['data' => $data]);
    }

    public function getDataResult_ALT2_cell4()
    {
        $data = $this->alt2->getDataResult_Cell4();
        return $this->response->setJSON(['data' => $data]);
    }
    public function getDataResult_ALT2_cell6()
    {
        $data = $this->alt2->getDataResult_Cell6();
        return $this->response->setJSON(['data' => $data]);
    }

    //alt1
    public function getDataResultCell1ByWeek()
    {
        $date1 = $this->request->getPost('date1');
        $date2 = $this->request->getPost('date2');
        $data = $this->alt1->getDataResultcell1ByWeek($date1, $date2);
        return $this->response->setJSON(['data' => $data]);
    }
    public function getDataResultCell3ByWeek()
    {
        $date1 = $this->request->getPost('date1');
        $date2 = $this->request->getPost('date2');
        $data = $this->alt1->getDataResultcell3ByWeek($date1, $date2);
        return $this->response->setJSON(['data' => $data]);
    }
    public function getDataResultCell5ByWeek()
    {
        $date1 = $this->request->getPost('date1');
        $date2 = $this->request->getPost('date2');
        $data = $this->alt1->getDataResultcell5ByWeek($date1, $date2);
        return $this->response->setJSON(['data' => $data]);
    }

    //alt2
    public function getDataResultCell2ByWeek()
    {
        $date1 = $this->request->getPost('date1');
        $date2 = $this->request->getPost('date2');
        $data = $this->alt2->getDataResultcell2ByWeek($date1, $date2);
        return $this->response->setJSON(['data' => $data]);
    }
    public function getDataResultCell4ByWeek()
    {
        $date1 = $this->request->getPost('date1');
        $date2 = $this->request->getPost('date2');
        $data = $this->alt2->getDataResultcell4ByWeek($date1, $date2);
        return $this->response->setJSON(['data' => $data]);
    }
    public function getDataResultCell6ByWeek()
    {
        $date1 = $this->request->getPost('date1');
        $date2 = $this->request->getPost('date2');
        $data = $this->alt2->getDataResultcell6ByWeek($date1, $date2);
        return $this->response->setJSON(['data' => $data]);
    }
    //get data filter alt1
    public function getDataResultCell1ByDate($date)
    {
        $data = $this->alt1->getDataResultcell1ByDate($date);
        return $this->response->setJSON(['data' => $data]);
    }
    public function getDataResultCell3ByDate($date)
    {
        $data = $this->alt1->getDataResultcell3ByDate($date);
        return $this->response->setJSON(['data' => $data]);
    }
    public function getDataResultCell5ByDate($date)
    {
        $data = $this->alt1->getDataResultcell5ByDate($date);
        return $this->response->setJSON(['data' => $data]);
    }

    //get data filter alt2
    public function getDataResultCell2ByDate($date)
    {
        $data = $this->alt2->getDataResultcell2ByDate($date);
        return $this->response->setJSON(['data' => $data]);
    }
    public function getDataResultCell4ByDate($date)
    {
        $data = $this->alt2->getDataResultcell4ByDate($date);
        return $this->response->setJSON(['data' => $data]);
    }
    public function getDataResultCell6ByDate($date)
    {
        $data = $this->alt2->getDataResultcell6ByDate($date);
        return $this->response->setJSON(['data' => $data]);
    }
}
