

function drawLine() {

    var canvas = document.getElementById('canvas_1');

    var context = canvas.getContext('2d');
    context.beginPath();
    context.moveTo(2, 0);
    context.lineTo(1000, 2);
    context.lineWidth = 3;

    context.strokeStyle='grey';
    context.stroke();


    var context = canvas.getContext('2d');
    context.beginPath();
    context.moveTo(0, 0);
    context.lineTo(200, 0);
    context.lineWidth = 7;

    context.strokeStyle='yellow';
    context.stroke();



}

