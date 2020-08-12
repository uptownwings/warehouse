require("./bootstrap");

import "es6-promise/auto";
import axios from "axios";
import Vue from "vue";
import Vuex from "vuex";
import VueAxios from "vue-axios";
import VueRouter from "vue-router";
import router from "./router";
import store from "./store";
import Index from "./Index";
import Chartkick from "vue-chartkick";
import Chart from "chart.js";
import VueConfirmDialog from "vue-confirm-dialog";
import VueInternationalization from "vue-i18n";
import messages from "./locale/message";

Vue.config.productionTip = false;

// Set Vue globally
window.Vue = Vue;

Vue.use(Vuex);

// Set Vue router
Vue.router = router;
Vue.use(VueRouter);

// Internationalization
Vue.use(VueInternationalization);
const lang = localStorage.getItem("locale") || "en";
const i18n = new VueInternationalization({
    locale: lang,
    messages: messages
});

// Initialize confirmation dialog
Vue.use(VueConfirmDialog);
Vue.component("vue-confirm-dialog", VueConfirmDialog.default);

// Initialize charting libraries
Vue.use(Chartkick.use(Chart));

// Define currency filter
Vue.filter("toCurrency", function(value) {
    value = parseFloat(value);

    var formatter = new Intl.NumberFormat("en-US", {
        style: "currency",
        currency: "EUR",
        minimumFractionDigits: 2
    });
    return formatter.format(value);
});

// Set Vue authentication
Vue.use(VueAxios, axios);
axios.defaults.baseURL = `${process.env.MIX_APP_URL}/api/v1`;

Vue.component("index", Index);
Vue.component("pagination", require("laravel-vue-pagination"));
const app = new Vue({
    el: "#app",
    i18n,
    router,
    store,
    messages,
    created() {
        const userInfo = localStorage.getItem("user");
        if (userInfo) {
            const userData = JSON.parse(userInfo);
            this.$store.commit("setUserData", userData);
        }
        axios.interceptors.response.use(
            response => response,
            error => {
                if (error.response.status === 401) {
                    this.$store.dispatch("logout");
                }
                return Promise.reject(error);
            }
        );
    }
});
