<template>
 <div>
    <b-sidebar id="sidebar-no-header" aria-labelledby="sidebar-no-header-title" visible no-header shadow >
      <template #default="{ hide }">
          <div class="d-flex flex-column bg-white justify-content-center align-items-center py-3">
          <b-img src="../img/logo_envia2_go.png" alt="Logo" width="170"></b-img>
          <h5 id="sidebar-no-header-title" class="text-green text-center"><strong>Admin Envia2Go</strong></h5>

          </div>
          <b-badge class=" user-span d-flex m-3 align-items-center"  variant="outline-light">
            <b-avatar :src="user.image" class="m-2"></b-avatar>
            <span class="text-light">{{user.name}}</span>
          </b-badge >
          <nav class="mb-3" >
            <b-nav vertical>
              <b-nav-item href="/admin/"><b-icon icon="house-door-fill" class="text-white mx-2"></b-icon>Inicio</b-nav-item>
              <b-nav-item href="/admin/companies/1/edit"><b-icon icon="building" class="text-white mx-2"></b-icon>Empresa</b-nav-item>
              <b-nav-item href="/admin/shops"><b-icon icon="shop" class="text-white mx-2"></b-icon>Tiendas</b-nav-item>
              <b-nav-item href="/admin/products"><b-icon icon="cart-fill" class="text-white mx-2"></b-icon>Productos</b-nav-item>
              <b-nav-item href="/admin/users"><b-icon icon="bicycle" class="text-white mx-2"></b-icon>Repartidor</b-nav-item>
              <b-nav-item href="/admin/categories"><b-icon icon="bookmark-dash-fill" class="text-white mx-2"></b-icon>Categorías de tiendas</b-nav-item>
              <b-nav-item href="/admin/categories"><b-icon icon="bookmark-dash" class="text-white mx-2"></b-icon>Categorías de productos</b-nav-item>
              <b-nav-item href="#link-7"><b-icon icon="newspaper" class="text-white mx-2"></b-icon>Historial</b-nav-item>
              <b-nav-item href="#link-8"><b-icon icon="gear-fill" class="text-white mx-2"></b-icon>Configuración</b-nav-item>
            </b-nav>
          </nav>
      </template>
    </b-sidebar>
  </div>
</template>

<style lang="scss" scope>
  .b-sidebar-outer{
    z-index: 0;

  }
  .b-sidebar{
  //  position: relative;
   height:80vh !important;
   top: 54px;
   min-height: calc(100vh - 55px);
   width: 270px;
   background: rgb(38,51,119);
  background: linear-gradient(90deg, rgba(38,51,119,1) 0%, rgba(0,121,255,1) 100%);
  }
  .b-sidebar .user-span{
    border: 1px #fff solid;
    border-radius: 50px;
  }
  .b-sidebar .nav .nav-item a{
    color: #fff;
    &:hover{
      background: #fff;
      color: #000;
      text-decoration: none;

      .b-icon{
        color: #000 !important;
      }
    }
  }
</style>
<script>
export default {
  props:{
    user: Object,
  },
  data: () => ({

  }),
    methods:{

    }
}
</script>
