<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 grid grid-cols-2 gap-6">
                <div class="group bg-red-100 overflow-hidden shadow-sm sm:rounded-lg p-8 hover:bg-red-200 relative" style="height: 250px;">
                    <Link :href="`/income`" class="text-blue-500 hover:text-blue-800 font-semibold block w-full h-full">収入一覧</Link>
                    <div class="absolute bg-white p-3 rounded-lg shadow-lg text-gray-900 text-sm hidden group-hover:block font-semibold" style="bottom: 10px; right: 10px;">
                        登録した収入が確認できます。収入の編集、登録もできます
                    </div>
                </div>
                <div class="group bg-orange-100 overflow-hidden shadow-sm sm:rounded-lg p-8 hover:bg-orange-200 relative" style="height: 250px;">
                    <Link :href="`/spend`" class="text-blue-500 hover:text-blue-800 font-semibold block w-full h-full">支出一覧</Link>
                    <div class="absolute bg-white p-3 rounded-lg shadow-lg text-gray-900 text-sm hidden group-hover:block font-semibold" style="bottom: 10px; right: 10px;">
                        登録した支出が確認できます。支出の編集、登録もできます
                    </div>
                </div>
                <div class="group bg-red-100 overflow-hidden shadow-sm sm:rounded-lg p-8 hover:bg-red-200 relative" style="height: 250px;">
                    <Link :href="`/incomeCategory`" class="text-blue-500 hover:text-blue-800 font-semibold block w-full h-full">収入カテゴリー一覧</Link>
                    <div class="absolute bg-white p-3 rounded-lg shadow-lg text-gray-900 text-sm hidden group-hover:block font-semibold" style="bottom: 10px; right: 10px;">
                        登録した収入カテゴリーが確認できます。編集、登録もできます
                    </div>
                </div>
                <div class="group bg-orange-100 overflow-hidden shadow-sm sm:rounded-lg p-8 hover:bg-orange-200 relative" style="height: 250px;">
                    <Link :href="`/spendCategory`" class="text-blue-500 hover:text-blue-800 font-semibold block w-full h-full">支出カテゴリー一覧</Link>
                    <div class="absolute bg-white p-3 rounded-lg shadow-lg text-gray-900 text-sm hidden group-hover:block font-semibold" style="bottom: 10px; right: 10px;">
                        登録した支出カテゴリーが確認できます。編集、登録もできます
                    </div>
                </div>
                <div class="group bg-red-100 overflow-hidden shadow-sm sm:rounded-lg p-8 hover:bg-red-200 relative" style="height: 250px;">
                    <Link :href="`/paymentWay`" class="text-blue-500 hover:text-blue-800 font-semibold block w-full h-full">決済方法一覧</Link>
                    <div class="absolute bg-white p-3 rounded-lg shadow-lg text-gray-900 text-sm hidden group-hover:block font-semibold" style="bottom: 10px; right: 10px;">
                        登録した決済方法が確認できます。編集、登録もできます
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<style scoped>
.group-hover:block {
    display: block;
}
</style>
