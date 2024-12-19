let btn = document.getElementById('btn');
let login = document.getElementById('login');

btn.addEventListener('click', async function (event){
    event.preventDefault();
    try{
        if(login.value != ''){
            console.log(login.value);
            let query = await fetch('adduser.php', {
                method: 'POST',
                headers: {'Content-Type': 'application/x-www-form-urlencoded'},
                body: new URLSearchParams({login: login.value})
            });
            let response = await query.text();
            console.log(response);
        }
    }
    catch (error) {
        console.log(error);
    }
});