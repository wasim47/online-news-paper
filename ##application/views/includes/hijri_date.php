<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<?php
class hijridate{
function convertHijri($date,$monthname=false) {
	   $y = substr($date,0,4);
	   $m = substr($date,5,2);
	   $d = substr($date,8,2);
      if (($y>1582)||(($y==1582)&&($m>10))||(($y==1582)&&($m==10)&&($d>14))){
        $jd=(int)((1461*($y+4800+(int)(($m-14)/12)))/4)+(int)((367*($m-2-12*((int)(($m-14)/12))))/12)-(int)( (3* ((int)(  ($y+4900+    (int)( ($m-14)/12))/100)))/4)+$d-32076;  // change here 32075 to 32076
      } else {
        $jd = 367*$y-(int)((7*($y+5001+(int)(($m-9)/7)))/4)+(int)((275*$m)/9)+$d+1729777;
      }
			$l=$jd-1948440+10632;
			$n=(int)(($l-1)/10631);
			$l=$l-10631*$n+354;
			$j=((int)((10985-$l)/5316))*((int)((50*$l)/17719))+((int)($l/5670))*((int)((43*$l)/15238));
			$l=$l-((int)((30-$j)/15))*((int)((17719*$j)/50))-((int)($j/16))*((int)((15238*$j)/43))+29;
			$m=(int)((24*$l)/709);
			$d=$l-(int)((709*$m)/24);
			$y=30*$n+$j-30;

  if(!$monthname){ // return basic
    return($d.'-'.$m.'-'.$y);
  } else { // return full
    switch ($m){
      case 1:
        $mn = 'Muharram';
      break;
      case 2:
        $mn = 'Safar';
      break;
      case 3:
        $mn = 'Rabiulawal';
      break;
      case 4:
        $mn = 'Rabius sani';
      break;
      case 5:
        $mn = 'Jamadilawal';
      break;
      case 6:
        $mn = 'Jamadil sani ';
      break;
      case 7:
        $mn = 'Rejab';
      break;
      case 8:
        $mn = 'Syaaban';
      break;
      case 9:
        $mn = 'Ramadhan';
      break;
      case 10:
        $mn = 'Syawal';
      break;
      case 11:
        $mn = 'Zulkaedah';
      break;
      case 12:
        $mn = 'Zulhijjah';
      break;            
    }
    return($d.' '.$mn.', '.$y);
  }
  }
  }
    
	$hour = gmdate('H');
	$minute = gmdate('i');
	$seconds = gmdate('s');
	$day = gmdate('d');
	$month = gmdate('m');
	$year = gmdate('Y');
	
	$hour = $hour + 6;
	$currentDate = date("Y-m-d", mktime ($hour,$minute,$seconds,$month,$day,$year));

			
  $hidate = new hijridate();
 $hijriDateDisplay =  $hidate->convertHijri($currentDate, True);
  
 $engDATE = array(1,2,3,4,5,6,7,8,9,0,'Muharram','Safar','Rabiulawal','Rabius sani','Jamadilawal','Jamadil sani','Rejab','Syaaban','Ramadhan','Syawal','Zulkaedah','Zulhijjah');
$bangDATE = array('১','২','৩','৪','৫','৬','৭','৮','৯','০','মহাররম','সফর','রবিউল আউয়াল','রবিউস সানি','জুমাদিউল আউয়াল','জুমাদিউল সানি','রজব','সাবান','রামজান','শাউয়াল','জিলকদ্দ','জিলহজ্জ');

echo $topdeskdate = str_replace($engDATE, $bangDATE, $hijriDateDisplay);
?>
</html>