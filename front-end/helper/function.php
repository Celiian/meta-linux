<?php
function giveId()
{
  $alphabet = [
    1 => "a",
    2 => "b",
    3 => "c",
    4 => "d",
    5 => "e",
    6 => "f",
    7 => "g",
    8 => "h",
    9 => "i",
    10 => "j",
    11 => "k",
    12 => "l",
    13 => "m",
    14 => "n",
    15 => "o",
    16 => "p",
    17 => "q",
    18 => "r",
    19 => "s",
    20 => "t",
    21 => "u",
    22 => "v",
    23 => "w",
    24 => "x",
    25 => "y",
    26 => "z",
  ];

  $id = "";

  for ($i = 1; $i <= 20; $i++) {
    if (rand(1, 2) == 1) {
      $id = $id . rand(0, 9);
    } else {
      if (rand(1, 2) == 1) {
        $id = $id . $alphabet[rand(1, 26)];
      } else {
        $id = $id . strtoupper($alphabet[rand(1, 26)]);
      }
    }
  }
  return $id;
}



function console_log($data)
{
  echo '<script>';
  echo 'console.log(' . json_encode($data) . ')';
  echo '</script>';
}

function postApi($data, $route)
{
  $option = [
      'method' => 'POST',
      'content' => json_encode($data),
      'header' => "Content-Type: application/json\r\n" . "Accept: application/json\r\n",
      "timeout" => 5,
      "user-agent" => "toto",
  ];


  $context = stream_context_create($option);
  $fp = fopen('1192.168.128.6:8082/' . $route, 'r', false, $context) or die(error_get_last());
  $data = stream_get_contents($fp);
  fclose($fp);

  $data = json_decode($data, true)

  /*

  $ch = curl_init();
  $curlConfig = array(
      CURLOPT_URL            => '192.168.128.6:8082/' . $route,
      CURLOPT_POST           => true,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_POSTFIELDS     => json_encode($data),
      CURLOPT_HTTPHEADER => array('Content-Type:application/json')
  );
  curl_setopt_array($ch, $curlConfig);
  $result = curl_exec($ch);
  curl_close($ch);


  $response = json_decode($result);
  */

  return $response;
}

function getApi($route)
{


  $opts = array(
    'http' => array(
      'method' => "GET",
    )
  );
  $context = stream_context_create($opts);
  $path = "localhost:8082/" . $route;
  $fp = fopen($path, 'r', false, $context);
  $data = stream_get_contents($fp);
  fclose($fp);
  $data = json_decode($data, true);

/*
  $curl = curl_init();
  curl_setopt($curl, CURLOPT_URL, "192.168.128.6:8082/" . $route);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
  $output = curl_exec($curl);
  curl_close($curl);
  $data = json_decode($output, true);
  */
  return $data;
}


function checkid($path)
{
  $id = giveId();

  $check = getApi($path . $id);
  if ($check == null) {
    return $id;
  } else {
    $badId = True;
    while ($badId) {
      $id = giveId();
      $check = getApi($path . $id);
      if ($check == null) {
        return $id;
      }
    }
  }
}


function HowOldAreYou($date_naissance)
{
  $am = $date_naissance;
  $an = explode('/', date('d/m/Y'));
  if (($am[1] < $an[1]) || (($am[1] == $an[1]) && ($am[0] <= $an[0]))) return $an[2] - $am[2];
  return $an[2] - $am[2] - 1;
}