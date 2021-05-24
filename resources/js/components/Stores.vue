<template>
  <div>
    <div class="caja bg-light py-4 px-2 mb-5">
      <h3 class="text-green d-inline"><strong>TIENDAS</strong></h3>
      <b-button size="sm" class="ml-5 d-inline" pill variant="success" rounded="0" style="margin-bottom:.3rem;" @click="create()">
        <b-icon icon="plus-circle" scale=".8" class="text-white"></b-icon> Nueva Tienda
      </b-button>
    </div>
    <b-table striped hover :items="stores" :fields="fields">
      <template #cell(actions)="row">
        <b-button size="sm" class="mr-2" pill variant="outline-primary" rounded="0"  @click="edit(row.item.id)">
          <b-icon icon="pencil-square" scale=".8"></b-icon> Editar
        </b-button>
        <b-button size="sm" class="mr-2" pill variant="outline-danger" rounded="0"  @click="deleteview(row.item.id)">
          <b-icon icon="trash" scale=".8"></b-icon> Eliminar
        </b-button>
      </template>
    </b-table>
    <b-modal id="modal-1" ref="modal" title="Nueva Tienda" size="lg" hide-footer centered>
      <div v-show="errors.length > 0">
        <b-alert variant="danger" dismissible show v-for="(error, index) in errors" :key="index">
          <li v-for="(item, index) in error" :key="index" >
            {{ item }}
          </li>
        </b-alert>
      </div>
      <form ref="form">
        <b-container>
          <b-row>
            <b-col>
              <b-form-group label="Categoría" label-for="category-input">
                <b-form-select v-model="shop.category_id" :options="categories">
                  <template #first>
                    <b-form-select-option :value="null" disabled>Seleccione Categoría ...</b-form-select-option>
                  </template>
                </b-form-select>
              </b-form-group>
            </b-col>
          </b-row>
          <b-row>
            <b-col>
              <b-form-group label="Nombre" label-for="name-input">
                <b-form-input v-model="shop.name"></b-form-input>
              </b-form-group>
            </b-col>
            <b-col>
              <b-form-group label="Teléfono" label-for="phone-input">
                <b-form-input v-model="shop.phone"></b-form-input>
              </b-form-group>
            </b-col>
          </b-row>
          <b-row>
            <b-col>
              <b-form-group label="Responsable" label-for="responsable-input">
                <b-form-input v-model="shop.responsable"></b-form-input>
              </b-form-group>
            </b-col>
            <b-col>
              <b-form-group label="Correo Electrónico" label-for="email-input">
                <b-form-input v-model="shop.email" type="email"></b-form-input>
              </b-form-group>
            </b-col>
          </b-row>
          <b-row>
            <b-col>
              <b-form-group label="Imagen" label-for="image-input">
                <b-form-file v-model="shop.image" :state="Boolean(shop.image)" placeholder="Elija un archivo o suéltelo aquí..." drop-placeholder="Elegir una Imagen..."></b-form-file>
              </b-form-group>
            </b-col>
            <b-col>
              <b-form-group label="Estatus" label-for="status-input">
                <b-form-input v-model="shop.status"></b-form-input>
              </b-form-group>
            </b-col>
          </b-row>
          <b-row>
            <b-col>
              <b-form-group label="Dirección" label-for="address-input">
                <b-form-textarea v-model="shop.address" rows="2"></b-form-textarea>
              </b-form-group>
            </b-col>
          </b-row>
        </b-container>
        <div class="mt-4 text-right">
          <b-button variant="outline-danger" @click="$bvModal.hide('modal-1')">Cancelar</b-button>
          <b-button variant="success" @click="store()">Guardar</b-button>
        </div>
      </form>
    </b-modal>
    <b-modal id="modal-2" ref="modal" title="Modificar Tienda" size="lg" hide-footer centered>
      <div v-show="errors.length > 0">
        <b-alert variant="danger" dismissible show v-for="(error, index) in errors" :key="index">
          <li v-for="(item, index) in error" :key="index" >
            {{ item }}
          </li>
        </b-alert>
      </div>
      <form ref="form">
        <b-container>
          <b-row>
            <b-col>
              <b-form-group label="Categoría" label-for="category-input">
                <b-form-select v-model="shop.category_id" :options="categories">
                  <template #first>
                    <b-form-select-option :value="null" disabled>Seleccione Categoría ...</b-form-select-option>
                  </template>
                </b-form-select>
              </b-form-group>
            </b-col>
          </b-row>
          <b-row>
            <b-col>
              <b-form-group label="Nombre" label-for="name-input">
                <b-form-input v-model="shop.name"></b-form-input>
              </b-form-group>
            </b-col>
            <b-col>
              <b-form-group label="Teléfono" label-for="phone-input">
                <b-form-input v-model="shop.phone"></b-form-input>
              </b-form-group>
            </b-col>
          </b-row>
          <b-row>
            <b-col>
              <b-form-group label="Responsable" label-for="responsable-input">
                <b-form-input v-model="shop.responsable"></b-form-input>
              </b-form-group>
            </b-col>
            <b-col>
              <b-form-group label="Correo Electrónico" label-for="email-input">
                <b-form-input v-model="shop.email" type="email"></b-form-input>
              </b-form-group>
            </b-col>
          </b-row>
          <b-row>
            <b-col>
              <b-form-group label="Imagen" label-for="image-input">
                <b-form-file v-model="shop.image" :state="Boolean(shop.image)" placeholder="Elija un archivo o suéltelo aquí..." drop-placeholder="Elegir una Imagen..."></b-form-file>
              </b-form-group>
            </b-col>
            <b-col>
              <b-form-group label="Estatus" label-for="status-input">
                <b-form-input v-model="shop.status"></b-form-input>
              </b-form-group>
            </b-col>
          </b-row>
          <b-row>
            <b-col>
              <b-form-group label="Dirección" label-for="address-input">
                <b-form-textarea v-model="shop.address" rows="2"></b-form-textarea>
              </b-form-group>
            </b-col>
          </b-row>
        </b-container>
        <div class="mt-4 text-right">
          <b-button variant="outline-danger" @click="$bvModal.hide('modal-2')">Cancelar</b-button>
          <b-button variant="success" @click="update(shop.id)">Guardar</b-button>
        </div>
      </form>
    </b-modal>
    <b-modal id="modal-3" ref="modal" title="Eliminar Tienda" size="lg" hide-footer centered>
      <div v-show="errors.length > 0">
        <b-alert variant="danger" dismissible show v-for="(error, index) in errors" :key="index">
          <li v-for="(item, index) in error" :key="index" >
            {{ item }}
          </li>
        </b-alert>
      </div>
      <form ref="form">
        <h6 class="text-center"><strong>¿Esta seguro que desea eliminar esta Tienda?</strong></h6>
        <div class="mt-4 text-right">
          <b-button variant="outline-danger" @click="$bvModal.hide('modal-3')">Cancelar</b-button>
          <b-button variant="success" @click="destroy(shop.id)">Eliminar</b-button>
        </div>
      </form>
    </b-modal>
  </div>
</template>

<script>
  export default {
    props: [
      'stores',
      'categories',
    ],
    data() {
      return {
        shop: [],
        errors:[],
        fields: [
          {
            key: 'name',
            sortable: true
          },
          {
            key: 'responsable',
            sortable: true
          },
          {
            key: 'email',
            sortable: true
          },
          {
            key: 'status',
            sortable:true
          },
          {
            key: 'actions'
          }
        ],
      }
    },
    methods: {
      index() {
        axios.get("/admin/shops").then((response) => {
          this.shop = response.data.stores;
        });
      },
      create() {
        this.shop = {};
        this.$bvModal.show("modal-1");
      },
      store() {
        axios.post('/admin/shops', this.shop).then((response) => {
          if (response.status == 200) {
            this.shop = {};
            this.$bvModal.hide("modal-1");
            swal("Éxito!", "Datos actualizados con éxito!", "success");
          }
        }).catch(error => {
          swal("Oops!", "Ha ocurrido un error", "error");
        });
      },
      edit(id) {
        axios.get('/admin/shops/'+ id + '/edit').then((response) => {
          console.log(response);
          if (response.status == 200) {
            this.shop = response.data.store;
            this.$bvModal.show("modal-2");
          }
        }).catch(error => {
          swal("Oops!", "Ha ocurrido un error", "error");
        });
      },
      update(id) {
        axios.patch('/admin/shops/'+ id, this.shop).then((response) => {
          if (response.status == 200) {
            this.shop = {};
            this.$bvModal.hide("modal-2");
            swal("Éxito!", "Datos actualizados con éxito!", "success");
          }
        }).catch(error => {
          swal("Oops!", "Ha ocurrido un error", "error");
        });
      },
      deleteview(id) {
        axios.get('/admin/shops/'+ id + '/edit').then((response) => {
          if (response.status == 200) {
            this.shop = response.data.store;
            this.$bvModal.show("modal-3");
          }
        }).catch(error => {
          swal("Oops!", "Ha ocurrido un error", "error");
        });
      },
      destroy(id) {
        axios.delete("/admin/shops/" + id).then((response) => {
          if (response.status == 200) {
            console.log();
            this.shop = {};
            this.$bvModal.hide("modal-3");
            swal("Éxito!", "Registro eliminado con éxito!", "success");
          }
        }).catch(error => {
          swal("Oops!", "Ha ocurrido un error", "error");
        });
      },
    },
  }
</script>
