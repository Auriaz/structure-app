import { reactive } from "vue";

export default reactive({
    isShowSidebar: true,
    isRightSide: false,
    isRailSidebar: false,

    toggleShow() {
        this.isShowSidebar = !this.isShowSidebar;
    },

    changeSizeSidebar() {
        this.isRailSidebar = !this.isRailSidebar
    }
});