import Vue from "vue";
import VueRouter from "vue-router";
// Pages
import Home from "./pages/Home";
import Register from "./pages/Register";
import Login from "./pages/Login";
import Dashboard from "./pages/Dashboard";
import ResetPassword from "./pages/ResetPassword";
import ChangePassword from "./pages/ChangePassword";
import WarehouseItemEdit from "./pages/WarehouseItemEdit";
import ShowWarehouseItem from "./pages/ShowWarehouseItem";
import CreateWarehouseItem from "./pages/CreateWarehouseItem";

Vue.use(VueRouter);

// Routes
const routes = [
    {
        path: "/",
        name: "home",
        component: Home,
        meta: {
            auth: undefined
        }
    },
    {
        path: "/register",
        name: "register",
        component: Register,
        meta: {
            auth: false
        }
    },
    {
        path: "/login",
        name: "login",
        component: Login,
        meta: {
            auth: false
        }
    },
    {
        path: "/resetpassword",
        name: "resetpassword",
        component: ResetPassword,
        meta: {
            auth: false
        }
    },
    {
        path: "/changepassword",
        name: "changepassword",
        component: ChangePassword,
        meta: {
            auth: false
        }
    },
    {
        path: "/dashboard",
        name: "dashboard",
        component: Dashboard,
        meta: {
            auth: true
        }
    },
    // Warehouse routes
    {
        path: "/warehouse/create",
        name: "warehouse.create",
        component: CreateWarehouseItem,
        meta: {
            auth: true
        }
    },
    {
        path: "/warehouse/edit/:id",
        name: "warehouse.edit",
        component: WarehouseItemEdit,
        meta: {
            auth: true
        }
    },
    {
        path: "/warehouse/show/:id",
        name: "warehouse.show",
        component: ShowWarehouseItem,
        meta: {
            auth: true
        }
    }
];

const router = new VueRouter({
    mode: "history",
    base: process.env.BASE_URL,
    routes
});

router.beforeEach((to, from, next) => {
    const loggedIn = localStorage.getItem("user");

    if (to.matched.some(record => record.meta.auth) && !loggedIn) {
        next("/login");
        return;
    }
    next();
});

export default router;
