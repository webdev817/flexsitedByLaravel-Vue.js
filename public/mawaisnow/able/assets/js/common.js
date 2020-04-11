function showthefilename(ths, showid , msg= 'Choose file') {
    f = ths.value
    f = f.replace(/.*[\/\\]/, '');
    if (f != '') {
        $("#" + showid).val(f);
    } else {
        $("#" + showid).val(msg);
    }
}
