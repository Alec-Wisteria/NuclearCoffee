const signUpButton=document.getElementById('signUpButton');
const signInButton=document.getElementById('signInButton');
const signInForm=document.getElementById('signIn');
const signUpForm=document.getElementById('signup');

signUpButton.addEventListener('click',function(){
    signInForm.style.display="none";
    signUpForm.style.display="block";
})
signInButton.addEventListener('click', function(){
    signInForm.style.display="block";
    signUpForm.style.display="none";
})

document.getElementById("recoverLink").addEventListener("click", function() {
    document.getElementById("signIn").style.display = "none";
    document.getElementById("recoverAccount").style.display = "block";
  });
  
  document.getElementById("backToSignInButton").addEventListener("click", function() {
    document.getElementById("recoverAccount").style.display = "none";
    document.getElementById("signIn").style.display = "block";
  });
  