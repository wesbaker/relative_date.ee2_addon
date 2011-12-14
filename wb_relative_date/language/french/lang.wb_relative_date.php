<?php

setlocale(LC_ALL,'fr-FR');

$lang = array(
'wb_relative_second' => 'il y a ' . $diff . ' second' . $this->_plural($diff),
'wb_relative_minute' => 'il y a ' . $diff . ' minute' . $this->_plural($diff),
'wb_relative_hour' => 'il y a ' . $diff . ' heure' . $this->_plural($diff),
'wb_relative_day' => 'il y a environ ' . $diff . ' jour' . $this->_plural($diff),
'wb_relative_week' => 'il y a environ ' . $diff . ' semaine' . $this->_plural($diff),

'wb_relative_in_second' => 'dans ' . -$diff . ' second' . $this->_plural($diff),
'wb_relative_in_minute' => 'dans ' . -$diff . ' minute' . $this->_plural($diff),
'wb_relative_in_hour' => 'dans ' . -$diff . ' heure' . $this->_plural($diff),
'wb_relative_in_day' => 'dans ' . -$diff . ' jour' . $this->_plural($diff),
'wb_relative_in_week' => 'dans ' . -$diff . ' semaine' . $this->_plural($diff),

'wb_relative_date' => 'le ' . date('j F Y', strtotime($valid_date)),

// END
''=>''
);

?>