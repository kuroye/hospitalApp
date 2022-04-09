<?php


function connect_database() {

    $dsn = 'mysql:host=localhost;dbname=hospital';
    $username = 'root';
    $password = '';

    try {
        $pdo= new PDO($dsn,$username,$password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }
    catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
}

function doctor_time_sort($doctor,$timeDr){
    $timeLine = ["9:00","9:30","10:00","10:30","11:00","11:30","12:00","14:00","14:30","15:00","15:30","16:00","16:30"];

    unset($timeLine[$timeDr['time']]);

    return $timeLine;
}



function subject_num_to_str($patient)
{
    switch ($patient['subject']) {
        case 1:
            return "内科";
            break;
        case 2:
            return "外科";
            break;
        case 3:
            return "妇科";
            break;
        case 4:
            return "儿科";
            break;
        case 5:
            return "皮肤科";
            break;
        case 6:
            return "神经科";
            break;
        case 7:
            return "中医科";
            break;
        case 8:
            return "其他";
            break;
    }
}


function regis_type_bool_to_str($patient){
    if ($patient['regisType'] == 0) {
        return "普通挂号";
    } else {
        return "专家挂号";
    }
}

function payment_status($patient){
    if ($patient['resBill']!=0){
        return "未支付";
    }
    else{
        return "已支付";
    }
}

function doctor_num_to_str($patient)
{
    switch ($patient['doctor']) {
        case 1:
            echo "别医生";
            break;
        case 2:
            echo "努医生";
            break;
        case 3:
            echo "艾登医生";
            break;
        case 4:
            echo "杰医生";
            break;
        case 5:
            echo "阿亚医生";
            break;
        case 6:
            echo "古丽医生";
            break;
        case 7:
            echo "古米医生";
            break;
    }
}


function doctor_num_to_str_single($patient)
{
    switch ($patient) {
        case 1:
            echo "别医生";
            break;
        case 2:
            echo "努医生";
            break;
        case 3:
            echo "艾登医生";
            break;
        case 4:
            echo "杰医生";
            break;
        case 5:
            echo "阿亚医生";
            break;
        case 6:
            echo "古丽医生";
            break;
        case 7:
            echo "古米医生";
            break;
    }
}

function gender_bool_to_str($patient){
    if ($patient['gender']==0){
        echo "女";
    }else{
        echo "男";
    }
}

function payment_type_int_to_str($bill){
    switch ($bill['type']){
        case 1:
            echo "Kaspi";
            break;
        case 2:
            echo "现金";
            break;
        case 3:
            echo "刷银行卡";
            break;
    }
}
function convert_currency($number, $currency) {
    // Fetching JSON
    $req_url = 'https://api.exchangerate-api.com/v4/latest/KZT';
    $response_json = file_get_contents($req_url);
    // Continuing if we got a result
    if (false !== $response_json) {
        // Try/catch for json_decode operation
        try {
            // Decoding
            $response_object = json_decode($response_json);
            if (!property_exists($response_object->rates, $currency)) {
                return 0;
            }
            return round($number / $response_object->rates->$currency, 2);
        }
        catch (Exception $e) {
            return 0;
        }
    }
}



?>