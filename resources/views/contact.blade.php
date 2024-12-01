<x-home-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Contact Us') }}
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white  overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 text-gray-900 ">
                  <h3 class="text-2xl font-semibold mb-6">{{ __('We\'d love to hear from you!') }}</h3>

                  @if (session('success'))
                      <div class="bg-green-200 text-green-800 p-4 rounded-lg mb-6">
                          {{ session('success') }}
                      </div>
                  @endif

                  <!-- Contact Form -->
                  <form action="{{ route('contact.submit') }}" method="POST">
                      @csrf

                      <!-- Name -->
                      <div class="mb-4">
                          <label for="name" class="block text-sm font-medium text-gray-700 ">{{ __('Name') }}</label>
                          <input type="text" name="name" id="name" value="{{ old('name') }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-gray-100 dark:border-gray-600" required>
                          @error('name') <div class="text-red-500 text-sm mt-1">{{ $message }}</div> @enderror
                      </div>

                      <!-- Email -->
                      <div class="mb-4">
                          <label for="email" class="block text-sm font-medium text-gray-700 ">{{ __('Email') }}</label>
                          <input type="email" name="email" id="email" value="{{ old('email') }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-gray-100 dark:border-gray-600" required>
                          @error('email') <div class="text-red-500 text-sm mt-1">{{ $message }}</div> @enderror
                      </div>

                      <!-- Subject -->
                      <div class="mb-4">
                          <label for="subject" class="block text-sm font-medium text-gray-700 ">{{ __('Subject') }}</label>
                          <input type="text" name="subject" id="subject" value="{{ old('subject') }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-gray-100 dark:border-gray-600" required>
                          @error('subject') <div class="text-red-500 text-sm mt-1">{{ $message }}</div> @enderror
                      </div>

                      <!-- Message -->
                      <div class="mb-4">
                          <label for="message" class="block text-sm font-medium text-gray-700 ">{{ __('Message') }}</label>
                          <textarea name="message" id="message" rows="4" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:text-gray-100 dark:border-gray-600" required>{{ old('message') }}</textarea>
                          @error('message') <div class="text-red-500 text-sm mt-1">{{ $message }}</div> @enderror
                      </div>

                      <div class="flex items-center justify-end">
                          <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md shadow-sm text-sm font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                              {{ __('Send Message') }}
                          </button>
                      </div>
                  </form>
              </div>
          </div>
      </div>
  </div>
</x-home-layout>
