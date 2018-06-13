<?php

require "../app-facebook/boot.php";

$redirect = $home . "/12-linkedin-token.php";

$state = "Qualquer-valor-para-conferencia";

$url = "https://www.linkedin.com/oauth/v2/authorization?"
     . "response_type=code&"
     . "client_id={$client_id}&"
     . "redirect_uri={$redirect}&"
     . "state={$state}&"
     . "scope={$permissions}";

echo "$url";
header("Location: $url");
