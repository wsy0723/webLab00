<?php
$querystring = $_GET['querystring'];
$dbname = $_GET['dbname'];
		$db = new PDO("mysql:dbname=$querystring;", "root", "root");
		$rows = $db->query($dbname);
		foreach ($rows as $row) {
			$temparr=array();
			$temparr=$row;
			print_r($temparr);
			?>
			
			<?}
		
		?>