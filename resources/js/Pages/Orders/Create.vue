<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import InputError from '@/Components/InputError.vue';
import { router , Head } from '@inertiajs/vue3';
import { reactive } from 'vue'
import VueDatePicker from '@vuepic/vue-datepicker';
import '@vuepic/vue-datepicker/dist/main.css'


defineProps({
  errors: Object,
  tasks: Array,
  users: Array
})

const form = reactive({
    task_id: '',
    user_id: '',
    start_date : '',
    end_date :  '',
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
                        
                        <form @submit.prevent="storeOrder">
                          <div class="container px-5 py-8 mx-auto">
                            <div class="lg:w-1/2 md:w-2/3 mx-auto">
                              <div class="flex flex-wrap -m-2">

                                <div class="p-2 w-full">
                                  <div class="relative">
                                    <label for="task_name" class="leading-7 text-sm text-gray-600">依頼タスクの選択</label>
                                    <select v-model="form.task_id" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-yellow-500 focus:bg-white focus:ring-2 focus:ring-yellow-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    <option disabled value="">タスクを選択してください</option>
                                    <option v-for="task in tasks" :key="task.id" :value="task.id" >
                                      {{ task.task_name }}
                                    </option>
                                    </select>
                                     <InputError class="mt-2" :message="errors.task_id" />
                                  </div>
                                </div>

                                <div class="p-2 w-full">
                                  <div class="relative">
                                    <label for="nickname" class="leading-7 text-sm text-gray-600">こども</label>
                                    <select v-model="form.user_id" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-yellow-500 focus:bg-white focus:ring-2 focus:ring-yellow-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    <option disabled value="">こどもを選択してください</option>
                                    <option v-for="user in users" :key="user.id" :value="user.id" >
                                    {{ user.nickname }}
                                    </option>
                                    </select>
                                     <InputError class="mt-2" :message="errors.user_id" />
                                  </div>
                                </div>
                                
                                <div class="p-2 w-full">
                                  <div class="relative">
                                    <label for="category" class="leading-7 text-sm text-gray-600">設定ポイント</label>
                                    <input type="number" id="set_point" name="set_point" v-model.number="form.set_point" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-yellow-500 focus:bg-white focus:ring-2 focus:ring-yellow-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    <InputError class="mt-2" :message="errors.set_point" />
                                  </div>
                                </div>

                                <div class="p-2 w-full">
                                  <div class="relative">
                                    <label for="type" class="leading-7 text-sm text-gray-600">開始日</label>
                                    <VueDatePicker v-model="form.start_date" name="start_date" format="yyyy/MM/dd" model-type="yyyy-MM-dd" :enable-time-picker="false"  :teleport="true" locale="jp" auto-apply>
                                        {{ start_date }}
                                    </VueDatePicker>
                                    <InputError class="mt-2" :message="errors.start_date" />
                                  </div>
                                </div>

                                <div class="p-2 w-full">
                                  <div class="relative">
                                    <label for="type" class="leading-7 text-sm text-gray-600">終了日</label>
                                    <VueDatePicker v-model="form.end_date" name="end_date" format="yyyy/MM/dd" model-type="yyyy-MM-dd" :enable-time-picker="false"  :teleport="true" locale="jp" auto-apply>
                                        {{ end_date }}
                                    </VueDatePicker>
                                    <InputError class="mt-2" :message="errors.end_date" />
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