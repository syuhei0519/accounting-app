<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Link } from '@inertiajs/vue3';

import { ref } from 'vue';
import { usePage } from '@inertiajs/vue3';

const { paymentWays } = usePage().props;

</script>
<template>
  <AuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">決済方法一覧</h2>
    </template>
    <div>
      <Link href="/paymentWay/create" class="mb-4 inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">決済方法登録</Link>
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
        <tr v-for="(paymentWay, index) in paymentWays" :key="paymentWay.id">
          <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
            {{ index + 1 }}
          </td>
          <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
            {{ paymentWay.name }}
          </td>
          <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
            {{ paymentWay.comment }}
          </td>
          <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
            <Link :href="`/paymentWay/edit/${paymentWay.id}`" class="text-blue-500 hover:text-blue-800">編集</Link>
          </td>
        </tr>
      </tbody>
    </table>
  </AuthenticatedLayout>
</template>
