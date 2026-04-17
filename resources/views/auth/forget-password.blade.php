<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
<meta content="width=device-width, initial-scale=1.0" name="viewport">
<title>Forgot Password</title>

@vite(['resources/css/app.css','resources/css/auth.css','resources/js/app.js'])
</head>

<body class="login-body min-h-screen flex items-center justify-center p-4 sm:p-6 relative overflow-hidden">

<div class="absolute top-[-10%] left-[-5%] w-[60vw] h-[60vw] sm:w-[40vw] sm:h-[40vw] bg-[#002045]/5 rounded-full blur-[100px] pointer-events-none -z-10"></div>
<div class="absolute bottom-[-10%] right-[-5%] w-[50vw] h-[50vw] sm:w-[30vw] sm:h-[30vw] bg-[#1a365d]/10 rounded-full blur-[100px] pointer-events-none -z-10"></div>

<main class="w-full max-w-lg z-10">

<div class="bg-white rounded-xl shadow-lg overflow-hidden">

<div class="pt-8 sm:pt-10 pb-6 px-6 sm:px-10 flex flex-col items-center text-center">

<div class="mb-6 w-14 h-14 sm:w-16 sm:h-16 bg-[#e5e9eb] rounded-full flex items-center justify-center">
<span class="material-symbols-outlined text-[#002045] text-3xl sm:text-4xl scale-125">lock_reset</span>
</div>

<h1 class="font-headline text-xl sm:text-2xl font-extrabold text-[#002045] tracking-tight">
Forgot Password
</h1>

<p class="text-variant text-xs sm:text-sm mt-2">
Enter your email to receive password reset instructions
</p>

</div>

<form action="/forgot-password-process" method="POST" class="px-6 sm:px-10 pb-8 sm:pb-10 space-y-5">

@csrf

<div class="space-y-2">
<label class="text-xs font-bold uppercase tracking-wider text-variant px-1">
Email
</label>

<div class="relative">

<div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
<span class="material-symbols-outlined text-outline-color text-xl">mail</span>
</div>

<input
class="block w-full pl-12 pr-4 py-3 bg-[#e5e9eb] border-none rounded-lg text-sm focus:ring-2 focus:ring-[#002045]/20 outline-none"
name="email"
type="email"
placeholder="Enter your email"
required>

</div>
</div>

<button
class="w-full bg-primary-gradient text-white font-headline font-bold py-3.5 rounded-lg shadow-md hover:brightness-110 active:scale-[0.98] transition-all flex items-center justify-center gap-2"
type="submit">

Send Reset Link
<span class="material-symbols-outlined text-lg">arrow_forward</span>

</button>

<div class="flex justify-end">
<a href="/login" class="text-sm font-medium text-[#002045] hover:underline">
Back to Sign In
</a>
</div>

</form>

</div>

<footer class="mt-6 sm:mt-8 text-center text-[#43474e]/60 text-[10px] sm:text-[11px] uppercase tracking-widest">
© 2026 Ma'soem University • All Rights Reserved
</footer>

</main>

</body>
</html>
