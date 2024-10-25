<?php
    $serverName = "uichanges.database.windows.net"; // update me
    $connectionOptions = array(
        "Database" => "OrganizationInfo", // update me
        "Uid" => "MrRaveen007", // update me
        "PWD" => 'asdfghjkl$H' // Corrected: Use single quotes to handle special characters in password
    );
    // Establishes the connection
    $conn = sqlsrv_connect($serverName, $connectionOptions);

    if ($conn === false) {
        die(print_r(sqlsrv_errors(), true)); // Better error handling
    }

    $tsql= "SELECT * FROM organizationInformation";
    $getResults = sqlsrv_query($conn, $tsql);

    //echo ("Reading data from table" . PHP_EOL);

    if ($getResults === false) {
        die(print_r(sqlsrv_errors(), true)); // Handle query errors
    }

    while ($row = sqlsrv_fetch_array($getResults, SQLSRV_FETCH_ASSOC)) {
        echo $row['orgName'] . "<br>";
    }

    sqlsrv_free_stmt($getResults);
?>
