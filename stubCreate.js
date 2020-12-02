function verify(event){
	username=document.getElementById("username").value
	email=document.getElementById("email").value
	password1=document.getElementById("password").value
	repeat=document.getElementById("retype").value
	
	var flag= false;
	var user=/^[a-zA-Z0-9]{1,10}$/
	var pass=/^(?=.*\d)(?=.*[a-z])[a-zA-Z0-9]{6,10}$/
	var emal=/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/
	if (user.test(username)&& pass.test(password1) && password1==repeat && emal.test(email)){
		alert("User validated")
		return true
	}
	else if (user.test(username)== false){
		alert("Invalid username")
		return false
	}
	else if (pass.test(password1)== false) {
		alert("Invalid password")
		return false
	}
	else if (emal.test(email)== false) {
		alert("Invalid email")
		return false
	}
	else if (password1!=repeat){
		alert("password does not match")
		return false
	}
}
