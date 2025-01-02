<?php

namespace App\Models\model_line6;

use CodeIgniter\Model;

class ModelAlt2 extends Model
{
    protected $table            = 'line6_data_alt2';
    protected $allowedFields    = [
        'L6_ALT2_ACTUAL_PRESSURE_CELL2',
        'L6_ALT2_RESULT_CELL2',
        'L6_ALT2_ACTUAL_PRESSURE_CELL4',
        'L6_ALT2_RESULT_CELL4',
        'L6_ALT2_ACTUAL_PRESSURE_CELL6',
        'L6_ALT2_RESULT_CELL6',
        'L6_ALT2_FILL_FAILURE_TIME',
        'L6_ALT2_FILL_PRESSURE',
        'L6_ALT2_TEST_PRESSURE',
        'L6_ALT2_LEAK_PRESSURE_TOLERANCE',
        'L6_ALT2_TEST_PRESSURE_TOLERANCE',
        'L6_ALT2_FILL_PRESSURE_TOLERANCE',
        'L6_ALT2_STABILIZATION_TIME',
        'L6_ALT2_TEST_TIME',
        'status',
        'waktu'
    ];
    //result cell
    public function getDataResult_Cell2()
    {
        return $this->select('L6_ALT2_RESULT_CELL2,waktu')
            ->orderBy('waktu', 'DESC')
            ->limit(50)
            ->find();
    }
    public function getDataResult_Cell4()
    {
        return $this->select('L6_ALT2_RESULT_CELL4,waktu')
            ->orderBy('waktu', 'DESC')
            ->limit(50)
            ->find();
    }
    public function getDataResult_Cell6()
    {
        return $this->select('L6_ALT2_RESULT_CELL6,waktu')
            ->orderBy('waktu', 'DESC')
            ->limit(50)
            ->find();
    }
    //filter data
    public function getDataResultcell2ByDate($date)
    {
        $startTime = $date . ' 07:30:00';
        $endTime = date('Y-m-d', strtotime($date . ' +1 day')) . ' 07:29:59';
        return $this->select('L6_ALT2_RESULT_CELL2,waktu')
            ->orderBy('waktu', 'DESC')
            ->where('waktu >=', $startTime)
            ->where('waktu <=', $endTime)->findAll();
    }
    public function getDataResultcell4ByDate($date)
    {
        $startTime = $date . ' 07:30:00';
        $endTime = date('Y-m-d', strtotime($date . ' +1 day')) . ' 07:29:59';
        return $this->select('L6_ALT2_RESULT_CELL4,waktu')
            ->orderBy('waktu', 'DESC')
            ->where('waktu >=', $startTime)
            ->where('waktu <=', $endTime)->findAll();
    }
    public function getDataResultcell6ByDate($date)
    {
        $startTime = $date . ' 07:30:00';
        $endTime = date('Y-m-d', strtotime($date . ' +1 day')) . ' 07:29:59';
        return $this->select('L6_ALT2_RESULT_CELL6,waktu')
            ->orderBy('waktu', 'DESC')
            ->where('waktu >=', $startTime)
            ->where('waktu <=', $endTime)->findAll();
    } //week
    public function getDataResultcell2ByWeek($date1, $date2)
    {
        $startTime = $date1 . ' 07:30:00';
        $endTime = date('Y-m-d', strtotime($date2 . ' +1 day')) . ' 07:29:59';
        return $this->select('L6_ALT2_RESULT_CELL2,waktu')
            ->orderBy('waktu', 'DESC')
            ->where('waktu >=', $startTime)
            ->where('waktu <=', $endTime)->findAll();
    }
    public function getDataResultcell4ByWeek($date1, $date2)
    {
        $startTime = $date1 . ' 07:30:00';
        $endTime = date('Y-m-d', strtotime($date2 . ' +1 day')) . ' 07:29:59';
        return $this->select('L6_ALT2_RESULT_CELL4,waktu')
            ->orderBy('waktu', 'DESC')
            ->where('waktu >=', $startTime)
            ->where('waktu <=', $endTime)->findAll();
    }
    public function getDataResultcell6ByWeek($date1, $date2)
    {
        $startTime = $date1 . ' 07:30:00';
        $endTime = date('Y-m-d', strtotime($date2 . ' +1 day')) . ' 07:29:59';
        return $this->select('L6_ALT2_RESULT_CELL6,waktu')
            ->orderBy('waktu', 'DESC')
            ->where('waktu >=', $startTime)
            ->where('waktu <=', $endTime)->findAll();
    }



    public function getDataActual_Cell2()
    {
        return $this->select('L6_ALT2_ACTUAL_PRESSURE_CELL2,waktu')
            ->orderBy('waktu', 'DESC')
            ->limit(50)
            ->find();
    }

    public function getDataActual_Cell4()
    {
        return $this->select('L6_ALT2_ACTUAL_PRESSURE_CELL4,waktu')
            ->orderBy('waktu', 'DESC')
            ->limit(50)
            ->find();
    }
    public function getDataActual_Cell6()
    {
        return $this->select('L6_ALT2_ACTUAL_PRESSURE_CELL6,waktu')
            ->orderBy('waktu', 'DESC')
            ->limit(50)
            ->find();
    }

    //Distinction
    public function getDistinctResult_Cell2()
    { // Mengambil tanggal hari ini
        $today = date('Y-m-d');
        $startTime = $today . ' 07:30:00.000';
        $endTime = date('Y-m-d H:i:s.u', strtotime($today . ' +1 day 07:29:00'));
        return $this->select('L6_ALT2_RESULT_CELL2, COUNT(L6_ALT2_RESULT_CELL2) as count')
            ->groupBy('L6_ALT2_RESULT_CELL2')
            ->where('waktu >=', $startTime)
            ->where('waktu <', $endTime)
            ->orderBy('count', 'DESC')
            ->findAll();
    }

    public function getDistinctResult_Cell4()
    { // Mengambil tanggal hari ini
        $today = date('Y-m-d');
        $startTime = $today . ' 07:30:00.000';
        $endTime = date('Y-m-d H:i:s.u', strtotime($today . ' +1 day 07:29:00'));
        return $this->select('L6_ALT2_RESULT_CELL4, COUNT(L6_ALT2_RESULT_CELL4) as count')
            ->groupBy('L6_ALT2_RESULT_CELL4')
            ->where('waktu >=', $startTime)
            ->where('waktu <', $endTime)
            ->orderBy('count', 'DESC')
            ->findAll();
    }

    public function getDistinctResult_Cell6()
    { // Mengambil tanggal hari ini
        $today = date('Y-m-d');
        $startTime = $today . ' 07:30:00.000';
        $endTime = date('Y-m-d H:i:s.u', strtotime($today . ' +1 day 07:29:00'));
        return $this->select('L6_ALT2_RESULT_CELL6, COUNT(L6_ALT2_RESULT_CELL6) as count')
            ->groupBy('L6_ALT2_RESULT_CELL6')
            ->where('waktu >=', $startTime)
            ->where('waktu <', $endTime)
            ->orderBy('count', 'DESC')
            ->findAll();
    }

    public function getDistinctResult_Cell2byDate($date)
    {

        $startTime = $date . ' 07:30:00.000';
        $endTime = date('Y-m-d H:i:s.u', strtotime($date . ' +1 day 07:29:00'));
        return $this->select('L6_ALT2_RESULT_CELL2, COUNT(L6_ALT2_RESULT_CELL2) as count')
            ->groupBy('L6_ALT2_RESULT_CELL2')
            ->where('waktu >=', $startTime)
            ->where('waktu <', $endTime)
            ->orderBy('count', 'DESC')
            ->findAll();
    }
    public function getDistinctResult_Cell4byDate($date)
    {

        $startTime = $date . ' 07:30:00.000';
        $endTime = date('Y-m-d H:i:s.u', strtotime($date . ' +1 day 07:29:00'));
        return $this->select('L6_ALT2_RESULT_CELL4, COUNT(L6_ALT2_RESULT_CELL4) as count')
            ->groupBy('L6_ALT2_RESULT_CELL4')
            ->where('waktu >=', $startTime)
            ->where('waktu <', $endTime)
            ->orderBy('count', 'DESC')
            ->findAll();
    }
    public function getDistinctResult_Cell6byDate($date)
    {

        $startTime = $date . ' 07:30:00.000';
        $endTime = date('Y-m-d H:i:s.u', strtotime($date . ' +1 day 07:29:00'));
        return $this->select('L6_ALT2_RESULT_CELL6, COUNT(L6_ALT2_RESULT_CELL6) as count')
            ->groupBy('L6_ALT2_RESULT_CELL6')
            ->where('waktu >=', $startTime)
            ->where('waktu <', $endTime)
            ->orderBy('count', 'DESC')
            ->findAll();
    }


    //filter data
    public function getDataActualcell2ByDate($date)
    {
        $startTime = $date . ' 07:30:00';
        $endTime = date('Y-m-d', strtotime($date . ' +1 day')) . ' 07:29:59';
        return $this->select('L6_ALT2_ACTUAL_PRESSURE_CELL2,waktu')
            ->orderBy('waktu', 'DESC')
            ->where('waktu >=', $startTime)
            ->where('waktu <=', $endTime)->findAll();
    }
    public function getDataActualcell4ByDate($date)
    {
        $startTime = $date . ' 07:30:00';
        $endTime = date('Y-m-d', strtotime($date . ' +1 day')) . ' 07:29:59';
        return $this->select('L6_ALT2_ACTUAL_PRESSURE_CELL4,waktu')
            ->orderBy('waktu', 'DESC')
            ->where('waktu >=', $startTime)
            ->where('waktu <=', $endTime)->findAll();
    }
    public function getDataActualcell6ByDate($date)
    {
        $startTime = $date . ' 07:30:00';
        $endTime = date('Y-m-d', strtotime($date . ' +1 day')) . ' 07:29:59';
        return $this->select('L6_ALT2_ACTUAL_PRESSURE_CELL6,waktu')
            ->orderBy('waktu', 'DESC')
            ->where('waktu >=', $startTime)
            ->where('waktu <=', $endTime)->findAll();
    }

    //get parameter
    public function getDataParameter()
    {
        return $this->orderBy('waktu', 'DESC')
            ->first();
    }

    public function getDataToday()
    {
        $today = date('Y-m-d');

        // Define the time ranges for shifts
        $shifts = [
            [
                'start' => '07:30:01',
                'end' => '16:30:00'
            ],
            [
                'start' => '16:30:01',
                'end' => '23:59:59' // Adjusted end time for the first shift
            ],
            [
                'start' => '00:00:00', // Start of the second shift
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

        // Define the time ranges for shifts
        $shifts = [
            [
                'start' => '07:30:01',
                'end' => '16:30:00'
            ],
            [
                'start' => '16:30:01',
                'end' => '23:59:59' // Adjusted end time for the first shift
            ],
            [
                'start' => '00:00:00', // Start of the second shift
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

        // Define the time ranges for shifts
        $shifts = [
            [
                'start' => '07:30:01',
                'end' => '16:30:00'
            ],
            [
                'start' => '16:30:01',
                'end' => '23:59:59' // Adjusted end time for the first shift
            ],
            [
                'start' => '00:00:00', // Start of the second shift
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

    //getdatangdetail
    public function getdataNGdetailToday()
    {
        $today = date('Y-m-d');
        $startTime = $today . ' 07:30:00';
        $endTime = date('Y-m-d', strtotime($today . ' +1 day')) . ' 07:29:59';

        return $this->select('line6_data_alt2.*')
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

        return $this->select('line6_data_alt2.*')
            ->orderBy('waktu', 'DESC')
            ->where('status', 'NG')
            ->where('waktu >=', $startTime)
            ->where('waktu <=', $endTime)
            ->findAll();
    }


    //week
    public function getDataActualcell2ByWeek($date1, $date2)
    {
        $startTime = $date1 . ' 07:30:00';
        $endTime = date('Y-m-d', strtotime($date2 . ' +1 day')) . ' 07:29:59';
        return $this->select('L6_ALT2_ACTUAL_PRESSURE_CELL2,waktu')
            ->orderBy('waktu', 'DESC')
            ->where('waktu >=', $startTime)
            ->where('waktu <=', $endTime)->findAll();
    }
    public function getDataActualcell4ByWeek($date1, $date2)
    {
        $startTime = $date1 . ' 07:30:00';
        $endTime = date('Y-m-d', strtotime($date2 . ' +1 day')) . ' 07:29:59';
        return $this->select('L6_ALT2_ACTUAL_PRESSURE_CELL4,waktu')
            ->orderBy('waktu', 'DESC')
            ->where('waktu >=', $startTime)
            ->where('waktu <=', $endTime)->findAll();
    }
    public function getDataActualcell6ByWeek($date1, $date2)
    {
        $startTime = $date1 . ' 07:30:00';
        $endTime = date('Y-m-d', strtotime($date2 . ' +1 day')) . ' 07:29:59';
        return $this->select('L6_ALT2_ACTUAL_PRESSURE_CELL6,waktu')
            ->orderBy('waktu', 'DESC')
            ->where('waktu >=', $startTime)
            ->where('waktu <=', $endTime)->findAll();
    }
}
