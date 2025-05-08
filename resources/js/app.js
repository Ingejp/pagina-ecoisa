import './bootstrap';
import { createApp } from 'vue';
import Navbar from './components/Navbar.vue';
import Hero from "@/components/Hero.vue";
import Proyecto from './components/Proyecto.vue';
import Contacto from './components/Contacto.vue';
import Footer from './components/Footer.vue';
import ProcesoReciclaje from './components/ProcesoReciclaje.vue';
import Productos from './components/Productos.vue';
import CalculadoraImpacto from './components/CalculadoraImpacto.vue';
import Ventas from './components/Ventas.vue';


// COMPONENTES

const navbarApp = createApp({});
navbarApp.component('navbar', Navbar);
navbarApp.mount('#navbar');


const heroApp = createApp({});
heroApp.component('hero', Hero);
heroApp.mount('#hero');

const ventasApp = createApp({});
ventasApp.component('ventas', Ventas);
ventasApp.mount('#ventas');

const proyectoApp = createApp({});
proyectoApp.component('proyecto', Proyecto);
proyectoApp.mount('#proyecto');


const contactoApp = createApp({});
contactoApp.component('contacto', Contacto);
contactoApp.mount('#contacto');

const footerApp = createApp({});
footerApp.component('footer-component', Footer);
footerApp.mount('#footer');


const procesoApp = createApp({});
procesoApp.component('proceso-reciclaje', ProcesoReciclaje);
procesoApp.mount('#proceso');

const productosApp = createApp({});
productosApp.component('productos', Productos);
productosApp.mount('#productos');

const calcApp = createApp({});
calcApp.component('calculadora-impacto', CalculadoraImpacto);
calcApp.mount('#calculadora');
