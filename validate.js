function validateForm(){
    var fname = document.forms["user_details"]["firstName"].value;
    var lname = document.forms["user_details"]["lastName"].value;
    var city = document.forms["user_details"]["cityName"].value;
    if(fname == null || lname == "" || city == ""){
        alert("all required details were not supplied")
        return false;
    }
    return true;
}