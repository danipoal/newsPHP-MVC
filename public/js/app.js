// Mostrar popOut para iniciar sesion
function toggleIniciar() {
    var loginDiv = document.getElementById("loginPopOut");

    loginDiv.classList.toggle("display-none");
}

// Recibe el userId
function editUser(userId) {
    var userDiv = document.getElementById("user-item-" + userId);
    var usrSpan = userDiv.querySelector("span");

    // Change the Button to submit edition
    changeEditButton(userDiv.querySelector(".edit-button"));

    // Obtenemos informacion del Usuario
    // Hay que coger la informacion hasta el primer guion que es donde esta el id, y editar lo demas
    var indexOfDash = userDiv.textContent.indexOf("-");
    var indexOfEmail = userDiv.textContent.indexOf("(");
    var EndOfEmail = userDiv.textContent.indexOf(")");

    var idString = userDiv.textContent.substring(0, indexOfDash + 1); // Para obtener el - incluido
    var nameString = userDiv.textContent.substring(indexOfDash + 1, indexOfEmail); 
    var emailString = userDiv.textContent.substring(indexOfEmail + 1, EndOfEmail); 

    // Change the content to edit the user
    usrSpan.innerHTML = idString + '<input type="text" value="'+ nameString +
    '" /><input type="text" value="'+ emailString +'" />';
    //echo '<span>'.$contador .' - ' . $user->name . ' (' . $user->email . ')</span>';
    usrSpan.style.display = "flex";
    usrSpan.style.justifyContent = "center";
}

function changeEditButton(editButton) {
    // Cambiar estilo visual y contenido
    editButton.textContent = "Accept";
    editButton.classList.remove("edit-button");
    editButton.classList.add("accept-button");

    // Cambiar evento asociado para que acepte la edicion
    editButton.removeEventListener("click", editUser);
    editButton.addEventListener("click", acceptEdition);
}

function acceptEdition() {
    console.log("Enviando....")

}