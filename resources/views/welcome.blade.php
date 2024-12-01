<x-home-layout>
    
    <!-- Hero Section -->
    <section class="bg-[#e6d2c5] py-20">
        <div class="container mx-auto flex flex-col md:flex-row items-center px-4">
            <div class="md:w-1/2 space-y-4 text-center md:text-left">
                <h1 class="text-4xl text-[#5d4037] font-bold">Fashion for Everyone</h1>
                <p class="text-lg text-[#7a5a4a]">Explore our new product!</p>
                <a href="{{ route('catalog') }}" class="inline-block bg-[#d7b29d] text-white px-6 py-3 rounded shadow hover:bg-[#c9a48a]">Catalog</a>
            </div>
            <div class="md:w-1/2">
                <img src={{ asset('images/fashion-models.png') }} alt="Fashion Model" class="mx-auto md:ml-auto max-h-80 ">
            </div>
        </div>
    </section>

    <!-- Why Us Section -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto text-center px-4">
            <h2 class="text-3xl font-bold mb-8">Why Us?</h2>
            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-white p-6 rounded shadow">
                    <h3 class="text-xl font-semibold">New Collection</h3>
                    <p>We provide a wide range of the latest clothing with the newest trends for everyone.</p>
                </div>
                <div class="bg-white p-6 rounded shadow">
                    <h3 class="text-xl font-semibold">Affordable Prices</h3>
                    <p>Get high-quality products at prices that fit your budget.</p>
                </div>
                <div class="bg-white p-6 rounded shadow">
                    <h3 class="text-xl font-semibold">Fast Service</h3>
                    <p>Easy purchasing process and quick delivery.</p>
                </div>
            </div>
            <a href="#about" class="mt-8 inline-block bg-blue-600 text-white px-6 py-3 rounded shadow hover:bg-blue-700">More About Us</a>
        </div>
    </section>

</x-home-layout>