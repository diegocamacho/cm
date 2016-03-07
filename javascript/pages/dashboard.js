/*! ========================================================================
 * dashboard.js
 * Page/renders: index.html
 * Plugins used: flot, sparkline
 * ======================================================================== */
$(function () {
    // Sparkline
    // ================================
    (function () {
        $(".sparklines").sparkline("html", {
            enableTagOptions: true
        });
    })();
    
    // Area Chart - Spline
    // ================================
    (function () {
        $.plot("#chart-audience", [{
            label: "Ingresos",
            color: "#91C854",
            data: [
                ["Jan", 47],
                ["Feb", 84],
                ["Mar", 60],
                ["Apr", 143],
                ["May", 39],
                ["Jun", 86],
                ["Jul", 87]
            ]
        }, {
            label: "Egresos",
            color: "#ED5466",
            data: [
                ["Jan", 83],
                ["Feb", 32],
                ["Mar", 16],
                ["Apr", 47],
                ["May", 98],
                ["Jun", 84],
                ["Jul", 18]
            ]
        }], {
            series: {
                lines: {
                    show: false
                },
                splines: {
                    show: true,
                    tension: 0.4,
                    lineWidth: 2,
                    fill: 0.8
                },
                points: {
                    show: true,
                    radius: 4
                }
            },
            grid: {
                borderColor: "rgba(0, 0, 0, 0.05)",
                borderWidth: 1,
                hoverable: true,
                backgroundColor: "transparent"
            },
            tooltip: true,
            tooltipOpts: {
                content: "%x : %y",
                defaultTheme: false
            },
            xaxis: {
                tickColor: "rgba(0, 0, 0, 0.05)",
                mode: "categories"
            },
            yaxis: {
                tickColor: "rgba(0, 0, 0, 0.05)"
            },
            shadowSize: 0
        });
    })();
});