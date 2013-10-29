function resetMessages(){
        document.getElementById("loginUsernameError").innerHTML="";
        document.getElementById("loginPasswordError").innerHTML="";

        document.getElementById("registerEmailError").innerHTML = "";
        document.getElementById("registerUsernameError").innerHTML = "";
        document.getElementById("registerPasswordError").innerHTML = "";
        document.getElementById("registerPasswordConfirmError").innerHTML = "";
        }

function login(){

	resetMessages();
        var valid = 1;

        var usernamePasswordPattern = /^[A-Za-z]{6,}./;

        var usernameJs = document.getElementById("loginUsername").value;

        if(usernameJs.length > 0){
                if(!usernamePasswordPattern.test(usernameJs)){
                        valid = 0;
                        document.getElementById("loginUsernameError").innerHTML="Username must begin with a letter be at least six characters long";
                        }
                }
                else{
                        valid = 0;
                        document.getElementById("loginUsernameError").innerHTML="You must enter a username";
                        }

        //Check 'Password'
        var passwordJs = document.getElementById("loginPassword").value;

        if(passwordJs.length > 0){
                if(!usernamePasswordPattern.test(passwordJs)){
                        valid = 0;
                        document.getElementById("loginPasswordError").innerHTML=
                        "Password must begin with a letter and be at least six characters long";
                        }
                }
                else{   
                        valid = 0;
                        document.getElementById("loginPasswordError").innerHTML="You must enter a password";
                                }

        if (valid == 1){document.getElementById("login").submit();      }
}

function register(){

        resetMessages();
        var valid = 1;

        var emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
        var emailJs = document.getElementById("registerEmail").value;

        //Email must be a valid email address

        if(emailJs.length > 0){
                if(!emailPattern.test(emailJs)){
                        valid = 0;
                        document.getElementById("registerEmailError").innerHTML="Invalid email address";
                        }
                }
                else{
                        valid = 0;
                        document.getElementById("registerEmailError").innerHTML="You must enter an email address";
                        }


        //Username and password must both begin with a letter and be at least six characters long

        //Check username
        var usernamePasswordPattern = /^[A-Za-z]{6,}./;
        var usernameJs = document.getElementById("registerUsername").value;

        if(usernameJs.length > 0){
                if(!usernamePasswordPattern.test(usernameJs)){
                        valid = 0;
                        document.getElementById("registerUsernameError").innerHTML="Username must begin with a letter and only contain alphanumeric characters";
                        }
                }
                else{
                        valid = 0;
                        document.getElementById("registerUsernameError").innerHTML="You must enter username";
                        }

        //Check 'Password' and 'Confirm Password'
        var passwordJs = document.getElementById("registerPassword").value;

        if(passwordJs.length > 0){

                if(!usernamePasswordPattern.test(passwordJs)){
                        valid = 0;
                        document.getElementById("registerPasswordError").innerHTML=
                        "Password must begin with a letter and be at least six characters long";
                        }

                //Since we know that the 'Password' field has a value, we can Check that the 'Confirm Password' has the same value
                var confirmPasswordJs = document.getElementById("registerPasswordConfirm").value;

                if(passwordJs.localeCompare(confirmPasswordJs) != 0){
                        valid = 0;
                        document.getElementById("registerPasswordConfirmError").innerHTML="Passwords do not match";
                        }

                }

                //If no password is entered
                else{
                        valid = 0;
                        document.getElementById("registerPasswordError").innerHTML="You must enter a password";
                        }

        //If there were no input errors, then the form can be submitted
        if(valid == 1){
                document.getElementById("register").submit();
                }

        }
