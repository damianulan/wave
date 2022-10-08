function setCookie(name,value,days) {
    var expires = "";
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days*24*60*60*1000));
        expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + (value || "")  + expires + "; path=/";
 }
function sidebarToggleAll(){
        $('#sidebar').toggleClass('menu-collapsed');
        $('#topbar').toggleClass('menu-collapsed');
        $('#main').toggleClass('menu-collapsed');
        var menuCollapsed = $('#sidebar').hasClass('menu-collapsed');
        setCookie('menu-collapsed', menuCollapsed, 30);
}
    $('#menu-toggle').click(function(){
        sidebarToggleAll();
    });

