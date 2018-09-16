import Home from './components/pages/Home.vue'
import Single from './components/posts/Single.vue'

export const routes         =   [
    { path: '', component: Home },
    { path: '/post/:slug/:id', component: Single },
]