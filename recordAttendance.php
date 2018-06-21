<?php 

include "config.php";
/*
$barcode = $_POST['studbarcode'];

function check($barcode)
{
    $data = array(
        'eventcode' => 'EF514787',
        'barcode' => $barcode
    );
    $params = '';
    foreach($data as $key=>$value)
        $params .= $key.'='.$value.'&';
    $params = trim($params, '&');

    $curl = curl_init();   
    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://winrest01.addu.edu.ph/eventAttendance/InquiryAPI/personQueryi?'.$params,
        CURLOPT_RETURNTRANSFER => 1,
    ));
    $result = curl_exec($curl);
    if(curl_errno($curl)){
        return false;   
    }
    else
    {
        $data = json_decode($result, true);
        return $data['data'];
    }
    curl_close($curl);
}

check($barcode);
*/

if(isset($_POST['submitAttendance'])) {

    $sbarcode = $_POST['studbarcode'];
    //$eventid = $_SESSION['currEventID'];
    //$eventname = $_SESSION['currEvent'];
    $api_url = "https://winrest01.addu.edu.ph/eventAttendance/InquiryAPI/personQuery?eventcode=6F709CDE&barCode=".$sbarcode;
    $response = file_get_contents($api_url);

    $newresponse = json_decode($response, true);

    if($newresponse['status'] == 'not found')
        echo "Student not enrolled";
        // Other processes
    else{
        echo $newresponse['data']['Code'];
        $code = $newresponse['data']['Code'];
        $firstName = $newresponse['data']['FirstName'];
        $lastName = $newresponse['data']['LastName'];
        $course = $newresponse['data']['ProgrammeOrDept'];
        $section = $newresponse['data']['Section'];

        $record_attendance = mysqli_query($conn, 
        "INSERT INTO attendance(stud_id, firstname, lastname, course, section, time_in) VALUES("
        .$code.", '".$firstName."', '".$lastName."', '".$course."', '".$section."', now())");
    }

    /*
    $query1 = mysqli_query($conn, "SELECT * FROM student WHERE studbarcode = '".$sbarcode."'");
    if(mysqli_num_rows($query1) > 0){
        $record_attendance = mysqli_query($conn, 
        "INSERT INTO attendance(id_event, id_student, time_in) VALUES(".$eventid.",'".$sbarcode."',now())");
    }
    */
}
header('Location: ' . $_SERVER['HTTP_REFERER']);

?>