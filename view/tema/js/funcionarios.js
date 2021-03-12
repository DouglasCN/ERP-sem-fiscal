
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