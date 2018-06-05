<?php

# Não existe um método de logout no OAuth 2.0.
# Apenas remova o cookie e/ou session do access token do Linkedin para efetuar o logout

#
# boot
#
require "boot.php";

session_destroy();

echo "<p><a href='$home/'>Retornar ao indice</a></p>";