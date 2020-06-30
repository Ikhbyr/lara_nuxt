<template>
  <v-row align="center">
    <v-alert type="success" v-show="createAdd">
      I'm a success alert.
    </v-alert>
    <v-row justify="space-around">
       <v-data-table
        :headers="headers"
        :items="todos"
        :items-per-page="5"
        class="elevation-1"
    ></v-data-table>
    </v-row>
    <v-form
      ref="form"
      v-model="valid"
    >
      <v-text-field
        v-model="title"
        label="title"
        required
      ></v-text-field>

      <v-text-field
        v-model="body"
        label="dody"
        required
      ></v-text-field>

      <v-btn
        color="error"
        class="mr-4"
        @click="createTodo"
      >
        Нэмэх
      </v-btn>

      <v-btn
        color="warning"
        @click="getTodo"
      >
        Дата харах
      </v-btn>
    </v-form>
  </v-row>
</template>

<script>
import axios from 'axios'
export default {
    data () {
      return {
        todos: [],
         headers: [
          {
            text: 'ID',
            align: 'start',
            sortable: false,
            value: 'id',
          },
          { text: 'Title', value: 'title' },
          { text: 'Body', value: 'body' },
        ],
        form: {
          title: '',
          body: ''
        },
        createAdd : false
      }
    },
    computed: {
        
    },

    methods: {
        getTodo(){
                this.$axios.$get('/todo') .then((res) => {
                this.todos = res.data
            })
            .catch((e) => {
                error({ statusCode: 404, message: 'Post not found' })
            })
        },
        createTodo(){
            this.$axios.$post('/todo', this.form).then((res) => {
                this.createAdd=true
            })
            .catch((e) => {
                this.createAdd = true
            })
        }
    },

    computed: {
        getTodo: function(){
          this.$axios.$get('/todo') .then((res) => {
                this.todos = res.data
            })
            .catch((e) => {
                error({ statusCode: 404, message: 'Post not found' })
            })
        }
    }
}
</script>

<style>

</style>