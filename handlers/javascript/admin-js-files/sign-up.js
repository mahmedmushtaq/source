

$.getScript("../../javascript/connection/address.js");
//

$.getScript("../../javascript/connection/server_files/registration_files.js");

$('form').on('submit', function (e) {

    e.preventDefault();



});

$(".submit").click(function () {
   var nameValue = $("input[name=name]").val();
   var emailValue = $("input[name=email]").val();
   var passwordValue = $("input[name=password]").val();
   var phoneNumberValue = $("input[name=phone_number]").val();

   var checker = valueValidation(nameValue,emailValue,passwordValue,phoneNumberValue);
   if(checker){
       sendRequest(nameValue,emailValue,passwordValue,phoneNumberValue);
   }


    });


// =================== VALUE CHECKER ===================



function valueValidation(name,email,password,phone) {
    var phoneNumberLength

    if(name.length < 10){
       alert("Please enter your full name");
       return false;
    }else if(!validateEmail(email)){
        alert("Please enter your correct email address");
        return false;
    }

    else if(password.length < 6){
        alert("Password must be greater than 5 words");
        return false;
    }else if((phone+"").length < 11){
        alert("Enter correct phone number");
        return false;
    }else{
        return true;
    }
}

function validateEmail(email) {
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}




// =========================== SEND REQUEST FUNCTION =====================


function sendRequest(nameValue,emailValue,passwordValue,phoneNumberValue){
    if(webAddress && signUpFiles !== "") {

        var webUrl = webAddress+signUpFiles;


        var data = {
            "name":nameValue ,
            "email":emailValue ,
            "password":passwordValue,
            "phone_number":phoneNumberValue
        };

        //"http://localhost/knowseverything/admin_files/registration_files/sign_up.php"


        $.ajax({
            type: 'post',
            url: webUrl ,

            data: data ,
            dataType: 'json',
            success: function (data) {

                console.log("returned data are"+JSON.stringify(data));
                console.log("\nresult are "+data['result']);
                var result = data['result'];

                if(result === "successful"){
                    alert("Sign up successfully");
                    // window.location.href="login.php";
                    document.getElementById("sign-up-form").reset();
                }
            },
            error: function(xhr, status, error) {

                console.log("error "+error);
                alert("error occured showed in console please check this");
            }


        });

    }else {
        alert("empty answer");

    }
}