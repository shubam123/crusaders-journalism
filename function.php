
<?php

function noaction($date_1)
{

    $time1 = new DateTime($date_1); // string date
	$time2 = new DateTime();

    
    $interval = date_diff($time1,$time2);
    
    return $interval->format('%a');
}

//noaction("2016-09-01 08:45:53");

?>