function logout() {
    var endpoint = 'backend/reset_login.php';

    var jqxhr = $.post(endpoint,
            function() {
                //alert("success");
            })
        .done(function() {
            //alert("second success");
        })
        .fail(function(err) {
            //alert(JSON.stringify(err));
        })
        .always(function() {
            //alert("finished");
            //initBook();
            location.reload();
        });
}