<template>
    <section id="proyecto" class="relative py-28 px-6 md:px-12 overflow-hidden bg-gray-50">
        <div class="absolute inset-0 overflow-hidden z-0 pointer-events-none">
            <div
                v-for="i in 40"
                :key="`paper-${i}`"
                class="absolute opacity-30 text-green-500 animate-float"
                :style="getRandomStyle(i)"
            >
                <i class="fas" :class="getRandomIcon()"></i>
            </div>
        </div>

        <div class="max-w-7xl mx-auto relative z-10">
            <!-- Encabezado -->
            <div class="text-center mb-16">
                <h2 class="text-5xl md:text-6xl font-black mb-6 text-gray-900">
          <span class="inline-block px-4 py-2 bg-clip-text text-transparent bg-gradient-to-r from-green-600 to-emerald-600 bg-[length:200%_200%] animate-gradient-shift">
            Proyecto de Reciclaje UMG
          </span>
                </h2>

                <div class="relative inline-block max-w-2xl">
                    <p class="text-lg md:text-xl text-gray-700 leading-relaxed relative z-10 bg-white/80 backdrop-blur-sm px-6 py-4 rounded-xl shadow-sm">
                        Este proyecto une a estudiantes de distintas facultades para convertir botellas plásticas en soluciones útiles. Fomenta la conciencia ambiental, la innovación interdisciplinaria y el trabajo colaborativo.
                    </p>
                    <div class="absolute -inset-2 bg-gradient-to-r from-green-400 to-emerald-500 rounded-xl blur opacity-20 z-0"></div>
                </div>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <div
                    v-for="card in cards"
                    :key="card.title"
                    class="relative group h-full transform transition-all duration-500 hover:scale-[1.02]"
                >
                    <div :class="`absolute inset-0 ${card.bg} rounded-2xl shadow-2xl transform translate-z-[-1px]`"></div>
                    <div class="relative bg-white rounded-2xl p-8 h-full border-2 border-gray-100 shadow-lg">
                        <div :class="`absolute -top-6 left-1/2 transform -translate-x-1/2 ${card.iconBg} rounded-full p-4 text-white text-3xl shadow-lg group-hover:scale-110 transition-transform`">
                            <i :class="`fas ${card.icon}`"></i>
                        </div>
                        <h3 :class="`text-2xl font-bold text-gray-800 mt-12 mb-4 ${card.textColor}`">
                            {{ card.title }}
                        </h3>
                        <p class="text-gray-600 mb-6">{{ card.description }}</p>
                        <div class="mt-6">
              <span :class="`inline-block px-3 py-1 text-xs font-semibold ${card.badgeText} ${card.badgeBg} rounded-full`">
                {{ card.badge }}
              </span>
                        </div>
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
                    title: "Recolectamos",
                    description: "Administración impulsa campañas activas para recolectar botellas reciclables dentro del campus, promoviendo el cambio desde la comunidad.",
                    icon: "fa-recycle",
                    iconBg: "bg-gradient-to-br from-green-400 to-emerald-500",
                    badge: "+2,500 botellas/mes",
                    badgeText: "text-emerald-600",
                    badgeBg: "bg-emerald-100",
                    bg: "bg-gradient-to-br from-green-500 to-emerald-600",
                    textColor: "bg-gradient-to-r from-green-600 to-emerald-600 bg-clip-text text-transparent"
                },
                {
                    title: "Transformamos",
                    description: "Ingeniería convierte el plástico recolectado en nuevos productos utilizando moldes y tecnología industrial adaptada al reciclaje.",
                    icon: "fa-industry",
                    iconBg: "bg-gradient-to-br from-amber-400 to-yellow-500",
                    badge: "15+ productos",
                    badgeText: "text-amber-600",
                    badgeBg: "bg-amber-100",
                    bg: "bg-gradient-to-br from-amber-500 to-yellow-600",
                    textColor: "bg-gradient-to-r from-amber-600 to-yellow-600 bg-clip-text text-transparent"
                },
                {
                    title: "Innovamos",
                    description: "Sistemas diseña herramientas digitales para mejorar el control del reciclaje, crear plataformas de visualización y facilitar el acceso a la información.",
                    icon: "fa-lightbulb",
                    iconBg: "bg-gradient-to-br from-blue-400 to-indigo-500",
                    badge: "3 apps desarrolladas",
                    badgeText: "text-blue-600",
                    badgeBg: "bg-blue-100",
                    bg: "bg-gradient-to-br from-blue-500 to-indigo-600",
                    textColor: "bg-gradient-to-r from-blue-600 to-indigo-600 bg-clip-text text-transparent"
                }
            ]
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
            const size = Math.random() * 24 + 14;
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
        }
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
</style>
