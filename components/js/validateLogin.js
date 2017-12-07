function validateLogin(){

	var expresion = /^[a-zA-Z0-9]*$/;

	if(!expresion.test($("#userLogin").val())){

		return false;
	}

	if(!expresion.test($("#passwordLogin").val())){

		return false;
	}

	return true;

}