j(document).ready(function () {
    j('#sales').css({
        height: '200px',
        width: 'auto'
    });
	
	//Monday = 1  Numbers = 3
	//Tuesday = 2
	

    var opencell = [[1, 100], [2, 100], [3, 100], [4, 100], [5, 100], [6, 100], [7, 358]];
    var close_cell = [[1, 356], [2, 345], [3, 452], [4, 345], [5, 325], [6, 424], [7, 478]];

    var plot = j.plot(j("#sales"), [
		{ label: "Open Cell", data: opencell },
		{ label: "Close Cell", data: close_cell }
	], {
		lines: {
			show: true
		},
		points: {
			show: true
		},
		grid: {
			backgroundColor: '#fffaff',
			hoverable: true,
			clickable: true
		},
		legend: {
			show: false
		}
	});

    function showTooltip(x, y, contents) {
        j('<div id="tooltip">' + contents + '</div>').css({
            position: 'absolute',
            display: 'none',
            top: y + -36,
            left: x + -6,
            border: '1px solid #fdd',
            padding: '4px',
            'background-color': '#fee',
            opacity: 0.80
        }).appendTo("body").fadeIn(200);
    }

    var previousPoint = null;

    j("#sales").bind("plothover", function (event, pos, item) {
        j("#x").text(pos.x.toFixed(2));
        j("#y").text(pos.y.toFixed(2));

        if (item) {
            if (previousPoint != item.datapoint) {
                previousPoint = item.datapoint;

                j("#tooltip").remove();
                var x = item.datapoint[0].toFixed(2),
                    y = item.datapoint[1].toFixed(2);

                showTooltip(item.pageX, item.pageY, Math.round(y) + " " + item.series.label);
            }
        }
        else {
            j("#tooltip").remove();
            previousPoint = null;
        }
    });
});