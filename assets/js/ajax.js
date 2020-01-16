let spinner = document.getElementById("spinner");

function showSpinner() 
{
    spinner.style.display = "inline";
}

function clearSpinner() 
{
    spinner.style.display = "none";
}

function showErrors(value) 
{
    let inputs = document.getElementsByTagName("input");
        //console.log(inputs);
    for(let i = 0; i < inputs.length; i++) 
    {
        let input = inputs[i];
        // console.log(input.name);
        // console.log(value);

        // on check le name présent dans l'array. Si oui, alors retourne l'emplacement dans l'array, si non, alors retourne -1
        if(value.indexOf(input.name) >= 0)
        {
            input.classList.add("is-invalid");
        }
    }
}

function clearErrors() 
{
    let inputs = document.getElementsByTagName("input");
    for(let i = 0; i < inputs.length; i++) 
    {
        inputs[i].classList.remove("is-invalid");
        inputs[i].classList.add("is-valid");
    }
}

function showResult(value) 
{
        // console.log(value);
    let target = document.getElementById("result");
    target.innerHTML = "<div class='alert alert-success'>Vous êtes bien enregistré " + value.firstname + "</div>";
}

// METHOD 1 to gather datas
// function gatherFormData(form)
// {
//     let inputs = form.getElementsByTagName("input");
//         // console.log(inputs);
//     let array = [];
//     for(i=0; i < inputs.length; i++)
//     {
//         let inputValue = inputs[i].name + "=" + inputs[i].value;
//         array.push(inputValue);
//     }
    
//     let select = form.getElementsByTagName("select");
//         // console.log(select);
//     let selectValue = select[0].name + "=" + select[0].value;
//         // console.log(selectValue);
//     array.push(selectValue);

//     return array.join("&");
// }

function registerEmployee() 
{
    // Récupération des données
    let form = document.getElementById("insert_company");
        // console.log(form);

    clearErrors();
    showSpinner();
    disableSubmitButton();

    // METHOD 1 to gather datas
    // let form_data = gatherFormData(form);

    // METHOD 2 to gather datas
    let form_data = new FormData(form);
    // On check les datas
    // for([key, value] of form_data.entries())
    // {   
    //     console.log(key + ": " + value);
    // }

    let xhr = new XMLHttpRequest();

    xhr.open("POST", "insert_company.php", true);

    // SI ON UTILISE la classe FormData(), ne pas utiliser l'encodage suivant
    // xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");

    xhr.onreadystatechange = () => {
        if(xhr.readyState == 4 && xhr.status == 200)
        {
            let result = xhr.responseText;
                console.log(result);
            
            clearSpinner();
            enableSubmitButton();

            let json = JSON.parse(result);

            // nous vérifions si JSON à la clé
            // json.has() marche aussi mais pas sur vieux navigateur
            if(json.hasOwnProperty("errors") && json.errors.length > 0)
            {
                showErrors(json.errors);
            } else {
                showResult(json.infos);
            }
            
        }
    };
    
    xhr.send(form_data);
}

let btnSubmit = document.getElementById("submit");
    // console.log(btnSubmit);
// EN FIN DE PROJET POUR UN BOUTON QUI RECOUPERA LES 2 COMPORTEMENTS
// btnSubmit.addEventListener("click", registerEmployee);
// Nous passons en argument les événements traité sur notre boutons afin de les bloquer si Javascript est actif. Si non actif, nous continuons sur notre PHP
btnSubmit.addEventListener("click", function(event){
    event.preventDefault();
    registerEmployee();
});

function disableSubmitButton()
{
    btnSubmit.disabled = true;
    btnSubmit.innerHTML = "En cours ..."
}

function enableSubmitButton()
{
    btnSubmit.disabled = false;
    btnSubmit.innerHTML = "Inscription"
}