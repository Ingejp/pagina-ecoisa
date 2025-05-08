<template>
    <section
        id="inicio"
        class="relative h-screen w-full flex items-center justify-center bg-cover bg-center text-white"
        style="background-image: url('/imagenes/LOGO3.png');"
    >
        <!-- Capa oscura encima de la imagen para mejor contraste -->
        <div class="absolute inset-0 bg-black/60"></div>

        <!-- Contenido principal -->
        <div class="relative z-10 text-center max-w-4xl px-6" data-aos="zoom-in">
            <h1 class="text-4xl md:text-6xl font-extrabold leading-tight drop-shadow-lg">
                Dale vida nueva a tus <span class="text-green-400">botellas</span><br />
                con propósito y <span class="text-yellow-300">creatividad</span>
            </h1>

            <p class="mt-6 text-lg md:text-2xl text-gray-200 font-light drop-shadow">
                Juntos transformamos residuos en oportunidades reales.
            </p>

            <a
                href="#proyecto"
                class="mt-10 inline-flex items-center bg-green-500 hover:bg-green-600 text-white px-8 py-4 rounded-full shadow-lg text-lg font-semibold transition duration-300 ease-in-out"
            >
                Explorar el proyecto <i class="fas fa-leaf ml-3"></i>
            </a>
        </div>
    </section>
</template>

<script>
export default {
    name: "HeroSection"
};
</script>

<style scoped>
section {
    will-change: transform;
}
</style>
