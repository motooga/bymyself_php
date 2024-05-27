<script setup>
import UserAuthenticatedLayout from '@/Layouts/UserAuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
import dayjs from 'dayjs';

defineProps({
  points: Array,
  
})

const format = (date) => {
  let created_at = dayjs(date).format("YYYY/MM/DD");
  return created_at;
}
</script>

<template>
    <Head title="ポイント履歴" />

    <UserAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">ポイント履歴</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">

                        <div class="p-2 w-full">
                        <div class="relative">
                          <label for="type" class="leading-7 text-sm text-gray-600"></label>
                          <div class="lg:w-90% w-full mx-auto overflow-auto">
                              <table class="table-auto w-full text-left whitespace-no-wrap">
                                  <thead>
                                  <tr>
                                      <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl">発生日</th>
                                      <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">ポイント残高</th>
                                  </tr>
                                  </thead>
                                  <tbody>
                                  <tr v-for="point in points" :key="point.id">
                                      <td class="border-b-2 border-gray-200 px-4 py-3">
                                        {{  format(point.created_at) }}
                                      </td>
                                      <td class="border-b-2 border-gray-200 px-4 py-3">{{ point.all_point }}</td>
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
