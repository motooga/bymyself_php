<script setup>
import UserAuthenticatedLayout from '@/Layouts/UserAuthenticatedLayout.vue';
import InputError from '@/Components/InputError.vue';
import { router , Head } from '@inertiajs/vue3';
import { reactive } from 'vue'
import axios from 'axios';

const props = defineProps({
  errors: Object,
  order: Object
});

const form = reactive({
    memo: null,
    image: null,
});



const StoreReportRequest = async ({ orderId }) => {
    try {
        const formData = new FormData();
        formData.append('memo', form.memo);
        formData.append('image', form.image);
        formData.append('order_id', orderId);
        formData.append('is_done', 1);

        const response = await router.post(route('order.reports.store', { order: orderId }), formData);
        
        // 成功時の処理を追加
    } 
    catch (error) {
        console.error('Error:', error);
        // エラー時の処理を追加
    }
};


</script>

<template>
    <Head title="おしごとほうこく" />

    <UserAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">おしごとほうこく</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                      <section class="text-gray-600 body-font relative">
                         

                        <form @submit.prevent="StoreReportRequest({ orderId: order.id })" enctype="multipart/form-data">
                          <div class="container px-5 py-8 mx-auto">
                            <div class="lg:w-1/2 md:w-2/3 mx-auto">
                              <div class="flex flex-wrap -m-2">

                           <div class="p-2 w-full">
                            <InputError class="mt-2" :message="errors.error" />
                              <div class="relative">
                              <label for="task_name" class="leading-7 text-sm text-gray-600">タスク名</label>
                             <div id="task_name" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-yellow-500 focus:bg-white focus:ring-2 focus:ring-yellow-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                              {{ order.task.task_name }}
                               </div>
                             </div>
                           </div>

                                <div class="p-2 w-full">
                                  <div class="relative">
                                  <label for="memo" class="leading-7 text-sm text-gray-600">メモ</label>
                                  <input type="textarea" id="memo" name="memo" v-model="form.memo" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-yellow-500 focus:bg-white focus:ring-2 focus:ring-yellow-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out">
                                  <InputError class="mt-2" :message="errors.memo" />
                                </div>
                                </div>

                                <div class="p-2 w-full">
                                  <div class="relative">
                                    <label for="image" class="leading-7 text-sm text-gray-600">ほうこく写真</label><br>
                                    <input type="file" id="image" name="image" @input="form.image = $event.target.files[0]">
                                    <InputError class="mt-2" :message="errors.image" />
                                  </div>
                                </div>

                                <div class="p-2 w-full">
                                  <button class="flex mx-auto text-white bg-yellow-500 border-0 py-2 px-8 focus:outline-none hover:bg-yellow-600 rounded text-lg">おしごとほうこく</button>
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
    </UserAuthenticatedLayout>
</template>