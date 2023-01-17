<?php
// error_reporting(E_ERROR | E_PARSE);
function mysqlConnect(){
$db_username = 'root';
$db_password = 'Kasun@123';
$db_name = 'myflix';
$db_host = 'localhost:3306';

$mysqli = new mysqli($db_host, $db_username, $db_password,$db_name);						
if ($mysqli->connect_error) {
    die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
}
return $mysqli;
}

function insertSignup($usr_f_name,$user_l_name,$usr_email,$usr_pwd,$usr_sts)
{
    date_default_timezone_set('Europe/London');
    $u_date = date('Y-m-d');
$time_stamp = date('Y-m-d h:i:s a');
$mysqli = mysqlConnect();
$stmt = $mysqli->prepare("INSERT INTO user (f_name,l_name,e_mail,pwd,sts,u_date)"
        . " VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssss", $usr_f_name,$user_l_name,$usr_email,$usr_pwd,$usr_sts,$u_date);
$stmt->execute();
$stmt->close();
$mysqli->close();
}

function searchUser($email,$usr_pwd) {
    $mysqli = mysqlConnect();
    $sql_new = mysqli_query($mysqli, "SELECT e_mail,pwd FROM user WHERE e_mail='$email' AND pwd='$usr_pwd'");
    while ($row_new = mysqli_fetch_assoc($sql_new)) {
    
        $rslt []= $row_new;
    }
    return $rslt;
}
function mongoViewvideos(){
    $curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://data.mongodb-api.com/app/data-gxwop/endpoint/data/v1/action/find',
  
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'{
    "dataSource": "Cluster0",
      "database": "myflix",
      "collection": "videolist",
      "filter": { }
  }',
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json',
    'Access-Control-Request-Headers: *',
    'api-key:c72tLlU5GI2lYMgMPkVYFo7iSKhrUtcwcJPKV3r4msaTmuGmKXRawhaykhPbQjw4',
    'Accept: application/json'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
$json = json_decode($response);
$doc = $json->documents;

return $doc;
}
?>