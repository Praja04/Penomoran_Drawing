<?php

namespace App\Models\model_line5;

use CodeIgniter\Model;

class ModelApb2 extends Model
{
    protected $table            = 'line5_data_apb2';
    // protected $primaryKey       = '';
    protected $allowedFields    = ['L5_APB2_TEMP_LEFT_SETTING', 'L5_APB2_TEMP_LEFT_ACTUAL', 'L5_APB2_TEMP_RIGHT_SETTING', 'L5_APB2_TEMP_RIGHT_ACTUAL', 'L5_APB2_FIRST_DIPPING_TIME', 'L5_APB2_WELD_HEAD_DOWN_TIME', 'L5_APB2_COOLING_TIME', 'L5_APB2_FLAME_WAITING_TIME', 'waktu'];

    public function getDataTempLeftActual_APB2()
    {
        return $this->select('L5_APB2_TEMP_LEFT_SETTING, L5_APB2_TEMP_LEFT_ACTUAL,waktu')
            ->orderBy('waktu', 'DESC')
            ->limit(50)
            ->find();
    }
    public function getDataTempRightActual_APB2()
    {
        return $this->select('L5_APB2_TEMP_RIGHT_SETTING, L5_APB2_TEMP_RIGHT_ACTUAL,waktu')
            ->orderBy('waktu', 'DESC')
            ->limit(50)
            ->find();
    }

    public function getDistinctTempLeftActual()
    {
        // Get today's date
        $today = date('Y-m-d');
        $startTime = $today . ' 07:30:00';
        $endTime = date('Y-m-d H:i:s', strtotime($today . ' +1 day 07:29:00'));

        $sql = "
        SELECT '10-20.9' AS TEMP_Actual_LEFT_RANGE, COUNT(*) AS count
        FROM line5_data_apb2
        WHERE L5_APB2_TEMP_LEFT_ACTUAL >= 10 AND L5_APB2_TEMP_LEFT_ACTUAL < 21
        AND waktu BETWEEN '$startTime' AND '$endTime'

        UNION ALL

        SELECT '21-30.9', COUNT(*)
        FROM line5_data_apb2
        WHERE L5_APB2_TEMP_LEFT_ACTUAL >= 21 AND L5_APB2_TEMP_LEFT_ACTUAL < 31
        AND waktu BETWEEN '$startTime' AND '$endTime'

        UNION ALL

        SELECT '31-40.9', COUNT(*)
        FROM line5_data_apb2
        WHERE L5_APB2_TEMP_LEFT_ACTUAL >= 31 AND L5_APB2_TEMP_LEFT_ACTUAL < 41
        AND waktu BETWEEN '$startTime' AND '$endTime'

        UNION ALL

        SELECT '41-50.9', COUNT(*)
        FROM line5_data_apb2
        WHERE L5_APB2_TEMP_LEFT_ACTUAL >= 41 AND L5_APB2_TEMP_LEFT_ACTUAL < 51
        AND waktu BETWEEN '$startTime' AND '$endTime'

        UNION ALL

        SELECT '51-60.9', COUNT(*)
        FROM line5_data_apb2
        WHERE L5_APB2_TEMP_LEFT_ACTUAL >= 51 AND L5_APB2_TEMP_LEFT_ACTUAL < 61
        AND waktu BETWEEN '$startTime' AND '$endTime'

        UNION ALL

        SELECT '61-70.9', COUNT(*)
        FROM line5_data_apb2
        WHERE L5_APB2_TEMP_LEFT_ACTUAL >= 61 AND L5_APB2_TEMP_LEFT_ACTUAL < 71
        AND waktu BETWEEN '$startTime' AND '$endTime'

        UNION ALL

        SELECT '71-80.9', COUNT(*)
        FROM line5_data_apb2
        WHERE L5_APB2_TEMP_LEFT_ACTUAL >= 71 AND L5_APB2_TEMP_LEFT_ACTUAL < 81
        AND waktu BETWEEN '$startTime' AND '$endTime'

        UNION ALL

        SELECT '81-90.9', COUNT(*)
        FROM line5_data_apb2
        WHERE L5_APB2_TEMP_LEFT_ACTUAL >= 81 AND L5_APB2_TEMP_LEFT_ACTUAL < 91
        AND waktu BETWEEN '$startTime' AND '$endTime'

        UNION ALL

        SELECT '91+', COUNT(*)
        FROM line5_data_apb2
        WHERE L5_APB2_TEMP_LEFT_ACTUAL >= 91
        AND waktu BETWEEN '$startTime' AND '$endTime'
        ";

        // Execute the query and return the results
        return $this->db->query($sql)->getResult();
    }


    public function getDistinctTempRightActual()
    {
        // Get today's date
        $today = date('Y-m-d');
        $startTime = $today . ' 07:30:00';
        $endTime = date('Y-m-d H:i:s', strtotime($today . ' +1 day 07:29:00'));

        $sql = "
        SELECT '10-20.9' AS TEMP_Actual_RIGHT_RANGE, COUNT(*) AS count
        FROM line5_data_apb2
        WHERE L5_APB2_TEMP_RIGHT_ACTUAL >= 10 AND L5_APB2_TEMP_RIGHT_ACTUAL < 21
        AND waktu BETWEEN '$startTime' AND '$endTime'

        UNION ALL

        SELECT '21-30.9', COUNT(*)
        FROM line5_data_apb2
        WHERE L5_APB2_TEMP_RIGHT_ACTUAL >= 21 AND L5_APB2_TEMP_RIGHT_ACTUAL < 31
        AND waktu BETWEEN '$startTime' AND '$endTime'

        UNION ALL

        SELECT '31-40.9', COUNT(*)
        FROM line5_data_apb2
        WHERE L5_APB2_TEMP_RIGHT_ACTUAL >= 31 AND L5_APB2_TEMP_RIGHT_ACTUAL < 41
        AND waktu BETWEEN '$startTime' AND '$endTime'

        UNION ALL

        SELECT '41-50.9', COUNT(*)
        FROM line5_data_apb2
        WHERE L5_APB2_TEMP_RIGHT_ACTUAL >= 41 AND L5_APB2_TEMP_RIGHT_ACTUAL < 51
        AND waktu BETWEEN '$startTime' AND '$endTime'

        UNION ALL

        SELECT '51-60.9', COUNT(*)
        FROM line5_data_apb2
        WHERE L5_APB2_TEMP_RIGHT_ACTUAL >= 51 AND L5_APB2_TEMP_RIGHT_ACTUAL < 61
        AND waktu BETWEEN '$startTime' AND '$endTime'

        UNION ALL

        SELECT '61-70.9', COUNT(*)
        FROM line5_data_apb2
        WHERE L5_APB2_TEMP_RIGHT_ACTUAL >= 61 AND L5_APB2_TEMP_RIGHT_ACTUAL < 71
        AND waktu BETWEEN '$startTime' AND '$endTime'

        UNION ALL

        SELECT '71-80.9', COUNT(*)
        FROM line5_data_apb2
        WHERE L5_APB2_TEMP_RIGHT_ACTUAL >= 71 AND L5_APB2_TEMP_RIGHT_ACTUAL < 81
        AND waktu BETWEEN '$startTime' AND '$endTime'

        UNION ALL

        SELECT '81-90.9', COUNT(*)
        FROM line5_data_apb2
        WHERE L5_APB2_TEMP_RIGHT_ACTUAL >= 81 AND L5_APB2_TEMP_RIGHT_ACTUAL < 91
        AND waktu BETWEEN '$startTime' AND '$endTime'

        UNION ALL

        SELECT '91+', COUNT(*)
        FROM line5_data_apb2
        WHERE L5_APB2_TEMP_RIGHT_ACTUAL >= 91
        AND waktu BETWEEN '$startTime' AND '$endTime'
        ";

        // Execute the query and return the results
        return $this->db->query($sql)->getResult();
    }


    //get distinct by date
    public function getDistinctTempLeftActualbyDate($date)
    {
        // Format waktu start dan end
        $startTime = $date . ' 07:30:00';
        $endTime = date('Y-m-d H:i:s', strtotime($date . ' +1 day 07:29:00'));

        $sql = "
        SELECT '10-20.9' AS TEMP_Actual_LEFT_RANGE, COUNT(*) AS count
        FROM line5_data_apb2
        WHERE L5_APB2_TEMP_LEFT_ACTUAL >= 10 AND L5_APB2_TEMP_LEFT_ACTUAL < 21
        AND waktu BETWEEN '$startTime' AND '$endTime'

        UNION ALL

        SELECT '21-30.9', COUNT(*)
        FROM line5_data_apb2
        WHERE L5_APB2_TEMP_LEFT_ACTUAL >= 21 AND L5_APB2_TEMP_LEFT_ACTUAL < 31
        AND waktu BETWEEN '$startTime' AND '$endTime'

        UNION ALL

        SELECT '31-40.9', COUNT(*)
        FROM line5_data_apb2
        WHERE L5_APB2_TEMP_LEFT_ACTUAL >= 31 AND L5_APB2_TEMP_LEFT_ACTUAL < 41
        AND waktu BETWEEN '$startTime' AND '$endTime'

        UNION ALL

        SELECT '41-50.9', COUNT(*)
        FROM line5_data_apb2
        WHERE L5_APB2_TEMP_LEFT_ACTUAL >= 41 AND L5_APB2_TEMP_LEFT_ACTUAL < 51
        AND waktu BETWEEN '$startTime' AND '$endTime'

        UNION ALL

        SELECT '51-60.9', COUNT(*)
        FROM line5_data_apb2
        WHERE L5_APB2_TEMP_LEFT_ACTUAL >= 51 AND L5_APB2_TEMP_LEFT_ACTUAL < 61
        AND waktu BETWEEN '$startTime' AND '$endTime'

        UNION ALL

        SELECT '61-70.9', COUNT(*)
        FROM line5_data_apb2
        WHERE L5_APB2_TEMP_LEFT_ACTUAL >= 61 AND L5_APB2_TEMP_LEFT_ACTUAL < 71
        AND waktu BETWEEN '$startTime' AND '$endTime'

        UNION ALL

        SELECT '71-80.9', COUNT(*)
        FROM line5_data_apb2
        WHERE L5_APB2_TEMP_LEFT_ACTUAL >= 71 AND L5_APB2_TEMP_LEFT_ACTUAL < 81
        AND waktu BETWEEN '$startTime' AND '$endTime'

        UNION ALL

        SELECT '81-90.9', COUNT(*)
        FROM line5_data_apb2
        WHERE L5_APB2_TEMP_LEFT_ACTUAL >= 81 AND L5_APB2_TEMP_LEFT_ACTUAL < 91
        AND waktu BETWEEN '$startTime' AND '$endTime'

        UNION ALL

        SELECT '91+', COUNT(*)
        FROM line5_data_apb2
        WHERE L5_APB2_TEMP_LEFT_ACTUAL >= 91
        AND waktu BETWEEN '$startTime' AND '$endTime'
        ";

        // Execute the query and return the results
        return $this->db->query($sql)->getResult();
    }

    public function getDistinctTempRightActualbyDate($date)
    {
        // Format waktu start dan end
        $startTime = $date . ' 07:30:00';
        $endTime = date('Y-m-d H:i:s', strtotime($date . ' +1 day 07:29:00'));

        $sql = "
        SELECT '10-20.9' AS TEMP_Actual_RIGHT_RANGE, COUNT(*) AS count
        FROM line5_data_apb2
        WHERE L5_APB2_TEMP_RIGHT_ACTUAL >= 10 AND L5_APB2_TEMP_RIGHT_ACTUAL < 21
        AND waktu BETWEEN '$startTime' AND '$endTime'

        UNION ALL

        SELECT '21-30.9', COUNT(*)
        FROM line5_data_apb2
        WHERE L5_APB2_TEMP_RIGHT_ACTUAL >= 21 AND L5_APB2_TEMP_RIGHT_ACTUAL < 31
        AND waktu BETWEEN '$startTime' AND '$endTime'

        UNION ALL

        SELECT '31-40.9', COUNT(*)
        FROM line5_data_apb2
        WHERE L5_APB2_TEMP_RIGHT_ACTUAL >= 31 AND L5_APB2_TEMP_RIGHT_ACTUAL < 41
        AND waktu BETWEEN '$startTime' AND '$endTime'

        UNION ALL

        SELECT '41-50.9', COUNT(*)
        FROM line5_data_apb2
        WHERE L5_APB2_TEMP_RIGHT_ACTUAL >= 41 AND L5_APB2_TEMP_RIGHT_ACTUAL < 51
        AND waktu BETWEEN '$startTime' AND '$endTime'

        UNION ALL

        SELECT '51-60.9', COUNT(*)
        FROM line5_data_apb2
        WHERE L5_APB2_TEMP_RIGHT_ACTUAL >= 51 AND L5_APB2_TEMP_RIGHT_ACTUAL < 61
        AND waktu BETWEEN '$startTime' AND '$endTime'

        UNION ALL

        SELECT '61-70.9', COUNT(*)
        FROM line5_data_apb2
        WHERE L5_APB2_TEMP_RIGHT_ACTUAL >= 61 AND L5_APB2_TEMP_RIGHT_ACTUAL < 71
        AND waktu BETWEEN '$startTime' AND '$endTime'

        UNION ALL

        SELECT '71-80.9', COUNT(*)
        FROM line5_data_apb2
        WHERE L5_APB2_TEMP_RIGHT_ACTUAL >= 71 AND L5_APB2_TEMP_RIGHT_ACTUAL < 81
        AND waktu BETWEEN '$startTime' AND '$endTime'

        UNION ALL

        SELECT '81-90.9', COUNT(*)
        FROM line5_data_apb2
        WHERE L5_APB2_TEMP_RIGHT_ACTUAL >= 81 AND L5_APB2_TEMP_RIGHT_ACTUAL < 91
        AND waktu BETWEEN '$startTime' AND '$endTime'

        UNION ALL

        SELECT '91+', COUNT(*)
        FROM line5_data_apb2
        WHERE L5_APB2_TEMP_RIGHT_ACTUAL >= 91
        AND waktu BETWEEN '$startTime' AND '$endTime'
        ";

        // Execute the query and return the results
        return $this->db->query($sql)->getResult();
    }


    //get data filtered
    //apb1
    public function getDataTempLeftByDate($date)
    {
        // Menentukan waktu mulai dan selesai dengan format yang sesuai
        $startTime = $date . ' 07:30:00';
        $endTime = date('Y-m-d', strtotime($date . ' +1 day')) . ' 07:29:59';

        return $this->select('L5_APB2_TEMP_LEFT_SETTING, L5_APB2_TEMP_LEFT_ACTUAL, waktu')
            ->orderBy('waktu', 'DESC')
            ->where('waktu >=', $startTime)
            ->where('waktu <=', $endTime)
            ->findAll();
    }


    public function getDataTempRightByDate($date)
    {
        // Menentukan waktu mulai dan selesai dengan format yang sesuai
        $startTime = $date . ' 07:30:00';
        $endTime = date('Y-m-d', strtotime($date . ' +1 day')) . ' 07:29:59';

        return $this->select('L5_APB2_TEMP_RIGHT_SETTING, L5_APB2_TEMP_RIGHT_ACTUAL, waktu')
            ->orderBy('waktu', 'DESC')
            ->where('waktu >=', $startTime)
            ->where('waktu <=', $endTime)
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
                'start' => '00:00:00',
                'end' => '07:30:00'
            ]
        ];

        $totalCount = [];

        foreach ($shifts as $key => $shift) {
            $count = $this->where("CAST(waktu AS DATE) = '$today'") // Extract date part from datetime
                ->where("CONVERT(TIME, waktu) >= CONVERT(TIME, '{$shift['start']}')")
                ->where("CONVERT(TIME, waktu) <= CONVERT(TIME, '{$shift['end']}')")
                ->countAllResults();

            $totalCount[$key] = $count;
        }

        return $totalCount;
    }



    //by week
    public function getDataTempLeftByWeek($date1, $date2)
    {
        // Format waktu awal dan akhir
        $startTime = $date1 . ' 07:30:00';
        $endTime = date('Y-m-d', strtotime($date2 . ' +1 day')) . ' 07:29:59';

        return $this->select('L5_APB2_TEMP_LEFT_SETTING, L5_APB2_TEMP_LEFT_ACTUAL, waktu')
            ->orderBy('waktu', 'DESC')
            ->where("CAST(waktu AS DATETIME) >= '$startTime'")  // Untuk SQL Server, pastikan format waktu sesuai
            ->where("CAST(waktu AS DATETIME) <= '$endTime'")    // Pastikan perbandingan waktu sesuai dengan format DATETIME
            ->findAll();
    }


    public function getDataTempRightByWeek($date1, $date2)
    {
        // Format waktu awal dan akhir
        $startTime = $date1 . ' 07:30:00';
        $endTime = date('Y-m-d', strtotime($date2 . ' +1 day')) . ' 07:29:59';

        return $this->select('L5_APB2_TEMP_RIGHT_SETTING, L5_APB2_TEMP_RIGHT_ACTUAL, waktu')
            ->orderBy('waktu', 'DESC')
            ->where("CAST(waktu AS DATETIME) >= '$startTime'")  // Untuk SQL Server, pastikan format waktu sesuai
            ->where("CAST(waktu AS DATETIME) <= '$endTime'")    // Pastikan perbandingan waktu sesuai dengan format DATETIME
            ->findAll();
    }
}
