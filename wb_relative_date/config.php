<?php

/**
 * WB Relative Date config file
 * 
 * Get a relative date
 *
 * @package			WBRelativeDate
 * @version			1.0.1
 * @author			Wes Baker <http://wesbaker.com>
 * @license 		Creative Commons Attribution Non-Commercial Share Alike
 */

 function in_object($val, $obj){

    if($val == ""){
        trigger_error("in_object expects parameter 1 must not empty", E_USER_WARNING);
        return false;
    }
    if(!is_object($obj)){
        $obj = (object)$obj;
    }

    foreach($obj as $key => $value){
        if(!is_object($value) && !is_array($value)){
            if($value == $val){
                return true;
            }
        }else{
            return in_object($val, $value);
        }
    }
    return false;
}
 
 $accepted_languages = array("en" => "english", "fr" => "french");
 foreach($obj as $key => $value){
 	$short_lang = $key;
	$lang_dir = $value;
 }
 
 if(strlen($this->EE->config->item("site_short_name")) == 2 || in_object($this->EE->config->item("site_short_name"),$accepted_languages)) {
		$language = $this->EE->config->item("site_short_name");
 } else {
 	$language = explode(';',$_SERVER['HTTP_ACCEPT_LANGUAGE']);
	$language = $lang[1];
 }
 function load_language($diff) {
 	include PATH_THIRD.'wb_relative_date/language/'.$lang_dir.'/lang.wb_relative_date.php';
 }
		
