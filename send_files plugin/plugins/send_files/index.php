<?
//----- send file -----//
if($action=="send_file"){
    
    $cats_types = "('video','clip','game','app','theme','voice')" ;
    
    
    $cat=intval($cat);
    
    open_table("«—”«· „·›");
    
    if(check_member_login()){
    print "
    <form action=\"index.php\" method=\"post\" enctype=\"multipart/form-data\">
    <input name=action value='send_file_ok' type=hidden>
    <table width=100%>
    <tr>
    <td><b> «”„ «·„·›  : </b> </td><td><input type=text name='name' size=30></td></tr>   
    <td><b> «·„·› : </b> </td><td><input type=file name=datafile></td></tr>
     <td><b> ’Ê—… «·„·› : </b> </td><td><input type=file name=img_datafile></td></tr> 
     
     
         
    <tr><td><b>«ﬁ’Ï ÕÃ„ ··—›⁄ :</b> </td><td>";
    $upload_max = convert_number_format(ini_get('upload_max_filesize'));
$post_max = (convert_number_format(ini_get('post_max_size'))/2) ;


if($upload_max || $post_max){
print iif($upload_max < $post_max,convert_number_format($upload_max,2,true),convert_number_format($post_max,2,ture))." ";
}else{
    print "Invalid";
}

print "</td></tr>
<tr><td><b> «·«‰Ê«⁄ «·„”„ÊÕ —›⁄Â« </b></td><td>".strtoupper(implode("  ",$upload_types))."</td></tr>
   <td><b> Ê’› «·„·› : </b> </td><td><textarea cols=40 rows=5 name=details></textarea></td></tr>   
    <td><b> «·ﬁ”„ : </b> </td><td><select name=cat>";
    $qr=db_query("select * from mobile_cats where type IN $cats_types order by cat asc");
    while($data = db_fetch($qr)){
    $data_cat = db_qr_fetch("select name from mobile_cats where id='$data[cat]'");
    
    print "<option value='$data[id]'".iif($data['id']==$cat," selected").">".iif($data_cat['name'],"$data_cat[name] -> ")."$data[name]</option>";
    }
    print "</select></td></tr>
    <tr><td colspan=2 align=center><input type=submit value=' «÷«›… '></td></tr>
    </form>
    </table>";
    }else{
        print "<center> Ì—ÃÏ  ”ÃÌ· «·œŒÊ·  </center>";
    }
    close_table();
}

//----------------------------
if($action=="send_file_ok"){
    $cat=intval($cat);
    
 open_table("«—”«· „·›");
  if(check_member_login()){ 
  
  if($_FILES['datafile']['name']){
 $userid=$member_data['id'];
  
   $upload_folder = $settings['uploader_path']."/members_files" ; 
           
      if(!$upload_folder || !file_exists(CWD ."/$upload_folder")){
     print("<center>$phrases[err_wrong_uploader_folder]</center>");
   
      }else{

 require_once(CWD. "/includes/class_save_file.php");  
      
   
$imtype = strtolower(file_extension($_FILES['datafile']['name']));

if(in_array($imtype,$upload_types)){   
    
$fl = new save_file($_FILES['datafile']['tmp_name'],$upload_folder,$_FILES['datafile']['name']);

if($fl->status){
    
$saveto_filename =  $fl->saved_filename;   

//--------- img ----------------//
if($_FILES['img_datafile']['name']){
$img_upload_types = array('gif','jpg','png','bmp');
$img_imtype = strtolower(file_extension($_FILES['img_datafile']['name']));

if(in_array($img_imtype,$img_upload_types)){
$fl = new save_file($_FILES['img_datafile']['tmp_name'],$upload_folder,$_FILES['img_datafile']['name']);

if($fl->status){
$img_saved =  $fl->saved_filename;      
}else{
    $img_warn =1;
}    
}else{
    $img_warn = 1;
}
}
//-------------------------------//


db_query("insert into members_files (name,url,img,details,userid,cat,date) values ('".db_clean_string($name)."','$saveto_filename','$img_saved','".db_clean_string($details)."','$userid','$cat',now())");
print "<center> ‘ﬂ—« ·ﬂ , ·ﬁœ  „ «—”«· «·„·› »‰Ã«Õ Ê ”Ê›  ﬁÊ„ «·«œ«—… »„—«Ã⁄ Â ›Ì «ﬁ—» Êﬁ  „„ﬂ‰ </center>";
}else{
print("<center>".$fl->last_error_description."</center>");
die();    
}
}else{
    print "<center> ‰Ê⁄ «·„·› €Ì— „”„ÊÕ »Â </center>";
}
      }
  }else{
      print "<center>  ·„ Ì „ «Œ Ì«— «·„·› </center>";
  }
  }else{
        print "<center> Ì—ÃÏ  ”ÃÌ· «·œŒÊ·  </center>";
    }
close_table();
}
?>