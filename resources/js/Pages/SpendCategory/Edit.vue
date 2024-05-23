<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Link, useForm, usePage } from '@inertiajs/vue3';

const { spendCategory, isRegisteredSpendByCategory } = usePage().props;

const form = useForm({
    name: spendCategory.name,
    comment: spendCategory.comment,
    date: spendCategory.date,
});

const submit = () => {
    form.put(route('spendCategory.update', { spendCategoryId: spendCategory.id }));
};

const deleteSpendCategory = () => {
    if (confirm('本当に削除しますか？')) {
        form.delete(route('spendCategory.destroy', spendCategory.id));
    }
};

</script>

<template>
    <Head title="支出カテゴリー編集"></Head>
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">支出カテゴリー編集</h2>
        </template>
        <form @submit.prevent="submit">
            <div>
                <InputLabel for="name" value="支出カテゴリー名" />
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
            <PrimaryButton v-if='!isRegisteredSpendByCategory' @click="deleteSpendCategory" type="button" class="ml-2 mt-4 bg-red-500 hover:bg-red-700">削除</PrimaryButton>
            <Link href="/spendCategory" class="mt-4">戻る</Link>
        </form>
    </AuthenticatedLayout>
</template>
