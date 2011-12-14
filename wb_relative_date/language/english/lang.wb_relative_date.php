<?php

$lang = array(
'wb_relative_second' => $diff . " second" . $this->_plural($diff) . " ago",
'wb_relative_minute' => $diff . " minute" . $this->_plural($diff) . " ago",
'wb_relative_hour' => $diff . " hour" . $this->_plural($diff) . " ago",
'wb_relative_day' => "about " . $diff . " day" . $this->_plural($diff) . " ago",
'wb_relative_week' => "about " . $diff . " week" . $this->_plural($diff) . " ago",

'wb_relative_in_second' => "in " . -$diff . " second" . $this->_plural($diff),
'wb_relative_in_minute' => "in " . -$diff . " minute" . $this->_plural($diff),
'wb_relative_in_hour' => "in " . -$diff . " hour" . $this->_plural($diff),
'wb_relative_in_day' => "in " . -$diff . " day" . $this->_plural($diff),
'wb_relative_in_week' => "in " . -$diff . " week" . $this->_plural($diff),

'wb_relative_date' => "on " . date("F j, Y", strtotime($valid_date)),

// END
''=>''
);

?>