<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Index from '@/Pages/Auth/Index.vue';
import { Head , Link } from '@inertiajs/vue3';
import FlashMessage from '@/Components/FlashMessage.vue';

defineProps({
    users: Array
})

</script>

<template>
    <Head title="依頼管理" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">依頼管理</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <section class="text-gray-600 body-font">
                          <div class="container px-5 py-8 mx-auto">
                            <FlashMessage />
                            <div class="flex pl-4 my-4 lg:w-2/3 w-full mx-auto">
                              <Link as="button" :href="route('orders.create')" class="flex ml-auto text-white bg-yellow-500 border-0 py-2 px-6 focus:outline-none hover:bg-yellow-600 rounded">新規依頼</Link>
                            </div>
                          </div>     
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>

</template>