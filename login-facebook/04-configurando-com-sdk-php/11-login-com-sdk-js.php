<html>
    <body>

        <p><a href="#" onClick="logInWithFacebook()">Log In with the JavaScript SDK</a></p>

        <!-- App id do Facebook -->
        <script type="text/javascript" src="../app-id.js"></script>

        <script>
            window.fbAsyncInit = function() {
                FB.init({
                    appId: app_id,
                    cookie: true, // This is important, it's not enabled by default
                    version: 'v3.0'
                });
                FB.AppEvents.logPageView();
            };

            logInWithFacebook = function() {
                FB.login(function(response) {
                    if (response.authResponse) {
                        // Now you can redirect the user or do an AJAX request to
                        // a PHP script that grabs the signed request from the cookie.
                        window.location = "12-access-token-sdk-js.php";
                    } else {
                        alert('User cancelled login or did not fully authorize.');
                    }
                });
                return false;
            };

            (function(d, s, id){
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) {return;}
                js = d.createElement(s); js.id = id;
                js.src = "https://connect.facebook.net/pt_BR/sdk.js";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));
        </script>
    </body>
</html>