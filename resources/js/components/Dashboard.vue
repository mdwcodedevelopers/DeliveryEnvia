<template>
    <div>
      <div class="caja bg-light p-2">
          <h3 class="text-green"><strong>Bienvenido al Administrador de Envia2Go</strong></h3>
          <h5 class="ml-4">Desde acá podrás controlar todos tus productos y pedidos</h5>
      </div>

      <b-card-group deck class="mt-5 pt-5">
        <b-card bg-variant="primary" text-variant="white" header="Ingresos de hoy" class="text-center">
          <b-card-text class="h5">$280</b-card-text>
        </b-card>

        <b-card bg-variant="warning" text-variant="white" header="Pedidos de hoy" class="text-center">
          <b-card-text class="h5">10</b-card-text>
        </b-card>

        <b-card bg-variant="success" text-variant="white" header="Total de comercios" class="text-center">
          <b-card-text class="h5">5</b-card-text>
        </b-card>

        <b-card bg-variant="danger" text-variant="white" header="Total de clientes" class="text-center">
          <b-card-text class="h5">2</b-card-text>
        </b-card>
      </b-card-group>
    </div>
</template>

<script>
    export default {

    }
</script>
