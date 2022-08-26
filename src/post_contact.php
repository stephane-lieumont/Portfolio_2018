<?php
require '_config.php';
require '_inc_class.php';

$validator = new Validator($_POST);
$validator->check('name', 'required', "Vous n'avez pas renseigné votre nom");
$validator->check('email', 'email', "Vous n'avez pas renseigné un email valide");
$validator->check('subject', 'required', "Vous n'avez pas renseigné le champ sujet");
$validator->check('message', 'required', "Vous n'avez pas renseigné votre message");
$errors = $validator->errors();

function isAjax(){
	return !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
}

function get_email($nom, $email, $sujet, $message){
    ob_start();
    include "_mail_contact.php";
    return ob_get_clean();
}

function Prepare_mail($nom, $email, $sujet, $message){
    $mess = get_email($nom, $email, $sujet, $message);
    $headers_mail  = 'MIME-Version: 1.0'                           ."\r\n";
    $headers_mail .= 'Content-type: text/html; charset=utf-8'      ."\r\n";
    $headers_mail .= 'From:contact@portfolio.sli-3d.fr';
    // Envoi du mail
    // mail(MAIL_DESTINATAIRE, 'Nouveau message de '.$nom, $mess, $headers_mail);
}

if(!empty($errors)){
	if(isAjax()){
	    echo json_encode($errors);
		header('Content-Type: application/json');
		http_response_code(400);
		die();
	}

	$_SESSION['errors'] = $errors;
	$_SESSION['inputs'] = $_POST;

	header('location: index.php#contact-stephane-lieumont-graphiste-3d');
}else{	
	$headers = 'FROM: '.$_POST['email'];
	
	if(isAjax()){
		echo json_encode(['envois' => "Le message est envoyé"]);
		header('Content-Type: application/json');
       Prepare_mail($_POST['nom'], $_POST['email'], $_POST['subject'], nl2br($_POST['message']));
		die();
	}

	$_SESSION['success'] = 1;
      Prepare_mail($_POST['nom'], $_POST['email'], $_POST['subject'], nl2br($_POST['message']));
	header('location: index.php#contact-stephane-lieumont-graphiste-3d');
}
?>