<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head , Link } from '@inertiajs/vue3';
import FlashMessage from '@/Components/FlashMessage.vue';

defineProps({
    users: Array,
})

</script>

<template>
    <Head title="こども一覧" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">こども一覧</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <section class="text-gray-600 body-font">
                          <div class="container px-5 py-8 mx-auto">
                            <FlashMessage />
                            <div class="flex pl-4 my-4 lg:w-2/3 w-full mx-auto">
                              <Link as="button" :href="route('user.register')" class="flex ml-auto text-white bg-yellow-500 border-0 py-2 px-6 focus:outline-none hover:bg-yellow-600 rounded">こども登録</Link>
                            </div>
                              <div class="lg:w-2/3 w-full mx-auto overflow-auto">
                                  <table class="table-auto w-full text-left whitespace-no-wrap">
                                      <thead>
                                      <tr>
                                          <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl">No.</th>
                                          <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">ニックネーム</th>
                                      </tr>
                                      </thead>
                                      <tbody>
                                      <tr v-for="user in users" :key="user.id">
                                          <td class="border-b-2 border-gray-200 px-4 py-3">
                                            <Link class="text-blue-400" :href="route('show', { user : user.id })">
                                              {{ user.id }}
                                          </Link>
                                          </td>
                                          <td class="border-b-2 border-gray-200 px-4 py-3">
                                            <Link class="text-blue-400" :href="route('show', { user : user.id })">
                                            {{ user.nickname }}
                                            </Link>
                                          </td>

                                      </tr>
                                      </tbody>
                                  </table>
                                  </div>


                          </div>     
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
