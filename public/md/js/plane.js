const url = "https://wt58.fei.stuba.sk:4458/final/";

let ballIndex = 1;
let maxIndex = 0;

Plotly.newPlot('g', [{
    x: [0],
    y: [0],
    type: 'line',
    name: 'klapka',
    line: {
        color: 'rgb(0,0,255)',
        width: 2
    }
}], {});

Plotly.plot("g", [{
    x: [0],
    y: [0],
    type: 'line',
    name: 'lietadlo',
    line: {
        color: 'rgb(255,0,0)',
        width: 2
    }
}]);



function getDataForPlane() {
    r = $('input#r').val();

    ajaxCall("GET", url + "/api/octave/plane?apikey=12345678910&r=" + r, "", planeDataResponse);
}


function planeDataResponse(data) {

    if ($("#graphCheck").is(':checked')) {

        maxIndex = data.naklonLietadla.length
        var interval = window.setInterval(function() {
            if (ballIndex == maxIndex) {
                clearInterval(interval);
                ballIndex = 1;
            } else {
                var a = Number((data.naklonLietadla[ballIndex]));
                var angle = a.toPrecision(10);

                animate(data.naklonKlapky[ballIndex], data.naklonLietadla[ballIndex], data.time[ballIndex]);
                ballIndex += 1;
            }
        }, 0.00001);

    }


}


function animate(position, angle, x) {
    Plotly.extendTraces("g", {
        y: [
            [position]
        ],
        x: [
            [x]
        ]
    }, [0]);

    Plotly.extendTraces("g", {
        y: [
            [angle]
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