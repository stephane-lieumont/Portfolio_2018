
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="FR-fr">
<head>
    <meta http-equiv="Content-type" content="text/html; charset=UTF-8"/>
    <title>Pixmodels.com</title>
</head>
<body style="background:#FFF;padding-top:50px; ">

<div align="center" >
    <table width="674" cellpadding="0" cellspacing="0" border="0" style="background:#ccc; border-bottom:3px solid #1abc9c">
		<tr>
            <td width="674" height="100" align="center" ><img alt="banniere" src="<?php echo 'http://'.$_SERVER['HTTP_HOST']; ?>/Images/Mail-bannere.png" height="100" width="674"></td>
        </tr>
    </table>
    <table width="674" cellpadding="0" cellspacing="0" border="0">
	    <tr>
            <td colspan="4" height="30"></td>
        </tr>
        <tr>
            <td width="61"></td>
            <td width="440" valign="top"
                style="font-size:14px;color:#707070;font-family:Arial,Helvetica,sans-serif;text-align:left;">
                <span style="margin-top:20px;font-size:26px;color:#1abc9c">Informations Contact</span><br/><br/>
				<span>Message de la part de <b><?php echo "<b>".$nom."</b>"; ?></b></span><br/><br/>
				<span><b>Mail :</b> <?php echo "<b>".$email."</b>"; ?></span><br/>
				<span><b>Sujet :</b> <?php echo"<b>".$sujet."</b>"; ?></span><br/><br/>
            </td>
            <td valign="top" align="right">
            </td>
            <td width="35">&nbsp;</td>
        </tr>
        <tr>
            <td></td>
            <td colspan="2" align="left" style="font-size:14px;font-family:Arial,Helvetica,sans-serif;color:#707070;">
                <br/>
                <strong style="font-size:16px;">Message: </strong><br/><br/>
				<span style="font-size:14px;">
					<?php echo $message; ?>
                </span><br/><br/>
                <span style="font-size:12px;">
                    Messagerie auto de portfolio.sli-3d.fr<br/><br/>
                </span>
            </td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td colspan="2" align="left"
                style="font-size:12px;font-family:Arial,Helvetica,sans-serif; padding:10px; color:#DDD"><br/>
                Ce message vous est adressé automatiquement. Nous vous remercions de ne pas répondre, ni
                d'utiliser cette adresse email.<br/>
                ATTENTION : Ce message est strictement confidentiel. Son intégrité n'est pas assurée
                sur Internet. Si vous n'êtes pas destinataire du message, merci de le détruire.<br/>
            </td>
        </tr>
    </table>
    <br/><br/>
</div>
</body>
</html>

