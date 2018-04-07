<?php require("index-head.php"); ?>
	
		<h2>OCFFLAG</h2>

		<?php
			
			$files = array_reverse(glob("ocfflag/archive/*.php"));
			
			$filecount = 0;
			if ($files){
 				$filecount = count($files);
			}
			
			if ($filecount == 0){
				echo "<h3>".$lang['EMPTY_ARCHIVE']."</h3>";
			} else {
				// echo "<h3>".$game['flagname']."</h3>";
				
				echo "<ul>";
				
				$protocol = $_SERVER['HTTPS'] == '' ? 'http://' : 'https://';
				$folder = $protocol . $_SERVER['HTTP_HOST']  .dirname($_SERVER['PHP_SELF'])."/ocfflag/";
								
				foreach($files AS $file){
					require($file);
					// Das mit dem "../" ist ein Trick. Da die index-archive.php ein Verzeichnis drüber ist, hat der Dateiname den falschen Pfad.
                    //                                                       VVV
					echo '<li><a href="'.$folder.'singlematch.php?gamefile=../'.$file.'">'.$game['ts_game_started'].' ['.$game['flagname'].']'.'</a></li>';
				}
				echo "</ul>";
			}		
	?> 

<?php require("index-foot.php"); ?>