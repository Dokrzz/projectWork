var postId = 0;
var eventId=0;
var postBodyElement = null;
var postNameElement = null;
var postDescriptionElement = null;
var postDateElement = null;

var temp = null

$('.post').find('.interaction').find('.edit').on('click', function (event) {
    event.preventDefault();

    postBodyElement = event.target.parentNode.parentNode.childNodes[1];
    var postBody = postBodyElement.textContent;
    postId = event.target.parentNode.parentNode.dataset['postid'];
    $('#post-body').val(postBody);
    $('#edit-modal').modal();
})

$('.event').find('.interaction').find('.edit').on('click', function (event) {
    event.preventDefault();

    postNameElement = event.target.parentNode.parentNode.childNodes[1];
    postDescriptionElement = event.target.parentNode.parentNode.childNodes[3];
    postDateElement = event.target.parentNode.parentNode.childNodes[5];
    console.log(event.target.parentNode.parentNode.childNodes);
    var postName = postNameElement.textContent;
    var postDescription = postDescriptionElement.textContent;
    var postDate = postDateElement.textContent;``

    eventId = event.target.parentNode.parentNode.dataset['eventid'];

    $('#post-name').val(postName);
    $('#post-description').val(postDescription);
    $('#post-date').val(postDate);
    $('#edit-modal').modal();
});

$('#modal-save').on('click', function () {
    $.ajax({
        method: 'POST',
        url: urlEdit,
        data: {body: $('#post-body').val(), postId: postId, _token: token}
        })
        .done(function(msg) {
            $(postBodyElement).text(msg['new_body']);
            $('#edit-modal').modal('hide');
        });
});

$('#modal-save-event').on('click', function () {
    $.ajax({
        method: 'POST',
        url: urlEditEvent,
        data: {name: $('#post-name').val(), description: $('#post-description').val(), date: $('#post-date').val(),
            eventId: eventId, _token: token}
    })
        .done(function(msg) {
            $(postDescriptionElement).text(msg['new_description']);
            $(postNameElement).text(msg['new_name']);
            $(postDateElement).text(msg['new_date']);
            console.log(msg)
            $('#edit-modal').modal('hide');
        });
});

$('.like').on('click', function(event) {
    event.preventDefault();
    postId = event.target.parentNode.parentNode.dataset['postid'];
    var isLike = event.target.previousElementSibling == null;
    $.ajax({
        method: 'POST',
        url: urlLike,
        data: {isLike: isLike, postId: postId, _token: token}
    })
        .done(function() {
            event.target.innerText = isLike ? event.target.innerText == 'Like' ? 'You like this post' : 'Like' : event.target.innerText == 'Dislike' ? 'You don\'t like this post' : 'Dislike';
            if (isLike) {
                event.target.nextElementSibling.innerText = 'Dislike';
            } else {
                event.target.previousElementSibling.innerText = 'Like';
            }
        });
});
