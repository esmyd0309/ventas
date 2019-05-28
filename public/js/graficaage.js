$(document).ready(function(){
    $.ajax({
        url: "http://192.168.1.107/ventas/public/resul",
        method: "GET",
        success: function(data){
            //console.log(data);
           var descripcion = [];
           var cantidad = [];
           for (var i in data){
               descripcion.push(data[i].UsuRegistro);
               cantidad.push(data[i].cantidad);
               
           }
            console.log(cantidad);
            var chartdata = {
                labels: descripcion,
                datasets : [
                    {
                        label : 'Gestiones',
                        
                        borderAlign: 'center',
                        backgroundColor: ['RGB(128, 0, 128,0.3)','RGB(0, 255, 0,0.3)','RGB(255, 0, 255,0.3)','#0000FF'],
                        data: cantidad
                    }
                ]
            };
            var ctx = $("#mycanvasage");
            var barGraph = new Chart(ctx, {
                label : 'Descripcion',
                type: 'bar',
                data: chartdata
                
            });
        },
        error: function(data){
            console.log(data);
        }
    });
});