function show_function(e) {
    
    let temp = document.getElementById("photo" + e).src;
    let second_photo = document.getElementById("secondphoto" + e).value;
    
    if (second_photo) {
        document.getElementById("photo" + e).src = document.getElementById(
            "secondphoto" + e
        ).value;
        document
            .getElementById("photo" + e)
            .setAttribute(
                "data-src",
                document.getElementById("secondphoto" + e).value
            );
        document.getElementById("secondphoto" + e).value = temp;
    }
}
