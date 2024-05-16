function SignupValidate(){
    var Name = document.forms['SUForm']['Name'].value;
    var Email = document.forms['SUForm']['Email'].value;
    var Contact = document.forms['SUForm']['Contact'].value;
    var Address = document.forms['SUForm']['Address'].value;
    var Pass = document.forms['SUForm']['Password'].value;
    var CPass = document.forms['SUForm']['CPassword'].value;

    if(Name == null || Name == ""){
        alert("Name is required !!!");
        return false;
    }

    if(Email == null || Email == ""){
        alert("Email is required !!!");
        return false;
    }

    if(Contact == null || Contact == ""){
        alert("Contact number is required !!!");
        return false;
    }

    if(Address == null || Address == ""){
        alert("Address is required !!!");
        return false;
    }

    if(Pass == null || Pass == ""){
        alert("Password is required !!!");
        return false;
    }else if(Pass.search(/[a-z]/)< 0){
        alert("Password required at least one letter");
        return false;
    }else if(Pass.search(/[A-Z]/)< 0){
        alert("Password required at least one UpperCase letter");
        return false;
    }else if(Pass.search(/[0-9]/)< 0){
        alert("Password required at least one digit");
        return false;
    }else if(Pass.search(/[!@#$%^&*]/) < 0){
        alert("Password required at least one Special Symbol");
        return false;
    }

    if(Pass != CPass){
        alert("Password doesn`t match !!!");
        return false;
    }
}

function FPValidate(){
    var Pass = document.forms['FPForm']['txtPassword'].value;
    var CPass = document.forms['FPForm']['txtCPassword'].value;

    if(Pass == null || Pass == ""){
        alert("Password is requied !!!");
        return false;
    }else if(Pass.search(/[a-z]/)< 0){
        alert("Password required at least one letter");
        return false;
    }else if(Pass.search(/[A-Z]/)< 0){
        alert("Password required at least one UpperCase letter");
        return false;
    }else if(Pass.search(/[0-9]/)< 0){
        alert("Password required at least one digit");
        return false;
    }else if(Pass.search(/[!@#$%^&*]/) < 0){
        alert("Password required at least one Special Symbol");
        return false;
    }

    if(Pass != CPass){
        alert("Password doesn`t match !!!");
        return false;
    }
}