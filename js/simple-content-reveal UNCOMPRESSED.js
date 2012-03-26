//
// The following code is a modified version of that provided by http://www.quirksmode.org/js/cookies.html
// Kudos to them for their assistance
//

// Create a cookie

function acr_createCookie(name, value, hours) {
    if (hours) {
        var date = new Date();
        date.setTime(date.getTime() + (hours * 60 * 60 * 1000));
        var expires = "; expires=" + date.toGMTString();
    } else {
        var expires = "";
    }
    document.cookie = name + "=" + value + expires + "; path=/";
}

// Read a cookie

function acr_readCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') c = c.substring(1, c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
    }
    return null;
}

// Delete a cookie

function acr_eraseCookie(name) {
	acr_createCookie(name,"",-1);
}

//
// The following is my own code
//

// Set initial CSS & heading text

function set_initial_css(swap_id, css_default) {
	var title = acr_readCookie('acrTITcookie_' + swap_id);
    if (title) {document.getElementById('scrtit_' + swap_id).innerHTML = title;}

    var state = acr_readCookie('acrCSScookie_' + swap_id);
    if (state) {
        return state;
    } else {
        return css_default;
    }

}

// Set initial image state

function set_initial_img(swap_id, img_default) {
    var state = acr_readCookie('acrIMGcookie_' + swap_id);
    if (state) {
        return state;
    } else {
        return img_default;
    }
}

// Set initial ALT & TITLE for image

function set_initial_alt(swap_id, alt_default) {
    var state = acr_readCookie('acrALTcookie_' + swap_id);
    if (state) {
        return state;
    } else {
        return alt_default;
    }
}

// Swap the images and CSS between 2 states

function swap_display(swap_id, cookie, heading1, heading2) {
    var id_text = "scrdiv_" + swap_id;
    var id_image = "scrimg_" + swap_id;
	var id_title = "scrtit_" + swap_id;

    // Swap the display element of the named ID

    var state = document.getElementById(id_text).style.display;
    if (state == "none") {
        var new_display = "block";
    } else {
        var new_display = "none";
    }
    document.getElementById(id_text).style.display = new_display;

    // Swap the URL and heading of the named ID

    var state = document.getElementById(id_image).src;

    if (state != undefined) {
        var src_name = state.substr(state.length - 10, 6);
        var src_ext = state.substr(state.length - 3, 3);
        var src_path = state.substr(0, state.length - src_name.length - src_ext.length - 1);

        if (src_name == "image1") {
            var src_name = "image2";
            var alt_name = "Hide content";
			var new_title = heading2;
        } else {
            var src_name = "image1";
            var alt_name = "Reveal content";
			var new_title = heading1;
        }


        document.getElementById(id_image).src = src_path + src_name + "." + src_ext;
        document.getElementById(id_image).alt = alt_name;
        document.getElementById(id_image).title = alt_name;



		var state = document.getElementById(id_title);
		if (state != undefined) {
			document.getElementById(id_title).innerHTML = new_title;
		}

    }

	// Update the cookie or, if switched off, delete it

    if (cookie != "0") {
        acr_createCookie("acrIMGcookie_" + swap_id, src_name, cookie);
        acr_createCookie("acrALTcookie_" + swap_id, alt_name, cookie);
        acr_createCookie("acrTITcookie_" + swap_id, new_title, cookie);
        acr_createCookie("acrCSScookie_" + swap_id, new_display, cookie);
	} else {
		acr_eraseCookie("acrIMGcookie_" + swap_id);
		acr_eraseCookie("acrALTcookie_" + swap_id);
		acr_eraseCookie("acrTITcookie_" + swap_id);
		acr_eraseCookie("acrCSScookie_" + swap_id);
    }

}