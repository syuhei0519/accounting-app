<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Link, useForm, usePage } from '@inertiajs/vue3';

const { income_categories } = usePage().props;

const form = useForm({
    category_id: income_categories.id,
    name: '',
    amount: 0,
    comment: '',
    date: '',
});

const submit = () => {
    form.post(route('income.store'));
};

</script>

<template>
    <Head title="収入登録"></Head>
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">収入登録</h2>
        </template>
        <form @submit.prevent="submit">
            <div>
                <InputLabel for="category_id" value="収入カテゴリー" />
                <select v-model="form.category_id" id="category_id">
                    <option v-for="category in income_categories" :key="category.id" :value="category.id">{{ category.name }}</option>
                </select>
                <InputError :message="form.errors.category_id" />
            </div>
            <div>
                <InputLabel for="name" value="収入名" />
                <TextInput v-model="form.name" type="text" name="name" id="name" />
                <InputError :message="form.errors.name" />
            </div>
            <div>
                <InputLabel for="amount" value="金額" />
                <TextInput v-model="form.amount" type="number" name="amount" id="amount" />
                <InputError :message="form.errors.amount" />
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
            <PrimaryButton type="submit" :disabled="form.processing" class="mt-4">登録</PrimaryButton>
            <Link href="/income" class="mt-4">戻る</Link>
        </form>
    </AuthenticatedLayout>
</template>
