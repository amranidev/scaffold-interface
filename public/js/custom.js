jQuery.fn.extend({
    disable: function(state) {
        return this.each(function() {
            this.disabled = state;
        });
    }
});
var content = "<form id = 'form' method = 'post' action = '" + baseURL + "/scaffold/guipost/'><input type = 'hidden' name = '_token' value = '" + token + "'>\
    <table class = 't'>\
        <tr><td>\
        <div class = 'input-field'>\
            <input id = 'TableName' name='TableName' required='' aria-required='true' type='text'>\
            <label for='TableName'>TableName</label></td>\
        </div>\
        </table>\
        <div class 'row'>\
        <button type = 'submit' class = 'val btn green col s12'><i class = 'material-icons left'>done</i>Done</button></div>\
        </form>";
var i = 0;

function option(i) {
    var options = '<div class="input-field col s12">\
    <select id = "opt' + i + '" name = "opt' + i + '">\
        <option value="String">String</option>\
        <option value= "longText">longText</option>\
        <option value="Date">Date</option>\
        <option value="Bool">boolean</option>\
        <option value= "binary">binary</option>\
        <option value= "float">float</option>\
        <option value = "integer">integer</option>\
        <option value = "bigInteger">bigInteger</option>\
        <option value = "json">json</option>\
     </select>\
    <label for = "opt' + i + '">Materialize Select</label>\
    </div>'
    return options;
}
var actions = "<div class='card-panel #fafafa grey lighten-5'>\
                <h4 class = 'center'>Rows</h4>\
               <div class = 'row center actionRow'>\
               <a href = '#' class = 'newattr btn blue'><i class = 'material-icons left'>add</i>new</a>\
               <a href = '#' class = 'rmattr btn red'><i class = 'material-icons left'>delete</i>remove</a>\
               <a href = '#' class = 'readyy btn orange'><i class = 'material-icons left'>layers</i>ready</a>\
                </div></div>";
$(document).on('click', '.createNewTable', function() {
    $('.new').html(content);
    $('.actions').html(actions);
    $('#form').validate();
    $('.val').hide();
})
$(document).on('click', '.newattr', function() {
    $('select').material_select();
    $('.t tr:last').after("<tr><td>" + option(i) + "</td><td><div class = 'input-field'><input id = 'atr" + i + "' name = 'atr" + i + "' type='text' class='validate' required = '' aria-required = 'true'><label for = 'atr" + i + "'>attribute</label></div></td></tr>\
    ")
    i++;
    $('select').material_select();
})
$(document).on('click', '.readyy', function() {
    $('.val').show();
    $('.actionRow').html('')
    $('.actionRow').html("<button class = 'editt btn purple'><i class = 'material-icons left'>arrow_back</i>back</button>");
})
$(document).on('click', '.rmattr', function() {
    $('.t tr:last').remove();
})
$(document).on('click', '.editt', function() {
    $('.actions').html(actions);
    $('.val').hide();
})
$(document).ready(function() {
    $('.valide').hide();
    $('.newattr').hide();
    $('.rmattr').hide();
    $('.rollback').hide();
    $('select').material_select();
});
$(document).on('dblclick', '.msg', function() {
    $('.msg').remove();
});
$.validator.setDefaults({
    errorClass: 'invalid',
    validClass: "valid",
    errorPlacement: function(error, element) {
        $(element).closest("#form").find("label[for='" + element.attr("id") + "']").attr('data-error', error.text());
    }
});
$("#form").validate({
    rules: {
        dateField: {
            date: true
        }
    }
});
