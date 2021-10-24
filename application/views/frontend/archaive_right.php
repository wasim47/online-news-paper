<div style="width:100%;">
        <div class="main-title">আর্কাইভ</div>
		<style>
.wrapper{
	width:100%;
	max-width:400px;
	max-height:355px;
	height:auto;
	background:#ea444d;
	padding:0px;
	float:left;
	font-family:Arial, Helvetica, sans-serif;
}
.calTitle{
	color:#fff;	
	text-transform:uppercase;
	font-family:Arial, Helvetica, sans-serif; 
	font-size:18px;
	text-shadow:#999 1px 1px;
	padding:5px; 
	margin:8px 0 0 0;
	font-family:Arial, Helvetica, sans-serif;
}
.calArrow{
	color:#fff;	
	text-transform:uppercase;
	text-shadow:#000 1px 1px;
	font-size:35px;
	margin:8px 0 0 0;
	text-decoration:none;
	padding:5px;
	font-family:Arial, Helvetica, sans-serif;
}
.calArrow:hover{
	color:#4900FF;	
	font-family:Arial, Helvetica, sans-serif;
}
table.calendar		{ width:97%; max-width:400px; margin:5px;font-family:Arial, Helvetica, sans-serif;}
tr.calendar-row	{  }
td.calendar-day	{ height:auto; font-size:15px;  font-weight:bold; width:auto; border:1px solid #ccc; text-align:center;font-family:Arial, Helvetica, sans-serif; padding:5px;} 
td.calendar-day:hover	{ background:#f5f5f5; width:auto; height:auto; color:#f00;font-family:Arial, Helvetica, sans-serif; }
td.calendar-day-np	{ background:#f5f5f5; height:auto;font-family:Arial, Helvetica, sans-serif;
 } 
* html div.calendar-day-np { height:auto; font-family:Arial, Helvetica, sans-serif;}
td.calendar-day-head {font-weight:bold; text-align:center; width:auto; padding:4px 0; border-bottom:1px solid #999; border-top:1px solid #999; color:#fff;font-family:Arial, Helvetica, sans-serif; font-size:16px;text-shadow:#999 1px 1px;}
/*div.day-number{ 
background:#999; padding:5px; color:#fff; font-weight:bold; float:right; margin:-5px -5px 0 0; width:20px; text-align:center; 
}*/
/* shared */
td.calendar-day, td.calendar-day-np { width:auto; padding:4px 0px; font-family:Arial, Helvetica, sans-serif; }
</style>        
		<script type="text/javascript" src="<?php echo base_url();?>assets/js/front/jquery-1.js"></script>
		<script type="text/javascript">
            function calenderInc(mon,yea){
                $.ajax({
                    type: "POST",
                    url: '<?php echo base_url('index/calajaxdata');?>',
                    data: {m:mon,y:yea},
                        success: function(data)
                        {
                            $("#calender-view").css('display','none');
                            $("#calenderajax").html(data);
                            
                        }
                });
                
            }
            function evenCalender(datefinder){
                //alert(datefinder);
                window.location.href='<?php echo base_url('index/news_archive');?>?date='+datefinder;
            }
        </script>

		<?php
        function draw_calendar($month,$year){
                $dateObj   = DateTime::createFromFormat('!m', $month);
                $monthName = $dateObj->format('F');
                
                if($month<12){
                    $increamentm = $month + 1;
                    $incyear = $year;
                }
                else{
                    $increamentm=1;			
                    $incyear = $year+1;
                }
                
                if($month>1){
                    $decreamentm = $month - 1;
                    $decyear = $year;
                }
                else{
                    $decreamentm=12;			
                    $decyear = $year-1;
                }
                
                
            $calendar = '<div class="wrapper">';
            $calendar .='<div style="width:100%;float:left;">
                       <div style="width:10%; float:left; ">
                    <a href="javascript:void();" class="calArrow" onClick="calenderInc('.$decreamentm.','.$decyear.');">&laquo;</a></div>
                    
                    <div style="text-align:center;width:80%; float:left"><h5 class="calTitle">'.$monthName.' '.$year.'</h5></div>
                    <div style="width:10%; float:left; text-align:right;">
                    <a href="javascript:void();" class="calArrow" onClick="calenderInc('.$increamentm.','.$incyear.');">&raquo;</a></div>
                </div>';
            /* draw table */
            $calendar .= '<table cellpadding="0" cellspacing="0" class="calendar">';	
            /* table headings */
            //$headings = array('Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday');
            $headings = array('Sun','Mon','Tue','Wed','Thu','Fri','Sat');
            $calendar.= '<tr class="calendar-row"><td class="calendar-day-head">'.implode('</td><td class="calendar-day-head">',$headings).'</td></tr>';
        
            /* days and weeks vars now ... */
            $running_day = date('w',mktime(0,0,0,$month,1,$year));
            $days_in_month = date('t',mktime(0,0,0,$month,1,$year));
            $days_in_this_week = 1;
            $day_counter = 0;
            $dates_array = array();
        
            /* row for week one */
            $calendar.= '<tr class="calendar-row">';
        
            /* print "blank" days until the first of the current week */
            for($x = 0; $x < $running_day; $x++):
                $calendar.= '<td class="calendar-day-np"> </td>';
                $days_in_this_week++;
            endfor;
        
            /* keep going with days.... */
            for($list_day = 1; $list_day <= $days_in_month; $list_day++):
                    $tdate = date('d');
                   if($tdate==$list_day){
						$col = "#fff";
						$bgc = '#132c03';	
					}
					else{
						$col = "#ea444d";	
						$bgc = '#fff';
					}
                    
                    if($list_day > 9){
                        $cday = $list_day;	
                    }
                    else{
                        $cday = '0'.$list_day;	
                    }
                    
                    if($month > 9){
                        $cmonth = $month;	
                    }
                    else{
                        $cmonth = '0'.$month;	
                    }
                    
                $cldate = $year."-".$cmonth."-".$cday;
                $resultshow = "'".$cldate."'";
                $calendar.= '<td class="calendar-day" style="cursor:pointer; color:'.$col .'; background-color:'.$bgc.'">';
                    $calendar.= '<div onclick="evenCalender('.$resultshow.');">'.$list_day.'</div>';
        
                    /** QUERY THE DATABASE FOR AN ENTRY FOR THIS DAY !!  IF MATCHES FOUND, PRINT THEM !! **/
                    $calendar.= str_repeat('<p> </p>',2);
                    
                $calendar.= '</td>';
                if($running_day == 6):
                    $calendar.= '</tr>';
                    if(($day_counter+1) != $days_in_month):
                        $calendar.= '<tr class="calendar-row">';
                    endif;
                    $running_day = -1;
                    $days_in_this_week = 0;
                endif;
                $days_in_this_week++; $running_day++; $day_counter++;
            endfor;
        
            /* finish the rest of the days in the week */
            if($days_in_this_week < 8):
                for($x = 1; $x <= (8 - $days_in_this_week); $x++):
                    $calendar.= '<td class="calendar-day-np"> </td>';
                endfor;
            endif;
        
            /* final row */
            $calendar.= '</tr>';
        
            /* end the table */
            $calendar.= '</table>';
            $calendar .= '</div>';
            /* all done, return result */
            return $calendar;
        }
        ?>

        <div id="calender-view">
            <?php
                $tm = date('n');
                $ty = date('Y');
                echo draw_calendar($tm,$ty);
            ?>
        </div>
        <div id="calenderajax"></div>
    </div> 