<?php

function logJSONData($APIres, $pathToLogFile)
{
    //TODO: READ FROM THE JSON FILE
    $sample_json = file_get_contents($pathToLogFile);

    //EDGE-CASE:IF THE JSON FILE IS EMPTY
    if (strlen($sample_json) <= 2) {
        //TODO: CREATE SOME EMPTY ARRAY & POPULATE IT
        $sample_arr = [];
        $sample_json1 = json_decode($APIres, true);
        array_push($sample_arr, $sample_json1);

        //TODO:PARSE THE POPULATED DATA INTO JSON & WRITE IT INTO THE JSON FILE
        file_put_contents($pathToLogFile, json_encode($sample_arr));
    } else {

        $decodedJSONArr = json_decode($sample_json, true);

        array_push($decodedJSONArr, json_decode($APIres));

        file_put_contents($pathToLogFile, json_encode($decodedJSONArr));
    }
};
