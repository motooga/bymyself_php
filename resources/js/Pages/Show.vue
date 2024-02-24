<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';

defineProps({
  user: Object,
  orders: Array,
})

</script>

<template>
    <Head title="詳細" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">詳細</h2>
        </template>
      
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                      <section class="text-gray-600 body-font relative">
                        
                        <form @submit.prevent="storeTask">
                          <div class="container px-5 py-8 mx-auto">
                            <div class="lg:w-1/2 md:w-2/3 mx-auto">
                              <div class="flex flex-wrap -m-2">

                                <div class="p-2 w-full">
                                  <div class="relative">
                                    <label for="name" class="leading-7 text-sm text-gray-600">ニックネーム</label>
                                    <div id="nickname" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-yellow-500 focus:bg-white focus:ring-2 focus:ring-yellow-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                     {{ user.nickname }}
                                    </div>
                                  </div>
                                </div>
                                
                                <div class="p-2 w-full">
                                  <div class="relative">
                                    <label for="category" class="leading-7 text-sm text-gray-600">Login_id</label>
                                    <div id="login_id" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-yellow-500 focus:bg-white focus:ring-2 focus:ring-yellow-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                      {{ user.login_id }}
                                     </div>
                                  </div>
                                </div>

                                <div class="p-2 w-full">
                                  <div class="relative">
                                    <label for="type" class="leading-7 text-sm text-gray-600">依頼したしごと</label>
                                    <div class="lg:w-90% w-full mx-auto overflow-auto">
                                        <table class="table-auto w-full text-left whitespace-no-wrap">
                                            <thead>
                                            <tr>
                                                <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl">仕事名</th>
                                                <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">設定ポイント</th>
                                                <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">開始日</th>
                                                <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">終了日</th>
                                                <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">報告状況</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr v-for="order in orders" :key="order.id">
                                                <td class="border-b-2 border-gray-200 px-4 py-3">{{ order.task.task_name }}</td>
                                                <td class="border-b-2 border-gray-200 px-4 py-3">{{ order.set_point }}</td>
                                                <td class="border-b-2 border-gray-200 px-4 py-3">{{ order.start_date }}</td>
                                                <td class="border-b-2 border-gray-200 px-4 py-3">{{ order.end_date }}</td>
                                                <td class="border-b-2 border-gray-200 px-4 py-3">{{ order.type }}</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                        </div>
                                  </div>
                                </div>

                                <div class="p-2 w-full">
                                  
                                  <Link as="button" :href="route('orders.create')" class="flex mx-auto text-white bg-yellow-500 border-0 py-2 px-8 focus:outline-none hover:bg-yellow-600 rounded text-lg">新規依頼</Link>
                                </div>
                              </div>
                            </div>
                          </div>
                        </form>
                      </section>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>