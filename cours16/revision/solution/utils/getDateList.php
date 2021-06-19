<?php

function getDateList($startTimestamp, $nbDates) {
  $dateList = [];

  $firstDateToDisplay = $startTimestamp;
  $nextDate = $firstDateToDisplay;
  for ($i = 0; $i < $nbDates; $i++) {
    $nextDate = time() + $i * 24 * 3600;
    $dateString = date('Y-m-d', $nextDate);
    array_push($dateList, $dateString);
  }

  return $dateList;
}

?>
