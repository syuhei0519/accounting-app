<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Link, useForm, usePage } from '@inertiajs/vue3';

const { spend, spendCategories, paymentWays, currentSpendCategory, currentPaymentWay } = usePage().props;

const form = useForm({
    currentSpendCategory: currentSpendCategory,
    currentPaymentWay: currentPaymentWay,
    category_id: spendCategories.id,
    name: spend.name,
    amount: spend.amount,
    comment: spend.comment,
    payment_way_id: paymentWays.id,
    date: spend.date,
});

const submit = () => {
    form.put(route('spend.update', { spendId: spend.id }));
};

const deleteSpend = () => {
    if (confirm('本当に削除しますか？')) {
        form.delete(route('spend.destroy', spend.id));
    }
};

</script>

<template>
    <Head title="支出編集"></Head>
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">支出編集</h2>
        </template>
        <form @submit.prevent="submit">
            <div>
                <InputLabel for="category_id" value="支出カテゴリー" />
                <select v-model="form.currentSpendCategory" id="category_id" name="category_id">
                    <option v-for="category in spendCategories" :key="category.id" :value="category.id">{{ category.name }}</option>
                </select>
                <InputError :message="form.errors.category_id" />
            </div>
            <div>
                <InputLabel for="name" value="支出名" />
                <TextInput v-model="form.name" type="text" name="name" id="name" />
                <InputError :message="form.errors.name" />
            </div>
            <div>
                <InputLabel for="amount" value="金額" />
                <TextInput v-model="form.amount" type="number" name="amount" id="amount" />
                <InputError :message="form.errors.amount" />
            </div>
            <div>
                <InputLabel for="payment_way_id" value="決済方法" />
                <select v-model="form.currentPaymentWay" id="payment_way_id" name="payment_way_id">
                    <option v-for="paymentWay in paymentWays" :key="paymentWay.id" :value="paymentWay.id">{{ paymentWay.name }}</option>
                </select>
                <InputError :message="form.errors.payment_way_id" />
            </div>
            <div>
                <InputLabel for="date" value="日付" />
                <TextInput v-model="form.date" type="date" name="date" id="date" />
                <InputError :message="form.errors.date" />
            </div>
            <div>
                <InputLabel for="comment" value="コメント" />
                <TextInput v-model="form.comment" type="text" name="comment" id="comment" />
                <InputError :message="form.errors.comment" />
            </div>
            <PrimaryButton type="submit" :disabled="form.processing" class="mt-4">編集</PrimaryButton>
            <PrimaryButton @click="deleteSpend" type="button" class="ml-2 mt-4 bg-red-500 hover:bg-red-700">削除</PrimaryButton>
            <Link href="/spend" class="mt-4">戻る</Link>
        </form>
    </AuthenticatedLayout>
</template>
