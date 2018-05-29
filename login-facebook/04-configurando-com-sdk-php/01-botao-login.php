<?php

require "app/boot.php";

$helper = $fb->getRedirectLoginHelper();

$permissions = ['email']; // Optional permissions
$loginUrl = $helper->getLoginUrl($url . "/02-access-token.php", $permissions);

echo '<a href="' . htmlspecialchars($loginUrl) . '">Log in with Facebook!</a>';
echo "<p><a href='$url/'>Retornar</a></p>";