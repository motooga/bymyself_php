<script setup>
import UserAuthenticatedLayout from '@/Layouts/UserAuthenticatedLayout.vue';
import { Head, Link, router } from '@inertiajs/vue3';

defineProps({
  user: Object,
  task: Object,
  report: {
    type: Object,
    required: true,
  }
})
const deleteReport = id => {
  router.delete(route('reports.destroy', { report: id }),{
    onBefore: () => confirm('ほんとうにさくじょしますか？')
  })
}
</script>

<template>
    <Head title="報告" />

    <UserAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">報告詳細</h2>
        </template>
        <section class="text-gray-600 body-font">
         <div class="container mx-auto flex px-5 py-24 items-center justify-center flex-col">
          <img class="lg:w-2/6 md:w-3/6 w-5/6 mb-10 object-cover object-center rounded" alt="hero" v-if="report.reportphoto_url" :src="'https://bymyselfphp.s3.ap-northeast-1.amazonaws.com/' + report.reportphoto_url">  
          <img class="lg:w-2/6 md:w-3/6 w-5/6 mb-10 object-cover object-center rounded" alt="hero" v-else src="https://dummyimage.com/720x600">
         <div class="text-center lg:w-2/3 w-full">
           <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">{{ report.order.task.task_name }}</h1>
            <p class="mb-8 leading-relaxed">{{ report.memo }}</p>
            <div class="flex justify-center">
              <Link as="button" :href="route('reports.edit', { report : report.id })" class="inline-flex text-white bg-yellow-500 border-0 py-2 px-6 focus:outline-none hover:bg-yellow-600 rounded text-lg">報告しなおす</Link >
              <button @click="deleteReport(report.id)"  class="ml-4 inline-flex text-gray-700 bg-gray-100 border-0 py-2 px-6 focus:outline-none hover:bg-gray-200 rounded text-lg">削除</button>
            </div>
          </div>
         </div>
        </section>
    </UserAuthenticatedLayout>
</template>