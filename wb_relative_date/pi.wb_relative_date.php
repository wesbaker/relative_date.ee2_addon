<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// include config file
include PATH_THIRD.'wb_relative_date/config'.EXT;

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
		load_language($diff,$valid_date);
		if ($diff > 0) {
			if ($diff < 60) {
				return $this->EE->lang->line('wb_relative_second');
			}
			$diff = round($diff / 60);
			
			if ($diff < 60) {
				return $this->EE->lang->line('wb_relative_minute');
			}
			$diff = round($diff / 60);
			
			if ($diff < 24) {
				return $this->EE->lang->line('wb_relative_hour');
			}
			$diff = round($diff / 24);
			
			if ($diff < 7) {
				return $this->EE->lang->line('wb_relative_day');
			}
			$diff = round($diff / 7);
			
			if ($diff < 4) {
				return $this->EE->lang->line('wb_relative_week');
			}
			
			return "on " . date("F j, Y", strtotime($valid_date));
		} else {
			if ($diff > -60) {
				return $this->EE->lang->line('wb_relative_in_second');
			}
			$diff = round($diff / 60);
			
			if ($diff > -60) {
				return $this->EE->lang->line('wb_relative_in_minute');
			}
			$diff = round($diff / 60);
			
			if ($diff > -24) {
				return $this->EE->lang->line('wb_relative_in_hour');
			}
			$diff = round($diff / 24);
			
			if ($diff > -7) {
				return $this->EE->lang->line('wb_relative_in_day');
			}
			$diff = round($diff / 7);
			
			if ($diff > -4) {
				return $this->EE->lang->line('wb_relative_in_week');
			}	
			
			return $this->EE->lang->line('wb_relative_date');
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
