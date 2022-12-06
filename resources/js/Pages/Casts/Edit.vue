<template>
    <AdminLayout title="Casts">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Casts Edit
            </h2>
        </template>

        <div class="py-5">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <section class="container mx-auto p-6 font-mono">
                    <div class="w-full flex mb-4 p-2 justify-end">
                        <Link :href="route('admin.casts.index')"
                            class="bg-red-500 hover:bg-red-700 text-white px-4 py-2">
                        Back
                        </Link>
                    </div>

                    <div class="w-full mb-8 sm:max-w-md p-6 overflow-hidden bg-white rounded-lg shadow-lg">
                        <div class="w-full shadow p-5 bg-white">
                            <form @submit.prevent="submitCast">
                                <div>
                                    <InputLabel for="name" value="Name" />
                                    <TextInput id="name" v-model="form.name" type="text" class="mt-1 block w-full"
                                        required autofocus autocomplete="name" />
                                    <InputError class="mt-2" :message="form.errors.name" />
                                </div>

                                <div class="mt-4">
                                    <InputLabel for="poster_path" value="Poster" />
                                    <TextInput id="poster_path" v-model="form.poster_path" type="text"
                                        class="mt-1 block w-full" required />
                                    <InputError class="mt-2" :message="form.errors.poster_path" />
                                </div>

                                <div class="flex items-center justify-end mt-4">
                                    <PrimaryButton class="ml-4" :class="{ 'opacity-25': form.processing }"
                                        :disabled="form.processing">
                                        Update
                                    </PrimaryButton>
                                </div>
                            </form>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </AdminLayout>
</template>

<script setup>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import { Link, useForm } from "@inertiajs/inertia-vue3";
import { ref, watch, defineProps } from "vue";

import Checkbox from "@/Components/Checkbox.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";

const props = defineProps({
    cast: Object,
});

const form = useForm({
    name: props.cast.name,
    poster_path: props.cast.poster_path
});

function submitCast() {
    form.put('/admin/casts/' + props.cast.id)
}
</script>

<style>

</style>
