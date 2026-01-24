<script setup>
const navItems = ['Aplicaciones', 'Industrias', 'Comunidad', 'Precios', 'Ayuda'];

const modules = [
    { name: 'Clientes', tone: 'from-amber-300 to-rose-400', icon: ['M7 7h10', 'M7 12h10', 'M7 17h6'] },
    { name: 'Proveedores', tone: 'from-emerald-300 to-teal-500', icon: ['M6 5h12v14H6z', 'M9 8h6'] },
    { name: 'Productos', tone: 'from-sky-300 to-cyan-500', icon: ['M6 7h12v10H6z', 'M8 10h8'] },
    { name: 'Categorias', tone: 'from-lime-300 to-emerald-500', icon: ['M6 7h5v5H6z', 'M13 7h5v5h-5z', 'M6 14h5v5H6z'] },
    { name: 'Compras', tone: 'from-indigo-300 to-slate-500', icon: ['M6 7h12', 'M6 12h12', 'M6 17h8'] },
    { name: 'Detalle compras', tone: 'from-orange-300 to-amber-500', icon: ['M7 7h10', 'M7 12h10', 'M7 17h10'] },
    { name: 'Ventas', tone: 'from-teal-300 to-emerald-500', icon: ['M7 7h10v10H7z', 'M9 11h6'] },
    { name: 'Detalle ventas', tone: 'from-rose-300 to-orange-400', icon: ['M6 8h12', 'M6 12h12', 'M6 16h8'] },
    { name: 'Cajas', tone: 'from-amber-300 to-orange-500', icon: ['M6 7h12v10H6z', 'M9 9h6'] },
    { name: 'Movimientos', tone: 'from-sky-300 to-indigo-500', icon: ['M8 6l8 6-8 6', 'M16 6v12'] },
    { name: 'Metodo de pagos', tone: 'from-violet-300 to-fuchsia-500', icon: ['M5 8h14v8H5z', 'M7 12h6'] },
    { name: 'Notificaciones', tone: 'from-cyan-300 to-sky-500', icon: ['M12 6a4 4 0 014 4v3l2 3H6l2-3v-3a4 4 0 014-4'] },
    { name: 'Historial compras', tone: 'from-orange-300 to-rose-500', icon: ['M12 6v6l4 4', 'M6 18h12'] },
    { name: 'Usuarios', tone: 'from-yellow-300 to-orange-500', icon: ['M8 10a4 4 0 118 0', 'M6 18a6 6 0 0112 0'] },
];
</script>

<template>
    <div class="min-h-screen text-slate-900">
        <div class="relative overflow-hidden">
            <div class="absolute inset-0 hero-bg"></div>

            <header class="relative z-10 mx-auto flex w-full max-w-6xl items-center justify-between px-6 py-6">
                <div class="flex items-center gap-3">
                    <div class="grid h-9 w-9 place-items-center rounded-full bg-slate-900 text-xs font-bold uppercase tracking-[0.2em] text-white">
                        mj
                    </div>
                    <span class="text-lg font-semibold tracking-tight">Proyecto MJF</span>
                </div>

                <nav class="hidden items-center gap-8 text-sm font-medium text-slate-600 md:flex">
                    <a v-for="item in navItems" :key="item" class="transition hover:text-slate-900" href="#">{{ item }}</a>
                </nav>

                <button class="rounded-full border border-slate-300 bg-white/70 px-4 py-2 text-sm font-semibold text-slate-700 shadow-sm backdrop-blur transition hover:border-slate-400 hover:text-slate-900">
                    Iniciar Sesion
                </button>
            </header>

            <main class="relative z-10 mx-auto w-full max-w-6xl px-6 pb-16 pt-8">
                <div class="text-center">
                    <p class="text-xs uppercase tracking-[0.4em] text-slate-400">Bienvenido</p>
                    <h1 class="mt-3 text-3xl font-semibold tracking-tight text-slate-900 md:text-4xl">
                        Panel Principal
                    </h1>
                </div>

                <div class="mt-10 grid grid-cols-2 gap-6 sm:grid-cols-3 lg:grid-cols-6">
                    <button
                        v-for="(module, index) in modules"
                        :key="module.name"
                        class="group animate-rise text-left"
                        :style="{ animationDelay: `${index * 60}ms` }"
                        type="button"
                    >
                        <div class="rounded-2xl bg-white/80 p-4 shadow-[0_12px_24px_-18px_rgba(15,23,42,0.55)] ring-1 ring-white/60 backdrop-blur transition duration-300 group-hover:-translate-y-1 group-hover:shadow-[0_18px_32px_-20px_rgba(15,23,42,0.6)]">
                            <div class="flex h-16 w-16 items-center justify-center rounded-2xl bg-gradient-to-br text-white shadow-inner" :class="module.tone">
                                <svg class="h-7 w-7" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                                    <path v-for="(d, i) in module.icon" :key="i" :d="d" />
                                </svg>
                            </div>
                        </div>
                        <span class="mt-3 block text-sm font-semibold text-slate-700 transition group-hover:text-slate-900">
                            {{ module.name }}
                        </span>
                    </button>
                </div>
            </main>
        </div>
    </div>
</template>
