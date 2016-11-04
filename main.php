
<?php 
include 'functions.php';

$xml = new SimpleXMLElement('lista.xml', null, true);


//pinginf oll from lista.xml
pinglist($xml);

//print to log only blank line to separate every pinglist call
$log = 'pinglog.txt';
$current = file_get_contents($log);
$current .=   " \n";
file_put_contents($log, $current);

?>

