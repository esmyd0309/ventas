$(document).ready(function(){
    
    function consultareal(){

   
    $.ajax({
        url: "http://192.168.1.107/ventas/public/carteras",
        method: "GET",
        success: function(data){
           // console.log(data);
           var descripcion = [];
           var cantidad = [];
           for (var i in data){
               descripcion.push( data[i].Descripcion);
               cantidad.push(data[i].cantidad);
               
           }
           Chart.defaults.global.hover.mode = 'nearest';
            
           var chartdata = {
                labels: descripcion,
                datasets : [
                    {

                        label : 'Gestiones WhatsApp',
                        data: cantidad,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.4)',
                            'rgba(234, 236, 238  )',
                            'rgba(253, 254, 254,0.10)',
                            'rgba(35, 155, 86, 0.6)',
                            'rgba(247, 220, 111  )',
                            'rgba(253, 254, 254, 0.9)',
                            'rgba(255, 99, 132, 0.9)',
                            'rgba(72, 201, 176)',
                            'rgba(250, 215, 160)',
                            'rgba(230, 126, 34  )',
                            'rgba(155, 89, 182)'
                        ],
                        borderColor: [
                            'rgba(255, 99,132)',
                            'rgba(33, 47,  60)',
                            'rgba(33, 47,  60)',
                            'rgba(35 ,155, 86)',
                            'rgba(247,220,111)',
                            'rgba(33, 47,  60)',
                            'rgba(255, 99,132)',
                            'rgba(72, 201,176)',
                            'rgba(250,215,160)',
                            'rgba(230,126, 34)',
                            'rgba(155, 89,182)'
                        ],
                        borderWidth: 3,
                        fillColor : "rgba(99,123,133,0.4)",
                        strokeColor : "rgba(220,220,220,1)",
                        pointColor : "rgba(220,220,220,1)",
                        pointStrokeColor : "#fff",
                        hoverBorderWidth: 10,
                      
                        
                    }
                    
                ],
                options: {
                    legend: {
                      labels: {
                        padding: 20
                      }
                    },
                  
                    legend:{
                        
                        position: 'right',
                        labels:{
                            fontColor: '#000'
                        }
                    }
                }
            };
            

            
            var ctx = $("#grafica");
            
            var barGraph = new Chart(ctx, {
                type: 'doughnut',
                data: chartdata,
                
            
            
            });
         
           
                
        
            
            
          


        },
        error: function(data){
            console.log(data);
        }

        
    });

}
setInterval(consultareal,10000)

});
