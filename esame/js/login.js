function getData(){

    var email = document.getElementById("lEmail").value;
    var psw = document.getElementById("lPssw").value;

    var myHeaders = new Headers();
    myHeaders.append("Content-Type", "application/json");
    myHeaders.append("Cookie", "PHPSESSID=909dbd7564ffeafeea8a3942dbe9c699");

  
    var requestOptions = {
        method: 'GET',
        mode:"cors",
        headers: myHeaders,
        redirect: 'follow'
    };
  
    fetch("http://matteodaaddato.altervista.org/Exam_test1/esame/php/logIn.php?email="+email+"&psw="+psw, requestOptions)
        .then(response => response.json())
        .then(result => obj=result)
        .then(function(obj){
        	console.log(obj);
            if(obj["status"] == false){
            	//error("reg",obj["response"]);
                alert("Wrong email or password");
            }else{
            	window.location.href = "http://matteodaaddato.altervista.org/Exam_test1/esame/homePage.php";
            }
        })
        .catch(error => console.log('error', error)); 

}

