<template>
  <div>
    <div class="caja bg-light py-4 px-2 mb-5">
      <h3 class="text-green d-inline"><strong>USUARIOS DEL SISTEMA</strong></h3>
      <b-button size="sm" class="ml-5 d-inline" pill variant="success" rounded="0" style="margin-bottom:.3rem;" @click="create()">
        <b-icon icon="plus-circle" scale=".8" class="text-white"></b-icon> Nuevo Usuario
      </b-button>
    </div>
    <b-table striped hover :items="users" :fields="fields">
      <template #cell(actions)="row">
        <b-button size="sm" class="mr-2" pill variant="outline-primary" rounded="0" @click="edit(row.item.id)">
          <b-icon icon="pencil-square" scale=".8"></b-icon> Editar
        </b-button>
        <b-button size="sm" class="mr-2" pill variant="outline-danger" rounded="0"  @click="deleteview(row.item.id)">
          <b-icon icon="trash" scale=".8"></b-icon> Eliminar
        </b-button>
      </template>
    </b-table>
    <b-modal id="modal-1" ref="modal" title="Nuevo Usuario" size="lg" hide-footer centered>
      <form ref="form">
        <b-container>
          <b-row>
            <b-col>
              <b-form-group label="Role de Usuario" label-for="role-input">
                <b-form-select v-model="user.role_id" :options="roles">
                  <template #first>
                    <b-form-select-option :value="null" disabled>Seleccione Role de Usuario ...</b-form-select-option>
                  </template>
                </b-form-select>
              </b-form-group>
            </b-col>
            <b-col>
              <b-form-group label="Nombre Completo" label-for="name-input">
                <b-form-input v-model="user.name"></b-form-input>
              </b-form-group>
            </b-col>
          </b-row>
          <b-row>
            <b-col>
              <b-form-group label="Télefono" label-for="phone-input">
                <b-form-input v-model="user.phone"></b-form-input>
              </b-form-group>
            </b-col>
            <b-col>
              <b-form-group label="Correo Eléctronico" label-for="email-input">
                <b-form-input v-model="user.email" type="email"></b-form-input>
              </b-form-group>
            </b-col>
          </b-row>
          <b-row>
            <b-col>
              <b-form-group label="Estatus" label-for="status-input">
                <b-form-input v-model="user.status"></b-form-input>
              </b-form-group>
            </b-col>
            <b-col>
              <b-form-group label="Imagen" label-for="image-input">
                <b-form-file v-model="user.image" :state="Boolean(user.image)" placeholder="Elija un archivo o suéltelo aquí..." drop-placeholder="Elegir una Imagen..."></b-form-file>
              </b-form-group>
            </b-col>
          </b-row>
          <b-row>
            <b-col>
              <b-form-group label="Contraseña" label-for="password-input">
                <b-form-input v-model="user.password" type="password"></b-form-input>
              </b-form-group>
            </b-col>
            <b-col>
              <b-form-group label="Repetir Contraseña" label-for="repeat-input">
                <b-form-input v-model="user.repeat" type="password"></b-form-input>
              </b-form-group>
            </b-col>
          </b-row>
          <b-row>
            <b-col>
              <b-form-group label="Dirección" label-for="address-input">
                <b-form-textarea v-model="user.address" rows="2"></b-form-textarea>
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
    <b-modal id="modal-2" ref="modal" title="Modificar Usuario" size="lg" hide-footer centered>
      <form ref="form">
        <b-container>
          <b-row>
            <b-col>
              <b-form-group label="Role de Usuario" label-for="role-input">
                <b-form-select v-model="user.role_id" :options="roles">
                  <template #first>
                    <b-form-select-option :value="null" disabled>Seleccione Role de Usuario ...</b-form-select-option>
                  </template>
                </b-form-select>
              </b-form-group>
            </b-col>
            <b-col>
              <b-form-group label="Nombre Completo" label-for="name-input">
                <b-form-input v-model="user.name"></b-form-input>
              </b-form-group>
            </b-col>
          </b-row>
          <b-row>
            <b-col>
              <b-form-group label="Télefono" label-for="phone-input">
                <b-form-input v-model="user.phone"></b-form-input>
              </b-form-group>
            </b-col>
            <b-col>
              <b-form-group label="Correo Eléctronico" label-for="email-input">
                <b-form-input v-model="user.email" type="email"></b-form-input>
              </b-form-group>
            </b-col>
          </b-row>
          <b-row>
            <b-col>
              <b-form-group label="Estatus" label-for="status-input">
                <b-form-input v-model="user.status"></b-form-input>
              </b-form-group>
            </b-col>
            <b-col>
              <b-form-group label="Imagen" label-for="image-input">
                <b-form-file v-model="user.image" :state="Boolean(user.image)" placeholder="Elija un archivo o suéltelo aquí..." drop-placeholder="Elegir una Imagen..."></b-form-file>
              </b-form-group>
            </b-col>
          </b-row>
          <b-row>
            <b-col>
              <b-form-group label="Contraseña" label-for="password-input">
                <b-form-input v-model="user.password" type="password"></b-form-input>
              </b-form-group>
            </b-col>
            <b-col>
              <b-form-group label="Repetir Contraseña" label-for="repeat-input">
                <b-form-input v-model="user.repeat" type="password"></b-form-input>
              </b-form-group>
            </b-col>
          </b-row>
          <b-row>
            <b-col>
              <b-form-group label="Dirección" label-for="address-input">
                <b-form-textarea v-model="user.address" rows="2"></b-form-textarea>
              </b-form-group>
            </b-col>
          </b-row>
        </b-container>
        <div class="mt-4 text-right">
          <b-button variant="outline-danger" @click="$bvModal.hide('modal-2')">Cancelar</b-button>
          <b-button variant="success" @click="update(user.id)">Guardar</b-button>
        </div>
      </form>
    </b-modal>
    <b-modal id="modal-3" ref="modal" title="Eliminar Usuario" size="lg" hide-footer centered>
      <form ref="form">
        <h6 class="text-center"><strong>¿Esta seguro que desea eliminar esta Usuario?</strong></h6>
        <div class="mt-4 text-right">
          <b-button variant="outline-danger" @click="$bvModal.hide('modal-3')">Cancelar</b-button>
          <b-button variant="success" @click="destroy(user.id)">Eliminar</b-button>
        </div>
      </form>
    </b-modal>
  </div>
</template>

<script>
  export default {
    props: [
      'users',
      'roles',
    ],
    data() {
      return {
        user: [],
        errors:[],
        fields: [
          {
            key: 'role',
            sortable: true
          },
          {
            key: 'name',
            sortable:true
          },
          {
            key: 'email',
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
        axios.get("/admin/users").then((response) => {
          this.users = response.data.users;
        });
      },
      create() {
        this.user = {};
        this.$bvModal.show("modal-1");
      },
      store() {
        axios.post('/admin/users', this.user).then((response) => {
          if (response.status == 200) {
            this.user = {};
            this.$bvModal.hide("modal-1");
            swal("Éxito!", "Datos actualizados con éxito!", "success");
            //this.index();
          }
        }).catch(error => {
          swal("Oops!", "Ha ocurrido un error", "error");
        });
      },
      edit(id) {
        axios.get('/admin/users/'+ id + '/edit').then((response) => {
          if (response.status == 200) {
            this.user = {};
            this.user = response.data.user;
            this.$bvModal.show("modal-2");
          }
        }).catch(error => {
          swal("Oops!", "Ha ocurrido un error", "error");
        });
      },
      update(id) {
        axios.patch('/admin/users/'+ id, this.user).then((response) => {
          if (response.status == 200) {
            this.user = {};
            this.$bvModal.hide("modal-2");
            swal("Éxito!", "Datos actualizados con éxito!", "success");
            //this.index();
          }
        }).catch(error => {
          swal("Oops!", "Ha ocurrido un error", "error");
        });
      },
      deleteview(id) {
        axios.get('/admin/users/'+ id + '/edit').then((response) => {
          if (response.status == 200) {
            this.user = response.data.user;
            this.$bvModal.show("modal-3");
          }
        }).catch(error => {
          swal("Oops!", "Ha ocurrido un error", "error");
        });
      },
      destroy(id) {
        axios.delete("/admin/users/" + id).then((response) => {
          if (response.status == 200) {
            this.user = {};
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
