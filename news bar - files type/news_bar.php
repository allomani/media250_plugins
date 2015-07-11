<?
include "global.php" ;
print "<META http-equiv=Content-Type content=\"text/html; charset=windows-1256\"> \n";
print "<LINK href=\"style.css\" type=text/css rel=StyleSheet>   \n";
$type_name = "news" ;
$qr = db_query("select mobile_data.* from mobile_data,mobile_cats where mobile_cats.type='$type_name' and mobile_data.cat=mobile_cats.id order by mobile_data.id DESC limit 20");

 print "
    <marquee onmouseover=\"this.stop()\"
    onmouseout=\"this.start()\" scrollAmount=\"5\" scrollDelay=\"0\" direction=right   width=\"100%\">"    ;

    while($data = db_fetch($qr))
    {

            print " &nbsp&nbsp&nbsp <a href='details_$data[id].html' target='_blank'>$data[name]</a> &nbsp&nbsp&nbsp ** ";
            }

            print "</marquee>";

            ?>