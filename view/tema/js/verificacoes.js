function submit() {
    var senha1 = document.getElementById('senha').value;
    var senha2 = document.getElementById('Csenha').value;
    if (senha1 == senha2) {
        if (senha1.length > 4) {
            document.formUsu.submit();
        } else {
            document.getElementById("spansenhapouc").style.visibility = "visible";
            setTimeout(function name() {
                document.getElementById("spansenhapouc").style.visibility = "hidden"
            }, 3000);
        }
    }
}

function submitItem(){

    if($('#radioNome').prop("checked")){
        document.formItemNome.submit();

    }else if($('#radioREF').prop("checked")){
        document.formItemREF.submit();
    }
    
}

function submitVenda(acao){

    if(acao == 'salvar'){
        document.getElementById("tipo").setAttribute('name','salvar');
    }else if(acao == 'desaprovar'){
        document.getElementById("tipo").setAttribute('name','desaprovar');
    }

    document.formVenda.submit();
}


function senhaiguais() {
    var senha1 = document.getElementById('senha').value;
    var senha2 = document.getElementById('Csenha').value;
    if (senha1 == senha2) {
        document.getElementById("spansenhadife").style.visibility = "hidden";
        $("#btn-subUsu").removeClass("btn-default");
        $("#btn-subUsu").removeClass("disabled");
    } else {
        document.getElementById("spansenhadife").style.visibility = "visible";
        $("#btn-subUsu").addClass("btn-default");
        $("#btn-subUsu").addClass("disabled");
    }
}

function fechar() {
    var favDialog = document.getElementById('dialog');
    favDialog.close();
}

function getViaCep(teste) {
    $(document).ready(function () {
        // var nome = document.getElementById("estado").value;
        // var result = document.getElementById("cidade");
        var url = "https://viacep.com.br/ws/" + teste + "/json/";
        $.ajax({
            url: url,
            type: "get",
            dataType: 'json',
            success: function (data) {
                document.getElementById("bairro").value = data.bairro;
                document.getElementById("logradouro").value = data.logradouro;
                document.getElementById("cidade").value = data.localidade;
                document.getElementById("estado").value = data.uf;
            },
            error: function (erro) {
                console.log(erro);
            }
        });
    })

}

function calculaLucro() {
    var custo = document.getElementById('custo').value.replace(',', '.');
    var venda = document.getElementById('venda').value.replace(',', '.');
    var custo = custo.replace('R$ ', '');
    var venda = venda.replace('R$ ', '');
    var lucro;

    lucro = parseFloat(venda) - parseFloat(custo);

    document.getElementById("lucro").value = parseFloat(lucro).toFixed(2).toString().replace(".", ",");

}

function goBack() {
    window.history.back();
}

function getProdutoI(id) {
    $(document).ready(function () {
       var ajax = new XMLHttpRequest();
       
       ajax.open("GET", 'http://localhost/vinicius/dados/itens.php?id=' + id);

       ajax.responseType = "json";

       ajax.send();
       ajax.addEventListener("readystatechange" , function () {
        
           if (ajax.readyState === 4 && ajax.status === 200){

            var response = ajax.response;

            document.getElementById("custo").value = response[2];
            document.getElementById("venda").value = response[3];
           }
       })
    })
}

function getProdutoREF(ref) {
    $(document).ready(function () {
       var ajax = new XMLHttpRequest();
       
       ajax.open("GET", 'http://localhost/vinicius/dados/itens.php?ref=' + ref);

       ajax.responseType = "json";

       ajax.send();
       ajax.addEventListener("readystatechange" , function () {
        
           if (ajax.readyState === 4 && ajax.status === 200){

            var response = ajax.response;

            document.getElementById("produto2").value = response[0];
            document.getElementById("ProdutoNome").value = response[1];
            document.getElementById("custo2").value = response[2];
            document.getElementById("venda2").value = response[3];
           }
       })
    })
}

function calculaValor() {
    $(document).ready(function () {

        

        if($('#radioNome').prop("checked")){
            var quant = document.getElementById("quant").value;
            var custo = parseFloat(document.getElementById("custo").value.replace(',', '.')) * quant;
            var valor = parseFloat(document.getElementById("venda").value.replace(',', '.')) * quant;
            
            document.getElementById("custoTotal").value = custo.toFixed(2).toString().replace(".", ",");
            document.getElementById("vendaTotal").value = valor.toFixed(2).toString().replace(".", ",");
    
        }else if($('#radioREF').prop("checked")){
            var quant = document.getElementById("quant2").value;
            var custo = parseFloat(document.getElementById("custo2").value.replace(',', '.')) * quant;
            var valor = parseFloat(document.getElementById("venda2").value.replace(',', '.')) * quant;
            
            document.getElementById("custoTotal2").value = custo.toFixed(2).toString().replace(".", ",");
            document.getElementById("vendaTotal2").value = valor.toFixed(2).toString().replace(".", ",");
        }else {
            var quant = document.getElementById("quant").value;
            var custo = parseFloat(document.getElementById("custo").value.replace(',', '.')) * quant;
            var valor = parseFloat(document.getElementById("venda").value.replace(',', '.')) * quant;
            
            document.getElementById("custoTotal").value = custo.toFixed(2).toString().replace(".", ",");
            document.getElementById("vendaTotal").value = valor.toFixed(2).toString().replace(".", ",");
        }
       
    })
}

function calculaDesconto() {
    $(document).ready(function () {

        var valor = parseFloat(document.getElementById("valorTotal").value.replace(',', '.'));
        var desconto = parseFloat(document.getElementById("desconto").value);
        var adicional = parseFloat(document.getElementById("adicional").value.replace(',', '.'));

        if(!desconto){
            desconto = 0;
        }
        var total = (adicional + valor) - ((adicional + valor) * (desconto / 100));

        document.getElementById("total").value = total.toFixed(2).toString().replace(".", ",");
       
    })
}

function getFecharSistema() {
    $(document).ready(function () { 
       $.ajax({
        url : "http://localhost/vinicius/adm/ponto",
        type : 'POST',
        data : {
            pontofechamento : "a",
        },
        beforeSend : function(){

        }})
        .done(function(msg){ 
            location.reload();
        })
        .fail(function(jqXHR, textStatus, msg){
            alert("Erro");
        });
    })

    
}

function showItem(ant, prox){
    $("#"+ant).animate({
        left: "-10px",
        opacity: "0"
    },{
        duration: 300,
        complete: function(){
            $("#"+ant).css("display", "none");
            $("#"+prox).css("display","block");
            $("#"+prox).css("left","10px");
            $("#"+prox).animate({
                left: "0",
                opacity: "1"
            },{ 
                duration: 300,
                complete: function(){
                    $("#"+prox+"Titulo").css("background", "#f8f8f8");
                    $("#"+ant+"Titulo").css("background", "transparent");
                }
            });
        }
    });
}

$(document).ready(function(){
    $("#radioNome").click(function(){

        if($('#radioNome').prop("checked")){
            showItem("formItemREF", "formItemNome");
    
        }else if($('#radioREF').prop("checked")){
            showItem("formItemNome", "formItemREF");
        }
    });

    $("#radioREF").click(function(){
        if($('#radioNome').prop("checked")){
            showItem("formItemREF", "formItemNome");
    
        }else if($('#radioREF').prop("checked")){
            showItem("formItemNome", "formItemREF");
        }
         
         
    });

})



