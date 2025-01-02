<?php

namespace App\Models\model_line6;

use CodeIgniter\Model;

class ModelHsm1 extends Model
{
    protected $table            = 'line6_data_hsm1';

    protected $allowedFields = [
        'L6_HSM1_TEMP_LEFT',
        'L6_HSM1_TEMP_RIGHT',
        'L6_HSM1_TEMP_SET_VALUE',
        'L6_HSM1_LID_HOLDER_ACTUAL_POS',
        'L6_HSM1_LID_HOLDER_WAITING_POS',
        'L6_HSM1_LID_HOLDER_HOLDING_POS',
        'L6_HSM1_LID_HOLDER_MELTING_POS',
        'L6_HSM1_LID_HOLDER_SEALING_POS',
        'L6_HSM1_BOX_LIFTER_ACTUAL_POS',
        'L6_HSM1_BOX_LIFTER_WAITING_POS',
        'L6_HSM1_BOX_LIFTER_MELTING_POS',
        'L6_HSM1_BOX_LIFTER_SEALING_POS',
        'L6_HSM1_BOX_LIFTER_FEEDING_POS',
        'L6_HSM1_MIRROR_ACTUAL_POS',
        'L6_HSM1_MIRROR_WAITING_POS',
        'L6_HSM1_MIRROR_MELTING_POS',
        'UPPER_LIMIT_TEMP',
        'LOWER_LIMIT_TEMP',
        'L6_HSM1_TYPE_BATTERY',
        'L6_HSM1_LID_MELTING_TIME',
        'L6_HSM1_BOX_MELTING_TIME',
        'L6_HSM1_SEALING_TIME',
        'waktu'
    ];

    public function getDataTempLeft_HSM1()
    {
        return $this->select('L6_HSM1_TYPE_BATTERY,L6_HSM1_TEMP_LEFT, L6_HSM1_TEMP_SET_VALUE,waktu')
            ->orderBy('waktu', 'DESC')
            ->limit(50)
            ->find();
    }
    public function getDataTempRight_HSM1()
    {
        return $this->select('L6_HSM1_TYPE_BATTERY,L6_HSM1_TEMP_RIGHT, L6_HSM1_TEMP_SET_VALUE,waktu')
            ->orderBy('waktu', 'DESC')
            ->limit(50)
            ->find();
    }

    //get data melting
    public function getDataLidHolderMelting_HSM1()
    {
        return $this->select('L6_HSM1_LID_HOLDER_MELTING_POS,L6_HSM1_LID_HOLDER_ACTUAL_POS,waktu')
            ->orderBy('waktu', 'DESC')
            ->limit(50)
            ->find();
    }
    public function getDataBoxLifterMelting_HSM1()
    {
        return $this->select('L6_HSM1_BOX_LIFTER_ACTUAL_POS,L6_HSM1_BOX_LIFTER_MELTING_POS,waktu')
            ->orderBy('waktu', 'DESC')
            ->limit(50)
            ->find();
    }
    public function getDataMirrorPos_HSM1()
    {
        return $this->select('L6_HSM1_MIRROR_ACTUAL_POS,L6_HSM1_MIRROR_MELTING_POS,waktu')
            ->orderBy('waktu', 'DESC')
            ->limit(50)
            ->find();
    }

    public function getDistinctTempLeft()
    {
        $today = date('Y-m-d');
        $startTime = $today . ' 07:30:00.000';
        $endTime = date('Y-m-d H:i:s.u', strtotime($today . ' +1 day 07:29:00'));
        return $this->select("CASE 
                                WHEN L6_HSM1_TEMP_LEFT BETWEEN 360 AND 369.9 THEN '360-369.9' 
                                WHEN L6_HSM1_TEMP_LEFT BETWEEN 370 AND 379.9 THEN '370-379.9' 
                                WHEN L6_HSM1_TEMP_LEFT BETWEEN 380 AND 389.9 THEN '380-389.9' 
                                WHEN L6_HSM1_TEMP_LEFT BETWEEN 390 AND 399.9 THEN '390-399.9' 
                                WHEN L6_HSM1_TEMP_LEFT BETWEEN 400 AND 409.9 THEN '400-409.9' 
                                WHEN L6_HSM1_TEMP_LEFT BETWEEN 410 AND 419.9 THEN '410-419.9' 
                                WHEN L6_HSM1_TEMP_LEFT BETWEEN 420 AND 429.9 THEN '420-429.9' 
                                WHEN L6_HSM1_TEMP_LEFT BETWEEN 430 AND 439.9 THEN '430-439.9' 
                                WHEN L6_HSM1_TEMP_LEFT BETWEEN 440 AND 449.9 THEN '440-449.9' 
                                WHEN L6_HSM1_TEMP_LEFT BETWEEN 450 AND 459.9 THEN '450-459.9' 
                                WHEN L6_HSM1_TEMP_LEFT BETWEEN 460 AND 470.9 THEN '460-470.9' 
                                ELSE 'OTHER' 
                            END AS TEMP_LEFT_RANGE, 
                            COUNT(*) AS count")
            ->where('waktu >=', $startTime)
            ->where('waktu <', $endTime)
            ->groupBy('TEMP_LEFT_RANGE')
            ->orderBy('count', 'DESC') // Aktifkan kembali jika ingin mengurutkan
            ->findAll();
    }

    public function getDistinctTempRight()
    {
        // Mengambil tanggal hari ini
        $today = date('Y-m-d');
        $startTime = $today . ' 07:30:00.000';
        $endTime = date('Y-m-d H:i:s.u', strtotime($today . ' +1 day 07:29:00'));
        return $this->select("CASE 
                                WHEN L6_HSM1_TEMP_RIGHT BETWEEN 360 AND 369.9 THEN '360-369.9' 
                                WHEN L6_HSM1_TEMP_RIGHT BETWEEN 370 AND 379.9 THEN '370-379.9' 
                                WHEN L6_HSM1_TEMP_RIGHT BETWEEN 380 AND 389.9 THEN '380-389.9' 
                                WHEN L6_HSM1_TEMP_RIGHT BETWEEN 390 AND 399.9 THEN '390-399.9' 
                                WHEN L6_HSM1_TEMP_RIGHT BETWEEN 400 AND 409.9 THEN '400-409.9' 
                                WHEN L6_HSM1_TEMP_RIGHT BETWEEN 410 AND 419.9 THEN '410-419.9' 
                                WHEN L6_HSM1_TEMP_RIGHT BETWEEN 420 AND 429.9 THEN '420-429.9' 
                                WHEN L6_HSM1_TEMP_RIGHT BETWEEN 430 AND 439.9 THEN '430-439.9' 
                                WHEN L6_HSM1_TEMP_RIGHT BETWEEN 440 AND 449.9 THEN '440-449.9' 
                                WHEN L6_HSM1_TEMP_RIGHT BETWEEN 450 AND 459.9 THEN '450-459.9' 
                                WHEN L6_HSM1_TEMP_RIGHT BETWEEN 460 AND 470.9 THEN '460-470.9' 
                                ELSE 'OTHER' 
                            END AS TEMP_RIGHT_RANGE, 
                            COUNT(*) AS count")
            ->groupBy('TEMP_RIGHT_RANGE')
            ->where('waktu >=', $startTime)
            ->where('waktu <', $endTime)
            //  ->orderBy('count', 'DESC')
            ->findAll();
    }
    //get distinct by date
    public function getDistinctTempLeftbyDate($date)
    {

        $startTime = $date . ' 07:30:00.000';
        $endTime = date('Y-m-d H:i:s.u', strtotime($date . ' +1 day 07:29:00'));
        return $this->select("CASE 
                                WHEN L6_HSM1_TEMP_LEFT BETWEEN 360 AND 369.9 THEN '360-369.9' 
                                WHEN L6_HSM1_TEMP_LEFT BETWEEN 370 AND 379.9 THEN '370-379.9' 
                                WHEN L6_HSM1_TEMP_LEFT BETWEEN 380 AND 389.9 THEN '380-389.9' 
                                WHEN L6_HSM1_TEMP_LEFT BETWEEN 390 AND 399.9 THEN '390-399.9' 
                                WHEN L6_HSM1_TEMP_LEFT BETWEEN 400 AND 409.9 THEN '400-409.9' 
                                WHEN L6_HSM1_TEMP_LEFT BETWEEN 410 AND 419.9 THEN '410-419.9' 
                                WHEN L6_HSM1_TEMP_LEFT BETWEEN 420 AND 429.9 THEN '420-429.9' 
                                WHEN L6_HSM1_TEMP_LEFT BETWEEN 430 AND 439.9 THEN '430-439.9' 
                                WHEN L6_HSM1_TEMP_LEFT BETWEEN 440 AND 449.9 THEN '440-449.9' 
                                WHEN L6_HSM1_TEMP_LEFT BETWEEN 450 AND 459.9 THEN '450-459.9' 
                                WHEN L6_HSM1_TEMP_LEFT BETWEEN 460 AND 470.9 THEN '460-470.9' 
                                ELSE 'OTHER' 
                            END AS TEMP_LEFT_RANGE, 
                            COUNT(*) AS count")
            ->where('waktu >=', $startTime)
            ->where('waktu <', $endTime)
            ->groupBy('TEMP_LEFT_RANGE')
            ->orderBy('count', 'DESC') // Aktifkan kembali jika ingin mengurutkan
            ->findAll();
    }

    public function getDistinctTempRightbyDate($date)
    {

        $startTime = $date . ' 07:30:00.000';
        $endTime = date('Y-m-d H:i:s.u', strtotime($date . ' +1 day 07:29:00'));
        return $this->select("CASE 
                                WHEN L6_HSM1_TEMP_RIGHT BETWEEN 360 AND 369.9 THEN '360-369.9' 
                                WHEN L6_HSM1_TEMP_RIGHT BETWEEN 370 AND 379.9 THEN '370-379.9' 
                                WHEN L6_HSM1_TEMP_RIGHT BETWEEN 380 AND 389.9 THEN '380-389.9' 
                                WHEN L6_HSM1_TEMP_RIGHT BETWEEN 390 AND 399.9 THEN '390-399.9' 
                                WHEN L6_HSM1_TEMP_RIGHT BETWEEN 400 AND 409.9 THEN '400-409.9' 
                                WHEN L6_HSM1_TEMP_RIGHT BETWEEN 410 AND 419.9 THEN '410-419.9' 
                                WHEN L6_HSM1_TEMP_RIGHT BETWEEN 420 AND 429.9 THEN '420-429.9' 
                                WHEN L6_HSM1_TEMP_RIGHT BETWEEN 430 AND 439.9 THEN '430-439.9' 
                                WHEN L6_HSM1_TEMP_RIGHT BETWEEN 440 AND 449.9 THEN '440-449.9' 
                                WHEN L6_HSM1_TEMP_RIGHT BETWEEN 450 AND 459.9 THEN '450-459.9' 
                                WHEN L6_HSM1_TEMP_RIGHT BETWEEN 460 AND 470.9 THEN '460-470.9' 
                                ELSE 'OTHER' 
                            END AS TEMP_RIGHT_RANGE, 
                            COUNT(*) AS count")
            ->groupBy('TEMP_RIGHT_RANGE')
            ->where('waktu >=', $startTime)
            ->where('waktu <', $endTime)
            //  ->orderBy('count', 'DESC')
            ->findAll();
    }

    //get data filtered
    //hsm1
    public function getDataTempLeftByDate($date)
    {
        // Tentukan waktu mulai dan waktu akhir berdasarkan parameter tanggal
        $startTime = $date . ' 07:30:00';
        $endTime = date('Y-m-d H:i:s.u', strtotime($date . ' +1 day 07:29:00'));

        // Query SQL dengan kondisi untuk mengambil data dari database
        $sql = "SELECT L6_HSM1_TYPE_BATTERY, L6_HSM1_TEMP_LEFT, L6_HSM1_TEMP_SET_VALUE, waktu
            FROM line6_data_hsm1
            WHERE waktu >= ? AND waktu < ?
            ORDER BY waktu DESC";

        // Eksekusi query dengan parameter
        $query = $this->db->query($sql, [$startTime, $endTime]);

        // Ambil hasil query
        $data = $query->getResultArray();

        // Array untuk menyimpan data yang difilter
        $filteredData = [];
        foreach ($data as $row) {
            $batteryType = $row['L6_HSM1_TYPE_BATTERY'];
            $tempLeft = $row['L6_HSM1_TEMP_LEFT']; // Pastikan Anda mengambil L6_HSM1_TEMP_LEFT yang benar

            // Tentukan batas berdasarkan tipe baterai
            if ($batteryType == 2 || $batteryType == 0) {
                $upperLimit = 435;
                $lowerLimit = 415;
            } elseif ($batteryType == 1) {
                $upperLimit = 425;
                $lowerLimit = 405;
            } else {
                // Jika tipe baterai tidak dikenali, lewati iterasi ini
                continue;
            }

            // Tambahkan batas ke dalam row
            $row['upperLimit'] = $upperLimit;
            $row['lowerLimit'] = $lowerLimit;

            // Tambahkan baris ke filteredData
            $filteredData[] = $row;
        }

        // Kembalikan data yang sudah difilter
        return $filteredData;
    }

    public function getDataTempRightByDate($date)
    {

        $startTime = $date . ' 07:30:00';
        $endTime = date('Y-m-d H:i:s.u', strtotime($date . ' +1 day 07:29:00'));

        // Ambil data dari database
        $data = $this->select('L6_HSM1_TYPE_BATTERY, L6_HSM1_TEMP_RIGHT, L6_HSM1_TEMP_SET_VALUE, waktu')
            ->where('waktu >=', $startTime)
            ->where('waktu <', $endTime)
            ->orderBy('waktu', 'DESC')
            ->findAll();

        // Array untuk menyimpan data yang difilter
        $filteredData = [];
        foreach ($data as $row) {
            $batteryType = $row['L6_HSM1_TYPE_BATTERY'];
            $tempRight = $row['L6_HSM1_TEMP_RIGHT'];

            // Tentukan batas berdasarkan tipe baterai
            if ($batteryType == 2 || $batteryType == 0) {
                $upperLimit = 435;
                $lowerLimit = 415;
            } elseif ($batteryType == 1) {
                $upperLimit = 425;
                $lowerLimit = 405;
            } else {
                // Jika tipe baterai tidak dikenali, lewati iterasi ini
                continue;
            }

            // Tambahkan batas ke dalam row
            $row['upperLimit'] = $upperLimit;
            $row['lowerLimit'] = $lowerLimit;

            // Tambahkan baris ke filteredData
            $filteredData[] = $row;
        }

        // Kembalikan data yang difilter
        return $filteredData;
    }

    //data melting by date
    public function getDataLidHolderMeltingByDate($date)
    {

        $startTime = $date . ' 07:30:00.000';
        $endTime = date('Y-m-d H:i:s.u', strtotime($date . ' +1 day 07:29:00'));

        // Ambil data dari database
        return $this->select('L6_HSM1_LID_HOLDER_MELTING_POS,L6_HSM1_LID_HOLDER_ACTUAL_POS,waktu')
            ->where('waktu >=', $startTime)
            ->where('waktu <', $endTime)
            ->orderBy('waktu', 'DESC')
            ->findAll();
    }
    public function getDataBoxLifterMeltingByDate($date)
    {

        $startTime = $date . ' 07:30:00.000';
        $endTime = date('Y-m-d H:i:s.u', strtotime($date . ' +1 day 07:29:00'));

        // Ambil data dari database
        return $this->select('L6_HSM1_BOX_LIFTER_ACTUAL_POS,L6_HSM1_BOX_LIFTER_MELTING_POS,waktu')
            ->where('waktu >=', $startTime)
            ->where('waktu <', $endTime)
            ->orderBy('waktu', 'DESC')
            ->findAll();
    }
    public function getDataMirrorPosByDate($date)
    {

        $startTime = $date . ' 07:30:00.000';
        $endTime = date('Y-m-d H:i:s.u', strtotime($date . ' +1 day 07:29:00'));

        // Ambil data dari database
        return $this->select('L6_HSM1_MIRROR_ACTUAL_POS,L6_HSM1_MIRROR_MELTING_POS,waktu')
            ->where('waktu >=', $startTime)
            ->where('waktu <', $endTime)
            ->orderBy('waktu', 'DESC')
            ->findAll();
    }



    //get type battery untuk fitur dandori time
    public function getBatteryTypeByDate($batteryType)
    {
        // Mengambil tanggal hari ini
        $today = date('Y-m-d');

        return $this->where('L6_HSM1_TYPE_BATTERY', $batteryType)
            ->where('DATE(waktu)', $today)
            ->orderBy('waktu', 'ASC')
            ->findAll();
    }

    public function getBatteryTypeByDateFirst($batteryType)
    {
        // Mengambil tanggal hari ini
        $today = date('Y-m-d');

        return $this->select('L6_HSM1_TYPE_BATTERY, waktu')
            ->where('L6_HSM1_TYPE_BATTERY', $batteryType)
            ->where('DATE(waktu)', $today)
            ->orderBy('waktu', 'ASC')
            ->first();
    }

    public function getLastBatteryTypeTime()
    {
        // $query = $this->db->query("
        //     WITH BatteryChanges AS (
        //         SELECT 
        //             L6_HSM1_TYPE_BATTERY, 
        //             waktu, 
        //             ROW_NUMBER() OVER (PARTITION BY L6_HSM1_TYPE_BATTERY ORDER BY waktu DESC) AS rn 
        //         FROM (
        //             SELECT 
        //                 L6_HSM1_TYPE_BATTERY, 
        //                 waktu, 
        //                 LAG(L6_HSM1_TYPE_BATTERY) OVER (ORDER BY waktu) AS previous_battery_type 
        //             FROM 
        //                 line6_data_hsm1
        //         ) AS changes 
        //         WHERE 
        //             L6_HSM1_TYPE_BATTERY <> previous_battery_type 
        //             OR previous_battery_type IS NULL
        //     )
        //     SELECT 
        //         waktu, 
        //         L6_HSM1_TYPE_BATTERY 
        //     FROM 
        //         BatteryChanges 
        //     WHERE 
        //         rn = 1
        // ");
        $query = $this->db->query("
           WITH BatteryChanges AS (
    SELECT 
        CASE 
            WHEN L6_HSM1_TYPE_BATTERY IN ('0', '2') THEN '0'  -- Treat '0' and '2' as the same
            ELSE L6_HSM1_TYPE_BATTERY 
        END AS normalized_battery_type,
        waktu, 
        ROW_NUMBER() OVER (PARTITION BY CASE 
                                            WHEN L6_HSM1_TYPE_BATTERY IN ('0', '2') THEN '0' 
                                            ELSE L6_HSM1_TYPE_BATTERY 
                                         END 
                           ORDER BY waktu DESC) AS rn
    FROM (
        SELECT 
            L6_HSM1_TYPE_BATTERY, 
            waktu, 
            LAG(L6_HSM1_TYPE_BATTERY) OVER (ORDER BY waktu) AS previous_battery_type 
        FROM line6_data_hsm1 
    ) AS changes 
    WHERE L6_HSM1_TYPE_BATTERY <> previous_battery_type OR previous_battery_type IS NULL
) 
SELECT 
    waktu, 
    normalized_battery_type AS L6_HSM1_TYPE_BATTERY 
FROM BatteryChanges 
WHERE rn = 1;");

        return $query->getResultArray();
    }

    public function getDataByCurrentShift()
    {
        // Get the current time
        $currentHour = date('H');
        $currentMinute = date('i');

        // Define the time ranges for the shifts
        $shift1Start = '07:30:00';
        $shift1End = '16:30:00';

        $shift2Start = '16:30:00';
        $shift2End = '23:30:00';

        $shift3Start = '23:30:00';
        $shift3End = '07:30:00'; // This will be handled differently

        // Determine the current shift
        $currentShift = '';

        if (($currentHour > 7 || ($currentHour == 7 && $currentMinute >= 30)) &&
            ($currentHour < 16 || ($currentHour == 16 && $currentMinute <= 30))
        ) {
            $currentShift = 'shift1';
        } elseif (($currentHour > 16 || ($currentHour == 16 && $currentMinute >= 30)) &&
            ($currentHour < 23 || ($currentHour == 23 && $currentMinute <= 30))
        ) {
            $currentShift = 'shift2';
        } else {
            $currentShift = 'shift3';
        }

        // Prepare the query based on the current shift
        $currentDate = date('Y-m-d'); // Get the current date

        if ($currentShift === 'shift1') {
            return $this->where('waktu >=', "$currentDate $shift1Start")
                ->where('waktu <=', "$currentDate $shift1End")
                ->countAllResults();
        } elseif ($currentShift === 'shift2') {
            return $this->where('waktu >=', "$currentDate $shift2Start")
                ->where('waktu <=', "$currentDate $shift2End")
                ->countAllResults();
        } else { // shift3
            // Shift 3 spans two days, so we need to handle it differently
            $countShift3 = $this->where('waktu >=', "$currentDate $shift3Start")
                ->countAllResults();

            // Get count for the next day (shift 3 ends at 07:30)
            $nextDate = date('Y-m-d', strtotime('+1 day'));
            $countShift3NextDay = $this->where('waktu <=', "$nextDate $shift3End")
                ->countAllResults();

            // Return the total count from both queries
            return $countShift3 + $countShift3NextDay;
        }
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

    //get data for a specific line 6
    public function getDataGreen()
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
                'end' => '23:59:59'
            ],
            [
                'start' => '00:00:00', // Start of the third shift
                'end' => '07:30:00'
            ]
        ];

        $shiftCounts = [];

        // Loop through each shift and count the results
        foreach ($shifts as $key => $shift) {
            $count = $this->where('DATE(waktu)', $today)
                ->where('L6_HSM1_TEMP_LEFT <', '435')
                ->where('L6_HSM1_TEMP_LEFT >', '415')
                ->where('L6_HSM1_TEMP_RIGHT <', '435')
                ->where('L6_HSM1_TEMP_RIGHT >', '415')
                ->where('TIME(waktu) >=', $shift['start'])
                ->where('TIME(waktu) <=', $shift['end'])
                ->countAllResults();

            $shiftCounts[$key] = $count; // Store the count for each shift
        }

        return $shiftCounts;
    }
    public function getDataYellow()
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
                'end' => '23:59:59'
            ],
            [
                'start' => '00:00:00', // Start of the third shift
                'end' => '07:30:00'
            ]
        ];

        $shiftCounts = [];

        // Loop through each shift and count the results
        foreach ($shifts as $key => $shift) {
            $count = $this->where('DATE(waktu)', $today)
                ->where('L6_HSM1_TEMP_LEFT <', '440')
                ->where('L6_HSM1_TEMP_RIGHT <', '440')
                ->where('TIME(waktu) >=', $shift['start'])
                ->where('TIME(waktu) <=', $shift['end'])
                ->countAllResults();

            $shiftCounts[$key] = $count; // Store the count for each shift
        }

        return $shiftCounts;
    }

    //get data for parameter

    public function getDataParameter()
    {
        return $this->orderBy('waktu', 'DESC')
            ->first();
    }

    public function getDataTempRightByWeek($date1, $date2)
    {

        $startTime = $date1 . ' 07:30:00';

        $endTime = date('Y-m-d H:i:s.u', strtotime($date2 . ' +1 day 07:29:00'));
        // Ambil data dari database
        $data = $this->select('L6_HSM1_TYPE_BATTERY, L6_HSM1_TEMP_RIGHT, L6_HSM1_TEMP_SET_VALUE, waktu')
        ->where('waktu >=', $startTime)
        ->where('waktu <', $endTime)
        ->orderBy('waktu', 'DESC')
        ->findAll();

        // Array untuk menyimpan data yang difilter
        $filteredData = [];
        foreach ($data as $row) {
            $batteryType = $row['L6_HSM1_TYPE_BATTERY'];
            $tempRight = $row['L6_HSM1_TEMP_RIGHT'];

            // Tentukan batas berdasarkan tipe baterai
            if ($batteryType == 2 || $batteryType == 0) {
                $upperLimit = 435;
                $lowerLimit = 415;
            } elseif ($batteryType == 1) {
                $upperLimit = 425;
                $lowerLimit = 405;
            } else {
                // Jika tipe baterai tidak dikenali, lewati iterasi ini
                continue;
            }

            // Tambahkan batas ke dalam row
            $row['upperLimit'] = $upperLimit;
            $row['lowerLimit'] = $lowerLimit;

            // Tambahkan baris ke filteredData
            $filteredData[] = $row;
        }

        // Kembalikan data yang difilter
        return $filteredData;
    }

    public function getDataTempLeftByWeek($date1, $date2)
    {

        $startTime = $date1 . ' 07:30:00';

        $endTime = date('Y-m-d H:i:s.u', strtotime($date2 . ' +1 day 07:29:00'));
        // Ambil data dari database
        $data = $this->select('L6_HSM1_TYPE_BATTERY, L6_HSM1_TEMP_LEFT, L6_HSM1_TEMP_SET_VALUE, waktu')
        ->where('waktu >=', $startTime)
            ->where('waktu <', $endTime)
            ->orderBy('waktu', 'DESC')
            ->findAll();

        // Array untuk menyimpan data yang difilter
        $filteredData = [];
        foreach ($data as $row) {
            $batteryType = $row['L6_HSM1_TYPE_BATTERY'];
            $tempRight = $row['L6_HSM1_TEMP_LEFT'];

            // Tentukan batas berdasarkan tipe baterai
            if ($batteryType == 2 || $batteryType == 0) {
                $upperLimit = 435;
                $lowerLimit = 415;
            } elseif ($batteryType == 1) {
                $upperLimit = 425;
                $lowerLimit = 405;
            } else {
                // Jika tipe baterai tidak dikenali, lewati iterasi ini
                continue;
            }

            // Tambahkan batas ke dalam row
            $row['upperLimit'] = $upperLimit;
            $row['lowerLimit'] = $lowerLimit;

            // Tambahkan baris ke filteredData
            $filteredData[] = $row;
        }

        // Kembalikan data yang difilter
        return $filteredData;
    }

    public function getDataLidHolderMeltingByWeek($date1,$date2)
    {

        $startTime = $date1 . ' 07:30:00.000';
        $endTime = date('Y-m-d H:i:s.u', strtotime($date2 . ' +1 day 07:29:00'));

        // Ambil data dari database
        return $this->select('L6_HSM1_LID_HOLDER_MELTING_POS,L6_HSM1_LID_HOLDER_ACTUAL_POS,waktu')
        ->where('waktu >=', $startTime)
            ->where('waktu <', $endTime)
            ->orderBy('waktu', 'DESC')
            ->findAll();
    }
    public function getDataBoxLifterMeltingByWeek($date1,$date2)
    {

        $startTime = $date1 . ' 07:30:00.000';
        $endTime = date('Y-m-d H:i:s.u', strtotime($date2 . ' +1 day 07:29:00'));

        // Ambil data dari database
        return $this->select('L6_HSM1_BOX_LIFTER_ACTUAL_POS,L6_HSM1_BOX_LIFTER_MELTING_POS,waktu')
        ->where('waktu >=', $startTime)
            ->where('waktu <', $endTime)
            ->orderBy('waktu', 'DESC')
            ->findAll();
    }
    public function getDataMirrorPosByWeek($date1,$date2)
    {

        $startTime = $date1 . ' 07:30:00.000';
        $endTime = date('Y-m-d H:i:s.u', strtotime($date2 . ' +1 day 07:29:00'));

        // Ambil data dari database
        return $this->select('L6_HSM1_MIRROR_ACTUAL_POS,L6_HSM1_MIRROR_MELTING_POS,waktu')
        ->where('waktu >=', $startTime)
            ->where('waktu <', $endTime)
            ->orderBy('waktu', 'DESC')
            ->findAll();
    }
}
