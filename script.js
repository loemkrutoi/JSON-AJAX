let button = document.getElementById('btn');
let input = document.getElementById('login');

button.addEventListener('click', async function JSONFunc (event){
    event.preventDefault();
    try{
        let inputValue = input.value;
        let query = await fetch(`ajaxJson.php`,{
            method: 'POST',
            headers: {'Content-Type': 'application/json'},
            body: JSON.stringify({'login': inputValue})
            });
            let response = await query.text();
            if(response) {
            div.innerHTML = response;
        }
    }
    catch (error) {
        console.log(error);
    };
});