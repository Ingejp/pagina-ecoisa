<template>
    <section id="proceso" class="py-24 px-6 md:px-12 bg-gray-50">
        <div class="max-w-6xl mx-auto text-center">
            <h2 class="text-4xl md:text-5xl font-extrabold text-green-700 mb-12">
                ¡Así transformamos botellas en oportunidades!
            </h2>

            <div class="grid md:grid-cols-4 gap-10 text-left">
                <div class="step" v-for="(step, index) in pasos" :key="index" data-aos="fade-up" :data-aos-delay="index * 100">
                    <div class="step-icon">
                        <i :class="step.icon"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-2">{{ step.titulo }}</h3>
                    <p class="text-gray-600 text-sm">{{ step.descripcion }}</p>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
export default {
    name: "ProcesoReciclaje",
    data() {
        return {
            pasos: [
                {
                    titulo: "Recolectamos",
                    descripcion: "La Facultad de Administración organiza campañas para reunir botellas de plástico en el campus.",
                    icon: "fas fa-hand-holding-water text-green-600 text-4xl"
                },
                {
                    titulo: "Clasificamos",
                    descripcion: "Los materiales se separan y preparan según su tipo y calidad para facilitar su transformación.",
                    icon: "fas fa-boxes text-yellow-500 text-4xl"
                },
                {
                    titulo: "Transformamos",
                    descripcion: "La Facultad de Ingeniería funde y moldea el plástico para crear nuevos productos.",
                    icon: "fas fa-cogs text-blue-500 text-4xl"
                },
                {
                    titulo: "Digitalizamos",
                    descripcion: "La Facultad de Sistemas gestiona el proceso con apps y sistemas web de seguimiento.",
                    icon: "fas fa-laptop-code text-indigo-600 text-4xl"
                }
            ]
        };
    }
};
</script>

<style scoped>
.step {
    background-color: white;
    padding: 2rem;
    border-radius: 1rem;
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.05);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}
.step:hover {
    transform: translateY(-5px);
    box-shadow: 0 12px 25px rgba(0, 0, 0, 0.1);
}
.step-icon {
    margin-bottom: 1rem;
}
</style>
