function addComment(rid) {
    let textArea = document.getElementById("addCommentArea_" + rid)
    if (textArea !== null && textArea.value.length > 0) {
        sendAjaxRequest("POST", "/api/publication/" + rid + "/comment", { 'text': textArea.value },
            (request) => {
                if (request.status == 200) {

                }
            })
    }
}
