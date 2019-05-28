$(document).ready(function(){
    
  
    /**MODULO QUE MUESTRA LA CANTIDAD DE REGISTRO DEL DIA */
    var tablaDatos = $("#datosx");
    var gestiones = $("#gestionestt");
  
    var route = "http://192.168.1.107/ventas/public/agentes";

    $.get(route, function(res){
        $(res).each(function (index,value){
        
            tablaDatos.append("<tr><td>"+value.UsuRegistro+"</td><td>"+value.cantidad+"</td><td>"+value.Descripcion+"</td></tr>");
       
        });
    
      
    });

    
    var gestiones = $("#gestionestt");
    var agente = $("#agente");

    var gestiones2 = $("#gestionestt2");
    var agente2 = $("#agente2");

    var gestiones3 = $("#gestionestt3");
    var agente3 = $("#agente3");

    
    var gestiones4 = $("#gestionestt4");
    var agente4 = $("#agente4");

    var gestiones5 = $("#gestionestt5");
    var agente5 = $("#agente5");
   
    var route = "http://192.168.1.107/ventas/public/resul";

    $.get(route, function(res){
        $(res).each(function (index,value){
          

           if (value.UsuRegistro=='MUBILLA') {
            agente.append(value.UsuRegistro);
            gestiones.append(value.cantidad);
           }

           if (value.UsuRegistro=='EJUNCO') {
            agente2.append(value.UsuRegistro);
            gestiones2.append(value.cantidad);
           }

           if (value.UsuRegistro=='MMERO') {
            agente3.append(value.UsuRegistro);
            gestiones3.append(value.cantidad);
           }
           if (value.UsuRegistro=='AUDITORIA') {
            agente4.append(value.UsuRegistro);
            gestiones4.append(value.cantidad);
           }
           
           

  
       
        });


      
    });
    /**MODULO DE ENVIOS DE DATOS */
  
    
    var tablaDatos1 = $("#datos1");
    var cantidad64 = $("#cantidad64");
    var cantidadenvio = $("#cantidadenvio");
    var route = "http://192.168.1.107/ventas/public/gestione";

    $.get(route, function(res){
        $(res).each(function (index,value){
            
            tablaDatos1.append("<tr><td>"+value.UsuRegistro+"</td><td>"+value.Identificacion+"</td><td>"+value.Nombres+"</td><td>"+value.Comentario+"</td><td>"+value.Descripcion+"</td><td>"+value.FecRegistro+"</td></tr>");
            
        });
        var nFilas = $("#miTabla1 >tbody >tr").length;

        cantidad64.append(nFilas);
        cantidadenvio.append(nFilas);
           
    });
 
    /**MODULO DE  Recepcion de Pago*/
    var tablaDatos2 = $("#datos2");
    var cantidad70 = $("#cantidad70");
    var cantidadpago = $("#cantidadpago");
   
    var route = "http://192.168.1.107/ventas/public/gestiones2";


    $.get(route, function(res){
        $(res).each(function (index,value){
      
            tablaDatos2.append("<tr><td>"+value.UsuRegistro+"</td><td>"+value.Identificacion+"</td><td>"+value.Nombres+"</td><td>"+value.Comentario+"</td><td>"+value.Descripcion+"</td><td>"+value.FecRegistro+"</td></tr>");
        });
        var nFilas = $("#miTabla2 >tbody >tr").length;

        cantidad70.append(nFilas);
        cantidadpago.append(nFilas);
    });

 /**MODULO DE  Negociación WhatsApp*/

    var tablaDatos3 = $("#datos3");
    var cantidad66 = $("#cantidad66");
    var cantidadnego = $("#cantidadnego");
    var route = "http://192.168.1.107/ventas/public/gestiones3";

    $.get(route, function(res){
        $(res).each(function (index,value){
        
            tablaDatos3.append("<tr><td>"+value.UsuRegistro+"</td><td>"+value.Identificacion+"</td><td>"+value.Nombres+"</td><td>"+value.Comentario+"</td><td>"+value.Descripcion+"</td><td>"+value.FecRegistro+"</td></tr>");
        });
        var nFilas = $("#miTabla3 >tbody >tr").length;
        cantidad66.append(nFilas);
        cantidadnego.append(nFilas);
    });

     /**MODULO DE Solicitud Certificado No Adeudo*/

    var tablaDatos5 = $("#datos5");
    var cantidad75 = $("#cantidad75");
    var cantidadcertificado = $("#cantidadcertificado");
    var route = "http://192.168.1.107/ventas/public/gestiones5";

    $.get(route, function(res){
        $(res).each(function (index,value){
        
            tablaDatos5.append("<tr><td>"+value.UsuRegistro+"</td><td>"+value.Identificacion+"</td><td>"+value.Nombres+"</td><td>"+value.Comentario+"</td><td>"+value.Descripcion+"</td><td>"+value.FecRegistro+"</td></tr>");
       
        });
        var nFilas = $("#miTabla5 >tbody >tr").length;
        cantidad75.append(nFilas);
        cantidadcertificado.append(nFilas);
       
    });

    const xhttp = new XMLHttpRequest();

    xhttp.open('GET', 'http://192.168.1.107/ventas/public/resuldetalle', true);
    xhttp.send();
    xhttp.onreadystatechange = function(){
        if (this.readyState ==4 && this.status == 200) {
           // console.log(this.responseText);
            let datos = JSON.parse(this.responseText);
           // console.log(datos);
            let datos6 = document.querySelector('#datos6');
            datos.innerHtml = '';
            for(let item of datos){
               // console.log(item.Descripcion);
               datos6.innerHTML +=`
                <tr>
                    <th>${item.UsuRegistro}</th>
                    <th>${item.cantidad}</th>
                    <th>${item.Descripcion}</th>
                </tr>
               `
            }
        }
    }



  
});
