const F = document.getElementById('F');
const IN = document.querySelectorAll('#F input');

const expresiones = {
	pregunta: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, 
	contrasena: /^.{4,12}$/, 
	correo: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
}

const tabla = {
    usuario: false,
    clave: false,
    pregunta1: false,
    pregunta2: false,
}

const VF = (e) => {
	switch (e.target.name) {
		case "usuario":
			VC(expresiones.correo, e.target, 'usuario');
		break;
		case "clave":
			VC(expresiones.contrasena, e.target, 'clave');
		break;
		case "pregunta1":
			VC(expresiones.pregunta, e.target, 'pregunta1');
		break;
		case "pregunta2":
            VC(expresiones.pregunta, e.target, 'pregunta2');
		break;
	}
}

const VC = (expresion, input, condicion) => {
	if(expresion.test(input.value)){
		document.getElementById(`A_${condicion}`).classList.remove('ERROR1');
		document.querySelector(`#B_${condicion}`).classList.remove('M_ERRORA');
		tabla[condicion] = true;
	} else {
		document.getElementById(`A_${condicion}`).classList.add('ERROR1');
		document.querySelector(`#B_${condicion}`).classList.add('M_ERRORA');
		tabla[condicion] = false;
	}
}


IN.forEach((input) => {
	input.addEventListener('keyup', VF);
	input.addEventListener('blur', VF);
});

F.addEventListener('submit', (e) => {
	e.preventDefault();

    
	if(tabla.usuario && tabla.clave && tabla.pregunta1 && tabla.pregunta2){
		F.submit();
	} 
});