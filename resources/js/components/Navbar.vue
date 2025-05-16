<template>
    <nav
        class="bg-green-700 text-white shadow-xl fixed w-full top-0 z-50 font-semibold"
        aria-label="Navegación principal"
    >
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <!-- Logo con enlace accesible -->
                <a
                    href="#inicio"
                    class="flex items-center space-x-3 text-2xl font-bold tracking-wide focus:outline-none focus:ring-2 focus:ring-yellow-200 focus:ring-offset-2 focus:ring-offset-green-700 rounded"
                    aria-label="Ir al inicio"
                >
                    <img
                        src="/imagenes/logo1.png"
                        alt="Logo ECOISA"
                        class="h-16 w-14 object-contain drop-shadow"
                    />
                    <span class="text-white">ECOISA</span>
                </a>

                <!-- Menu Desktop -->
                <ul class="hidden md:flex space-x-6 text-[17px]">
                    <li v-for="item in navItems" :key="item.id">
                        <a
                            :href="item.href"
                            class="hover:text-yellow-200 transition-all duration-300 py-2 px-1 focus:outline-none focus:ring-2 focus:ring-yellow-200 focus:rounded"
                            :aria-label="`Ir a ${item.text}`"
                        >
                            {{ item.text }}
                        </a>
                    </li>
                </ul>

                <button
                    @click="toggleMenu"
                    @keydown.esc="isOpen = false"
                    class="md:hidden text-white text-2xl transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-yellow-200 focus:rounded p-1"
                    :aria-expanded="isOpen"
                    aria-label="Menú de navegación"
                >
                    <i
                        :class="isOpen ? 'fas fa-times' : 'fas fa-bars'"
                        aria-hidden="true"
                    ></i>
                </button>
            </div>
        </div>

        <transition name="slide-fade">
            <div
                v-if="isOpen"
                class="md:hidden bg-green-800 px-6 py-4 space-y-3 text-lg"
                @keydown.esc="isOpen = false"
            >
                <a
                    v-for="item in navItems"
                    :key="item.id"
                    :href="item.href"
                    class="block hover:text-yellow-200 transition py-2 focus:outline-none focus:ring-2 focus:ring-yellow-200 focus:rounded"
                    @click="isOpen = false"
                    :aria-label="`Ir a ${item.text}`"
                >
                    {{ item.text }}
                </a>
            </div>
        </transition>
    </nav>
</template>

<script>
export default {
    name: "Navbar",
    data() {
        return {
            isOpen: false,
            navItems: [
                { id: 1, text: 'Inicio', href: '#inicio' },
                { id: 2, text: 'Ventas', href: '#tienda' },
                { id: 3, text: 'Proyecto', href: '#proyecto' },
                { id: 4, text: 'Productos', href: '#productos' },
                { id: 5, text: 'Calculadora', href: '#calculadora' },
                { id: 6, text: 'Contacto', href: '#contacto' }
            ]
        };
    },
    methods: {
        toggleMenu() {
            this.isOpen = !this.isOpen;
        }
    },
    watch: {
        isOpen(newVal) {
            // Bloquear scroll cuando el menú móvil está abierto
            if (newVal) {
                document.body.style.overflow = 'hidden';
            } else {
                document.body.style.overflow = '';
            }
        }
    }
};
</script>

<style scoped>

.slide-fade-enter-active {
    transition: all 0.3s ease-out;
}
.slide-fade-leave-active {
    transition: all 0.2s ease-in;
}
.slide-fade-enter-from,
.slide-fade-leave-to {
    opacity: 0;
    transform: translateY(-10px);
}

@keyframes spin-slow {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}
.animate-spin-slow {
    animation: spin-slow 12s linear infinite;
    will-change: transform;
}

nav {
    contain: content;
}

a:focus, button:focus {
    outline: none;
    box-shadow: 0 0 0 2px theme('colors.yellow.200');
}
</style>
