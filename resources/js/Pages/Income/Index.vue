<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
</script>
<template>
  <AuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">収入一覧</h2>
    </template>
  </AuthenticatedLayout>

    <tbody>
    <tr v-for="(income, index) in incomes" :key="income.id">
        <td>{{ index + 1 }}</td>
        <td>{{ income.name }}</td>
        <td>{{ income.amount.toLocaleString() }}円</td>
        <td>{{ income.date }}</td>
    </tr>
    </tbody>



</template>
