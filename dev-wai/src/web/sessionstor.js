function sstor()
    {
        if(sessionStorage.firstname){
            var inputt = document.getElementById("firstname").value;
        sessionStorage.firstname = inputt;
        } 
        else
      sessionStorage.setItem("firstname"," ");
      if(sessionStorage.lastname){
            var inputt = document.getElementById("lastname").value;
        sessionStorage.lastname = inputt;
        } 
        else
      sessionStorage.setItem("lastname"," ");
      if(sessionStorage.email){
            var inputt = document.getElementById("email").value;
        sessionStorage.email = inputt;
        } 
        else
      sessionStorage.setItem("email"," ");
      if(sessionStorage.text){
            var inputt = document.getElementById("text").value;
        sessionStorage.text = inputt;
        } 
        else
      sessionStorage.setItem("text"," ");
      if(sessionStorage.phone){
            var inputt = document.getElementById("phone").value;
        sessionStorage.phone = inputt;
        } 
        else
      sessionStorage.setItem("phone"," ");
    }


    function Show()
    {
      alert( "Firstname:"+sessionStorage.firstname +"  Lastname:"+ sessionStorage.lastname +"  Email:"+ sessionStorage.email +"  Text:"+ sessionStorage.text +"  Phone:"+ sessionStorage.phone );
    }



    var c=0;

    
    function changecolor()
    {
      if(c%3==0){
      document.body.style.backgroundColor = "lightblue";
      var x = document.createElement("P");                    
      var t = document.createTextNode("lightblue");    
      x.appendChild(t);                                         
      document.body.appendChild(x);     
      c=c+1;
      }
      else
       if(c%3==1){
      document.body.style.backgroundColor = 'violet';
      var x = document.createElement("P");                    
      var t = document.createTextNode("violet");    
      x.appendChild(t);                                         
      document.body.appendChild(x);     
      c=c+1;
      }
      else
      if(c%3==2){
        document.body.style.backgroundColor = "black";
        var x = document.createElement("P");                    
      var t = document.createTextNode("black");    
      x.appendChild(t);                                         
      document.body.appendChild(x);     
        c=c+1;
        }


    }