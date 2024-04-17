$(document).ready(function() {
    AIZ.plugins.bootstrapSelect('refresh');
});

//Report Post
$(document).ready(function() {
    $("#reportPost").click(function() {
        var post_id = $('#reportPost').attr('post_id');
        $('#postIdForReport').val(post_id);

    });
});

// Profile picture change


var imgProfile = document.querySelector('#profilePic');
var ProfilePicUpdate = document.querySelector('#ProfilePicUpdate');
if (ProfilePicUpdate != null) {
    ProfilePicUpdate.addEventListener('change', function() {
        //this refers to file
        const choosedFile = this.files[0];

        if (choosedFile) {

            const reader = new FileReader(); //FileReader is a predefined function of JS

            reader.addEventListener('load', function() {
                imgProfile.setAttribute('src', reader.result);


            });

            var url = reader.readAsDataURL(choosedFile);
            let pofilePicForm = document.querySelector('#pofilePicForm').submit();
        }
    });

}

function imgFileUpload(privewId, FileUpload) {
    var fileupload = document.getElementById(FileUpload);
    fileupload.click();
    fileupload.onchange = function(event) {

        var preview = document.querySelector(privewId);
        var reader = new FileReader();
        var file = document.getElementById(FileUpload).files[0];
        reader.addEventListener("load", function() {

            var imgEmt = new Image(70, 70); // width, height values are optional params
            var img = imgEmt.src = reader.result;

            preview.append(imgEmt);

        }, false);

        if (file) {
            reader.readAsDataURL(file);
        }


        preview.innerHTML = ''
        if (FileUpload == 'FileUploadMedia') {

            document.getElementById('mediaUploadForm').submit();
        }

    }

}

// Post Box Image Priview


// Comment Box Show and Hide

function commentBtn(commentId) {
    var comment = 'reply' + commentId;
    var id = document.getElementById(comment);


    if (id.style.visibility === "hidden") {
        id.style.opacity = "1";

        id.style.visibility = "visible";
        id.style.height = "auto";



    } else {
        id.style.opacity = "0";
        id.style.visibility = "hidden";
        id.style.height = "0px";



    }

}