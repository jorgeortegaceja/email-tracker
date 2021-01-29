@extends('email_tracker::layouts.app')
@section('name')
    | Scheduling
@endsection

@section('table')
    <v-data-table :headers="headers" :items="desserts" :items-per-page="5" class="elevation-1">
        <template v-slot:top>
            <v-toolbar flat>
                <v-toolbar-title>
                    Scheduling
                </v-toolbar-title>
                <v-divider class="mx-4" inset vertical></v-divider>
                <v-spacer></v-spacer>
                <v-btn icon>
                    <v-icon>
                        mdi-eye
                    </v-icon>
                </v-btn>
                <v-btn icon>
                    <v-icon>
                        mdi-autorenew
                    </v-icon>
                </v-btn>
                <v-btn icon @click="add_item()">
                    <v-icon>
                        mdi-plus
                    </v-icon>
                </v-btn>
            </v-toolbar>
        </template>
        <template v-slot:item.actions="{ item }">
            <v-btn icon>
                <v-icon small>
                    mdi-pencil
                </v-icon>
            </v-btn>
                <v-btn icon>
                <v-icon small>
                    mdi-delete
                </v-icon>
            </v-btn>
        </template>
    </v-data-table>


    <v-dialog v-model="dialog" fullscreen
      hide-overlay>

        <v-card class="fill-height">
            <v-toolbar width="100%" absolute flat color="info darken-4" dark>
                <v-toolbar-title>
                    <span class="headline">@{{ formTitle }}</span>
                </v-toolbar-title>

                <v-spacer></v-spacer>

                <v-btn icon @click="dialog = !dialog">
                    <v-icon>
                        mdi-close
                    </v-icon>
                </v-btn>

            </v-toolbar>
            <v-card-text class="fill-height">
                <v-container class="fill-height">
                    <v-row justify="center" align="center">
                        <v-card min-width="500px">

                            <v-window v-model="step"  >
                                <v-window-item :value="1">
                                    <v-card-title class="title font-weight-regular justify-space-between">
                                        <span>Escoge el nombre de tu campaña</span>
                                    </v-card-title>
                                    <v-card-text>
                                        <v-text-field
                                            label="Nombre de la campaña"

                                        ></v-text-field>
                                        <span class="caption grey--text text--darken-1">
                                            Este es el nombre con el que identificaras la campaña
                                        </span>
                                    </v-card-text>
                                </v-window-item>

                                <v-window-item :value="2">
                                    <v-card-title class="title font-weight-regular justify-space-between">
                                        <span>¿Está campaña se enviara recurrentemente?</span>
                                    </v-card-title>
                                    <v-card-text >
                                        <v-radio-group v-model="editedItem.recurrent" column >
                                            <v-row justify="center">
                                                <v-col cols="12" sm="6" md="4" lg="3">
                                                    <v-radio label="Si" :value="true" ></v-radio>
                                                </v-col>
                                                <v-col cols="12" sm="6" md="4" lg="3">
                                                    <v-radio label="no" :value="false" ></v-radio>
                                                </v-col>
                                            </v-row>
                                        </v-radio-group>
                                        <span class="caption grey--text text--darken-1">
                                            Si contestas que si esta misma campaña enviara mailings cada determinado tiempo.
                                        </span>
                                    </v-card-text>
                                </v-window-item>

                                <v-window-item :value="3">
                                    <v-card-title class="title font-weight-regular justify-space-between">
                                        <span>¿Cada cuanto quieres que se envie la campaña?</span>
                                    </v-card-title>
                                    <v-card-text >
                                        <v-select v-model="editedItem.time_interval" :items="everyTime" item-value="value" item-text="text" label="Selecciona una opción"></v-select>

                                        <div v-if="editedItem.time_interval ==  'monthlyOn' || editedItem.time_interval == 'twiceMonthly'">
                                            <v-row justify="center">
                                                <v-col cols="8" class="text-center">
                                                    Selecciona el día que quieres que se realicen tus envios
                                                </v-col>
                                            </v-row>
                                            <v-row justify="center">
                                                <v-col cols="8">
                                                    <v-select :items="editedItem.time_interval == 'monthlyOn' ? days_weekly : days_month" label="selecciona una opción"></v-select>


                                                </v-col>
                                            </v-row>
                                        </div>

                                        <div v-if="editedItem.time_interval == 'weeklyOn' || editedItem.time_interval == 'monthlyOn' || editedItem.time_interval == 'twiceMonthly'">

                                            <v-row justify="center">
                                                <v-col cols="8" class="text-center">
                                                    Selecciona la hora en la que deseas que se hagan tus envios
                                                </v-col>
                                            </v-row>
                                            <v-row justify="center" algin="center">
                                                <v-text-field  dense style="max-width:45px" solo placeholder="00"></v-text-field>
                                                <span class="mx-1">:</span>
                                                <v-text-field dense  style="max-width:45px" solo placeholder="00" ></v-text-field>
                                            </v-row>
                                            <div class="text-center">
                                                La hora se toma en formto de 24 horas.
                                            </div>
                                        </div>
                                    </v-card-text>
                                </v-window-item>

                                <v-window-item :value="4">
                                    <v-card-title class="title font-weight-regular justify-space-between">
                                        <span>¿Deseas escoge un template nuevo?</span>
                                    </v-card-title>
                                    <v-card-text >
                                        <v-radio-group v-model="editedItem.recurrent" column >
                                            <v-row justify="center">
                                                <v-col cols="12" sm="6" md="4" lg="3">
                                                    <v-radio label="Si" :value="true" ></v-radio>
                                                </v-col>
                                                <v-col cols="12" sm="6" md="4" lg="3">
                                                    <v-radio label="No" :value="false" ></v-radio>
                                                </v-col>
                                            </v-row>
                                        </v-radio-group>
                                        <span class="caption grey--text text--darken-1">
                                            Es el cuerpo del correo electronico que enviaremos.
                                        </span>
                                    </v-card-text>
                                </v-window-item>
                                <v-window-item :value="5">
                                    <v-card-title class="title font-weight-regular justify-space-between">
                                        <span>Carga el archivo blade</span>
                                    </v-card-title>
                                    <v-card-text >

                                        <v-file-input
                                                    accept=".blade.php"
                                                    label="Ingresa el archivo"
                                                ></v-file-input>

                                        <span class="caption grey--text text--darken-1">
                                            Escoge un archivo con la extencion blade.php
                                        </span>
                                    </v-card-text>
                                </v-window-item>
                             </v-window>

                             <v-card-actions>
                                <v-btn
                                    v-if="step > 1"
                                    text
                                    @click="step--"
                                >
                                    Atras
                                </v-btn>
                                <v-spacer></v-spacer>
                                <v-btn

                                    color="primary"
                                    depressed
                                    @click="step++"
                                >
                                    Siguiente
                                </v-btn>
                             </v-card-actions>
                        </v-card>
                    </v-row>
                </v-container>
            </v-card-text>
        </v-card>
    </v-dialog>




@endsection

@section('script')
    <script>
        var vue = new Vue({
            el: '#app',
            vuetify: new Vuetify(),
             data: {
                headers: [
                    {
                        text: 'Id ',
                        align: 'start',
                        sortable: false,
                        value: 'id',
                    },

                    { text: 'html', value: 'html_email_id' },
                    { text: 'Nombre de campaña', value: 'campaign_name' },
                    { text: 'Recurrencia', value: 'recurrent' },
                    { text: 'Intervalo de tiempo', value: 'time_interval' },
                    { text: 'Enpezar envios', value: 'start_shipping' },
                    { text: 'Terminar envios', value: 'finish_shipments' },
                    // { text: 'created at', value: 'created_at' },
                    // { text: 'updated at', value: 'updated_at' },
                    { text: 'Acciones',  value: 'actions', sortable: false}

                ],
                desserts: {!! $schedulings !!},
                editedIndex: -1,
                editedItem: {
                    html_email_id: '',
                    campaign_name: '',
                    recurrent: false,
                    time_interval: '',
                    start_shipping: '',
                    finish_shipments: ''
                },
                defaultItem: {
                    html_email_id: '',
                    campaign_name: '',
                    recurrent: false,
                    time_interval: '',
                    start_shipping: '',
                    finish_shipments: ''
                },
                dialog: false,
                step: 5,
                everyTime: [
                    {
                        text: "Cada Hora",
                        value: "hourly"
                    },
                    {
                        text: "Cada día",
                        value: "weeklyOn"
                    },
                     {
                        text: "Cada semana",
                        value: "monthlyOn"
                    },
                    {
                        text: "Cada mes",
                        value: "twiceMonthly"
                    },


                ]
            },
            computed: {
                formTitle () {
                    return this.editedIndex === -1 ? 'New Item' : 'Edit Item'
                },
                days_weekly(){
                    return [
                        {
                            text: 'Lunes',
                            value: 1
                        },
                        {
                            text: 'Martes',
                            value: 2
                        },
                        {
                            text: 'Miercoles',
                            value: 3
                        },
                        {
                            text: 'Jueves',
                            value: 4
                        },
                        {
                            text: 'Viernes',
                            value: 5
                        },
                        {
                            text: 'Sabado',
                            value: 6
                        },
                        {
                            text: 'Domingo',
                            value: 7
                        }
                    ]
                },
                days_month(){
                    return [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30];
                },
                hours(){
                    return [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23];
                },
                minutes(){
                    let seconds = [];
                    for (let i = 0; i < 59; i++) {
                         seconds.push(i);
                    }
                    return seconds;
                }
            },
            methods:{
               add_item(){
                   this.dialog = true;
               },
               close(){
                   this.editedItem = this.defaultItem;
                   this.editedIndex = -1;
                   this.dialog = false;
               },
               save(){

               }
            },
        });

    </script>
@endsection
