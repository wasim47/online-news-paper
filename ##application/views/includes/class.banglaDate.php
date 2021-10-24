<?php
$hour = gmdate('H');
$minute = gmdate('i');
$seconds = gmdate('s');

$day = gmdate('d');
$month = gmdate('m');
$year = gmdate('Y');
$hour = $hour + 6;
$ShowBangladeshTime = date("H:i", mktime ($hour,$minute));
$currentDate = date("l d F Y", mktime ($hour,$minute,$seconds,$month,$day,$year));

$engDATE = array(1,2,3,4,5,6,7,8,9,0,'January','February','March','April','May','June','July','August','September','October','November','December','Saturday','Sunday','Monday','Tuesday','Wednesday','Thursday','Friday');
$bangDATE = array('১','২','৩','৪','৫','৬','৭','৮','৯','০','জানুয়ারী','ফেব্রুয়ারী','মার্চ','এপ্রিল','মে','জুন','জুলাই','আগস্ট','সেপ্টেম্বর','অক্টোবর','নভেম্বর','ডিসেম্বর','শনিবার','রবিবার','সোমবার','মঙ্গলবার','বুধবার','বৃহস্পতিবার','শুক্রবার');
$heading_date = str_replace($engDATE, $bangDATE, $currentDate);

class BanglaDate
{
	private $timestamp;	//timestamp as input
	private $morning;	//when the date will change?
	
	private $engHour;	//Current hour of English Date
	private $engDate;	//Current date of English Date
	private $engMonth;	//Current month of English Date
	private $engYear;	//Current year of English Date
	
	private $bangDate;	//generated Bangla Date
	private $bangMonth;	//generated Bangla Month
	private $bangYear;	//generated Bangla	Year

	/*
	 * Set the initial date and time
	 *
	 * @param	int timestamp for any date
	 * @param	int, set the time when you want to change the date. if 0, then date will change instantly.
	 *			If it's 6, date will change at 6'0 clock at the morning. Default is 6'0 clock at the morning
	 */
	function __construct($timestamp, $hour = 6)
	{
		$this->BanglaDate($timestamp, $hour);
	}
	
	/*
	* PHP4 Legacy constructor
	*/
	function BanglaDate($timestamp, $hour = 6)
	{
		$this->engDate = date('d', $timestamp);
		$this->engMonth = date('m', $timestamp);
		$this->engYear = date('Y', $timestamp);
		$this->morning = $hour;
		$this->engHour = date('G', $timestamp);
		
		//calculate the bangla date
		$this->calculate_date();
		
		//now call calculate_year for setting the bangla year
		$this->calculate_year();
		
		//convert english numbers to Bangla
		$this->convert();
	}
	
	function set_time($timestamp, $hour = 6)
	{
		$this->BanglaDate($timestamp, $hour);
	}

	/*
	 * Calculate the Bangla date and month
	 */
	function calculate_date()
	{
		//when English month is January
		if($this->engMonth == 1)
		{
			if($this->engDate == 1) //Date 1
			{
				if($this->engHour >= $this->morning)
				{
					$this->bangDate = $this->engDate + 17;
					$this->bangMonth = "পৌষ";
				}
				else
				{
					$this->bangDate = $this->engDate + 16;
					$this->bangMonth = "পৌষ";
				}
			}
			else if($this->engDate < 14 && $this->engDate > 1) // Date 2-13
			{
				if($this->engHour >=$this->morning)
				{
					$this->bangDate = $this->engDate + 17;
					$this->bangMonth = "পৌষ";
				}
				else
				{
					$this->bangDate = $this->engDate + 16;
					$this->bangMonth = "পৌষ";
				}
			}

			else if($this->engDate == 14) //Date 14
			{
				if($this->engHour >= $this->morning)
				{
					$this->bangDate = $this->engDate - 13;
					$this->bangMonth = "মাঘ";
				}
				else
				{
					$this->bangDate = 30;
					$this->bangMonth = "পৌষ";
				}
			}
			else //Date 15-31
			{
				if($this->engHour >= $this->morning)
				{
					$this->bangDate = $this->engDate - 13;
					$this->bangMonth = "মাঘ";
				}
				else 
				{
					$this->bangDate = $this->engDate - 14;
					$this->bangMonth = "মাঘ";
				}
			}
		}

		
		//when English month is February		
		else if($this->engMonth == 2)
		{
			if($this->engDate == 1) //Date 1
			{
				if($this->engHour >= $this->morning)
				{
					$this->bangDate = $this->engDate + 18;
					$this->bangMonth = "মাঘ";
				}
				else
				{
					$this->bangDate = $this->engDate + 17;
					$this->bangMonth = "মাঘ";
				}
			}
			else if($this->engDate < 13 && $this->engDate > 1) // Date 2-12
			{
				if($this->engHour >=$this->morning)
				{
					$this->bangDate = $this->engDate + 18;
					$this->bangMonth = "মাঘ";
				}
				else
				{
					$this->bangDate = $this->engDate + 17;
					$this->bangMonth = "মাঘ";
				}
			}

			else if($this->engDate == 13) //Date 13
			{
				if($this->engHour >= $this->morning)
				{
					$this->bangDate = $this->engDate - 12;
					$this->bangMonth = "ফাল্গুন";
				}
				else
				{
					$this->bangDate = 30;
					$this->bangMonth = "মাঘ";
				}
			}
			else //Date 15-31
			{
				if($this->engHour >= $this->morning)
				{
					$this->bangDate = $this->engDate - 12;
					$this->bangMonth = "ফাল্গুন";
				}
				else 
				{
					$this->bangDate = $this->engDate - 13;
					$this->bangMonth = "ফাল্গুন";
				}
			}
		}
		
		//when English month is March		
		else if($this->engMonth == 3)
		{
			if($this->engDate == 1) //Date 1
			{
				if($this->engHour >= $this->morning)
				{
					if($this->is_leapyear())$this->bangDate = $this->engDate + 17;
					else $this->bangDate = $this->engDate + 16;
					$this->bangMonth = "ফাল্গুন";
				}
				else
				{
					if($this->is_leapyear()) $this->bangDate = $this->engDate + 16;
					else $this->bangDate = $this->engDate + 15;
					$this->bangMonth = "ফাল্গুন";
				}
			}
			else if($this->engDate < 15 && $this->engDate > 1) // Date 2-13
			{
				if($this->engHour >=$this->morning)
				{
					if($this->is_leapyear()) $this->bangDate = $this->engDate + 17;
					else $this->bangDate = $this->engDate + 16;
					$this->bangMonth = "ফাল্গুন";
				}
				else
				{
					if($this->is_leapyear()) $this->bangDate = $this->engDate + 16;
					else $this->bangDate = $this->engDate + 15;
					$this->bangMonth = "ফাল্গুন";
				}
			}

			else if($this->engDate == 15) //Date 14
			{
				if($this->engHour >= $this->morning)
				{
					$this->bangDate = $this->engDate - 14;
					$this->bangMonth = "চৈত্র";
				}
				else
				{
					$this->bangDate = 30;
					$this->bangMonth = "ফাল্গুন";
				}
			}
			else //Date 15-31
			{
				if($this->engHour >= $this->morning)
				{
					$this->bangDate = $this->engDate - 14;
					$this->bangMonth = "চৈত্র";
				}
				else 
				{
					$this->bangDate = $this->engDate - 15;
					$this->bangMonth = "চৈত্র";
				}
			}
		}
		
		//when English month is April		
		else if($this->engMonth == 4)
		{
			if($this->engDate == 1) //Date 1
			{
				if($this->engHour >= $this->morning)
				{
					$this->bangDate = $this->engDate + 17;
					$this->bangMonth = "চৈত্র";
				}
				else
				{
					$this->bangDate = $this->engDate + 16;
					$this->bangMonth = "চৈত্র";
				}
			}
			else if($this->engDate < 14 && $this->engDate > 1) // Date 2-13
			{
				if($this->engHour >=$this->morning)
				{
					$this->bangDate = $this->engDate + 17;
					$this->bangMonth = "চৈত্র";
				}
				else
				{
					$this->bangDate = $this->engDate + 16;
					$this->bangMonth = "চৈত্র";
				}
			}

			else if($this->engDate == 14) //Date 14
			{
				if($this->engHour >= $this->morning)
				{
					$this->bangDate = $this->engDate - 13;
					$this->bangMonth = "বৈশাখ";
				}
				else
				{
					$this->bangDate = 30;
					$this->bangMonth = "চৈত্র";
				}
			}
			else //Date 15-31
			{
				if($this->engHour >= $this->morning)
				{
					$this->bangDate = $this->engDate - 13;
					$this->bangMonth = "বৈশাখ";
				}
				else 
				{
					$this->bangDate = $this->engDate - 14;
					$this->bangMonth = "বৈশাখ";
				}
			}
		}

		
		//when English month is May
		else if($this->engMonth == 5)
		{
			if($this->engDate == 1) //Date 1
			{
				if($this->engHour >= $this->morning)
				{
					$this->bangDate = $this->engDate + 17;
					$this->bangMonth = "বৈশাখ";
				}
				else
				{
					$this->bangDate = $this->engDate + 16;
					$this->bangMonth = "বৈশাখ";
				}
			}
			else if($this->engDate < 15 && $this->engDate > 1) // Date 2-14
			{
				if($this->engHour >=$this->morning)
				{
					$this->bangDate = $this->engDate + 17;
					$this->bangMonth = "বৈশাখ";
				}
				else
				{
					$this->bangDate = $this->engDate + 16;
					$this->bangMonth = "বৈশাখ";
				}
			}

			else if($this->engDate == 15) //Date 14
			{
				if($this->engHour >= $this->morning)
					{
						$this->bangDate = $this->engDate - 14;
						$this->bangMonth = "জ্যৈষ্ঠ";
					}
				else
					{
						$this->bangDate = 31;
						$this->bangMonth = "চৈত্র";
					}
			}
			else //Date 16-31
			{
				if($this->engHour >= $this->morning)
				{
					$this->bangDate = $this->engDate - 14;
					$this->bangMonth = "জ্যৈষ্ঠ";
				}
				else 
				{
					$this->bangDate = $this->engDate - 15;
					$this->bangMonth = "জ্যৈষ্ঠ";
				}
			}
		}

		
		//when English month is June
		else if($this->engMonth == 6)
		{
			if($this->engDate == 1) //Date 1
			{
				if($this->engHour >= $this->morning)
				{
					$this->bangDate = $this->engDate + 17;
					$this->bangMonth = "জ্যৈষ্ঠ";
				}
				else
				{
					$this->bangDate = $this->engDate + 16;
					$this->bangMonth = "জ্যৈষ্ঠ";
				}
			}
			else if($this->engDate < 15 && $this->engDate > 1) // Date 2-14
			{
				if($this->engHour >=$this->morning)
				{
					$this->bangDate = $this->engDate + 17;
					$this->bangMonth = "জ্যৈষ্ঠ";
				}
				else
				{
					$this->bangDate = $this->engDate + 16;
					$this->bangMonth = "জ্যৈষ্ঠ";
				}
			}

			else if($this->engDate == 15) //Date 15
			{
				if($this->engHour >= $this->morning)
				{
					$this->bangDate = $this->engDate - 14;
					$this->bangMonth = "আষাঢ়";
				}
				else
				{
					$this->bangDate = 31;
					$this->bangMonth = "জ্যৈষ্ঠ";
				}
			}
			else //Date 15-31
			{
				if($this->engHour >= $this->morning)
				{
					$this->bangDate = $this->engDate - 14;
					$this->bangMonth = "আষাঢ়";
				}
				else 
				{
					$this->bangDate = $this->engDate - 13;
					$this->bangMonth = "আষাঢ়";
				}
			}
		}

		
		//when English month is July		
		else if($this->engMonth == 7)
		{
			if($this->engDate == 1) //Date 1
			{
				if($this->engHour >= $this->morning)
				{
					$this->bangDate = $this->engDate + 16;
					$this->bangMonth = "আষাঢ়";
				}
				else
				{
					$this->bangDate = $this->engDate + 15;
					$this->bangMonth = "আষাঢ়";
				}
			}
			else if($this->engDate < 16 && $this->engDate > 1) // Date 2-15
			{
				if($this->engHour >=$this->morning)
				{
					$this->bangDate = $this->engDate + 16;
					$this->bangMonth = "আষাঢ়";
				}
				else
				{
					$this->bangDate = $this->engDate + 15;
					$this->bangMonth = "আষাঢ়";
				}
			}

			else if($this->engDate == 16) //Date 16
			{
				if($this->engHour >= $this->morning)
				{
					$this->bangDate = $this->engDate - 15;
					$this->bangMonth = "শ্রাবণ";
				}
				else
				{
					$this->bangDate = 31;
					$this->bangMonth = "আষাঢ়";
				}
			}
			else //Date 17-31
			{
				if($this->engHour >= $this->morning)
				{
					$this->bangDate = $this->engDate - 15;
					$this->bangMonth = "শ্রাবণ";
				}
				else 
				{
					$this->bangDate = $this->engDate - 16;
					$this->bangMonth = "শ্রাবণ";
				}
			}
		}

		
		//when English month is August
		else if($this->engMonth == 8)
		{
			if($this->engDate == 1) //Date 1
			{
				if($this->engHour >= $this->morning)
				{
					$this->bangDate = $this->engDate + 16;
					$this->bangMonth = "শ্রাবণ";
				}
				else
				{
					$this->bangDate = $this->engDate + 15;
					$this->bangMonth = "শ্রাবণ";
				}
			}
			else if($this->engDate < 16 && $this->engDate > 1) // Date 2-15
			{
				if($this->engHour >=$this->morning)
				{
					$this->bangDate = $this->engDate + 16;
					$this->bangMonth = "শ্রাবণ";
				}
				else
				{
					$this->bangDate = $this->engDate + 15;
					$this->bangMonth = "শ্রাবণ";
				}
			}

			else if($this->engDate == 16) //Date 16
			{
				if($this->engHour >= $this->morning)
				{
					$this->bangDate = $this->engDate - 15;
					$this->bangMonth = "ভাদ্র";
				}
				else
				{
					$this->bangDate = 31;
					$this->bangMonth = "শ্রাবণ";
				}
			}
			else //Date 15-31
			{
				if($this->engHour >= $this->morning)
				{
					$this->bangDate = $this->engDate - 15;
					$this->bangMonth = "ভাদ্র";
				}
				else 
				{
					$this->bangDate = $this->engDate - 16;
					$this->bangMonth = "ভাদ্র";
				}
			}
		}

		
		//when English month is September
		else if($this->engMonth == 9)
		{
			if($this->engDate == 1) //Date 1
			{
				if($this->engHour >= $this->morning)
				{
					$this->bangDate = $this->engDate + 16;
					$this->bangMonth = "ভাদ্র";
				}
				else
				{
					$this->bangDate = $this->engDate + 15;
					$this->bangMonth = "ভাদ্র";
				}
			}
			else if($this->engDate < 16 && $this->engDate > 1) // Date 2-15
			{
				if($this->engHour >=$this->morning)
				{
					$this->bangDate = $this->engDate + 16;
					$this->bangMonth = "ভাদ্র";
				}
				else
				{
					$this->bangDate = $this->engDate + 15;
					$this->bangMonth = "ভাদ্র";
				}
			}

			else if($this->engDate == 16) //Date 14
			{
				if($this->engHour >= $this->morning)
				{
					$this->bangDate = $this->engDate - 15;
					$this->bangMonth = "আশ্বিন";
				}
				else
				{
					$this->bangDate = 31;
					$this->bangMonth = "ভাদ্র";
				}
			}
			else //Date 15-31
			{
				if($this->engHour >= $this->morning)
				{
					$this->bangDate = $this->engDate - 15;
					$this->bangMonth = "আশ্বিন";
				}
				else 
				{
					$this->bangDate = $this->engDate - 16;
					$this->bangMonth = "আশ্বিন";
				}
			}
		}

		
		//when English month is October
		else if($this->engMonth == 10)
		{
			if($this->engDate == 1) //Date 1
			{
				if($this->engHour >= $this->morning)
				{
					$this->bangDate = $this->engDate + 15;
					$this->bangMonth = "আশ্বিন";
				}
				else
				{
					$this->bangDate = $this->engDate + 14;
					$this->bangMonth = "আশ্বিন";
				}
			}
			else if($this->engDate < 16 && $this->engDate > 1) // Date 2-15
			{
				if($this->engHour >=$this->morning)
				{
					$this->bangDate = $this->engDate + 15;
					$this->bangMonth = "আশ্বিন";
				}
				else
				{
					$this->bangDate = $this->engDate + 14;
					$this->bangMonth = "আশ্বিন";
				}
			}

			else if($this->engDate == 16) //Date 14
			{
				if($this->engHour >= $this->morning)
				{
					$this->bangDate = $this->engDate - 15;
					$this->bangMonth = "কার্তিক";
				}
				else
				{
					$this->bangDate = 30;
					$this->bangMonth = "আশ্বিন";
				}
			}
			else //Date 17-31
			{
				if($this->engHour >= $this->morning)
				{
					$this->bangDate = $this->engDate - 15;
					$this->bangMonth = "কার্তিক";
				}
				else 
				{
					$this->bangDate = $this->engDate - 16;
					$this->bangMonth = "কার্তিক";
				}
			}
		}

		
		//when English month is November
		else if($this->engMonth == 11)
		{
			if($this->engDate == 1) //Date 1
			{
				if($this->engHour >= $this->morning)
				{
					$this->bangDate = $this->engDate + 16;
					$this->bangMonth = "কার্তিক";
				}
				else
				{
					$this->bangDate = $this->engDate + 15;
					$this->bangMonth = "কার্তিক";
				}
			}
			else if($this->engDate < 15 && $this->engDate > 1) // Date 2-14
			{
				if($this->engHour >=$this->morning)
				{
					$this->bangDate = $this->engDate + 16;
					$this->bangMonth = "কার্তিক";
				}
				else
				{
					$this->bangDate = $this->engDate + 15;
					$this->bangMonth = "কার্তিক";
				}
			}

			else if($this->engDate == 15) //Date 14
			{
				if($this->engHour >= $this->morning)
				{
					$this->bangDate = $this->engDate - 14;
					$this->bangMonth = "অগ্রাহায়ণ";
				}
				else
				{
					$this->bangDate = 30;
					$this->bangMonth = "কার্তিক";
				}
			}
			else //Date 15-31
			{
				if($this->engHour >= $this->morning)
				{
					$this->bangDate = $this->engDate - 14;
					$this->bangMonth = "অগ্রহায়ণ";
				}
				else 
				{
					$this->bangDate = $this->engDate - 15;
					$this->bangMonth = "অগ্রহায়ণ";
				}
			}
		}

		
		//when English month is December
		else if($this->engMonth == 12)
		{
			if($this->engDate == 1) //Date 1
			{
				if($this->engHour >= $this->morning)
				{
					$this->bangDate = $this->engDate + 16;
					$this->bangMonth = "অগ্রহায়ণ";
				}
				else
				{
					$this->bangDate = $this->engDate + 15;
					$this->bangMonth = "অগ্রহায়ণ";
				}
			}
			else if($this->engDate < 15 && $this->engDate > 1) // Date 2-14
			{
				if($this->engHour >=$this->morning)
				{
					$this->bangDate = $this->engDate + 16;
					$this->bangMonth = "অগ্রহায়ণ";
				}
				else
				{
					$this->bangDate = $this->engDate + 15;
					$this->bangMonth = "অগ্রহায়ণ";
				}
			}

			else if($this->engDate == 15) //Date 14
			{
				if($this->engHour >= $this->morning)
				{
					$this->bangDate = $this->engDate - 14;
					$this->bangMonth = "পৌষ";
				}
				else
				{
					$this->bangDate = 30;
					$this->bangMonth = "অগ্রহায়ণ";
				}
			}
			else //Date 15-31
			{
				if($this->engHour >= $this->morning)
				{
					$this->bangDate = $this->engDate - 14;
					$this->bangMonth = "পৌষ";
				}
				else 
				{
					$this->bangDate = $this->engDate - 15;
					$this->bangMonth = "পৌষ";
				}
			}
		}
	}

	/*
	 * Checks, if the date is leapyear or not
	 *
	 * @return boolen. True if it's leap year or returns false
	 */
	function is_leapyear()
	{
		if($this->engYear%400 ==0 || ($this->engYear%100 != 0 && $this->engYear%4 == 0))
			return true;
		else
			return false;
	}

	/*
	 * Calculate the Bangla Year
	 */
	function calculate_year()
	{
		if($this->engMonth >= 4)
		{
			if($this->engMonth == 4 && $this->engDate < 14) //1-13 on april when hour is greater than 6
				{
					$this->bangYear = $this->engYear - 594;
				}
			else if($this->engMonth == 4 && $this->engDate == 14 && $this->engHour <=5)
				{
					$this->bangYear = $this->engYear - 594;
				}
			else if($this->engMonth == 4 && $this->engDate == 14 && $this->engHour >=6)
				{
					$this->bangYear = $this->engYear - 593;
				}	
			/*else if($this->engMonth == 4 && ($this->engDate == 14 && $this->engDate) && $this->engHour <=5) //1-13 on april when hour is greater than 6
				{
					$this->bangYear = $this->engYear - 593;
				}
				*/
			else
				$this->bangYear = $this->engYear - 593;
		}
		else $this->bangYear = $this->engYear - 594;
	}

	/*
	 * Convert the English character to Bangla
	 *
	 * @param int any integer number
	 * @return string as converted number to bangla
	 */
	function bangla_number($int)
	{
		$engNumber = array(1,2,3,4,5,6,7,8,9,0);
		$bangNumber = array('১','২','৩','৪','৫','৬','৭','৮','৯','০');
		
		$converted = str_replace($engNumber, $bangNumber, $int);
		return $converted;
	}

	/*
	 * Calls the converter to convert numbers to equivalent Bangla number
	 */
	function convert()
	{
		$this->bangDate = $this->bangla_number($this->bangDate);
		$this->bangYear = $this->bangla_number($this->bangYear);
	}

	/*
	 * Returns the calculated Bangla Date
	 *
	 * @return array of converted Bangla Date
	 */
	function get_date()
	{
		//return array($this->bangDate, $this->bangMonth, $this->bangYear);
		return array($this->bangDate, $this->bangMonth, $this->bangYear);
	}
	function get_date1()
	{
		//return array($this->bangDate, $this->bangMonth, $this->bangYear);
		return ($data=$this->bangDate.'&nbsp;'.$this->bangMonth.'&nbsp;'.$this->bangYear);
	}
}