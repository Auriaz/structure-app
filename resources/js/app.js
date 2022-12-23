import "./bootstrap";
import "../css/app.css";
import "@protonemedia/laravel-splade/dist/style.css";
import '@fortawesome/fontawesome-free/css/all.css';

import { createApp } from "vue/dist/vue.esm-bundler.js";
import { renderSpladeApp, SpladePlugin } from "@protonemedia/laravel-splade";

import VBtn from './components/Btn/index.vue';
import VControlPanelSection from './components/Sections/ControlPanel/index.vue';
import VControlPanelNavbar from './components/Navbar/ControlPanelNavbar.vue';
import VDefaultNavbar from './components/Navbar/DefaultNavbar.vue';
import VNavLink from './components/Navbar/NavLink/index.vue';

import VSidebar from './components/Sidebar/index.vue';
import VSidebarLink from './components/SideBar/SidebarLink.vue';
import VBorder from './components/Border/index.vue';
import VSearch from './components/Search/index.vue';

const el = document.getElementById("app");

createApp({
    render: renderSpladeApp({ el })
})
    .use(SpladePlugin, {
        "max_keep_alive": 10,
        "transform_anchors": false,
        "progress_bar": true,
        "components": {
            VBtn,
            VControlPanelSection,
            VSidebar,
            VSidebarLink,
            VBorder,
            VSearch,
            VControlPanelNavbar,
            VDefaultNavbar,
            VNavLink
        },
    })
    .mount(el);
