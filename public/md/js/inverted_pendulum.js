const url = "https://wt58.fei.stuba.sk:4458/final";
let position = 0;
let angle = 0;
let invertedPendulumIndex = 1;
let maxIndex = 0;

function getDataForInvertedPendulum() {
    r = $('input#r').val();

    ajaxCall("GET", url + "/api/octave/inverted_pendulum?apikey=12345678910" + "&r=" + r + "&position=" + position + "&angle=" + angle, "", getInvertedPendulumResponse);
}

function getInvertedPendulumResponse(data) {
    checkBox = document.getElementById('checkBoxForGraph').checked;
    if (checkBox == true) {

        position = data.position[maxIndex];
        angle = data.angle[maxIndex];

        maxIndex = data.position.length;


        var interval = window.setInterval(function() {
            if (invertedPendulumIndex == maxIndex) {
                clearInterval(interval);
                invertedPendulumIndex = 1;
            } else {
                var a = Number((data.angle[invertedPendulumIndex]));
                var angle = a.toPrecision(10);

                animate(data.position[invertedPendulumIndex], angle, data.time[invertedPendulumIndex]);
                invertedPendulumIndex += 1;
            }
        }, 0.00001);
    }
}

Plotly.newPlot('graphInvertedPendulum', [{
    x: [0],
    y: [0],
    type: 'line',
    name: 'position',
    line: {
        color: 'rgb(0,255,0)',
        width: 2
    }
}], {});

Plotly.plot("graphInvertedPendulum", [{
    x: [0],
    y: [0],
    type: 'line',
    name: 'angle',
    line: {
        color: 'rgb(255,0,0)',
        width: 2
    }
}]);

function extendGraph(position, angle, x) {
    Plotly.extendTraces("graphInvertedPendulum", {
        y: [
            [position]
        ],
        x: [
            [x]
        ]
    }, [0]);

    Plotly.extendTraces("graphInvertedPendulum", {
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