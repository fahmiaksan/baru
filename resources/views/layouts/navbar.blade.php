<nav class="flex items-center space-x-6 py-3">
  <ul class="hidden md:flex space-x-4">
      <li><a href="{{ route('home') }}" class="hover:bg-[#d7b29d] px-3 py-2 rounded-lg">Home</a></li>
      <li><a href="{{ route('catalog') }}" class="hover:bg-[#d7b29d] py-2 rounded-lg px-3">Catalog</a></li>
      <li><a href="#promotion" class="hover:bg-[#d7b29d] py-2 rounded-lg px-3">Promotion</a></li>
      <li><a href="{{ route('about') }}" class="hover:bg-[#d7b29d] py-2 rounded-lg px-3">About Us</a></li>
      <li><a href="{{ route('contact') }}" class="hover:bg-[#d7b29d] py-2 rounded-lg px-3">Contact</a></li>
  </ul>
  <div class="flex items-center space-x-4">
      <a href="#" id="search" class="hover:bg-[#d7b29d] py-2 rounded-lg px-3"><x-feathericon-search/></i></a>
      <a href="{{ route('cart.index') }}" id="shopping-cart" class="hover:bg-[#d7b29d] py-2 rounded-lg px-3"><x-feathericon-shopping-cart/></a>
      <a href="#" id="hamburger-menu" class="md:hidden hover:bg-[#d7b29d] py-2 rounded-lg px-3"><x-feathericon-alert-triangle/></a>
  </div>
  @if (Route::has('login'))
  <a href="{{ route('dashboard') }}" class="hidden md:block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700" id="btnLogin">Dashboard</a>
  @else
  <a href="{{ route('login') }}" class="hidden md:block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700" id="btnLogin">login</a>
  @endif
  
</nav>