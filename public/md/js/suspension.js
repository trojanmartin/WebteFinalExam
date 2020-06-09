const url = "http://localhost:8000";


let index = 1;
let r;

let maxIndex = 0;
let x = 0;

function init() {
    Plotly.newPlot('gr', [{
        x: [0],
        y: [0],
        type: 'line',
        name: 'wheel',
        line: {
            color: 'rgb(0,0,255)',
            width: 2
        }
    }], {});

    Plotly.plot("gr", [{
        x: [0],
        y: [0],
        type: 'line',
        name: 'body',
        line: {
            color: 'rgb(255,0,0)',
            width: 2
        }
    }]);

}



function getDataForSuspension() {
    r = $('input#r').val();

    ajaxCall("GET", url + "/api/octave/suspension?apikey=12345678910&r=" + r, "", SuspensionDataResponse);
}


function SuspensionDataResponse(data) {

    var checkbox = $('#graph');
    if ($("#graph").is(':checked')) {
        init();
        var interval = window.setInterval(function() {
            if (index == maxIndex) {
                clearInterval(interval);
                index = 1;
            } else {
                animate(data.position_car[index], data.position_wheel[index], data.time[index]);
                index += 1;
            }
        }, 0.00001);
    }


}


function animate(position, body, x) {
    Plotly.extendTraces("gr", {
        y: [
            [position]
        ],
        x: [
            [x]
        ]
    }, [0]);

    Plotly.extendTraces("gr", {
        y: [
            [body]
        ],
        x: [
            [x]
        ]
    }, [1]);



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