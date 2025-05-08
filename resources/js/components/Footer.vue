<template>
    <footer class="bg-gray-100 text-gray-700 pt-12 pb-6 px-6 md:px-16">
        <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-10">
            <!-- Logo y descripción -->
            <div>
                <div class="flex items-center space-x-2 mb-4">
                    <i class="fas fa-recycle text-green-600 text-3xl"></i>
                    <h2 class="text-xl font-bold text-gray-800">UMG Reciclaje</h2>
                </div>
                <p class="text-sm text-gray-600">
                    Transformamos residuos en oportunidades sostenibles mediante la innovación y el compromiso estudiantil.
                </p>
            </div>

            <div>
                <h3 class="text-lg font-semibold mb-3 text-gray-800">Enlaces</h3>
                <ul class="space-y-2 text-sm">
                    <li><a href="#inicio" class="hover:text-green-600 transition">Inicio</a></li>
                    <li><a href="#proyecto" class="hover:text-green-600 transition">Proyecto</a></li>
                    <li><a href="#facultades" class="hover:text-green-600 transition">Facultades</a></li>
                    <li><a href="#productos" class="hover:text-green-600 transition">Productos</a></li>
                    <li><a href="#contacto" class="hover:text-green-600 transition">Contacto</a></li>
                </ul>
            </div>

            <!-- Redes sociales -->
            <div>
                <h3 class="text-lg font-semibold mb-3 text-gray-800">Síguenos</h3>
                <div class="flex space-x-4">
                    <a href="#" class="text-green-600 hover:text-green-800 text-xl">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="text-green-600 hover:text-green-800 text-xl">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="text-green-600 hover:text-green-800 text-xl">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="#" class="text-green-600 hover:text-green-800 text-xl">
                        <i class="fab fa-linkedin"></i>
                    </a>
                </div>
            </div>
        </div>

        <div class="border-t border-gray-200 mt-10 pt-4 text-center text-sm text-gray-500">
            © 2024 ECOISA. Todos los derechos reservados.
        </div>
    </footer>
</template>

<script>
export default {
    name: "Footer",
};
</script>
