/*
    |------------------------------
    |   Variables
    |------------------------------
    |
*/
var content = "<form id = 'form' method = 'post' action = '" + baseURL + "/scaffold/guipost/'>\
<input type = 'hidden' name = '_token' value = '" + token + "'>\
    <table class = 't'>\
        <tr><td>\
        <div class = 'input-field'>\
            <input id = 'TableName' name='TableName' required='' aria-required='true' type='text'>\
            <label for='TableName'>TableName</label></td>\
        </div>\
        </table>\
        <div class 'row'>\
        <button type = 'submit' class = 'val btn green col s12'>\
        <i class = 'material-icons left'>done</i>Done</button></div>\
        </form>";
var i = 0;
var j = 0;
var actions = "<div class='card-panel #fafafa grey lighten-5'>\
               <h4 class = 'center'>Rows</h4>\
               <div class = 'row center actionRow'>\
               <a href = '#' class = 'newattr btn blue'><i class = 'material-icons left'>add</i>new</a>\
               <a href = '#' class = 'rmattr btn red'><i class = 'material-icons left'>delete</i>remove</a>\
               <a href = '#' class = 'readyy btn orange'><i class = 'material-icons left'>layers</i>ready</a>\
                </div></div>";
jQuery.fn.extend({
    disable: function(state) {
        return this.each(function() {
            this.disabled = state;
        });
    }
});
/*
    |---------------------------
    |   functions
    |---------------------------
    |
*/
function option(i) {
    var options = '<div class="input-field col s12">\
    <select id = "opt' + i + '" name = "opt' + i + '" data-id = "' + i + '">\
        <option value = "String">String</option>\
        <option value = "longText">longText</option>\
        <option value = "Date">Date</option>\
        <option value = "boolean">boolean</option>\
        <option value = "binary">binary</option>\
        <option value = "float">float</option>\
        <option value = "integer">integer</option>\
        <option value = "bigInteger">bigInteger</option>\
        <option value = "json">json</option>\
     </select>\
    <label for = "opt' + i + '">Select Type</label>\
    </div>'
    return options;
}

function relation(i) {
    var relations = '<div class="input-field col s12">\
    <select id = "tbl' + i + '" name = "tbl' + i + '" class = "parent" data-id = "' + i + '">\
        ';
    jQuery.each(TableData, function(index, item) {
        relations += '<option value = "' + index + '">' + index + '</option>'
    });
    relations += '\
     </select>\
    <label for = "tbl' + i + '">Select Model</label>\
    </div>';
    return relations;
}

function Attributes(TableData) {
    var relations = '';
    jQuery.each(TableData, function(index, item) {
        relations += '<option value = "' + item + '">' + item + '</option>'
    });
    return relations;
}
/*
    |------------------------------------
    |   actions
    |------------------------------------
    |
*/
$(document).on('click', '.createNewTable', function() {
    $('.new').html(content);
    $('.actions').html(actions);
    $('#form').validate();
    $('.val').hide();
    $('.readyy').hide();
})
$(document).on('click', '.newattr', function() {
    $('select').material_select();
    $('.t tr:last').after("<tr><td>" + option(i) + "</td><td><div class = 'input-field'><input id = 'atr" + i + "' name = 'atr" + i + "' type='text'><label for = 'atr" + i + "'>Attribute</label></div></td></tr>\
    ")
    i++;
    $('select').material_select();
    $('.readyy').show();
})
$(document).on('click', '.readyy', function() {
    $('.val').show();
    $('.actionRow').html('')
    $('.actionRow').html("<a class = 'editt btn purple'><i class = 'material-icons left'>arrow_back</i>back</a>\
        <a href='#' class = 'relations btn #0d47a1 blue darken-4'><i class = 'material-icons left'>device_hub</i>One To Many</a></div>");
})
$(document).on('click', '.relations', function() {
    $('.t tr:last').after("<tr><td>" + relation(j) + "</td><td><div class='input-field col s12'><select class = 'class' id = 'on" + j + "' name = 'on" + j + "'><option></option><label for = 'on" + j + "'>Select Attributes</label></select></div></td></tr>");
    j++;
    $('select').material_select();
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
$(document).on("change", ".parent", function() {
    var value = $(this).val()
    var id = $(this).data('id')
    $.ajax({
        async: true,
        type: 'get',
        url: baseURL + '/scaffold/getAttributes/' + value + '/',
        success: function(response) {
            $("#on" + id).html(Attributes(response));
            $("#on" + id).material_select();
        }
    })
})