<template>

    <AppLayout>
        <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold text-gray-900">
            All Page
            </h1>
        </div>
        </header>
        <main>
        <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
            <!-- Replace with your content -->
            <!-- Information table -->
        <div class="flex flex-col">
          <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
              <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                  <thead class="bg-white">
                    <tr class="text-left font-bold">
                      <th
                        scope="col"
                        class="px-6 py-3 text-left text-base font-bold text-gray-500 uppercase tracking-wider"
                      >Username</th>
                      <th
                        scope="col"
                        class="px-6 py-3 text-left text-base font-bold text-gray-500 uppercase tracking-wider"
                      >About</th>
                      <th
                        scope="col"
                        class="px-6 py-3 text-left text-base font-bold text-gray-500 uppercase tracking-wider"
                      >Photo</th>
                      <th
                        scope="col"
                        class="px-6 py-3 text-left text-base font-bold text-gray-500 uppercase tracking-wider"
                      >Notification</th>
                      <th
                        scope="col"
                        class="px-6 py-3 text-left text-base font-bold text-gray-500 uppercase tracking-wider"
                      >
                        <span class="sr-only">Edit</span>
                        Action
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr
                      v-for="(information,index) in informations.data"
                      class="hover:bg-gray-100 focus-within:bg-gray-100"
                      :key="index"
                      :class="index % 2 === 0 ? 'bg-white' : 'bg-gray-50'"
                    >
                      <td
                        class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900"
                      >{{ information.username }}</td>
                      <td
                        class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"
                      >{{ information.about }}</td>
                      <td
                        class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"
                      >
                      <!-- {{ information.image }} -->
                      <img
                      class="rounded-full h-8 w-8 object-cover"
                      :src="information.image" >
                      </td>
                      <td
                        class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"
                      >{{ information.notification }}</td>
                      <td class="px-6 py-4 whitespace-nowrap text-left text-sm font-medium">
                        <!-- <a href="#" class="text-indigo-600 hover:text-indigo-900">Delete</a> -->
                        <div class="flex justify-start items-center space-x-2">
                          <!-- <button @click="informationPreview(information.id)" type="button">
                            <EyeIcon class="h-6 text-green-500" />
                          </button> -->
                          <inertia-link :href="route('informations.preview',information.id)"><EyeIcon class="h-6 text-green-500" /></inertia-link>
                          <button type="button" @click="openModel(information.id)">
                            <TrashIcon class="h-6 text-red-500" />
                          </button>
                        </div>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <!-- Information table End-->

        <!--        <Modal />-->
        <TransitionRoot as="template" :show="open">
          <Dialog
            as="div"
            static
            class="fixed z-10 inset-0 overflow-y-auto"
            @close="open = false"
            :open="open"
          >
            <div
              class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0"
            >
              <TransitionChild
                as="template"
                enter="ease-out duration-300"
                enter-from="opacity-0"
                enter-to="opacity-100"
                leave="ease-in duration-200"
                leave-from="opacity-100"
                leave-to="opacity-0"
              >
                <DialogOverlay class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" />
              </TransitionChild>

              <!-- This element is to trick the browser into centering the modal contents. -->
              <span
                class="hidden sm:inline-block sm:align-middle sm:h-screen"
                aria-hidden="true"
              >&#8203;</span>
              <TransitionChild
                as="template"
                enter="ease-out duration-300"
                enter-from="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                enter-to="opacity-100 translate-y-0 sm:scale-100"
                leave="ease-in duration-200"
                leave-from="opacity-100 translate-y-0 sm:scale-100"
                leave-to="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
              >
                <div
                  class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
                >
                  <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">
                      <div
                        class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10"
                      >
                        <ExclamationIcon class="h-6 w-6 text-red-600" aria-hidden="true" />
                      </div>
                      <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                        <DialogTitle
                          as="h3"
                          class="text-lg leading-6 font-medium text-gray-900"
                        >Deactivate account</DialogTitle>
                        <div class="mt-2">
                          <p
                            class="text-sm text-gray-500"
                          >Are you sure you want to deactivate your account? All of your data will be permanently removed. This action cannot be undone.</p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <button
                      type="button"
                      class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm"
                      @click="deleteInformation()"
                    >Delete</button>
                    <button
                      type="button"
                      class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm"
                      @click="open = false"
                      ref="cancelButtonRef"
                    >Cancel</button>
                  </div>
                </div>
              </TransitionChild>
            </div>
          </Dialog>
        </TransitionRoot>
        <!--     model end     -->
            <!-- /End replace -->
        </div>
        </main>
    </AppLayout>
</template>

<script>
import AppLayout from '../Layouts/App.vue'
import { Inertia } from "@inertiajs/inertia";
import {
  UserGroupIcon,
  MenuIcon,
  BanIcon,
  BadgeCheckIcon,
  EyeIcon,
  QuestionMarkCircleIcon,
  CollectionIcon,
  TrashIcon,
} from "@heroicons/vue/outline";
import { ref, onMounted, onBeforeMount } from "vue";
export default {
    components: {
        AppLayout,
        EyeIcon,
        TrashIcon,
    },
    props: {
    informations: Object,
  },

  setup(props) {
    const open = ref(false);
    const information_id = ref(null);

    function openModel(id) {
      information_id.value = id;
      open.value = true;
    }
    function deleteInformation() {
      Inertia.delete(`informations/${information_id.value}/delete`, {
        preserveState: true,
        preserveScroll: true,
        onSuccess: (page) => {
          open.value = false;
        },
      });
    }

    onBeforeMount(() => {
      console.log(props.informations);
    });

    function informationPreview(id) {
      Inertia.get(`informations/${id}/preview`);
    }

    // function searchAction(value) {
    //   setTimeout(function () {
    //     Inertia.get(
    //       `/`,
    //       {
    //         search: value,
    //       },
    //       {
    //         preserveState: true,
    //         preserveScroll: true,
    //       }
    //     );
    //   }, 500);
    // }

    //   function filter(value) {
    //       setTimeout(function () {
    //           Inertia.get(
    //               `/`,
    //               {
    //                   status: value,
    //               },
    //               {
    //                   preserveState: true,
    //                   preserveScroll: true,
    //               }
    //           );
    //       }, 500);
    //   }

    return {
      open,
        //filter,
      //searchAction,
      openModel,
      deleteInformation,
      informationPreview,
    };
  },
}
</script>
