//helper function
function inArray(needle, haystack) {
    var length = haystack.length;
    for (var i = 0; i < length; i++) {
        if (haystack[i].onData == needle) return true;
        if (haystack[i].table == needle) return true;
    }
    return false;
}
// transitions and animations
Vue.transition('fade', {
    enterClass: 'fadeInRight',
    leaveClass: 'fadeOutLeft'
});
Vue.transition('actions', {
    enterClass: 'fadeInRight',
    leaveClass: 'zoomOutUp'
});
var vm = new Vue({
    el: 'body',
    data: {
        //Booleans
        show: false,
        submit: false,
        error: false,
        OneToManyBool: false,
        more: false,
        OpenClose: false,
        //error message
        errorMsg: '',
        // Type select
        select: ['String', 'date', 'longText', 'integer', 'biginteger', 'boolean', 'float'],
        selected: '0',
        // rows counts
        rows: 0,
        // your base Url
        baseUrl: baseURL,
        // Tables
        OneToMany: scaffoldList,
        attributes: [],
        OneToManyRows: 0,
        table: '',
        OneToManyData: [],
    },
    methods: {
        // add row
        increment: function() {
            this.error = false;
            this.rows += 1;
        },
        //delete row
        decrement: function() {
            if (this.rows == 0 && this.OneToManyRows == 0) {
                this.errorMsg = 'Cannot remove the line'
                this.error = true;
            } else {
                if (this.OneToManyRows != 0) {
                    this.OneToManyData.$remove(this.OneToManyRows);
                    this.OneToManyRows -= 1;
                    return;
                }
                this.rows -= 1;
            }
        },
        // add relation
        addOneToMany: function() {
            this.OneToManyBool = true;
            if (this.OpenClose) {
                var onData = $('#on').val();
                var table = $('#tbl').val();
                if (inArray(onData, this.OneToManyData) || !onData || inArray(table, this.OneToManyData)) {
                    this.errorMsg = "Something is going wrong";
                    this.error = true
                    return;
                }
                this.OneToManyData.push({
                    id: this.OneToManyRows,
                    table: this.table,
                    onData: onData
                });
                this.OneToManyRows += 1;
            }
            this.error = false;
        },
        // get attributes
        getAttr: function(index) {
            console.log(index);
            this.selected = $('#tbl').val();
            console.log(this.baseUrl + '/scaffold/getAttributes/' + this.selected);
            $.getJSON(this.baseUrl + '/scaffold/getAttributes/' + this.selected, function(response) {
                this.attributes = response
                this.table = this.selected;
                this.OpenClose = true;
            }.bind(this)).error(function(response) {
                vm.errorMsg = 'Field not founds or the table does not migrated';
                vm.error = true
            });
        },
        // switch
        lastStep: function() {
            this.submit = false;
            this.more = false;
            this.OneToManyBool = false;
        },
        //switch
        lastOne: function() {
            this.submit = !this.submit;
            this.OneToManyBool = false;
        },
        //romove relation
        removeRelation: function(item) {
            this.OneToManyData.$remove(item);
        }
    }
})
