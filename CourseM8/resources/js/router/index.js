import { createRouter, createWebHistory } from 'vue-router';
import AboutView from "../Pages/AboutView.vue";
import HomeView from "../Pages/HomeView.vue";
import AddUserView from '../Pages/AddUser.vue';
import MoviesView from '../Pages/MoviesView.vue';
import LoginView from '../Pages/LoginView.vue';

const router = createRouter({
    history: createWebHistory(import.meta.env.BASE_URL),
    routes: [
        {
            path: '/',
            component: HomeView
        },
        {
            path: '/about',
            component: AboutView
        },
        {
            path: '/users/create',
            component: AddUserView
        },
        {
            path: '/movies',
            component: MoviesView
        },
        {
            path: '/login',
            component: LoginView
        }
    ]
});

export default router;