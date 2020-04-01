<template>
  <div>
      <v-btn
        color="primary"
        class="ma-2"
        @click="dialog2 = true"
      >
        Нэвтрэх
      </v-btn>
      <v-dialog
        v-model="dialog2"
        max-width="600px"
      >
        <div class="d-flex">
          <v-card tile style="width:40%">
            <div id="login-bg">
            </div>
          </v-card>
          <v-card class="pa-6" tile style="width:60%">
            <div class="align-self-center">
            <div class="Log_title">
              Нэвтрэх хэсэг
            </div>
            <form @submit.prevent="submit">
              <v-text-field
                v-model.trim="form.email"
                label="Нэвтрэх нэр"
              ></v-text-field>
                <v-alert type="info" v-if="errors.email">
                  {{errors.email[0]}}
                </v-alert>
              <v-text-field
                v-model.trim="form.password"
                label="Нууц үг"
              ></v-text-field>
                 <v-alert type="info" v-if="errors.password">
                                  {{errors.password[0]}}
                                </v-alert>
              <v-btn type="submit" class="mr-4">Нэвтрэх</v-btn>
              <v-btn @click="clear">clear</v-btn>
            </form>
            </div>
          </v-card>
        </div>
      </v-dialog>
  </div>
</template>
<script>
import VeeValidate from 'vee-validate'

  export default {
    middleware: ['guest'],
    data () {
      return {
        namespaced: true,
        dialog2: true,
        select: [
          { text: 'State 1' },
          { text: 'State 2' },
          { text: 'State 3' },
          { text: 'State 4' },
          { text: 'State 5' },
          { text: 'State 6' },
          { text: 'State 7' },
        ],
        email: '',
        form: {
          email: '',
          password: '',
        },
        name: '',
        checkbox: null
      }
    },
    methods: {
      clear () {
        this.name = ''
        this.email = ''
        this.select = null
        this.checkbox = null
      },
      async submit () {
        await this.$auth.loginWith("local", {
          data: this.form
        })
        .then(res=>{
          this.$router.push({
            path: this.$route.query.redirect || "/dashboard"
          })
        })
        .catch(console.log("error"));
      }
    },
  }
</script>
<style>
  #login-bg{
    background-image: url("../../assets/bg/signin-image.jpg");
    background-color: #cccccc;
    height: 500px;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    position: relative;
    max-width: 100%;
  }
</style>