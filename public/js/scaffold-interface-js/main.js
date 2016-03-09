function inArray(needle, haystack) {
    var length = haystack.length;
    for (var i = 0; i < length; i++) {
        if (haystack[i].onData == needle) return true;
    }
    return false;
}

Vue.transition('fade',{
    enterClass: 'fadeInRight',
    leaveClass: 'fadeOutLeft'
});
Vue.transition('actions',{
    enterClass: 'fadeInRight',
    leaveClass: 'fadeOutLeft'
});
var vm = new Vue({
    el: '.container',
    data: {
        show: false,
        submit: false,
        error: false,
        errorMsg: '',
        finals: false,
        more: false,
        select: ['String', 'date', 'longText', 'integer', 'biginteger', 'boolean', 'float'],
        selected: '0',
        rows: 0,
        baseUrl: baseUrl,
        OneToMany: scaffoldList,
        attributes: [],
        OneToManyRows: 0,
        table: '',
        OneToManyData: [],
        OneToManyBool: false,
        OpenClose: false
    },
    methods: {
        increment: function() {
            this.error = false;
            this.rows += 1;
        },
        decrement: function() {
            if (this.rows == 0 && this.OneToManyRows == 0) {
                this.errorMsg = 'Cannot remove More'
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
        addOneToMany: function() {
            this.OneToManyBool = true;
            if (this.OpenClose) {
                var onData = $('#on').val();
                if (inArray(onData, this.OneToManyData) || onData == null) {
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
        getAttr: function(index) {
            console.log(index);
            this.selected = $('#tbl').val();
            console.log(this.baseUrl + '/scaffold/getAttributes/' + this.selected);
            $.getJSON(this.baseUrl + '/scaffold/getAttributes/' + this.selected, function(response) {
                this.attributes = response
                this.table = this.selected;
                this.OpenClose = true;
            }.bind(this)).error(function(response) {
                vm.errorMsg = 'Field not founds or the tabel does not migrated';
                vm.error = true
            });
        },
        lastStep: function() {
            this.submit = false;
            this.more = false;
            this.OneToManyBool = false;
        },
        lastOne: function() {
            this.submit = !this.submit;
            this.OneToManyBool = false;
        },
        removeRelation: function(item) {
            this.OneToManyData.$remove(item);
        }
    }
})