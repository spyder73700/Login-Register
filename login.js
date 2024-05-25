 

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
       if(!emailcheck.value.match(/^[A-Za-z\.\-0-9]*[@][g][m][a][i][l][\.][c][o][m]$/)){
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
         var emailpattern = "^[A-Za-z\.\-0-9]*[@][g][m][a][i][l][\.][c][o][m]$";
       if(!emailcheck.value.match(emailpattern)){
         errormsg.innerHTML = "please enter a vaild email";
       }
       else{
        errormsg.innerHTML = "";
       }
      }
  
      function removeerror(){
        console.log("remove");
        const emailcheck = document.querySelector('#email');
        const errormsg =document.querySelector('#email-error');
        if(emailcheck.value.trim() === ''){
          errormsg.innerHTML = "";
        }
  
      }
  
  
      function removeerror2(){
        console.log("remove");
        const emailcheck = document.querySelector('#email2');
        const errormsg =document.querySelector('#email-error2');
        if(emailcheck.value.trim() === ''){
          errormsg.innerHTML = "";
        }
  
      }
      
     