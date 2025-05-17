<!DOCTYPE html>
<html>
<head>
    <title>Prediction Result</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gradient-to-br from-blue-50 to-blue-100 min-h-screen flex items-center justify-center">

    <div class="bg-white p-10 rounded-3xl shadow-xl w-full max-w-md text-center space-y-6">
        <h1 class="text-3xl font-bold text-gray-800">Hasil Prediksi</h1>

        <div class="space-y-4">
            <p class="text-lg text-gray-600">
                <span class="font-semibold">Kelas:</span> 
                <span class="text-blue-600">{{ $prediction_label }}</span>
            </p>

            <p class="text-lg text-gray-600">
                <span class="font-semibold">Confidence:</span> 
                <span class="text-green-600">{{ number_format($confidence * 100, 2) }}%</span>
            </p>
            <div>
                <p class="text-lg text-green-600">Nama Penyakit: <span class="text-gray-400">{{ $disease_name }}</span></p>
                <p class="text-lg text-green-600">Solution: <span class="text-gray-400">{{ $disease_name }}</span></p>
            </div>
        </div>

        <div class="pt-6">
            <a href="/" class="inline-block bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-6 rounded-full transition duration-200">
                Upload Lagi
            </a>
        </div>
    </div>

</body>
</html>
