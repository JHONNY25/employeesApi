<template>
  <div>
    <h1 class="mt-4">
        Empleados
    </h1>
    <button type="button" class="btn btn-primary mb-3">Agregar Empleado</button>
    <table class="table table-striped">
        <tbody>
            <tr>
                <th >Nombre</th>
                <th >Empleo</th>
                <th >Correo</th>
                <th c>Ciudad</th>
                <th></th>
            </tr>
            <tr v-for="(employee,index) in employees" :key="index" >
                <td class="p-3 px-5">{{ employee.name }}</td>
                <td class="p-3 px-5">{{ employee.job }}</td>
                <td class="p-3 px-5">{{ employee.email }}</td>
                <td class="p-3 px-5">{{ employee.city }}</td>
                <td>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#employee" @click="showEmployee(employee)">Ver</button>
                </td>
            </tr>
        </tbody>
    </table>

    <div class="modal fade" id="employee" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-lg" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Empleado</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label>Nombre</label>
                            <span class="form-text text-muted">{{ dataemployee.name }}</span>
                        </div>
                        <div class="form-group">
                            <label>Correo</label>
                            <span class="form-text text-muted">{{ dataemployee.email }}</span>
                        </div>
                        <div class="form-group">
                            <label>Empleo</label>
                            <span class="form-text text-muted">{{ dataemployee.job }}</span>
                        </div>
                        <div class="form-group">
                            <label>Fecha de cumpleaños</label>
                            <span class="form-text text-muted">{{ dataemployee.birthdate }}</span>
                        </div>
                        
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Domicilio</label>
                            <span class="form-text text-muted">{{ dataemployee.address }}</span>
                        </div>
                        <div class="form-group">
                            <label>Ciudad</label>
                            <span class="form-text text-muted">{{ dataemployee.city }}</span>
                        </div>
                        <div class="form-group">
                            <label>Estado</label>
                            <span class="form-text text-muted">{{ dataemployee.state }}</span>
                        </div>

                        <GmapMap
                        :center="{lat:parseFloat(dataemployee.latitude), lng:parseFloat(dataemployee.longitude)}"
                        :zoom="7"
                        map-type-id="terrain"
                        style="width: 300px; height: 300px"
                        >
                        <GmapMarker
                            :position="{lat:parseFloat(dataemployee.latitude), lng:parseFloat(dataemployee.longitude)}"
                        />
                        </GmapMap>
                    </div>
                </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
            </div>
        </div>
    </div>
  </div>
</template>

<script>
import axios from 'axios'
export default {
    data(){
      return {
        employees:[],
        dataemployee:[],
      }
    },
    methods:{
      async getEmployees(){
        await axios.get('/employees')
                .then(response => {
                    this.employees = response.data.data
                })
                .catch(error => console.log(error))
      },
      showEmployee(employee){
          console.log(employee)
          this.dataemployee = employee
      }
    },
    created(){
      this.getEmployees()
    }
}
</script>
