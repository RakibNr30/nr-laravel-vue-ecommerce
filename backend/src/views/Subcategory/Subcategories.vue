<template>
  <div class="flex items-center justify-between mb-3">
    <h1 class="text-3xl font-semibold">Subcategory</h1>
    <button type="button"
            @click="showAddNewModal()"
            class="py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
    >
      Add new Subcategory
    </button>
  </div>
  <SubcategoryTable @clickEdit="editSubcategory"/>
  <SubcategoryModal v-model="showSubcategoryModal" :subcategory="subcategoryModel" @close="onModalClose"/>
</template>

<script setup>
import {computed, onMounted, ref} from "vue";
import store from "../../store";
import SubcategoryModal from "./SubcategoryModal.vue";
import SubcategoryTable from "./SubcategoryTable.vue";

const DEFAULT_SUBCATEGORY = {
  id: '',
  category_id: '',
  name: '',
  description: '',
}

const subcategories = computed(() => store.state.subcategories);

const subcategoryModel = ref({...DEFAULT_SUBCATEGORY})
const showSubcategoryModal = ref(false);

function showAddNewModal() {
  showSubcategoryModal.value = true
}

function editSubcategory(p) {
  store.dispatch('getSubcategory', p.id)
    .then(({data}) => {
      subcategoryModel.value = data
      showAddNewModal();
    })
}

function onModalClose() {
  subcategoryModel.value = {...DEFAULT_SUBCATEGORY}
}
</script>

<style scoped>

</style>
