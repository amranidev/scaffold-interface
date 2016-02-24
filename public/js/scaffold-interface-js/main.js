new Vue({
    el: 'body',
    data: {
        show: false,
        submit: false,
        error: false,
        rows: 0,
        finals: false,
        select: ['String' , 'date','longText','integer','biginteger','boolean','float']
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
        }
    }
})