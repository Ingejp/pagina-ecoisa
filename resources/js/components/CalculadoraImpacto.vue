<template>
    <section id="calculadora-impacto" class="relative py-16 md:py-24 px-6 md:px-12 bg-white overflow-hidden">
        <!-- Elementos decorativos flotantes -->
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div class="absolute top-20 left-10 text-green-100 text-6xl opacity-20 animate-float-1">♻️</div>
            <div class="absolute top-1/3 right-16 text-green-100 text-5xl opacity-20 animate-float-2">🌱</div>
            <div class="absolute bottom-1/4 left-20 text-green-100 text-7xl opacity-20 animate-float-3">🌎</div>
            <div class="absolute bottom-40 right-24 text-green-100 text-6xl opacity-20 animate-float-4">💧</div>
            <div class="absolute top-1/2 left-1/4 text-green-100 text-5xl opacity-20 animate-float-5">🗑️</div>
        </div>

        <div class="max-w-3xl mx-auto text-center relative z-10">
            <header class="mb-12">
                <h2 class="text-4xl md:text-5xl font-extrabold text-green-700 mb-4">
                    Calcula tu impacto ambiental ♻️
                </h2>
                <p class="text-lg text-gray-600 relative inline-block">
                    <span class="relative z-10">Descubre cuánto contribuyes al planeta reciclando diferentes materiales</span>
                    <span class="absolute -bottom-1 left-0 w-full h-1 bg-green-200 z-0"></span>
                </p>
            </header>

            <div class="flex flex-wrap justify-center gap-2 mb-8">
                <button
                    v-for="(tab, index) in tabs"
                    :key="index"
                    @click="activeTab = index"
                    class="px-4 py-2 rounded-full transition-all font-medium flex items-center"
                    :class="{
                        'bg-green-600 text-white shadow-md': activeTab === index,
                        'bg-gray-100 text-gray-700 hover:bg-gray-200': activeTab !== index
                    }"
                >
                    <span class="mr-2">{{ tab.icon }}</span>
                    {{ tab.label }}
                </button>
            </div>

            <div class="bg-white bg-opacity-90 backdrop-blur-sm p-6 md:p-8 rounded-2xl shadow-lg border border-green-100 relative overflow-hidden">
                <!-- Efecto de borde decorativo -->
                <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-green-400 to-blue-400"></div>

                <!-- Botellas plásticas -->
                <div v-if="activeTab === 0" class="space-y-6 text-left">
                    <h3 class="text-xl font-semibold text-green-700 flex items-center">
                        <span class="mr-2">🥤</span> Botellas plásticas
                    </h3>
                    <div>
                        <label for="botellas-input" class="block text-sm font-semibold text-gray-700 mb-1">
                            Cantidad (unidades/mes)
                        </label>
                        <input
                            id="botellas-input"
                            v-model.number="materiales.botellas"
                            type="number"
                            min="0"
                            max="10000"
                            step="1"
                            class="input"
                            placeholder="Ej. 30"
                            @input="validarNumero('botellas', 10000)"
                        />
                        <p class="mt-1 text-sm text-gray-500">
                            Máximo 10,000 unidades
                        </p>
                    </div>
                </div>

                <!-- Latas de aluminio -->
                <div v-if="activeTab === 1" class="space-y-6 text-left">
                    <h3 class="text-xl font-semibold text-green-700 flex items-center">
                        <span class="mr-2">🥫</span> Latas de aluminio
                    </h3>
                    <div>
                        <label for="latas-input" class="block text-sm font-semibold text-gray-700 mb-1">
                            Cantidad (unidades/mes)
                        </label>
                        <input
                            id="latas-input"
                            v-model.number="materiales.latas"
                            type="number"
                            min="0"
                            max="10000"
                            step="1"
                            class="input"
                            placeholder="Ej. 20"
                            @input="validarNumero('latas', 10000)"
                        />
                        <p class="mt-1 text-sm text-gray-500">
                            Máximo 10,000 unidades
                        </p>
                    </div>
                </div>

                <!-- Papel y cartón -->
                <div v-if="activeTab === 2" class="space-y-6 text-left">
                    <h3 class="text-xl font-semibold text-green-700 flex items-center">
                        <span class="mr-2">📦</span> Papel y cartón
                    </h3>
                    <div>
                        <label for="papel-input" class="block text-sm font-semibold text-gray-700 mb-1">
                            Cantidad (kg/mes)
                        </label>
                        <input
                            id="papel-input"
                            v-model.number="materiales.papel"
                            type="number"
                            min="0"
                            max="1000"
                            step="0.1"
                            class="input"
                            placeholder="Ej. 5.5"
                            @input="validarNumero('papel', 1000)"
                        />
                        <p class="mt-1 text-sm text-gray-500">
                            Máximo 1,000 kg
                        </p>
                    </div>
                </div>

                <!-- Vidrio -->
                <div v-if="activeTab === 3" class="space-y-6 text-left">
                    <h3 class="text-xl font-semibold text-green-700 flex items-center">
                        <span class="mr-2">🍾</span> Envases de vidrio
                    </h3>
                    <div>
                        <label for="vidrio-input" class="block text-sm font-semibold text-gray-700 mb-1">
                            Cantidad (unidades/mes)
                        </label>
                        <input
                            id="vidrio-input"
                            v-model.number="materiales.vidrio"
                            type="number"
                            min="0"
                            max="5000"
                            step="1"
                            class="input"
                            placeholder="Ej. 15"
                            @input="validarNumero('vidrio', 5000)"
                        />
                        <p class="mt-1 text-sm text-gray-500">
                            Máximo 5,000 unidades
                        </p>
                    </div>
                </div>

                <div class="pt-6 text-center">
                    <button
                        @click="calcularImpacto"
                        class="bg-green-600 hover:bg-green-700 text-white font-semibold py-3 px-8 rounded-full transition-all
                        transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 shadow-md relative overflow-hidden"
                        :disabled="!materiales[tabs[activeTab].key]"
                        :class="{ 'opacity-50 cursor-not-allowed': !materiales[tabs[activeTab].key] }"
                    >
                        <span class="relative z-10">Calcular impacto</span>
                        <span class="absolute inset-0 bg-gradient-to-r from-green-500 to-green-400 opacity-70 -z-0"></span>
                    </button>
                </div>
            </div>

            <transition name="fade">
                <div
                    v-if="resultado"
                    class="mt-10 bg-white bg-opacity-90 backdrop-blur-sm text-green-800 p-6 rounded-xl border border-green-200 animate-fade-in shadow-md relative overflow-hidden"
                    role="region"
                    aria-live="polite"
                >
                    <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-blue-400 to-green-400"></div>

                    <h3 class="text-xl font-bold mb-4 flex items-center">
                        <span class="mr-2">{{ tabs[activeTab].icon }}</span>
                        Impacto de {{ tabs[activeTab].label.toLowerCase() }}
                    </h3>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div class="bg-white bg-opacity-70 p-4 rounded-lg shadow-sm border border-gray-100">
                            <h4 class="font-semibold mb-2 text-green-700 flex items-center">
                                <span class="mr-2">⚡</span> Ahorro de recursos
                            </h4>
                            <ul class="space-y-2">
                                <li class="flex items-start">
                                    <span class="mr-2">🔋</span>
                                    <span><strong>{{ resultado.energia.toFixed(1) }}</strong> kWh de energía</span>
                                </li>
                                <li class="flex items-start">
                                    <span class="mr-2">🚿</span>
                                    <span><strong>{{ resultado.agua.toFixed(0) }}</strong> litros de agua</span>
                                </li>
                                <li class="flex items-start">
                                    <span class="mr-2">🛢️</span>
                                    <span><strong>{{ resultado.materiaPrima.cantidad.toFixed(2) }}</strong> {{ resultado.materiaPrima.unidad }} de {{ resultado.materiaPrima.nombre }}</span>
                                </li>
                            </ul>
                        </div>

                        <div class="bg-white bg-opacity-70 p-4 rounded-lg shadow-sm border border-gray-100">
                            <h4 class="font-semibold mb-2 text-green-700 flex items-center">
                                <span class="mr-2">🌿</span> Reducción de contaminación
                            </h4>
                            <ul class="space-y-2">
                                <li class="flex items-start">
                                    <span class="mr-2">☁️</span>
                                    <span><strong>{{ resultado.co2.toFixed(2) }}</strong> kg de CO₂</span>
                                </li>
                                <li class="flex items-start">
                                    <span class="mr-2">🗑️</span>
                                    <span><strong>{{ resultado.basura.toFixed(1) }}</strong> kg menos en vertederos</span>
                                </li>
                                <li class="flex items-start">
                                    <span class="mr-2">🌳</span>
                                    <span>Equivale a <strong>{{ resultado.equivalencia.arboles.toFixed(1) }}</strong> árboles absorbiendo CO₂ por un día</span>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="mt-4 pt-4 border-t border-green-200 flex items-center">
                        <span class="text-sm text-green-700 mr-2">♻️</span>
                        <p class="text-sm text-green-700">
                            * Basado en datos promedio de impacto ambiental del reciclaje
                        </p>
                    </div>
                </div>
            </transition>
        </div>
    </section>
</template>

<script>
export default {
    name: "CalculadoraSegmentadaDecorada",
    data() {
        return {
            activeTab: 0,
            tabs: [
                { label: "Botellas plásticas", key: "botellas", icon: "🥤" },
                { label: "Latas de aluminio", key: "latas", icon: "🥫" },
                { label: "Papel y cartón", key: "papel", icon: "📦" },
                { label: "Envases de vidrio", key: "vidrio", icon: "🍾" }
            ],
            materiales: {
                botellas: null,
                latas: null,
                papel: null,
                vidrio: null
            },
            resultado: null
        };
    },
    methods: {
        validarNumero(material, maximo) {
            if (this.materiales[material] > maximo) {
                this.materiales[material] = maximo;
            } else if (this.materiales[material] < 0) {
                this.materiales[material] = 0;
            }
        },

        calcularImpacto() {
            const materialActual = this.tabs[this.activeTab].key;
            const cantidad = this.materiales[materialActual];

            if (!cantidad || cantidad <= 0) return;

            // Factores de conversión por material
            const factores = {
                botellas: {
                    co2: 0.14,        // kg de CO2 por botella
                    energia: 0.22,     // kWh por botella
                    agua: 3.5,        // litros de agua por botella
                    basura: 0.05,     // kg de basura por botella
                    materiaPrima: {
                        nombre: "petróleo",
                        cantidad: 0.025, // kg de petróleo por botella
                        unidad: "kg"
                    },
                    equivalencia: {
                        arboles: 0.02  // árboles por botella (equivalencia de absorción de CO2)
                    }
                },
                latas: {
                    co2: 0.12,         // kg de CO2 por lata
                    energia: 0.25,     // kWh por lata
                    agua: 2.8,         // litros de agua por lata
                    basura: 0.03,      // kg de basura por lata
                    materiaPrima: {
                        nombre: "bauxita",
                        cantidad: 0.03, // kg de bauxita por lata
                        unidad: "kg"
                    },
                    equivalencia: {
                        arboles: 0.015  // árboles por lata
                    }
                },
                papel: {
                    co2: 0.8,          // kg de CO2 por kg de papel
                    energia: 1.2,      // kWh por kg de papel
                    agua: 15,          // litros de agua por kg de papel
                    basura: 0.9,       // kg de basura por kg de papel
                    materiaPrima: {
                        nombre: "árboles",
                        cantidad: 0.017, // árboles por kg de papel
                        unidad: "árboles"
                    },
                    equivalencia: {
                        arboles: 0.1   // árboles por kg de papel
                    }
                },
                vidrio: {
                    co2: 0.25,         // kg de CO2 por envase
                    energia: 0.3,      // kWh por envase
                    agua: 4.2,         // litros de agua por envase
                    basura: 0.5,       // kg de basura por envase
                    materiaPrima: {
                        nombre: "arena de sílice",
                        cantidad: 0.6,  // kg de arena por envase
                        unidad: "kg"
                    },
                    equivalencia: {
                        arboles: 0.03  // árboles por envase
                    }
                }
            };

            // Calcular impacto para el material actual
            this.resultado = {
                co2: cantidad * factores[materialActual].co2,
                energia: cantidad * factores[materialActual].energia,
                agua: cantidad * factores[materialActual].agua,
                basura: cantidad * factores[materialActual].basura,
                materiaPrima: {
                    nombre: factores[materialActual].materiaPrima.nombre,
                    cantidad: cantidad * factores[materialActual].materiaPrima.cantidad,
                    unidad: factores[materialActual].materiaPrima.unidad
                },
                equivalencia: {
                    arboles: cantidad * factores[materialActual].equivalencia.arboles
                }
            };

            // Scroll suave a los resultados
            this.$nextTick(() => {
                const element = document.getElementById('calculadora-impacto');
                element.scrollIntoView({ behavior: 'smooth', block: 'center' });
            });
        }
    }
};
</script>

<style scoped>
#calculadora-impacto {
    background-color: #f3f4f6;
    background-image:
        radial-gradient(at 20% 30%, rgba(209, 250, 229, 0.2) 0, transparent 50%),
        radial-gradient(at 80% 70%, rgba(167, 243, 208, 0.2) 0, transparent 50%);
}
.input {
    @apply w-full p-3 md:p-4 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-green-400 focus:border-transparent transition-all;
}

.input:invalid {
    @apply border-red-300 bg-red-50;
}

.fade-enter-active,
.fade-leave-active {
    transition: opacity 0.5s ease;
}

.fade-enter-from,
.fade-leave-to {
    opacity: 0;
}

@keyframes fade-in {
    from { opacity: 0; transform: translateY(10px); }
    to { opacity: 1; transform: translateY(0); }
}

.animate-fade-in {
    animation: fade-in 0.6s ease-out forwards;
}

/* Animaciones para elementos flotantes */
@keyframes float-1 {
    0%, 100% { transform: translateY(0) rotate(0deg); }
    50% { transform: translateY(-20px) rotate(5deg); }
}

@keyframes float-2 {
    0%, 100% { transform: translateY(0) rotate(0deg); }
    50% { transform: translateY(-15px) rotate(-3deg); }
}

@keyframes float-3 {
    0%, 100% { transform: translateY(0) scale(1); }
    50% { transform: translateY(10px) scale(1.05); }
}

@keyframes float-4 {
    0%, 100% { transform: translate(0, 0); }
    25% { transform: translate(5px, -10px); }
    50% { transform: translate(0, 5px); }
    75% { transform: translate(-5px, -5px); }
}

@keyframes float-5 {
    0%, 100% { transform: translateY(0) rotate(0deg); }
    50% { transform: translateY(-10px) rotate(10deg); }
}

.animate-float-1 {
    animation: float-1 8s ease-in-out infinite;
}

.animate-float-2 {
    animation: float-2 10s ease-in-out infinite;
}

.animate-float-3 {
    animation: float-3 12s ease-in-out infinite;
}

.animate-float-4 {
    animation: float-4 9s ease-in-out infinite;
}

.animate-float-5 {
    animation: float-5 7s ease-in-out infinite;
}
</style>
