<template>
    <section id="tienda" class="py-12 bg-white relative overflow-hidden">
        <!-- Iconos flotantes de reciclaje -->
        <i class="fas fa-recycle text-green-200 text-6xl opacity-20 absolute top-20 left-10 animate-float1"></i>
        <i class="fas fa-leaf text-blue-200 text-5xl opacity-20 absolute top-1/3 right-16 animate-float2"></i>
        <i class="fas fa-seedling text-yellow-200 text-7xl opacity-20 absolute bottom-20 left-1/4 animate-float3"></i>
        <i class="fas fa-trash-alt text-purple-200 text-4xl opacity-20 absolute top-1/4 left-1/3 animate-float4"></i>
        <i class="fas fa-recycle text-red-200 text-5xl opacity-20 absolute bottom-32 right-24 animate-float5"></i>

        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Encabezado -->
            <header class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-800 font-serif">
                    <i class="fas fa-shopping-bag text-blue-500 mr-3"></i>
                    Productos Ecológicos Hechos con Material Reciclado
                </h2>
                <p class="text-lg text-gray-600 mt-3 max-w-2xl mx-auto font-sans">
                    Descubre artículos prácticos y sostenibles que dan nueva vida a materiales reciclados
                </p>
            </header>

            <!-- Mensaje de próximos productos -->
            <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4 mb-8 rounded">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <i class="fas fa-info-circle text-yellow-500 text-xl mr-3 mt-1"></i>
                    </div>
                    <div>
                        <p class="text-sm text-yellow-700 font-medium">
                            <span class="font-bold">¡Próximamente más productos!</span> Estamos trabajando en nuevos diseños sostenibles.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Filtros -->
            <div class="flex flex-wrap justify-between items-center mb-8 bg-gray-50 p-4 rounded-lg">
                <div class="flex flex-wrap gap-2 mb-4 sm:mb-0">
                    <button
                        v-for="(category, index) in categories"
                        :key="index"
                        @click="filterProducts(category.value)"
                        :class="{
                            'bg-blue-500 text-white': activeFilter === category.value && category.value === 'comedero',
                            'bg-green-500 text-white': activeFilter === category.value && category.value === 'almacenaje',
                            'bg-purple-500 text-white': activeFilter === category.value && category.value === 'basura',
                            'bg-orange-500 text-white': activeFilter === category.value && category.value === 'jardin',
                            'bg-gray-500 text-white': activeFilter === category.value && category.value === 'all',
                            'bg-white text-gray-700': activeFilter !== category.value
                        }"
                        class="px-4 py-2 rounded-full text-sm font-medium transition-all shadow-sm hover:shadow-md"
                    >
                        {{ category.label }}
                    </button>
                </div>
                <div class="relative w-full sm:w-auto">
                    <input
                        type="text"
                        v-model="searchQuery"
                        placeholder="Buscar productos..."
                        class="pl-10 pr-4 py-2 w-full border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    >
                    <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                </div>
            </div>

            <!-- Productos -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                <div
                    v-for="product in filteredProducts"
                    :key="product.id"
                    class="bg-white rounded-xl overflow-hidden shadow-md hover:shadow-lg transition-shadow border border-gray-100"
                >
                    <!-- Imagen del producto -->
                    <div class="relative h-48 bg-gray-100 overflow-hidden cursor-pointer" @click="openProductModal(product)">
                        <img
                            :src="product.image"
                            :alt="product.name"
                            class="w-full h-full object-cover transition-transform duration-300 hover:scale-105"
                        >
                    </div>

                    <!-- Detalles del producto -->
                    <div class="p-5">
                        <div class="flex justify-between items-start">
                            <h3 class="font-bold text-lg text-gray-800">{{ product.name }}</h3>
                        </div>
                        <p class="text-gray-600 text-sm mt-2">{{ product.description }}</p>

                        <!-- Materiales reciclados -->
                        <div class="mt-3">
                            <p class="text-xs text-gray-500 font-medium">Hecho con:</p>
                            <div class="flex flex-wrap gap-1 mt-1">
                                <span
                                    v-for="(material, i) in product.materials"
                                    :key="i"
                                    class="text-xs px-2 py-1 rounded-full bg-gray-100 text-gray-700"
                                >
                                    {{ material }}
                                </span>
                            </div>
                        </div>

                        <!-- Botones -->
                        <div class="mt-4 flex justify-between items-center">
                            <button
                                :disabled="true"
                                class="px-4 py-2 rounded-lg text-sm font-medium transition-colors bg-gray-300 text-gray-600 cursor-not-allowed"
                            >
                                <i class="fas fa-clock mr-2"></i>
                                Próximamente
                            </button>
                            <button
                                @click="openProductModal(product)"
                                class="text-blue-600 hover:text-blue-800 text-sm font-medium flex items-center"
                            >
                                Ver detalles <i class="fas fa-chevron-right ml-1 text-xs"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal de detalles del producto -->
            <div
                v-if="selectedProduct"
                class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 p-4"
                @click.self="selectedProduct = null"
            >
                <div class="bg-white rounded-lg max-w-4xl w-full max-h-[90vh] overflow-y-auto">
                    <div class="p-5 border-b border-gray-200 sticky top-0 bg-white z-10 flex justify-between items-center">
                        <h3 class="font-bold text-xl">{{ selectedProduct.name }}</h3>
                        <button @click="selectedProduct = null" class="text-gray-500 hover:text-gray-700 text-2xl">
                            &times;
                        </button>
                    </div>

                    <div class="md:flex">
                        <div class="md:w-1/2 p-6">
                            <img
                                :src="selectedProduct.image"
                                :alt="selectedProduct.name"
                                class="w-full h-auto max-h-96 object-contain rounded-lg"
                            >
                        </div>

                        <!-- Detalles -->
                        <div class="md:w-1/2 p-6">
                            <div class="mb-6">
                                <h4 class="font-semibold text-lg mb-2">Descripción</h4>
                                <p class="text-gray-700">{{ selectedProduct.longDescription || selectedProduct.description }}</p>
                            </div>

                            <div class="mb-6">
                                <h4 class="font-semibold text-lg mb-2">Materiales utilizados</h4>
                                <ul class="space-y-2">
                                    <li
                                        v-for="(material, index) in selectedProduct.materials"
                                        :key="index"
                                        class="flex items-start"
                                    >
                                        <i class="fas fa-check-circle text-green-500 mt-1 mr-2 text-sm"></i>
                                        <span>{{ material }}</span>
                                    </li>
                                </ul>
                            </div>

                            <div v-if="selectedProduct.bottlesUsed > 0" class="mb-6">
                                <h4 class="font-semibold text-lg mb-2">Botellas recicladas utilizadas</h4>
                                <div class="flex items-center bg-blue-50 p-3 rounded-lg">
                                    <i class="fas fa-wine-bottle text-blue-500 text-2xl mr-3"></i>
                                    <span class="font-medium">{{ selectedProduct.bottlesUsed }} botellas PET recicladas</span>
                                </div>
                            </div>

                            <div v-if="selectedProduct.otherStats" class="mb-6">
                                <h4 class="font-semibold text-lg mb-2">Impacto ambiental</h4>
                                <div class="flex items-center bg-green-50 p-3 rounded-lg">
                                    <i class="fas fa-leaf text-green-500 text-2xl mr-3"></i>
                                    <span class="font-medium">{{ selectedProduct.otherStats }}</span>
                                </div>
                            </div>

                            <div class="flex justify-between items-center border-t border-gray-200 pt-4">
                                <button
                                    :disabled="true"
                                    class="px-6 py-3 rounded-lg font-medium transition-colors bg-gray-300 text-gray-600 cursor-not-allowed w-full"
                                >
                                    <i class="fas fa-clock mr-2"></i>
                                    Disponible próximamente
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
export default {
    name: 'TiendaReciclaje',
    data() {
        return {
            products: [
                {
                    id: 1,
                    name: 'Comedero para Mascotas',
                    description: 'Diseño sostenible para alimentar a tus mascotas',
                    longDescription: 'Comedero ecológico fabricado con plástico reciclado, ideal para perros y gatos. Su diseño ergonómico y materiales resistentes lo hacen perfecto para el uso diario, contribuyendo al cuidado del medio ambiente.',
                    image: 'https://arcadenoe.com.gt/cdn/shop/products/361140.jpg?v=1614268847',
                    category: 'comedero',
                    materials: ['Plástico PET reciclado', 'Pigmentos naturales'],
                    bottlesUsed: 4,
                    otherStats: 'Ayuda a reducir residuos plásticos'
                },
                {
                    id: 2,
                    name: 'Caja de Almacenaje Multiusos',
                    description: 'Solución ecológica para organizar tus espacios',
                    longDescription: 'Caja de almacenaje fabricada con materiales reciclados, perfecta para mantener ordenado tu hogar u oficina. Versátil y resistente, con un diseño moderno que se adapta a cualquier ambiente.',
                    image: 'https://cemacogt.vtexassets.com/arquivos/ids/711280-800-800?v=638439297538130000&width=800&height=800&aspect=true',
                    category: 'almacenaje',
                    materials: ['Cartón reciclado', 'Tela reciclada'],
                    bottlesUsed: 0,
                    otherStats: 'Promueve la economía circular'
                },
                {
                    id: 3,
                    name: 'Cubo de Basura Reciclado',
                    description: 'Para una gestión responsable de residuos',
                    longDescription: 'Cubo de basura fabricado con materiales reciclados, ideal para clasificar tus desechos. Diseño funcional y duradero que facilita el reciclaje en tu hogar o lugar de trabajo.',
                    image: 'https://www.brabantia.com/cdn-cgi/image/format=auto,onerror=redirect/media/catalog/product/cache/80d68d1e74225849a505107b39a42815/8/0/800368_product_shot_back_01-web.jpg',
                    category: 'basura',
                    materials: ['Plástico reciclado', 'Acero recuperado'],
                    bottlesUsed: 8,
                    otherStats: 'Fabricado con materiales post-consumo'
                },
                {
                    id: 4,
                    name: 'Macetero de Jardín Ecológico',
                    description: 'Para tus plantas con conciencia ambiental',
                    longDescription: 'Macetero fabricado con materiales reciclados, perfecto para cultivar tus plantas favoritas. Diseño resistente a la intemperie que combina funcionalidad y sostenibilidad.',
                    image: '/imagenes/macetas.png',
                    category: 'jardin',
                    materials: ['Caucho reciclado', 'Fibra natural'],
                    bottlesUsed: 0,
                    otherStats: 'Reutiliza materiales en desuso'
                },
                {
                    id: 5,
                    name: 'Comedero para Aves Silvestres',
                    description: 'Atrae aves a tu jardín de manera sostenible',
                    longDescription: 'Comedero para aves fabricado con madera recuperada y materiales ecológicos. Diseñado para resistir las condiciones climáticas mientras proporciona alimento a las aves locales.',
                    image: '/imagenes/aves2.webp',
                    category: 'comedero',
                    materials: ['Madera reciclada', 'Metal recuperado'],
                    bottlesUsed: 0,
                    otherStats: 'Promueve la biodiversidad urbana'
                }
            ],
            categories: [
                { label: 'Todos', value: 'all' },
                { label: 'Comederos', value: 'comedero' },
                { label: 'Almacenaje', value: 'almacenaje' },
                { label: 'Cubos de Basura', value: 'basura' },
                { label: 'Jardín', value: 'jardin' }
            ],
            activeFilter: 'all',
            searchQuery: '',
            selectedProduct: null
        }
    },
    computed: {
        filteredProducts() {
            let filtered = this.products;

            // Filtrar por categoría
            if (this.activeFilter !== 'all') {
                filtered = filtered.filter(p => p.category === this.activeFilter);
            }

            // Filtrar por búsqueda
            if (this.searchQuery) {
                const query = this.searchQuery.toLowerCase();
                filtered = filtered.filter(p =>
                    p.name.toLowerCase().includes(query) ||
                    p.description.toLowerCase().includes(query) ||
                    (p.longDescription && p.longDescription.toLowerCase().includes(query)) ||
                    p.materials.some(m => m.toLowerCase().includes(query))
                );
            }

            return filtered;
        }
    },
    methods: {
        filterProducts(category) {
            this.activeFilter = category;
        },
        openProductModal(product) {
            this.selectedProduct = product;
        }
    }
}
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

@keyframes float1 {
    0%, 100% { transform: translateY(0) rotate(0deg); }
    50% { transform: translateY(-20px) rotate(5deg); }
}

@keyframes float2 {
    0%, 100% { transform: translateY(0) rotate(0deg); }
    50% { transform: translateY(15px) rotate(-3deg); }
}

@keyframes float3 {
    0%, 100% { transform: translateY(0) rotate(0deg); }
    50% { transform: translateY(-15px) rotate(7deg); }
}

@keyframes float4 {
    0%, 100% { transform: translate(0, 0) rotate(0deg); }
    50% { transform: translate(10px, 10px) rotate(-5deg); }
}

@keyframes float5 {
    0%, 100% { transform: translate(0, 0) rotate(0deg); }
    50% { transform: translate(-10px, -15px) rotate(10deg); }
}

.animate-float1 {
    animation: float1 8s ease-in-out infinite;
}

.animate-float2 {
    animation: float2 10s ease-in-out infinite;
}

.animate-float3 {
    animation: float3 12s ease-in-out infinite;
}

.animate-float4 {
    animation: float4 9s ease-in-out infinite;
}

.animate-float5 {
    animation: float5 11s ease-in-out infinite;
}

.modal-enter-active, .modal-leave-active {
    transition: opacity 0.3s;
}
.modal-enter, .modal-leave-to {
    opacity: 0;
}

.img-zoom {
    transition: transform 0.3s ease;
}
.img-zoom:hover {
    transform: scale(1.05);
}
</style>
