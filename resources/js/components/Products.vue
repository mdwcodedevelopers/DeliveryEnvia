<template>
  <div>
    <div class="caja bg-light py-4 px-2 mb-5">
      <h3 class="text-green d-inline"><strong>PRODUCTOS</strong></h3>
      <b-button size="sm" class="ml-5 d-inline" pill variant="success" rounded="0" style="margin-bottom:.3rem;" @click="create()">
        <b-icon icon="plus-circle" scale=".8" class="text-white"></b-icon> Nuevo Productos
      </b-button>
    </div>
    <b-table striped hover :items="products" :fields="fields">
      <template #cell(actions)="row">
        <b-button size="sm" class="mr-2" pill variant="outline-primary" rounded="0" @click="edit(row.item.id)">
          <b-icon icon="pencil-square" scale=".8"></b-icon> Editar
        </b-button>
        <b-button size="sm" class="mr-2" pill variant="outline-danger" rounded="0"  @click="deleteview(row.item.id)">
          <b-icon icon="trash" scale=".8"></b-icon> Eliminar
        </b-button>
      </template>
    </b-table>
    <b-modal id="modal-1" ref="modal" title="Nuevo Producto" size="lg" hide-footer centered>
      <form ref="form">
        <b-container>
          <b-row>
            <b-col>
              <b-form-group label="Tienda" label-for="category-input">
                <b-form-select v-model="product.category_id" :options="categories">
                  <template #first>
                    <b-form-select-option :value="null" disabled>Seleccione Tienda ...</b-form-select-option>
                  </template>
                </b-form-select>
              </b-form-group>
            </b-col>
            <b-col>
              <b-form-group label="Categoría" label-for="store-input">
                <b-form-select v-model="product.store_id" :options="stores">
                  <template #first>
                    <b-form-select-option :value="null" disabled>Seleccione Categoría ...</b-form-select-option>
                  </template>
                </b-form-select>
              </b-form-group>
            </b-col>
          </b-row>
          <b-row>
            <b-col>
              <b-form-group label="Código" label-for="code-input">
                <b-form-input v-model="product.code"></b-form-input>
              </b-form-group>
            </b-col>
            <b-col>
              <b-form-group label="Nombre" label-for="name-input">
                <b-form-input v-model="product.name"></b-form-input>
              </b-form-group>
            </b-col>
          </b-row>
          <b-row>
            <b-col>
              <b-form-group label="Precio" label-for="price-input">
                <b-form-input v-model="product.price"></b-form-input>
              </b-form-group>
            </b-col>
            <b-col>
              <b-form-group label="Estatus" label-for="status-input">
                <b-form-input v-model="product.status"></b-form-input>
              </b-form-group>
            </b-col>
          </b-row>
          <b-row>
            <b-col>
              <b-form-group label="Imagen" label-for="image-input">
                <b-form-file v-model="product.image" :state="Boolean(product.image)" placeholder="Elija un archivo o suéltelo aquí..." drop-placeholder="Elegir una Imagen..."></b-form-file>
              </b-form-group>
            </b-col>
          </b-row>
          <b-row>
            <b-col>
              <b-form-group label="Descripción" label-for="description-input">
                <b-form-textarea v-model="product.description" rows="2"></b-form-textarea>
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
    <b-modal id="modal-2" ref="modal" title="Modificar Producto" size="lg" hide-footer centered>
      <form ref="form">
        <b-container>
          <b-row>
            <b-col>
              <b-form-group label="Categoría" label-for="category-input">
                <b-form-select v-model="product.category_id" :options="categories">
                  <template #first>
                    <b-form-select-option :value="null" disabled>Seleccione Categoría ...</b-form-select-option>
                  </template>
                </b-form-select>
              </b-form-group>
            </b-col>
            <b-col>
              <b-form-group label="Tienda" label-for="store-input">
                <b-form-select v-model="product.store_id" :options="stores">
                  <template #first>
                    <b-form-select-option :value="null" disabled>Seleccione Tienda ...</b-form-select-option>
                  </template>
                </b-form-select>
              </b-form-group>
            </b-col>
          </b-row>
          <b-row>
            <b-col>
              <b-form-group label="Código" label-for="code-input">
                <b-form-input v-model="product.code"></b-form-input>
              </b-form-group>
            </b-col>
            <b-col>
              <b-form-group label="Nombre" label-for="name-input">
                <b-form-input v-model="product.name"></b-form-input>
              </b-form-group>
            </b-col>
          </b-row>
          <b-row>
            <b-col>
              <b-form-group label="Precio" label-for="price-input">
                <b-form-input v-model="product.price"></b-form-input>
              </b-form-group>
            </b-col>
            <b-col>
              <b-form-group label="Estatus" label-for="status-input">
                <b-form-input v-model="product.status"></b-form-input>
              </b-form-group>
            </b-col>
          </b-row>
          <b-row>
            <b-col>
              <b-form-group label="Imagen" label-for="image-input">
                <b-form-file v-model="product.image" :state="Boolean(product.image)" placeholder="Elija un archivo o suéltelo aquí..." drop-placeholder="Elegir una Imagen..."></b-form-file>
              </b-form-group>
            </b-col>
          </b-row>
          <b-row>
            <b-col>
              <b-form-group label="Descripción" label-for="description-input">
                <b-form-textarea v-model="product.description" rows="2"></b-form-textarea>
              </b-form-group>
            </b-col>
          </b-row>
        </b-container>
        <div class="mt-4 text-right">
          <b-button variant="outline-danger" @click="$bvModal.hide('modal-2')">Cancelar</b-button>
          <b-button variant="success" @click="update(product.id)">Guardar</b-button>
        </div>
      </form>
    </b-modal>
    <b-modal id="modal-3" ref="modal" title="Eliminar Producto" size="lg" hide-footer centered>
      <form ref="form">
        <h6 class="text-center"><strong>¿Esta seguro que desea eliminar esta Producto?</strong></h6>
        <div class="mt-4 text-right">
          <b-button variant="outline-danger" @click="$bvModal.hide('modal-3')">Cancelar</b-button>
          <b-button variant="success" @click="destroy(product.id)">Eliminar</b-button>
        </div>
      </form>
    </b-modal>
  </div>
</template>

<script>
  export default {
    props: [
      'products',
      'stores',
      'categories'
    ],
    data() {
      return {
        product: [],
        errors:[],
        fields: [
          {
            key: 'code',
            sortable: true
          },
          {
            key: 'name',
            sortable:true
          },
          {
            key: 'price',
            sortable:true
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
        axios.get("/admin/products").then((response) => {
          this.products = response.data.products;
        });
      },
      create() {
        this.product = {};
        this.$bvModal.show("modal-1");
      },
      store() {
        axios.post('/admin/products', this.product).then((response) => {
          if (response.status == 200) {
            this.product = {};
            this.$bvModal.hide("modal-1");
            swal("Éxito!", "Datos actualizados con éxito!", "success");
            //this.index();
          }
        }).catch(error => {
          swal("Oops!", "Ha ocurrido un error", "error");
        });
      },
      edit(id) {
        axios.get('/admin/products/'+ id + '/edit').then((response) => {
          if (response.status == 200) {
            this.product = response.data.product;
            this.$bvModal.show("modal-2");
          }
        }).catch(error => {
          swal("Oops!", "Ha ocurrido un error", "error");
        });
      },
      update(id) {
        axios.patch('/admin/products/'+ id, this.product).then((response) => {
          if (response.status == 200) {
            this.product = {};
            this.$bvModal.hide("modal-2");
            swal("Éxito!", "Datos actualizados con éxito!", "success");
            //this.index();
          }
        }).catch(error => {
          swal("Oops!", "Ha ocurrido un error", "error");
        });
      },
      deleteview(id) {
        axios.get('/admin/products/'+ id + '/edit').then((response) => {
          if (response.status == 200) {
            this.product = response.data.product;
            this.$bvModal.show("modal-3");
          }
        }).catch(error => {
          swal("Oops!", "Ha ocurrido un error", "error");
        });
      },
      destroy(id) {
        axios.delete("/admin/products/" + id).then((response) => {
          if (response.status == 200) {
            this.product = {};
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
