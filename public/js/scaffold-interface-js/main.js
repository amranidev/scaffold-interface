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
        attributes: {},
        OneToManyRows: 0,
        rows: 0,
    },
    methods: {
        increment: function() {
            this.error = false;
            this.rows += 1;
        },
        decrement: function() {
            if (this.rows == 0) {
                if (this.OneToManyRows != 0) {
                    this.OneToManyRows -= 1;
                    return;
                }
                this.error = true;
            } else {
                this.rows -= 1;
            }
        },
        addOneToMany: function() {
            this.OneToManyRows += 1;
        },
        
        getAttr: function() {
            var E = this.OneToManyRows;
            E -= 1;
            console.log('#tbl' + E);
            this.selected = $('#tbl' + E).val();
            console.log(this.baseUrl + '/scaffold/getAttributes/' + this.selected);
            $.ajax({
                method: 'get',
                url: this.baseUrl + '/scaffold/getAttributes/' + this.selected,
                success: function(response) {
                    this.attributes = response
                    console.log(this.attributes)
                }
            })
        }
    }
})