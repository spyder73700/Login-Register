let buton = document.getElementById('Register-button');
let rem =1;// this is for removing strong pass mssg
let valid_email= false;
function display(popupname,hidename){
  let show  =document.getElementById(popupname);
  let hide =document.getElementById(hidename);
  console.log(show);
  console.log(hide);
     show.style.display="flex";
     hide.style.display="none";
     
}

 function popup(popupname,hidename){

  let show  =document.getElementById(popupname);
  let hide =document.getElementById(hidename);
  console.log(show);
  console.log(hide);
  
     show.style.display="flex"
     hide.style.display="none";
  
  
  }
  
  function validemail(){
    console.log("asf");
     let emailcheck = document.querySelector('#email');
     let errormsg =document.querySelector('#email-error');
   if(!emailcheck.value.match(/^[A-Za-z\.\0-9]*[@][g][m][a][i][l][\.][c][o][m]$/)){
     errormsg.innerHTML = "please enter a vaild email";
     
   }
   else{
     errormsg.innerHTML = "";
   }
   
  }
  
  function validemail2(){
    console.log("validemail");
     const emailcheck = document.querySelector('#email2');
     const errormsg =document.querySelector('#email-error2');
     var emailpattern = "^[A-Za-z\.\0-9]*[@][g][m][a][i][l][\.][c][o][m]$";
   if(!emailcheck.value.match(emailpattern)){
     errormsg.innerHTML = "please enter a vaild email";
   }
   else{
    errormsg.innerHTML = "";
    valid_email = true;
   }
  }

  function removeerror(removeid , errorpopup){
    console.log("remove");
    const emailcheck = document.getElementById(removeid);
    const errormsg =document.getElementById(errorpopup);
    const check ="Password is short";
    if(emailcheck.value.trim() === ''){
      errormsg.innerHTML = "";
    }
    if(rem==0){
        console.log("das");
        errormsg.innerHTML = "";
    }

  }
  
  function strength(){
        console.log("strength");
        
        var pas = document.querySelector('#passwordcheck');
        var str =  document.querySelector('#outbox');
         var pass  = pas.value;
         console.log(pass);
         if(pass.length<5){
          str.innerHTML= "Password is short";
          str.style.color='red';
         }
         else{
          if(pass.search(/[a-z]/)!=-1 && pass.search(/[A-Z]/)!=-1 && pass.search(/[0-9]/)!=-1 && pass.search(/[\~\!\@\#\$\%\^\&\*\(\)\_\+\=\{\}\[\;\:\'\'\.\,\<\>\?\/\|]/)!=-1){
            str.innerHTML= "Password is Strong";
            rem = 0;
            str.style.color='#29FB04';
          }
          else if(pass.search(/[a-z]/)!=-1 && pass.search(/[A-Z]/)!=-1 && pass.search(/[\~\!\@\#\$\%\^\&\*\(\)\_\+\=\{\}\[\;\:\'\'\.\,\<\>\?\/\|]/)!=-1){
            str.innerHTML= "Password is medium";
            str.style.color='#FF9800';
          }
           else if(pass.search(/[a-z]/)!=-1 && pass.search(/[A-Z]/)!=-1){
            str.innerHTML= "Password is weak";
            str.style.color='red';
          }
          else{
            str.innerHTML= "Please add lower and upper character";
            str.style.color='red';

          }
         }
       }
       
       
 
  function confirmpassword( password , confirmpassword){
       console.log("confirmpass");
      
      
        let pass1 = document.getElementById(password).value;
        let pass2 = document.getElementById(confirmpassword).value;
        let mssg = document.getElementById('confirm');
        if(pass2.length!=0 ){
            if(pass1!=pass2 ){
              mssg.innerHTML="password doesnot match";
              buton.disabled = true;
            }
            else if(pass1==pass2 && rem==1){
              alert("Please make Strong password");
              buton.disabled = true;
            }
            else{
            mssg.innerHTML="";
            const uname =document.querySelector('#name2') ;
            const em = document.querySelector('#email2');
            let check_empty = false;
            if(uname.value.trim()==='' || em.value.trim()===''){
                check_empty = true;
             }
            if(check_empty === false && valid_email===true){
               buton.disabled = false;
              }
           
            }  
        }
        
  }

  function diablebutton(){
    console.log("puchi");
    buton.disabled = true;
  }
 
  