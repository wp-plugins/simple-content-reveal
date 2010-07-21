function swap_display(id_text,id_image) {
    var state = document.getElementById(id_text).style.display;
    if (state=="none") {
        document.getElementById(id_text).style.display="block";
    } else {
        document.getElementById(id_text).style.display="none";
    }
    var state = document.getElementById(id_image).src;
    if (state!=undefined) {
        var src_name = state.substr(-10,6);
        var src_ext = state.substr(-3,3);
        var src_path = state.substr(0,state.length - src_name.length - src_ext.length - 1);
        if (src_name=="image1") {var src_name="image2";} else {var src_name="image1";}
        document.getElementById(id_image).src = src_path + src_name + "." + src_ext;
    }
}