<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
	<head>    
		<meta charset="UTF-8">
		<meta http-equiv="x-ua-compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title></title> 
	</head>
	<body>
  <table cellpadding="0" cellspacing="0" border="0" width="600" style="background-color:#fff;margin:0 auto;width:525px;">
      <tr>
	    <td align="center" style="border-collapse:collapse";>
        <table cellpadding="0" cellspacing="0" border="0" width="100%" style="background-color:#1f99be">
	    <tr>
	      <td align="center" height="200" style="margin:0; padding:0;" >
		  <img style="display:block;" src="{{ URL::to('/') }}/public/images/apparelad.png" alt="apparelad">
		  </td>
	    </tr>
	   </table>
	   <table cellpadding="0" cellspacing="0" border="0" width="100%" style="background-color:#ecf0f5; padding:35px 25px;">
	   <tr>
	    <td style="height:100%;margin:0;padding:0;color:#968080;line-height:22px;font-size:16px;font-family:Times New Roman;">
		<p style="margin:0;">
		<strong style="color:#000;">Dear Admin,</strong><br>
		 You have got a new request from {{$name}} <br><br>
		 Name : {{$name}} <br><br>
		 Email : {{$email}} <br><br>
		 Comments :	 {{$comments}} 
		</p>
		</td>
		</tr>
 </table>
		</td>
	  
  </table>
  

	</body>
</html>