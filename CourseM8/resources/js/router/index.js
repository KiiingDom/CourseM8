import { createRouter, createWebHistory } from 'vue-router';
import AboutView from "../Pages/AboutView.vue";
import HomeView from "../Pages/HomeView.vue";
import AddUserView from '../Pages/AddUser.vue';
import MoviesView from '../Pages/MoviesView.vue';
import LoginView from '../Pages/LoginView.vue';
import QuestionnaireView from '../Pages/QuestionnaireView.vue'; // Assuming you have a Vue component for the questionnaire view
import MatchingResults from '../Pages/MatchingResults.vue'; // Adjust the path according to your project structure

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
        },
        {
            path: '/questionnaire/:id',
            name: 'questionnaire',
            component: QuestionnaireView
        },
        {
            path: '/matching-results',
            name: 'matching-results',
            component: MatchingResults
        },
        {
            path: '/:pathMatch(.*)*', // Redirect all unknown routes to the home page
            redirect: '/'
        }
    ]
});

export default router;
