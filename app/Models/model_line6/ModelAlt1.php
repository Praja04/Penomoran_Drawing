<?php

namespace App\Models\model_line6;

use CodeIgniter\Model;

class ModelAlt1 extends Model
{
    protected $table            = 'line6_data_alt1';

    protected $allowedFields    = [
        'L6_ALT1_ACTUAL_PRESSURE_CELL1',
        'L6_ALT1_RESULT_CELL1',
        'L6_ALT1_ACTUAL_PRESSURE_CELL3',
        'L6_ALT1_RESULT_CELL3',
        'L6_ALT1_ACTUAL_PRESSURE_CELL5',
        'L6_ALT1_RESULT_CELL5',
        'L6_ALT1_FILL_FAILURE_TIME',
        'L6_ALT1_FILL_PRESSURE',
        'L6_ALT1_TEST_PRESSURE',
        'L6_ALT1_LEAK_PRESSURE_TOLERANCE',
        'L6_ALT1_TEST_PRESSURE_TOLERANCE',
        'L6_ALT1_FILL_PRESSURE_TOLERANCE',
        'L6_ALT1_STABILIZATION_TIME',
        'L6_ALT1_TEST_TIME',
        'status',
        'waktu'
    ];


    public function getDataResult_Cell1()
    {
        return $this->select('L6_ALT1_RESULT_CELL1,waktu')
            ->orderBy('waktu', 'DESC')
            ->limit(50)
            ->find();
    }
    public function getDataResult_Cell3()
    {
        return $this->select('L6_ALT1_RESULT_CELL3,waktu')
            ->orderBy('waktu', 'DESC')
            ->limit(50)
            ->find();
    }
    public function getDataResult_Cell5()
    {
        return $this->select('L6_ALT1_RESULT_CELL5,waktu')
            ->orderBy('waktu', 'DESC')
            ->limit(50)
            ->find();
    }

    //filter data
    public function getDataResultcell1ByDate($date)
    {
        $startTime = $date . ' 07:30:00';
        $endTime = date('Y-m-d', strtotime($date . ' +1 day')) . ' 07:29:59';

        return $this->select('L6_ALT1_RESULT_CELL1,waktu')
            ->orderBy('waktu', 'DESC')
            ->where('waktu >=', $startTime)
            ->where('waktu <=', $endTime)
            ->findAll();
    }
    public function getDataResultcell3ByDate($date)
    {
        $startTime = $date . ' 07:30:00';
        $endTime = date('Y-m-d', strtotime($date . ' +1 day')) . ' 07:29:59';

        return $this->select('L6_ALT1_RESULT_CELL3,waktu')
            ->orderBy('waktu', 'DESC')
            ->where('waktu >=', $startTime)
            ->where('waktu <=', $endTime)
            ->findAll();
    }
    public function getDataResultcell5ByDate($date)
    {
        $startTime = $date . ' 07:30:00';
        $endTime = date('Y-m-d', strtotime($date . ' +1 day')) . ' 07:29:59';

        return $this->select('L6_ALT1_RESULT_CELL5,waktu')
            ->orderBy('waktu', 'DESC')
            ->where('waktu >=', $startTime)
            ->where('waktu <=', $endTime)
            ->findAll();
    }

    //by weeek
    public function getDataResultcell1ByWeek($date1, $date2)
    {
        $startTime = $date1 . ' 07:30:00';
        $endTime = date('Y-m-d', strtotime($date2 . ' +1 day')) . ' 07:29:59';

        return $this->select('L6_ALT1_RESULT_CELL1,waktu')
            ->orderBy('waktu', 'DESC')
            ->where('waktu >=', $startTime)
            ->where('waktu <=', $endTime)
            ->findAll();
    }

    public function getDataResultcell3ByWeek($date1, $date2)
    {
        $startTime = $date1 . ' 07:30:00';
        $endTime = date('Y-m-d', strtotime($date2 . ' +1 day')) . ' 07:29:59';

        return $this->select('L6_ALT1_RESULT_CELL3,waktu')
            ->orderBy('waktu', 'DESC')
            ->where('waktu >=', $startTime)
            ->where('waktu <=', $endTime)->findAll();
    }
    public function getDataResultcell5ByWeek($date1, $date2)
    {
        $startTime = $date1 . ' 07:30:00';
        $endTime = date('Y-m-d', strtotime($date2 . ' +1 day')) . ' 07:29:59';
        return $this->select('L6_ALT1_RESULT_CELL5,waktu')
            ->orderBy('waktu', 'DESC')
            ->where('waktu >=', $startTime)
            ->where('waktu <=', $endTime)->findAll();
    }


    public function getDataActual_Cell1()
    {
        return $this->select('L6_ALT1_ACTUAL_PRESSURE_CELL1,waktu')
            ->orderBy('waktu', 'DESC')
            ->limit(50)
            ->find();
    }

    public function getDataActual_Cell3()
    {
        return $this->select('L6_ALT1_ACTUAL_PRESSURE_CELL3,waktu')
            ->orderBy('waktu', 'DESC')
            ->limit(50)
            ->find();
    }
    public function getDataActual_Cell5()
    {
        return $this->select('L6_ALT1_ACTUAL_PRESSURE_CELL5,waktu')
            ->orderBy('waktu', 'DESC')
            ->limit(50)
            ->find();
    }

    //Distinction
    public function getDistinctResult_Cell1()
    { // Mengambil tanggal hari ini
        $today = date('Y-m-d');
        $startTime = $today . ' 07:30:00.000';
        $endTime = date('Y-m-d H:i:s.u', strtotime($today . ' +1 day 07:29:00'));
        return $this->select('L6_ALT1_RESULT_CELL1, COUNT(L6_ALT1_RESULT_CELL1) as count')
            ->groupBy('L6_ALT1_RESULT_CELL1')
            ->where('waktu >=', $startTime)
            ->where('waktu <', $endTime)
            ->orderBy('count', 'DESC')
            ->findAll();
    }

    public function getDistinctResult_Cell3()
    {
        // Mengambil tanggal hari ini
        $today = date('Y-m-d');
        $startTime = $today . ' 07:30:00.000';
        $endTime = date('Y-m-d H:i:s.u', strtotime($today . ' +1 day 07:29:00'));
        return $this->select('L6_ALT1_RESULT_CELL3, COUNT(L6_ALT1_RESULT_CELL3) as count')
            ->groupBy('L6_ALT1_RESULT_CELL3')
            ->where('waktu >=', $startTime)
            ->where('waktu <', $endTime)
            ->orderBy('count', 'DESC')
            ->findAll();
    }

    public function getDistinctResult_Cell5()
    {
        // Mengambil tanggal hari ini
        $today = date('Y-m-d');
        $startTime = $today . ' 07:30:00.000';
        $endTime = date('Y-m-d H:i:s.u', strtotime($today . ' +1 day 07:29:00'));
        return $this->select('L6_ALT1_RESULT_CELL5, COUNT(L6_ALT1_RESULT_CELL5) as count')
            ->groupBy('L6_ALT1_RESULT_CELL5')
            ->where('waktu >=', $startTime)
            ->where('waktu <', $endTime)
            ->orderBy('count', 'DESC')
            ->findAll();
    }

    //get distinct by date
    public function getDistinctResult_Cell1byDate($date)
    {

        $startTime = $date . ' 07:30:00.000';
        $endTime = date('Y-m-d H:i:s.u', strtotime($date . ' +1 day 07:29:00'));
        return $this->select('L6_ALT1_RESULT_CELL1, COUNT(L6_ALT1_RESULT_CELL1) as count')
            ->groupBy('L6_ALT1_RESULT_CELL1')
            ->where('waktu >=', $startTime)
            ->where('waktu <', $endTime)
            ->orderBy('count', 'DESC')
            ->findAll();
    }
    public function getDistinctResult_Cell3byDate($date)
    {

        $startTime = $date . ' 07:30:00.000';
        $endTime = date('Y-m-d H:i:s.u', strtotime($date . ' +1 day 07:29:00'));
        return $this->select('L6_ALT1_RESULT_CELL3, COUNT(L6_ALT1_RESULT_CELL3) as count')
            ->groupBy('L6_ALT1_RESULT_CELL3')
            ->where('waktu >=', $startTime)
            ->where('waktu <', $endTime)
            ->orderBy('count', 'DESC')
            ->findAll();
    }
    public function getDistinctResult_Cell5byDate($date)
    {

        $startTime = $date . ' 07:30:00.000';
        $endTime = date('Y-m-d H:i:s.u', strtotime($date . ' +1 day 07:29:00'));
        return $this->select('L6_ALT1_RESULT_CELL5, COUNT(L6_ALT1_RESULT_CELL5) as count')
            ->groupBy('L6_ALT1_RESULT_CELL5')
            ->where('waktu >=', $startTime)
            ->where('waktu <', $endTime)
            ->orderBy('count', 'DESC')
            ->findAll();
    }


    //filter data
    public function getDataActualcell1ByDate($date)
    {
        $startTime = $date . ' 07:30:00';
        $endTime = date('Y-m-d', strtotime($date . ' +1 day')) . ' 07:29:59';

        return $this->select('L6_ALT1_ACTUAL_PRESSURE_CELL1,waktu')
            ->orderBy('waktu', 'DESC')
            ->where('waktu >=', $startTime)
            ->where('waktu <=', $endTime)
            ->findAll();
    }
    public function getDataActualcell3ByDate($date)
    {
        $startTime = $date . ' 07:30:00';
        $endTime = date('Y-m-d', strtotime($date . ' +1 day')) . ' 07:29:59';

        return $this->select('L6_ALT1_ACTUAL_PRESSURE_CELL3,waktu')
            ->orderBy('waktu', 'DESC')
            ->where('waktu >=', $startTime)
            ->where('waktu <=', $endTime)->findAll();
    }
    public function getDataActualcell5ByDate($date)
    {
        $startTime = $date . ' 07:30:00';
        $endTime = date('Y-m-d', strtotime($date . ' +1 day')) . ' 07:29:59';
        return $this->select('L6_ALT1_ACTUAL_PRESSURE_CELL5,waktu')
            ->orderBy('waktu', 'DESC')
            ->where('waktu >=', $startTime)
            ->where('waktu <=', $endTime)->findAll();
    }

    public function getDataParameter()
    {
        return $this->orderBy('waktu', 'DESC')
            ->first();
    }

    public function getDataToday()
    {
        $today = date('Y-m-d');
        $shifts = [
            [
                'start' => '07:30:01',
                'end' => '16:30:00'
            ],
            [
                'start' => '16:30:01',
                'end' => '23:59:59'
            ],
            [
                'start' => '00:00:00',
                'end' => '07:30:00'
            ]
        ];

        $totalCount = [];

        foreach ($shifts as $key => $shift) {
            $count = $this->where('DATE(waktu)', $today)
                ->where('TIME(waktu) >=', $shift['start'])
                ->where('TIME(waktu) <=', $shift['end'])
                ->countAllResults();

            $totalCount[$key] = $count;
        }

        return $totalCount;
    }

    public function getDataOKToday()
    {
        $today = date('Y-m-d');
        $shifts = [
            [
                'start' => '07:30:01',
                'end' => '16:30:00'
            ],
            [
                'start' => '16:30:01',
                'end' => '23:59:59'
            ],
            [
                'start' => '00:00:00',
                'end' => '07:30:00'
            ]
        ];

        $totalCount = [];

        foreach ($shifts as $key => $shift) {
            $count = $this->where('DATE(waktu)', $today)
                ->where('status', 'OK')
                ->where('TIME(waktu) >=', $shift['start'])
                ->where('TIME(waktu) <=', $shift['end'])
                ->countAllResults();

            $totalCount[$key] = $count;
        }

        return $totalCount;
    }
    public function getDataNGToday()
    {
        $today = date('Y-m-d');
        $shifts = [
            [
                'start' => '07:30:01',
                'end' => '16:30:00'
            ],
            [
                'start' => '16:30:01',
                'end' => '23:59:59'
            ],
            [
                'start' => '00:00:00',
                'end' => '07:30:00'
            ]
        ];

        $totalCount = [];

        foreach ($shifts as $key => $shift) {
            $count = $this->where('DATE(waktu)', $today)
                ->where('status', 'NG')
                ->where('TIME(waktu) >=', $shift['start'])
                ->where('TIME(waktu) <=', $shift['end'])
                ->countAllResults();

            $totalCount[$key] = $count;
        }

        return $totalCount;
    }

    public function getdataNGdetailToday()
    {
        $today = date('Y-m-d');
        $startTime = $today . ' 07:30:00';
        $endTime = date('Y-m-d', strtotime($today . ' +1 day')) . ' 07:29:59';

        return $this->select('line6_data_alt1.*')
            ->orderBy('waktu', 'DESC')
            ->where('status', 'NG')
            ->where('waktu >=', $startTime)
            ->where('waktu <=', $endTime)
            ->findAll();
    }
    public function getdataNGdetailTodaybyDate($date)
    {
        $startTime = $date . ' 07:30:00';
        $endTime = date('Y-m-d', strtotime($date . ' +1 day')) . ' 07:29:59';

        return $this->select('line6_data_alt1.*')
            ->orderBy('waktu', 'DESC')
            ->where('status', 'NG')
            ->where('waktu >=', $startTime)
            ->where('waktu <=', $endTime)
            ->findAll();
    }




    //by weeek
    public function getDataActualcell1ByWeek($date1, $date2)
    {
        $startTime = $date1 . ' 07:30:00';
        $endTime = date('Y-m-d', strtotime($date2 . ' +1 day')) . ' 07:29:59';

        return $this->select('L6_ALT1_ACTUAL_PRESSURE_CELL1,waktu')
            ->orderBy('waktu', 'DESC')
            ->where('waktu >=', $startTime)
            ->where('waktu <=', $endTime)
            ->findAll();
    }

    public function getDataActualcell3ByWeek($date1, $date2)
    {
        $startTime = $date1 . ' 07:30:00';
        $endTime = date('Y-m-d', strtotime($date2 . ' +1 day')) . ' 07:29:59';

        return $this->select('L6_ALT1_ACTUAL_PRESSURE_CELL3,waktu')
            ->orderBy('waktu', 'DESC')
            ->where('waktu >=', $startTime)
            ->where('waktu <=', $endTime)->findAll();
    }
    public function getDataActualcell5ByWeek($date1, $date2)
    {
        $startTime = $date1 . ' 07:30:00';
        $endTime = date('Y-m-d', strtotime($date2 . ' +1 day')) . ' 07:29:59';
        return $this->select('L6_ALT1_ACTUAL_PRESSURE_CELL5,waktu')
            ->orderBy('waktu', 'DESC')
            ->where('waktu >=', $startTime)
            ->where('waktu <=', $endTime)->findAll();
    }
}
