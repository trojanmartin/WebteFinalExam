function callConsole() {

    var text = $('textarea#command').val();
    var data = {
        'command': text
    };

    ajaxCall("POST", "http://localhost:8000/api/octave/execute?apikey=12345678910", JSON.stringify(data), callConsoleResponse)
}

function callConsoleResponse(data) {
    $('textarea#response').val(data.result);
}



function ajaxCall(type, uri, data, callback) {
    $.ajax({
        type: type,
        url: uri,
        contentType: "application/json",
        data: data,
        success: function(data) {
            callback(JSON.parse(data));
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log(textStatus + errorThrown);

        }
    });
}