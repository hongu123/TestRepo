<?php
    $connect=mysql_connect( "localhost", "hyunho80", "qweasd123", "hyunho80") or
        die( "SQL server에 연결할 수 없습니다.");
     
    //mysql_query("set session character_set_connection=utf8;");
    //mysql_query("set session character_set_results=utf8;");
    //mysql_query("set session character_set_client=utf8;");


   mysql_select_db("hyunho80",$connect);
 
	//mysql_query("set names euckr");
mysql_query("set names utf8");
 
   session_start();
 
 
   $sql = "select * from user_app";
 
 
   $result = mysql_query($sql, $connect);
 
 
   $total_record = mysql_num_rows($result);
 
 
   echo "{\"status\":\"OK\",\"num_results\":\"$total_record\",\"results\":[";
 
 
   for ($i=0; $i < $total_record; $i++)
   {
 
      mysql_data_seek($result, $i);
 
      $row = mysql_fetch_array($result);
   echo "{\"NAME\":\"$row[name]\",\"ADDRESS\":\"$row[address]\"}";
 
 
   if($i<$total_record-1){
      echo ",";
   }
 
   }
 
   echo "]}";
?>