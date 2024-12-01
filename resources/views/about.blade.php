<x-home-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('About Us') }}
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 text-gray-900">
                  <!-- Header Section -->
                  <div class="text-center mb-6">
                      <h1 class="text-4xl font-bold text-gray-800">About Us</h1>
                      <p class="text-gray-600 mt-2">Discover more about who we are and our mission.</p>
                  </div>

                  <!-- Mission and Vision -->
                  <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                      <div>
                          <h2 class="text-2xl font-semibold text-gray-800 mb-4">Our Mission</h2>
                          <p class="text-gray-600">
                              To deliver innovative solutions and exceptional services that create value for our customers and communities.
                          </p>
                      </div>
                      <div>
                          <h2 class="text-2xl font-semibold text-gray-800 mb-4">Our Vision</h2>
                          <p class="text-gray-600">
                              To be a trusted leader in our industry, inspiring progress and innovation.
                          </p>
                      </div>
                  </div>

                  <!-- Team Section -->
                  <div class="mt-8">
                      <h2 class="text-2xl font-semibold text-gray-800 mb-4">Meet Our Team</h2>
                      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                          <!-- Team Member 1 -->
                          <div class="bg-gray-100 rounded-lg p-4 text-center">
                              <img src="{{ asset('images/img1.jpg') }}" alt="Team Member" class="rounded-full w-24 mx-auto mb-4">
                              <h3 class="text-lg font-semibold text-gray-800">John Doe</h3>
                              <p class="text-gray-600">CEO & Founder</p>
                          </div>
                          <!-- Team Member 2 -->
                          <div class="bg-gray-100 rounded-lg p-4 text-center">
                              <img src="{{ asset('images/img2.jpg') }}" alt="Team Member" class="rounded-full w-24 mx-auto mb-4">
                              <h3 class="text-lg font-semibold text-gray-800">Jane Smith</h3>
                              <p class="text-gray-600">CTO</p>
                          </div>
                          <!-- Team Member 3 -->
                          <div class="bg-gray-100 rounded-lg p-4 text-center">
                              <img src="{{ asset('images/img3.jpg') }}" alt="Team Member" class="rounded-full w-24 mx-auto mb-4">
                              <h3 class="text-lg font-semibold text-gray-800">Mark Johnson</h3>
                              <p class="text-gray-600">Lead Developer</p>
                          </div>
                      </div>
                  </div>

                  <!-- Contact Section -->
                  <div class="mt-8">
                      <h2 class="text-2xl font-semibold text-gray-800 mb-4">Contact Us</h2>
                      <p class="text-gray-600">
                          If you have any questions or need more information, feel free to contact us at:
                          <a href="mailto:info@example.com" class="text-blue-600 hover:underline">info@example.com</a>
                      </p>
                  </div>
              </div>
          </div>
      </div>
  </div>
</x-home-layout>
