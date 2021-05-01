function fun1(){
    var fname = document.myform1.name.value;
    var email = document.myform1.email.value;
    var bname = document.myform1.subject.value;
    var desc = document.myform1.message.value;

    if (fname == "") {
        alert("First Name must be filled out");
        return false;
    }

    if (email == "") {
        alert("Last Name must be filled out");
        return false;
    }

    if (bname == "") {
        alert("Mobile Number/Email must be filled out");
        return false;
    }

    if (desc == "") {
        alert("Mobile Number/Email must be filled out");
        return false;
    }

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() 
    {
        if (this.readyState == 4 || this.status == 200){
            alert("We will contact you as soon as possible !");
        }
    };
    xhttp.open("GET", "./Lawer/sender.php?fname="+fname+"&email="+email+"&bname="+bname+"&desc="+desc, true);
    xhttp.send();
}