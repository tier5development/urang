<?
//input cleanup function
function santisize($string){
	$string=htmlentities( $string, ENT_QUOTES, "UTF-8" );
	return $string;
}
//end of function

//verify login
function verifyLogin($login,$password){
	$login=santisize(stripslashes(trim($login)));
	$password=santisize(stripslashes(trim($password)));
	//$sql=mysql_query("select * from ".PREFIX."admin where login='$login' AND password=aes_encrypt('$password','iamtheboogeyman')");
	$qry = "select * from ".PREFIX."admin where login='$login' AND `password`='$password'";
	$sql=mysql_query($qry);
	if (mysql_num_rows($sql)==1)
		return "success";
	else 
		return "";
}
//end of function

//get password
function getPassword($login,$email){
	$login=santisize(stripslashes(trim($login)));
	$email=santisize(stripslashes(trim($email)));
	$sql=mysql_query("select aes_decrypt(password,'iamtheboogeyman') as decrypted from ".PREFIX."admin where login='$login' AND email='$email'");
	if (mysql_num_rows($sql)==1)
		return mysql_result($sql,0,"decrypted");
	else 
		return "";
}
//end of function

//email password
function sendPassword($login,$email,$password){
	$login=stripslashes($login); // receiver login
	$to=$email; // receiver email
	$site_email=getname("site_email",PREFIX."config",1,1); //site email
	$site_title=getname("site_title",PREFIX."config",1,1); // site title
	$site_url=getname("site_url",PREFIX."config",1,1); // site title
	$from="From:".$site_title."<".$site_email.">"; // sender email
	$subject="Your Password";  //email subject
		
	$body='Dear '.$login.',
	
Here is your account password. Please keep it in a safe place.

Password: '.$password.'

Regards,
'.$site_title.'

This email has been sent from '.$site_url;
	if (mail($to,$subject,$body,$from))
		return "sent";
	else
		 return "";
}
//end of function

//email password
function sendLoginInfo($email,$password,$type){
	if ($type=="ukcoaches")
		$login=getname("fname",PREFIX."ukcoaches","email",$email)." ".getname("lname",PREFIX."ukcoaches","email",$email);// receiver name
	if ($type=="uscoaches")
		$login=getname("fname",PREFIX."uscoaches","email",$email)." ".getname("lname",PREFIX."uscoaches","email",$email);// receiver name
	if ($type=="players")
		$login=getname("fname",PREFIX."players","email",$email)." ".getname("sname",PREFIX."players","email",$email);// receiver name
	$to=$email; // receiver email
	$password=stripslashes($password); // receiver password	
	$site_email=getname("site_email",PREFIX."config",1,1); //site email
	$site_title=getname("site_title",PREFIX."config",1,1); // site title
	$site_url=getname("site_url",PREFIX."config",1,1); // site title
	$from="From:".$site_title."<".$site_email.">"; // sender email
	$subject="Your Password";  //email subject
		
	$body='Dear '.$login.',
	
Here is your account password. Please keep it in a safe place.

Password: '.$password.'

Regards,
'.$site_title.'

This email has been sent from '.$site_url;
	if (mail($to,$subject,$body,$from))
		return "sent";
	else
		 return "";
}
//end of function

//email registration
function registerationEmail($email){
	$site_email=getname("site_email",PREFIX."config",1,1); //site email
	$site_title=html_entity_decode(getname("site_title",PREFIX."config",1,1)); // site title
	$site_url=getname("site_url",PREFIX."config",1,1); // site title
	$from="From:".$site_title."<".$site_email.">"; // sender email
	$subject="Thank you for registering your wedding";  //email subject
	$body=html_entity_decode(getname("registration_message",PREFIX."config",1,1));
	$body=str_replace("[SITE TITLE]",$site_title,$body);
	$body=str_replace("[SITE URL]",$site_url,$body);		
		
	if (mail($email,html_entity_decode($subject),html_entity_decode($body),$from))
		return "sent";
	else
		 exit;
}
//end of function

//get name
function getname($field,$table,$id,$value){
	$sql=mysql_query("select $field from $table where $id='$value'");
	
    if (mysql_num_rows($sql)>0)
		return mysql_result($sql,0,$field);
	else
		return "";
}
//end of function

//get decrypted value
function get_decrypted_value($field,$table,$id,$value){
	//$sql=mysql_query("select aes_decrypt($field,'iamtheboogeyman') as decrypted from $table where $id='$value'");
	$sql=mysql_query("select $field as decrypted from $table where $id='$value'");
	if (mysql_num_rows($sql)>0)
		return mysql_result($sql,0,"decrypted");
	else
		return "";
}
//end of function

//get number of records
function no_of_records($table,$id=1,$value=1){
	$sql=mysql_query("select * from $table where $id='$value'"); 
	return mysql_num_rows($sql);
}
//end of function	

//get dropdown
function dropdown($select,$value,$option,$table,$order,$sort,$id=1,$idvalue=1,$opt=""){ 
	$sql=mysql_query("select $value,$option from $table where $id='$idvalue' order by $order $sort");
	$dropdown.='<select name="'.$select.'" id="'.$select.'" '.$opt.'><option value="">Select</option>';
	if (mysql_num_rows($sql)>0){ 
		for ($a=0;$a<mysql_num_rows($sql);$a++){
			$dropdown.='<option value="'.mysql_result($sql,$a,$value).'">'.mysql_result($sql,$a,$option).'</option>';
		}
		$dropdown.='</select>'; 
		return $dropdown;
	}	
	else{
		$dropdown.='</select>';
		return $dropdown;
	}
}
//end of function	
//get dropdown
function dropdown1($select,$value,$option,$table,$order,$sort,$id=1,$idvalue=1,$opt=""){ 
	$sql=mysql_query("select $value,$option from $table where $id='$idvalue' order by $order $sort");
	$dropdown.='<select name="'.$select.'" id="'.$select.'" '.$opt.'><option value="">Select</option><option value="N/A">Does Not Matter</option>';
	if (mysql_num_rows($sql)>0){ 
		for ($a=0;$a<mysql_num_rows($sql);$a++){
			$dropdown.='<option value="'.mysql_result($sql,$a,$value).'">'.strip_tags(html_entity_decode(mysql_result($sql,$a,$option))).'</option>';
		}
		$dropdown.='</select>'; 
		return $dropdown;
	}	
	else{
		$dropdown.='</select>';
		return $dropdown;
	}
}
//end of function
//get dropdown
function dropdown2($select,$value,$option,$table,$order,$sort,$id=1,$idvalue=1,$opt=""){ 
	$sql=mysql_query("select $value,$option from $table where $id='$idvalue' order by $order $sort");
	$dropdown.='<select name="'.$select.'" id="'.$select.'" '.$opt.'><option value="">Select</option><option value="N/A">I Don\'t Know</option>';
	if (mysql_num_rows($sql)>0){ 
		for ($a=0;$a<mysql_num_rows($sql);$a++){
			$dropdown.='<option value="'.mysql_result($sql,$a,$value).'">'.strip_tags(html_entity_decode(mysql_result($sql,$a,$option))).'</option>';
		}
		$dropdown.='</select>'; 
		return $dropdown;
	}	
	else{
		$dropdown.='</select>';
		return $dropdown;
	}
}
//end of function	

//remove the slashes added by functions such as magic_quotes_gpc and mysql_escape_string
function remove_slashes($query) {
	$data = explode("\\",$query);
    $cleaned = implode("",$data);
    return $cleaned;
}
//end of function
   function isValidURL($url)
     {
        return preg_match('|^http(s)?://[a-z0-9-]+(.[a-z0-9-]+)*(:[0-9]+)?(/.*)?$|i', $url);
    }
	  function isValidFAX($num)
     {
        return preg_match('	/^(+|-)?\d+$/', $num);
    }
        function valid_email($str)
        {
                return ( ! preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $str)) ? FALSE : TRUE;
        }
function getRecord($table,$where="")
            {
       
       $sql = "SELECT * FROM `".PREFIX."$table` $where";
        $sql=mysql_query($sql);
        while ($record = mysql_fetch_array($sql,1)) {
        $rett[]=$record;
        }
        return $rett;
    }
    
    
      
function extract_numbers($string)
{
        preg_match_all('/([\d]+)/', $string, $match);
        $t=$match[0];
        return $t;
}


function cropImage($nw, $nh, $source, $stype, $dest) {
	$size = getimagesize($source);
	$w = $size[0];
	$h = $size[1];
	
	if($stype=='image/gif'){
		$simg = imagecreatefromgif($source);
	}else if($stype=='image/jpg' || $stype=='image/jpeg' || $stype=='image/pjpeg'){
		$simg = imagecreatefromjpeg($source);
	}else if($stype=='image/png' || $stype=='image/x-png'){
		$simg = imagecreatefrompng($source);
	}
	
	$dimg = imagecreatetruecolor($nw, $nh);
	$wm = $w/$nw;
	$hm = $h/$nh;
	$h_height = $nh/2;
	$w_height = $nw/2;
	if($w> $h) {
		$adjusted_width = $w / $hm;
		$half_width = $adjusted_width / 2;
		$int_width = $half_width - $w_height;
		imagecopyresampled($dimg,$simg,-$int_width,0,0,0,$adjusted_width,$nh,$w,$h);
	} elseif(($w <$h) || ($w == $h)) {
		$adjusted_height = $h / $wm;
		$half_height = $adjusted_height / 2;
		$int_height = $half_height - $h_height;
		imagecopyresampled($dimg,$simg,0,-$int_height,0,0,$nw,$adjusted_height,$w,$h);
	} else {
		imagecopyresampled($dimg,$simg,0,0,0,0,$nw,$nh,$w,$h);
	}
	imagejpeg($dimg,$dest,100);
	
}
function CropImg($origin_path,$file_type,$dest_path)
{
        $dest_path=$dest_path;
		$max_width="86";
		$max_height="70";
		$file_type=$file_type;
		
		//Calling "cropImage" function
		cropImage($max_width, $max_height, $origin_path, $file_type, $dest_path);
		
		if (file_exists($uploadfile)){
			unlink ($uploadfile);
		}			

}
function CropBanner($origin_path,$file_type,$dest_path)
{
        $dest_path=$dest_path;
		$max_width="228";
		$max_height="234";
		$file_type=$file_type;
		
		//Calling "cropImage" function
		cropImage($max_width, $max_height, $origin_path, $file_type, $dest_path);
		
		if (file_exists($uploadfile)){
			unlink ($uploadfile);
		}			
}

//getField function to get fields from database directly
function getField($table, $leftField, $rightField, $getField, $sqlVars = "", $returnThis = "")
{
	$sql = "SELECT $getField from $table where $leftField = $rightField $sqlVars";
	if($result = mysql_query($sql))
	{
		if(mysql_num_rows($result)>0)
		{
			return mysql_result($result,0,$getField);
		}
		else
		{
			return "";
		}
	}
	else
	{
		if($returnThis!='')
		{
			echo "<strong>MYSQL ERROR</strong>:<br /><strong>SQL QUERY:</strong> $sql<br /><strong>SQL ERROR:</strong> ".mysql_error();
		}
		else
		{
			return $returnThis;
		}
	}
}


?>