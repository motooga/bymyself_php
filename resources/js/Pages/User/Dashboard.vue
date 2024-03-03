<script setup>
import UserAuthenticatedLayout from '@/Layouts/UserAuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';

defineProps({
  orders: Array,
  message: Array,
})
</script>

<template>
    <Head title="Kid's Dashboard" />

    <UserAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">

                        <div class="p-2 w-full">
                        <div class="relative">
                          <label for="type" class="leading-7 text-sm text-gray-600">やること</label>
                          <div class="lg:w-90% w-full mx-auto overflow-auto">
                              <table class="table-auto w-full text-left whitespace-no-wrap">
                                  <thead>
                                  <tr>
                                      <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl">仕事名</th>
                                      <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">ポイント</th>
                                      <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">開始日</th>
                                      <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">終了日</th>
                                      <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">報告状況</th>
                                  </tr>
                                  </thead>
                                  <tbody>
                                  <tr v-for="order in orders" :key="order.id">
                                      <td class="border-b-2 border-gray-200 px-4 py-3">
                                        <Link class="text-blue-400" :href="route('order.reports.create', { order : order.id })">
                                            {{ order.task.task_name }}
                                        </Link>
                                      </td>
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


                    </div>
                </div>
            </div>
        </div>
    </UserAuthenticatedLayout>
</template>
