
// NOTE: this script is still development stage

var vm = new Vue({
    el: '#app',
    mounted () {
        axios.get(baseURL + '/scaffold/getTabels').then(function(response) {
            console.log(response)
        }).catch(function(error) {
            console.log(error)
        })
    },
    data () {
        return {
            hello: "Smart CRUD Generator For Laravel"
        }
    }
})