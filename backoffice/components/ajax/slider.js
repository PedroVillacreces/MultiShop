$(document).on('click', '.deleteSliderButton', function () {
    var agree = confirm("¿Realmente desea eliminarlo? ");
    if (agree) return true;
    return false;
});