// INICIO DO JS PARA PESQUISA DE MODULOS

$( "#searchModule" ).keyup(function() {
    if(document.getElementById("searchModule").value.length <= 0){
      $( "#dropdownModule" ).removeClass( "show" );
    }else{
      getProdutoREF();
      $( "#dropdownModule" ).addClass( "show" );
    }
});

function closeDropdownModule(){
setTimeout( function time(){
    close() }, 2000);

function close(){
    $( "#dropdownModule" ).removeClass( "show" );
}
}


function getProdutoREF() {
      $(document).ready(function () {
        var ajax = new XMLHttpRequest();
        var ref = document.getElementById("searchModule").value;
        ajax.open("GET", 'http://localhost/erp/api/v1/itens.php?nome='+ ref);
        
        ajax.responseType = "json";

        ajax.send();
        ajax.addEventListener("readystatechange" , function () {
          
            if (ajax.readyState === 4 && ajax.status === 200){

              var response = ajax.response;
              
              document.getElementById("dropdownModule").innerHTML = "";
              for (a = 0; a < response.length; a++){
                $("#dropdownModule").append("<div class='dropdown-divider'></div> <a href='{$ROTA_PAGINAS}/"+response[a].pagina+
                "' class='dropdown-item'><i class='fas fa-reply mr-2'></i> "+response[a].descricao+"</a>");
              }
              
            }
        })
      })
  }

  //FIM DO JS DE MODULO

 
