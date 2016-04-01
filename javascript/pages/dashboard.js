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
        $.get('data/info_chart.php',function(data){

                var respuesta=data.split("|");
                var ingresos = respuesta[1]; 
                var egresos = respuesta[2];
                var datos_ingresos = [];
                var datos_egresos = [];
                respuesta = respuesta[0];
                if(respuesta==1){
                   ingresos = ingresos.split("_");
                   egresos = egresos.split("_");
                   for(var i=0;i<ingresos.length-1;i++){
                        var mes_total = ingresos[i].split("&"); 
                        var mes = mes_total[0];
                        var total = mes_total[1];
                        if(i<ingresos.length-2){
                            datos_ingresos[i] = [""+mes+"",total]; 
                        }else{
                            datos_ingresos[i] = [""+mes+"",total];  
                        }
                    }
                    for(var i=0;i<egresos.length-1;i++){
                        var mes_total = egresos[i].split("&"); 
                        var mes = mes_total[0];
                        var total = mes_total[1];
                        if(i<egresos.length-2){
                            datos_egresos[i] = [""+mes+"",Number(total)];  
                        }else{
                            datos_egresos[i] = [""+mes+"",Number(total)]; 
                        }
                    }
                   $.plot("#chart-audience", [{
                        label: "Ingresos",
                        color: "#91C854",
                        data: datos_ingresos
                        }, {
                        label: "Egresos",
                        color: "#ED5466",
                        data: datos_egresos
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
                }else{
                    alert(respuesta);
                }
            });
        
    })();
});