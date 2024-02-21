<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import InputError from '@/Components/InputError.vue';
import { router , Head } from '@inertiajs/vue3';
import { reactive } from 'vue'

defineProps({
  errors: Object,
  tasks: Array
})

const form = reactive({
    task_name: '',
    category: '',
    type: '',
});

const storeOrder = () => {
  router.post('/orders', form)
};
</script>

<template>
    <Head title="新規依頼" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">新規依頼</h2>
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
                                    <label for="category" class="leading-7 text-sm text-gray-600">依頼タスクの選択</label>
                                    <select v-model="selectValue" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-yellow-500 focus:bg-white focus:ring-2 focus:ring-yellow-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    <option v-for="task in tasks" :key="task.id" :value="task_id" >
                                    {{ task.task_name }}
                                    </option>
                                    </select>
                                     <InputError class="mt-2" :message="errors.task_id" />
                                  </div>
                                </div>
                                
                                <div class="p-2 w-full">
                                  <div class="relative">
                                    <label for="category" class="leading-7 text-sm text-gray-600">設定ポイント</label>
                                    <input type="text" id="category" name="set_point" v-model="form.set_point" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-yellow-500 focus:bg-white focus:ring-2 focus:ring-yellow-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    <InputError class="mt-2" :message="errors.set_point" />
                                  </div>
                                </div>

                                <div class="p-2 w-full">
                                  <div class="relative">
                                    <label for="type" class="leading-7 text-sm text-gray-600">依頼頻度</label>
                                    <input type="text" id="type" name="type" v-model="form.type" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-yellow-500 focus:bg-white focus:ring-2 focus:ring-yellow-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    <InputError class="mt-2" :message="errors.type" />
                                  </div>
                                </div>

                                <div class="p-2 w-full">
                                  <button class="flex mx-auto text-white bg-yellow-500 border-0 py-2 px-8 focus:outline-none hover:bg-yellow-600 rounded text-lg">依頼する</button>
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