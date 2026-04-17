<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
<meta content="width=device-width, initial-scale=1.0" name="viewport">
<title>Register</title>

@vite(['resources/css/app.css','resources/css/auth.css','resources/js/app.js'])
</head>

<body class="login-body min-h-screen flex items-center justify-center p-4 sm:p-6 relative overflow-hidden">

<!-- Background -->
<div class="absolute top-[-10%] left-[-5%] w-[60vw] h-[60vw] sm:w-[40vw] sm:h-[40vw] bg-[#002045]/5 rounded-full blur-[100px] pointer-events-none -z-10"></div>
<div class="absolute bottom-[-10%] right-[-5%] w-[50vw] h-[50vw] sm:w-[30vw] sm:h-[30vw] bg-[#1a365d]/10 rounded-full blur-[100px] pointer-events-none -z-10"></div>

<main class="w-full max-w-lg z-10">

<div class="bg-white rounded-xl shadow-lg overflow-hidden">

<!-- Header -->
<div class="pt-8 sm:pt-10 pb-6 px-6 sm:px-10 flex flex-col items-center text-center">

<div class="mb-6 w-14 h-14 sm:w-16 sm:h-16 bg-[#e5e9eb] rounded-full flex items-center justify-center">
<span class="material-symbols-outlined text-[#002045] text-3xl sm:text-4xl scale-125">person_add</span>
</div>

<h1 class="font-headline text-xl sm:text-2xl font-extrabold text-[#002045] tracking-tight">
SIMPRU
</h1>

<p class="text-variant text-xs sm:text-sm mt-2">
Sistem Informasi Manajemen Peminjaman Ruangan
</p>

</div>

<!-- Form -->
<form action="/register-process" method="POST" class="px-6 sm:px-10 pb-10">

@csrf

<div class="grid grid-cols-1 md:grid-cols-2 gap-4">

<!-- Full Name -->
<div class="space-y-2">
<label class="text-xs font-bold uppercase tracking-wider text-variant px-1">
Full Name
</label>

<div class="relative">
<div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
<span class="material-symbols-outlined text-outline-color text-xl">badge</span>
</div>

<input
class="block w-full pl-12 pr-4 py-3 bg-[#e5e9eb] border-none rounded-lg text-sm focus:ring-2 focus:ring-[#002045]/20 outline-none"
name="name"
type="text"
placeholder="Enter your full name"
required>
</div>
</div>

<!-- Email -->
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
placeholder="example@email.com"
required>
</div>
</div>

<!-- ID Number -->
<div class="space-y-2">
<label class="text-xs font-bold uppercase tracking-wider text-variant px-1">
Student / Lecturer ID
</label>

<div class="relative">
<div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
<span class="material-symbols-outlined text-outline-color text-xl">badge</span>
</div>

<input
class="block w-full pl-12 pr-4 py-3 bg-[#e5e9eb] border-none rounded-lg text-sm focus:ring-2 focus:ring-[#002045]/20 outline-none"
name="id_number"
type="text"
placeholder="Enter your ID number"
required>
</div>
</div>

<!-- Password -->
<div class="space-y-2">
<label class="text-xs font-bold uppercase tracking-wider text-variant px-1">
Password
</label>

<div class="relative">

<div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
<span class="material-symbols-outlined text-outline-color text-xl">lock</span>
</div>

<input
class="block w-full pl-12 pr-12 py-3 bg-[#e5e9eb] border-none rounded-lg text-sm focus:ring-2 focus:ring-[#002045]/20 outline-none"
id="password"
name="password"
type="password"
placeholder="••••••••"
required>

<button type="button"
onclick="togglePassword()"
class="absolute inset-y-0 right-0 pr-3 flex items-center text-[#002045]">

<span id="toggleIcon" class="material-symbols-outlined">visibility</span>

</button>

</div>
</div>

</div>

<!-- Button -->
<div class="mt-6">

<button
class="w-full bg-primary-gradient text-white font-headline font-bold py-3.5 rounded-lg shadow-md hover:brightness-110 active:scale-[0.98] transition-all flex items-center justify-center gap-2"
type="submit">

Create Account
<span class="material-symbols-outlined text-lg">arrow_forward</span>

</button>

</div>

<!-- Login Link -->
<div class="flex justify-center pt-5">

<span class="text-sm text-gray-600">
Already have an account?
</span>

<a href="/login"
class="text-sm font-medium text-[#002045] hover:underline underline-offset-4 ml-1">
Sign In
</a>

</div>

</form>

</div>

<!-- Footer -->
<footer class="mt-8 text-center text-[#43474e]/60 text-[10px] sm:text-[11px] uppercase tracking-widest">
© 2026 Ma'soem University • All Rights Reserved
</footer>

</main>

<script>
function togglePassword(){
const input=document.getElementById("password");
const icon=document.getElementById("toggleIcon");

if(input.type==="password"){
input.type="text";
icon.textContent="visibility_off";
}else{
input.type="password";
icon.textContent="visibility";
}
}
</script>

</body>
</html>
