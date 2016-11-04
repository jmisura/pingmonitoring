<?php
// Ping Funkcija
// input var $ipaddress

 function ping($ipaddress)
{
	
	if (!$socket = @fsockopen($ipaddress, 80, $errno, $errstr, 30))
		{
  				return FALSE;
		}
			else 
		{
  				return TRUE;
  				fclose($socket);
		}		

}

// Send mail funkcija
// funkction fon sending mail if ser


// Ping Funkcija ping all computers in lista.xml
// input var $xml - new SimpleXMLElement
 function pinglist($xml)
 {
 		foreach($xml as $point)
		{
				
   				if (ping ($point->ipadress) == TRUE)
   				{
   					//print to log if ping pass
   					$log = 'pinglog.txt';
					$current = file_get_contents($log);
					$current .= "RADI " . date('d-m-Y h:i:s A') .' '. $point->pointName  . ' '. $point->location. ' ' . $point->ipadress. ' ' ." \n";
					file_put_contents($log, $current);
					echo $current;
				}
   	 	else if (ping ($point->ipadress) == FALSE)
				{						
					//print to log	if ping do not pass
					$log = 'pinglog.txt';
					$current = file_get_contents($log);
					$current .= "NE RADI " . date('d-m-Y h:i:s A') .' '. $point->pointName  . ' '. $point->location. ' ' . $point->ipadress. ' ' ." \n";
					file_put_contents($log, $current);
					echo $current;
					
					// Send a mail with worning that some computer/server is not ping accessible
					//sendMail($current, $xml);
				}
		sleep(5);	
 		}
 }






?>