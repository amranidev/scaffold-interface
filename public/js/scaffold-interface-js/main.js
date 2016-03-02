new Vue({
    el: 'body',
    data: {
        show: false,
        submit: false,
        error: false,
        finals: false,
        select: ['String', 'date', 'longText', 'integer', 'biginteger', 'boolean', 'float'],
        selected: '0',
        baseUrl: baseUrl,
        OneToMany: scaffoldList,
        attributes: [],
        OneToManyRows: 0,
        rows: 0,
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
            this.OneToManyRows += 1;
        },
        getAttr: function(index) {
            console.log(index);
            this.selected = $('#tbl' + index).val();
            console.log(this.baseUrl + '/scaffold/getAttributes/' + this.selected);
            $.getJSON(this.baseUrl + '/scaffold/getAttributes/' + this.selected, function(response) {
                this.attributes = response
            }.bind(this));
        }
    }
})