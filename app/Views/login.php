<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login - Helpdesk</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-300 flex items-center justify-center h-screen">
    <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md text-center">
    <img src="<?= base_url('img/logo_IT.png') ?>" alt="logo" 
    class="w-32 h-30 mx-auto mb-1 border-1 object-cover shadow-lg rounded-md">
 
        <h1 class="text-3xl font-mono font-bold mb-1">Welcome</h1>
        <p class="italic text-gray-600 mb-6">To The Helpdesk System</p>
        <form action="<?= base_url('/prosesLogin') ?>" method="post" class="space-y-4">
    <?= csrf_field() ?>
    <h2 class="text-2xl mb-4 text-center">Login</h2>

    <?php if (session()->getFlashdata('error')): ?>
        <div class="text-red-500 mb-2 text-sm"><?= session()->getFlashdata('error') ?></div>
    <?php endif; ?>

    <input type="text" name="username" placeholder="username" required
        class="w-full px-4 py-2 border border-black rounded-md text-purple-400 italic focus:outline-none">

    <input type="password" name="password" placeholder="password" required
        class="w-full px-4 py-2 border border-black rounded-md text-purple-400 italic focus:outline-none">

    <button type="submit"
        class="w-full bg-sky-400 hover:bg-sky-500 text-white font-semibold py-2 rounded-md transition">
        Log In
    </button>

            <a href="<?= base_url('/registerr') ?>"
                class="block w-full bg-sky-400 hover:bg-sky-500 text-white font-semibold py-2 rounded-md transition">
                Sign In
            </a>
        </form>


    </div>
</body>
</html>