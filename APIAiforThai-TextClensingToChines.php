<?php

 header ('Content-Type: application/json');
 
 if($_GET){

    $id = $_GET['first'];

    //textclen
    $curl = curl_init();
    
    curl_setopt_array($curl, array(
      CURLOPT_URL => "https://api.aiforthai.in.th/textcleansing?text=".urlencode($id),
      CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
            "Apikey: cTAfAvbmoBdzmEYTUAco602cw4v0FMkq"
        )
        ));

        $response = curl_exec($curl); 
        $err = curl_error ($curl);

        curl_close($curl);



        if ($err) {
          echo "CURL Error #:" . $err;
         } else {
          echo $response;
          $okok = json_decode ($response,true);
          $va = $okok['cleansing_text'];

        echo $va;
        // header('Location: textclensing.php?check='.$va);
         }

//thtochi
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
            "Apikey: cTAfAvbmoBdzmEYTUAco602cw4v0FMkq"
        )
        ));
        
        $response = curl_exec($curl);
        $err = curl_error($curl);
        
        curl_close($curl);
        
        if ($err) {
            echo "CURL Error #:" . $err;
           } else {
            echo $response;
            $okok2 = json_decode ($response,true);
            $ThcH = $okok2;
  
          echo $ThcH;
          header('Location: Index-TextClensingToChines.php?check='.$va,'Location: Index-TextClensingToChines.php.php?check2='.$ThcH);
           }

    }





 ?>