new Vue({
    el: 'body',
    data: {
        show: false,
        submit: false,
        error: false,
        rows: 0,
        finals: false,
        select: ['String' , 'date','longText','integer','biginteger','boolean','float'],
        baseUrl: baseUrl,
        OneToMany: scaffoldList,
        OneToManyRows:0,
    },
    methods: {
        increment: function() {
            this.error = false;
            this.rows += 1;
        },
        decrement: function() {
            if (this.rows == 0) {
                this.error = true;
            } else {
                this.rows -= 1;
            }
        },
        addOneToMany:function()
        {
            this.OneToManyRows += 1;
        },

        deleteOneToMany:function()
        {
            this.OneToManyRows -= 1;
        }
    }
})