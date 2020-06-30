<template>
  <v-app>
    <v-app-bar
      fixed
      color="deep-purple accent-4"
      app
      class="text-right"
    >
      <v-app-bar-nav-icon @click.stop="rightDrawer = !rightDrawer" />
      <v-toolbar-title v-text="title" />
      <v-spacer />
      <div v-if="!authenticated">
        <v-btn text color="white" to="/auth/login">
          Нэвтрэх
        </v-btn>
         <v-btn text color="white" to="/auth/register">
          Бүртгүүлэх
        </v-btn>
      </div>
      <div v-else>
        <v-btn @click.prevent="logout" text color="white">
          Гарах
        </v-btn>
      </div>
         
      
    </v-app-bar>
    <v-content>
      <v-container>
        <nuxt />
      </v-container>
    </v-content>
    
    <!-- Navigation -->
    <v-navigation-drawer
      v-model="rightDrawer"
      temporary
      fixed>
      <v-list>
        <v-list-item>
          <v-list-item-title>Сонголтоо хийнэ үү</v-list-item-title>
          <v-hover v-slot:default="{ hover }">
          <v-list-item-action @click.stop="rightDrawer = !rightDrawer" :elevation="hover ? 12 : 2">
            <v-icon light>
              mdi-close
            </v-icon>
          </v-list-item-action>
          </v-hover>
        </v-list-item>
        <!-- <Login /> -->
        <v-btn text v-if="authenticated">
          <v-icon color="blue darken-2">
              {{ icons.mdiAccount }}
            </v-icon>
          {{user.name}}
        </v-btn>
      </v-list>
    </v-navigation-drawer>
  </v-app>
</template>

<script>
// import Login from '~/components/login.vue'
import {
    mdiAccount,
  } from '@mdi/js'
export default {
  data () {
    return {
      name: '',
      clipped: true,
      drawer: false,
      fixed: false,
      rightDrawer: false,
      title: 'Хантайшир-Эрдэм Цогцолбор сургууль',
      icons: {
        mdiAccount,
      },
    }
  },
  components: {
    // Login
  },
  methods: {
    async logout(){
      await this.$store.dispatch('auth/logout')
      this.$router.push({ name: 'auth-login' })
    }
  }
}
</script>
