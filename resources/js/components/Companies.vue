<template>
  <div>
    <div class="caja bg-light py-4 px-2 mb-5">
      <h3 class="text-green"><strong>EMPRESA</strong></h3>
    </div>
    <div v-show="errors.length > 0">
      <b-alert variant="danger" dismissible show v-for="(error, index) in errors" :key="index">
        <li v-for="(item, index) in error" :key="index" >
          {{ item }}
        </li>
      </b-alert>
    </div>
    <form ref="form">
      <b-row>
        <b-col cols="12">
          <b-form-group label="Nombre" label-for="name-input">
            <b-form-input v-model="company.name"></b-form-input>
          </b-form-group>
        </b-col>
        <b-col cols="12">
          <b-form-group label="Teléfono" label-for="phone-input">
            <b-form-input v-model="company.phone"></b-form-input>
          </b-form-group>
        </b-col>
        <b-col cols="12">
          <b-form-group label="Correo Electrónico" label-for="email-input">
            <b-form-input v-model="company.email" type="email"></b-form-input>
          </b-form-group>
        </b-col>
        <b-col cols="12">
          <b-form-group label="Website" label-for="website-input">
            <b-form-input v-model="company.website"></b-form-input>
          </b-form-group>
        </b-col>
        <b-col cols="12">
          <b-form-group label="Dirección" label-for="address-input">
            <b-form-textarea v-model="company.address" rows="2"></b-form-textarea>
          </b-form-group>
        </b-col>
        <b-col cols="12">
          <b-form-file v-model="company.image" :state="Boolean(company.image)" placeholder="Elija una imagen ..." drop-placeholder="Soltar archivo aquí ..."></b-form-file>
        </b-col>
        <b-col class="mt-4 text-right">
          <b-button variant="success" @click="update(company.id)">Actualizar</b-button>
        </b-col>
      </b-row>
    </form>
  </div>
</template>

<script>
  export default {
    props:{
      company: Object,
    },
    data() {
      return {
        errors:[],
      }
    },
    methods: {
      update(id) {
        axios.patch('/admin/companies/'+ id, this.company).then((response) => {
          if (response.status == 200) {
            swal("Éxito!", "Datos actualizados con éxito!", "success");
          }
        }).catch(error => {
          swal("Oops!", "Ha ocurrido un error", "error");
        });
      }
    },
  }
</script>
