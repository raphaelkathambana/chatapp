function redirect() {
    window.location.assign("/profile");
}

$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('#user_search_input').on("input", function() {
        let keyword = $(this).val();
        
        console.log(keyword);
        $.ajax({
            url: '/search_user',
            method: 'POST',
            data: {keyword},
            // processData: false,
            // contentType: false,
            success: function (response) {
                console.log(response);
                let sideListContent = "";
                if (response.length < 1) {
                    sideListContent += `<h4 class='side_list_title'>No results found for '${keyword}'</h4>`
                } else {
                sideListContent += `<h4 class='side_list_title'>Showing results for '${keyword}'</h4>`
                for (let user of response) {
                    let userProfilePhoto = user.profile_photo ? user.profile_photo : 'default.png';
                    sideListContent += `
                    <div class='side_list_item'>
                        <img class='side_list_photo' src='uploads/${userProfilePhoto}' />
                        <p class='side_list_text'>${user.name}</p>
                    </div>
                    `;
                }
            }
                $("#side_list").html(sideListContent);
                
            },
            error: function (error) {
                console.log(error);
            }
        }) 
     });
});