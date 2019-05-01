global.auth = false;
global.onRequest = false;
global.isAuthenticated = function()
{
    $.post('api/usr/login', {
        execution: 'is_logged_in'
    }, function(r){
        regAuth(r)
    }, 'json')
}

function regAuth(r)
{
    auth = r.res;
}
global.requestRelease = function(){
    setTimeout(function(){
        onRequest = false;
    }, 300)
}