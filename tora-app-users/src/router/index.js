import { createWebHistory, createRouter } from "vue-router";
import Home from "../views/Home.vue";
//import About from "../views/About.vue";

const router = createRouter({
    history: createWebHistory(),
    routes: [{
            path: '/',
            component: Home
        } //,
        //{
        //path: '/contact',
        //component: About
        //}
    ]
});

export default router;