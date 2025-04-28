<!DOCTYPE html>
<html>
<head>
    <title>Upload Image for Prediction</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="bg-white p-8 rounded-2xl shadow-md w-full max-w-md">
        <h1 class="text-2xl font-bold text-gray-700 mb-6 text-center">Upload Gambar</h1>
        <form id="uploadForm" action="{{ route('predict') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            <div>
                <label class="block mb-2 text-sm font-medium text-gray-600">Pilih Gambar</label>
                <input 
                    type="file" 
                    name="image" 
                    required 
                    class="block w-full text-sm p-6 text-gray-700 border border-gray-300 rounded-lg cursor-pointer focus:outline-none focus:ring-2 focus:ring-blue-400"
                >
            </div>
            <div class="flex justify-center">
                <button 
                    id="submitBtn"
                    type="submit" 
                    class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-6 rounded-lg transition duration-200 flex items-center gap-2"
                >
                    <svg id="spinner" class="hidden w-5 h-5 animate-spin text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4l3-3-3-3v4a8 8 0 100 16v-4l-3 3 3 3v-4a8 8 0 01-8-8z"></path>
                    </svg>
                    <span id="btnText">Predict</span>
                </button>
            </div>
        </form>
    </div>

    <script>
        const form = document.getElementById('uploadForm');
        const submitBtn = document.getElementById('submitBtn');
        const spinner = document.getElementById('spinner');
        const btnText = document.getElementById('btnText');

        form.addEventListener('submit', function() {
            submitBtn.disabled = true;
            spinner.classList.remove('hidden');
            btnText.textContent = 'Processing...';
        });
    </script>

</body>
</html>
