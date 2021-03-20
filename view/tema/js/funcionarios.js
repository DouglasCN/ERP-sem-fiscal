
function userSistema() {
    if($('#radioN').prop("checked")){
        setTimeout( () => $('.userSistema').css("display", "none"), 500);
        
        setTimeout( () => $('.userSistema').css("opacity", "0"), 10);
        

    }else if($('#radioS').prop("checked")){
        $('.userSistema').css("display", "block");
        setTimeout( () => $('.userSistema').css("opacity", "1"), 10);
    }
}

function abaBlock() {
    if($('#tab1').is(":checked")){
        setTimeout( () => $('#lista').css("display", "block"), 500);
        setTimeout( () => $('#lista').css("opacity", "1"), 10);

        setTimeout( () => $('#cadastro').css("display", "none"), 500);
        setTimeout( () => $('#cadastro').css("opacity", "0"), 50);

        setTimeout( () => $('#visualizar').css("display", "none"), 500);
        setTimeout( () => $('#visualizar').css("opacity", "0"), 50);

    }else if($('#tab2').is(":checked")){
        setTimeout( () => $('#lista').css("display", "none"), 500);
        setTimeout( () => $('#lista').css("opacity", "0"), 50);

        setTimeout( () => $('#cadastro').css("display", "block"), 500);
        setTimeout( () => $('#cadastro').css("opacity", "1"), 10);

        setTimeout( () => $('#visualizar').css("display", "none"), 500);
        setTimeout( () => $('#visualizar').css("opacity", "0"), 50);

    }else if($('#tab3').is(":checked")){

        setTimeout( () => $('#lista').css("display", "none"), 500);
        setTimeout( () => $('#lista').css("opacity", "0"), 50);

        setTimeout( () => $('#cadastro').css("display", "none"), 500);
        setTimeout( () => $('#cadastro').css("opacity", "0"), 50);

        setTimeout( () => $('#visualizar').css("display", "block"), 500);
        setTimeout( () => $('#visualizar').css("opacity", "1"), 10);
    }

}

function getListEmployee() {
    var ajax = new XMLHttpRequest();

    ajax.open("GET", 'http://localhost/erp/api/v1/employee/employee.php');
    
    ajax.responseType = "json";

    ajax.send();
    ajax.addEventListener("readystatechange" , function () {
        if (ajax.readyState === 4 && ajax.status === 200){
            response = ajax.response;
            const data = response;
            
            let perPage = 10
            const state = {
                page: 1,
                perPage,
                totalPage: Math.ceil(data.length / perPage),
                maxVisibleButtons: 5
            }

            const html = {

            get(element){
                return document.querySelector(element)
            }
            }

            const controls = {

            next(){
                state.page++

                if(state.page > state.totalPage){
                    state.page--
                }
            },

            prev(){
                state.page--

                if(state.page < 1){
                state.page++
                }
            },

            goTo(page){
                if(page < 1){
                page = 1
                }

                state.page = +page

                if(page > state.totalPage){
                state.page = state.totalPage
                }
            },

            createListeners(){

                html.get('.first').addEventListener('click', () => {
                    controls.goTo(1)
                    update()
                })

                html.get('.last').addEventListener('click', () => {
                    controls.goTo(state.totalPage)
                    update()
                })

                html.get('.next').addEventListener('click', () => {
                    controls.next()
                    update()
                })

                html.get('.prev').addEventListener('click', () => {
                    controls.prev()
                    update()
                })
            }
            }

            const list = {

            create(item){
                const div = document.createElement('tr')
                //  div.classList.add('item')
                div.innerHTML = `
                <td>${item.codigoUnico} </td>
                <td>${item.razaoSocial} </td>
                <td>${item.contato1} </td>
                <td>${item.contato2} </td>
                <td>${item.dataAniversario} </td>
                <td>
                    <a onclick='getEmployee(${item.codigoUnico})'>Visualizar</a> 
                    <a onclick=''>Deletar</a>
                </td>`
                
                html.get('.list').appendChild(div)
            },

                update(){
                html.get('.list').innerHTML = ""

                let page = state.page - 1
                let start = page * state.perPage
                let end = start + state.perPage

                const paginatedItems = data.slice(start, end)

                paginatedItems.forEach(list.create)
            }
            }
            
            const buttons = {
                element: html.get('.controls .numbers'),
                create(number){

                const button = document.createElement('div')

                button.innerHTML = number;

                if(state.page == number){
                button.classList.add('active')
                }

                button.addEventListener('click', (event) => {
                    const page = event.target.innerText
                    controls.goTo(page)
                    update()
                })

                buttons.element.appendChild(button)

            },

            update(){
                buttons.element.innerHTML = ""
                const {maxLeft, maxRight} = buttons.calculateMaxVisible()

                for(let page= maxLeft; page <= maxRight; page++){
                    buttons.create(page)
                }
            },

            calculateMaxVisible(){
                const {maxVisibleButtons} = state
                let maxLeft = (state.page - Math.floor(maxVisibleButtons/2))
                let maxRight = (state.page + Math.floor(maxVisibleButtons/2))

                if(maxLeft < 1){
                    maxLeft = 1
                    maxRight = maxVisibleButtons
                }

                if(maxRight > state.totalPage){
                    maxLeft = state.totalPage - ( maxVisibleButtons - 1)
                    maxRight = state.totalPage

                    if(maxLeft<1) maxLeft = 1
                }
                return {maxLeft, maxRight}
            }
            }

            function update(){
                list.update()
                buttons.update()
            }

            function init(){
                update()
                controls.createListeners()
            }

            init()
        
        }
    })
}

function confirmPassword(){
    if($('#Senha').val() == $('#CSenha').val()){
        $('#Senha').css("border-color", "#ced4da")
        $('#CSenha').css("border-color", "#ced4da")
        $("#btnSubmit").removeClass("disabled")
        $("#btnSubmit").removeClass("btn-default")
        $('#btnSubmit').removeAttr('disabled','disabled')  
    }else{
        $("#btnSubmit").addClass("disabled")
        $("#btnSubmit").addClass("btn-default")
        $('#btnSubmit').attr('disabled','disabled')  
        $('#Senha').css("border-color", "red")
        $('#CSenha').css("border-color", "red")
    }
}

function getEmployee(codigoUnico){
    var ajax = new XMLHttpRequest(); 
    ajax.open("GET", 'http://localhost/erp/api/v1/employee/index.php?codigoUnico='+ codigoUnico);
    
    ajax.responseType = "json";

    ajax.send();
    ajax.addEventListener("readystatechange" , function () {
      
        if (ajax.readyState === 4 && ajax.status === 200){

            var response = ajax.response;
          
            $("#NomeView").val(response[0].razaoSocial) 
            $("#codigoUnicoView").val(response[0].codigoUnico) 
            $("#EmailView").val(response[0].email) 
            $("#CPFView").val(response[0].CPF_CNPJ) 
            $("#contato1View").val(response[0].razaoSocial) 
            $("#contato2View").val(response[0].contato1) 
            $("#dataAnivrsarioView").val(response[0].contato2) 
            $("#salarioView").val(response[0].salario) 
            $("#usuarioView").val(response[0].usuario) 
            $("#nivelAcessoView").val(response[0].nivelAcesso) 
            $("#tipoClienteView").val(response[0].parceiroCliente) 
            $("#tipoFornecedorView").val(response[0].parceiroFornecedor) 
            $("#tipoFuncionarioView").val(response[0].parceiroFuncionario) 
            $("#cepView").val(response[0].cep) 
            $("#estadoView").val(response[0].estado) 
            $("#cidadeView").val(response[0].cidade) 
            $("#bairroView").val(response[0].bairro) 
            $("#logradouroView").val(response[0].endereco) 
            $("#complementoView").val(response[0].complemento) 
            $("#numeroView").val(response[0].numero) 
            $("#observacaoView").val(response[0].observacao) 

            
            document.getElementById('tab3').checked = true
            document.getElementById('tab1').checked = false
            abaBlock()
        }
    })
}

getListEmployee();

