require('./bootstrap');

    var socket = io('http://192.168.10.10:3000');

    new Vue({
        el: '#users',
        data: {
            msg: '',
            users: [],
            messages: []
        },
        /*  When the user signs up. */
        created() {
            socket.on('test-channel:App\\Events\\UserSignedUp', function(data) {
                this.users.push(data);
                this.notify(data.username);   
            }.bind(this));
        /*  Get user id */
            socket.on('user joined', function (socketId) {
                this.users.push(socketId);
            }.bind(this));
        /*  get msg when user sends msg */
            socket.on('room:App\\Events\\NewMsg', function(data) {
                this.messages.push(data);
                console.log(this.messages);
            }.bind(this));
        },
        methods: {
            notify(username) {
                this.$notify({
                  title : `${username} vient de se connecter`,
                  type: 'success',
                });
            },
            send() {
                axios.post('send',this.$data)
                .then( response => this.msg = '')
                .catch(error => console.log('Error'))
            }
        }
    });




/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// Vue.component('example-component', require('./components/ExampleComponent.vue'));

// const app = new Vue({
//     el: ''
// });

	
