<?php
error_reporting(0);
$va = $_GET['check'];



$curl = curl_init();

curl_setopt_array($curl, array(
CURLOPT_URL => "https://api.aiforthai.in.th/th-zh-nmt/".urlencode($va),
CURLOPT_RETURNTRANSFER => true,
CURLOPT_ENCODING => "",
CURLOPT_MAXREDIRS => 10,
CURLOPT_TIMEOUT => 30,
CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
CURLOPT_CUSTOMREQUEST => "GET",
CURLOPT_HTTPHEADER => array(
    "Apikey: cTAfAvbmoBdzmEYTUAco602cw4v0FMkq" // key man
)
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
echo "cURL Error #:" . $err;
} else {
// echo $response;
global $cnTrans;
$cnTrans = $response; 
} 

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Text cleansing</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Kanit&display=swap" rel="stylesheet">
    <style>
    .body {
        font-family: 'Kanit', sans- serif;
    }
    </style>
</head>

<body class="body">
    <form action="APIAiforThai-TextClensingToChines.php" method="get">

        <div class="container" style="margin-top:30px">

            <div class="card shadow-lg p-3 mb-5 bg-white rounded">
                <div class="card-body">
                    <div class="form-group">

                        <label for=" first"> ต้นฉบับ :</label>
                        <input type="text" class="form-control" name="first" id="first" size="25" maxlength="1000">
                    </div>

                    <div class="form-group ">
                        <label for="last">ผลลัพธ์ภาษาไทย : </label>
                        <input class="form-control" name="last" size="50" value="<?php echo $va; ?>">
                    </div>

                    <div class="form-group ">
                        <label for="last2">ภาษาจีน : </label>
                        <input class="form-control" id="last2" name="last2" size="50" value="<?php 
                                if($va == ''){
                                    echo "";
                                } else{
                                    echo $cnTrans;
                                }
                                ?>">
                    </div>
                    <button type="summit" name="test" id="test" class="btn btn-success">ประมวลผล</button>
                </div>
            </div>
        </div>

    </form>

</body>

<script src="EngThai.js"></script>

</html>