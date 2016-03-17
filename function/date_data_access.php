<?php
	function mytime($the_time)
	{
		if(isset($the_time))
			{
				$resgisterOnTimeStamp = strtotime($the_time);
				
				$monthArray = array("มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม",
									"สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
				
				$monthNO = date("n",$resgisterOnTimeStamp);
				//echo "เลขเดือน$monthNO";
				$monthThai = $monthArray[$monthNO-1];
				//echo "ชื่อเดือน $monthThai";
				//echo date("วันที่ d เดือน m ปี Y",$resgisterOnTimeStamp);
				$thaiYear = date("Y",$resgisterOnTimeStamp)+543;
				$time = date("d $monthThai $thaiYear เวลา H:i:s",$resgisterOnTimeStamp);
				
				return $time;
			}
	}
?>

