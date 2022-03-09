var obj;
function check(){
    if (document.getElementById('regPssw').value == document.getElementById('ripPssw').value) {
      /*document.getElementById('message').style.color = 'green';
      document.getElementById('message').innerHTML = 'matching';*/
      document.getElementById('regBtn').disabled = false;
      console.log("matching");
    } else {
      /*document.getElementById('message').style.color = 'red';
      document.getElementById('message').innerHTML = 'not matching';*/
      document.getElementById('regBtn').disabled = true;
      console.log("not matching");
      
    }
}

function putData(){

    var name = document.getElementById("rName").value;
    var surName = document.getElementById("rSurname").value;
    var email = document.getElementById("rEmail").value;
    var phoneNumber = document.getElementById("pNumber").value;
    var psw = document.getElementById("regPssw").value;
    var confPsw = document.getElementById("ripPssw").value;

    var myHeaders = new Headers();
    myHeaders.append("Content-Type", "application/json");
  
    var raw = JSON.stringify({
        "name": name,
        "surName": surName,
        "email": email,
        "phoneNumber": phoneNumber,
        "psw": psw,
        "confPsw": confPsw
    });
  
    var requestOptions = {
        method: 'PUT',
        mode:"cors",
        headers: myHeaders,
        body: raw,
        redirect: 'follow'
    };
  
    fetch("http://matteodaaddato.altervista.org/Exam_test1/esame/php/register.php", requestOptions)
        .then(response => response.json())
        .then(result => obj=result)
        .then(function(obj){
        	console.log(obj);
            if(obj["status"] == false){
            	error("reg",obj["response"]);
            }else{
            	window.location.href = "http://matteodaaddato.altervista.org/Exam_test1/esame/index.php";
            }
        })
        .catch(error => console.log('error', error)); 
        
        
        

}

  






