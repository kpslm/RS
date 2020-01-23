let vm = new Vue({
    el: '#app',

    data: {
        page: 1
    },

    methods: {
        commentP() {
            if (this.page == 1) {
                this.page = 0
            } else {
                this.page = 1
            }
        }
    }
})