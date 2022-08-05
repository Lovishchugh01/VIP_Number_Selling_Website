<?php

session_start();
if(!isset($_SESSION['email']) || $_SESSION['email'] == "")
{
    header("Location: login.php");
}
require_once "../connection.php";

if(isset($_POST["Import"])){

$arrFileName = explode('.',$_FILES['file']['name']);
if($arrFileName[1] == 'csv'){

		$filename=$_FILES["file"]["tmp_name"];	
        $category = $_POST['category'];	
        $vip_section = $_POST['vip_section'];
 
		 if($_FILES["file"]["size"] > 0)
		 {
		  	$file = fopen($filename, "r");
	        while (($getData = fgetcsv($file)) !== FALSE)
	         {
	             if($getData[0] != "Name")
	             {
					// $today = date('y.m.d');
					$sql = "INSERT INTO `number` (`id`, `cat_name`, `number`,`vip_section`,`prize`) 
			   		VALUES (NULL,'".$category."','".$getData[0]."','".$vip_section."','".$getData[1]."')";
                   $result = mysqli_query($conn, $sql);
				if(!isset($result))
				{
					echo "<script type=\"text/javascript\">
							alert(\"Invalid File:Please Upload CSV File.\");
							window.location = \"uploadCSV.php\"
						  </script>";		
				}
				else {
					  echo "<script type=\"text/javascript\">
						alert(\"CSV File has been successfully Imported.\");
						window.location = \"uploadCSV.php\"
					</script>";
				}
	             }
	         }
			
	         fclose($file);	
		 }
	}	else { echo "<script type=\"text/javascript\">
							alert(\"Invalid File:Please Upload CSV File.\");
							window.location = \"uploadCSV.php\"
						  </script>"; }
}	
?>