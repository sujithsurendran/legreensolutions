<?php
	$strERR = "";
	$strMSG = "";

	if (isset($_POST['submit']) && $_POST['submit'] == "Submit") {
		if (trim($_POST['txtname']) == "") {
			$strERR = "Please enter your name, to submit the message";
		}
		elseif (trim($_POST['txtcontent']) == "") {
			$strERR .= "Please enter the message/question to submit";
		}
		if ($strERR == "") {
			// Send a mail to the Administrator, about the new question/contact request
			$strTo = "legreensolutions@yahoo.com";
			$strFrom = "mail@legreensolutions.com";
			// To send HTML mail, the Content-type header must be set
			$headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			// Additional headers
			$headers .= 'From: Le Green Solutions <'.$strFrom.'>'."\r\n";
			$strSubject="Message/Question from LeGreens website";
			$strMailbody = "<br><br>
			Name : " . htmlentities(trim($_POST['txtname'])) . "<br>
			Address: " . htmlentities(trim($_POST['txtaddress'])) . "<br><br>
			Phone: " . htmlentities(trim($_POST['txtphone'])) . "<br><br>
			Email: " . htmlentities(trim($_POST['txtemail'])) . "<br><br>
			Subject: " . htmlentities(trim($_POST['txtsubject'])) . "<br><br>
			Message : " . htmlentities(nl2br(trim($_POST['txtcontent']))) . "<br>
			<br><br>
			";
			// Send the mail to the receipient
			mail ($strTo, $strSubject, $strMailbody, $headers);

			$strMSG = "Thank you for contacting us. Your message is recorded.";
		}
	}
?>


<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>


<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>LeGreenSolutions :: Contact Us</title>
<link href="css/style.css" rel="stylesheet" type="text/css">
<link rel="shortcut icon" href="http://legreensolutions.com/images/favicon.ico">

  <script language="JavaScript" type="text/JavaScript">   <!--
    function Trim(strInput) {
    while (true) {
        if (strInput.substring(0, 1) != " ")
            break;
        strInput = strInput.substring(1, strInput.length);
    }
    while (true) {
        if (strInput.substring(strInput.length - 1, strInput.length) != " ")
            break;
        strInput = strInput.substring(0, strInput.length - 1);
    }
   return strInput;
}

    function validate_form(){
        error = "";
        if(document.getElementById("txtname").value==""){
            error = "Name can't be Empty \n";
        }
        if(document.getElementById("txtemail").value==""){
            error += "Email can't be Empty \n";
        }
        if(document.getElementById("txtsubject").value==""){
            error += "Subject can't be Empty \n";
        }
        if(document.getElementById("txtcontent").value==""){
            error += "Your Message can't be Empty\n";
        }
        if ( error != "" ){
            alert(error);
            document.getElementById("txtname").focus();
            return false;
        }else{
            return true;
        }
    }
    --></script>



</head><body>
<div id="topPanel">
<ul>
<li class="active" > Contact Us </li>
<li><a href="clients.html"> Clients </a></li>
<li><a href="services.html"> Services </a></li>
<li ><a href="index.html">Home</a></li>
</ul>
<a
href="http://legreensolutions.com"><img
 src="images/logo.jpg" title="Drop in by our Open Source labs" alt="LeGreenSolutions" height="80" width="230" border="0"></a>
<div id="headerPanelcontactus">
	<h2>Contact Us</h2>
	<p>LeGreenSolutions <br>
    Suvas, Ground Floor<br>
    Thammanam, Kochi - 682 032<br>
	Kerala, India
	<a href="mailto:mail@legreensolutions.com">mail@legreensolutions.com</a></div>
</p>
</div>
<div id="bodyPanel">






            <form  target="_self" method="post" action="/contactus.php" name="frmcontact">
                <table cellspacing="5" border="0" cellpadding="0" align="center">
                <tbody>
                <tr>
                    <td colspan="2" align="center">
<?php
					if ($strMSG != "") {
						echo "<div style=\"color: #7dd300; font-size: 14px;\">" . $strMSG . "<br></div>";
					}
					elseif ($strERR != "") {
						echo "<div style=\"color: red; font-size: 14px;\">" . $strERR . "<br></div>";
					}
				?>
                    </td>
                </tr>
                <tr>
                    <td valign="bottom" align="left"  ><b>Name : </b></td>
                    <td valign="top" align="left">
                    <input style="width:300px;" type="text" name="txtname" id="txtname" value="" >

                    </td>
                </tr>
                <tr>
                    <td align="left" ><b>Address : </b></td>
                    <td valign="top" align="left">
                    <input style="width:300px;"  type="text" name="txtaddress" id="txtaddress" >
                    </td>
                </tr>

                <tr>
                    <td align="left" ><b>Phone : </b></td>
                    <td valign="top" align="left">
                    <input style="width:300px;"  type="text" name="txtphone" id="txtphone" ></td>
                </tr>
                <tr>
                    <td align="left" ><b>Email : </b></td>
                    <td valign="top" align="left">

                    <input style="width:300px;"  type="text" name="txtemail" id="txtemail" ></td>
                </tr>
                <tr>
                    <td align="left" ><b>Subject : </b></td>
                    <td valign="top" align="left">
                    <input style="width:300px;"  type="text" name="txtsubject" id="txtsubject" ></td>
                </tr>
                <tr>

                    <td valign="top"  colspan="2" align="left" ><b>Your Message :</b></td>
                </tr>


                <tr>


                    <td colspan="2" align="center">
                    <textarea style="width:380px;" rows="6" name="txtcontent" id="txtcontent" ></textarea></td>
                </tr>

                <tr>
                    <td colspan="2" align="center">
                            <input src="images/contactus/send.png"value="Submit" type="image" name="submit" onClick="return validate_form();" />
                            <input name="h_id" value="" type="hidden">

                    </td>
                </tr>
                </tbody>
                </table>
            </form>




</div>
<div id="footerPanel">
  <div id="footerbodyPanel">
  <ul>
  <li><a href="index.html"> Home </a>| </li>
  <li><a href="services.html"> Services </a>| </li>
  <li><a href="clients.html"> Clients </a> | </li>
  <li><a href="contactus.php"> Contact Us </a>  </li>
  </ul>
  <p class="copyright">© LeGreenSolutions all right reaserved</p>
  <ul class="templateworld">
  	<li>Design By:</li>
	<li><a href="http://www.templateworld.com/" target="_blank">Template
World</a></li>
  </ul>
   <div id="footerhtmlPanel"><a
href="http://validator.w3.org/check?uri=referer" target="_blank">html</a></div>
   <div id="footercssPanel"><a
href="http://jigsaw.w3.org/css-validator/check/referer" target="_blank">css</a></div>
  </div>
</div>
</body></html>

