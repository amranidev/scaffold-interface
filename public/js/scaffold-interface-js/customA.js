$(document).on("click", ".viewEdit", function() {
	GETT($(this).data('link'));
})
$(document).on("click", ".viewShow", function() {
	GETT($(this).data('link'));
})
function GETT(dataLink) {
    $.ajax({
        async: true,
        method: 'get',
        url: baseURL + dataLink,
        success: function(response) {
            window.location = response
        }
    });
}
