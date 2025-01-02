<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\model_line5\ModelAlt1;
use App\Models\model_line5\ModelAlt2;
use App\Models\model_line5\ModelApb1;
use App\Models\model_line5\ModelApb2;
use App\Models\model_line5\ModelHsm1;
use App\Models\model_line5\ModelHsm2;


class APILine5Controller extends BaseController
{
    public function insert_alt1()
    {
        // Retrieve the raw JSON data from the request body
        $json_data = $this->request->getBody();

        // Decode the JSON data
        $data = json_decode($json_data, true); // Decode as associative array

        // Check if decoding was successful
        if (json_last_error() !== JSON_ERROR_NONE) {
            return $this->response->setStatusCode(ResponseInterface::HTTP_BAD_REQUEST, 'Invalid JSON data');
        }

        // Create the insert model instance
        $model = new ModelAlt1(); // Make sure you have a model class for database interaction

        // Map the incoming data to the database fields
        $db_data = [
            'L5_ALT1_ACTUAL_PRESSURE_CELL1' => $data['L5_ALT1_ACTUAL_PRESSURE_CELL1'],
            'L5_ALT1_RESULT_CELL1' => $data['L5_ALT1_RESULT_CELL1'],
            'L5_ALT1_ACTUAL_PRESSURE_CELL3' => $data['L5_ALT1_ACTUAL_PRESSURE_CELL3'],
            'L5_ALT1_RESULT_CELL3' => $data['L5_ALT1_RESULT_CELL3'],
            'L5_ALT1_ACTUAL_PRESSURE_CELL5' => $data['L5_ALT1_ACTUAL_PRESSURE_CELL5'],
            'L5_ALT1_RESULT_CELL5' => $data['L5_ALT1_RESULT_CELL5'],
            'L5_ALT1_FILL_FAILURE_TIME' => $data['L5_ALT1_FILL_FAILURE_TIME'],
            'L5_ALT1_FILL_PRESSURE' => $data['L5_ALT1_FILL_PRESSURE'],
            'L5_ALT1_TEST_PRESSURE' => $data['L5_ALT1_TEST_PRESSURE'],
            'L5_ALT1_LEAK_PRESSURE_TOLERANCE' => $data['L5_ALT1_LEAK_PRESSURE_TOLERANCE'],
            'L5_ALT1_TEST_PRESSURE_TOLERANCE' => $data['L5_ALT1_TEST_PRESSURE_TOLERANCE'],
            'L5_ALT1_FILL_PRESSURE_TOLERANCE' => $data['L5_ALT1_FILL_PRESSURE_TOLERANCE'],
            'L5_ALT1_STABILIZATION_TIME' => $data['L5_ALT1_STABILIZATION_TIME'],
            'L5_ALT1_TEST_TIME' => $data['L5_ALT1_TEST_TIME'],
            //'waktu' => $data['waktu'],
            'status' => 'OK',
        ];

        // Use try-catch block for handling errors during database insertion
        try {
            // Attempt to insert the data into the database
            $insertSuccess = $model->insert($db_data); // Store result of insert operation

            // Check what the insert operation returns
            if ($insertSuccess === false) {
                // Log or debug the result if insert operation fails
                // For example, use error_log to debug what is returned
                error_log("Insert failed, result: " . print_r($insertSuccess, true));

                // If the insert returns false, handle it as a failure
                return $this->response->setStatusCode(ResponseInterface::HTTP_BAD_REQUEST, 'Failed to Insert Data');  // HTTP_BAD_REQUEST (400)
            } else {
                // If insert is successful, return success message
                // Membuat array untuk respons
                $responseData = [
                    'status' => ResponseInterface::HTTP_OK,
                    'message' => 'Data Inserted Successfully'

                ];

                // Mengatur status kode dan mengembalikan respons dalam format JSON
                return $this->response
                    ->setStatusCode(ResponseInterface::HTTP_OK)
                    ->setContentType('application/json') // Mengatur tipe konten ke JSON
                    ->setBody(json_encode($responseData));
            }
        } catch (\Exception $e) {
            // Catch any exceptions and return a 500 Internal Server Error with the exception message
            return $this->response->setStatusCode(ResponseInterface::HTTP_INTERNAL_SERVER_ERROR, 'Error: ' . $e->getMessage())->setContentType('application/json'); // HTTP_INTERNAL_SERVER_ERROR (500)
        }
    }
    public function insert_alt2()
    {
        // Retrieve the raw JSON data from the request body
        $json_data = $this->request->getBody();

        // Decode the JSON data
        $data = json_decode($json_data, true); // Decode as associative array

        // Check if decoding was successful
        if (json_last_error() !== JSON_ERROR_NONE) {
            return $this->response->setStatusCode(ResponseInterface::HTTP_BAD_REQUEST, 'Invalid JSON data');
        }

        // Create the insert model instance
        $model = new ModelAlt2(); // Make sure you have a model class for database interaction

        // Map the incoming data to the database fields
        $db_data = [
            'L5_ALT2_ACTUAL_PRESSURE_CELL2' => $data['L5_ALT2_ACTUAL_PRESSURE_CELL2'],
            'L5_ALT2_RESULT_CELL2' => $data['L5_ALT2_RESULT_CELL2'],
            'L5_ALT2_ACTUAL_PRESSURE_CELL4' => $data['L5_ALT2_ACTUAL_PRESSURE_CELL4'],
            'L5_ALT2_RESULT_CELL4' => $data['L5_ALT2_RESULT_CELL4'],
            'L5_ALT2_ACTUAL_PRESSURE_CELL6' => $data['L5_ALT2_ACTUAL_PRESSURE_CELL6'],
            'L5_ALT2_RESULT_CELL6' => $data['L5_ALT2_RESULT_CELL6'],
            'L5_ALT2_FILL_FAILURE_TIME' => $data['L5_ALT2_FILL_FAILURE_TIME'],
            'L5_ALT2_FILL_PRESSURE' => $data['L5_ALT2_FILL_PRESSURE'],
            'L5_ALT2_TEST_PRESSURE' => $data['L5_ALT2_TEST_PRESSURE'],
            'L5_ALT2_LEAK_PRESSURE_TOLERANCE' => $data['L5_ALT2_LEAK_PRESSURE_TOLERANCE'],
            'L5_ALT2_TEST_PRESSURE_TOLERANCE' => $data['L5_ALT2_TEST_PRESSURE_TOLERANCE'],
            'L5_ALT2_FILL_PRESSURE_TOLERANCE' => $data['L5_ALT2_FILL_PRESSURE_TOLERANCE'],
            'L5_ALT2_STABILIZATION_TIME' => $data['L5_ALT2_STABILIZATION_TIME'],
            'L5_ALT2_TEST_TIME' => $data['L5_ALT2_TEST_TIME'],
            //'waktu' => $data['waktu'],
            'status' => 'OK',
        ];

        // Use try-catch block for handling errors during database insertion
        try {
            // Attempt to insert the data into the database
            $insertSuccess = $model->insert($db_data); // Store result of insert operation

            // Check what the insert operation returns
            if ($insertSuccess === false) {
                // Log or debug the result if insert operation fails
                // For example, use error_log to debug what is returned
                error_log("Insert failed, result: " . print_r($insertSuccess, true));

                // If the insert returns false, handle it as a failure
                return $this->response->setStatusCode(ResponseInterface::HTTP_BAD_REQUEST, 'Failed to Insert Data');  // HTTP_BAD_REQUEST (400)
            } else {
                // If insert is successful, return success message
                // Membuat array untuk respons
                $responseData = [
                    'status' => ResponseInterface::HTTP_OK,
                    'message' => 'Data Inserted Successfully'

                ];

                // Mengatur status kode dan mengembalikan respons dalam format JSON
                return $this->response
                    ->setStatusCode(ResponseInterface::HTTP_OK)
                    ->setContentType('application/json') // Mengatur tipe konten ke JSON
                    ->setBody(json_encode($responseData));
            }
        } catch (\Exception $e) {
            // Catch any exceptions and return a 500 Internal Server Error with the exception message
            return $this->response->setStatusCode(ResponseInterface::HTTP_INTERNAL_SERVER_ERROR, 'Error: ' . $e->getMessage())->setContentType('application/json'); // HTTP_INTERNAL_SERVER_ERROR (500)
        }
    }

    public function insert_hsm1()
    {
        $json_data = $this->request->getBody();

        // Decode the JSON data
        $data = json_decode($json_data, true); // Decode as associative array

        // Check if decoding was successful
        if (json_last_error() !== JSON_ERROR_NONE) {
            return $this->response->setStatusCode(ResponseInterface::HTTP_BAD_REQUEST, 'Invalid JSON data');
        }

        // Create the insert model instance
        $model = new ModelHsm1(); // Make sure you have a model class for database interaction

        // Map the incoming data to the database fields
        $db_data = [
            'L5_HSM1_TEMP_LEFT' => $data['L5_HSM1_TEMP_LEFT'],
            'L5_HSM1_TEMP_RIGHT' => $data['L5_HSM1_TEMP_RIGHT'],
            'L5_HSM1_TEMP_SET_VALUE' => $data['L5_HSM1_TEMP_SET_VALUE'],
            'L5_HSM1_LID_HOLDER_ACTUAL_POS' => $data['L5_HSM1_LID_HOLDER_ACTUAL_POS'],
            'L5_HSM1_LID_HOLDER_WAITING_POS' => $data['L5_HSM1_LID_HOLDER_WAITING_POS'],
            'L5_HSM1_LID_HOLDER_HOLDING_POS' => $data['L5_HSM1_LID_HOLDER_HOLDING_POS'],
            'L5_HSM1_LID_HOLDER_MELTING_POS' => $data['L5_HSM1_LID_HOLDER_MELTING_POS'],
            'L5_HSM1_LID_HOLDER_SEALING_POS' => $data['L5_HSM1_LID_HOLDER_SEALING_POS'],
            'L5_HSM1_BOX_LIFTER_ACTUAL_POS' => $data['L5_HSM1_BOX_LIFTER_ACTUAL_POS'],
            'L5_HSM1_BOX_LIFTER_WAITING_POS' => $data['L5_HSM1_BOX_LIFTER_WAITING_POS'],
            'L5_HSM1_BOX_LIFTER_MELTING_POS' => $data['L5_HSM1_BOX_LIFTER_MELTING_POS'],
            'L5_HSM1_BOX_LIFTER_SEALING_POS' => $data['L5_HSM1_BOX_LIFTER_SEALING_POS'],
            'L5_HSM1_BOX_LIFTER_FEEDING_POS' => $data['L5_HSM1_BOX_LIFTER_FEEDING_POS'],
            'L5_HSM1_MIRROR_ACTUAL_POS' => $data['L5_HSM1_MIRROR_ACTUAL_POS'],
            'L5_HSM1_MIRROR_WAITING_POS' => $data['L5_HSM1_MIRROR_WAITING_POS'],
            'L5_HSM1_MIRROR_MELTING_POS' => $data['L5_HSM1_MIRROR_MELTING_POS'],
            'UPPER_LIMIT_TEMP' => $data['UPPER_LIMIT_TEMP'],
            'LOWER_LIMIT_TEMP' => $data['LOWER_LIMIT_TEMP'],
            'TYPE' => $data['TYPE'],
            'L5_HSM1_LID_MELTING_TIME' => $data['L5_HSM1_LID_MELTING_TIME'],
            'L5_HSM1_BOX_MELTING_TIME' => $data['L5_HSM1_BOX_MELTING_TIME'],
            'L5_HSM1_SEALING_TIME' => $data['L5_HSM1_SEALING_TIME'],
            //'waktu' => date('Y-m-d H:i:s') // Atau ambil dari data jika ada
        ];

        // Use try-catch block for handling errors during database insertion
        try {
            // Attempt to insert the data into the database
            $insertSuccess = $model->insert($db_data); // Store result of insert operation

            // Check what the insert operation returns
            if ($insertSuccess === false) {
                // Log or debug the result if insert operation fails
                // For example, use error_log to debug what is returned
                error_log("Insert failed, result: " . print_r($insertSuccess, true));
                $responseData = [
                    'status' => ResponseInterface::HTTP_BAD_REQUEST,
                    'message' => 'Data Inserted Failed'

                ];
                // If the insert returns false, handle it as a failure
                // return $this->response->setStatusCode(ResponseInterface::HTTP_BAD_REQUEST, 'Failed to Insert Data');  // HTTP_BAD_REQUEST (400)
                return $this->response
                    ->setStatusCode(ResponseInterface::HTTP_BAD_REQUEST)
                    ->setContentType('application/json') // Mengatur tipe konten ke JSON
                    ->setBody(json_encode($responseData));
            } else {
                // If insert is successful, return success message
                // Membuat array untuk respons
                $responseData = [
                    'status' => ResponseInterface::HTTP_OK,
                    'message' => 'Data Inserted Successfully'

                ];

                // Mengatur status kode dan mengembalikan respons dalam format JSON
                return $this->response
                    ->setStatusCode(ResponseInterface::HTTP_OK)
                    ->setContentType('application/json') // Mengatur tipe konten ke JSON
                    ->setBody(json_encode($responseData));
            }
        } catch (\Exception $e) {
            // Catch any exceptions and return a 500 Internal Server Error with the exception message
            return $this->response->setStatusCode(ResponseInterface::HTTP_INTERNAL_SERVER_ERROR, 'Error: ' . $e->getMessage())->setContentType('application/json'); // HTTP_INTERNAL_SERVER_ERROR (500)
        }
    }

    public function insert_hsm2()
    {
        $json_data = $this->request->getBody();

        // Decode the JSON data
        $data = json_decode($json_data, true); // Decode as associative array

        // Check if decoding was successful
        if (json_last_error() !== JSON_ERROR_NONE) {
            return $this->response->setStatusCode(ResponseInterface::HTTP_BAD_REQUEST, 'Invalid JSON data');
        }

        // Create the insert model instance
        $model = new ModelHsm2(); // Make sure you have a model class for database interaction

        // Map the incoming data to the database fields
        $db_data = [
            'L5_HSM2_TEMP_LEFT' => $data['L5_HSM2_TEMP_LEFT'],
            'L5_HSM2_TEMP_RIGHT' => $data['L5_HSM2_TEMP_RIGHT'],
            'L5_HSM2_TEMP_SET_VALUE' => $data['L5_HSM2_TEMP_SET_VALUE'],
            'L5_HSM2_LID_HOLDER_ACTUAL_POS' => $data['L5_HSM2_LID_HOLDER_ACTUAL_POS'],
            'L5_HSM2_LID_HOLDER_WAITING_POS' => $data['L5_HSM2_LID_HOLDER_WAITING_POS'],
            'L5_HSM2_LID_HOLDER_HOLDING_POS' => $data['L5_HSM2_LID_HOLDER_HOLDING_POS'],
            'L5_HSM2_LID_HOLDER_MELTING_POS' => $data['L5_HSM2_LID_HOLDER_MELTING_POS'],
            'L5_HSM2_LID_HOLDER_SEALING_POS' => $data['L5_HSM2_LID_HOLDER_SEALING_POS'],
            'L5_HSM2_BOX_LIFTER_ACTUAL_POS' => $data['L5_HSM2_BOX_LIFTER_ACTUAL_POS'],
            'L5_HSM2_BOX_LIFTER_WAITING_POS' => $data['L5_HSM2_BOX_LIFTER_WAITING_POS'],
            'L5_HSM2_BOX_LIFTER_MELTING_POS' => $data['L5_HSM2_BOX_LIFTER_MELTING_POS'],
            'L5_HSM2_BOX_LIFTER_SEALING_POS' => $data['L5_HSM2_BOX_LIFTER_SEALING_POS'],
            'L5_HSM2_BOX_LIFTER_FEEDING_POS' => $data['L5_HSM2_BOX_LIFTER_FEEDING_POS'],
            'L5_HSM2_MIRROR_ACTUAL_POS' => $data['L5_HSM2_MIRROR_ACTUAL_POS'],
            'L5_HSM2_MIRROR_WAITING_POS' => $data['L5_HSM2_MIRROR_WAITING_POS'],
            'L5_HSM2_MIRROR_MELTING_POS' => $data['L5_HSM2_MIRROR_MELTING_POS'],
            'UPPER_LIMIT_TEMP' => $data['UPPER_LIMIT_TEMP'],
            'LOWER_LIMIT_TEMP' => $data['LOWER_LIMIT_TEMP'],
            'TYPE' => $data['TYPE'],
            'L5_HSM2_LID_MELTING_TIME' => $data['L5_HSM2_LID_MELTING_TIME'],
            'L5_HSM2_BOX_MELTING_TIME' => $data['L5_HSM2_BOX_MELTING_TIME'],
            'L5_HSM2_SEALING_TIME' => $data['L5_HSM2_SEALING_TIME'],
            //'waktu' => date('Y-m-d H:i:s') // Atau ambil dari data jika ada
        ];

        // Use try-catch block for handling errors during database insertion
        try {
            // Attempt to insert the data into the database
            $insertSuccess = $model->insert($db_data); // Store result of insert operation

            // Check what the insert operation returns
            if ($insertSuccess === false) {
                // Log or debug the result if insert operation fails
                // For example, use error_log to debug what is returned
                error_log("Insert failed, result: " . print_r($insertSuccess, true));
                $responseData = [
                    'status' => ResponseInterface::HTTP_BAD_REQUEST,
                    'message' => 'Data Inserted Failed'

                ];
                // If the insert returns false, handle it as a failure
                // return $this->response->setStatusCode(ResponseInterface::HTTP_BAD_REQUEST, 'Failed to Insert Data');  // HTTP_BAD_REQUEST (400)
                return $this->response
                    ->setStatusCode(ResponseInterface::HTTP_BAD_REQUEST)
                    ->setContentType('application/json') // Mengatur tipe konten ke JSON
                    ->setBody(json_encode($responseData));
            } else {
                // If insert is successful, return success message
                // Membuat array untuk respons
                $responseData = [
                    'status' => ResponseInterface::HTTP_OK,
                    'message' => 'Data Inserted Successfully'

                ];

                // Mengatur status kode dan mengembalikan respons dalam format JSON
                return $this->response
                    ->setStatusCode(ResponseInterface::HTTP_OK)
                    ->setContentType('application/json') // Mengatur tipe konten ke JSON
                    ->setBody(json_encode($responseData));
            }
        } catch (\Exception $e) {
            // Catch any exceptions and return a 500 Internal Server Error with the exception message
            return $this->response->setStatusCode(ResponseInterface::HTTP_INTERNAL_SERVER_ERROR, 'Error: ' . $e->getMessage())->setContentType('application/json'); // HTTP_INTERNAL_SERVER_ERROR (500)
        }
    }
    public function insert_apb1()
    {
        $json_data = $this->request->getBody();

        // Decode the JSON data
        $data = json_decode($json_data, true); // Decode as associative array

        // Check if decoding was successful
        if (json_last_error() !== JSON_ERROR_NONE) {
            return $this->response->setStatusCode(ResponseInterface::HTTP_BAD_REQUEST, 'Invalid JSON data');
        }

        // Create the insert model instance
        $model = new ModelApb1(); // Make sure you have a model class for database interaction

        // Map the incoming data to the database fields
        // Map the incoming data to the database fields
        $db_data = [
            'L5_APB1_TEMP_LEFT_SETTING' => $data['L5_APB1_TEMP_LEFT_SETTING'] ?? null,
            'L5_APB1_TEMP_LEFT_ACTUAL' => $data['L5_APB1_TEMP_LEFT_ACTUAL'] ?? null,
            'L5_APB1_TEMP_RIGHT_SETTING' => $data['L5_APB1_TEMP_RIGHT_SETTING'] ?? null,
            'L5_APB1_TEMP_RIGHT_ACTUAL' => $data['L5_APB1_TEMP_RIGHT_ACTUAL'] ?? null,
            'L5_APB1_FIRST_DIPPING_TIME' => $data['L5_APB1_FIRST_DIPPING_TIME'] ?? null,
            'L5_APB1_WELD_HEAD_DOWN_TIME' => $data['L5_APB1_WELD_HEAD_DOWN_TIME'] ?? null,
            'L5_APB1_COOLING_TIME' => $data['L5_APB1_COOLING_TIME'] ?? null,
            'L5_APB1_FLAME_WAITING_TIME' => $data['L5_APB1_FLAME_WAITING_TIME'] ?? null,
            'waktu' => date('Y-m-d H:i:s') // Atau ambil dari data jika ada
        ];

        // Use try-catch block for handling errors during database insertion
        try {
            // Attempt to insert the data into the database
            $insertSuccess = $model->insert($db_data); // Store result of insert operation

            // Check what the insert operation returns
            if ($insertSuccess === false) {
                // Log or debug the result if insert operation fails
                // For example, use error_log to debug what is returned
                error_log("Insert failed, result: " . print_r($insertSuccess, true));
                $responseData = [
                    'status' => ResponseInterface::HTTP_BAD_REQUEST,
                    'message' => 'Data Inserted Failed'

                ];
                // If the insert returns false, handle it as a failure
                // return $this->response->setStatusCode(ResponseInterface::HTTP_BAD_REQUEST, 'Failed to Insert Data');  // HTTP_BAD_REQUEST (400)
                return $this->response
                    ->setStatusCode(ResponseInterface::HTTP_BAD_REQUEST)
                    ->setContentType('application/json') // Mengatur tipe konten ke JSON
                    ->setBody(json_encode($responseData));
            } else {
                // If insert is successful, return success message
                // Membuat array untuk respons
                $responseData = [
                    'status' => ResponseInterface::HTTP_OK,
                    'message' => 'Data Inserted Successfully'

                ];

                // Mengatur status kode dan mengembalikan respons dalam format JSON
                return $this->response
                    ->setStatusCode(ResponseInterface::HTTP_OK)
                    ->setContentType('application/json') // Mengatur tipe konten ke JSON
                    ->setBody(json_encode($responseData));
            }
        } catch (\Exception $e) {
            // Catch any exceptions and return a 500 Internal Server Error with the exception message
            return $this->response->setStatusCode(ResponseInterface::HTTP_INTERNAL_SERVER_ERROR, 'Error: ' . $e->getMessage())->setContentType('application/json'); // HTTP_INTERNAL_SERVER_ERROR (500)
        }
    }
    public function insert_apb2()
    {
        $json_data = $this->request->getBody();

        // Decode the JSON data
        $data = json_decode($json_data, true); // Decode as associative array

        // Check if decoding was successful
        if (json_last_error() !== JSON_ERROR_NONE) {
            return $this->response->setStatusCode(ResponseInterface::HTTP_BAD_REQUEST, 'Invalid JSON data');
        }

        // Create the insert model instance
        $model = new ModelApb2(); // Make sure you have a model class for database interaction

        // Map the incoming data to the database fields
        $db_data = [
            'L5_APB2_TEMP_LEFT_SETTING' => $data['L5_APB2_TEMP_LEFT_SETTING'] ?? null,
            'L5_APB2_TEMP_LEFT_ACTUAL' => $data['L5_APB2_TEMP_LEFT_ACTUAL'] ?? null,
            'L5_APB2_TEMP_RIGHT_SETTING' => $data['L5_APB2_TEMP_RIGHT_SETTING'] ?? null,
            'L5_APB2_TEMP_RIGHT_ACTUAL' => $data['L5_APB2_TEMP_RIGHT_ACTUAL'] ?? null,
            'L5_APB2_FIRST_DIPPING_TIME' => $data['L5_APB2_FIRST_DIPPING_TIME'] ?? null,
            'L5_APB2_WELD_HEAD_DOWN_TIME' => $data['L5_APB2_WELD_HEAD_DOWN_TIME'] ?? null,
            'L5_APB2_COOLING_TIME' => $data['L5_APB2_COOLING_TIME'] ?? null,
            'L5_APB2_FLAME_WAITING_TIME' => $data['L5_APB2_FLAME_WAITING_TIME'] ?? null,
            'waktu' => date('Y-m-d H:i:s') // Atau ambil dari data jika ada
        ];

        // Use try-catch block for handling errors during database insertion
        try {
            // Attempt to insert the data into the database
            $insertSuccess = $model->insert($db_data); // Store result of insert operation

            // Check what the insert operation returns
            if ($insertSuccess === false) {
                // Log or debug the result if insert operation fails
                // For example, use error_log to debug what is returned
                error_log("Insert failed, result: " . print_r($insertSuccess, true));
                $responseData = [
                    'status' => ResponseInterface::HTTP_BAD_REQUEST,
                    'message' => 'Data Inserted Failed'

                ];
                // If the insert returns false, handle it as a failure
                // return $this->response->setStatusCode(ResponseInterface::HTTP_BAD_REQUEST, 'Failed to Insert Data');  // HTTP_BAD_REQUEST (400)
                return $this->response
                    ->setStatusCode(ResponseInterface::HTTP_BAD_REQUEST)
                    ->setContentType('application/json') // Mengatur tipe konten ke JSON
                    ->setBody(json_encode($responseData));
            } else {
                // If insert is successful, return success message
                // Membuat array untuk respons
                $responseData = [
                    'status' => ResponseInterface::HTTP_OK,
                    'message' => 'Data Inserted Successfully'

                ];

                // Mengatur status kode dan mengembalikan respons dalam format JSON
                return $this->response
                    ->setStatusCode(ResponseInterface::HTTP_OK)
                    ->setContentType('application/json') // Mengatur tipe konten ke JSON
                    ->setBody(json_encode($responseData));
            }
        } catch (\Exception $e) {
            // Catch any exceptions and return a 500 Internal Server Error with the exception message
            return $this->response->setStatusCode(ResponseInterface::HTTP_INTERNAL_SERVER_ERROR, 'Error: ' . $e->getMessage())->setContentType('application/json'); // HTTP_INTERNAL_SERVER_ERROR (500)
        }
    }
}
