<?

if(!defined("CUR_FILENAME")){
        die("You can't access file directly ... ");
}


//------------------------------- Events -------------------
  if($action=="events"){
  $id = intval($id);


  $qr = db_query("select * from events_data where id='$id'");
  if(db_num($qr)){
  while($data = db_fetch($qr)){
  open_table("$data[name]");
  print "$data[day]/$data[month]/$data[year] <br> $data[content]";
  close_table();
  }

  }else{  	open_table();
  	print "<center>$phrases[event_not_exists]</center>";
  	close_table();
  	}
}
//------------------------------- Events browse-------------------
  if($action=="browse_events"){

 if($d && $m && $y){
  $qr = db_query("select * from events_data where day='$d' and month='$m' and year='$y'");
  }else{  	$qr = db_query("select * from events_data order by id desc");  	}
  if(db_num($qr)){
  while($data = db_fetch($qr)){

  open_table("$data[name]");
  print "$data[day]/$data[month]/$data[year] <br> $data[content]";
  close_table();
  }

  }else{
  	open_table();
  	print "<center>  $phrases[no_events] </center>";
  	close_table();
  	}
}
  ?>