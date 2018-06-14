//
//
//
$("#btn-facebook").on('click', function (event) {
    event.preventDefault();

    FB.login( function(resp) {
        console.log("popup_login(): ", resp);
        if (resp.status == "connected") {
            window.location = "01-facebook-token.php";
        } else {
            $("#error-div").show();
            $("#error-div").append("O acesso ao Facebook não foi autorizado!");
        }
    // },
    // permissões para visualizar informação
    }, {scope: 'public_profile,email'});
});

//
//
//
$("#btn-linkedin").on('click', function (event) {
    event.preventDefault();
    window.location = "11-linkedin-login.php";
});

window.fbAsyncInit = function() {
    FB.init({
        appId      : app_id,
        cookie     : true,
        xfbml      : true,
        version    : 'v3.0'
    });
    FB.AppEvents.logPageView();

    // checa o status do login pelo access_token
    FB.getLoginStatus(function(response) {
        // imprime na tela o status da conexão com o Facebook
        console.log("getLoginStatus():", response);
    });
};

//
//
//
$("#btn-facebook-disconect").on('click', function (event) {
    event.preventDefault();

    FB.api("/me/permissions", "DELETE", function (resp) {
        console.log(resp);
        window.location = "desvincular-facebook.php";
    });
});

(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) {return;}

    js = d.createElement(s); js.id = id;
    // sdk padrão em português
    js.src = "https://connect.facebook.net/pt_BR/sdk.js";

    // sdk com debug em português
    // js.src = "https://connect.facebook.net/pt_BR/sdk/debug.js";

    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
