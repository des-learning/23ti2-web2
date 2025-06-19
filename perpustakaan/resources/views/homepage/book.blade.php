<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Book Detail</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800 font-sans">

  <header class="bg-blue-800 text-white p-6">
    <div class="container mx-auto">
      <h1 class="text-2xl font-bold">Book Detail</h1>
    </div>
  </header>

  <main class="container mx-auto p-6">
    <div class="bg-white rounded-lg shadow-lg p-6 flex flex-col md:flex-row gap-6">
      <!-- Book Cover -->
      <div class="w-full md:w-1/3">
        <img src="https://via.placeholder.com/300x450.png?text=Book+Cover" alt="Book Cover" class="rounded shadow" />
      </div>

      <!-- Book Information -->
      <div class="w-full md:w-2/3 space-y-4">
        <h2 class="text-3xl font-bold">{{ $book->title }}</h2>

        <div class="space-y-1 text-sm">
          <p><span class="font-semibold">Author:</span> {{ $book->author }}</p>
          <p><span class="font-semibold">Published Year:</span> {{ $book->published_year}}</p>
          <p><span class="font-semibold">Category:</span> {{ $book->category }}</p>
          <p><span class="font-semibold">ISBN:</span> {{ $book->isbn }}</p>
        </div>

        <div>
          <h3 class="text-lg font-semibold mt-4 mb-2">Excerpt</h3>
          <p class="text-gray-700 text-sm leading-relaxed">
            "{{ $book->excerpt }}"
          </p>
        </div>
      </div>
    </div>
  </main>

  <footer class="bg-blue-800 text-white text-center p-4 mt-10">
    &copy; 2025 City Library. All rights reserved.
  </footer>
</body>
</html>
