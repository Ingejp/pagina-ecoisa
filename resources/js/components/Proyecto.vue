<template>
    <section id="proyecto" class="relative py-12 md:py-28 px-4 sm:px-6 md:px-12 overflow-hidden bg-gray-50">
        <div class="absolute inset-0 overflow-hidden z-0 pointer-events-none">
            <div
                v-for="i in (isMobile ? 20 : 40)"
                :key="`paper-${i}`"
                class="absolute opacity-30 text-green-500 animate-float"
                :style="getRandomStyle(i)"
            >
                <i class="fas" :class="getRandomIcon()"></i>
            </div>
        </div>

        <div class="max-w-7xl mx-auto relative z-10">
            <div class="text-center mb-10 md:mb-16">
                <h2 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-black mb-4 md:mb-6 text-gray-900">
                    <span class="inline-block px-2 sm:px-4 py-1 md:py-2 bg-clip-text text-transparent bg-gradient-to-r from-green-600 to-emerald-600 bg-[length:200%_200%] animate-gradient-shift">
                        Proyecto Interdisciplinario de Reciclaje UMG
                    </span>
                </h2>

                <div class="relative inline-block max-w-3xl mx-2 sm:mx-0">
                    <p class="text-base sm:text-lg md:text-xl text-gray-700 leading-relaxed relative z-10 bg-white/80 backdrop-blur-sm px-4 sm:px-6 py-3 sm:py-4 rounded-xl shadow-sm">
                        Una sinergia entre Administración, Ingeniería Industrial y Sistemas para transformar botellas plásticas en soluciones innovadoras.
                        Este proyecto fomenta la economía circular, reduce el impacto ambiental y desarrolla habilidades profesionales en los estudiantes.
                    </p>
                    <div class="absolute -inset-1 sm:-inset-2 bg-gradient-to-r from-green-400 to-emerald-500 rounded-xl blur opacity-20 z-0"></div>
                </div>
            </div>

            <div class="mb-12 md:mb-20">
                <h3 class="text-2xl sm:text-3xl font-bold text-center mb-8 sm:mb-12 text-gray-800">
                    <span class="border-b-4 border-green-500 pb-2">Facultades Colaboradoras</span>
                </h3>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 md:gap-8">
                    <div
                        v-for="card in cards"
                        :key="card.title"
                        class="relative group h-full transform transition-all duration-500 hover:scale-[1.02]"
                    >
                        <div :class="`absolute inset-0 ${card.bg} rounded-2xl shadow-2xl transform translate-z-[-1px]`"></div>
                        <div class="relative bg-white rounded-2xl p-6 sm:p-8 h-full border-2 border-gray-100 shadow-lg">
                            <div :class="`absolute -top-6 left-1/2 transform -translate-x-1/2 ${card.iconBg} rounded-full p-3 sm:p-4 text-white text-2xl sm:text-3xl shadow-lg group-hover:scale-110 transition-transform`">
                                <i :class="`fas ${card.icon}`"></i>
                            </div>
                            <h3 :class="`text-xl sm:text-2xl font-bold text-gray-800 mt-10 sm:mt-12 mb-3 sm:mb-4 ${card.textColor}`">
                                {{ card.facultad }}
                            </h3>
                            <h4 class="text-lg sm:text-xl font-semibold mb-2 sm:mb-3">{{ card.title }}</h4>
                            <p class="text-gray-600 text-sm sm:text-base mb-3 sm:mb-4">{{ card.description }}</p>
                            <ul class="text-gray-600 text-xs sm:text-sm space-y-1 sm:space-y-2 mb-4 sm:mb-6">
                                <li v-for="(item, index) in card.items" :key="index" class="flex items-start">
                                    <i class="fas fa-check-circle text-green-500 mt-0.5 sm:mt-1 mr-2 flex-shrink-0"></i>
                                    <span>{{ item }}</span>
                                </li>
                            </ul>
                            <div class="mt-4 sm:mt-6">
                                <span :class="`inline-block px-2 sm:px-3 py-0.5 sm:py-1 text-xs font-semibold ${card.badgeText} ${card.badgeBg} rounded-full`">
                                    {{ card.badge }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white p-4 sm:p-6 md:p-8 rounded-xl shadow-lg border border-gray-200 mb-12 md:mb-20">
                <h3 class="text-2xl sm:text-3xl font-bold text-center mb-6 sm:mb-8 text-gray-800">
                    <span class="border-b-4 border-green-500 pb-2">Impacto del Proyecto</span>
                </h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 sm:gap-6 md:gap-8">
                    <div class="bg-green-50 p-4 sm:p-6 rounded-lg border border-green-100">
                        <h4 class="text-lg sm:text-xl font-semibold text-green-700 mb-3 sm:mb-4 flex items-center">
                            <i class="fas fa-chart-line text-green-600 mr-2 sm:mr-3"></i>
                            Beneficios Ambientales
                        </h4>
                        <ul class="space-y-2 sm:space-y-3">
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-green-500 mt-0.5 sm:mt-1 mr-2 flex-shrink-0"></i>
                                <span class="text-sm sm:text-base">Reducción de más de 2,500 botellas plásticas mensuales en vertederos</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-green-500 mt-0.5 sm:mt-1 mr-2 flex-shrink-0"></i>
                                <span class="text-sm sm:text-base">Ahorro energético del 70% al usar plástico reciclado vs. material virgen</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-green-500 mt-0.5 sm:mt-1 mr-2 flex-shrink-0"></i>
                                <span class="text-sm sm:text-base">Promoción de la economía circular en la comunidad universitaria</span>
                            </li>
                        </ul>
                    </div>

                    <div class="bg-blue-50 p-4 sm:p-6 rounded-lg border border-blue-100">
                        <h4 class="text-lg sm:text-xl font-semibold text-blue-700 mb-3 sm:mb-4 flex items-center">
                            <i class="fas fa-users text-blue-600 mr-2 sm:mr-3"></i>
                            Beneficios Académicos
                        </h4>
                        <ul class="space-y-2 sm:space-y-3">
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-blue-500 mt-0.5 sm:mt-1 mr-2 flex-shrink-0"></i>
                                <span class="text-sm sm:text-base">Desarrollo de habilidades interdisciplinarias en estudiantes</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-blue-500 mt-0.5 sm:mt-1 mr-2 flex-shrink-0"></i>
                                <span class="text-sm sm:text-base">Aplicación práctica de conocimientos de cada carrera</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-blue-500 mt-0.5 sm:mt-1 mr-2 flex-shrink-0"></i>
                                <span class="text-sm sm:text-base">Creación de proyectos reales con impacto social y ambiental</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="mb-8 md:mb-12">
                <h3 class="text-2xl sm:text-3xl font-bold text-center mb-6 sm:mb-8 text-gray-800">
                    <span class="border-b-4 border-green-500 pb-2">Productos Creados</span>
                </h3>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6">
                    <div class="bg-white p-4 sm:p-6 rounded-lg shadow-md border border-gray-200 hover:shadow-lg transition-shadow">
                        <div class="text-center mb-3 sm:mb-4">
                            <i class="fas fa-chair text-3xl sm:text-4xl text-amber-500 mb-2 sm:mb-3"></i>
                            <h4 class="text-lg sm:text-xl font-semibold text-gray-800">Mobiliario</h4>
                        </div>
                        <p class="text-gray-600 text-xs sm:text-sm">Sillas, mesas y bancos creados con plástico reciclado para áreas comunes del campus.</p>
                    </div>

                    <div class="bg-white p-4 sm:p-6 rounded-lg shadow-md border border-gray-200 hover:shadow-lg transition-shadow">
                        <div class="text-center mb-3 sm:mb-4">
                            <i class="fas fa-box-open text-3xl sm:text-4xl text-green-500 mb-2 sm:mb-3"></i>
                            <h4 class="text-lg sm:text-xl font-semibold text-gray-800">Contenedores</h4>
                        </div>
                        <p class="text-gray-600 text-xs sm:text-sm">Recipientes para clasificación de residuos en diferentes puntos de la universidad.</p>
                    </div>

                    <div class="bg-white p-4 sm:p-6 rounded-lg shadow-md border border-gray-200 hover:shadow-lg transition-shadow">
                        <div class="text-center mb-3 sm:mb-4">
                            <i class="fas fa-laptop-code text-3xl sm:text-4xl text-blue-500 mb-2 sm:mb-3"></i>
                            <h4 class="text-lg sm:text-xl font-semibold text-gray-800">Sistema Digital</h4>
                        </div>
                        <p class="text-gray-600 text-xs sm:text-sm">Plataforma para gestión de inventario, ventas y seguimiento del proceso de reciclaje.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
export default {
    name: "Proyecto",
    data() {
        return {
            cards: [
                {
                    title: "Recolección y Marketing",
                    facultad: "Administración de Empresas",
                    description: "Lidera las campañas de concienciación y recolección de materiales reciclables en el campus.",
                    icon: "fa-bullhorn",
                    iconBg: "bg-gradient-to-br from-green-400 to-emerald-500",
                    badge: "+2,500 botellas/mes",
                    badgeText: "text-emerald-600",
                    badgeBg: "bg-emerald-100",
                    bg: "bg-gradient-to-br from-green-500 to-emerald-600",
                    textColor: "bg-gradient-to-r from-green-600 to-emerald-600 bg-clip-text text-transparent",
                    items: [
                        "Campañas de sensibilización ambiental",
                        "Gestión de puntos de recolección",
                        "Marketing del proyecto y productos",
                        "Coordinación con otras facultades"
                    ]
                },
                {
                    title: "Transformación Industrial",
                    facultad: "Ingeniería Industrial",
                    description: "Convierte el plástico recolectado en nuevos productos utilizando tecnología de reciclaje.",
                    icon: "fa-industry",
                    iconBg: "bg-gradient-to-br from-amber-400 to-yellow-500",
                    badge: "15+ productos",
                    badgeText: "text-amber-600",
                    badgeBg: "bg-amber-100",
                    bg: "bg-gradient-to-br from-amber-500 to-yellow-600",
                    textColor: "bg-gradient-to-r from-amber-600 to-yellow-600 bg-clip-text text-transparent",
                    items: [
                        "Diseño de moldes y productos",
                        "Proceso de fundido y transformación",
                        "Control de calidad de productos",
                        "Optimización de procesos"
                    ]
                },
                {
                    title: "Innovación Tecnológica",
                    facultad: "Sistemas y Desarrollo Web",
                    description: "Desarrolla herramientas digitales para gestionar y promover el proyecto de reciclaje.",
                    icon: "fa-laptop-code",
                    iconBg: "bg-gradient-to-br from-blue-400 to-indigo-500",
                    badge: "3 apps desarrolladas",
                    badgeText: "text-blue-600",
                    badgeBg: "bg-blue-100",
                    bg: "bg-gradient-to-br from-blue-500 to-indigo-600",
                    textColor: "bg-gradient-to-r from-blue-600 to-indigo-600 bg-clip-text text-transparent",
                    items: [
                        "Plataforma de gestión de inventario",
                        "Sistema de ventas online",
                        "Dashboard de métricas del proyecto",
                        "Aplicación móvil para recolección"
                    ]
                }
            ],
            isMobile: false
        };
    },
    methods: {
        getRandomIcon() {
            const icons = [
                'fa-recycle', 'fa-trash-alt', 'fa-leaf', 'fa-seedling',
                'fa-box-open', 'fa-bottle-water', 'fa-trash-restore', 'fa-tree',
                'fa-canadian-maple-leaf', 'fa-hands-helping', 'fa-globe-americas',
                'fa-water', 'fa-hand-holding-heart', 'fa-biohazard'
            ];
            return icons[Math.floor(Math.random() * icons.length)];
        },
        getRandomStyle(i) {
            const top = Math.random() * 100;
            const left = Math.random() * 100;
            const size = Math.random() * (this.isMobile ? 16 : 24) + (this.isMobile ? 8 : 14);
            const delay = Math.random() * 10;
            const rotate = Math.random() * 360;
            const duration = 10 + Math.random() * 10;
            return {
                top: `${top}%`,
                left: `${left}%`,
                fontSize: `${size}px`,
                animationDelay: `${delay}s`,
                animationDuration: `${duration}s`,
                transform: `rotate(${rotate}deg)`
            };
        },
        checkMobile() {
            this.isMobile = window.innerWidth < 768;
        }
    },
    mounted() {
        this.checkMobile();
        window.addEventListener('resize', this.checkMobile);
    },
    beforeDestroy() {
        window.removeEventListener('resize', this.checkMobile);
    }
};
</script>

<style scoped>
@keyframes float {
    0%, 100% { transform: translateY(0) rotate(0deg); }
    50% { transform: translateY(-30px) rotate(10deg); }
}
.animate-float {
    animation-name: float;
    animation-timing-function: ease-in-out;
    animation-iteration-count: infinite;
}

@keyframes gradient-shift {
    0% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
    100% { background-position: 0% 50%; }
}
.animate-gradient-shift {
    animation: gradient-shift 8s ease infinite;
    background-size: 200% 200%;
}

@media (max-width: 400px) {
    #proyecto {
        padding-left: 2rem;
        padding-right: 2rem;
    }
}
</style>
