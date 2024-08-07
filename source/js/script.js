document.addEventListener("DOMContentLoaded", function() {
    console.log("Test JavaScript en ligne : DOM entièrement chargé et analysé");

    let signupBtn = document.getElementById("signupBtn1");
    let signinBtn = document.getElementById("signupBtn2");
    let nameField = document.getElementById("nameField");
    let emailField = document.getElementById("emailField");
    let title = document.getElementById("title");

    console.log("Éléments récupérés :", { signupBtn, signinBtn, nameField, emailField, title });

    signinBtn.onclick = function(){
        console.log("Bouton Connexion cliqué");
        nameField.style.display = "none";
        emailField.querySelector('input').setAttribute('placeholder', 'Nom');
        title.innerHTML = "Connexion";
        signupBtn.classList.add("disable");
        signinBtn.classList.remove("disable");
    }

    signupBtn.onclick = function(){
        console.log("Bouton Inscription cliqué");
        nameField.style.display = "flex";
        emailField.querySelector('input').setAttribute('placeholder', 'Email');
        title.innerHTML = "Inscription";
        signupBtn.classList.remove("disable");
        signinBtn.classList.add("disable");
    }
});
