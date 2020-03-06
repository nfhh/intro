import VueRouter from 'vue-router'

let routes = [
    {
        path: '/',
        name: 'index',
        components: require('./components/Index')
    },
    {
        path: '/steps/:id/:lan',
        name: 'steps',
        components: require('./components/Step')
    }
]

const router = new VueRouter({
    mode: 'history',
    routes
})

export default router
