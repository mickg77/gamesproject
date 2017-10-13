function myFunction(){
    
    var x=document.getElementById("myTopnav");
    
    if(x.className==="topnav"){
        x.className+=" responsive";
    }
    else {
        x.className ="topnav";
    }
    
}

$(document).ready(function(){
    
   $('#myform').keyup(function(){
       //we have left the pwd1 box
       if(document.getElementById("pwd1").value.length <8 && document.getElementById("pwd2").value.length<8){
           document.getElementById("length").innerHTML="Password Too Short";
           
       }
        
       else {
           document.getElementById("length").innerHTML="";
       }
       
       if(document.getElementById("pwd1").value!=document.getElementById("pwd2").value ){
           document.getElementById("match").innerHTML="Passwords don't match";
             
               
       }
           
       else{
          document.getElementById("match").innerHTML="";
       }
       
   });
   
   
   
   

    
});