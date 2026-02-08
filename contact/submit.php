<?php
$recipients = "ndiageze@gmail.com, m.kane@atlantis-geotechnique.fr";
$success = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $subject = trim($_POST['subject'] ?? '');
    $message = trim($_POST['message'] ?? '');

    $isValidEmail = filter_var($email, FILTER_VALIDATE_EMAIL);

    if ($name && $isValidEmail && $subject && $message) {
        $safeName = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
        $safeEmail = htmlspecialchars($email, ENT_QUOTES, 'UTF-8');
        $safeSubject = htmlspecialchars($subject, ENT_QUOTES, 'UTF-8');
        $safeMessage = htmlspecialchars($message, ENT_QUOTES, 'UTF-8');

        $mailSubject = "[Contact 3D] {$safeSubject}";
        $mailBody = "Nom: {$safeName}\nEmail: {$safeEmail}\n\nMessage:\n{$safeMessage}\n";
        $headers = "From: {$safeName} <{$safeEmail}>\r\n";
        $headers .= "Reply-To: {$safeEmail}\r\n";

        $success = mail($recipients, $mailSubject, $mailBody, $headers);
    }
}

if ($success) {
    header('Location: /contact/?success=1');
    exit;
}

header('Location: /contact/?error=1');
exit;
