var createsNewComment = document.querySelectorAll('.commentBtn');
for (let createNewComment of createsNewComment) {
    createNewComment.onclick = function () {
        let postId = createNewComment.getAttribute('name');
        let input = document.getElementById(postId);
        let button = document.getElementById('button'+postId);
        console.log(button);
        input.setAttribute('type','text');
        button.removeAttribute('hidden');
        console.log(input);
    }
}
