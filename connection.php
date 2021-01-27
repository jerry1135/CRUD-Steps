<?php

define('host', "localhost");
define('username', "root");
define('password', "");
define('dbname', "bhargav1");

$conn=mysqli_connect(host,username,password,dbname);

if ($conn!="") {

	//echo "Success";

           }

else

{

echo "Error in connection";

}

?>