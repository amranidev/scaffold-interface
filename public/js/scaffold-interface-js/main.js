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
        
        attributes:{},
        
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
                this.error = true;
            } else {
                this.rows -= 1;
            }
        },
    
        addOneToMany: function() {
            this.OneToManyRows += 1;
        },
    
        deleteOneToMany: function() {
            this.OneToManyRows -= 1;
        },

        getAttr:function()
        {
            console.log(this.baseUrl + '/scaffold/getAttributes/' + this.selected);
            $.ajax({
                method: 'get',
                url: this.baseUrl + '/scaffold/getAttributes/' + this.selected,
                success:function(response){
                    this.attributes.push(response)
                    console.log(this.attributes)
                }

            })
        }
    }
})