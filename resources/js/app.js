import './bootstrap';


// Require Vue
import { createApp } from 'vue';
// components
import CalculatorComponent from "./components/CalculatorComponent.vue";

// Initialize Vue
const app = createApp({
    components: {
        CalculatorComponent
    }
}).mount('#app')
