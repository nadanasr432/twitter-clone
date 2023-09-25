<template>
  <div>
    <h1>Data View</h1>
    <hot-table :settings="hotSettings" :afterChange="onAfterChange"></hot-table>
  </div>
</template>

<script>
import 'handsontable/dist/handsontable.full.min.css';
import { HotTable } from '@handsontable/vue3';
import axios from 'axios';

export default {
  components: {
    HotTable,
  },
  props: {
    posts: Array, 
  },
  data() {
    return {
      hotSettings: {
        data: this.posts.map((post, index) => ({
          id: post.id,
          user_id: post.user_id || '1',
          body: post.body,
          parent_id: post.parent_id,
          created_at: post.created_at,
          updated_at: post.updated_at,
          quoted_post_id: post.quoted_post_id,
        })),
        
        columns: [
          { data: 'id', title: 'ID', readOnly: true },
          { data: 'user_id', title: 'User Id' },
          { data: 'body', title: 'Body' },
          { data: 'parent_id', title: 'Parent ID' },
          { data: 'created_at', title: 'Created At' },
          { data: 'updated_at', title: 'Updated At' },
          { data: 'quoted_post_id', title: 'Quoted Post ID' },
        ],
        minSpareRows: 5,
        height: 'auto',
        width: 'auto',
        manualRowMove: true,
        stretchH: 'all',
        fillHandle: true,
        autofill: {
          autoInsertRow: true,
        },
        licenseKey: 'non-commercial-and-evaluation',
      },
    };
  },
  
  methods: {
    onAfterChange(changes) {
      if (!Array.isArray(changes)) {
        console.error('Invalid changes format:', changes);
        return;
      }

      for (const [row, prop, oldValue, newValue] of changes) {
        const postData = {
          id: this.hotSettings.data[row].id,
          user_id: this.hotSettings.data[row].user_id , 
          body: this.hotSettings.data[row].body,
          parent_id: this.hotSettings.data[row].parent_id,
          created_at: this.hotSettings.data[row].created_at,
          updated_at: this.hotSettings.data[row].updated_at,
          quoted_post_id: this.hotSettings.data[row].quoted_post_id,
        };

        if(postData.user_id == null){
          postData.user_id = '1';
        }

        axios
          .post('updateOrCreatePost', postData)
          .then((response) => {
            if (response.status === 200) {
              console.log('Data saved successfully.');
            } else {
              console.error('Error:', response.data);
            }
          })
          .catch((error) => {
            console.error('Axios error:', error);
            console.log(postData);
          });
      }
    }
  },
};
</script>

<style>
.handsontable {
  font-size: 20px;
}
td {
  box-shadow: rgba(189, 189, 189, 0.622) 3px 3px 6px 0px inset,
    rgba(255, 255, 255, 0.5) -3px -3px 6px 1px inset;
}
</style>
