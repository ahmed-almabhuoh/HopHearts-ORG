<!doctype html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
  <header class="bg-[#FFE4B5] border-b border-[#FF6F61] fixed top-0 inset-x-0 z-50 shadow-lg">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="relative flex items-center justify-between h-16">
        <!-- Logo -->
        <div class="flex-shrink-0">
          <a href="#" class="flex items-center">
            <img class="h-16" src="/assets/logo/logo/logo.png" alt="Hop Hearts Logo">
            <!-- <span class="ml-2 text-[#8B4000] text-2xl font-bold">Hop Hearts</span> -->
          </a>
        </div>

        <!-- Desktop Navigation Menu -->
        <nav class="hidden md:flex md:space-x-8">
          <a href="#about" class="text-[#8B4000] hover:text-[#FF6F61] transition-colors duration-300">About Us</a>
          <a href="#services" class="text-[#8B4000] hover:text-[#FF6F61] transition-colors duration-300">Services</a>
          <a href="#projects" class="text-[#8B4000] hover:text-[#FF6F61] transition-colors duration-300">Projects</a>
          <a href="#blog" class="text-[#8B4000] hover:text-[#FF6F61] transition-colors duration-300">Blog</a>
          <a href="#contact" class="text-[#8B4000] hover:text-[#FF6F61] transition-colors duration-300">Contact</a>
        </nav>

        <!-- Mobile Menu Button -->
        <div class="absolute inset-y-0 right-0 flex items-center md:hidden">
          <button type="button"
            class="inline-flex items-center justify-center p-2 text-[#8B4000] hover:text-[#FF6F61] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#FF6F61]"
            aria-controls="mobile-menu" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
              stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
          </button>
        </div>
      </div>
    </div>

    <!-- Mobile Menu, show/hide based on menu state. -->
    <div
      class="absolute inset-x-0 top-full origin-top-right transform p-2 transition-all duration-300 ease-out md:hidden"
      id="mobile-menu">
      <div class="bg-[#FFE4B5] shadow-lg ring-1 ring-black ring-opacity-5 rounded-lg">
        <div class="px-5 pt-4 flex items-center justify-between">
          <div>
            <img class="h-8" src="/path/to/logo.png" alt="Hop Hearts Logo">
          </div>
          <button type="button"
            class="inline-flex items-center justify-center p-2 text-[#8B4000] hover:text-[#FF6F61] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#FF6F61]"
            aria-controls="mobile-menu" aria-expanded="false">
            <span class="sr-only">Close menu</span>
            <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
              stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>
        <div class="px-2 pt-2 pb-3 space-y-1">
          <a href="#about" class="block text-[#8B4000] hover:text-[#FF6F61] transition-colors duration-300">About Us</a>
          <a href="#services"
            class="block text-[#8B4000] hover:text-[#FF6F61] transition-colors duration-300">Services</a>
          <a href="#projects"
            class="block text-[#8B4000] hover:text-[#FF6F61] transition-colors duration-300">Projects</a>
          <a href="#blog" class="block text-[#8B4000] hover:text-[#FF6F61] transition-colors duration-300">Blog</a>
          <a href="#contact"
            class="block text-[#8B4000] hover:text-[#FF6F61] transition-colors duration-300">Contact</a>
        </div>
      </div>
    </div>
  </header>


  <section id="about" class="py-20 bg-[#FFE4B5]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="text-center">
        <h2 class="text-3xl font-extrabold text-[#8B4000] sm:text-4xl">About Us</h2>
        <p class="mt-4 text-lg text-[#8B4000]">
          At Hop Hearts, we are dedicated to delivering cutting-edge technology products that make a difference. Our
          mission is to provide innovative solutions tailored to meet the needs of our diverse clientele.
        </p>
      </div>

      <div class="mt-12 grid grid-cols-1 md:grid-cols-2 gap-8">
        <!-- Mission Statement -->
        <div class="relative bg-white p-8 rounded-lg shadow-lg">
          <h3 class="text-2xl font-bold text-[#FF6F61]">Our Mission</h3>
          <p class="mt-4 text-base text-[#6F4F28]">
            Our mission is to drive technological innovation and deliver high-quality products that empower businesses
            and individuals to achieve their goals. We strive to create value through excellence and creativity.
          </p>
        </div>

        <!-- Vision Statement -->
        <div class="relative bg-white p-8 rounded-lg shadow-lg">
          <h3 class="text-2xl font-bold text-[#FF6F61]">Our Vision</h3>
          <p class="mt-4 text-base text-[#6F4F28]">
            We envision a world where technology seamlessly integrates into everyday life, enhancing efficiency and
            connectivity. Our vision is to be at the forefront of this transformation, setting new standards in the tech
            industry.
          </p>
        </div>
      </div>

      <div class="mt-12 text-center">
        <h3 class="text-2xl font-bold text-[#FF6F61]">Our Values</h3>
        <div class="mt-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
          <!-- Value 1 -->
          <div class="bg-white p-6 rounded-lg shadow-md">
            <h4 class="text-xl font-semibold text-[#8B4000]">Innovation</h4>
            <p class="mt-2 text-base text-[#6F4F28]">
              We are committed to pushing the boundaries of technology, constantly exploring new ideas and solutions.
            </p>
          </div>

          <!-- Value 2 -->
          <div class="bg-white p-6 rounded-lg shadow-md">
            <h4 class="text-xl font-semibold text-[#8B4000]">Integrity</h4>
            <p class="mt-2 text-base text-[#6F4F28]">
              We uphold the highest standards of honesty and transparency in all our interactions and business
              practices.
            </p>
          </div>

          <!-- Value 3 -->
          <div class="bg-white p-6 rounded-lg shadow-md">
            <h4 class="text-xl font-semibold text-[#8B4000]">Customer Focus</h4>
            <p class="mt-2 text-base text-[#6F4F28]">
              Our customers are at the heart of everything we do. We are dedicated to understanding and meeting their
              needs.
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>


  <section id="services" class="py-16 bg-[#FFF5E1]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="text-center">
        <h2 class="text-3xl font-extrabold text-[#8B4000] sm:text-4xl">Our Services</h2>
        <p class="mt-4 text-lg text-[#6F4F28]">
          We offer a range of technology products and services designed to meet the needs of businesses and individuals.
          Explore our services to see how we can help you achieve your goals.
        </p>
      </div>

      <div class="mt-12 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
        <!-- Service 1 -->
        <div class="bg-white p-8 rounded-lg shadow-lg">
          <div class="flex items-center justify-center mb-4">
            <svg class="w-12 h-12 text-[#FF6F61]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
              stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6l4 2m-8 0l4-2V6" />
            </svg>
          </div>
          <h3 class="text-xl font-semibold text-[#8B4000]">Custom Software Development</h3>
          <p class="mt-2 text-base text-[#6F4F28]">
            Tailor-made software solutions designed to meet your unique business needs and objectives.
          </p>
        </div>

        <!-- Service 2 -->
        <div class="bg-white p-8 rounded-lg shadow-lg">
          <div class="flex items-center justify-center mb-4">
            <svg class="w-12 h-12 text-[#FF6F61]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
              stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M4 7v11a1 1 0 001 1h14a1 1 0 001-1V7l-7 4-7-4z" />
            </svg>
          </div>
          <h3 class="text-xl font-semibold text-[#8B4000]">Web Development</h3>
          <p class="mt-2 text-base text-[#6F4F28]">
            Creating responsive and user-friendly websites that enhance your online presence and engagement.
          </p>
        </div>

        <!-- Service 3 -->
        <div class="bg-white p-8 rounded-lg shadow-lg">
          <div class="flex items-center justify-center mb-4">
            <svg class="w-12 h-12 text-[#FF6F61]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
              stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M3 12l2-2m0 0l2-2m-2 2h12m-12 0l2 2m0 0l2 2M5 10h14m-7-7v14" />
            </svg>
          </div>
          <h3 class="text-xl font-semibold text-[#8B4000]">Mobile App Development</h3>
          <p class="mt-2 text-base text-[#6F4F28]">
            Developing intuitive and high-performance mobile applications for both iOS and Android platforms.
          </p>
        </div>

        <!-- Service 4 -->
        <div class="bg-white p-8 rounded-lg shadow-lg">
          <div class="flex items-center justify-center mb-4">
            <svg class="w-12 h-12 text-[#FF6F61]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
              stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h10M7 12h10m-5 5h5" />
            </svg>
          </div>
          <h3 class="text-xl font-semibold text-[#8B4000]">Cloud Solutions</h3>
          <p class="mt-2 text-base text-[#6F4F28]">
            Offering scalable cloud solutions that enhance efficiency, flexibility, and data management.
          </p>
        </div>

        <!-- Service 5 -->
        <div class="bg-white p-8 rounded-lg shadow-lg">
          <div class="flex items-center justify-center mb-4">
            <svg class="w-12 h-12 text-[#FF6F61]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
              stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M12 8V4m0 0v4m0 0H8m4 0h4m0 8v4m0-4v4m-4-4H8m4 0h4" />
            </svg>
          </div>
          <h3 class="text-xl font-semibold text-[#8B4000]">IT Consulting</h3>
          <p class="mt-2 text-base text-[#6F4F28]">
            Expert advice and strategies to optimize your IT infrastructure and achieve your technology goals.
          </p>
        </div>

        <!-- Service 6 -->
        <div class="bg-white p-8 rounded-lg shadow-lg">
          <div class="flex items-center justify-center mb-4">
            <svg class="w-12 h-12 text-[#FF6F61]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
              stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M12 4V2m0 20v-2m-7-5h2m12 0h2m-2-7v12m-4 0V6m-4 0v12" />
            </svg>
          </div>
          <h3 class="text-xl font-semibold text-[#8B4000]">Cybersecurity</h3>
          <p class="mt-2 text-base text-[#6F4F28]">
            Comprehensive cybersecurity solutions to protect your digital assets and ensure data privacy.
          </p>
        </div>
      </div>
    </div>
  </section>


  <section id="products" class="py-16 bg-[#FFE4B5]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="text-center">
        <h2 class="text-3xl font-extrabold text-[#8B4000] sm:text-4xl">Our Products</h2>
        <p class="mt-4 text-lg text-[#6F4F28]">
          Discover our range of innovative technology products designed to enhance your business and everyday life. Each
          product is crafted with precision to meet your needs and exceed your expectations.
        </p>
      </div>

      <div class="mt-12 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">

        <!-- Product 1 -->
        <div class="bg-white p-6 rounded-lg shadow-lg">
          <img class="w-full h-48 object-cover rounded-lg mb-4" src="../assets/pexels-pixabay-221322.jpg"
            alt="Product 1">
          <h3 class="text-xl font-semibold text-[#8B4000]">Rocket ShM</h3>
          <p class="mt-2 text-base text-[#6F4F28]">
            Rocket ShM is a powerful platform for efficient logistics and shipping management. It offers real-time
            tracking, automated scheduling, and insightful analytics to streamline operations and enhance customer
            satisfaction. With its user-friendly interface and robust features, Rocket ShM simplifies the entire
            shipping process from order to delivery.
          </p>
          <a href="https:\\rocket-shm.hophearts.com" target="_blank"
            class="mt-4 inline-block bg-[#FF6F61] text-white py-2 px-4 rounded-lg font-semibold">Learn More</a>
        </div>

      </div>
    </div>
  </section>


  <section id="blog" class="py-16 bg-[#F9F3E6]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="text-center">
        <h2 class="text-3xl font-extrabold text-[#8B4000] sm:text-4xl">Latest Blog Posts</h2>
        <p class="mt-4 text-lg text-[#6F4F28]">
          Stay updated with our latest insights, trends, and updates from the tech world. Our blog covers a range of
          topics to keep you informed and engaged.
        </p>
      </div>

      <div class="mt-12 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
        <!-- Blog Post 1 -->
        <div class="bg-white p-6 rounded-lg shadow-lg">
          <img class="w-full h-48 object-cover rounded-lg mb-4" src="https://via.placeholder.com/400" alt="Blog Post 1">
          <h3 class="text-xl font-semibold text-[#8B4000]">Understanding the Latest Tech Trends</h3>
          <p class="mt-2 text-base text-[#6F4F28]">
            Explore the most recent advancements in technology and how they are shaping the future of the industry.
          </p>
          <a href="#" class="mt-4 inline-block bg-[#FF6F61] text-white py-2 px-4 rounded-lg font-semibold">Read More</a>
        </div>

        <!-- Blog Post 2 -->
        <div class="bg-white p-6 rounded-lg shadow-lg">
          <img class="w-full h-48 object-cover rounded-lg mb-4" src="https://via.placeholder.com/400" alt="Blog Post 2">
          <h3 class="text-xl font-semibold text-[#8B4000]">How to Improve Your Web Presence</h3>
          <p class="mt-2 text-base text-[#6F4F28]">
            Discover strategies and tips to enhance your online visibility and engage more effectively with your
            audience.
          </p>
          <a href="#" class="mt-4 inline-block bg-[#FF6F61] text-white py-2 px-4 rounded-lg font-semibold">Read More</a>
        </div>

        <!-- Blog Post 3 -->
        <div class="bg-white p-6 rounded-lg shadow-lg">
          <img class="w-full h-48 object-cover rounded-lg mb-4" src="https://via.placeholder.com/400" alt="Blog Post 3">
          <h3 class="text-xl font-semibold text-[#8B4000]">The Future of Mobile Applications</h3>
          <p class="mt-2 text-base text-[#6F4F28]">
            A deep dive into the trends and technologies shaping the future of mobile app development.
          </p>
          <a href="#" class="mt-4 inline-block bg-[#FF6F61] text-white py-2 px-4 rounded-lg font-semibold">Read More</a>
        </div>

        <!-- Blog Post 4 -->
        <div class="bg-white p-6 rounded-lg shadow-lg">
          <img class="w-full h-48 object-cover rounded-lg mb-4" src="https://via.placeholder.com/400" alt="Blog Post 4">
          <h3 class="text-xl font-semibold text-[#8B4000]">Tips for Enhancing Cybersecurity</h3>
          <p class="mt-2 text-base text-[#6F4F28]">
            Practical advice and best practices for safeguarding your digital assets against threats and
            vulnerabilities.
          </p>
          <a href="#" class="mt-4 inline-block bg-[#FF6F61] text-white py-2 px-4 rounded-lg font-semibold">Read More</a>
        </div>

        <!-- Blog Post 5 -->
        <div class="bg-white p-6 rounded-lg shadow-lg">
          <img class="w-full h-48 object-cover rounded-lg mb-4" src="https://via.placeholder.com/400" alt="Blog Post 5">
          <h3 class="text-xl font-semibold text-[#8B4000]">Cloud Solutions for Modern Businesses</h3>
          <p class="mt-2 text-base text-[#6F4F28]">
            An overview of how cloud computing can transform your business operations and drive efficiency.
          </p>
          <a href="#" class="mt-4 inline-block bg-[#FF6F61] text-white py-2 px-4 rounded-lg font-semibold">Read More</a>
        </div>

        <!-- Blog Post 6 -->
        <div class="bg-white p-6 rounded-lg shadow-lg">
          <img class="w-full h-48 object-cover rounded-lg mb-4" src="https://via.placeholder.com/400" alt="Blog Post 6">
          <h3 class="text-xl font-semibold text-[#8B4000]">Best Practices for IT Consulting</h3>
          <p class="mt-2 text-base text-[#6F4F28]">
            Essential strategies and recommendations for successful IT consulting engagements.
          </p>
          <a href="#" class="mt-4 inline-block bg-[#FF6F61] text-white py-2 px-4 rounded-lg font-semibold">Read More</a>
        </div>
      </div>
    </div>
  </section>

  <section id="contact" class="py-16 bg-[#F4F1F1]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="text-center">
        <h2 class="text-3xl font-extrabold text-[#4A4A4A] sm:text-4xl">Contact Us</h2>
        <p class="mt-4 text-lg text-[#6D6D6D]">
          We’d love to hear from you. Whether you have questions, feedback, or just want to connect, please reach out
          using the contact form or the details below.
        </p>
      </div>

      <div class="mt-12 grid grid-cols-1 md:grid-cols-2 gap-12">
        <!-- Contact Form -->
        <div class="bg-white p-8 rounded-lg shadow-lg border border-gray-200">
          <h3 class="text-2xl font-semibold text-[#4A4A4A]">Send Us a Message</h3>
          <form action="#" method="POST" class="mt-6 space-y-4">
            <div>
              <label for="name" class="block text-sm font-medium text-[#6D6D6D]">Name</label>
              <input type="text" id="name" name="name" required
                class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:border-[#FF6F61] focus:ring focus:ring-[#FF6F61] focus:ring-opacity-50 sm:text-sm" />
            </div>

            <div>
              <label for="email" class="block text-sm font-medium text-[#6D6D6D]">Email</label>
              <input type="email" id="email" name="email" required
                class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:border-[#FF6F61] focus:ring focus:ring-[#FF6F61] focus:ring-opacity-50 sm:text-sm" />
            </div>

            <div>
              <label for="message" class="block text-sm font-medium text-[#6D6D6D]">Message</label>
              <textarea id="message" name="message" rows="4" required
                class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:border-[#FF6F61] focus:ring focus:ring-[#FF6F61] focus:ring-opacity-50 sm:text-sm"></textarea>
            </div>

            <button type="submit"
              class="inline-block bg-[#FF6F61] text-white py-2 px-6 rounded-lg font-semibold hover:bg-[#FF6F61]/90 transition">Send
              Message</button>
          </form>
        </div>

        <!-- Contact Details -->
        <div class="bg-white p-8 rounded-lg shadow-lg border border-gray-200">
          <h3 class="text-2xl font-semibold text-[#4A4A4A]">Contact Information</h3>
          <ul class="mt-6 space-y-4">
            <li class="flex items-center text-[#6D6D6D]">
              <img class="w-6 h-6 mr-3" src="https://cdn-icons-png.flaticon.com/512/194/194931.png"
                alt="Address Icon" />
              <span>123 Technology Lane, Tech City, TX 12345</span>
            </li>
            <li class="flex items-center text-[#6D6D6D]">
              <img class="w-6 h-6 mr-3" src="https://cdn-icons-png.flaticon.com/512/561/561127.png" alt="Phone Icon" />
              <span>(123) 456-7890</span>
            </li>
            <li class="flex items-center text-[#6D6D6D]">
              <img class="w-6 h-6 mr-3" src="https://cdn-icons-png.flaticon.com/512/732/732200.png" alt="Email Icon" />
              <span>info@hophearts.com</span>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </section>


  <footer class="bg-[#4A4A4A] text-white py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <!-- About Section -->
        <div>
          <h3 class="text-xl font-semibold mb-4">About Us</h3>
          <p class="text-sm">
            Hop Hearts is dedicated to delivering cutting-edge technology products with a focus on innovation and
            customer satisfaction. We strive to bring you the best in tech solutions and services.
          </p>
        </div>

        <!-- Links Section -->
        <div>
          <h3 class="text-xl font-semibold mb-4">Quick Links</h3>
          <ul class="space-y-2">
            <li><a href="#home" class="text-gray-300 hover:text-white">Home</a></li>
            <li><a href="#about" class="text-gray-300 hover:text-white">About Us</a></li>
            <li><a href="#services" class="text-gray-300 hover:text-white">Services</a></li>
            <li><a href="#products" class="text-gray-300 hover:text-white">Products</a></li>
            <li><a href="#blog" class="text-gray-300 hover:text-white">Blog</a></li>
            <li><a href="#contact" class="text-gray-300 hover:text-white">Contact</a></li>
          </ul>
        </div>

        <!-- Contact & Social Media Section -->
        <div>
          <h3 class="text-xl font-semibold mb-4">Contact & Follow Us</h3>
          <ul class="space-y-2">
            <li class="flex items-center text-gray-300">
              <img class="w-5 h-5 mr-3" src="https://cdn-icons-png.flaticon.com/512/194/194931.png"
                alt="Address Icon" />
              <span>123 Technology Lane, Tech City, TX 12345</span>
            </li>
            <li class="flex items-center text-gray-300">
              <img class="w-5 h-5 mr-3" src="https://cdn-icons-png.flaticon.com/512/561/561127.png" alt="Phone Icon" />
              <span>(123) 456-7890</span>
            </li>
            <li class="flex items-center text-gray-300">
              <img class="w-5 h-5 mr-3" src="https://cdn-icons-png.flaticon.com/512/732/732200.png" alt="Email Icon" />
              <span>info@hophearts.com</span>
            </li>
          </ul>
          <div class="mt-4 flex space-x-4">
            <a href="https://facebook.com" class="text-gray-300 hover:text-white">
              <img class="w-6 h-6" src="https://cdn-icons-png.flaticon.com/512/733/733547.png" alt="Facebook" />
            </a>
            <a href="https://twitter.com" class="text-gray-300 hover:text-white">
              <img class="w-6 h-6" src="https://cdn-icons-png.flaticon.com/512/733/733579.png" alt="Twitter" />
            </a>
            <a href="https://linkedin.com" class="text-gray-300 hover:text-white">
              <img class="w-6 h-6" src="https://cdn-icons-png.flaticon.com/512/733/733561.png" alt="LinkedIn" />
            </a>
            <a href="https://instagram.com" class="text-gray-300 hover:text-white">
              <img class="w-6 h-6" src="https://cdn-icons-png.flaticon.com/512/733/733558.png" alt="Instagram" />
            </a>
          </div>
        </div>
      </div>

      <div class="mt-8 border-t border-gray-600 pt-4 text-center">
        <p class="text-sm text-gray-400">© 2024 Hop Hearts. All rights reserved.</p>
      </div>
    </div>
  </footer>


</body>

</html>
