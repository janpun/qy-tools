<?php

function build_config($data = "", $module = "Common"){
  $fileflow = fopen("Application/Common/Conf/config.php", "w");
  fwrite($fileflow, $data);
}