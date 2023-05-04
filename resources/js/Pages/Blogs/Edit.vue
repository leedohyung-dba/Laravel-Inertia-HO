<script setup lang="ts">
import PrimaryButton from '@/Components/PrimaryButton.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, useForm } from '@inertiajs/vue3'
import Multiselect from '@suadelabs/vue3-multiselect'

const props = defineProps({
    blog: {
        type: Object,
        default: () => ({
        }),
    },
    tags_options: {
        type: Array,
        default: [],
    },
});

const form = useForm({
    id: props.blog.id,
    title: props.blog.title,
    slug: props.blog.slug,
    tags: props.blog.tags,
    content: props.blog.content,
});

const submit = () => {
    form.put(route("blogs.update", props.blog.id));
};
</script>

<style src="@suadelabs/vue3-multiselect/dist/vue3-multiselect.css"></style>

<template>
    <Head title="Blog Create" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Blog Create
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <form @submit.prevent="submit">
                            <div class="mb-6">
                                <label for="title" class="block mb-2 text-sm font-medium text-gray-900">Title</label>
                                <input type="text" v-model="form.title" name="title"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    placeholder="" />
                                <div v-if="form.errors.title" class="text-sm text-red-600">
                                    {{ form.errors.title }}
                                </div>
                            </div>
                            <div class="mb-6">
                                <label for="slug" class="block mb-2 text-sm font-medium text-gray-900">Slug</label>
                                <input type="text" v-model="form.slug" name="title"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    placeholder="" />
                                <div v-if="form.errors.slug" class="text-sm text-red-600">
                                    {{ form.errors.slug }}
                                </div>
                            </div>
                            <div class="mb-6">
                                <label for="tags" class="block mb-2 text-sm font-medium text-gray-900">Tags</label>
                                <multiselect v-model="form.tags" :options="tags_options" :multiple="true"
                                    :close-on-select="true" placeholder="Pick some">
                                </multiselect>
                                <div v-if="form.errors.tags" class="text-sm text-red-600">
                                    {{ form.errors.tags }}
                                </div>
                            </div>

                            <div class="mb-6">
                                <label for="content" class="block mb-2 text-sm font-medium text-gray-900">Content</label>
                                <textarea type="text" v-model="form.content" name="content" id=""
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"></textarea>

                                <div v-if="form.errors.content" class="text-sm text-red-600">
                                    {{ form.errors.content }}
                                </div>
                            </div>
                            <PrimaryButton type="submit"
                                class="text-white bg-blue-700  focus:outline-none  font-medium rounded-lg text-sm px-5 py-2.5 "
                                :disabled="form.processing" :class="{ 'opacity-25': form.processing }">
                                Submit
                            </PrimaryButton>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>