$(document).ready(function(){
    $.ajax({
        url: "http://192.168.1.107/ventas/public/resuldetalle",
        method: "GET",
        success: function(data){
            //console.log(data);
           var descripcion = [];
           var cantidad = [];
           for (var i in data){
               descripcion.push("Descripcion " + data[i].Descripcion);
               cantidad.push(data[i].cantidad);
               
           }
            
            var chartdata = {
                labels: descripcion,
                datasets : [
                    {
                        label : 'Gestiones WhatsApp',
                        backgroundColor: 'rgba(255, 153, 0, 0.5)',
                        borderColor: 'rgba(26, 129, 198, 0.1)',
                        hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
                        hoverBorderColor: 'rgba(200, 200, 200, 1)',
                        data: cantidad
                    }
                ]
            };
            var ctx = $("#mycanvas");
            var barGraph = new Chart(ctx, {
                type: 'bar',
                data: chartdata
            });
        },
        error: function(data){
            console.log(data);
        }
    });
});