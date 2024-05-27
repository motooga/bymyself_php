<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, router } from '@inertiajs/vue3';
import { defineProps, reactive } from 'vue';

const props = defineProps({
  user: Object,
  task: Object,
  report: {
    type: Object,
    required: true,
  }
})

const data = reactive({
  id: props.report.id,
  point: props.report.order.set_point,
  type: 'receipt',
  user_id: props.report.user.id
});

const approveReport = async (reportId) => {
  try {
    // 1. report テーブルの is_done の値を更新する (PATCH リクエスト)
    await router.patch(route('report.allow', { report: reportId }), { is_done: 2 });

    // 2. point テーブルに point_event の記録を作成する (POST リクエスト)
    const pointEvent = {
      user_id: data.user_id, 
      event_type: data.type, 
      points_earned: data.point, 
      report_id: data.id
    };
    
    await router.post(route('points.increase', { report: reportId }), pointEvent);

    // 3. 処理が完了した後にリロードなどのアクションを実行する

    // await router.post(route('point.store', { report: reportId }), pointEvent);

  } catch (error) {
    console.error('エラー:', error);
  }
};
</script>

<template>
    <Head title="報告" />

    <AuthenticatedLayout>
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
              <button v-if="report.is_done === 1"    @click="approveReport(report.id)"
               class="inline-flex text-white bg-yellow-500 border-0 py-2 px-6 focus:outline-none hover:bg-yellow-600 rounded text-lg">
               承認する
              </button>
            </div>
          </div>
         </div>
        </section>
    </AuthenticatedLayout>
</template>