<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
========================================================
Plugin BanglaUtils
--------------------------------------------------------
Copyright: Oliver Heine
License: Freeware
http://utilitees.de/ee.php/banglautils
--------------------------------------------------------
This addon may be used free of charge. Should you
employ it in a commercial project of a customer or your
own I'd appreciate a small donation.
========================================================
File: pi.banglautils.php
--------------------------------------------------------
Purpose: Truncates HTML to the specified length without
leaving open tags.
========================================================
THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF
ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT
LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS
FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO
EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE
FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN
AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE
OR OTHER DEALINGS IN THE SOFTWARE.
========================================================
*/


$plugin_info = array(  'pi_name' => 'BanglaUtils',
    'pi_version' => '2.0',
    'pi_author' => 'Mahmud Hasan',
    'pi_author_url' => 'http://sukumarray.freehostia.com',
    'pi_description' => 'Converts numbers or date into Bangla',
    'pi_usage' => banglautils::usage());

class Banglautils
{
    var $return_data;
	
	private $EE;
	private $timestamp; //timestamp as input
	private $morning; //when the date will change?
	private $engHour; //Current hour of English Date
	private $engDate; //Current date of English Date
	private $engMonth; //Current month of English Date
	private $engYear; //Current year of English Date
	private $bangDate; //generated Bangla Date
	private $bangMonth; //generated Bangla Month
	private $bangYear; //generated Bangla   Year

	private $bn_months = array('বৈশাখ', 'জ্যৈষ্ঠ', 'আষাঢ়', 'শ্রাবণ', 'ভাদ্র', 'আশ্বিন');
	private $bn_month_dates = array();
	

    function Banglautils()
    {
		$this->EE =& get_instance();
    }

	public function convertnumber(){
        $str = $this->EE->TMPL->tagdata;
		
		if(!is_numeric($str))
			$this->return_data = $str;
		else{
			$this->return_data = $this->bangla_number($str);
		}
		
		return $this->return_data;
	}
	
	public function convertdate(){
        $timestamp = strtotime($this->EE->TMPL->tagdata);
		$hour = 6;
		
		$this->engDate = date( 'd', $timestamp );
		$this->engMonth = date( 'm', $timestamp );
		$this->engYear = date( 'Y', $timestamp );
		$this->morning = $hour;
		$this->engHour = date( 'G', $timestamp );

		//calculate the bangla date
		$this->calculate_date();

		//now call calculate_year for setting the bangla year
		$this->calculate_year();

		//convert english numbers to Bangla
		$this->convert();
		
		$this->return_data = $this->bangDate . " " . $this->bangMonth . ", " . $this->bangYear;
		
		return $this->return_data;
	}
	
	
	private function calculate_date() {
        //when English month is January
        if ( $this->engMonth == 1 ) {
            if ( $this->engDate == 1 ) { //Date 1
                if ( $this->engHour >= $this->morning ) {
                    $this->bangDate = $this->engDate + 17;
                    $this->bangMonth = "পৌষ";
                } else {
                    $this->bangDate = $this->engDate + 16;
                    $this->bangMonth = "পৌষ";
                }
            } else if ( $this->engDate < 14 && $this->engDate > 1 ) { // Date 2-13
                if ( $this->engHour >= $this->morning ) {
                    $this->bangDate = $this->engDate + 17;
                    $this->bangMonth = "পৌষ";
                } else {
                    $this->bangDate = $this->engDate + 16;
                    $this->bangMonth = "পৌষ";
                }
            } else if ( $this->engDate == 14 ) { //Date 14
                if ( $this->engHour >= $this->morning ) {
                    $this->bangDate = $this->engDate - 13;
                    $this->bangMonth = "মাঘ";
                } else {
                    $this->bangDate = 30;
                    $this->bangMonth = "পৌষ";
                }
            } else { //Date 15-31
                if ( $this->engHour >= $this->morning ) {
                    $this->bangDate = $this->engDate - 13;
                    $this->bangMonth = "মাঘ";
                } else {
                    $this->bangDate = $this->engDate - 14;
                    $this->bangMonth = "মাঘ";
                }
            }
        }


        //when English month is February
        else if ( $this->engMonth == 2 ) {
            if ( $this->engDate == 1 ) { //Date 1
                if ( $this->engHour >= $this->morning ) {
                    $this->bangDate = $this->engDate + 18;
                    $this->bangMonth = "মাঘ";
                } else {
                    $this->bangDate = $this->engDate + 17;
                    $this->bangMonth = "মাঘ";
                }
            } else if ( $this->engDate < 13 && $this->engDate > 1 ) { // Date 2-12
                if ( $this->engHour >= $this->morning ) {
                    $this->bangDate = $this->engDate + 18;
                    $this->bangMonth = "মাঘ";
                } else {
                    $this->bangDate = $this->engDate + 17;
                    $this->bangMonth = "মাঘ";
                }
            } else if ( $this->engDate == 13 ) { //Date 13
                if ( $this->engHour >= $this->morning ) {
                    $this->bangDate = $this->engDate - 12;
                    $this->bangMonth = "ফাল্গুন";
                } else {
                    $this->bangDate = 30;
                    $this->bangMonth = "মাঘ";
                }
            } else { //Date 15-31
                if ( $this->engHour >= $this->morning ) {
                    $this->bangDate = $this->engDate - 12;
                    $this->bangMonth = "ফাল্গুন";
                } else {
                    $this->bangDate = $this->engDate - 13;
                    $this->bangMonth = "ফাল্গুন";
                }
            }
        }

        //when English month is March
        else if ( $this->engMonth == 3 ) {
            if ( $this->engDate == 1 ) { //Date 1
                if ( $this->engHour >= $this->morning ) {
                    if ( $this->is_leapyear() )
                        $this->bangDate = $this->engDate + 17;
                    else
                        $this->bangDate = $this->engDate + 16;
                    $this->bangMonth = "ফাল্গুন";
                }
                else {
                    if ( $this->is_leapyear() )
                        $this->bangDate = $this->engDate + 16;
                    else
                        $this->bangDate = $this->engDate + 15;
                    $this->bangMonth = "ফাল্গুন";
                }
            }
            else if ( $this->engDate < 15 && $this->engDate > 1 ) { // Date 2-13
                if ( $this->engHour >= $this->morning ) {
                    if ( $this->is_leapyear() )
                        $this->bangDate = $this->engDate + 17;
                    else
                        $this->bangDate = $this->engDate + 16;
                    $this->bangMonth = "ফাল্গুন";
                }
                else {
                    if ( $this->is_leapyear() )
                        $this->bangDate = $this->engDate + 16;
                    else
                        $this->bangDate = $this->engDate + 15;
                    $this->bangMonth = "ফাল্গুন";
                }
            }

            else if ( $this->engDate == 15 ) { //Date 14
                if ( $this->engHour >= $this->morning ) {
                    $this->bangDate = $this->engDate - 14;
                    $this->bangMonth = "চৈত্র";
                } else {
                    $this->bangDate = 30;
                    $this->bangMonth = "ফাল্গুন";
                }
            } else { //Date 15-31
                if ( $this->engHour >= $this->morning ) {
                    $this->bangDate = $this->engDate - 14;
                    $this->bangMonth = "চৈত্র";
                } else {
                    $this->bangDate = $this->engDate - 15;
                    $this->bangMonth = "চৈত্র";
                }
            }
        }

        //when English month is April
        else if ( $this->engMonth == 4 ) {
            if ( $this->engDate == 1 ) { //Date 1
                if ( $this->engHour >= $this->morning ) {
                    $this->bangDate = $this->engDate + 17;
                    $this->bangMonth = "চৈত্র";
                } else {
                    $this->bangDate = $this->engDate + 16;
                    $this->bangMonth = "চৈত্র";
                }
            } else if ( $this->engDate < 14 && $this->engDate > 1 ) { // Date 2-13
                if ( $this->engHour >= $this->morning ) {
                    $this->bangDate = $this->engDate + 17;
                    $this->bangMonth = "চৈত্র";
                } else {
                    $this->bangDate = $this->engDate + 16;
                    $this->bangMonth = "চৈত্র";
                }
            } else if ( $this->engDate == 14 ) { //Date 14
                if ( $this->engHour >= $this->morning ) {
                    $this->bangDate = $this->engDate - 13;
                    $this->bangMonth = "বৈশাখ";
                } else {
                    $this->bangDate = 30;
                    $this->bangMonth = "চৈত্র";
                }
            } else { //Date 15-31
                if ( $this->engHour >= $this->morning ) {
                    $this->bangDate = $this->engDate - 13;
                    $this->bangMonth = "বৈশাখ";
                } else {
                    $this->bangDate = $this->engDate - 14;
                    $this->bangMonth = "বৈশাখ";
                }
            }
        }


        //when English month is May
        else if ( $this->engMonth == 5 ) {
            if ( $this->engDate == 1 ) { //Date 1
                if ( $this->engHour >= $this->morning ) {
                    $this->bangDate = $this->engDate + 17;
                    $this->bangMonth = "বৈশাখ";
                } else {
                    $this->bangDate = $this->engDate + 16;
                    $this->bangMonth = "বৈশাখ";
                }
            } else if ( $this->engDate < 15 && $this->engDate > 1 ) { // Date 2-14
                if ( $this->engHour >= $this->morning ) {
                    $this->bangDate = $this->engDate + 17;
                    $this->bangMonth = "বৈশাখ";
                } else {
                    $this->bangDate = $this->engDate + 16;
                    $this->bangMonth = "বৈশাখ";
                }
            } else if ( $this->engDate == 15 ) { //Date 14
                if ( $this->engHour >= $this->morning ) {
                    $this->bangDate = $this->engDate - 14;
                    $this->bangMonth = "জ্যৈষ্ঠ";
                } else {
                    $this->bangDate = 31;
                    $this->bangMonth = "চৈত্র";
                }
            } else { //Date 16-31
                if ( $this->engHour >= $this->morning ) {
                    $this->bangDate = $this->engDate - 14;
                    $this->bangMonth = "জ্যৈষ্ঠ";
                } else {
                    $this->bangDate = $this->engDate - 15;
                    $this->bangMonth = "জ্যৈষ্ঠ";
                }
            }
        }


        //when English month is June
        else if ( $this->engMonth == 6 ) {
            if ( $this->engDate == 1 ) { //Date 1
                if ( $this->engHour >= $this->morning ) {
                    $this->bangDate = $this->engDate + 17;
                    $this->bangMonth = "জ্যৈষ্ঠ";
                } else {
                    $this->bangDate = $this->engDate + 16;
                    $this->bangMonth = "জ্যৈষ্ঠ";
                }
            } else if ( $this->engDate < 15 && $this->engDate > 1 ) { // Date 2-14
                if ( $this->engHour >= $this->morning ) {
                    $this->bangDate = $this->engDate + 17;
                    $this->bangMonth = "জ্যৈষ্ঠ";
                } else {
                    $this->bangDate = $this->engDate + 16;
                    $this->bangMonth = "জ্যৈষ্ঠ";
                }
            } else if ( $this->engDate == 15 ) { //Date 15
                if ( $this->engHour >= $this->morning ) {
                    $this->bangDate = $this->engDate - 14;
                    $this->bangMonth = "আষাঢ়";
                } else {
                    $this->bangDate = 31;
                    $this->bangMonth = "জ্যৈষ্ঠ";
                }
            } else { //Date 15-31
                if ( $this->engHour >= $this->morning ) {
                    $this->bangDate = $this->engDate - 14;
                    $this->bangMonth = "আষাঢ়";
                } else {
                    $this->bangDate = $this->engDate - 15;
                    $this->bangMonth = "আষাঢ়";
                }
            }
        }


        //when English month is July
        else if ( $this->engMonth == 7 ) {
            if ( $this->engDate == 1 ) { //Date 1
                if ( $this->engHour >= $this->morning ) {
                    $this->bangDate = $this->engDate + 16;
                    $this->bangMonth = "আষাঢ়";
                } else {
                    $this->bangDate = $this->engDate + 15;
                    $this->bangMonth = "আষাঢ়";
                }
            } else if ( $this->engDate < 16 && $this->engDate > 1 ) { // Date 2-15
                if ( $this->engHour >= $this->morning ) {
                    $this->bangDate = $this->engDate + 16;
                    $this->bangMonth = "আষাঢ়";
                } else {
                    $this->bangDate = $this->engDate + 15;
                    $this->bangMonth = "আষাঢ়";
                }
            } else if ( $this->engDate == 16 ) { //Date 16
                if ( $this->engHour >= $this->morning ) {
                    $this->bangDate = $this->engDate - 15;
                    $this->bangMonth = "শ্রাবণ";
                } else {
                    $this->bangDate = 31;
                    $this->bangMonth = "আষাঢ়";
                }
            } else { //Date 17-31
                if ( $this->engHour >= $this->morning ) {
                    $this->bangDate = $this->engDate - 15;
                    $this->bangMonth = "শ্রাবণ";
                } else {
                    $this->bangDate = $this->engDate - 16;
                    $this->bangMonth = "শ্রাবণ";
                }
            }
        }


        //when English month is August
        else if ( $this->engMonth == 8 ) {
            if ( $this->engDate == 1 ) { //Date 1
                if ( $this->engHour >= $this->morning ) {
                    $this->bangDate = $this->engDate + 16;
                    $this->bangMonth = "শ্রাবণ";
                } else {
                    $this->bangDate = $this->engDate + 15;
                    $this->bangMonth = "শ্রাবণ";
                }
            } else if ( $this->engDate < 16 && $this->engDate > 1 ) { // Date 2-15
                if ( $this->engHour >= $this->morning ) {
                    $this->bangDate = $this->engDate + 16;
                    $this->bangMonth = "শ্রাবণ";
                } else {
                    $this->bangDate = $this->engDate + 15;
                    $this->bangMonth = "শ্রাবণ";
                }
            } else if ( $this->engDate == 16 ) { //Date 16
                if ( $this->engHour >= $this->morning ) {
                    $this->bangDate = $this->engDate - 15;
                    $this->bangMonth = "ভাদ্র";
                } else {
                    $this->bangDate = 31;
                    $this->bangMonth = "শ্রাবণ";
                }
            } else { //Date 15-31
                if ( $this->engHour >= $this->morning ) {
                    $this->bangDate = $this->engDate - 15;
                    $this->bangMonth = "ভাদ্র";
                } else {
                    $this->bangDate = $this->engDate - 16;
                    $this->bangMonth = "ভাদ্র";
                }
            }
        }


        //when English month is September
        else if ( $this->engMonth == 9 ) {
            if ( $this->engDate == 1 ) { //Date 1
                if ( $this->engHour >= $this->morning ) {
                    $this->bangDate = $this->engDate + 16;
                    $this->bangMonth = "ভাদ্র";
                } else {
                    $this->bangDate = $this->engDate + 15;
                    $this->bangMonth = "ভাদ্র";
                }
            } else if ( $this->engDate < 16 && $this->engDate > 1 ) { // Date 2-15
                if ( $this->engHour >= $this->morning ) {
                    $this->bangDate = $this->engDate + 16;
                    $this->bangMonth = "ভাদ্র";
                } else {
                    $this->bangDate = $this->engDate + 15;
                    $this->bangMonth = "ভাদ্র";
                }
            } else if ( $this->engDate == 16 ) { //Date 14
                if ( $this->engHour >= $this->morning ) {
                    $this->bangDate = $this->engDate - 15;
                    $this->bangMonth = "আশ্বিন";
                } else {
                    $this->bangDate = 31;
                    $this->bangMonth = "ভাদ্র";
                }
            } else { //Date 15-31
                if ( $this->engHour >= $this->morning ) {
                    $this->bangDate = $this->engDate - 15;
                    $this->bangMonth = "আশ্বিন";
                } else {
                    $this->bangDate = $this->engDate - 16;
                    $this->bangMonth = "আশ্বিন";
                }
            }
        }


        //when English month is October
        else if ( $this->engMonth == 10 ) {
            if ( $this->engDate == 1 ) { //Date 1
                if ( $this->engHour >= $this->morning ) {
                    $this->bangDate = $this->engDate + 15;
                    $this->bangMonth = "আশ্বিন";
                } else {
                    $this->bangDate = $this->engDate + 14;
                    $this->bangMonth = "আশ্বিন";
                }
            } else if ( $this->engDate < 16 && $this->engDate > 1 ) { // Date 2-15
                if ( $this->engHour >= $this->morning ) {
                    $this->bangDate = $this->engDate + 15;
                    $this->bangMonth = "আশ্বিন";
                } else {
                    $this->bangDate = $this->engDate + 14;
                    $this->bangMonth = "আশ্বিন";
                }
            } else if ( $this->engDate == 16 ) { //Date 14
                if ( $this->engHour >= $this->morning ) {
                    $this->bangDate = $this->engDate - 15;
                    $this->bangMonth = "কার্তিক";
                } else {
                    $this->bangDate = 30;
                    $this->bangMonth = "আশ্বিন";
                }
            } else { //Date 17-31
                if ( $this->engHour >= $this->morning ) {
                    $this->bangDate = $this->engDate - 15;
                    $this->bangMonth = "কার্তিক";
                } else {
                    $this->bangDate = $this->engDate - 16;
                    $this->bangMonth = "কার্তিক";
                }
            }
        }


        //when English month is November
        else if ( $this->engMonth == 11 ) {
            if ( $this->engDate == 1 ) { //Date 1
                if ( $this->engHour >= $this->morning ) {
                    $this->bangDate = $this->engDate + 16;
                    $this->bangMonth = "কার্তিক";
                } else {
                    $this->bangDate = $this->engDate + 15;
                    $this->bangMonth = "কার্তিক";
                }
            } else if ( $this->engDate < 15 && $this->engDate > 1 ) { // Date 2-14
                if ( $this->engHour >= $this->morning ) {
                    $this->bangDate = $this->engDate + 16;
                    $this->bangMonth = "কার্তিক";
                } else {
                    $this->bangDate = $this->engDate + 15;
                    $this->bangMonth = "কার্তিক";
                }
            } else if ( $this->engDate == 15 ) { //Date 14
                if ( $this->engHour >= $this->morning ) {
                    $this->bangDate = $this->engDate - 14;
                    $this->bangMonth = "অগ্রাহায়ণ";
                } else {
                    $this->bangDate = 30;
                    $this->bangMonth = "কার্তিক";
                }
            } else { //Date 15-31
                if ( $this->engHour >= $this->morning ) {
                    $this->bangDate = $this->engDate - 14;
                    $this->bangMonth = "অগ্রহায়ণ";
                } else {
                    $this->bangDate = $this->engDate - 15;
                    $this->bangMonth = "অগ্রহায়ণ";
                }
            }
        }


        //when English month is December
        else if ( $this->engMonth == 12 ) {
            if ( $this->engDate == 1 ) { //Date 1
                if ( $this->engHour >= $this->morning ) {
                    $this->bangDate = $this->engDate + 16;
                    $this->bangMonth = "অগ্রহায়ণ";
                } else {
                    $this->bangDate = $this->engDate + 15;
                    $this->bangMonth = "অগ্রহায়ণ";
                }
            } else if ( $this->engDate < 15 && $this->engDate > 1 ) { // Date 2-14
                if ( $this->engHour >= $this->morning ) {
                    $this->bangDate = $this->engDate + 16;
                    $this->bangMonth = "অগ্রহায়ণ";
                } else {
                    $this->bangDate = $this->engDate + 15;
                    $this->bangMonth = "অগ্রহায়ণ";
                }
            } else if ( $this->engDate == 15 ) { //Date 14
                if ( $this->engHour >= $this->morning ) {
                    $this->bangDate = $this->engDate - 14;
                    $this->bangMonth = "পৌষ";
                } else {
                    $this->bangDate = 30;
                    $this->bangMonth = "অগ্রহায়ণ";
                }
            } else { //Date 15-31
                if ( $this->engHour >= $this->morning ) {
                    $this->bangDate = $this->engDate - 14;
                    $this->bangMonth = "পৌষ";
                } else {
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

    private function is_leapyear() {
        if ( $this->engYear % 400 == 0 || ($this->engYear % 100 != 0 && $this->engYear % 4 == 0) )
            return true;
        else
            return false;
    }

    /*
     * Calculate the Bangla Year
     */

    private function calculate_year() {
        if ( $this->engMonth >= 4 ) {
            if ( $this->engMonth == 4 && $this->engDate < 14 ) { //1-13 on april when hour is greater than 6
                $this->bangYear = $this->engYear - 594;
            } else if ( $this->engMonth == 4 && $this->engDate == 14 && $this->engHour <= 5 ) {
                $this->bangYear = $this->engYear - 594;
            } else if ( $this->engMonth == 4 && $this->engDate == 14 && $this->engHour >= 6 ) {
                $this->bangYear = $this->engYear - 593;
            }
            /* else if($this->engMonth == 4 && ($this->engDate == 14 && $this->engDate) && $this->engHour <=5) //1-13 on april when hour is greater than 6
              {
              $this->bangYear = $this->engYear - 593;
              }
             */
            else
                $this->bangYear = $this->engYear - 593;
        }
        else
            $this->bangYear = $this->engYear - 594;
    }

    /*
     * Convert the English character to Bangla
     *
     * @param int any integer number
     * @return string as converted number to bangla
     */

    private function bangla_number( $int ) {
        $engNumber = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 0);
        $bangNumber = array('১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯', '০');

        $converted = str_replace( $engNumber, $bangNumber, $int );
        return $converted;
    }

    /*
     * Calls the converter to convert numbers to equivalent Bangla number
     */

    private function convert() {
        $this->bangDate = $this->bangla_number( $this->bangDate );
        $this->bangYear = $this->bangla_number( $this->bangYear );
    }

	
    /*
     * Returns the calculated Bangla Date
     *
     * @return array of converted Bangla Date
     */

    function get_date() {
        return array($this->bangDate, $this->bangMonth, $this->bangYear);
    }
	
    // ----------------------------------------
    //  Plugin Usage
    // ----------------------------------------
    // This function describes how the plugin is used.
    //  Make sure and use output buffering
    function usage()
    {
        ob_start();
        ?>
Example:
----------------
{exp:banglautils:convertDate}
	{date}
{/exp:banglautils:convertDate}

{exp:banglautils:convertNumber}
	{number}
{/exp:banglautils:convertNumber}

Parameters:
----------------
None

----------------
CHANGELOG:

2.0
* 1st version for EE 2.0
* 2nd version for EE 2.0




        <?php
        $buffer = ob_get_contents();
        ob_end_clean();
        return $buffer;
    }
      /* END */

}
/* END Class */
/* End of file pi.trunchtml.php */
/* Location: ./system/expressionengine/third_party/trunchtml/pi.trunchtml.php */
