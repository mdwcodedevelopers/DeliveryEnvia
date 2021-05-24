<template>
  <div>
    <b-navbar toggleable="lg" type="dark" variant="green" fixed="top">
      <b-navbar-brand href="#">Envia2Go</b-navbar-brand>
      <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>
      <b-collapse id="nav-collapse" is-nav>
        <b-navbar-nav>
        </b-navbar-nav>
        <b-navbar-nav class="ml-auto">
          <b-navbar-nav>
            <b-nav-item href="#"><b-icon icon="exclamation-triangle-fill"></b-icon></b-nav-item>
            <b-nav-item href="#"><b-icon icon="calendar2-minus"></b-icon></b-nav-item>
          </b-navbar-nav>
          <b-nav-item-dropdown right>
            <template #button-content>
              <em>{{user.name}}</em>
            </template>
            <b-badge class=" user-span d-flex flex-column m-3 align-items-center"  variant="outline-light">
              <b-avatar :src="null" class="m-2" size="6rem"></b-avatar>
              <span class="text-light h5">{{user.name}}</span>
            </b-badge >
            <div class="d-flex bg-light py-2">
              <b-dropdown-item href="#">Cambiar Empresa</b-dropdown-item>
              <b-dropdown-item @click="logout()">Cerrar sesión</b-dropdown-item>
            </div>
          </b-nav-item-dropdown>
        </b-navbar-nav>
      </b-collapse>
    </b-navbar>
  </div>
</template>

<style lang="scss" scope>
    .dropdown-menu.dropdown-menu-right{
        background-color: #3CAA34  !important;
    }
</style>
<script>
export default {
    props:{
    user: Object,
  },
    methods:{
        logout() {
            axios.post("/logout", {

            }).then((response) => {
                console.log(response);
                    window.location.href ="/admin/"
            });
        }
    }
}
</script>
