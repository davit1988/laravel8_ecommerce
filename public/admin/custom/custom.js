$(document).ready(function () {
    var _token = $('#_token').attr('content');
})

function previewImage(that) {
    var img = document.createElement('img');
    img.style.cssText = 'width:150px;height:150px';
    let reader = new FileReader();
    reader.onload = (e) => {
        img.src = e.target.result;
        $(that).closest('.form-group').find('#preview-image').html(img);
    }
    reader.readAsDataURL(that.files[0]);
}

function flashMessage(msg) {
    flash(msg,{

        // background color
        'bgColor' : '#5cb85c',

        // text color
        'ftColor' : 'white',

        // or 'top'
        'vPosition' : 'bottom',

        // or 'left'
        'hPosition' : 'right',

        // duration of animation
        'fadeIn' : 400,
        'fadeOut' : 400,

        // click to close
        'clickable' : true,

        // auto hides after a duration time
        'autohide' : true,

        // timout
        'duration' : 2000

    });
}
function deleteFunction() {
    if (!confirm("Are You Sure to delete this"))
        event.preventDefault();
}
