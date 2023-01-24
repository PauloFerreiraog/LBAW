function start_likes() {
    let like_buttons = document.querySelectorAll(".like_button");

    like_buttons.forEach(button => {

        let id = button.id.replace(/\D/g, '');
       
        button.addEventListener("click", (event) => {
            let like_ajax = new XMLHttpRequest();
            like_ajax.onload = function() {
                if (like_ajax.status == 200) {
                    if (button.classList.contains("clicked")) {

                        document.getElementById("likes_" + id).innerHTML = parseInt(document.getElementById("likes_" + id).innerHTML) - 1 + " likes";
                        button.classList.remove("clicked")

                    } else {
                        document.getElementById("likes_" + id).innerHTML = parseInt(document.getElementById("likes_" + id).innerHTML) + 1 + " likes";
                        button.classList.add("clicked")
                    }
                } else {
                }
            }

            like_ajax.open("POST", "/api/publication/" + id + "/like", true);
            like_ajax.setRequestHeader('X-CSRF-TOKEN', document.head.querySelector("[name~=csrf-token][content]").content)
            like_ajax.send();
        })
    });
}

start_likes();
