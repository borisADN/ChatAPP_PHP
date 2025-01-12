const form = document.querySelector(".typing-area");
const inputField = form.querySelector(".input-field");
const sendBtn = form.querySelector("button");
const chatBox = document.querySelector(".chat-box");

form.onsubmit = e => {
  e.preventDefault();
};
sendBtn.onclick = ()=> {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/insert-chat.php", true);
    xhr.onload = () => {
      if (xhr.readyState === XMLHttpRequest.DONE) {
        if (xhr.status === 200) {

        inputField.value = "";
        scrollToBottom();
        }
      }
    }
    let formData = new FormData(form);
    xhr.send(formData);
}
setInterval(() => {
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "php/get-chat.php", true);
  xhr.onload = () => {
      if (xhr.readyState === XMLHttpRequest.DONE) {
          if (xhr.status === 200) {
              let data = xhr.response;
              //usersList.innerHTML = data;

              //Vérifie si searchBar n'a pas la classe "active" avant de mettre à jour usersList
              chatBox.innerHTML = data;
              scrollToBottom();

          } else {
              console.error("Erreur de requête. Statut :", xhr.status);
          }
      }
  };
  let formData = new FormData(form);
  xhr.send(formData);
  
}, 500);
function scrollToBottom(){
    // La fonctionnalite de decalage automatique vers le bas aussi ne fonctionnne pas
    chatBox.scrollTop = chatBox.scrollHeight;
}