<?php

namespace App\Models\model_line5;

use CodeIgniter\Model;

class ModelAlt1 extends Model
{
    protected $table            = 'line5_data_alt1';

    protected $allowedFields    = [
        'L5_ALT1_ACTUAL_PRESSURE_CELL1',
        'L5_ALT1_RESULT_CELL1',
        'L5_ALT1_ACTUAL_PRESSURE_CELL3',
        'L5_ALT1_RESULT_CELL3',
        'L5_ALT1_ACTUAL_PRESSURE_CELL5',
        'L5_ALT1_RESULT_CELL5',
        'L5_ALT1_FILL_FAILURE_TIME',
        'L5_ALT1_FILL_PRESSURE',
        'L5_ALT1_TEST_PRESSURE',
        'L5_ALT1_LEAK_PRESSURE_TOLERANCE',
        'L5_ALT1_TEST_PRESSURE_TOLERANCE',
        'L5_ALT1_FILL_PRESSURE_TOLERANCE',
        'L5_ALT1_STABILIZATION_TIME',
        'L5_ALT1_TEST_TIME',
        'status',
        'waktu'
    ];


    public function getDataResult_Cell1()
    {
        return $this->select('L5_ALT1_RESULT_CELL1,waktu')
            ->orderBy('waktu', 'DESC')
            ->limit(50)
            ->find();
    }
    public function getDataResult_Cell3()
    {
        return $this->select('L5_ALT1_RESULT_CELL3,waktu')
            ->orderBy('waktu', 'DESC')
            ->limit(50)
            ->find();
    }
    public function getDataResult_Cell5()
    {
        return $this->select('L5_ALT1_RESULT_CELL5,waktu')
            ->orderBy('waktu', 'DESC')
            ->limit(50)
            ->find();
    }

    public function getDataActual_Cell1()
    {
        return $this->select('L5_ALT1_ACTUAL_PRESSURE_CELL1,waktu')
            ->orderBy('waktu', 'DESC')
            ->limit(50)
            ->find();
    }

    public function getDataActual_Cell3()
    {
        return $this->select('L5_ALT1_ACTUAL_PRESSURE_CELL3,waktu')
            ->orderBy('waktu', 'DESC')
            ->limit(50)
            ->find();
    }
    public function getDataActual_Cell5()
    {
        return $this->select('L5_ALT1_ACTUAL_PRESSURE_CELL5,waktu')
            ->orderBy('waktu', 'DESC')
            ->limit(50)
            ->find();
    }

    //filter data
    public function getDataResultcell1ByDate($date)
    {
        // Format waktu awal dan akhir
        $startTime = date('Y-m-d H:i:s', strtotime($date . ' 07:30:00'));
        $endTime = date('Y-m-d H:i:s', strtotime($date . ' +1 day 07:29:59'));

        return $this->select('L5_ALT1_RESULT_CELL1, waktu')
            ->orderBy('waktu', 'DESC')
            ->where("CAST(waktu AS DATETIME) >= '$startTime'")  // Menggunakan CAST untuk memastikan perbandingan waktu di SQL Server
            ->where("CAST(waktu AS DATETIME) <= '$endTime'")    // Menggunakan CAST untuk perbandingan waktu di SQL Server
            ->findAll();
    }

    public function getDataResultcell3ByDate($date)
    {
        // Format waktu awal dan akhir
        $startTime = date('Y-m-d H:i:s', strtotime($date . ' 07:30:00'));
        $endTime = date('Y-m-d H:i:s', strtotime($date . ' +1 day 07:29:59'));

        return $this->select('L5_ALT1_RESULT_CELL3, waktu')
            ->orderBy('waktu', 'DESC')
            ->where("CAST(waktu AS DATETIME) >= '$startTime'")  // Menggunakan CAST untuk memastikan perbandingan waktu di SQL Server
            ->where("CAST(waktu AS DATETIME) <= '$endTime'")    // Menggunakan CAST untuk perbandingan waktu di SQL Server
            ->findAll();
    }

    public function getDataResultcell5ByDate($date)
    {
        // Format waktu awal dan akhir
        $startTime = date('Y-m-d H:i:s', strtotime($date . ' 07:30:00'));
        $endTime = date('Y-m-d H:i:s', strtotime($date . ' +1 day 07:29:59'));

        return $this->select('L5_ALT1_RESULT_CELL5, waktu')
            ->orderBy('waktu', 'DESC')
            ->where("CAST(waktu AS DATETIME) >= '$startTime'")  // Menggunakan CAST untuk memastikan perbandingan waktu di SQL Server
            ->where("CAST(waktu AS DATETIME) <= '$endTime'")    // Menggunakan CAST untuk perbandingan waktu di SQL Server
            ->findAll();
    }


    //by weeek
    public function getDataResultcell1ByWeek($date1, $date2)
    {
        // Format waktu awal dan akhir
        $startTime = date('Y-m-d H:i:s', strtotime($date1 . ' 07:30:00'));
        $endTime = date('Y-m-d H:i:s', strtotime($date2 . ' +1 day 07:29:59'));
        return $this->select('L5_ALT1_RESULT_CELL1, waktu')
            ->orderBy('waktu', 'DESC')
            ->where("CAST(waktu AS DATETIME) >= '$startTime'")  // Menggunakan CAST untuk memastikan perbandingan waktu di SQL Server
            ->where("CAST(waktu AS DATETIME) <= '$endTime'")    // Menggunakan CAST untuk perbandingan waktu di SQL Server
            ->findAll();
    }


    public function getDataResultcell3ByWeek($date1, $date2)
    {
        // Format waktu awal dan akhir
        $startTime = date('Y-m-d H:i:s', strtotime($date1 . ' 07:30:00'));
        $endTime = date('Y-m-d H:i:s', strtotime($date2 . ' +1 day 07:29:59'));

        return $this->select('L5_ALT1_RESULT_CELL3, waktu')
            ->orderBy('waktu', 'DESC')
            ->where("CAST(waktu AS DATETIME) >= '$startTime'")  // Menggunakan CAST untuk memastikan perbandingan waktu di SQL Server
            ->where("CAST(waktu AS DATETIME) <= '$endTime'")    // Menggunakan CAST untuk perbandingan waktu di SQL Server
            ->findAll();
    }

    public function getDataResultcell5ByWeek($date1, $date2)
    {
        // Format waktu awal dan akhir
        $startTime = date('Y-m-d H:i:s', strtotime($date1 . ' 07:30:00'));
        $endTime = date('Y-m-d H:i:s', strtotime($date2 . ' +1 day 07:29:59'));

        return $this->select('L5_ALT1_RESULT_CELL5, waktu')
            ->orderBy('waktu', 'DESC')
            ->where("CAST(waktu AS DATETIME) >= '$startTime'")  // Menggunakan CAST untuk memastikan perbandingan waktu di SQL Server
            ->where("CAST(waktu AS DATETIME) <= '$endTime'")    // Menggunakan CAST untuk perbandingan waktu di SQL Server
            ->findAll();
    }





    //Distinction
    public function getDistinctResult_Cell1()
    {
        // Mengambil tanggal hari ini
        $today = date('Y-m-d');
        $startTime = date('Y-m-d H:i:s', strtotime($today . ' 07:30:00'));
        $endTime = date('Y-m-d H:i:s', strtotime($today . ' +1 day 07:29:59'));

        return $this->select('L5_ALT1_RESULT_CELL1, COUNT(L5_ALT1_RESULT_CELL1) as count')
            ->groupBy('L5_ALT1_RESULT_CELL1')
            ->where("CAST(waktu AS DATETIME) >= '$startTime'")  // Menggunakan CAST untuk memastikan perbandingan waktu di SQL Server
            ->where("CAST(waktu AS DATETIME) < '$endTime'")     // Menggunakan CAST untuk perbandingan waktu di SQL Server
            ->orderBy('count', 'DESC')
            ->findAll();
    }


    public function getDistinctResult_Cell3()
    {
        // Mengambil tanggal hari ini
        $today = date('Y-m-d');
        $startTime = date('Y-m-d H:i:s', strtotime($today . ' 07:30:00'));
        $endTime = date('Y-m-d H:i:s', strtotime($today . ' +1 day 07:29:59'));

        return $this->select('L5_ALT1_RESULT_CELL3, COUNT(L5_ALT1_RESULT_CELL3) as count')
            ->groupBy('L5_ALT1_RESULT_CELL3')
            ->where("CAST(waktu AS DATETIME) >= '$startTime'")  // Menggunakan CAST untuk memastikan perbandingan waktu di SQL Server
            ->where("CAST(waktu AS DATETIME) < '$endTime'")     // Menggunakan CAST untuk perbandingan waktu di SQL Server
            ->orderBy('count', 'DESC')
            ->findAll();
    }


    public function getDistinctResult_Cell5()
    {
        // Mengambil tanggal hari ini
        $today = date('Y-m-d');
        $startTime = date('Y-m-d H:i:s', strtotime($today . ' 07:30:00'));
        $endTime = date('Y-m-d H:i:s', strtotime($today . ' +1 day 07:29:59'));

        return $this->select('L5_ALT1_RESULT_CELL5, COUNT(L5_ALT1_RESULT_CELL5) as count')
            ->groupBy('L5_ALT1_RESULT_CELL5')
            ->where("CAST(waktu AS DATETIME) >= '$startTime'")  // Menggunakan CAST untuk memastikan perbandingan waktu di SQL Server
            ->where("CAST(waktu AS DATETIME) < '$endTime'")     // Menggunakan CAST untuk perbandingan waktu di SQL Server
            ->orderBy('count', 'DESC')
            ->findAll();
    }


    //get distinct by date
    public function getDistinctResult_Cell1byDate($date)
    {
        // Menentukan waktu mulai dan waktu berakhir
        $startTime = date('Y-m-d H:i:s', strtotime($date . ' 07:30:00'));
        $endTime = date('Y-m-d H:i:s', strtotime($date . ' +1 day 07:29:59'));
        return $this->select('L5_ALT1_RESULT_CELL1, COUNT(L5_ALT1_RESULT_CELL1) as count')
            ->groupBy('L5_ALT1_RESULT_CELL1')
            ->where("CAST(waktu AS DATETIME) >= '$startTime'")  // Menggunakan CAST untuk memastikan perbandingan waktu
            ->where("CAST(waktu AS DATETIME) < '$endTime'")     // Menggunakan CAST untuk perbandingan waktu
            ->orderBy('count', 'DESC')
            ->findAll();
    }

    public function getDistinctResult_Cell3byDate($date)
    {
        // Menentukan waktu mulai dan waktu berakhir
        $startTime = date('Y-m-d H:i:s', strtotime($date . ' 07:30:00'));
        $endTime = date('Y-m-d H:i:s', strtotime($date . ' +1 day 07:29:59'));

        return $this->select('L5_ALT1_RESULT_CELL3, COUNT(L5_ALT1_RESULT_CELL3) as count')
            ->groupBy('L5_ALT1_RESULT_CELL3')
            ->where("CAST(waktu AS DATETIME) >= '$startTime'")  // Menggunakan CAST untuk memastikan perbandingan waktu
            ->where("CAST(waktu AS DATETIME) < '$endTime'")     // Menggunakan CAST untuk perbandingan waktu
            ->orderBy('count', 'DESC')
            ->findAll();
    }

    public function getDistinctResult_Cell5byDate($date)
    {
        // Menentukan waktu mulai dan waktu berakhir
        $startTime = date('Y-m-d H:i:s', strtotime($date . ' 07:30:00'));
        $endTime = date('Y-m-d H:i:s', strtotime($date . ' +1 day 07:29:59'));

        return $this->select('L5_ALT1_RESULT_CELL5, COUNT(L5_ALT1_RESULT_CELL5) as count')
            ->groupBy('L5_ALT1_RESULT_CELL5')
            ->where("CAST(waktu AS DATETIME) >= '$startTime'")  // Menggunakan CAST untuk memastikan perbandingan waktu
            ->where("CAST(waktu AS DATETIME) < '$endTime'")     // Menggunakan CAST untuk perbandingan waktu
            ->orderBy('count', 'DESC')
            ->findAll();
    }



    //filter data
    public function getDataActualcell1ByDate($date)
    {
        $startTime = date('Y-m-d H:i:s', strtotime($date . ' 07:30:00'));
        $endTime = date('Y-m-d H:i:s', strtotime($date . ' +1 day 07:29:59'));

        return $this->select('L5_ALT1_ACTUAL_PRESSURE_CELL1,waktu')
            ->orderBy('waktu', 'DESC')
            ->where("CAST(waktu AS DATETIME) >= '$startTime'")  // Menggunakan CAST untuk perbandingan waktu
            ->where("CAST(waktu AS DATETIME) <= '$endTime'")    // Menggunakan CAST untuk perbandingan waktu
            ->findAll();
    }

    public function getDataActualcell3ByDate($date)
    {
        $startTime = date('Y-m-d H:i:s', strtotime($date . ' 07:30:00'));
        $endTime = date('Y-m-d H:i:s', strtotime($date . ' +1 day 07:29:59'));

        return $this->select('L5_ALT1_ACTUAL_PRESSURE_CELL3,waktu')
            ->orderBy('waktu', 'DESC')
            ->where("CAST(waktu AS DATETIME) >= '$startTime'")  // Menggunakan CAST untuk perbandingan waktu
            ->where("CAST(waktu AS DATETIME) <= '$endTime'")    // Menggunakan CAST untuk perbandingan waktu
            ->findAll();
    }

    public function getDataActualcell5ByDate($date)
    {
        $startTime = date('Y-m-d H:i:s', strtotime($date . ' 07:30:00'));
        $endTime = date('Y-m-d H:i:s', strtotime($date . ' +1 day 07:29:59'));

        return $this->select('L5_ALT1_ACTUAL_PRESSURE_CELL5,waktu')
            ->orderBy('waktu', 'DESC')
            ->where("CAST(waktu AS DATETIME) >= '$startTime'")  // Menggunakan CAST untuk perbandingan waktu
            ->where("CAST(waktu AS DATETIME) <= '$endTime'")    // Menggunakan CAST untuk perbandingan waktu
            ->findAll();
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
            $count = $this->where("CAST(waktu AS DATE) = '$today'") // Menggunakan CAST untuk tanggal
                ->where("CAST(waktu AS TIME) >= '{$shift['start']}'") // Menggunakan CAST untuk waktu
                ->where("CAST(waktu AS TIME) <= '{$shift['end']}'") // Menggunakan CAST untuk waktu
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
            $count = $this->where("CAST(waktu AS DATE) = '$today'") // Menggunakan CAST untuk tanggal
                ->where('status', 'OK')
                ->where("CAST(waktu AS TIME) >= '{$shift['start']}'") // Menggunakan CAST untuk waktu
                ->where("CAST(waktu AS TIME) <= '{$shift['end']}'") // Menggunakan CAST untuk waktu
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
            $count = $this->where("CAST(waktu AS DATE) = '$today'") // Menggunakan CAST untuk tanggal
                ->where('status', 'NG')
                ->where("CAST(waktu AS TIME) >= '{$shift['start']}'") // Menggunakan CAST untuk waktu
                ->where("CAST(waktu AS TIME) <= '{$shift['end']}'") // Menggunakan CAST untuk waktu
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

        return $this->select('line5_data_alt1.*')
            ->orderBy('waktu', 'DESC')
            ->where('status', 'NG')
            ->where("CAST(waktu AS DATE) = '$today'") // Menggunakan CAST untuk tanggal
            ->where("CAST(waktu AS TIME) >= '07:30:00'") // Menggunakan CAST untuk waktu
            ->where("CAST(waktu AS TIME) <= '23:59:59'") // Menggunakan CAST untuk waktu
            ->findAll();
    }

    public function getdataNGdetailTodaybyDate($date)
    {
        $startTime = $date . ' 07:30:00';
        $endTime = date('Y-m-d', strtotime($date . ' +1 day')) . ' 07:29:59';

        return $this->select('line5_data_alt1.*')
            ->orderBy('waktu', 'DESC')
            ->where('status', 'NG')
            ->where("CAST(waktu AS DATE) = '$date'") // Menggunakan CAST untuk tanggal
            ->where("CAST(waktu AS TIME) >= '07:30:00'") // Menggunakan CAST untuk waktu
            ->where("CAST(waktu AS TIME) <= '23:59:59'") // Menggunakan CAST untuk waktu
            ->findAll();
    }





    //by weeek
    public function getDataActualcell1ByWeek($date1, $date2)
    {
        $startTime = date('Y-m-d H:i:s', strtotime($date1 . ' 07:30:00'));
        $endTime = date('Y-m-d H:i:s', strtotime($date2 . ' +1 day 07:29:59'));

        return $this->select('L5_ALT1_ACTUAL_PRESSURE_CELL1, waktu')
            ->orderBy('waktu', 'DESC')
            ->where("CAST(waktu AS DATETIME) >= CAST('$startTime' AS DATETIME)") // Gunakan CAST untuk perbandingan waktu
            ->where("CAST(waktu AS DATETIME) <= CAST('$endTime' AS DATETIME)") // Gunakan CAST untuk perbandingan waktu
            ->findAll();
    }


    public function getDataActualcell3ByWeek($date1, $date2)
    {
        $startTime = date('Y-m-d H:i:s', strtotime($date1 . ' 07:30:00'));
        $endTime = date('Y-m-d H:i:s', strtotime($date2 . ' +1 day 07:29:59'));

        return $this->select('L5_ALT1_ACTUAL_PRESSURE_CELL3, waktu')
            ->orderBy('waktu', 'DESC')
            ->where("CAST(waktu AS DATETIME) >= CAST('$startTime' AS DATETIME)") // Gunakan CAST untuk perbandingan waktu
            ->where("CAST(waktu AS DATETIME) <= CAST('$endTime' AS DATETIME)") // Gunakan CAST untuk perbandingan waktu
            ->findAll();
    }

    public function getDataActualcell5ByWeek($date1, $date2)
    {
        $startTime = date('Y-m-d H:i:s', strtotime($date1 . ' 07:30:00'));
        $endTime = date('Y-m-d H:i:s', strtotime($date2 . ' +1 day 07:29:59'));
        return $this->select('L5_ALT1_ACTUAL_PRESSURE_CELL5, waktu')
            ->orderBy('waktu', 'DESC')
            ->where("CAST(waktu AS DATETIME) >= CAST('$startTime' AS DATETIME)") // Gunakan CAST untuk perbandingan waktu
            ->where("CAST(waktu AS DATETIME) <= CAST('$endTime' AS DATETIME)") // Gunakan CAST untuk perbandingan waktu
            ->findAll();
    }
}
