<?php

require "app/boot.php";

if (!isset($_SESSION['accessToken'])) {
    echo "<p>O accessToken não foi encontrado!</p>";
    echo "<p><a href='04-carregar-nome.php'>Carregar nome</a></p>";
    echo "<p><a href='$url/'>Retornar</a></p>";
    exit;
}

$accessToken = $_SESSION['accessToken'];

# remove o objeto accessToken
unset($_SESSION['accessToken']);

// Log in
echo "<h3>Access Token</h3>";
echo $accessToken->getValue();

// The OAuth 2.0 client handler helps us manage access tokens
$oAuth2Client = $fb->getOAuth2Client();

// Get the access token metadata from /debug_token
$tokenMetadata = $oAuth2Client->debugToken($accessToken);
echo '<h3>Metadata</h3>';
var_dump($tokenMetadata);

// Validation (these will throw FacebookSDKException's when they fail)
$tokenMetadata->validateAppId($app_id); // Replace {app-id} with your app id
// If you know the user ID this access token belongs to, you can validate it here
//$tokenMetadata->validateUserId('123');
$tokenMetadata->validateExpiration();

if (! $accessToken->isLongLived()) {
  // Exchanges a short-lived access token for a long-lived one
  try {
    $accessToken = $oAuth2Client->getLongLivedAccessToken($accessToken);
  } catch (Facebook\Exceptions\FacebookSDKException $e) {
    echo "<p>Error getting long-lived access token: " . $helper->getMessage() . "</p>\n\n";
    exit;
  }

  echo '<h3>Long-lived</h3>';
  var_dump($accessToken->getValue());
}

# adiciona o valor do Access Token (usuário conectado com o Facebook)
$_SESSION['fbAccessToken'] = (string) $accessToken;

echo "<p><a href='04-carregar-nome.php'>Carregar nome</a></p>";
echo "<p><a href='$url/'>Retornar</a></p>";