const registro = document.getElementById('FM');
const inputs = document.querySelectorAll('#FM input');

const expresiones = {
	NP: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, 
    NC: /^[a-zA-ZÀ-ÿ\s]{1,3}$/, 
    TC: /^\d{1,3}$/, 
}

const tabla ={
    iso: false,
    iso3: false,
    isonumerico: false,
    nombrepais: false,
    capital: false,
    codigocontinente: false,
    codigomoneda: false,
}

const VL = (e) => {
    switch (e.target.name){
        case "iso":
            validacion(expresiones.NC, e.target, 'iso')
        break;
        case "iso3":
            validacion(expresiones.NC, e.target, 'iso3')
        break;
        case "isonumerico":
            validacion(expresiones.TC, e.target, 'isonumerico')
        break;
        case "nombrepais":
            validacion(expresiones.NP, e.target, 'nombrepais')
        break;
        case "capital":
            validacion(expresiones.NP, e.target, 'capital')
        break;
        case "codigocontinente":
            validacion(expresiones.NP, e.target, 'codigocontinente')
        break;
        case "codigomoneda":
            validacion(expresiones.NC, e.target, 'codigomoneda')
        break;

    }
};

const validacion = (expresion, input, NID) =>{
    if(expresion.test(input.value)){
        document.getElementById(`A_${NID}`).classList.remove('error1');
        document.querySelector(`#B_${NID}`).classList.remove('merrorA')
        tabla[NID] = true;
    } else{
        document.getElementById(`A_${NID}`).classList.add('error1');
        document.querySelector(`#B_${NID}`).classList.add('merrorA')
        tabla[NID] = false;
    }
}



inputs.forEach((input) => {
    input.addEventListener('keyup', VL);
    input.addEventListener('blur', VL);
});



FM.addEventListener('submit', (e) => {
    e.preventDefault();
    

    if(tabla.iso && tabla.iso3 && tabla.isonumerico && tabla.nombrepais && tabla.capital && tabla.codigocontinente && tabla.codigomoneda){
        FM.submit();
    }

})