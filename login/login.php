<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>discussdesk.com - Login form in PHP mysql</title>
<meta name="description" content=""/>
<meta name="keywords" content=""/>
<link href="login/style.css" rel="stylesheet" type="text/css">

</head>
<body>

	<form name="frmregister"action="<?= $_SERVER['PHP_SELF'] ?>" method="post" >
		<table class="form" border="0">

			<tr>
			<td></td>

			</tr> 
			
			<tr>
				<th><label for="name"><strong>Name:</strong></label></th>
				<td><input class="inp-text" name="name" id="name" type="text" size="30" /></td>
			</tr>
			<tr>
				<th><label for="name"><strong>Password:</strong></label></th>
				<td><input class="inp-text" name="password" id="password" type="password" size="30" /></td>
			</tr>
			<tr>
			<td></td>
				<td class="submit-button-right">
				<input class="send_btn" type="submit" value="Submit" alt="Submit" title="Submit" />
				
				<input class="send_btn" type="reset" value="Reset" alt="Reset" title="Reset" /></td>
				
			</tr>
		</table>
	</form>

<div style="line-height: 30px; margin-left: 307px;"><b>Name:</b> discussdesk <br/>  <b>Password:</b> discussdesk</div>
<div style="line-height: 30px; margin-left: 207px;">For More Info: <a href="http://www.discussdesk.com">Visit our Website</a></div>

</body>
</html>
