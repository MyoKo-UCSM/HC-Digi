let pswicon = $('.inputpassword-container img');
let logininputs = $('.login-form input')

if(pswicon.length > 0){
    pswicon.click(function(){
        let currentsrc = this.src, temp;
        if(currentsrc.includes('carbon')){
            temp = currentsrc.replace('carbon_view-off', 'eye-icon');
            $(this).siblings('input').attr('type', 'text');
        } else{
            temp = currentsrc.replace('eye-icon', 'carbon_view-off');
            $(this).siblings('input').attr('type', 'password');
        }

        this.setAttribute('src', temp);
    });

    logininputs.on('input',function(){
        if(this.value == '') $(this).siblings('label').css('display', 'block');
        else $(this).siblings('label').css('display', 'none');
    });
}