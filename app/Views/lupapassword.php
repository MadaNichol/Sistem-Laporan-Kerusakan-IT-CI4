<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Forgot Password - Helpdesk System</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-300 flex items-center justify-center h-screen">
    <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md text-center">
        <h1 class="text-3xl font-bold mb-1">Welcome</h1>
        <p class="italic text-gray-600 mb-6">to the Helpdesk System</p>

        <form action="<?= base_url('/forgot') ?>" method="post" class="space-y-4">
            <input type="email" name="email" placeholder="email"
                class="w-full px-4 py-2 border border-black rounded-md text-purple-400 italic focus:outline-none" required>

            <button type="submit"
                class="w-full bg-sky-400 hover:bg-sky-500 text-white font-semibold py-2 rounded-md transition">
                Reset Password
            </button>
        </form>

        <div class="mt-4 text-sm text-blue-700">
            <a href="<?= base_url('/login') ?>" class="hover:underline">Back to login</a>
        </div>
    </div>
</body>
</html>