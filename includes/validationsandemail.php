<?php
// define variables and set to empty values
// $nameErr = $emailErr = $genderErr = $websiteErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
        $nameErr = "Please enter Name";
    } else {
        $name = test_input($_POST["name"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
            $nameErr = "Only letters and white space allowed";
        }
    }

    if (empty($_POST["email"])) {
        $emailErr = "Please enter Email";
    } else {
        $email = test_input($_POST["email"]);
        // check if e-mail address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }

    if (empty($_POST["website"])) {
        $websiteErr = "Enter website URL";
    } else {
        $website = test_input($_POST["website"]);
        // check if URL address syntax is valid
        if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
            $websiteErr = "Invalid URL";
        }
    }

    if (empty($_POST["comment"])) {
    } else {
        $comment = test_input($_POST["comment"]);
    }

    if (empty($_POST["gender"])) {
        $genderErr = "Gender is required";
    } else {
        $gender = test_input($_POST["gender"]);
    }

    if (!defined("PHP_EOL")) define("PHP_EOL", "\r\n");

    $name     = $_POST['name'];
    $email    = $_POST['email'];
    $phone   = $_POST['phone'];
    $website   = $_POST['website'];
    $subject  = $_POST['subject'];
    $comments = $_POST['comments'];
    $verify   = $_POST['verify'];

    $address = "nikithavontari@gmail.com";

    // Configuration option.
    $e_subject = 'You\'ve been contacted by ' . $name . '.';
    $e_body = "You have been contacted by $name , the message is as follows." . PHP_EOL . PHP_EOL;
    $e_content = "Comments: \"$comments\" , Phone number: \"$phone\" , Website: \"$website\" " . PHP_EOL . PHP_EOL;
    $e_reply = "You can contact $name via email, $email";

    $msg = wordwrap( $e_body . $e_content . $e_reply, 70 );

    $headers = "From: $email" . PHP_EOL;
    $headers .= "Reply-To: $email" . PHP_EOL;
    $headers .= "MIME-Version: 1.0" . PHP_EOL;
    $headers .= "Content-type: text/plain; charset=utf-8" . PHP_EOL;
    $headers .= "Content-Transfer-Encoding: quoted-printable" . PHP_EOL;
    if(!(strlen($nameErr) || strlen($emailErr) || strlen($websiteErr)) > 0)
    {
        if(mail($address, $e_subject, $msg, $headers)) {
            $emailSubmissionSuccess = "Thank you <strong>$name</strong>, your message has been submitted to us, provided you have given valid email address!";
        } else {
            $emailSubmissionErr = "ERROR, please retry again or contact admin!";
        }
    }

}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>