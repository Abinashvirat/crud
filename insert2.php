<?php

include('connect.php');
require_once 'PHPExcel-v7.4-master/PHPExcel.php'; // Include PhpSpreadsheet library

// Check if file is uploaded and there are no errors
if(isset($_FILES['exampleInputFile1']) && $_FILES['exampleInputFile1']['error'] == UPLOAD_ERR_OK) {
    $inputFileName = $_FILES['exampleInputFile1']['tmp_name'];

    // Load the Excel file
    $objPHPExcel = PHPExcel_IOFactory::load($inputFileName);

    // Get the active sheet
    $sheet = $objPHPExcel->getActiveSheet();

    // Get the highest row and column
    $highestRow = $sheet->getHighestRow();
    $highestColumn = $sheet->getHighestColumn();

   // Define allowed values for gender, hobby, country, and state
$allowedGenders = ['male', 'female', 'other'];
$allowedHobbies = ['reading', 'sports'];
$allowedCountries = ['India', 'Australia', 'England'];
$allowedStates = ['Odisha', 'Maharastra', 'UP', 'New South Wales', 'Queensland', 'Victoria', 'London', 'Manchester', 'Birmingham'];

// Iterate through each row of Excel data
for ($row = 2; $row <= $highestRow; $row++) {
    $rowData = array();
    $isValidRow = true; // Flag to check if row data is valid
    // Loop through each column of the current row
    for ($col = 'A'; $col <= $highestColumn; $col++) {
        // Get the value of the current cell
        $cellValue = $sheet->getCell($col . $row)->getValue();
        // Store the cell value in rowData array
        $rowData[] = $cellValue;
        // Check if the value is empty for any column
        if (empty($cellValue)) {
            $isValidRow = false;
            break; // No need to check further, break the loop
        }
    }

    // If any column field in the row is empty, skip insertion for that row
    if (!$isValidRow) {
        echo "Invalid input in row $row. Skipping insertion.<br>";
        continue; // Skip this row and continue to the next one
    }

    // Check if gender is valid
    if (!in_array(strtolower($rowData[4]), $allowedGenders)) {
        echo "Invalid gender in row $row. Skipping insertion.<br>";
        continue; // Skip this row and continue to the next one
    }

    // Check if hobby is valid
    if (!in_array(strtolower($rowData[6]), $allowedHobbies)) {
        echo "Invalid hobby in row $row. Skipping insertion.<br>";
        continue; // Skip this row and continue to the next one
    }

    // Check if country is valid
    if (!in_array($rowData[7], $allowedCountries)) {
        echo "Invalid country in row $row. Skipping insertion.<br>";
        continue; // Skip this row and continue to the next one
    }

    // Check if state is valid
    if (!in_array($rowData[8], $allowedStates)) {
        echo "Invalid state in row $row. Skipping insertion.<br>";
        continue; // Skip this row and continue to the next one
    }


    if (!is_numeric($rowData[2])) {
        echo "Invalid phone number in row $row. Phone number must be an integer. Skipping insertion.<br>";
        continue; // Skip this row and continue to the next one
    }

    // Perform date conversion
    $dob = date('Y-m-d', strtotime($rowData[5]));

    // Append the values to the SQL query
    $sql = "INSERT INTO student (name, email, phone, address, gender, dob, hobby, country, state) VALUES ";
    $sql .= "('$rowData[0]', '$rowData[1]', '$rowData[2]', '$rowData[3]', '$rowData[4]', '$dob', '$rowData[6]', '$rowData[7]', '$rowData[8]')";

    // Now you can execute your SQL query to insert data into the database
    $result = pg_query($dbcon4, $sql);
    if ($result) {
        echo "Data inserted successfully for row $row.<br>";
    } else {
        echo "Error inserting data for row $row: " . pg_last_error($dbcon4) . "<br>";
    }
}

}

?> 






