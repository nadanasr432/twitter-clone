<template>
  <div>
    <h1>Data View</h1>
    <hot-table :key="posts" :data="posts" :settings="hotSettings" @afterChange="handleDataChange" ></hot-table>
    <div id="example1console">{{ consoleMessage }}</div>
  </div>
</template>
<script>
import { ref, onMounted, watch } from 'vue';
import 'handsontable/dist/handsontable.full.css';
import { HotTable } from '@handsontable/vue3';
import axios from 'axios';

export default {
  components: {
    HotTable,
  },
  setup() {
    const posts = ref([]);
    const consoleMessage = ref('');
    const newRow = ref({
      id: null,
      user_id: '',
      body: '',
      parent_id: '',
      created_at: new Date().toISOString(),
      updated_at: new Date().toISOString(),
      quoted_post_id: '',
    });

    const hotSettings = {
      data: posts,
      columns: [
        { data: 'id', title: 'ID' },
        { data: 'user_id', title: 'UserId' },
        { data: 'body', title: 'Body' },
        { data: 'parent_id', title: 'Parent_id' },
        { data: 'created_at', title: 'Created At' },
        { data: 'updated_at', title: 'Updated At' },
        { data: 'quoted_post_id', title: 'Quoted Post ID' },
      ],
      stretchH: 'all',
      autoWrapRow: true,
      height: 400,
      rowHeaders: true,
      colHeaders: true,
      contextMenu: true,
      minSpareRows: 1, 
      licenseKey: 'non-commercial-and-evaluation',
    };

    const fetchData = () => {
      axios.get('/get-data')
        .then(response => {
          posts.value = response.data;
          console.log('Fetched data:', posts.value);
        })
        .catch(error => {
          console.error('Error fetching data:', error);
        });
    };

    const saveData = () => {
      axios.post('/update-data', { data: posts.value })
        .then(response => {
          if (response.data.result === 'ok') {
            consoleMessage.value = 'Data saved';
          } else {
            consoleMessage.value = 'Save error';
          }
        })
        .catch(error => {
          console.error('Error updating data:', error);
        });
    };
    const handleDataChange = (changes, source) => {
      if (source === 'loadData') {
        return; 
      }
    };
    const saveNewRow = () => {
      const newPost = {
        id: null,
        user_id: newRow.value.user_id || null,
        body: newRow.value.body || '',
        parent_id: newRow.value.parent_id || null,
        created_at: newRow.value.created_at,
        updated_at: newRow.value.updated_at,
        quoted_post_id: newRow.value.quoted_post_id || null,
      };

      posts.value.push(newPost);

      axios.post('/store-data', newPost)
        .then(response => {
          console.log('saved', response.data);
        })
        .catch(error => {
          console.error('error', error);
        });
    };
    
    onMounted(() => {
      fetchData();
    });

    watch(posts, () => {
      saveData();
    }, { deep: true });

    return {
      posts,
      hotSettings,
      handleDataChange,
      consoleMessage,
      newRow,
      saveNewRow, 
    };
  },
};
</script>

<style scoped>
/* Add any scoped styles here if needed */
</style>
