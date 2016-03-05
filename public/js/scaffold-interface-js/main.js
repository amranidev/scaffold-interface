function inArray(needle, haystack) {
    var length = haystack.length;
    for (var i = 0; i < length; i++) {
        if (haystack[i].onData == needle) return true;
    }
    return false;
}
var vm = new Vue({
    el: 'body',
    data: {
        show: false,
        submit: false,
        error: false,
        finals: false,
        more: false,
        select: ['String', 'date', 'longText', 'integer', 'biginteger', 'boolean', 'float'],
        selected: '0',
        baseUrl: baseUrl,
        OneToMany: scaffoldList,
        attributes: [],
        OneToManyRows: 0,
        rows: 0,
        table: '',
        OneToManyData: [],
        OneToManyBool: false,
        OneToManyBool2: false
    },
    filters: {},
    computed: {
        Relations: function() {
            return this.OneToManyRows + 1
        }
    },
    methods: {
        increment: function() {
            this.error = false;
            this.rows += 1;
        },
        decrement: function() {
            if (this.rows == 0 && this.OneToManyRows == 0) {
                this.error = true;
            } else {
                if (this.OneToManyRows != 0) {
                    this.OneToManyRows -= 1;
                    return;
                }
                this.rows -= 1;
            }
        },
        addOneToMany: function() {
            this.OneToManyBool = true;
            if (this.OneToManyBool2) {
                var onData = $('#on').val();
                if (inArray(onData, this.OneToManyData)) {
                    return;
                }
                var onData = $('#on').val();
                this.OneToManyData.push({
                    id: this.OneToManyRows,
                    table: this.table,
                    onData: onData
                });
                this.OneToManyRows += 1;
            }
        },
        getAttr: function(index) {
            console.log(index);
            this.selected = $('#tbl').val();
            console.log(this.baseUrl + '/scaffold/getAttributes/' + this.selected);
            $.getJSON(this.baseUrl + '/scaffold/getAttributes/' + this.selected, function(response) {
                this.attributes = response
                this.table = this.selected;
                this.OneToManyBool2 = true;
            }.bind(this));
        },
        lastStep: function() {
            this.submit = false;
            this.more = false;
            this.OneToManyBool = false;
        },
        lastOne: function() {
            this.submit = !this.submit;
            this.OneToManyBool = false;
        }
    }
})