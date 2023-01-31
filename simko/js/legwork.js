(function(){

var pathname = window.location.pathname

if(pathname === '/legwork-test-two/') {
    document.cookie = "UTM_CONTENT=Test2Content;";
    document.cookie = "UTM_SOURCE=Test2Source;";
    document.cookie = "UTM_MEDIUM=Test2Medium;";
    document.cookie = "UTM_TERM=Test2Term;";
    document.cookie = "UTM_CAMPAIGN=Test2Campaign";
}
if(pathname === '/legwork-test-four/') {
    document.cookie = "UTM_CONTENT=TEST4Content;";
    document.cookie = "UTM_SOURCE=Test4Source;";
    document.cookie = "UTM_MEDIUM=Test4Medium;";
    document.cookie = "UTM_TERM=Test4Term;";
    document.cookie = "UTM_CAMPAIGN=Test4Campaign";

    $('#189').on('click', '.btn', function(e) {
        e.preventDefault();
    })
}

})()