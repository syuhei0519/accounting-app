<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Link, useForm, usePage } from '@inertiajs/vue3';

const { paymentWay, isRegisteredSpendByPaymentWay } = usePage().props;

const form = useForm({
    name: paymentWay.name,
    comment: paymentWay.comment
});

const submit = () => {
    form.put(route('paymentWay.update', { paymentWayId: paymentWay.id }));
};

const deletePaymentWay = () => {
    if (confirm('本当に削除しますか？')) {
        form.delete(route('paymentWay.destroy', paymentWay.id));
    }
};

</script>

<template>
    <Head title="決済方法編集"></Head>
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">決済方法編集</h2>
        </template>
        <form @submit.prevent="submit">
            <div>
                <InputLabel for="name" value="決済方法名" />
                <TextInput v-model="form.name" type="text" name="name" id="name" />
                <InputError :message="form.errors.name" />
            </div>
            <div>
                <InputLabel for="comment" value="コメント" />
                <TextInput v-model="form.comment" type="text" name="comment" id="comment" />
                <InputError :message="form.errors.comment" />
            </div>
            <PrimaryButton type="submit" :disabled="form.processing" class="mt-4">編集</PrimaryButton>
            <PrimaryButton v-if='!isRegisteredSpendByPaymentWay' @click="deletePaymentWay" type="button" class="ml-2 mt-4 bg-red-500 hover:bg-red-700">削除</PrimaryButton>
            <Link href="/paymentWay" class="mt-4">戻る</Link>
        </form>
    </AuthenticatedLayout>
</template>
