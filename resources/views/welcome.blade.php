<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lecture Management System</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <style>
        .gradient-bg {
            background: linear-gradient(135deg, #010a25 0%, #010a25 100%);
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .clock {
            font-family: monospace;
            font-size: 2.5rem;
            color: white;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .cover-section {
            background: url('assets/images/img2.jpg') no-repeat center center;
            background-size: cover;
            height: 500px;
            position: relative;
        }

        .cover-text {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: white;
            text-align: center;
        }

        .cover-title {
            font-size: 3rem;
            font-weight: bold;
            text-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        }

        .cover-subtitle {
            font-size: 1.25rem;
            margin-top: 1rem;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
        }

        .custom-hover:hover {
            background-color: #010a25 !important;
        }
    </style>
</head>

<body class="gradient-bg min-h-screen">
    <div class="relative">
        <!-- Cover Image Section -->
        <div class="cover-section">
            <div class="cover-text">
                <h1 class="cover-title">Welcome to Lecture Management System</h1>
                <p class="cover-subtitle">Effortlessly manage your lectures, Students and more</p>
            </div>
        </div>

        @if (Route::has('login'))
        <div class="absolute top-0 right-0 mt-6 mr-6 space-x-4">
            @auth
            <a href="{{ url('/admin') }}" class="text-white hover:text-blue-200 transition-colors">Admin</a>
            @else
            <a href="{{ route('login') }}"
                class="px-6 py-2 rounded-lg custom-hover transition-all font-semibold text-white"
                style="background-color: #E59802;">Login</a>

            @if (Route::has('register'))
            <a href="{{ route('register') }}" class="text-white hover:text-blue-200 transition-colors">Register</a>
            @endif
            @endauth
        </div>
        @endif

        <div class="container mx-auto px-4 py-6">
            <div class="text-center space-y-2">
                <!-- Clock -->
                <div class="glass-card inline-block px-8 py-4 rounded-xl mb-8">
                    <div class="clock" id="clock">00:00:00</div>
                </div>

                <!-- Feature Grid -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-12 max-w-6xl mx-auto">
                    <div class="glass-card p-6 rounded-xl text-white">
                        <h3 class="text-xl font-semibold mb-2">Track Attendance</h3>
                        <p class="text-blue-100">Monitor student attendance in real-time with our easy-to-use system</p>
                    </div>
                    <div class="glass-card p-6 rounded-xl text-white">
                        <h3 class="text-xl font-semibold mb-2">Generate Reports</h3>
                        <p class="text-blue-100">Create detailed attendance reports with just a few clicks</p>
                    </div>
                    <div class="glass-card p-6 rounded-xl text-white">
                        <h3 class="text-xl font-semibold mb-2">Manage Classes</h3>
                        <p class="text-blue-100">Easily organize your lectures and student groups</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function updateClock() {
            const now = new Date();
            const timeString = now.toLocaleTimeString('en-US', {
                hour12: false,
                hour: '2-digit',
                minute: '2-digit',
                second: '2-digit'
            });
            document.getElementById('clock').textContent = timeString;
        }

        updateClock();
        setInterval(updateClock, 1000);
    </script>
</body>

</html>