console.log('Hello js')

function validateData(){
    let txtEmail=document.getElementById('email');
    let txtPwd=document.getElementById('pwd');

    let email=txtEmail.value;
    let pwd=txtPwd.value;
    let msg='';
    if(email == null || email == ''){
        msg='Please enter your email\n';
    }
    else if(!email.includes('@')){
        msg='Your email is not correct\n';
    }
    else if(email.length<8){
        msg='Your email must be at least 8 characters\n';
    }
    else if(pwd == null || pwd == ''){
        msg='Please enter your password\n';
    }
    else if(pwd.length<6){
        msg='Your password must contain at least 6 characters\n';
    }

    let lblErrorMessage=document.getElementsByClassName('errorMessage')[0];
    lblErrorMessage.innerText=msg;

    if(msg==''){
        lblErrorMessage.classList.add('d-none');
        return true
    }

    lblErrorMessage.classList.remove('d-none'); 

    return false;

}