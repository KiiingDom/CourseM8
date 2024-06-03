import { createRouter, createWebHistory } from 'vue-router';
import AboutView from "../Pages/AboutView.vue";
import HomeView from "../Pages/HomeView.vue";
import AddUserView from '../Pages/AddUser.vue';
import UserView from '../Pages/UserView.vue';
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
            path: '/users/:user_id',
            name: 'UserView',
            component: UserView,
            props: true
        },
        {
            path: '/login',
            component: LoginView
        }
    ]
});

export default router;