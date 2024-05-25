<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Link, useForm } from '@inertiajs/vue3';

const form = useForm({
    name: '',
    comment: '',
});

const submit = () => {
    form.post(route('incomeCategory.store'));
};

</script>

<template>
    <Head title="収入カテゴリー登録"></Head>
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">収入カテゴリー登録</h2>
        </template>
        <form @submit.prevent="submit">
            <div>
                <InputLabel for="name" value="収入カテゴリー名" />
                <TextInput v-model="form.name" type="text" name="name" id="name" />
                <InputError :message="form.errors.name" />
            </div>
            <div>
                <InputLabel for="comment" value="コメント" />
                <TextInput v-model="form.comment" type="text" name="comment" id="comment" />
                <InputError :message="form.errors.comment" />
            </div>
            <PrimaryButton type="submit" :disabled="form.processing" class="mt-4">登録</PrimaryButton>
            <Link href="/incomeCategory" class="mt-4">戻る</Link>
        </form>
    </AuthenticatedLayout>
</template>
