<?
if(!$action){
    $members_files = db_qr_fetch("select count(id) as count from members_files");
    print "<br>";
    print_admin_table("<center><b> „·›«   ‰ Ÿ— «·„Ê«›ﬁ… : <b> <a href='index.php?action=members_files'>$members_files[count]</a></center>");
}

//----------------------------

if($action=="members_files" || $action=="members_files_del" || $action=="members_files_accept"){
   
   //--------- accpt -------------- 
    if($action=="members_files_accept"){
  
        db_query("insert into mobile_data (name,url,img,details,date,cat,userid) values('$name','$url','$img','$details',now(),'$cat','$userid')");
        db_query("delete from members_files where id='$id'");
    }
    //---- del ----
    if($action=="members_files_del"){
        $data = db_qr_fetch("select url,img from members_files where id='$id'");
        @unlink(CWD . "/" .$data['url']);
        @unlink(CWD . "/" .$data['img']);
        db_query("delete from members_files where id='$id'");
    }
    
print "<p align=center class=title> „·›«   ‰ Ÿ— «·„Ê«›ﬁ… </p>";
$qr=db_query("select * from members_files order by id desc");
if(db_num($qr)){
    print "<center><table width=99% class=grid>";
    while($data=db_fetch($qr)){
        
        $data_user = db_qr_fetch("select id,username from mobile_members where id='$data[userid]'");
        $data_cat = db_qr_fetch("select id,name,type from mobile_cats where id='$data[cat]'");
        
        print "<tr>
        <td><a href='index.php?action=member_edit&id=$data_user[id]'>$data_user[username]</a></td>
        <td>$data[name]</td>
         <td>$data_cat[name] [$data_cat[type]]  </td> 
        <td>$data[date]</td>
        <td><a href='index.php?action=members_files_details&id=$data[id]'>  ›«’Ì· \ „Ê«›ﬁ…</a></td><td><a href='index.php?action=members_files_del&id=$data[id]' onClick=\"return confirm('are you sure ?');\">Õ–›</td></tr>";
    }
    print "</table></center>";
}else{
print_admin_table("<center> ·«  ÊÃœ „·›«  </center>");
}    
}

//-------------------------------
if($action=="members_files_details"){
    $qr=db_query("select * from members_files where id='$id'");
    if(db_num($qr)){
        $data=db_fetch($qr);
        print "
        <form action=index.php method=post>
        <input type=hidden name=id value='$id'>  
        <input type=hidden name=action value='members_files_accept'>
        <input type=hidden name=userid value='$userid'>
        <table width=100% class=grid>
        <tr><td colspan=2 align=center><img src=\"../".get_image($data['img'])."\"></td></tr>
        
        <tr>
    <td><b> «”„ «·„·›  : </b> </td><td><input type=text name='name' value=\"$data[name]\" size=30></td></tr>   
    <td><b> —«»ÿ «·„·› : </b> </td><td><input type=text name=url value=\"$data[url]\" size=40 dir=ltr></td></tr>
     <td><b> ’Ê—… «·„·› : </b> </td><td><input type=text name=img value=\"$data[img]\" size=40 dir=ltr></td></tr> 
      <td><b> Ê’› «·„·› : </b> </td><td><textarea cols=40 rows=5 name=details>$data[details]</textarea></td></tr>   
      
       <td><b> «·ﬁ”„ : </b> </td><td><select name=cat>";
    $qr=db_query("select * from mobile_cats  order by cat asc");
    while($data = db_fetch($qr)){
    $data_cat = db_qr_fetch("select name from mobile_cats where id='$data[cat]'");
    
    print "<option value='$data[id]'".iif($data['id']==$data['cat']," selected").">".iif($data_cat['name'],"$data_cat[name] -> ")."$data[name]</option>";
    }
    print "</select></td></tr>
    
     <tr><td colspan=2 align=center><input type=submit value=' ﬁ»Ê· «·„·› '></td></tr>
        <tr><td colspan=2 align=left><a href='index.php?action=members_files_del&id=$data[id]' onClick=\"return confirm('are you sure ?');\">Õ–› «·„·›</a></td></tr>  
        </table>
        </form>";
    }else{
        print_admin_table("<center>wrong url</center>");
    }
}