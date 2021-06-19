<?php

function getTimeList($start, $end) {
  $timeList = [];

  $firstTimeToDisplay = ($start - 1) * 3600;
  $lastTimeToDisplay = ($end - 1) * 3600;
  for ($time = $firstTimeToDisplay; $time <= $lastTimeToDisplay; $time += 0.5 * 3600) {
    array_push($timeList, date('H:i' , $time));
  }

  return $timeList;
}

?>