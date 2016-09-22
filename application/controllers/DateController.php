<?php

class DateController {
	
	

	public function getYear($currentDate){
		$yearStr = strftime("%Y", strtotime($currentDate));
		$year = intval($yearStr);
		return $year;
	}
	
	public function rightDate($date1, $date2, $time1, $time2) {
	
		
		$date1 = str_replace('/', '-', $date1);
		$date2 = str_replace('/', '-', $date2);
		
		$timestamp1 = strtotime($date1);
	
		$tabTime=explode(':', $time1);
		$sectime1 = (intval($tabTime[0])*3600) + (intval($tabTime[1])*60);
	
		$timestamp1 += $sectime1;
	
		$timestamp2 = strtotime($date2);
	
		$tabTime=explode(':', $time2);
		$sectime2 = (intval($tabTime[0])*3600) + (intval($tabTime[1])*60);
	
		$timestamp2 += $sectime2;
		
	
		if ($timestamp1<=$timestamp2) {
			return 1;
		}
		else{
			return 0;
		}
	
	}
	
	public function dateConvert($date, $time){
	
		$date = str_replace('/', '-', $date);
		$timestamp = strtotime($date);
		$tabTime=explode(':', $time);
		$sectime = (intval($tabTime[0])*3600) + (intval($tabTime[1])*60);
		$timestamp += $sectime;
	
		$datetime = strftime("%Y-%m-%d %H:%M:%S", $timestamp);
		return $datetime;
	}

	
}