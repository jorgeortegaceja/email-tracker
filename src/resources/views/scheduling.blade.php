@extends('email_tracker::layouts.app')
@section('name')
    | Scheduling
@endsection

@section('table')
    <table-scheduling></table-scheduling>
@endsection

@section('script')
    <script>
        Vue.component('table-scheduling', {
            template: `
                <v-data-table
                    :headers="headers"
                    :items="desserts"
                    :items-per-page="5"
                    class="elevation-1"
                >
                </v-data-table>
            `,
            data: ()=>{
               return{
                     headers: [
                        {
                            text: 'Dessert (100g serving)',
                            align: 'start',
                            sortable: false,
                            value: 'name',
                        },
                        { text: 'Calories', value: 'calories' },
                        { text: 'Fat (g)', value: 'fat' },
                        { text: 'Carbs (g)', value: 'carbs' },
                        { text: 'Protein (g)', value: 'protein' },
                        { text: 'Iron (%)', value: 'iron' },
                    ],
                    desserts: [
                        {
                            name: 'Frozen Yogurt',
                            calories: 159,
                            fat: 6.0,
                            carbs: 24,
                            protein: 4.0,
                            iron: '1%',
                        },
                        {
                            name: 'Ice cream sandwich',
                            calories: 237,
                            fat: 9.0,
                            carbs: 37,
                            protein: 4.3,
                            iron: '1%',
                        },

                    ],
               }
           }
        });


    </script>
@endsection
