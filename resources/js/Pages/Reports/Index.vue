<script setup>
import UserAuthenticatedLayout from '@/Layouts/UserAuthenticatedLayout.vue';
import InputError from '@/Components/InputError.vue';
import { router , Head , Link } from '@inertiajs/vue3';
import { reactive  } from 'vue';
import dayjs from 'dayjs';

defineProps({
  user: Object,
  reports: Array,
})

const format = (date) => {
  let created_at = dayjs(date).format("YYYY/MM/DD");
  return created_at;
}



</script>
<template>
<UserAuthenticatedLayout>
    <template #header>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">詳細</h2>
    </template>
  
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                  <section class="text-gray-600 body-font relative">
                    

                      <div class="container px-5 py-8 mx-auto">
                        <div class="lg:w-full md:w-full mx-auto">
                          <div class="flex flex-wrap -m-2">

                            
                            <div class="p-2 w-full">
                              <div class="relative">
                                <label for="type" class="leading-7 text-sm text-gray-600">ほうこくした仕事</label>
                                <div class="lg:w-90% w-full mx-auto overflow-auto">
                                    <table class="table-auto w-full text-left whitespace-no-wrap">
                                        <thead>
                                        <tr>
                                            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl">仕事名</th>
                                            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">設定ポイント</th>
                                            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">報告日</th>
                                            <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">報告状況</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr v-for="report in reports" :key="report.id">
                                            <td class="border-b-2 border-gray-200 px-4 py-3">
                                              <Link class="text-blue-400" :href="route('reports.show', { report: report.id })">
                                               {{ report.order.task.task_name }}
                                              </Link>
                                            </td>
                                            <td class="border-b-2 border-gray-200 px-4 py-3">{{ report.order.set_point }}</td>
                                            <td class="border-b-2 border-gray-200 px-4 py-3">{{ format(report.created_at) }}</td>
                                            <td class="border-b-2 border-gray-200 px-4 py-3">
                                              <span v-if="report.is_done === 0"> 未報告 </span>
                                              <span v-if="report.is_done === 1"> 承認待ち </span>
                                              <span v-if="report.is_done === 2"> 承認済み </span>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    </div>
                              </div>
                            </div>

                            
                          </div>
                        </div>
                      </div>

                  </section>
                </div>
            </div>
        </div>
    </div>
</UserAuthenticatedLayout>
</template>