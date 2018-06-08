//
// configurando o SDK Facebook
//
window.fbAsyncInit = function() {
    FB.init({
        appId      : app_id,
        cookie     : true,
        xfbml      : true,
        version    : 'v3.0'
    });
    FB.AppEvents.logPageView();
};


//
// load SDK Facebook
//
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
