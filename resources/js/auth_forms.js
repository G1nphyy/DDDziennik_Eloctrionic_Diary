let login_content = document.getElementById('password-container');
let login_eye = login_content.querySelector('div > img');
let login_input = login_content.querySelector('input');

login_eye.addEventListener('click', function(){
    if(login_input.type === 'password'){
        login_input.type = 'text';
        login_eye.src = login_eye.src.replace('off', 'on');
    }else{
        login_input.type = 'password';
        login_eye.src = login_eye.src.replace('on', 'off');
    }

});
