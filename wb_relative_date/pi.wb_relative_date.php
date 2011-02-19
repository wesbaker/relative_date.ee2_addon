<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$plugin_info = array(
	'pi_name' => 'WB Relative Date',
	'pi_version' => '1.0.1',
	'pi_author' => 'Wes Baker',
	'pi_author_url' => 'http://wesbaker.com',
	'pi_description' => 'Convert normal dates into relative dates (e.g. about 2 days ago)',
	'pi_usage' => Wb_relative_date::usage()
);

/**
 * WB Relative Date
 * 
 * Get a relative date
 *
 * @package			WBRelativeDate
 * @version			1.0.1
 * @author			Wes Baker <http://wesbaker.com>
 * @license 		Creative Commons Attribution Non-Commercial Share Alike
 */
class Wb_relative_date{
	var $return_data;
	
	/**
	 * Constructor
	 */
	public function Wb_relative_date()
	{
		$this->EE =& get_instance();

		$date = trim($this->EE->TMPL->tagdata);
		
		$this->return_data = $this->_relative_time($date);
	}
	
	private function _relative_time($date) {
		$valid_date = (is_numeric($date) && strtotime($date) === FALSE) ? $date : strtotime($date);
		$diff = time() - $valid_date;
		if ($diff > 0) {
			if ($diff < 60) {
				return $diff . " second" . $this->_plural($diff) . " ago";
			}
			$diff = round($diff / 60);
			
			if ($diff < 60) {
				return $diff . " minute" . $this->_plural($diff) . " ago";
			}
			$diff = round($diff / 60);
			
			if ($diff < 24) {
				return $diff . " hour" . $this->_plural($diff) . " ago";
			}
			$diff = round($diff / 24);
			
			if ($diff < 7) {
				return "about " . $diff . " day" . $this->_plural($diff) . " ago";
			}
			$diff = round($diff / 7);
			
			if ($diff < 4) {
				return "about " . $diff . " week" . $this->_plural($diff) . " ago";
			}
			
			return "on " . date("F j, Y", strtotime($valid_date));
		} else {
			if ($diff > -60) {
				return "in " . -$diff . " second" . $this->_plural($diff);
			}
			$diff = round($diff / 60);
			
			if ($diff > -60) {
				return "in " . -$diff . " minute" . $this->_plural($diff);
			}
			$diff = round($diff / 60);
			
			if ($diff > -24) {
				return "in " . -$diff . " hour" . $this->_plural($diff);
			}
			$diff = round($diff / 24);
			
			if ($diff > -7) {
				return "in " . -$diff . " day" . $this->_plural($diff);
			}
			$diff = round($diff / 7);
			
			if ($diff > -4) {
				return "in " . -$diff . " week" . $this->_plural($diff);
			}	
			
			return "on " . date("F j, Y", strtotime($valid_date));
		}
	}

	private function _plural($num) {
		if ($num != 1) { return "s"; }
	}
	
	public function usage()
	{
		ob_start(); 
		?>
		
		Given a date (preferably a timestamp) it returns a relative date (e.g. 2 days ago).
		
		Example Usage
		-------------
		{exp:wb_relative_date}{entry_date}{/exp:wb_relative_date}
		
		<?php
		$buffer = ob_get_contents();
		ob_end_clean(); 
		return $buffer;
	}
}
