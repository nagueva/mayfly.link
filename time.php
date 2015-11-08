<?php
  $now = time();
  $tomorrow = strtotime("tomorrow 10:00:00");
  $rem =  $tomorrow - $now;
  $seconds = (date('H',$rem)*60*60)+(date('i',$rem)*60)+date('s',$rem);
  $width = (($seconds*100)/-86400)+100;
  echo date('H\hi\ms\s',$rem);
  echo ','.$width;
?>