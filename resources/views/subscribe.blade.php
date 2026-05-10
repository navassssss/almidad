<x-layouts.app>
  <section class="bg-gray-100">

    <!-- Header Section -->
    <section class="w-full bg-no-repeat bg-cover  bg-center mx-auto"
      style="background-image: url({{ asset('images/footer.jpg') }}); background-size: cover; height: auto;">
      <div class="bg-white bg-opacity-95 grid place-items-center text-white py-6" style="min-height: 600px;">
        <div class="container mx-auto text-center p-6 w-full max-w-7xl" data-aos="fade-in">
          <a href="/">
            <img src="{{ asset('images/logo.png') }}" alt="Al Midad Logo" class="mx-auto mb-4 w-64" />
          </a>
          <h1 class="text-2xl">AL MIDAD ARABIC BIMONTHLY</h1>
          <p class="text-3xl font-bold">SUBSCRIPTION PORTAL</p>
        </div>
      </div>
    </section>

    <!-- About Section -->
    <section class="bg-white py-2 px-6 md:px-12" data-aos="fade-up">
      <div class="container grid md:grid-cols-2 gap-6 mx-auto w-full max-w-7xl place-items-center" dir="ltr">
        <div class="flex items-center mb-8">
          <img src="{{ asset('images/logo2.png') }}" alt="Al Midad Magazine Cover" class="w-3/4 mx-auto rounded-xl shadow-md" />
        </div>
        <p class="text-base max-w-4xl mx-auto w-full md:w-4/5 text-justify leading-relaxed text-gray-700">
          Al-Midad magazine is a bright idea of enthusiasts from Darul Hasanath Islamic College, aiming to spread and
          flourish the Arabic language and its literature among students...
        </p>
      </div>
    </section>

    <!-- GPay Payment Section -->
    <section class="bg-white py-12 px-6 md:px-12 max-w-3xl mx-auto mb-10 rounded-3xl shadow-lg" id="gpay-section">
      <h3 class="text-2xl font-bold text-center text-gray-800 mb-4">Step 1: Pay via GPay</h3>
      <p class="text-center text-gray-600 mb-6 text-lg">
        Please send <span class="font-bold text-green-700">₹150</span> to the number below or scan the QR code:
      </p>
      <div class="text-center text-xl text-blue-700 font-semibold mb-4">📱 9999999999</div>
      <div class="flex justify-center mb-6">
        <img src="/static/images/gpay_qr.png" alt="GPay QR Code"
          class="w-56 md:w-64 border-2 border-gray-300 rounded-2xl shadow-md transition hover:scale-105 duration-300">
      </div>
      <div class="text-center">
        <button onclick="showFormSection()"
          class="bg-green-600 text-white px-6 py-3 rounded-xl font-semibold text-lg shadow hover:bg-green-700 hover:shadow-lg transition">
          ✅ I Have Paid – Fill the Form
        </button>
      </div>
    </section>

    <!-- Subscription Form Section -->
    <div id="form-section" class="hidden">
      <section class="bg-[#577D8A] py-12" dir="ltr" data-aos="fade-up">
        <div class="container mx-auto p-6 md:p-8">
          <h2 class="text-3xl font-bold text-white text-center mb-4" data-aos="fade-up">SUBSCRIPTION FORM</h2>
          <p class="text-center text-gray-200 mb-8 font-light text-sm" data-aos="fade-up">Required fields are indicated *</p>

          <form method="POST" action="{{ route('subscribe') }}" enctype="multipart/form-data"
            class="max-w-3xl mx-auto bg-white p-6 md:p-10 shadow-xl rounded-3xl space-y-6">
            @csrf

            <div class="grid md:grid-cols-2 gap-4">
              <div>
                <label for="name" class="block text-gray-700 font-medium mb-1">Name*</label>
                <input type="text" id="name" name="name" class="w-full p-3 border border-gray-300 rounded-xl"
                  required />
              </div>
              <div>
                <label for="institution" class="block text-gray-700 font-medium mb-1">Institution/House*</label>
                <input type="text" id="institution" name="house" class="w-full p-3 border border-gray-300 rounded-xl"
                  required />
              </div>
            </div>

            <div class="grid md:grid-cols-2 gap-4">
              <div>
                <label for="contact" class="block text-gray-700 font-medium mb-1">Contact Number*</label>
                <input type="text" id="contact" name="contact" class="w-full p-3 border border-gray-300 rounded-xl"
                  required />
              </div>
              <div>
                <label for="email" class="block text-gray-700 font-medium mb-1">Email</label>
                <input type="email" id="email" name="email" class="w-full p-3 border border-gray-300 rounded-xl" />
              </div>
            </div>

            <div class="grid md:grid-cols-2 gap-4">
              <div>
                <label for="whatsapp" class="block text-gray-700 font-medium mb-1">Whatsapp Number*</label>
                <input type="text" id="whatsapp" name="whatsapp" class="w-full p-3 border border-gray-300 rounded-xl"
                  required />
              </div>
              <div>
                <label for="place" class="block text-gray-700 font-medium mb-1">Place*</label>
                <input type="text" id="place" name="place" class="w-full p-3 border border-gray-300 rounded-xl"
                  required />
              </div>
            </div>

            <div class="grid md:grid-cols-2 gap-4">
              <div>
                <label for="district" class="block text-gray-700 font-medium mb-1">District*</label>
                <input type="text" id="district" name="district" class="w-full p-3 border border-gray-300 rounded-xl"
                  required />
              </div>
              <div>
                <label for="state" class="block text-gray-700 font-medium mb-1">State*</label>
                <input type="text" id="state" name="state" class="w-full p-3 border border-gray-300 rounded-xl"
                  required />
              </div>
            </div>

            <div class="grid md:grid-cols-2 gap-4">
              <div>
                <label for="post" class="block text-gray-700 font-medium mb-1">Post Office*</label>
                <input type="text" id="post" name="post" class="w-full p-3 border border-gray-300 rounded-xl"
                  required />
              </div>
              <div>
                <label for="pin" class="block text-gray-700 font-medium mb-1">Pin*</label>
                <input type="text" id="pin" name="pin" class="w-full p-3 border border-gray-300 rounded-xl" required />
              </div>
            </div>

            <div>
              <label for="screenshot" class="block text-gray-700 font-medium mb-2">Upload Payment Screenshot*</label>
              <input
                type="file"
                id="screenshot"
                name="screenshot"
                accept="image/*"
                required
                class="block w-full text-sm text-gray-700 border border-gray-300 rounded-xl file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100"
              />
            </div>

            <div class="text-center">
              <button type="submit"
                class="bg-blue-600 hover:bg-blue-700 text-white font-semibold text-lg px-6 py-3 rounded-xl shadow hover:shadow-xl transition">
                📩 Submit Subscription
              </button>
            </div>
          </form>
        </div>
      </section>
    </div>

    <!-- Toggle Form Display Script -->
    <script>
      function showFormSection() {
        document.getElementById('gpay-section').classList.add('hidden');
        document.getElementById('form-section').classList.remove('hidden');
        window.scrollTo({ top: document.getElementById('form-section').offsetTop - 40, behavior: 'smooth' });
      }
    </script>

  </section>
</x-layouts.app>
