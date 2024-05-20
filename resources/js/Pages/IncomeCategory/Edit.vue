<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Link, useForm, usePage } from '@inertiajs/vue3';

const { incomeCategory, isRegisteredIncomeByCategory } = usePage().props;

const form = useForm({
    name: incomeCategory.name,
    comment: incomeCategory.comment,
    date: incomeCategory.date,
});

const submit = () => {
    form.put(route('incomeCategory.update', { incomeCategoryId: incomeCategory.id }));
};

const deleteIncomeCategory = () => {
    if (confirm('本当に削除しますか？')) {
        form.delete(route('incomeCategory.destroy', incomeCategory.id));
    }
};

</script>

<template>
    <Head title="収入カテゴリー編集"></Head>
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">収入カテゴリー編集</h2>
        </template>
        <form @submit.prevent="submit">
            <div>
                <InputLabel for="name" value="収入カテゴリー名" />
                <TextInput v-model="form.name" type="text" name="name" id="name" />
                <InputError :message="form.errors.name" />
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
            <PrimaryButton v-if='!isRegisteredIncomeByCategory' @click="deleteIncomeCategory" type="button" class="ml-2 mt-4 bg-red-500 hover:bg-red-700">削除</PrimaryButton>
            <Link href="/incomeCategory" class="mt-4">戻る</Link>
        </form>
    </AuthenticatedLayout>
</template>
