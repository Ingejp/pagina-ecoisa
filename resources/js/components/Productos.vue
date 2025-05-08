<template>
    <section id="guia-reciclaje" class="py-12 md:py-20 px-4 md:px-8 bg-gray-50 relative overflow-hidden">
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div v-for="i in 15" :key="'particle-'+i"
                 class="absolute opacity-10"
                 :class="getRandomParticleColor()"
                 :style="particleStyle(i)">
                <i :class="getRandomParticleIcon()" class="text-xl"></i>
            </div>
        </div>

        <div class="max-w-5xl mx-auto relative">
            <!-- Encabezado -->
            <header class="text-center mb-12">
                <div class="inline-flex items-center justify-center bg-green-100 rounded-full p-4 mb-6">
                    <i class="fas fa-recycle text-4xl text-green-600"></i>
                </div>
                <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-3 font-serif">Guía Completa de Reciclaje</h1>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto font-sans">
                    Aprende a separar correctamente tus residuos y descubre el impacto positivo de reciclar
                </p>
            </header>

            <!-- Materiales Reciclables -->
            <div class="mb-16">
                <h2 class="text-2xl font-bold text-green-700 mb-6 pb-2 border-b border-green-200 flex items-center font-serif">
                    <i class="fas fa-exchange-alt mr-3 text-blue-500"></i> Materiales Reciclables
                </h2>

                <div class="grid sm:grid-cols-2 md:grid-cols-3 gap-4">
                    <div v-for="(item, index) in materiales" :key="index"
                         class="bg-white rounded-lg p-4 border border-gray-200 hover:border-green-300 transition-colors shadow-sm hover:shadow-md">
                        <div class="flex items-start mb-3">
                            <i :class="item.icono" class="text-2xl mr-3 mt-1" :style="{ color: item.color }"></i>
                            <h3 class="font-semibold text-gray-800 font-sans">{{ item.nombre }}</h3>
                        </div>
                        <ul class="space-y-2 text-sm text-gray-600 pl-10 font-sans">
                            <li v-for="(ejemplo, i) in item.ejemplos" :key="i" class="flex items-start">
                                <span class="mr-2" :style="{ color: item.color }">•</span> {{ ejemplo }}
                            </li>
                        </ul>
                        <div v-if="item.consejo" class="mt-3 p-2 rounded text-xs font-sans"
                             :class="'bg-' + item.lightColor + '-50 text-' + item.color + '-700'">
                            <i class="fas fa-lightbulb mr-1" :style="{ color: item.color }"></i> {{ item.consejo }}
                        </div>
                    </div>
                </div>
            </div>

            <!-- Beneficios -->
            <div class="bg-green-50 rounded-xl p-6 md:p-8 border border-green-200 shadow-sm">
                <h2 class="text-2xl font-bold text-green-700 mb-6 flex items-center justify-center font-serif">
                    <i class="fas fa-globe-americas mr-3 text-teal-500"></i> Beneficios de Reciclar
                </h2>

                <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-4">
                    <div v-for="(beneficio, index) in beneficios" :key="index"
                         class="bg-white rounded-lg p-4 text-center shadow-sm hover:shadow-md transition-shadow">
                        <i :class="beneficio.icono" class="text-3xl block mb-3" :style="{ color: beneficio.color }"></i>
                        <h3 class="font-medium text-gray-800 mb-1 font-serif">{{ beneficio.titulo }}</h3>
                        <p class="text-xs text-gray-600 font-sans">{{ beneficio.descripcion }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
export default {
    name: "GuiaReciclaje",
    data() {
        return {
            materiales: [
                {
                    nombre: "Plásticos",
                    icono: "fas fa-wine-bottle",
                    color: "#3B82F6", // Azul
                    lightColor: "blue",
                    ejemplos: [
                        "Botellas de agua y refresco",
                        "Envases de limpieza",
                        "Bolsas (en puntos específicos)"
                    ],
                    consejo: "Quita tapas y etiquetas si es posible"
                },
                {
                    nombre: "Vidrio",
                    icono: "fas fa-glass-whiskey",
                    color: "#10B981", // Verde esmeralda
                    lightColor: "green",
                    ejemplos: [
                        "Botellas de bebidas",
                        "Frascos de alimentos",
                        "Envases de cosméticos"
                    ],
                    consejo: "No incluir cristales rotos o espejos"
                },
                {
                    nombre: "Papel y Cartón",
                    icono: "fas fa-box-open",
                    color: "#F59E0B", // Ámbar
                    lightColor: "yellow",
                    ejemplos: [
                        "Periódicos y revistas",
                        "Cajas de cereales",
                        "Papel de oficina"
                    ],
                    consejo: "Aplana las cajas para ahorrar espacio"
                },
                {
                    nombre: "Metales",
                    icono: "fas fa-drumstick-bite",
                    color: "#64748B", // Gris azulado
                    lightColor: "gray",
                    ejemplos: [
                        "Latas de aluminio",
                        "Envases de conservas",
                        "Tapas de botellas"
                    ],
                    consejo: "Enjuaga para evitar olores"
                },
                {
                    nombre: "Orgánicos",
                    icono: "fas fa-apple-alt",
                    color: "#D946EF", // Fuchsia
                    lightColor: "purple",
                    ejemplos: [
                        "Restos de frutas",
                        "Verduras",
                        "Cáscaras de huevo"
                    ],
                    consejo: "Ideal para compostaje"
                },
                {
                    nombre: "Especiales",
                    icono: "fas fa-battery-three-quarters",
                    color: "#EF4444", // Rojo
                    lightColor: "red",
                    ejemplos: [
                        "Pilas y baterías",
                        "Electrónicos",
                        "Medicamentos"
                    ],
                    consejo: "Llevar a puntos limpios"
                }
            ],
            beneficios: [
                {
                    icono: "fas fa-tree",
                    titulo: "Ahorro de recursos",
                    descripcion: "Cada tonelada de papel reciclado salva 17 árboles",
                    color: "#22C55E" // Verde
                },
                {
                    icono: "fas fa-tint",
                    titulo: "Conservación de agua",
                    descripcion: "Reciclar aluminio ahorra 95% del agua necesaria para producirlo",
                    color: "#0EA5E9" // Azul cielo
                },
                {
                    icono: "fas fa-bolt",
                    titulo: "Ahorro energético",
                    descripcion: "El vidrio reciclado reduce un 30% el consumo de energía",
                    color: "#F97316" // Naranja
                },
                {
                    icono: "fas fa-infinity",
                    titulo: "Economía circular",
                    descripcion: "Los materiales se reutilizan en nuevos productos",
                    color: "#8B5CF6" // Violeta
                }
            ],
            particleIcons: [
                'fas fa-recycle',
                'fas fa-trash-alt',
                'fas fa-leaf',
                'fas fa-bottle-water',
                'fas fa-newspaper',
                'fas fa-battery-full',
                'fas fa-wine-bottle'
            ],
            particleColors: [
                'text-blue-400',
                'text-green-400',
                'text-yellow-400',
                'text-orange-400',
                'text-purple-400',
                'text-teal-400'
            ]
        };
    },
    methods: {
        particleStyle(index) {
            const random = (min, max) => Math.random() * (max - min) + min;
            return {
                top: `${random(5, 95)}%`,
                left: `${random(5, 95)}%`,
                transform: `rotate(${random(0, 360)}deg) scale(${random(0.5, 1.5)})`,
                animation: `float ${random(15, 25)}s linear infinite`,
                animationDelay: `${random(0, 10)}s`
            };
        },
        getRandomParticleIcon() {
            return this.particleIcons[Math.floor(Math.random() * this.particleIcons.length)];
        },
        getRandomParticleColor() {
            return this.particleColors[Math.floor(Math.random() * this.particleColors.length)];
        }
    }
};
</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Merriweather:wght@700&family=Open+Sans:wght@400;600&display=swap');
@import url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css');

.font-serif {
    font-family: 'Merriweather', serif;
}

.font-sans {
    font-family: 'Open Sans', sans-serif;
}

.bg-gray-50 {
    background-color: #f9fafb;
}

.grid > div {
    transition: all 0.3s ease;
}

.grid > div:hover {
    transform: translateY(-3px);
}

@keyframes float {
    0%, 100% {
        transform: translateY(0) rotate(0deg);
    }
    50% {
        transform: translateY(-20px) rotate(5deg);
    }
}
</style>
