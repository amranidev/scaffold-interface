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
        attributes: swihla,
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
        getAttr: function() {
            this.selected = $('#tbl0').val();
            console.log(this.baseUrl + '/scaffold/getAttributes/' + this.selected);
            $.ajax({
                method: 'get',
                url: this.baseUrl + '/scaffold/getAttributes/' + this.selected,
                success: function(response) {
                    console.log(response)
                }
            });
        }
    }
})