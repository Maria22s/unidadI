const registro = document.getElementById('FM');
const inputs = document.querySelectorAll('#FM input');

const expresiones = {
	NP: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, 
    Telefono: /^\d{11,14}$/, 
    Correo: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
    sa: /^\d{1,14}$/,
}

const tabla ={
    fname: false,
    lname: false,
    telefono: false,
}

const VL = (e) => {
    switch (e.target.name){
        case "fname":
            validacion(expresiones.NP, e.target, 'fname')
        break;
        case "lname":
            validacion(expresiones.NP, e.target, 'lname')
        break;
        case "telefono":
            validacion(expresiones.Telefono, e.target, 'telefono')
        break;
        case "salario":
            validacion(expresiones.sa, e.target, 'salario')

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
    

    if(tabla.fname && tabla.lname  && tabla.telefono && tabla.salario){
        FM.submit();
    }

})