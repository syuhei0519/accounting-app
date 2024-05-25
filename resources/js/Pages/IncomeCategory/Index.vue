<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Link } from '@inertiajs/vue3';

import { ref } from 'vue';
import { usePage } from '@inertiajs/vue3';

const { incomeCategories } = usePage().props;

</script>
<template>
  <AuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">収入カテゴリー一覧</h2>
    </template>
    <div>
      <Link href="/incomeCategory/create" class="mb-4 inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">収入カテゴリー登録</Link>
    </div>
    <table class="min-w-full leading-normal">
      <thead>
        <tr>
          <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
            #
          </th>
          <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
            名前
          </th>
          <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
            コメント
          </th>
          <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
            操作
          </th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="(incomeCategory, index) in incomeCategories" :key="incomeCategory.id">
          <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
            {{ index + 1 }}
          </td>
          <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
            {{ incomeCategory.name }}
          </td>
          <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
            {{ incomeCategory.comment }}
          </td>
          <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
            <Link :href="`/incomeCategory/edit/${incomeCategory.id}`" class="text-blue-500 hover:text-blue-800">編集</Link>
          </td>
        </tr>
      </tbody>
    </table>
  </AuthenticatedLayout>
</template>
