import { createRouter, createWebHistory } from "vue-router";
import AboutView from "../views/AboutView.vue";
import TaskListComponent from "../components/TaskListComponent.vue";
import TaskShowComponent from "../components/TaskShowComponent.vue";

const router = createRouter({
    history: createWebHistory(import.meta.env.BASE_URL),
    routes: [
        {
            path: "/about",
            name: "about",
            component: AboutView,
        },
        {
            path: '/tasks',
            name: 'task.list',
            component: TaskListComponent
        },
        {
            path: '/tasks/:taskId',
            name: 'task.show',
            component: TaskShowComponent,
            props: true
        },
    ],
});

export default router;
