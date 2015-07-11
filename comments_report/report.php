<?
include "global.php" ;
 $id=intval($id);
$admin_email = "info@allomani.com";
 
$cookie_name = "report_".$id."_added";



//---------------- set vote expire ------------------------
if($id){

   if(!$HTTP_COOKIE_VARS[$cookie_name]){
  setcookie($cookie_name, "1" , time() + (24 * 60 * 60),"/");
  }
        }
//------------------------------------------------------------

print "<html dir='$settings[html_dir]'>";

print "<META http-equiv=Content-Language content=\"$settings[site_pages_lang]\">
<META http-equiv=Content-Type content=\"text/html; charset=$settings[site_pages_encoding]\">
<LINK href='css.php' type=text/css rel=StyleSheet>";

print "<title>  »·Ì€ </title>";

open_table();


 if(!$HTTP_COOKIE_VARS[$cookie_name]){
if($id && $cid){
    
    $cid = (int) $cid;
    $id = (int) $id;
    
    
$data=db_qr_fetch("select * from mobile_files_comments where id='$cid'");

$msg = "«·„·› : <a href=\"$scripturl/details_".$id.".html\">$scripturl/details_".$id.".html</a>";
$msg .= "<br><br>-----------------------<br>";
$msg .= "<br> $data[content] <br>";
$msg .= "<br>-----------------------<br>";
   
$mailResult = send_email($sitename,$mailing_email,$admin_email," »·Ì€",$msg,$settings['mailing_default_use_html'],$settings['mailing_default_encoding']);


print "<center>  „  »·Ì€ «·«œ«—… , ‘ﬂ—« ·ﬂ </center>";
}else{
        print "<center> —«»ÿ Œ«ÿÌ¡ </center>";
}

}else{
print "<center>  ·« Ì„ﬂ‰ﬂ «· »·Ì€ ⁄‰ „·› «·« ﬂ· 24 ”«⁄… </center>";

        }
close_table();