<?php
$toothData = [
    ['toothNumber' => 1, 'status' => 'healthy'],
    ['toothNumber' => 2, 'status' => 'decayed'],
    // Add more tooth data as needed
];
?>

<!DOCTYPE html>
<html>
<head>
    <script src="https://d3js.org/d3.v7.min.js"></script>
    <script src="https://kit.fontawesome.com/108fd5e4bd.js" crossorigin="anonymous"></script>
    <style>
        .tooth {
            fill: #F6F6F6;
            stroke: #999;
            stroke-width: 1;
        }
        .tooth-text {
            font-size: 10px;
            text-anchor: middle;
            dominant-baseline: central;
            fill: #333;
        }
        .tooth-status-healthy { fill: #3DD200; }
        .tooth-status-decayed { fill: #FF0000; }
    </style>
</head>
<body>
    <svg id="tooth-chart" width="800" height="400"></svg>

    <script>
        var toothData = <?php echo json_encode($toothData); ?>;

        function generateToothChart() {
            var svg = d3.select("#tooth-chart");

            var chartWidth = 700;
            var chartHeight = 300;
            var margin = { top: 10, right: 10, bottom: 10, left: 20 };
            var toothWidth = (chartWidth - margin.left - margin.right) / toothData.length;
            var toothHeight = chartHeight - margin.top - margin.bottom;

            var chartGroup = svg.append("g")
                .attr("transform", "translate(" + margin.left + "," + margin.top + ")");

            var toothSize = Math.min(toothWidth, toothHeight) * 0.8;

            var toothGroup = chartGroup.selectAll(".tooth")
                .data(toothData)
                .enter()
                .append("g")
                .attr("class", "tooth")
                .attr("transform", function (d, i) { return "translate(" + (i * toothWidth) + ", 0)"; });

            toothGroup.append("text")
                .attr("class", function (d) { return "fas tooth-icon tooth-status-" + d.status; })
                .attr("x", toothWidth / 2)
                .attr("y", toothHeight / 2)
                .attr("font-size", toothSize)
                .attr("text-anchor", "middle")
                .text('\uf5c9'); // Use the Font Awesome tooth icon's unicode here

            toothGroup.append("text")
                .attr("x", toothWidth / 2)
                .attr("y", toothHeight + 20)
                .attr("class", "tooth-text")
                .attr("text-anchor", "middle")
                .text(function (d) { return d.toothNumber; });
        }

        generateToothChart();
    </script>
</body>
</html>
