<script setup>
import UserAuthenticatedLayout from '@/Layouts/UserAuthenticatedLayout.vue';
import InputError from '@/Components/InputError.vue';
import { router , Head } from '@inertiajs/vue3';
import { reactive , ref } from 'vue'


defineProps({
  errors: Object,
  order: Object
})

const form = reactive({
    reportphoto_url: '',
    memo: '',
});

const storeReport = () => {
  router.post('/reports', form)
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
                         



                        <form @submit.prevent="storeReport">
                          <div class="container px-5 py-8 mx-auto">
                            <div class="lg:w-1/2 md:w-2/3 mx-auto">
                              <div class="flex flex-wrap -m-2">

                           <div class="p-2 w-full">
                              <div class="relative">
                              <label for="task_name" class="leading-7 text-sm text-gray-600">タスク名</label>
                             <div id="order" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-yellow-500 focus:bg-white focus:ring-2 focus:ring-yellow-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                              {{ order.task.task_name }}
                               </div>
                             </div>
                           </div>




                                <div class="p-2 w-full">
                                  <div class="relative">
                                    <label for="memo" class="leading-7 text-sm text-gray-600">メモ</label>
                                    <input type="texterea" id="memo" name="memo" v-model="form.memo" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-yellow-500 focus:bg-white focus:ring-2 focus:ring-yellow-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    <InputError class="mt-2" :message="errors.memo" />
                                  </div>
                                </div>

                                <div class="p-2 w-full">
                                  <div class="relative">
                                  <label for="message" class="leading-7 text-sm text-gray-600">Message</label>
                                  <textarea id="message" name="message" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-yellow-500 focus:bg-white focus:ring-2 focus:ring-yellow-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"></textarea>
                                  </div>
                                </div>



                                <div class="p-2 w-full">
                                  <div class="relative">
                                    <label for="reportphoto_url" class="leading-7 text-sm text-gray-600">ほうこく写真</label><br>
                                    <input type="file" id="reportphoto_url" name="reportphoto_url" ref="preview" >
                                    <InputError class="mt-2" :message="errors.reportphoto_url" />
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