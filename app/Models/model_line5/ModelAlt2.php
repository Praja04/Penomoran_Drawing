<?php

namespace App\Models\model_line5;

use CodeIgniter\Model;

class ModelAlt2 extends Model
{
    protected $table            = 'line5_data_alt2';
    protected $allowedFields    = [
        'L5_ALT2_ACTUAL_PRESSURE_CELL2',
        'L5_ALT2_RESULT_CELL2',
        'L5_ALT2_ACTUAL_PRESSURE_CELL4',
        'L5_ALT2_RESULT_CELL4',
        'L5_ALT2_ACTUAL_PRESSURE_CELL6',
        'L5_ALT2_RESULT_CELL6',
        'L5_ALT2_FILL_FAILURE_TIME',
        'L5_ALT2_FILL_PRESSURE',
        'L5_ALT2_TEST_PRESSURE',
        'L5_ALT2_LEAK_PRESSURE_TOLERANCE',
        'L5_ALT2_TEST_PRESSURE_TOLERANCE',
        'L5_ALT2_FILL_PRESSURE_TOLERANCE',
        'L5_ALT2_STABILIZATION_TIME',
        'L5_ALT2_TEST_TIME',
        'status',
        'waktu'
    ];
    //result cell
    public function getDataResult_Cell2()
    {
        return $this->select('L5_ALT2_RESULT_CELL2,waktu')
            ->orderBy('waktu', 'DESC')
            ->limit(50)
            ->find();
    }
    public function getDataResult_Cell4()
    {
        return $this->select('L5_ALT2_RESULT_CELL4,waktu')
            ->orderBy('waktu', 'DESC')
            ->limit(50)
            ->find();
    }
    public function getDataResult_Cell6()
    {
        return $this->select('L5_ALT2_RESULT_CELL6,waktu')
            ->orderBy('waktu', 'DESC')
            ->limit(50)
            ->find();
    }

    public function getDataActual_Cell2()
    {
        return $this->select('L5_ALT2_ACTUAL_PRESSURE_CELL2,waktu')
            ->orderBy('waktu', 'DESC')
            ->limit(50)
            ->find();
    }
    public function getDataActual_Cell4()
    {
        return $this->select('L5_ALT2_ACTUAL_PRESSURE_CELL4,waktu')
            ->orderBy('waktu', 'DESC')
            ->limit(50)
            ->find();
    }
    public function getDataActual_Cell6()
    {
        return $this->select('L5_ALT2_ACTUAL_PRESSURE_CELL6,waktu')
            ->orderBy('waktu', 'DESC')
            ->limit(50)
            ->find();
    }


    //filter data
    public function getDataResultcell2ByDate($date)
    {
        $startTime = $date . ' 07:30:00';
        $endTime = date('Y-m-d H:i:s.v', strtotime($date . ' +1 day 07:29:00'));

        return $this->select('L5_ALT2_RESULT_CELL2, waktu')
            ->orderBy('waktu', 'DESC')
            ->where("CAST(waktu AS DATETIME) >= CAST('$startTime' AS DATETIME)") // Menggunakan CAST untuk perbandingan waktu
            ->where("CAST(waktu AS DATETIME) <= CAST('$endTime' AS DATETIME)") // Menggunakan CAST untuk perbandingan waktu
            ->findAll();
    }

    public function getDataResultcell4ByDate($date)
    {
        $startTime = $date . ' 07:30:00';
        $endTime = date('Y-m-d H:i:s.v', strtotime($date . ' +1 day 07:29:00'));

        return $this->select('L5_ALT2_RESULT_CELL4, waktu')
            ->orderBy('waktu', 'DESC')
            ->where("CAST(waktu AS DATETIME) >= CAST('$startTime' AS DATETIME)") // Menggunakan CAST untuk perbandingan waktu
            ->where("CAST(waktu AS DATETIME) <= CAST('$endTime' AS DATETIME)") // Menggunakan CAST untuk perbandingan waktu
            ->findAll();
    }

    public function getDataResultcell6ByDate($date)
    {
        $startTime = $date . ' 07:30:00';
        $endTime = date('Y-m-d H:i:s.v', strtotime($date . ' +1 day 07:29:00'));

        return $this->select('L5_ALT2_RESULT_CELL6, waktu')
            ->orderBy('waktu', 'DESC')
            ->where("CAST(waktu AS DATETIME) >= CAST('$startTime' AS DATETIME)") // Menggunakan CAST untuk perbandingan waktu
            ->where("CAST(waktu AS DATETIME) <= CAST('$endTime' AS DATETIME)") // Menggunakan CAST untuk perbandingan waktu
            ->findAll();
    }

    //week
    public function getDataResultcell2ByWeek($date1, $date2)
    {
        $startTime = $date1 . ' 07:30:00';
        $endTime = date('Y-m-d H:i:s.v', strtotime($date2 . ' +1 day 07:29:00'));

        return $this->select('L5_ALT2_RESULT_CELL2, waktu')
            ->orderBy('waktu', 'DESC')
            ->where("CAST(waktu AS DATETIME) >= CAST('$startTime' AS DATETIME)") // Menggunakan CAST untuk perbandingan waktu
            ->where("CAST(waktu AS DATETIME) <= CAST('$endTime' AS DATETIME)") // Menggunakan CAST untuk perbandingan waktu
            ->findAll();
    }

    public function getDataResultcell4ByWeek($date1, $date2)
    {
        $startTime = $date1 . ' 07:30:00';
        $endTime = date('Y-m-d H:i:s.v', strtotime($date2 . ' +1 day 07:29:00'));
        return $this->select('L5_ALT2_RESULT_CELL4, waktu')
            ->orderBy('waktu', 'DESC')
            ->where("CAST(waktu AS DATETIME) >= CAST('$startTime' AS DATETIME)") // Menggunakan CAST untuk perbandingan waktu
            ->where("CAST(waktu AS DATETIME) <= CAST('$endTime' AS DATETIME)") // Menggunakan CAST untuk perbandingan waktu
            ->findAll();
    }

    public function getDataResultcell6ByWeek($date1, $date2)
    {
        $startTime = $date1 . ' 07:30:00';
        $endTime = date('Y-m-d H:i:s.v', strtotime($date2 . ' +1 day 07:29:00'));

        return $this->select('L5_ALT2_RESULT_CELL6, waktu')
            ->orderBy('waktu', 'DESC')
            ->where("CAST(waktu AS DATETIME) >= CAST('$startTime' AS DATETIME)") // Menggunakan CAST untuk perbandingan waktu
            ->where("CAST(waktu AS DATETIME) <= CAST('$endTime' AS DATETIME)") // Menggunakan CAST untuk perbandingan waktu
            ->findAll();
    }




    //Distinction
    public function getDistinctResult_Cell2()
    {
        // Mengambil tanggal hari ini
        $today = date('Y-m-d');
        $startTime = $today . ' 07:30:00';
        $endTime = date('Y-m-d H:i:s.v', strtotime($today . ' +1 day 07:29:00'));

        return $this->select('L5_ALT2_RESULT_CELL2, COUNT(L5_ALT2_RESULT_CELL2) as count')
            ->groupBy('L5_ALT2_RESULT_CELL2')
            ->where("CAST(waktu AS DATETIME) >= CAST('$startTime' AS DATETIME)") // Menggunakan CAST untuk perbandingan waktu
            ->where("CAST(waktu AS DATETIME) < CAST('$endTime' AS DATETIME)") // Menggunakan CAST untuk perbandingan waktu
            ->orderBy('count', 'DESC')
            ->findAll();
    }


    public function getDistinctResult_Cell4()
    {
        // Mengambil tanggal hari ini
        $today = date('Y-m-d');
        $startTime = $today . ' 07:30:00';
        $endTime = date('Y-m-d H:i:s.v', strtotime($today . ' +1 day 07:29:00'));

        return $this->select('L5_ALT2_RESULT_CELL4, COUNT(L5_ALT2_RESULT_CELL4) as count')
            ->groupBy('L5_ALT2_RESULT_CELL4')
            ->where("CAST(waktu AS DATETIME) >= CAST('$startTime' AS DATETIME)") // Menggunakan CAST untuk perbandingan waktu
            ->where("CAST(waktu AS DATETIME) < CAST('$endTime' AS DATETIME)") // Menggunakan CAST untuk perbandingan waktu
            ->orderBy('count', 'DESC')
            ->findAll();
    }


    public function getDistinctResult_Cell6()
    {
        // Mengambil tanggal hari ini
        $today = date('Y-m-d');
        $startTime = $today . ' 07:30:00';
        $endTime = date('Y-m-d H:i:s.v', strtotime($today . ' +1 day 07:29:00'));

        return $this->select('L5_ALT2_RESULT_CELL6, COUNT(L5_ALT2_RESULT_CELL6) as count')
            ->groupBy('L5_ALT2_RESULT_CELL6')
            ->where("CAST(waktu AS DATETIME) >= CAST('$startTime' AS DATETIME)") // Menggunakan CAST untuk perbandingan waktu
            ->where("CAST(waktu AS DATETIME) < CAST('$endTime' AS DATETIME)") // Menggunakan CAST untuk perbandingan waktu
            ->orderBy('count', 'DESC')
            ->findAll();
    }


    public function getDistinctResult_Cell2byDate($date)
    {
        $startTime = $date . ' 07:30:00';
        $endTime = date('Y-m-d H:i:s.v', strtotime($date . ' +1 day 07:29:00'));
        return $this->select('L5_ALT2_RESULT_CELL2, COUNT(L5_ALT2_RESULT_CELL2) as count')
            ->groupBy('L5_ALT2_RESULT_CELL2')
            ->where("CAST(waktu AS DATETIME) >= CAST('$startTime' AS DATETIME)") // Menggunakan CAST untuk perbandingan waktu
            ->where("CAST(waktu AS DATETIME) < CAST('$endTime' AS DATETIME)") // Menggunakan CAST untuk perbandingan waktu
            ->orderBy('count', 'DESC')
            ->findAll();
    }

    public function getDistinctResult_Cell4byDate($date)
    {
        $startTime = $date . ' 07:30:00';
        $endTime = date('Y-m-d H:i:s.v', strtotime($date . ' +1 day 07:29:00'));

        return $this->select('L5_ALT2_RESULT_CELL4, COUNT(L5_ALT2_RESULT_CELL4) as count')
            ->groupBy('L5_ALT2_RESULT_CELL4')
            ->where("CAST(waktu AS DATETIME) >= CAST('$startTime' AS DATETIME)") // Menggunakan CAST untuk perbandingan waktu
            ->where("CAST(waktu AS DATETIME) < CAST('$endTime' AS DATETIME)") // Menggunakan CAST untuk perbandingan waktu
            ->orderBy('count', 'DESC')
            ->findAll();
    }

    public function getDistinctResult_Cell6byDate($date)
    {
        $startTime = $date . ' 07:30:00';
        $endTime = date('Y-m-d H:i:s.v', strtotime($date . ' +1 day 07:29:00'));

        return $this->select('L5_ALT2_RESULT_CELL6, COUNT(L5_ALT2_RESULT_CELL6) as count')
            ->groupBy('L5_ALT2_RESULT_CELL6')
            ->where("CAST(waktu AS DATETIME) >= CAST('$startTime' AS DATETIME)") // Menggunakan CAST untuk perbandingan waktu
            ->where("CAST(waktu AS DATETIME) < CAST('$endTime' AS DATETIME)") // Menggunakan CAST untuk perbandingan waktu
            ->orderBy('count', 'DESC')
            ->findAll();
    }



    //filter data
    public function getDataActualcell2ByDate($date)
    {
        $startTime = $date . ' 07:30:00';
        $endTime = date('Y-m-d H:i:s.v', strtotime($date . ' +1 day 07:29:00'));

        return $this->select('L5_ALT2_ACTUAL_PRESSURE_CELL2, waktu')
            ->orderBy('waktu', 'DESC')
            ->where("CAST(waktu AS DATETIME) >= CAST('$startTime' AS DATETIME)") // Menggunakan CAST untuk perbandingan waktu
            ->where("CAST(waktu AS DATETIME) <= CAST('$endTime' AS DATETIME)") // Menggunakan CAST untuk perbandingan waktu
            ->findAll();
    }

    public function getDataActualcell4ByDate($date)
    {
        $startTime = $date . ' 07:30:00';
        $endTime = date('Y-m-d H:i:s.v', strtotime($date . ' +1 day 07:29:00'));
        return $this->select('L5_ALT2_ACTUAL_PRESSURE_CELL4, waktu')
            ->orderBy('waktu', 'DESC')
            ->where("CAST(waktu AS DATETIME) >= CAST('$startTime' AS DATETIME)") // Menggunakan CAST untuk perbandingan waktu
            ->where("CAST(waktu AS DATETIME) <= CAST('$endTime' AS DATETIME)") // Menggunakan CAST untuk perbandingan waktu
            ->findAll();
    }

    public function getDataActualcell6ByDate($date)
    {
        $startTime = $date . ' 07:30:00';
        $endTime = date('Y-m-d H:i:s.v', strtotime($date . ' +1 day 07:29:00'));
        return $this->select('L5_ALT2_ACTUAL_PRESSURE_CELL6, waktu')
            ->orderBy('waktu', 'DESC')
            ->where("CAST(waktu AS DATETIME) >= CAST('$startTime' AS DATETIME)") // Menggunakan CAST untuk perbandingan waktu
            ->where("CAST(waktu AS DATETIME) <= CAST('$endTime' AS DATETIME)") // Menggunakan CAST untuk perbandingan waktu
            ->findAll();
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
            $count = $this->where("CAST(waktu AS DATE) = '$today'") // Menggunakan CAST untuk tanggal
                ->where("CAST(waktu AS TIME) >= CAST('{$shift['start']}' AS TIME)") // Menggunakan CAST untuk waktu
                ->where("CAST(waktu AS TIME) <= CAST('{$shift['end']}' AS TIME)") // Menggunakan CAST untuk waktu
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
            $count = $this->where("CAST(waktu AS DATE) = '$today'") // Menggunakan CAST untuk tanggal
                ->where('status', 'OK')
                ->where("CAST(waktu AS TIME) >= CAST('{$shift['start']}' AS TIME)") // Menggunakan CAST untuk waktu
                ->where("CAST(waktu AS TIME) <= CAST('{$shift['end']}' AS TIME)") // Menggunakan CAST untuk waktu
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
            $count = $this->where("CAST(waktu AS DATE) = '$today'") // Menggunakan CAST untuk tanggal
                ->where('status', 'NG')
                ->where("CAST(waktu AS TIME) >= CAST('{$shift['start']}' AS TIME)") // Menggunakan CAST untuk waktu
                ->where("CAST(waktu AS TIME) <= CAST('{$shift['end']}' AS TIME)") // Menggunakan CAST untuk waktu
                ->countAllResults();

            $totalCount[$key] = $count;
        }

        return $totalCount;
    }


    public function getdataNGdetailToday()
    {
        $today = date('Y-m-d');
        $startTime = $today . ' 07:30:00';
        $endTime = date('Y-m-d H:i:s.v', strtotime($today . ' +1 day 07:29:00'));

        return $this->select('line5_data_alt2.*')
            ->orderBy('waktu', 'DESC')
            ->where('status', 'NG')
            ->where("CAST(waktu AS DATETIME) >= CAST('$startTime' AS DATETIME)")  // Menggunakan CAST untuk datetime
            ->where("CAST(waktu AS DATETIME) <= CAST('$endTime' AS DATETIME)")    // Menggunakan CAST untuk datetime
            ->findAll();
    }

    public function getdataNGdetailTodaybyDate($date)
    {
        $startTime = $date . ' 07:30:00';
        $endTime = date('Y-m-d H:i:s.v', strtotime($date . ' +1 day 07:29:00'));

        return $this->select('line5_data_alt2.*')
            ->orderBy('waktu', 'DESC')
            ->where('status', 'NG')
            ->where("CAST(waktu AS DATETIME) >= CAST('$startTime' AS DATETIME)")  // Menggunakan CAST untuk datetime
            ->where("CAST(waktu AS DATETIME) <= CAST('$endTime' AS DATETIME)")    // Menggunakan CAST untuk datetime
            ->findAll();
    }



    //week
    public function getDataActualcell2ByWeek($date1, $date2)
    {
        $startTime = $date1 . ' 07:30:00';
        $endTime = date('Y-m-d H:i:s.v', strtotime($date2 . ' +1 day 07:29:00'));

        return $this->select('L5_ALT2_ACTUAL_PRESSURE_CELL2,waktu')
            ->orderBy('waktu', 'DESC')
            ->where("CAST(waktu AS DATETIME) >= CAST('$startTime' AS DATETIME)") // Menggunakan CAST untuk perbandingan datetime
            ->where("CAST(waktu AS DATETIME) <= CAST('$endTime' AS DATETIME)")   // Menggunakan CAST untuk perbandingan datetime
            ->findAll();
    }

    public function getDataActualcell4ByWeek($date1, $date2)
    {
        $startTime = $date1 . ' 07:30:00';
        $endTime = date('Y-m-d H:i:s.v', strtotime($date2 . ' +1 day 07:29:00'));

        return $this->select('L5_ALT2_ACTUAL_PRESSURE_CELL4,waktu')
            ->orderBy('waktu', 'DESC')
            ->where("CAST(waktu AS DATETIME) >= CAST('$startTime' AS DATETIME)") // Menggunakan CAST untuk perbandingan datetime
            ->where("CAST(waktu AS DATETIME) <= CAST('$endTime' AS DATETIME)")   // Menggunakan CAST untuk perbandingan datetime
            ->findAll();
    }

    public function getDataActualcell6ByWeek($date1, $date2)
    {
        $startTime = $date1 . ' 07:30:00';
        $endTime = date('Y-m-d H:i:s.v', strtotime($date2 . ' +1 day 07:29:00'));

        return $this->select('L5_ALT2_ACTUAL_PRESSURE_CELL6,waktu')
            ->orderBy('waktu', 'DESC')
            ->where("CAST(waktu AS DATETIME) >= CAST('$startTime' AS DATETIME)") // Menggunakan CAST untuk perbandingan datetime
            ->where("CAST(waktu AS DATETIME) <= CAST('$endTime' AS DATETIME)")   // Menggunakan CAST untuk perbandingan datetime
            ->findAll();
    }


    public function getDistinctResult_Cell2byWeek($date1, $date2)
    {
        $startTime = $date1 . ' 07:30:00';
        $endTime = date('Y-m-d H:i:s.v', strtotime($date2 . ' +1 day 07:29:00'));
        return $this->select('L5_ALT2_RESULT_CELL2, COUNT(L5_ALT2_RESULT_CELL2) as count')
        ->groupBy('L5_ALT2_RESULT_CELL2')
        ->where("CAST(waktu AS DATETIME) >= CAST('$startTime' AS DATETIME)") // Menggunakan CAST untuk perbandingan waktu
        ->where("CAST(waktu AS DATETIME) < CAST('$endTime' AS DATETIME)") // Menggunakan CAST untuk perbandingan waktu
        ->orderBy('count', 'DESC')
        ->findAll();
    }

    public function getDistinctResult_Cell4byWeek($date1, $date2)
    {
        $startTime = $date1 . ' 07:30:00';
        $endTime = date('Y-m-d H:i:s.v', strtotime($date2 . ' +1 day 07:29:00'));

        return $this->select('L5_ALT2_RESULT_CELL4, COUNT(L5_ALT2_RESULT_CELL4) as count')
        ->groupBy('L5_ALT2_RESULT_CELL4')
        ->where("CAST(waktu AS DATETIME) >= CAST('$startTime' AS DATETIME)") // Menggunakan CAST untuk perbandingan waktu
        ->where("CAST(waktu AS DATETIME) < CAST('$endTime' AS DATETIME)") // Menggunakan CAST untuk perbandingan waktu
        ->orderBy('count', 'DESC')
        ->findAll();
    }

    public function getDistinctResult_Cell6byWeek($date1, $date2)
    {
        $startTime = $date1 . ' 07:30:00';
        $endTime = date('Y-m-d H:i:s.v', strtotime($date2 . ' +1 day 07:29:00'));

        return $this->select('L5_ALT2_RESULT_CELL6, COUNT(L5_ALT2_RESULT_CELL6) as count')
        ->groupBy('L5_ALT2_RESULT_CELL6')
        ->where("CAST(waktu AS DATETIME) >= CAST('$startTime' AS DATETIME)") // Menggunakan CAST untuk perbandingan waktu
        ->where("CAST(waktu AS DATETIME) < CAST('$endTime' AS DATETIME)") // Menggunakan CAST untuk perbandingan waktu
        ->orderBy('count', 'DESC')
        ->findAll();
    }
}
