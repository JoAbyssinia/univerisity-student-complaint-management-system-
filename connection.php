<?php

   $server = "localhost";
   $db="rvuscms";
   $user="root";
   $pass="";


   $con = mysqli_connect($server,$user,$pass,$db);
   if (!$con ) {
      
      echo "connction error";
   }

?>